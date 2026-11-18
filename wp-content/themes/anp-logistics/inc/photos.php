<?php
/**
 * Thư viện ảnh của theme.
 * Ảnh thật, có giấy phép mở (Wikimedia Commons). Đây là ảnh minh họa tạm thời: thay bằng ảnh của chính doanh nghiệp
 * bằng cách gắn Ảnh đại diện cho từng Dịch vụ, hoặc tải ảnh trong Customizer (Trang chủ).
 */

if (!defined('ABSPATH')) {
	exit;
}

/** Danh sách ảnh: tên tệp (không đuôi), kích thước tệp 960px, thông tin tác giả và giấy phép. */
function anp_photos() {
	return array(
		'hero' => array(
			'base' => 'hero', 'widths' => array(500, 960, 1280), 'w' => 1280, 'h' => 853,
			'by' => 'Niels Johannes', 'licence' => 'CC BY-SA 4.0',
			'url' => 'https://commons.wikimedia.org/wiki/File:Seaforth_Container_Terminal_2022.jpg',
		),
		'port' => array(
			'base' => 'port', 'widths' => array(500, 960), 'w' => 960, 'h' => 600,
			'by' => 'Tom Fisk / Unsplash', 'licence' => 'Unsplash License',
			'url' => 'https://unsplash.com/photos/photo-1578575437130-527eed3abbec',
		),
		'road' => array(
			'base' => 'road', 'widths' => array(500, 960), 'w' => 960, 'h' => 600,
			'by' => 'Marcin Jozwiak / Unsplash', 'licence' => 'Unsplash License',
			'url' => 'https://unsplash.com/photos/photo-1601584115197-04ecc0da31d7',
		),
		'sea' => array(
			'base' => 'sea', 'widths' => array(500, 960), 'w' => 960, 'h' => 600,
			'by' => 'Ian Taylor / Unsplash', 'licence' => 'Unsplash License',
			'url' => 'https://unsplash.com/photos/photo-1542296332-2e4473faf563',
		),
		'air' => array(
			'base' => 'air', 'widths' => array(500, 960), 'w' => 960, 'h' => 600,
			'by' => 'Vitor Fontes / Unsplash', 'licence' => 'Unsplash License',
			'url' => 'https://unsplash.com/photos/photo-1570710891163-6d3b5c47248b',
		),
		'warehouse' => array(
			'base' => 'warehouse', 'widths' => array(500, 960), 'w' => 960, 'h' => 600,
			'by' => 'Petar Petkovski / Unsplash', 'licence' => 'Unsplash License',
			'url' => 'https://unsplash.com/photos/photo-1586528116311-ad8dd3c8310d',
		),
		'project' => array(
			'base' => 'project', 'widths' => array(500, 960), 'w' => 960, 'h' => 600,
			'by' => 'CHUTTERSNAP / Unsplash', 'licence' => 'Unsplash License',
			'url' => 'https://unsplash.com/photos/photo-1587293852726-70cdb56c2866',
		),
		'night' => array(
			'base' => 'night', 'widths' => array(500, 960), 'w' => 960, 'h' => 640,
			'by' => 'Huhu Uet', 'licence' => 'CC BY-SA 4.0',
			'url' => 'https://commons.wikimedia.org/wiki/File:Container_Terminal_Tollerort_02.jpg',
		),
	);
}

/**
 * Logo đối tác, copy từ website anplogistics.com (mục Đối tác). Đây là logo thương hiệu của bên thứ ba:
 * chỉ giữ khi doanh nghiệp xác nhận đang hợp tác với các đối tác này.
 */
function anp_partners() {
	return array(
		array('file' => 'partner-1.jpg', 'name' => 'MOL Logistics'),
		array('file' => 'partner-2.jpg', 'name' => 'APL'),
		array('file' => 'partner-3.jpg', 'name' => 'COSCO'),
		array('file' => 'partner-4.jpg', 'name' => 'Maersk Line'),
		array('file' => 'partner-5.jpg', 'name' => 'Yang Ming'),
		array('file' => 'partner-6.jpg', 'name' => 'TMC'),
		array('file' => 'partner-7.jpg', 'name' => 'Desig'),
		array('file' => 'partner-8.jpg', 'name' => 'DHL'),
		array('file' => 'partner-9.jpg', 'name' => 'CMA CGM'),
		array('file' => 'partner-10.jpg', 'name' => 'ANA'),
		array('file' => 'partner-11.jpg', 'name' => 'Delta'),
		array('file' => 'partner-12.jpg', 'name' => 'Malaysia Airlines'),
		array('file' => 'partner-13.jpg', 'name' => 'KMTC'),
		array('file' => 'partner-14.jpg', 'name' => 'KLM'),
		array('file' => 'partner-15.jpg', 'name' => 'OOCL'),
	);
}

