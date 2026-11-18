<?php
/**
 * SEO / GEO / CEO.
 * - Khi Rank Math đang bật: theme không in meta/schema trùng, chỉ bổ sung schema qua filter rank_math/json_ld.
 * - Khi không có Rank Math: theme tự in meta mô tả, Open Graph, JSON-LD (Organization + FAQPage).
 * - llms.txt: tệp mô tả doanh nghiệp cho công cụ AI (GEO), theo ngôn ngữ đang xem.
 */

if (!defined('ABSPATH')) {
	exit;
}

function anp_has_rankmath() {
	return defined('RANK_MATH_FILE') || class_exists('RankMath');
}

/** Schema Organization + ProfessionalService dựa trên thông tin Customizer (gồm tên pháp lý và mã số thuế). */
function anp_schema_organization() {
	$home   = home_url('/');
	$sameas = array_values(array_filter(array(anp_opt('anp_facebook'), anp_opt('anp_zalo'))));
	$logo   = anp_logo_url();

	$org = array(
		'@type'         => array('Organization', 'ProfessionalService'),
		'@id'           => $home . '#organization',
		'name'          => anp_opt('anp_brand_name'),
		'legalName'     => anp_opt('anp_company_name'),
		'alternateName' => anp_opt('anp_brand_name'),
		'url'           => $home,
		'foundingDate'  => anp_opt('anp_founded'),
		'telephone'     => '+84' . ltrim(anp_opt('anp_phone'), '0'),
		'email'         => anp_opt('anp_email'),
		'address'       => array(
			'@type'          => 'PostalAddress',
			'streetAddress'  => anp_opt('anp_address_hq'),
			'addressCountry' => 'VN',
		),
		'areaServed'    => array('@type' => 'Country', 'name' => 'Vietnam'),
		'knowsAbout'    => array('Customs declaration', 'Import-export logistics', 'Sea freight', 'Air freight', 'Warehousing and handling', 'Project cargo'),
		'sameAs'        => $sameas,
	);
	if (anp_opt('anp_tax_code') !== '') {
		$org['taxID'] = anp_opt('anp_tax_code');
	}
	if ($logo) {
		$org['logo'] = $logo;
	}
	return $org;
}

function anp_schema_faq() {
	$entities = array();
	foreach (anp_faq_items() as $item) {
		$entities[] = array(
			'@type'          => 'Question',
			'name'           => $item['q'],
			'acceptedAnswer' => array('@type' => 'Answer', 'text' => $item['a']),
		);
	}
	return array(
		'@type'      => 'FAQPage',
		'@id'        => home_url('/') . '#faq',
		'mainEntity' => $entities,
	);
}

/**
 * Schema cho trang dịch vụ: Service (mô tả dịch vụ, nhà cung cấp), FAQPage (hỏi đáp của dịch vụ),
 * BreadcrumbList (đường dẫn). Trả về mảng các node để gộp vào @graph.
 */
function anp_service_schema($post_id) {
	$url      = get_permalink($post_id);
	$name     = anp_service_field($post_id, 'title');
	$provider = array('@id' => home_url('/') . '#organization');

	$nodes = array(
		array(
			'@type'       => 'Service',
			'@id'         => $url . '#service',
			'name'        => $name,
			'description' => anp_service_field($post_id, 'meta_desc') ?: anp_service_field($post_id, 'excerpt'),
			'url'         => $url,
			'provider'    => $provider,
			'areaServed'  => array('@type' => 'Country', 'name' => 'Vietnam'),
			'serviceType' => anp_service_field($post_id, 'title'),
		),
	);

	$qa = anp_parse_qa(anp_service_field($post_id, 'faq'));
	if ($qa) {
		$entities = array();
		foreach ($qa as $item) {
			$entities[] = array(
				'@type'          => 'Question',
				'name'           => $item['q'],
				'acceptedAnswer' => array('@type' => 'Answer', 'text' => $item['a']),
			);
		}
		$nodes[] = array('@type' => 'FAQPage', '@id' => $url . '#faq', 'mainEntity' => $entities);
	}

	$nodes[] = array(
		'@type'           => 'BreadcrumbList',
		'@id'             => $url . '#breadcrumb',
		'itemListElement' => array(
			array('@type' => 'ListItem', 'position' => 1, 'name' => anp_t('home'), 'item' => home_url('/')),
			array('@type' => 'ListItem', 'position' => 2, 'name' => anp_t('services_label'), 'item' => get_post_type_archive_link('anp_service')),
			array('@type' => 'ListItem', 'position' => 3, 'name' => $name, 'item' => $url),
		),
	);
	return $nodes;
}

/** Tiêu đề trang dịch vụ theo meta SEO riêng (khi không có Rank Math). */
function anp_service_document_title($title) {
	if (anp_has_rankmath() || !is_singular('anp_service')) {
		return $title;
	}
	$meta = anp_service_field(get_the_ID(), 'meta_title');
	return $meta !== '' ? $meta : $title;
}
add_filter('pre_get_document_title', 'anp_service_document_title');

