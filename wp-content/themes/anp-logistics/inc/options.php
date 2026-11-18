<?php
/**
 * Theme options: giá trị mặc định, đọc theo ngôn ngữ, và đăng ký mục "HP Trading - Transport Theme Options" trong Customizer.
 *
 * Quy ước khóa:
 * - Trường song ngữ: có hậu tố _vi và _en (ví dụ anp_brand_name_vi, anp_brand_name_en).
 * - Trường dùng chung: không hậu tố (ví dụ anp_phone, anp_tax_code).
 * Dùng anp_opt('anp_brand_name') để tự chọn đúng bản theo ngôn ngữ đang xem.
 */

if (!defined('ABSPATH')) {
	exit;
}

/** Giá trị mặc định. Trường để trống là chưa có dữ liệu thật: cần khách hàng điền trong Customizer. */
function anp_defaults() {
	return array(
		// Thương hiệu & pháp lý
		'anp_default_lang'        => 'vi',
		'anp_logo'                => '',
		'anp_brand_name_vi'       => 'HP Trading - Transport',
		'anp_brand_name_en'       => 'HP Trading - Transport',
		'anp_company_name_vi'     => 'Công ty TNHH Dịch vụ Logistics hptransport',
		'anp_company_name_en'     => 'hptransport Logistics Services Company Limited',
		'anp_tagline_vi'          => 'Thủ tục rõ ràng, hàng đi an tâm',
		'anp_tagline_en'          => 'Clear procedures, cargo you can trust',
		'anp_industry_vi'         => 'Logistics xuất nhập khẩu',
		'anp_industry_en'         => 'Import–export logistics',
		'anp_founded'             => '2014',
		'anp_tax_code'            => '',
		'anp_tax_address_vi'      => '',
		'anp_tax_address_en'      => '',
		'anp_legal_rep'           => '',
		'anp_legal_rep_title_vi'  => '',
		'anp_legal_rep_title_en'  => '',
		'anp_license_no'          => '',
		'anp_license_date'        => '',
		'anp_license_issuer_vi'   => '',
		'anp_license_issuer_en'   => '',

		// Liên hệ
		'anp_phone'               => '0911221214',
		'anp_phone_display'       => '0911 22 12 14',
		'anp_email'               => 'sales@hptransport.com.vn',
		'anp_zalo'                => 'https://zalo.me/0911221214',
		'anp_facebook'            => 'https://www.facebook.com/profile.php?id=100063850783439',
		'anp_website'             => 'hptransport.com.vn',
		'anp_map_url'             => 'https://www.google.com/maps/search/?api=1&query=Logistics+An+Phat+Thu+Duc+TP.HCM',
		'anp_form_email'          => '',
		'anp_address_hq_vi'       => 'Số 26, Đường số 7, Khu phố 1, P. Bình Trưng Đông, TP. Thủ Đức, TP.HCM',
		'anp_address_hq_en'       => 'No. 26, Street No. 7, Quarter 1, Binh Trung Dong Ward, Thu Duc City, Ho Chi Minh City',
		'anp_address_rep_vi'      => 'Số 11, Đường số 4, Khu phố 5, P. Hiệp Bình Chánh, TP. Thủ Đức, TP.HCM',
		'anp_address_rep_en'      => 'No. 11, Street No. 4, Quarter 5, Hiep Binh Chanh Ward, Thu Duc City, Ho Chi Minh City',
		'anp_hours_vi'            => "Thứ 2 – Thứ 6: 08:00 – 17:30\nThứ 7: 08:00 – 12:00",
		'anp_hours_en'            => "Monday – Friday: 08:00 – 17:30\nSaturday: 08:00 – 12:00",

		// Trang chủ: hero, giới thiệu
		'anp_hero_eyebrow_vi'     => 'Logistics xuất nhập khẩu từ 2014',
		'anp_hero_eyebrow_en'     => 'Import–export logistics since 2014',
		'anp_hero_title_vi'       => 'Thủ tục rõ ràng, hàng đi an tâm',
		'anp_hero_title_en'       => 'Clear procedures, cargo you can trust',
		'anp_hero_subtitle_vi'    => 'Khai báo hải quan, vận tải nội địa, đường biển, đường không và kho bãi. Một đầu mối phụ trách từ cảng đến cửa kho của bạn.',
		'anp_hero_subtitle_en'    => 'Customs declarations, domestic trucking, sea and air freight, and warehousing. One point of contact from the port to your warehouse door.',
		'anp_hero_image'          => '',
		'anp_hero_banner_only'    => true,
		'anp_about_title_vi'      => 'Một đối tác logistics gọn, rõ và đáng tin',
		'anp_about_title_en'      => 'A logistics partner that is clear, organised and reliable',
		'anp_about_text_vi'       => 'HP Trading - Transport thành lập năm 2014, tập trung vào chuỗi logistics cho hàng xuất nhập khẩu. Đội ngũ của chúng tôi am hiểu nghiệp vụ giao nhận và khai báo hải quan, theo sát chính sách quản lý của từng nhóm hàng, và giữ kết nối với mạng lưới đại lý ở nước ngoài.',
		'anp_about_text_en'       => 'HP Trading - Transport was founded in 2014 and focuses on logistics chains for import and export cargo. Our team knows forwarding and customs declarations well, tracks the rules for each cargo group, and stays connected to our overseas agent network.',
		'anp_core_value_vi'       => 'Sự an tâm của khách hàng là giá trị cốt lõi của chúng tôi.',
		'anp_core_value_en'       => 'Our customers peace of mind is our core value.',
		'anp_mission_vi'          => 'Cung cấp giải pháp logistics tổng thể, trọn gói và tích hợp, đáp ứng đúng yêu cầu của từng khách hàng.',
		'anp_mission_en'          => 'Provide complete, integrated logistics solutions that meet the specific needs of each customer.',
		'anp_vision_vi'           => 'Trở thành thương hiệu logistics hàng đầu tại Việt Nam và đối tác tin cậy của các đại lý logistics trên thế giới.',
		'anp_vision_en'           => 'Become a leading logistics brand in Vietnam and a trusted partner for logistics agents worldwide.',

		// Chỉ số
		'anp_stat_countries'      => '20+',
		'anp_stat_countries_label_vi' => 'Quốc gia có đại lý',
		'anp_stat_countries_label_en' => 'Countries with agents',
		'anp_stat_trucks'         => '20+',
		'anp_stat_trucks_label_vi'=> 'Đầu kéo chủ động',
		'anp_stat_trucks_label_en'=> 'Owned tractor trucks',
		'anp_stat_trailers'       => '40',
		'anp_stat_trailers_label_vi' => 'Romooc',
		'anp_stat_trailers_label_en' => 'Trailers',

		// Tiêu đề và nội dung các mục
		'anp_services_title_vi'   => 'Một đầu mối cho toàn bộ chuỗi logistics',
		'anp_services_title_en'   => 'One point of contact for the entire logistics chain',
		'anp_services_lead_vi'    => 'Từ thủ tục hải quan đến vận chuyển và kho bãi, mọi bước đều do một đội ngũ theo dõi xuyên suốt.',
		'anp_services_lead_en'    => 'From customs procedures to transport and warehousing, one team tracks every step.',
		'anp_process_title_vi'    => 'Bốn bước, mỗi lô hàng đều được theo dõi rõ ràng',
		'anp_process_title_en'    => 'Four steps, with every shipment tracked clearly',
		'anp_process_lines_vi'    => "Tiếp nhận yêu cầu | Gửi thông tin lô hàng: loại hàng, tuyến đường và thời gian mong muốn.\nĐề xuất phương án | Chúng tôi đề xuất phương án vận chuyển và báo giá rõ từng khoản phí.\nThực hiện & theo dõi | Điều phối vận tải, khai báo hải quan và cập nhật trạng thái lô hàng.\nBàn giao & đối soát | Bàn giao chứng từ đầy đủ và đối soát chi phí minh bạch sau mỗi lô.",
		'anp_process_lines_en'    => "Receive your request | Send us the cargo details: type, route and preferred timing.\nPropose a plan | We propose a transport plan and quote each fee clearly.\nExecute and track | We arrange transport, the customs declaration and status updates.\nHand over and reconcile | Complete documents are handed over and costs are reconciled transparently after each shipment.",
		'anp_news_title_vi'       => 'Cập nhật ngành logistics',
		'anp_news_title_en'       => 'Logistics industry updates',
		'anp_faq_title_vi'        => 'Câu hỏi thường gặp',
		'anp_faq_title_en'        => 'Frequently asked questions',
		'anp_faq_lead_vi'         => 'Giải đáp chi tiết về thủ tục hải quan, cước vận chuyển quốc tế, thời gian thông quan và quy trình giao nhận hàng hóa tại HP Trading - Transport.',
		'anp_faq_lead_en'         => 'Detailed answers regarding customs procedures, international freight rates, clearance timelines, and delivery workflows at HP Trading - Transport.',
		'anp_faq_lines_vi'        => "HP Trading - Transport cung cấp những nhóm dịch vụ chính nào? | HP Trading - Transport cung cấp trọn gói chuỗi cung ứng xuất nhập khẩu với 5 dịch vụ cốt lõi: Khai báo hải quan điện tử và hoàn tất thủ tục chuyên ngành; Vận chuyển nội địa bằng đội xe đầu kéo và rơ-moóc chuyên dụng giao nhận Door-to-Door; Vận chuyển đường biển (FCL/LCL) và đường hàng không quốc tế; Kho bãi, đóng gói, dán nhãn tem phụ và xếp dỡ tại cảng; Vận chuyển hàng công trình, hàng dự án siêu trường siêu trọng.\nCần chuẩn bị những chứng từ gì để nhận báo giá vận chuyển và thông quan nhanh nhất? | Để nhận bảng báo giá chi tiết và phương án tối ưu trong vòng 30 phút, quý khách chỉ cần cung cấp: Hóa đơn thương mại (Commercial Invoice), Phiếu đóng gói (Packing List) hoặc thông tin cơ bản gồm: tên mặt hàng, mã HS (nếu có), trọng lượng (Gross Weight), kích thước (CBM), cảng đi (POL) – cảng đến (POD), địa chỉ kho nhận và điều kiện thương mại dự kiến (Incoterms như FOB, CIF, EXW, DDP).\nThời gian thực hiện thủ tục khai báo và thông quan hải quan mất bao lâu? | Thời gian thông quan phụ thuộc vào phân luồng của cơ quan hải quan: Với tờ khai Luồng Xanh, hệ thống duyệt điện tử trong 15 – 30 phút; Luồng Vàng (kiểm tra hồ sơ giấy) xử lý từ 2 – 4 giờ làm việc; Luồng Đỏ (kiểm tra thực tế hàng hóa), đội ngũ hiện trường của HP Trading - Transport túc trực tại cảng điều phối mở hàng kiểm hóa ngay trong ngày nhằm hạn chế tối đa phát sinh phí lưu bãi (demurrage/detention).\nHP Trading - Transport có nhận khai báo hải quan cho lô hàng nhỏ, hàng lẻ (LCL) không? | Có. Chúng tôi tiếp nhận từ những kiện hàng mẫu vài kg, quà biếu phi mậu dịch, hàng lẻ ghép container (LCL) cho tới các lô hàng lớn hàng trăm container (FCL). Dù quy mô lô hàng lớn hay nhỏ, HP Trading - Transport đều cử chuyên viên nghiệp vụ phụ trách theo dõi hồ sơ sát sao, kiểm tra biểu thuế ưu đãi (C/O) và tư vấn thủ tục kiểm tra chuyên ngành đầy đủ.\nChi phí dịch vụ logistics được tính như thế nào? Có phát sinh chi phí ẩn không? | Mọi báo giá của HP Trading - Transport đều được lập chi tiết, bóc tách minh bạch từng đầu mục: cước vận chuyển (freight), phụ phí hãng tàu (local charges), phí dịch vụ hải quan, lệ phí nhà nước và phí nâng hạ cảng. Chúng tôi cam kết bằng hợp đồng rõ ràng, xuất hóa đơn VAT hợp lệ và tuyệt đối không phát sinh chi phí ẩn ngoài bảng kê đã thỏa thuận trước với khách hàng.\nHP Trading - Transport có mạng lưới đại lý quốc tế để giao nhận tận nơi (Door-to-Door) không? | HP Trading - Transport sở hữu mạng lưới đối tác đại lý giao nhận uy tín tại hơn 20 quốc gia trọng điểm như Trung Quốc, Hàn Quốc, Nhật Bản, các nước ASEAN, EU và Bắc Mỹ. Nhờ đó, chúng tôi đảm nhận trọn gói dịch vụ Door-to-Door: nhận hàng tại xưởng sản xuất nước ngoài, làm thủ tục xuất khẩu, vận chuyển xuyên biên giới, thông quan tại cảng Việt Nam và đưa hàng an toàn đến tận cửa kho của bạn.\nDoanh nghiệp mới xuất nhập khẩu lần đầu có được hỗ trợ tư vấn thủ tục và mã HS không? | Hoàn toàn có. Đội ngũ chuyên gia của HP Trading - Transport sẵn sàng hỗ trợ miễn phí cho các doanh nghiệp mới: tra cứu áp mã HS code chính xác nhằm tránh rủi ro ấn định thuế, hướng dẫn xin giấy chứng nhận xuất xứ (C/O) để hưởng thuế suất ưu đãi đặc biệt (Form E, D, AK, VK, CPTPP, EVFTA...) và tư vấn xin giấy phép chuyên ngành trước khi nhập hàng về cảng.",
		'anp_faq_lines_en'        => "What core services does HP Trading - Transport provide? | HP Trading - Transport provides end-to-end import-export supply chain solutions covering 5 core pillars: Electronic customs declaration and specialized inspection clearance; Domestic trucking with our owned fleet of tractor trucks and trailers for Door-to-Door delivery; International sea freight (FCL/LCL) and air cargo booking; Warehousing, packing, labeling, and port handling; Oversized, overweight, and project cargo transportation.\nWhat documents do I need to receive a freight and clearance quote quickly? | To receive an accurate quote and optimal route plan within 30 minutes, you only need to provide: Commercial Invoice, Packing List, or basic information including cargo description, HS code (if available), Gross Weight, CBM volume, POL origin port – POD destination port, final warehouse address, and preferred Incoterms (FOB, CIF, EXW, DDP).\nHow long does customs declaration and cargo clearance take? | Clearance timeline depends on the customs inspection lane: Green Lane clears electronically within 15 – 30 minutes; Yellow Lane (document inspection) takes 2 – 4 business hours; Red Lane (physical cargo inspection), HP Trading - Transport field specialists coordinate directly at port gates to complete inspection on the same day, minimizing demurrage and detention charges.\nDoes HP Trading - Transport handle customs clearance for small shipments and LCL cargo? | Yes. We handle everything from small sample packages of a few kilograms, non-commercial gifts, and LCL groupage cargo to large multi-container FCL shipments. Regardless of shipment size, our experienced specialists review documentation closely, verify preferential tariff rates, and guide through necessary compliance permits.\nHow are logistics service fees calculated? Are there any hidden costs? | Every HP Trading - Transport quotation itemizes all components transparently: freight rates, shipping line local charges, customs broker fees, government duties, and terminal handling charges. All terms are formalized in contracts with full VAT invoicing, guaranteeing zero unexpected or hidden surcharges beyond agreed terms.\nDoes HP Trading - Transport have an overseas agent network for Door-to-Door services? | HP Trading - Transport maintains a trusted network of forwarder partners across more than 20 key trade markets including China, South Korea, Japan, ASEAN, EU, and North America. This enables us to provide complete Door-to-Door execution: factory pickup abroad, export clearance, cross-border freight, domestic import clearance, and final delivery directly to your facility.\nAre first-time importers supported with HS code classification and procedure guidance? | Absolutely. HP Trading - Transport specialists provide complimentary onboarding support for new enterprises: precise HS code classification to avoid tax adjustments, Certificate of Origin (C/O) guidance for preferential tariff schemes (Form E, D, AK, VK, CPTPP, EVFTA), and advisory on mandatory import licenses prior to cargo dispatch.",
		'anp_contact_title_vi'    => 'Gửi yêu cầu báo giá',
		'anp_contact_title_en'    => 'Request a quote',
		'anp_contact_lead_vi'     => 'Cho chúng tôi biết lô hàng của bạn. Đội ngũ sẽ liên hệ lại để xác nhận thông tin và đề xuất phương án.',
		'anp_contact_lead_en'     => 'Tell us about your shipment. Our team will confirm the details and propose a plan.',

		// SEO
		'anp_meta_description_vi' => 'HP Trading - Transport cung cấp khai báo hải quan, vận chuyển nội địa, đường biển, đường không, kho bãi và hàng dự án. Hoạt động từ 2014 tại TP. Thủ Đức, TP.HCM.',
		'anp_meta_description_en' => 'HP Trading - Transport provides customs declarations, domestic trucking, sea and air freight, warehousing and project cargo. Operating since 2014 in Thu Duc City, Ho Chi Minh City.',

		// Màu sắc
		'anp_palette'             => 'hp',
		'anp_custom_primary'      => '#1F4F25',
		'anp_custom_soft'         => '#2A6A2C',
		'anp_custom_accent'       => '#7CC242',
		'anp_custom_accent_hover' => '#62A030',

		// Ảnh tùy chỉnh (để trống = dùng ảnh mặc định của theme)
		'anp_about_image'         => '',
		'anp_process_bg'          => '',
	);
}