/** Ảnh mặc định theo icon của dịch vụ. */
function anp_photo_key_for_icon($icon) {
	$map = array(
		'customs'   => 'port',
		'truck'     => 'road',
		'ship'      => 'sea',
		'plane'     => 'air',
		'warehouse' => 'warehouse',
		'project'   => 'project',
	);
	return isset($map[$icon]) ? $map[$icon] : 'port';
}

/** URL tệp ảnh theo độ rộng gần nhất có sẵn. */
function anp_photo_url($key, $width = 960) {
	$all = anp_photos();
	if (!isset($all[$key])) {
		return '';
	}
	$widths = $all[$key]['widths'];
	$use    = end($widths);
	foreach ($widths as $w) {
		if ($w >= $width) {
			$use = $w;
			break;
		}
	}
	return get_template_directory_uri() . '/assets/img/' . $all[$key]['base'] . '-' . $use . '.jpg';
}

/**
 * In thẻ <img> có srcset, kích thước cố định (tránh nhảy bố cục), alt theo ngôn ngữ.
 * $opts: class, sizes, eager (bool), alt (ghi đè).
 */
function anp_photo_img($key, $opts = array()) {
	$all = anp_photos();
	if (!isset($all[$key])) {
		return '';
	}
	$p      = $all[$key];
	$opts   = array_merge(array('class' => '', 'sizes' => '100vw', 'eager' => false, 'alt' => null), $opts);
	$alt    = $opts['alt'] !== null ? $opts['alt'] : anp_t('alt_' . $key);
	$base   = get_template_directory_uri() . '/assets/img/' . $p['base'];
	$srcset = array();
	foreach ($p['widths'] as $w) {
		$srcset[] = esc_url($base . '-' . $w . '.jpg') . ' ' . $w . 'w';
	}
	$src = $base . '-' . (in_array(960, $p['widths'], true) ? 960 : end($p['widths'])) . '.jpg';

	return sprintf(
		'<img src="%s" srcset="%s" sizes="%s" width="%d" height="%d" alt="%s" class="%s" loading="%s" decoding="async"%s>',
		esc_url($src),
		implode(', ', $srcset),
		esc_attr($opts['sizes']),
		(int) $p['w'],
		(int) $p['h'],
		esc_attr($alt),
		esc_attr($opts['class']),
		$opts['eager'] ? 'eager' : 'lazy',
		$opts['eager'] ? ' fetchpriority="high"' : ''
	);
}

/** Dòng ghi công ảnh ở chân trang (yêu cầu của giấy phép CC BY / CC BY-SA). */
function anp_photo_credits_markup() {
	$parts = array();
	foreach (anp_photos() as $p) {
		$parts[] = sprintf(
			'<a href="%s" target="_blank" rel="noopener" class="underline decoration-white/30 underline-offset-2 hover:text-white">%s</a> (%s)',
			esc_url($p['url']),
			esc_html($p['by']),
			esc_html($p['licence'])
		);
	}
	return implode(', ', $parts);
}

/**
 * In thẻ <img> cho ảnh riêng của theme (assets/img/<base>-1920.jpg và -960.jpg).
 * $w, $h: kích thước bản lớn; $w_small: chiều rộng bản nhỏ dùng cho màn hình hẹp.
 */
function anp_theme_img($base, $w, $h, $w_small, $alt, $eager = false, $style = '') {
	$uri = get_template_directory_uri() . '/assets/img/' . $base;
	return sprintf(
		'<img src="%s" srcset="%s %dw, %s %dw" sizes="100vw" width="%d" height="%d" alt="%s" class="h-full w-full object-cover" loading="%s" decoding="async"%s%s>',
		esc_url($uri . '-960.jpg'),
		esc_url($uri . '-960.jpg'),
		(int) $w_small,
		esc_url($uri . '-1920.jpg'),
		(int) $w,
		(int) $w,
		(int) $h,
		esc_attr($alt),
		$eager ? 'eager' : 'lazy',
		$eager ? ' fetchpriority="high"' : '',
		$style ? ' style="' . esc_attr($style) . '"' : ''
	);
}
