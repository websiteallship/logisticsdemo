<?php
/**
 * Thiết lập theme: tính năng WP, menu, CSS/JS, Tailwind, bộ màu, custom post type Dịch vụ (song ngữ), icon SVG, logo.
 */

if (!defined('ABSPATH')) {
	exit;
}

/* ---------- 1. Tính năng theme ---------- */
function anp_setup() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
	add_theme_support('responsive-embeds');
	add_theme_support('align-wide');

	register_nav_menus(array(
		'primary' => 'Menu chính',
		'footer'  => 'Menu chân trang',
	));

	add_image_size('anp-card', 800, 500, true);
}
add_action('after_setup_theme', 'anp_setup');

/* ---------- 2. CSS / JS ---------- */

/** Mở sẵn kết nối tới máy chủ font để chữ tải nhanh và ổn định. */
function anp_font_preconnect() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'anp_font_preconnect', 1);

function anp_enqueue_assets() {
	// Tailwind CSS (Play CDN). Cấu hình màu đọc từ biến CSS để đổi bộ màu không cần build.
	wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', array(), null, false);
	wp_add_inline_script('tailwindcss', anp_tailwind_config(), 'after');

	// Be Vietnam Pro: font sans-serif chuẩn cho tiếng Việt, dùng đồng nhất 1 font cho toàn bộ website.
	wp_enqueue_style('anp-fonts', 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap', array(), null);
	wp_enqueue_style('anp-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), ANP_VERSION);
	wp_add_inline_style('anp-theme', anp_palette_css());

	wp_enqueue_script('anp-main', get_template_directory_uri() . '/assets/js/main.js', array(), ANP_VERSION, true);
}
add_action('wp_enqueue_scripts', 'anp_enqueue_assets');

function anp_tailwind_config() {
	return 'tailwind.config = {theme:{extend:{'
		. 'colors:{'
		. 'brand:{DEFAULT:"rgb(var(--c-primary) / <alpha-value>)",soft:"rgb(var(--c-primary-soft) / <alpha-value>)"},'
		. 'accent:{DEFAULT:"rgb(var(--c-accent) / <alpha-value>)",hover:"rgb(var(--c-accent-hover) / <alpha-value>)"},'
		. 'onaccent:"rgb(var(--c-on-accent) / <alpha-value>)"'
		. '},'
		. 'fontFamily:{sans:[\'Be Vietnam Pro\',\'Segoe UI\',\'Roboto\',\'Arial\',\'sans-serif\'],display:[\'Be Vietnam Pro\',\'Segoe UI\',\'Arial\',\'sans-serif\']}'
		. '}}};';
}

/* ---------- 3. Bộ màu ---------- */

/**
 * Năm bộ màu có sẵn. Thêm/sửa bộ màu tại đây khi cần.
 * soft = màu nền phụ, accent = màu nhấn (nút CTA), accent_hover = màu nhấn khi rê chuột.
 */
function anp_palettes() {
	return array(
		'corporate' => array('label' => 'Doanh nghiệp: Deep Navy & Cam Hàng hải (mặc định)', 'primary' => '#0B192C', 'soft' => '#1E293B', 'accent' => '#EA580C', 'accent_hover' => '#C2410C'),
		'navy'     => array('label' => 'Navy & Vàng hổ phách', 'primary' => '#0B2545', 'soft' => '#13315C', 'accent' => '#F5A623', 'accent_hover' => '#E0941A'),
		'ocean'    => array('label' => 'Biển xanh & Ngọc lam', 'primary' => '#053B5C', 'soft' => '#0E5A8A', 'accent' => '#2EC4B6', 'accent_hover' => '#20A99C'),
		'forest'   => array('label' => 'Xanh lá đậm & Chanh', 'primary' => '#14361F', 'soft' => '#1F5130', 'accent' => '#A7C957', 'accent_hover' => '#8DB13F'),
		'graphite' => array('label' => 'Than chì & Cam đồng', 'primary' => '#1F2937', 'soft' => '#374151', 'accent' => '#EA580C', 'accent_hover' => '#C2410C'),
		'crimson'  => array('label' => 'Đỏ rượu & Hồng đỏ', 'primary' => '#3B0D11', 'soft' => '#6B1E24', 'accent' => '#E11D48', 'accent_hover' => '#BE123C'),
	);
}

/** Trả về bộ màu đang dùng (kể cả bộ "custom" lấy từ Customizer). */
function anp_current_palette() {
	$id = get_theme_mod('anp_palette', 'corporate');

	if ($id === 'custom') {
		return array(
			'primary'      => get_theme_mod('anp_custom_primary', '#0F172A'),
			'soft'         => get_theme_mod('anp_custom_soft', '#1E293B'),
			'accent'       => get_theme_mod('anp_custom_accent', '#0EA5E9'),
			'accent_hover' => get_theme_mod('anp_custom_accent_hover', '#0369A1'),
		);
	}

	$all = anp_palettes();
	return isset($all[$id]) ? $all[$id] : $all['corporate'];
}

/** Độ sáng tương đối theo WCAG, từ #RRGGBB. */
function anp_luminance($hex) {
	$rgb = array_map('intval', explode(' ', anp_hex_rgb($hex)));
	$lin = array_map(function ($c) {
		$c = $c / 255;
		return $c <= 0.03928 ? $c / 12.92 : pow(($c + 0.055) / 1.055, 2.4);
	}, $rgb);
	return 0.2126 * $lin[0] + 0.7152 * $lin[1] + 0.0722 * $lin[2];
}

/** Tỉ lệ tương phản giữa hai màu. */
function anp_contrast($a, $b) {
	$l1 = anp_luminance($a);
	$l2 = anp_luminance($b);
	return (max($l1, $l2) + 0.05) / (min($l1, $l2) + 0.05);
}

/** Màu chữ đặt lên nền màu nhấn: chọn trắng hoặc màu chính, tùy bên nào tương phản cao hơn. */
function anp_on_accent($palette) {
	return anp_contrast('#FFFFFF', $palette['accent']) >= anp_contrast($palette['primary'], $palette['accent']) ? '#FFFFFF' : $palette['primary'];
}

/** Chuyển #RRGGBB thành "r g b" để Tailwind dùng được độ trong suốt. */
function anp_hex_rgb($hex) {
	$hex = ltrim((string) $hex, '#');
	if (strlen($hex) === 3) {
		$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
	}
	if (!preg_match('/^[0-9a-fA-F]{6}$/', $hex)) {
		$hex = '000000';
	}
	return hexdec(substr($hex, 0, 2)) . ' ' . hexdec(substr($hex, 2, 2)) . ' ' . hexdec(substr($hex, 4, 2));
}

function anp_palette_css() {
	$p = anp_current_palette();
	return sprintf(
		':root{--c-primary:%s;--c-primary-soft:%s;--c-accent:%s;--c-accent-hover:%s;--c-on-accent:%s;}',
		anp_hex_rgb($p['primary']),
		anp_hex_rgb($p['soft']),
		anp_hex_rgb($p['accent']),
		anp_hex_rgb($p['accent_hover']),
		anp_hex_rgb(anp_on_accent($p))
	);
}

/* ---------- 4. Custom post type: Dịch vụ (song ngữ) ---------- */
function anp_register_service_cpt() {
	register_post_type('anp_service', array(
		'labels' => array(
			'name'          => 'Dịch vụ',
			'singular_name' => 'Dịch vụ',
			'add_new_item'  => 'Thêm dịch vụ',
			'edit_item'     => 'Sửa dịch vụ',
			'all_items'     => 'Tất cả dịch vụ',
		),
		'public'       => true,
		'has_archive'  => 'dich-vu',
		'rewrite'      => array('slug' => 'dich-vu'),
		'supports'     => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
		'menu_icon'    => 'dashicons-car',
		'show_in_rest' => true,
	));
}
add_action('init', 'anp_register_service_cpt');

/** Lựa chọn icon cho dịch vụ. */
function anp_service_icon_choices() {
	return array(
		'customs'   => 'Hải quan (tài liệu)',
		'truck'     => 'Vận chuyển nội địa (xe tải)',
		'ship'      => 'Đường biển (tàu)',
		'plane'     => 'Đường không (máy bay)',
		'warehouse' => 'Kho bãi',
		'project'   => 'Hàng dự án (kiện hàng)',
	);
}

function anp_service_meta_box() {
	add_meta_box('anp_service_details', 'Thông tin dịch vụ (song ngữ)', 'anp_service_meta_box_html', 'anp_service', 'normal', 'high');
}
add_action('add_meta_boxes', 'anp_service_meta_box');

function anp_service_meta_box_html($post) {
	$icon     = get_post_meta($post->ID, '_anp_icon', true);
	$title_en = get_post_meta($post->ID, '_anp_title_en', true);
	$text_en  = get_post_meta($post->ID, '_anp_excerpt_en', true);
	wp_nonce_field('anp_service_details', 'anp_service_details_nonce');

	echo '<p><label><strong>Icon</strong><br><select name="anp_icon" class="widefat">';
	foreach (anp_service_icon_choices() as $key => $label) {
		printf('<option value="%s"%s>%s</option>', esc_attr($key), selected($icon, $key, false), esc_html($label));
	}
	echo '</select></label></p>';

	echo '<p><label><strong>Tên dịch vụ (English)</strong><br><input type="text" name="anp_title_en" class="widefat" value="' . esc_attr($title_en) . '"></label></p>';
	echo '<p><label><strong>Mô tả ngắn (English)</strong><br><textarea name="anp_excerpt_en" rows="3" class="widefat">' . esc_textarea($text_en) . '</textarea></label></p>';
	echo '<p class="description">Tiêu đề và mô tả ngắn (Excerpt) chính là bản tiếng Việt. Để trống bản tiếng Anh thì website hiển thị bản tiếng Việt.</p>';
}

function anp_service_meta_save($post_id) {
	if (!isset($_POST['anp_service_details_nonce']) || !wp_verify_nonce($_POST['anp_service_details_nonce'], 'anp_service_details')) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	$icon = isset($_POST['anp_icon']) ? sanitize_key(wp_unslash($_POST['anp_icon'])) : 'customs';
	if (array_key_exists($icon, anp_service_icon_choices())) {
		update_post_meta($post_id, '_anp_icon', $icon);
	}
	update_post_meta($post_id, '_anp_title_en', isset($_POST['anp_title_en']) ? sanitize_text_field(wp_unslash($_POST['anp_title_en'])) : '');
	update_post_meta($post_id, '_anp_excerpt_en', isset($_POST['anp_excerpt_en']) ? sanitize_textarea_field(wp_unslash($_POST['anp_excerpt_en'])) : '');
}
add_action('save_post_anp_service', 'anp_service_meta_save');

/** Tiêu đề dịch vụ theo ngôn ngữ đang xem. */
function anp_service_title($post_id) {
	if (anp_lang() === 'en') {
		$en = get_post_meta($post_id, '_anp_title_en', true);
		if ($en !== '') {
			return $en;
		}
	}
	return get_the_title($post_id);
}

/** Mô tả ngắn dịch vụ theo ngôn ngữ đang xem. */
function anp_service_excerpt($post_id) {
	if (anp_lang() === 'en') {
		$en = get_post_meta($post_id, '_anp_excerpt_en', true);
		if ($en !== '') {
			return $en;
		}
	}
	$post = get_post($post_id);
	if ($post->post_excerpt !== '') {
		return $post->post_excerpt;
	}
	return wp_trim_words(wp_strip_all_tags($post->post_content), 30);
}

/** Danh sách dịch vụ cho trang chủ và llms.txt. */
function anp_service_items($limit = 6) {
	$query = new WP_Query(array(
		'post_type'      => 'anp_service',
		'post_status'    => 'publish',
		'posts_per_page' => $limit,
		'orderby'        => array('menu_order' => 'ASC', 'date' => 'ASC'),
		'no_found_rows'  => true,
	));

	$items = array();
	foreach ($query->posts as $post) {
		$icon    = get_post_meta($post->ID, '_anp_icon', true);
		$icon    = $icon ? $icon : 'customs';
		$items[] = array(
			'title'    => anp_service_title($post->ID),
			'text'     => anp_service_excerpt($post->ID),
			'icon'     => $icon,
			'url'      => get_permalink($post->ID),
			'thumb_id' => get_post_thumbnail_id($post->ID),
			'photo'    => anp_photo_key_for_icon($icon),
		);
	}
	return $items;
}

/** Dữ liệu dịch vụ ban đầu (chỉ tạo một lần khi kích hoạt theme). Sau đó sửa trong admin. */
function anp_seed_services_data() {
	return array(
		array(
			'icon'     => 'customs',
			'vi_title' => 'Khai báo hải quan',
			'vi_text'  => 'Khai báo điện tử, xác định biểu thuế xuất nhập khẩu và hướng dẫn thủ tục theo văn bản hiện hành để hàng thông quan đúng quy định.',
			'en_title' => 'Customs declaration',
			'en_text'  => 'Electronic declarations, tariff classification and procedure guidance under current regulations, so your cargo clears correctly.',
		),
		array(
			'icon'     => 'truck',
			'vi_title' => 'Vận chuyển nội địa',
			'vi_text'  => 'Đưa hàng từ cảng đến kho, từ kho đến điểm giao trên toàn quốc, bằng đội xe chủ động và điều phối theo khung giờ bạn chọn.',
			'en_title' => 'Domestic transport',
			'en_text'  => 'Moving cargo from port to warehouse, or from warehouse to any delivery point nationwide, with our own fleet and scheduling to your preferred time window.',
		),
		array(
			'icon'     => 'ship',
			'vi_title' => 'Vận chuyển đường biển',
			'vi_text'  => 'Hàng nguyên container (FCL) và hàng lẻ (LCL) xuất nhập khẩu. Lịch tàu theo tuyến, phối hợp chặt với hãng tàu và đại lý tại cảng.',
			'en_title' => 'Sea freight',
			'en_text'  => 'Full container (FCL) and less-than-container (LCL) import and export. Sailing schedules by lane, closely coordinated with carriers and port agents.',
		),
		array(
			'icon'     => 'plane',
			'vi_title' => 'Vận chuyển đường không',
			'vi_text'  => 'Hàng air cho lô gấp, hàng giá trị cao hoặc cần đúng chuyến bay. Theo dõi từ lúc nhận hàng đến khi giao cho người nhận.',
			'en_title' => 'Air freight',
			'en_text'  => 'Air cargo for urgent shipments, high-value goods, or cargo that must travel on a specific flight. Tracked from pickup to delivery.',
		),
		array(
			'icon'     => 'warehouse',
			'vi_title' => 'Kho bãi & xếp dỡ',
			'vi_text'  => 'Lưu kho ngắn hoặc dài hạn, đóng rút hàng, xếp dỡ tại cảng và kho, kiểm đếm và báo cáo tồn kho định kỳ.',
			'en_title' => 'Warehousing & handling',
			'en_text'  => 'Short or long-term storage, container stuffing and unstuffing, port and warehouse handling, and periodic stock counts and reports.',
		),
		array(
			'icon'     => 'project',
			'vi_title' => 'Hàng dự án',
			'vi_text'  => 'Máy móc, thiết bị kích thước lớn hoặc quá khổ. Khảo sát tuyến đường, lập phương án chằng buộc và vận chuyển riêng cho từng công trình.',
			'en_title' => 'Project cargo',
			'en_text'  => 'Oversized and heavy machinery or equipment. We survey the route, plan lashing, and arrange dedicated transport for each project.',
		),
	);
}

/** Tạo sẵn 6 dịch vụ lần đầu. Không tạo lại nếu đã có dịch vụ hoặc đã từng tạo. */
function anp_seed_services() {
	if (get_option('anp_services_seeded')) {
		return;
	}
	$existing = get_posts(array('post_type' => 'anp_service', 'post_status' => 'any', 'numberposts' => 1, 'fields' => 'ids'));
	if (!empty($existing)) {
		update_option('anp_services_seeded', 1);
		return;
	}

	foreach (anp_seed_services_data() as $index => $service) {
		$post_id = wp_insert_post(array(
			'post_type'    => 'anp_service',
			'post_status'  => 'publish',
			'post_title'   => $service['vi_title'],
			'post_excerpt' => $service['vi_text'],
			'menu_order'   => $index + 1,
		));
		if ($post_id && !is_wp_error($post_id)) {
			update_post_meta($post_id, '_anp_icon', $service['icon']);
			update_post_meta($post_id, '_anp_title_en', $service['en_title']);
			update_post_meta($post_id, '_anp_excerpt_en', $service['en_text']);
		}
	}
	update_option('anp_services_seeded', 1);
}

/* ---------- 5. Icon SVG (nét đơn, kế thừa màu chữ) ---------- */
function anp_icon($name, $class = 'h-6 w-6') {
	$paths = array(
		'customs'   => '<path d="M7 3h7l5 5v13H7z"/><path d="M14 3v5h5"/><path d="M10 13h6M10 17h6"/>',
		'truck'     => '<path d="M3 6h11v10H3z"/><path d="M14 10h4l3 3v3h-7"/><circle cx="7" cy="17.5" r="1.8"/><circle cx="17" cy="17.5" r="1.8"/>',
		'ship'      => '<path d="M3 15h18l-2.5 5h-13z"/><path d="M6 15V9h12v6"/><path d="M9 9V5h6v4"/>',
		'plane'     => '<path d="M21 3L10 14"/><path d="M21 3l-7 18-4-7-7-4z"/>',
		'warehouse' => '<path d="M3 21V9l9-6 9 6v12"/><path d="M7 21v-7h10v7"/>',
		'project'   => '<path d="M12 3l9 5v8l-9 5-9-5V8z"/><path d="M3 8l9 5 9-5M12 13v8"/>',
		'arrow'     => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		'phone'     => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/>',
		'mail'      => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>',
		'pin'       => '<path d="M12 21s-7-6.2-7-11a7 7 0 0 1 14 0c0 4.8-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/>',
		'clock'     => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
		'check'     => '<path d="M5 12l4 4 10-10"/>',
		'menu'      => '<path d="M4 7h16M4 12h16M4 17h16"/>',
		'close'     => '<path d="M6 6l12 12M18 6L6 18"/>',
		'id'        => '<rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M6 16c.6-1.5 1.7-2.2 3-2.2s2.4.7 3 2.2M14 10h4M14 14h3"/>',
	);
	$inner = isset($paths[$name]) ? $paths[$name] : $paths['customs'];
	return '<svg class="' . esc_attr($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $inner . '</svg>';
}

/* ---------- 6. Logo & menu dự phòng ---------- */

/** In logo: ảnh tải lên trong Customizer, hoặc chữ + biểu tượng mặc định. */
function anp_logo_markup($light = false) {
	$logo = anp_opt('anp_logo');
	if ($logo) {
		echo '<img src="' . esc_url($logo) . '" alt="' . esc_attr(anp_opt('anp_brand_name')) . '" class="h-10 w-auto sm:h-12" width="180" height="48" decoding="async">';
		return;
	}
	$text_class = $light ? 'text-white' : 'text-brand';
	echo '<span class="flex items-center gap-3">';
	echo '<span class="grid h-11 w-11 place-items-center rounded-xl bg-brand text-accent shadow-sm ring-1 ring-black/5">' . anp_icon('ship', 'h-6 w-6') . '</span>';
	echo '<span class="leading-tight"><span class="block text-xl font-extrabold tracking-tight ' . $text_class . '">' . esc_html(anp_opt('anp_brand_name')) . '</span>';
	echo '<span class="hidden text-[11px] font-semibold uppercase tracking-[0.16em] ' . ($light ? 'text-white/60' : 'text-slate-500') . ' sm:block">' . esc_html(anp_opt('anp_industry')) . '</span></span>';
	echo '</span>';
}

/** Menu dự phòng khi chưa gán menu trong Giao diện > Menu. */
function anp_fallback_menu($args = array()) {
	$vertical = isset($args['theme_location']) && $args['theme_location'] === 'footer';
	$contact_page = get_page_by_path('lien-he') ?: get_page_by_path('contact');
	$contact_url  = $contact_page ? get_permalink($contact_page) : home_url('/lien-he/');
	$faq_page     = get_page_by_path('hoi-dap') ?: get_page_by_path('faq');
	$faq_url      = $faq_page ? get_permalink($faq_page) : home_url('/hoi-dap/');

	$items = array(
		anp_t('menu_home')     => home_url('/'),
		anp_t('menu_about')    => home_url('/#gioi-thieu'),
		anp_t('menu_services') => home_url('/#dich-vu'),
		anp_t('menu_process')  => home_url('/#quy-trinh'),
		anp_t('menu_news')     => home_url('/#tin-tuc'),
		anp_t('menu_faq')      => $faq_url,
		anp_t('menu_contact')  => $contact_url,
	);
	if ($vertical) {
		echo '<ul class="mt-5 space-y-3 text-sm text-white/80">';
		foreach ($items as $label => $url) {
			printf('<li><a class="hover:text-white" href="%s">%s</a></li>', esc_url($url), esc_html($label));
		}
		echo '</ul>';
		return;
	}

	echo '<ul class="flex flex-col gap-1 lg:flex-row lg:items-center lg:gap-6 xl:gap-8">';
	foreach ($items as $label => $url) {
		$is_services = anp_is_services_nav_item($url);
		$classes     = $is_services ? ' menu-item-has-children' : '';
		echo '<li class="' . esc_attr(trim($classes)) . '">';
		printf('<a class="block py-2 text-[15px] font-semibold text-slate-700 transition hover:text-accent" href="%s">%s</a>', esc_url($url), esc_html($label));
		if ($is_services) {
			echo '<ul class="sub-menu">';
			foreach (anp_service_items(20) as $s) {
				printf('<li><a href="%s">%s</a></li>', esc_url($s['url']), esc_html($s['title']));
			}
			echo '</ul>';
		}
		echo '</li>';
	}
	echo '</ul>';
}

/* ---------- 7. Tiện ích ---------- */

/** Ngày đăng bài theo định dạng của ngôn ngữ đang xem. */
function anp_date($post_id = null) {
	return get_the_date(anp_lang() === 'en' ? 'F j, Y' : 'd/m/Y', $post_id);
}

/** Khi kích hoạt theme: đăng ký CPT, tạo dịch vụ mẫu, nạp lại rewrite rules. */
function anp_on_switch() {
	anp_register_service_cpt();
	anp_seed_services();
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'anp_on_switch');

/* ---------- 8. Định tuyến trang chuyên biệt (Liên hệ, Hỏi đáp) ----------
 * Đây là trang "ảo" không có WP_Post. Không đặt is_page/is_singular = true,
 * nếu không Rank Math sẽ đọc get_post() = null và in hàng loạt Warning ra <head>. */
function anp_is_faq_request() {
	$path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
	return get_query_var('anp_custom_page') === 'faq' || in_array(basename($path), array('hoi-dap', 'faq'), true);
}

function anp_register_custom_rewrites() {
	add_rewrite_rule('^(lien-he|contact)/?$', 'index.php?anp_custom_page=contact', 'top');
	add_rewrite_rule('^(hoi-dap|faq)/?$', 'index.php?anp_custom_page=faq', 'top');
	add_rewrite_rule('^(tin-tuc|blog)/?$', 'index.php?anp_custom_page=blog', 'top');
}
add_action('init', 'anp_register_custom_rewrites');

function anp_register_query_vars($vars) {
	$vars[] = 'anp_custom_page';
	return $vars;
}
add_filter('query_vars', 'anp_register_query_vars');

function anp_prevent_custom_pages_404($preempt, $query) {
	$request_uri = $_SERVER['REQUEST_URI'] ?? '';
	$path = trim((string) parse_url($request_uri, PHP_URL_PATH), '/');
	$slug = basename($path);
	if (in_array($slug, array('lien-he', 'contact', 'hoi-dap', 'faq', 'tin-tuc', 'blog'), true)) {
		status_header(200);
		if ($query) {
			$query->is_404 = false;
			if (in_array($slug, array('tin-tuc', 'blog'), true)) {
				$query->is_home = true;
				$query->is_posts_page = true;
			} else {
				$query->is_page = false;
				$query->is_singular = false;
			}
		}
		return true;
	}
	return $preempt;
}
add_filter('pre_handle_404', 'anp_prevent_custom_pages_404', 10, 2);

function anp_custom_templates_routing($template) {
	if (is_admin()) {
		return $template;
	}

	$custom_page = get_query_var('anp_custom_page');
	$request_uri = $_SERVER['REQUEST_URI'] ?? '';
	$path = trim((string) parse_url($request_uri, PHP_URL_PATH), '/');
	$segments = explode('/', $path);
	$slug = end($segments);

	if ($custom_page === 'contact' || in_array($slug, array('lien-he', 'contact'), true)) {
		$contact_tpl = locate_template(array('page-contact.php'));
		if ($contact_tpl) {
			status_header(200);
			global $wp_query;
			if ($wp_query) {
				$wp_query->is_404  = false;
				$wp_query->is_page     = false;
				$wp_query->is_singular = false;
			}
			return $contact_tpl;
		}
	}

	if ($custom_page === 'faq' || in_array($slug, array('hoi-dap', 'faq'), true)) {
		$faq_tpl = locate_template(array('page-faq.php'));
		if ($faq_tpl) {
			status_header(200);
			global $wp_query;
			if ($wp_query) {
				$wp_query->is_404  = false;
				$wp_query->is_page     = false;
				$wp_query->is_singular = false;
			}
			return $faq_tpl;
		}
	}

	if ($custom_page === 'blog' || in_array($slug, array('tin-tuc', 'blog'), true)) {
		$blog_tpl = locate_template(array('index.php', 'archive.php'));
		if ($blog_tpl) {
			status_header(200);
			global $wp_query;
			if ($wp_query) {
				$wp_query->is_404        = false;
				$wp_query->is_home       = true;
				$wp_query->is_posts_page = true;
			}
			return $blog_tpl;
		}
	}

	return $template;
}
add_filter('template_include', 'anp_custom_templates_routing', 99);