/**
 * Đọc một tùy chọn theo ngôn ngữ đang xem.
 * Thứ tự thử: key_<lang> -> key_vi -> key. Bản tiếng Anh trống thì dùng bản tiếng Việt.
 */
function anp_opt($key, $fallback = '') {
	$value = anp_opt_for($key, anp_lang());
	return $value !== '' ? $value : $fallback;
}

/** Như anp_opt() nhưng chọn ngôn ngữ tường minh (dùng cho email, llms.txt...). */
function anp_opt_for($key, $lang) {
	$defaults = anp_defaults();
	$candidates = array($key . '_' . $lang, $key . '_vi', $key);

	foreach ($candidates as $id) {
		if (!array_key_exists($id, $defaults)) {
			continue;
		}
		$value = get_theme_mod($id, $defaults[$id]);
		if ($value !== '' && $value !== null) {
			return $value;
		}
	}
	return '';
}

/** Tách các dòng "Tiêu đề | Nội dung" của một tùy chọn thành mảng. */
function anp_pipe_lines($key) {
	$raw   = (string) anp_opt($key);
	$items = array();
	foreach (preg_split('/\r\n|\r|\n/', $raw) as $line) {
		$parts = array_map('trim', explode('|', $line, 2));
		if (count($parts) === 2 && $parts[0] !== '') {
			$items[] = array('q' => $parts[0], 'a' => $parts[1]);
		}
	}
	return $items;
}

