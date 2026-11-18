<?php
/**
 * Đa ngôn ngữ (Việt / Anh).
 * - Ngôn ngữ đang xem: ?lang=vi|en (lưu vào cookie), mặc định lấy từ Customizer.
 * - Nội dung doanh nghiệp, trang chủ, dịch vụ: lấy từ Customizer / CPT, không hardcode.
 * - Nhãn giao diện (nút, tiêu đề mục, thông báo): lấy từ anp_strings() bên dưới.
 */

if (!defined('ABSPATH')) {
	exit;
}

/** Ngôn ngữ đang hiển thị: 'vi' hoặc 'en'. */
function anp_lang() {
	static $lang = null;
	if ($lang !== null) {
		return $lang;
	}

	$default = get_theme_mod('anp_default_lang', 'vi');
	$lang    = in_array($default, array('vi', 'en'), true) ? $default : 'vi';

	$candidate = '';
	if (isset($_GET['lang'])) {
		$candidate = sanitize_key(wp_unslash($_GET['lang']));
	} elseif (isset($_COOKIE['anp_lang'])) {
		$candidate = sanitize_key(wp_unslash($_COOKIE['anp_lang']));
	}
	if (in_array($candidate, array('vi', 'en'), true)) {
		$lang = $candidate;
	}
	return $lang;
}

/** Ghi cookie ngôn ngữ khi người dùng chọn (phải chạy trước khi có output). */
function anp_set_lang_cookie() {
	if (!isset($_GET['lang'])) {
		return;
	}
	$lang = sanitize_key(wp_unslash($_GET['lang']));
	if (!in_array($lang, array('vi', 'en'), true) || headers_sent()) {
		return;
	}
	setcookie('anp_lang', $lang, array(
		'expires'  => time() + YEAR_IN_SECONDS,
		'path'     => '/',
		'secure'   => is_ssl(),
		'httponly' => false,
		'samesite' => 'Lax',
	));
}
add_action('init', 'anp_set_lang_cookie');

/** Mã locale cho og:locale và thuộc tính lang. */
function anp_locale() {
	return anp_lang() === 'en' ? 'en_US' : 'vi_VN';
}

/** Nhãn giao diện theo ngôn ngữ. Trả về khóa nếu chưa có bản dịch. */
function anp_t($key, $lang = null) {
	$lang    = $lang ? $lang : anp_lang();
	$strings = anp_strings();
	if (!isset($strings[$key])) {
		return $key;
	}
	return isset($strings[$key][$lang]) ? $strings[$key][$lang] : $strings[$key]['vi'];
}

/** Danh sách nhãn (ví dụ các lựa chọn của form). */
function anp_t_list($key, $lang = null) {
	$lang    = $lang ? $lang : anp_lang();
	$strings = anp_strings();
	if (!isset($strings[$key])) {
		return array();
	}
	return isset($strings[$key][$lang]) ? $strings[$key][$lang] : $strings[$key]['vi'];
}

/** Nhãn ngôn ngữ cho nút chuyển đổi (hỗ trợ dark/light theme). */
function anp_lang_switch_markup($theme = 'light') {
	$current = anp_lang();
	$items   = array('vi' => 'VI', 'en' => 'EN');

	if ($theme === 'dark') {
		echo '<div class="inline-flex shrink-0 items-center gap-1.5 text-xs font-semibold text-slate-300" role="group" aria-label="Language">';
		$first = true;
		foreach ($items as $code => $label) {
			if (!$first) {
				echo '<span class="text-white/25 select-none" aria-hidden="true">|</span>';
			}
			$first  = false;
			$active = $code === $current;
			printf(
				'<a href="%1$s" hreflang="%2$s" lang="%2$s" class="px-1.5 py-0.5 rounded transition %3$s"%4$s>%5$s</a>',
				esc_url(add_query_arg('lang', $code)),
				esc_attr($code),
				$active ? 'bg-accent/20 text-accent font-bold ring-1 ring-accent/30' : 'hover:text-white',
				$active ? ' aria-current="true"' : '',
				esc_html($label)
			);
		}
		echo '</div>';
		return;
	}

	echo '<div class="inline-flex shrink-0 overflow-hidden rounded-lg border border-slate-200 text-xs font-bold" role="group" aria-label="Language">';
	foreach ($items as $code => $label) {
		$active = $code === $current;
		printf(
			'<a href="%1$s" hreflang="%2$s" lang="%2$s" class="px-2.5 py-1.5 transition %3$s"%4$s>%5$s</a>',
			esc_url(add_query_arg('lang', $code)),
			esc_attr($code),
			$active ? 'bg-brand text-white' : 'text-slate-600 hover:bg-slate-100',
			$active ? ' aria-current="true"' : '',
			esc_html($label)
		);
	}
	echo '</div>';
}

