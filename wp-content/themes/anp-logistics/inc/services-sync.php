<?php
/**
 * Đồng bộ nội dung dịch vụ vào CPT, đọc nội dung theo ngôn ngữ, và ô nhập SEO/song ngữ trong admin.
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Ghi nội dung từ services-content.php vào các bài dịch vụ.
 * Chỉ chạy khi số phiên bản nội dung thay đổi (xem ANP_SERVICE_CONTENT_VERSION).
 * Lưu ý: sẽ ghi đè nội dung đã sửa trong admin của các trường được quản lý ở đây.
 */
function anp_sync_service_content() {
	if (get_option('anp_service_content_version') === ANP_SERVICE_CONTENT_VERSION) {
		return;
	}

	$lib   = anp_service_library();
	$order = 1;
	foreach ($lib as $key => $item) {
		$post_id = anp_find_service_post($key);
		$vi      = $item['vi'];
		$en      = $item['en'];

		$data = array(
			'post_type'    => 'anp_service',
			'post_status'  => 'publish',
			'post_title'   => $vi['title'],
			'post_excerpt' => $vi['excerpt'],
			'post_content' => $vi['body'],
			'post_name'    => $item['slug'],
			'menu_order'   => $order++,
		);
		if ($post_id) {
			$data['ID'] = $post_id;
			$post_id    = wp_update_post($data, true);
		} else {
			$post_id = wp_insert_post($data, true);
		}
		if (!$post_id || is_wp_error($post_id)) {
			continue;
		}

		update_post_meta($post_id, '_anp_key', $key);
		update_post_meta($post_id, '_anp_icon', $item['icon']);
		update_post_meta($post_id, '_anp_title_en', $en['title']);
		update_post_meta($post_id, '_anp_excerpt_en', $en['excerpt']);
		update_post_meta($post_id, '_anp_content_en', $en['body']);
		update_post_meta($post_id, '_anp_meta_title', $vi['meta_title']);
		update_post_meta($post_id, '_anp_meta_title_en', $en['meta_title']);
		update_post_meta($post_id, '_anp_meta_desc', $vi['meta_desc']);
		update_post_meta($post_id, '_anp_meta_desc_en', $en['meta_desc']);
		update_post_meta($post_id, '_anp_keyword', $vi['keyword']);
		update_post_meta($post_id, '_anp_faq_vi', $vi['faq']);
		update_post_meta($post_id, '_anp_faq_en', $en['faq']);
	}

	update_option('anp_service_content_version', ANP_SERVICE_CONTENT_VERSION);
}
add_action('init', 'anp_sync_service_content', 30);

/** Tìm bài dịch vụ: theo khóa _anp_key, nếu chưa có thì theo icon (bài tạo từ phiên bản cũ). */
function anp_find_service_post($key) {
	$found = get_posts(array(
		'post_type'   => 'anp_service',
		'post_status' => 'any',
		'numberposts' => 1,
		'fields'      => 'ids',
		'meta_key'    => '_anp_key',
		'meta_value'  => $key,
	));
	if (!empty($found)) {
		return (int) $found[0];
	}

	$icon  = isset(anp_service_library()[$key]['icon']) ? anp_service_library()[$key]['icon'] : $key;
	$found = get_posts(array(
		'post_type'   => 'anp_service',
		'post_status' => 'any',
		'numberposts' => 1,
		'fields'      => 'ids',
		'meta_key'    => '_anp_icon',
		'meta_value'  => $icon,
	));
	return !empty($found) ? (int) $found[0] : 0;
}

/**
 * Đọc một trường nội dung dịch vụ theo ngôn ngữ đang xem.
 * Trường: title, excerpt, body, faq, meta_title, meta_desc, keyword.
 * Bản tiếng Anh trống thì dùng bản tiếng Việt.
 */
function anp_service_field($post_id, $field) {
	$en_map = array(
		'title'      => '_anp_title_en',
		'excerpt'    => '_anp_excerpt_en',
		'body'       => '_anp_content_en',
		'faq'        => '_anp_faq_en',
		'meta_title' => '_anp_meta_title_en',
		'meta_desc'  => '_anp_meta_desc_en',
	);
	$vi_map = array(
		'title'      => null,
		'excerpt'    => null,
		'body'       => null,
		'faq'        => '_anp_faq_vi',
		'meta_title' => '_anp_meta_title',
		'meta_desc'  => '_anp_meta_desc',
		'keyword'    => '_anp_keyword',
	);

	if (anp_lang() === 'en' && isset($en_map[$field])) {
		$en = get_post_meta($post_id, $en_map[$field], true);
		if ($en !== '' && $en !== false) {
			return $en;
		}
	}

	switch ($field) {
		case 'title':
			return get_the_title($post_id);
		case 'excerpt':
			$post = get_post($post_id);
			return $post->post_excerpt !== '' ? $post->post_excerpt : wp_trim_words(wp_strip_all_tags($post->post_content), 30);
		case 'body':
			return get_post_field('post_content', $post_id);
		default:
			$key = isset($vi_map[$field]) ? $vi_map[$field] : null;
			return $key ? (string) get_post_meta($post_id, $key, true) : '';
	}
}

