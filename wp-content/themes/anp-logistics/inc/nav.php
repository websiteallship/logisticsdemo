<?php
/**
 * Menu thả xuống cho mục "Dịch vụ": lấy danh sách từ các bài dịch vụ (CPT), tự cập nhật khi thêm hoặc đổi dịch vụ.
 *
 * - Nếu trong Giao diện > Menu đã có mục con dưới "Dịch vụ", theme giữ nguyên mục con của bạn.
 * - Nếu chưa có, theme tự thêm các dịch vụ làm mục con.
 */

if (!defined('ABSPATH')) {
	exit;
}

/** Mục "Dịch vụ" có phải mục cần mở rộng không: trỏ về trang lưu trữ dịch vụ hoặc neo #dich-vu. */
function anp_is_services_nav_item($url) {
	$url     = untrailingslashit((string) $url);
	$archive = untrailingslashit((string) get_post_type_archive_link('anp_service'));
	$anchor  = untrailingslashit(home_url('/#dich-vu'));
	return $url !== '' && ($url === $archive || $url === $anchor || $url === untrailingslashit(home_url('/#dich-vu')));
}

/** Tạo một mục menu giả (không lưu trong database) cho từng dịch vụ. */
function anp_make_nav_child($parent, $index, $title, $url) {
	$item                   = new stdClass();
	$item->ID               = -1000 - $index;
	$item->db_id            = $item->ID;
	$item->menu_item_parent = $parent->db_id;
	$item->object_id        = 0;
	$item->object           = 'custom';
	$item->type             = 'custom';
	$item->type_label       = 'Custom Link';
	$item->title            = $title;
	$item->url              = $url;
	$item->target           = '';
	$item->attr_title       = '';
	$item->description      = '';
	$item->xfn              = '';
	$item->status           = 'publish';
	$item->current          = false;
	$item->current_item_ancestor = false;
	$item->current_item_parent   = false;
	$item->classes          = array('menu-item', 'menu-item-type-custom');
	return $item;
}

/** Thêm các dịch vụ làm mục con cho mục "Dịch vụ" trong menu chính. */
function anp_nav_services_children($items, $args) {
	if (!isset($args->theme_location) || $args->theme_location !== 'primary') {
		return $items;
	}

	// Đã có mục con do người quản trị tạo thì giữ nguyên.
	$has_children = array();
	foreach ($items as $item) {
		if (!empty($item->menu_item_parent)) {
			$has_children[$item->menu_item_parent] = true;
		}
	}

	$services = anp_service_items(20);
	if (!$services) {
		return $items;
	}

	$result = array();
	foreach ($items as $item) {
		$result[] = $item;
		if (!anp_is_services_nav_item($item->url) || isset($has_children[$item->db_id])) {
			continue;
		}

		$item->classes[] = 'menu-item-has-children';
		foreach ($services as $i => $s) {
			$result[] = anp_make_nav_child($item, $i, $s['title'], $s['url']);
		}
	}
	return $result;
}
add_filter('wp_nav_menu_objects', 'anp_nav_services_children', 10, 2);

/** Tự động trỏ các mục menu có neo #lien-he và #hoi-dap về trang riêng /lien-he/ và /hoi-dap/. */
function anp_filter_nav_menu_urls($items) {
	if (!is_array($items)) {
		return $items;
	}
	$contact_page = get_page_by_path('lien-he') ?: get_page_by_path('contact');
	$contact_url  = $contact_page ? get_permalink($contact_page) : home_url('/lien-he/');
	$faq_page     = get_page_by_path('hoi-dap') ?: get_page_by_path('faq');
	$faq_url      = $faq_page ? get_permalink($faq_page) : home_url('/hoi-dap/');

	foreach ($items as $item) {
		$url = rtrim((string) $item->url, '/');
		if ($url === home_url('/#lien-he') || $item->url === '#lien-he') {
			$item->url = $contact_url;
		} elseif ($url === home_url('/#hoi-dap') || $item->url === '#hoi-dap') {
			$item->url = $faq_url;
		}
	}
	return $items;
}
add_filter('wp_nav_menu_objects', 'anp_filter_nav_menu_urls', 15);