/** Từ điển nhãn giao diện. Chỉnh tại đây khi cần đổi chữ của nút, tiêu đề mục, thông báo. */
function anp_strings() {
	return array(
		// Chung
		'skip_nav'         => array('vi' => 'Bỏ qua điều hướng', 'en' => 'Skip to content'),
		'nav_main'         => array('vi' => 'Điều hướng chính', 'en' => 'Main navigation'),
		'home'             => array('vi' => 'Trang chủ', 'en' => 'Home'),
		'open_menu'        => array('vi' => 'Mở menu', 'en' => 'Open menu'),
		'close_menu'       => array('vi' => 'Đóng menu', 'en' => 'Close menu'),
		'get_quote'        => array('vi' => 'Nhận báo giá', 'en' => 'Get a quote'),
		'view_services'    => array('vi' => 'Xem dịch vụ', 'en' => 'View services'),
		'learn_more'       => array('vi' => 'Tìm hiểu thêm', 'en' => 'Learn more'),
		'view_all'         => array('vi' => 'Xem tất cả', 'en' => 'View all'),
		'view_map'         => array('vi' => 'Xem bản đồ', 'en' => 'View map'),
		'send_request'     => array('vi' => 'Gửi yêu cầu', 'en' => 'Send request'),
		'no_content'       => array('vi' => 'Chưa có nội dung.', 'en' => 'No content yet.'),
		'rights'           => array('vi' => 'Bảo lưu mọi quyền.', 'en' => 'All rights reserved.'),

		// Menu dự phòng
		'menu_home'        => array('vi' => 'Trang chủ', 'en' => 'Home'),
		'menu_about'       => array('vi' => 'Giới thiệu', 'en' => 'About'),
		'menu_services'    => array('vi' => 'Dịch vụ', 'en' => 'Services'),
		'menu_process'     => array('vi' => 'Quy trình', 'en' => 'Process'),
		'menu_news'        => array('vi' => 'Tin tức', 'en' => 'News'),
		'menu_faq'         => array('vi' => 'Hỏi đáp', 'en' => 'FAQ'),
		'menu_contact'     => array('vi' => 'Liên hệ', 'en' => 'Contact'),

		// Hero (bảng minh họa Live Tracking)
		'panel_label'        => array('vi' => 'Lô hàng xuất khẩu', 'en' => 'Export shipment'),
		'panel_status'       => array('vi' => 'Hồ sơ đang xử lý', 'en' => 'Documents in progress'),
		'panel_badge'        => array('vi' => 'Đang vận chuyển', 'en' => 'In Transit'),
		'panel_route_origin' => array('vi' => 'Cát Lái (VNSGN)', 'en' => 'Cat Lai (VNSGN)'),
		'panel_route_dest'   => array('vi' => 'Rotterdam (NLRTM)', 'en' => 'Rotterdam (NLRTM)'),
		'panel_cargo'        => array('vi' => 'Container 40ft HC • 24.5 Tấn', 'en' => '40ft HC FCL • 24.5 Tons'),
		'panel_step1_time'   => array('vi' => '08:30 • Hoàn tất', 'en' => '08:30 • Done'),
		'panel_step2_time'   => array('vi' => '11:15 • Luồng xanh', 'en' => '11:15 • Cleared'),
		'panel_step3_time'   => array('vi' => '14:20 • Đang tới cảng', 'en' => '14:20 • En route'),
		'panel_step4_time'   => array('vi' => 'ETD: 20:00 tối nay', 'en' => 'ETD: 20:00 Tonight'),
		'step1_t'            => array('vi' => 'Tiếp nhận hồ sơ', 'en' => 'Documents received'),
		'step1_s'            => array('vi' => 'Chứng từ & B/L đã kiểm tra', 'en' => 'Documents & B/L verified'),
		'step2_t'            => array('vi' => 'Khai báo hải quan', 'en' => 'Customs declaration'),
		'step2_s'            => array('vi' => 'Thông quan điện tử thành công', 'en' => 'Electronic clearance approved'),
		'step3_t'            => array('vi' => 'Vận chuyển nội địa', 'en' => 'Domestic transport'),
		'step3_s'            => array('vi' => 'Xe container 51C-842.19 vào bãi', 'en' => 'Truck 51C-842.19 entering port'),
		'step4_t'            => array('vi' => 'Xếp tàu & xuất cảng', 'en' => 'Vessel loading & departure'),
		'step4_s'            => array('vi' => 'Tàu Evergreen A-Class (Chặng 1)', 'en' => 'Evergreen A-Class (Leg 1)'),

		// Hero Slider (Ambient Timeline)
		'hero_slide_1_label' => array('vi' => '01. Vận tải biển', 'en' => '01. Ocean Freight'),
		'hero_slide_1_sub'   => array('vi' => 'Cát Lái', 'en' => 'Cat Lai Port'),
		'hero_slide_2_label' => array('vi' => '02. Đường hàng không', 'en' => '02. Air Freight'),
		'hero_slide_2_sub'   => array('vi' => 'Tân Sơn Nhất', 'en' => 'SGN Cargo'),
		'hero_slide_3_label' => array('vi' => '03. Kho bãi & CFS', 'en' => '03. Warehousing'),
		'hero_slide_3_sub'   => array('vi' => 'Lưu kho', 'en' => 'Storage'),
		'hero_slide_4_label' => array('vi' => '04. Vận hành 24/7', 'en' => '04. 24/7 Operations'),
		'hero_slide_4_sub'   => array('vi' => 'Xuyên đêm', 'en' => 'Overnight'),

		// Giới thiệu
		'about_label'      => array('vi' => 'Về chúng tôi', 'en' => 'About us'),
		'mission_label'    => array('vi' => 'Sứ mệnh', 'en' => 'Mission'),
		'vision_label'     => array('vi' => 'Tầm nhìn', 'en' => 'Vision'),
		'card_customs_t'   => array('vi' => 'Chuyên môn hải quan', 'en' => 'Customs expertise'),
		'card_customs_s'   => array('vi' => 'Đội ngũ hiểu rõ giao nhận và khai báo, theo sát chính sách quản lý từng nhóm hàng.', 'en' => 'Our team knows forwarding and declarations well and tracks the rules for each cargo group.'),
		'card_network_t'   => array('vi' => 'Mạng lưới đại lý', 'en' => 'Agent network'),
		'card_network_s'   => array('vi' => 'Đại lý tại nhiều quốc gia, mở rộng theo nhu cầu các tuyến hàng.', 'en' => 'Agents in multiple countries, expanding with our trade lanes.'),
		'year_founded'     => array('vi' => 'Năm thành lập', 'en' => 'Year founded'),

		// Các mục trang chủ
		'services_label'   => array('vi' => 'Dịch vụ', 'en' => 'Services'),
		'process_label'    => array('vi' => 'Quy trình làm việc', 'en' => 'How we work'),
		'news_label'       => array('vi' => 'Tin tức', 'en' => 'News'),
		'breadcrumb'       => array('vi' => 'Đường dẫn', 'en' => 'Breadcrumb'),
		'related_services' => array('vi' => 'Dịch vụ liên quan', 'en' => 'Related services'),
		'service_cta_title' => array('vi' => 'Cần báo giá cho lô hàng của bạn?', 'en' => 'Need a quote for your shipment?'),
		'service_cta_text' => array('vi' => 'Gửi thông tin lô hàng, chúng tôi phản hồi với phương án và báo giá rõ từng khoản phí.', 'en' => 'Send us your shipment details. We will reply with a plan and a quote that itemises every charge.'),
		'service_faq_label' => array('vi' => 'Hỏi đáp về dịch vụ', 'en' => 'Questions about this service'),
		'partners_label'   => array('vi' => 'Đối tác', 'en' => 'Partners'),
		'partners_title'   => array('vi' => 'Hãng tàu, hãng bay và đối tác đồng hành', 'en' => 'Shipping lines, airlines and partners we work with'),
		'faq_label'        => array('vi' => 'Hỏi đáp', 'en' => 'FAQ'),
		'contact_label'    => array('vi' => 'Liên hệ', 'en' => 'Contact'),
		'news_pad_title'   => array('vi' => 'Cập nhật mới nhất', 'en' => 'Latest updates'),
		'faq_pad_hint'     => array('vi' => 'Chưa thấy câu trả lời cần tìm? Gửi yêu cầu và chúng tôi phản hồi trong giờ làm việc.', 'en' => 'Cannot find your answer? Send a request and we will reply during working hours.'),

		// Liên hệ & thông tin doanh nghiệp
		'hotline'          => array('vi' => 'Hotline', 'en' => 'Hotline'),
		'email'            => array('vi' => 'Email', 'en' => 'Email'),
		'head_office'      => array('vi' => 'Trụ sở', 'en' => 'Head office'),
		'rep_office'       => array('vi' => 'Văn phòng đại diện', 'en' => 'Representative office'),
		'working_hours'    => array('vi' => 'Giờ làm việc', 'en' => 'Working hours'),
		'website'          => array('vi' => 'Website', 'en' => 'Website'),
		'links'            => array('vi' => 'Liên kết', 'en' => 'Quick links'),
		'footer_contact'   => array('vi' => 'Liên hệ', 'en' => 'Contact'),
		'tax_info'         => array('vi' => 'Thông tin doanh nghiệp', 'en' => 'Company information'),
		'legal_name'       => array('vi' => 'Tên pháp lý', 'en' => 'Legal name'),
		'tax_code'         => array('vi' => 'Mã số thuế', 'en' => 'Tax code'),
		'tax_address'      => array('vi' => 'Địa chỉ đăng ký thuế', 'en' => 'Registered tax address'),
		'legal_rep'        => array('vi' => 'Người đại diện pháp luật', 'en' => 'Legal representative'),
		'license_no'       => array('vi' => 'Số Giấy chứng nhận ĐKDN', 'en' => 'Business registration no.'),
		'license_date'     => array('vi' => 'Ngày cấp', 'en' => 'Issued on'),
		'license_issuer'   => array('vi' => 'Nơi cấp', 'en' => 'Issued by'),

		// Form báo giá
		'f_name'           => array('vi' => 'Họ và tên', 'en' => 'Full name'),
		'f_company'        => array('vi' => 'Công ty', 'en' => 'Company'),
		'f_phone'          => array('vi' => 'Số điện thoại', 'en' => 'Phone'),
		'f_email'          => array('vi' => 'Email', 'en' => 'Email'),
		'f_service'        => array('vi' => 'Dịch vụ quan tâm', 'en' => 'Service of interest'),
		'f_message'        => array('vi' => 'Thông tin lô hàng', 'en' => 'Shipment details'),
		'f_message_ph'     => array('vi' => 'Loại hàng, tuyến đường, khối lượng, thời gian mong muốn...', 'en' => 'Cargo type, route, weight, preferred timing...'),
		'f_privacy'        => array('vi' => 'Thông tin của bạn chỉ dùng để trả lời yêu cầu.', 'en' => 'Your information is used only to answer your request.'),
		'f_required'       => array('vi' => 'bắt buộc', 'en' => 'required'),
		'f_honeypot'       => array('vi' => 'Website', 'en' => 'Website'),
		'f_ok'             => array('vi' => 'Cảm ơn bạn. Chúng tôi đã nhận yêu cầu và sẽ liên hệ sớm.', 'en' => 'Thank you. We have received your request and will be in touch shortly.'),
		'f_err'            => array('vi' => 'Gửi chưa thành công. Vui lòng kiểm tra họ tên, số điện thoại, email và thử lại, hoặc gọi hotline.', 'en' => 'Your request was not sent. Please check your name, phone and email and try again, or call the hotline.'),
		'service_options'  => array(
			'vi' => array('Khai báo hải quan', 'Vận chuyển nội địa', 'Vận chuyển đường biển', 'Vận chuyển đường không', 'Kho bãi & xếp dỡ', 'Hàng dự án', 'Khác'),
			'en' => array('Customs declaration', 'Domestic transport', 'Sea freight', 'Air freight', 'Warehousing & handling', 'Project cargo', 'Other'),
		),

		// 404 & lưu trữ
		'err404_label'     => array('vi' => 'Lỗi 404', 'en' => 'Error 404'),
		'err404_title'     => array('vi' => 'Không tìm thấy trang này', 'en' => 'Page not found'),
		'err404_text'      => array('vi' => 'Đường dẫn có thể đã thay đổi. Bạn quay lại trang chủ hoặc xem các dịch vụ của chúng tôi.', 'en' => 'The link may have changed. Go back to the homepage or browse our services.'),
		'back_home'        => array('vi' => 'Về trang chủ', 'en' => 'Back to home'),
		'news_title'       => array('vi' => 'Tin tức', 'en' => 'News'),

		// Ảnh: mô tả thay thế (alt) và ghi công
		'alt_hero'         => array('vi' => 'Cẩu container và tàu hàng cập cầu cảng', 'en' => 'Container cranes and a cargo ship at the quay'),
		'alt_port'         => array('vi' => 'Toàn cảnh khu cảng container nhìn từ trên cao', 'en' => 'Aerial view of a container terminal'),
		'alt_road'         => array('vi' => 'Xe đầu kéo chở container trên đường', 'en' => 'Tractor truck hauling a container on the road'),
		'alt_sea'          => array('vi' => 'Tàu container cập cầu cảng', 'en' => 'Container ship alongside the quay'),
		'alt_air'          => array('vi' => 'Máy bay chở hàng đỗ tại sân bay', 'en' => 'Cargo aircraft parked at an airport'),
		'alt_warehouse'    => array('vi' => 'Lối đi giữa các kệ pallet trong kho', 'en' => 'Aisle between pallet racks in a warehouse'),
		'alt_project'      => array('vi' => 'Xe chuyên dụng chở cánh turbine gió quá khổ', 'en' => 'Specialised truck carrying an oversize wind turbine blade'),
		'alt_night'        => array('vi' => 'Cảng container về đêm', 'en' => 'Container terminal at night'),
		'photo_credits'    => array('vi' => 'Ảnh minh họa', 'en' => 'Photos'),
		'services_photo_cta' => array('vi' => 'Xem chi tiết', 'en' => 'View details'),

		// Email gửi về quản trị (luôn tiếng Việt)
		'mail_subject'     => array('vi' => 'Yêu cầu báo giá mới - %s', 'en' => 'New quote request - %s'),
		'mail_intro'       => array('vi' => 'Yêu cầu báo giá mới từ website %s', 'en' => 'New quote request from the %s website'),
		'mail_name'        => array('vi' => 'Họ tên', 'en' => 'Name'),
		'mail_company'     => array('vi' => 'Công ty', 'en' => 'Company'),
		'mail_phone'       => array('vi' => 'Điện thoại', 'en' => 'Phone'),
		'mail_email'       => array('vi' => 'Email', 'en' => 'Email'),
		'mail_service'     => array('vi' => 'Dịch vụ quan tâm', 'en' => 'Service'),
		'mail_content'     => array('vi' => 'Nội dung', 'en' => 'Details'),

		// llms.txt
		'llms_company'     => array('vi' => 'Thông tin doanh nghiệp', 'en' => 'Company information'),
		'llms_founded'     => array('vi' => 'Thành lập', 'en' => 'Founded'),
		'llms_services'    => array('vi' => 'Dịch vụ', 'en' => 'Services'),
		'llms_faq'         => array('vi' => 'Câu hỏi thường gặp', 'en' => 'Frequently asked questions'),
		'llms_pages'       => array('vi' => 'Trang chính', 'en' => 'Main pages'),
		'llms_tax_code'    => array('vi' => 'Mã số thuế', 'en' => 'Tax code'),
	);
}