/** Tách "Câu hỏi | Trả lời" từng dòng thành mảng. */
function anp_parse_qa($raw) {
	$items = array();
	foreach (preg_split('/\r\n|\r|\n/', (string) $raw) as $line) {
		$parts = array_map('trim', explode('|', $line, 2));
		if (count($parts) === 2 && $parts[0] !== '' && $parts[1] !== '') {
			$items[] = array('q' => $parts[0], 'a' => $parts[1]);
		}
	}
	return $items;
}

/* ---------- Ô nhập trong admin (dưới tiêu đề trang dịch vụ) ---------- */

function anp_service_content_metabox() {
	add_meta_box('anp_service_seo', 'SEO và nội dung song ngữ', 'anp_service_content_metabox_html', 'anp_service', 'normal', 'default');
}
add_action('add_meta_boxes', 'anp_service_content_metabox');

function anp_service_content_metabox_html($post) {
	wp_nonce_field('anp_service_seo', 'anp_service_seo_nonce');

	$fields = array(
		'_anp_meta_title'    => array('Thẻ tiêu đề SEO (tiếng Việt, tối đa 60 ký tự)', 'text'),
		'_anp_meta_title_en' => array('SEO title (English, max 60 characters)', 'text'),
		'_anp_meta_desc'     => array('Mô tả SEO (tiếng Việt, 120 đến 160 ký tự)', 'textarea'),
		'_anp_meta_desc_en'  => array('SEO description (English, 120 to 160 characters)', 'textarea'),
		'_anp_keyword'       => array('Từ khóa chính (tiếng Việt)', 'text'),
		'_anp_faq_vi'        => array('Câu hỏi thường gặp (tiếng Việt, mỗi dòng: Câu hỏi | Trả lời)', 'textarea'),
		'_anp_faq_en'        => array('FAQ (English, mỗi dòng: Question | Answer)', 'textarea'),
		'_anp_content_en'    => array('Nội dung trang (English, HTML: h2, p, ul, ol, li, strong)', 'textarea'),
	);

	foreach ($fields as $key => $f) {
		$value = get_post_meta($post->ID, $key, true);
		echo '<p><label><strong>' . esc_html($f[0]) . '</strong><br>';
		if ($f[1] === 'textarea') {
			$rows = $key === '_anp_content_en' ? 14 : 4;
			printf('<textarea name="%s" rows="%d" class="widefat">%s</textarea>', esc_attr($key), (int) $rows, esc_textarea($value));
		} else {
			printf('<input type="text" name="%s" class="widefat" value="%s">', esc_attr($key), esc_attr($value));
		}
		echo '</label></p>';
	}
	echo '<p class="description">Nội dung tiếng Việt của trang nằm ở ô soạn thảo chính phía trên. Để trống bản tiếng Anh thì trang hiển thị tiếng Việt.</p>';
}

function anp_service_content_save($post_id) {
	if (!isset($_POST['anp_service_seo_nonce']) || !wp_verify_nonce($_POST['anp_service_seo_nonce'], 'anp_service_seo')) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	$text_keys = array('_anp_meta_title', '_anp_meta_title_en', '_anp_keyword');
	$area_keys = array('_anp_meta_desc', '_anp_meta_desc_en', '_anp_faq_vi', '_anp_faq_en');
	$html_key  = '_anp_content_en';

	foreach ($text_keys as $key) {
		if (isset($_POST[$key])) {
			update_post_meta($post_id, $key, sanitize_text_field(wp_unslash($_POST[$key])));
		}
	}
	foreach ($area_keys as $key) {
		if (isset($_POST[$key])) {
			update_post_meta($post_id, $key, sanitize_textarea_field(wp_unslash($_POST[$key])));
		}
	}
	if (isset($_POST[$html_key])) {
		update_post_meta($post_id, $html_key, wp_kses_post(wp_unslash($_POST[$html_key])));
	}
}
add_action('save_post_anp_service', 'anp_service_content_save');