/* ---------- Khi KHÔNG có Rank Math ---------- */
function anp_seo_head() {
	if (anp_has_rankmath()) {
		return;
	}

	$is_single = is_singular();
	$is_service = is_singular('anp_service');
	$title     = $is_single ? get_the_title() : wp_get_document_title();
	if ($is_service) {
		$title = anp_service_field(get_the_ID(), 'meta_title') ?: $title;
	}
	if ($is_service) {
		$desc = anp_service_field(get_the_ID(), 'meta_desc');
	} else {
		$desc = $is_single && has_excerpt() ? wp_strip_all_tags(get_the_excerpt()) : anp_opt('anp_meta_description');
	}
	$url       = $is_single ? get_permalink() : (is_front_page() ? home_url('/') : get_pagenum_link(max(1, (int) get_query_var('paged'))));
	$image     = $is_single && has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'large') : anp_logo_url();

	echo "\n<meta name=\"description\" content=\"" . esc_attr($desc) . "\">\n";
	echo '<meta property="og:locale" content="' . esc_attr(anp_locale()) . '">' . "\n";
	echo '<meta property="og:site_name" content="' . esc_attr(anp_opt('anp_brand_name')) . '">' . "\n";
	echo '<meta property="og:type" content="' . ($is_single ? 'article' : 'website') . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
	if ($image) {
		echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
	}

	$graph = array(anp_schema_organization());
	if ($is_service) {
		$graph = array_merge($graph, anp_service_schema(get_the_ID()));
	} elseif (is_front_page() || is_page_template('page-faq.php') || is_page(array('hoi-dap', 'faq'))) {
		$graph[] = anp_schema_faq();
	}
	echo '<script type="application/ld+json">' . wp_json_encode(array('@context' => 'https://schema.org', '@graph' => $graph), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</script>\n";
}
add_action('wp_head', 'anp_seo_head', 2);

/* ---------- Khi CÓ Rank Math: bổ sung schema vào đồ thị của Rank Math ---------- */
function anp_rankmath_jsonld($data, $jsonld = null) {
	if (!is_array($data)) {
		return $data;
	}
	if (is_front_page() || is_page_template('page-faq.php') || is_page(array('hoi-dap', 'faq'))) {
		$data['anp-faq'] = anp_schema_faq();
	}
	if (is_singular('anp_service')) {
		foreach (anp_service_schema(get_the_ID()) as $node) {
			$data['anp-svc-' . strtolower($node['@type'])] = $node;
		}
	}
	$data['anp-organization'] = array_merge(anp_schema_organization(), array('@id' => home_url('/') . '#anp-organization'));
	return $data;
}
add_filter('rank_math/json_ld', 'anp_rankmath_jsonld', 99, 2);

/* ---------- llms.txt (GEO) ---------- */
function anp_llms_rewrite() {
	add_rewrite_rule('^llms\.txt$', 'index.php?anp_llms=1', 'top');
}
add_action('init', 'anp_llms_rewrite');

function anp_llms_query_var($vars) {
	$vars[] = 'anp_llms';
	return $vars;
}
add_filter('query_vars', 'anp_llms_query_var');

function anp_llms_output() {
	if (!get_query_var('anp_llms')) {
		return;
	}
	header('Content-Type: text/plain; charset=utf-8');

	$lines   = array();
	$lines[] = '# ' . anp_opt('anp_brand_name') . ' - ' . anp_opt('anp_company_name');
	$lines[] = '';
	$lines[] = '> ' . anp_opt('anp_meta_description');
	$lines[] = '';
	$lines[] = '## ' . anp_t('llms_company');
	$lines[] = '- ' . anp_t('llms_founded') . ': ' . anp_opt('anp_founded');
	$lines[] = '- ' . anp_t('head_office') . ': ' . anp_opt('anp_address_hq');
	if (anp_opt('anp_tax_code') !== '') {
		$lines[] = '- ' . anp_t('llms_tax_code') . ': ' . anp_opt('anp_tax_code');
	}
	$lines[] = '- ' . anp_t('hotline') . ': ' . anp_opt('anp_phone_display');
	$lines[] = '- ' . anp_t('email') . ': ' . anp_opt('anp_email');
	$lines[] = '- ' . anp_t('working_hours') . ': ' . anp_hours_inline();
	$lines[] = '';
	$lines[] = '## ' . anp_t('llms_services');
	foreach (anp_service_items(20) as $s) {
		$lines[] = '- ' . $s['title'] . ': ' . $s['text'];
	}
	$lines[] = '';
	$lines[] = '## ' . anp_t('llms_faq');
	foreach (anp_faq_items() as $item) {
		$lines[] = '- ' . $item['q'] . ' ' . $item['a'];
	}
	$lines[] = '';
	$lines[] = '## ' . anp_t('llms_pages');
	$lines[] = '- ' . anp_t('home') . ': ' . home_url('/');
	$lines[] = '- ' . anp_t('news_title') . ': ' . (get_permalink(get_option('page_for_posts')) ?: home_url('/blog/'));
	echo implode("\n", $lines) . "\n";
	exit;
}
add_action('template_redirect', 'anp_llms_output');