function anp_logo_url() {
	return anp_opt('anp_logo');
}

/** Giờ làm việc: mỗi dòng trong ô cài đặt là một khung giờ. Trả về mảng các dòng không rỗng. */
function anp_hours_lines() {
	$lines = preg_split('/\r\n|\r|\n/', (string) anp_opt('anp_hours'));
	return array_values(array_filter(array_map('trim', $lines), function ($line) {
		return $line !== '';
	}));
}

/** Giờ làm việc gộp trên một dòng, dùng cho thanh đầu trang và llms.txt. */
function anp_hours_inline() {
	return implode(' · ', anp_hours_lines());
}

/** Câu hỏi thường gặp (dùng cho trang chủ và schema FAQPage). */
function anp_faq_items() {
	return array_map(function ($item) {
		return array('q' => $item['q'], 'a' => $item['a']);
	}, anp_pipe_lines('anp_faq_lines'));
}

/* ---------- Customizer ---------- */

/**
 * Cấu trúc mục Customizer. 'bi' => true tạo hai ô: tiếng Việt và tiếng Anh.
 */
function anp_customize_fields() {
	$palettes = array();
	foreach (anp_palettes() as $id => $p) {
		$palettes[$id] = $p['label'];
	}
	$palettes['custom'] = 'Tùy chỉnh (tự chọn màu)';

	return array(
		'anp_brand' => array('title' => 'Thương hiệu & logo', 'fields' => array(
			'anp_default_lang'  => array('label' => 'Ngôn ngữ mặc định khi mở website', 'type' => 'select', 'sanitize' => 'sanitize_key', 'choices' => array('vi' => 'Tiếng Việt', 'en' => 'English')),
			'anp_logo'          => array('label' => 'Logo (PNG/SVG nền trong suốt)', 'type' => 'image', 'sanitize' => 'esc_url_raw'),
			'anp_brand_name'    => array('label' => 'Tên thương hiệu ngắn', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_company_name'  => array('label' => 'Tên công ty đầy đủ', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_tagline'       => array('label' => 'Khẩu hiệu', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_industry'      => array('label' => 'Lĩnh vực hiển thị dưới logo', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_founded'       => array('label' => 'Năm thành lập', 'type' => 'text', 'sanitize' => 'sanitize_text_field'),
		)),
		'anp_legal' => array('title' => 'Pháp lý & mã số thuế', 'fields' => array(
			'anp_tax_code'         => array('label' => 'Mã số thuế', 'type' => 'text', 'sanitize' => 'sanitize_text_field'),
			'anp_tax_address'      => array('label' => 'Địa chỉ đăng ký thuế', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
			'anp_legal_rep'        => array('label' => 'Họ tên người đại diện pháp luật', 'type' => 'text', 'sanitize' => 'sanitize_text_field'),
			'anp_legal_rep_title'  => array('label' => 'Chức danh người đại diện', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_license_no'       => array('label' => 'Số Giấy chứng nhận đăng ký doanh nghiệp', 'type' => 'text', 'sanitize' => 'sanitize_text_field'),
			'anp_license_date'     => array('label' => 'Ngày cấp giấy chứng nhận (dd/mm/yyyy)', 'type' => 'text', 'sanitize' => 'sanitize_text_field'),
			'anp_license_issuer'   => array('label' => 'Cơ quan cấp giấy chứng nhận', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
		)),
		'anp_contact' => array('title' => 'Thông tin liên hệ', 'fields' => array(
			'anp_phone'         => array('label' => 'Hotline (chỉ số, dùng cho nút gọi)', 'type' => 'text', 'sanitize' => 'sanitize_text_field'),
			'anp_phone_display' => array('label' => 'Hotline (hiển thị)', 'type' => 'text', 'sanitize' => 'sanitize_text_field'),
			'anp_email'         => array('label' => 'Email', 'type' => 'text', 'sanitize' => 'sanitize_email'),
			'anp_zalo'          => array('label' => 'Link Zalo', 'type' => 'url', 'sanitize' => 'esc_url_raw'),
			'anp_facebook'      => array('label' => 'Link Facebook', 'type' => 'url', 'sanitize' => 'esc_url_raw'),
			'anp_website'       => array('label' => 'Tên miền hiển thị', 'type' => 'text', 'sanitize' => 'sanitize_text_field'),
			'anp_address_hq'    => array('label' => 'Địa chỉ trụ sở', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
			'anp_address_rep'   => array('label' => 'Địa chỉ văn phòng đại diện', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
			'anp_hours'         => array('label' => 'Giờ làm việc', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true, 'desc' => 'Mỗi dòng một khung giờ. Ví dụ: "Thứ 2 – Thứ 6: 08:00 – 17:30". Hiển thị ở thanh đầu trang (gộp một dòng), mục liên hệ và chân trang.'),
			'anp_map_url'       => array('label' => 'Link bản đồ (Google Maps)', 'type' => 'url', 'sanitize' => 'esc_url_raw'),
			'anp_form_email'    => array('label' => 'Email nhận form báo giá (để trống = email quản trị)', 'type' => 'text', 'sanitize' => 'sanitize_email'),
		)),
		'anp_home' => array('title' => 'Trang chủ', 'fields' => array(
			'anp_hero_eyebrow'  => array('label' => 'Dòng nhỏ phía trên tiêu đề', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_hero_title'    => array('label' => 'Tiêu đề chính', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_hero_subtitle' => array('label' => 'Mô tả ngắn', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
			'anp_hero_banner_only' => array('label' => 'Chế độ banner ảnh: tạm ẩn tiêu đề, nút và thẻ theo dõi lô hàng ở hero, chỉ hiện 4 ảnh chạy tự động (giữ 4 bullet dịch vụ). Bỏ chọn để hiện lại hero đầy đủ.', 'type' => 'checkbox', 'sanitize' => 'rest_sanitize_boolean'),
			'anp_hero_image'    => array('label' => 'Ảnh nền hero (để trống = ảnh mặc định của theme)', 'type' => 'image', 'sanitize' => 'esc_url_raw'),
			'anp_about_image'   => array('label' => 'Ảnh phần giới thiệu (để trống = ảnh mặc định)', 'type' => 'image', 'sanitize' => 'esc_url_raw'),
			'anp_process_bg'    => array('label' => 'Ảnh nền mục quy trình (để trống = ảnh mặc định)', 'type' => 'image', 'sanitize' => 'esc_url_raw'),
			'anp_about_title'   => array('label' => 'Tiêu đề phần giới thiệu', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_about_text'    => array('label' => 'Nội dung giới thiệu', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
			'anp_core_value'    => array('label' => 'Câu giá trị cốt lõi', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_mission'       => array('label' => 'Sứ mệnh', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
			'anp_vision'        => array('label' => 'Tầm nhìn', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
			'anp_stat_countries'       => array('label' => 'Chỉ số 1 – số', 'type' => 'text', 'sanitize' => 'sanitize_text_field'),
			'anp_stat_countries_label' => array('label' => 'Chỉ số 1 – nhãn', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_stat_trucks'          => array('label' => 'Chỉ số 2 – số', 'type' => 'text', 'sanitize' => 'sanitize_text_field'),
			'anp_stat_trucks_label'    => array('label' => 'Chỉ số 2 – nhãn', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_stat_trailers'        => array('label' => 'Chỉ số 3 – số', 'type' => 'text', 'sanitize' => 'sanitize_text_field'),
			'anp_stat_trailers_label'  => array('label' => 'Chỉ số 3 – nhãn', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
		)),
		'anp_sections' => array('title' => 'Tiêu đề & nội dung các mục', 'fields' => array(
			'anp_services_title' => array('label' => 'Tiêu đề mục dịch vụ', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_services_lead'  => array('label' => 'Mô tả mục dịch vụ', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
			'anp_process_title'  => array('label' => 'Tiêu đề mục quy trình', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_process_lines'  => array('label' => 'Các bước quy trình (mỗi dòng: Tiêu đề | Nội dung)', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
			'anp_news_title'     => array('label' => 'Tiêu đề mục tin tức', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_faq_title'      => array('label' => 'Tiêu đề mục hỏi đáp', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_faq_lead'       => array('label' => 'Mô tả mục hỏi đáp', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
			'anp_faq_lines'      => array('label' => 'Câu hỏi thường gặp (mỗi dòng: Câu hỏi | Trả lời)', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
			'anp_contact_title'  => array('label' => 'Tiêu đề mục liên hệ', 'type' => 'text', 'sanitize' => 'sanitize_text_field', 'bi' => true),
			'anp_contact_lead'   => array('label' => 'Mô tả mục liên hệ', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
		)),
		'anp_seo' => array('title' => 'SEO & GEO', 'fields' => array(
			'anp_meta_description' => array('label' => 'Mô tả meta mặc định (dùng khi chưa có Rank Math)', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field', 'bi' => true),
		)),
		'anp_colors' => array('title' => 'Bộ màu chủ đạo', 'fields' => array(
			'anp_palette'             => array('label' => 'Chọn bộ màu', 'type' => 'select', 'sanitize' => 'sanitize_key', 'choices' => $palettes),
			'anp_custom_primary'      => array('label' => 'Màu chính (chỉ dùng khi chọn Tùy chỉnh)', 'type' => 'color', 'sanitize' => 'sanitize_hex_color'),
			'anp_custom_soft'         => array('label' => 'Màu chính nhạt (Tùy chỉnh)', 'type' => 'color', 'sanitize' => 'sanitize_hex_color'),
			'anp_custom_accent'       => array('label' => 'Màu nhấn (Tùy chỉnh)', 'type' => 'color', 'sanitize' => 'sanitize_hex_color'),
			'anp_custom_accent_hover' => array('label' => 'Màu nhấn khi rê chuột (Tùy chỉnh)', 'type' => 'color', 'sanitize' => 'sanitize_hex_color'),
		)),
	);
}

function anp_customize_register($wp_customize) {
	$wp_customize->add_panel('anp_options', array(
		'title'       => 'HP Trading - Transport Theme Options',
		'description' => 'Thông tin doanh nghiệp, pháp lý, liên hệ, nội dung trang chủ, SEO và bộ màu. Mỗi nội dung có bản tiếng Việt và tiếng Anh.',
		'priority'    => 25,
	));

	$defaults = anp_defaults();

	foreach (anp_customize_fields() as $section_id => $section) {
		$wp_customize->add_section($section_id, array(
			'title' => $section['title'],
			'panel' => 'anp_options',
		));

		foreach ($section['fields'] as $base_id => $field) {
			// Trường song ngữ: tạo cặp _vi và _en
			$variants = !empty($field['bi']) ? array('vi' => ' (Tiếng Việt)', 'en' => ' (English)') : array('' => '');

			foreach ($variants as $suffix => $label_suffix) {
				$setting_id = $suffix ? $base_id . '_' . $suffix : $base_id;

				$wp_customize->add_setting($setting_id, array(
					'default'           => isset($defaults[$setting_id]) ? $defaults[$setting_id] : '',
					'sanitize_callback' => $field['sanitize'],
					'transport'         => 'refresh',
				));

				$control_args = array(
					'label'   => $field['label'] . $label_suffix,
					'section' => $section_id,
				);
				if (!empty($field['desc'])) {
					$control_args['description'] = $field['desc'];
				}

				if ($field['type'] === 'image') {
					$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $setting_id, $control_args));
				} elseif ($field['type'] === 'color') {
					$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting_id, $control_args));
				} else {
					$control_args['type'] = $field['type'];
					if (!empty($field['choices'])) {
						$control_args['choices'] = $field['choices'];
					}
					$wp_customize->add_control($setting_id, $control_args);
				}
			}
		}
	}
}
add_action('customize_register', 'anp_customize_register');
