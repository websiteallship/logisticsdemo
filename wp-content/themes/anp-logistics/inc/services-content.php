<?php
/**
 * Nội dung đầy đủ cho 6 trang dịch vụ (tiếng Việt và tiếng Anh), viết lại theo cấu trúc SEO/GEO.
 *
 * Mỗi dịch vụ gồm:
 * - slug: đường dẫn /dich-vu/<slug>/ (cùng slug cho cả hai ngôn ngữ).
 * - title, excerpt: tiêu đề và đoạn mô tả ngắn (đoạn mở đầu trả lời trực tiếp).
 * - meta_title, meta_desc: thẻ tiêu đề và mô tả cho công cụ tìm kiếm (meta_title <= 60 ký tự, meta_desc 120 đến 160 ký tự).
 * - keyword: từ khóa chính (chỉ để tham khảo khi biên tập).
 * - faq: mỗi dòng một cặp "Câu hỏi | Trả lời".
 * - body: nội dung HTML của trang.
 *
 * Phiên bản nội dung: tăng ANP_SERVICE_CONTENT_VERSION khi sửa file này để theme cập nhật lại các trang dịch vụ.
 */

if (!defined('ABSPATH')) {
	exit;
}

define('ANP_SERVICE_CONTENT_VERSION', '3');

function anp_service_library() {
	return array(

		/* ================= 1. KHAI BÁO HẢI QUAN ================= */
		'customs' => array(
			'slug' => 'khai-bao-hai-quan',
			'icon' => 'customs',
			'vi' => array(
				'title'      => 'Khai báo hải quan',
				'keyword'    => 'khai báo hải quan',
				'excerpt'    => 'HP Trading - Transport là đại lý hải quan, khai báo điện tử và làm thủ tục thông quan cho hàng xuất nhập khẩu. Chúng tôi xác định mã HS và thuế suất, hướng dẫn hồ sơ theo quy định hiện hành để lô hàng thông quan đúng và đủ thủ tục.',
				'meta_title' => 'Khai báo hải quan xuất nhập khẩu | HP Trading - Transport',
				'meta_desc'  => 'Dịch vụ khai báo hải quan điện tử, phân loại mã HS, xác định thuế xuất nhập khẩu và thông quan hàng hóa tại TP.HCM. Tư vấn hồ sơ rõ ràng.',
				'faq'        => <<<'TXT'
Ai cần dịch vụ khai báo hải quan? | Doanh nghiệp xuất nhập khẩu, chủ hàng không có bộ phận hải quan riêng, hoặc doanh nghiệp muốn giao toàn bộ thủ tục cho một đơn vị chuyên trách. Chúng tôi nhận cả lô hàng lẻ lẫn lô nguyên container.
Cần chuẩn bị hồ sơ gì để khai báo? | Thường gồm hợp đồng thương mại, hóa đơn thương mại, vận đơn (B/L hoặc AWB), phiếu đóng gói và thông tin về hàng hóa. Tùy loại hình và mặt hàng, có thể cần thêm giấy phép, chứng nhận chất lượng hoặc kiểm dịch. Chúng tôi sẽ liệt kê danh mục cụ thể sau khi nhận thông tin lô hàng.
Mã HS do ai xác định và có chắc chắn không? | Chúng tôi phân loại mã HS dựa trên mô tả hàng hóa và quy định hiện hành, đồng thời giải thích cơ sở để bạn kiểm soát rủi ro. Với mặt hàng có tranh chấp phân loại, chúng tôi đề nghị bạn làm việc với cơ quan hải quan trước khi khai chính thức.
Thời gian thông quan kéo dài bao lâu? | Phụ thuộc loại hình xuất nhập khẩu và kết quả kiểm tra của cơ quan hải quan (không kiểm tra, kiểm tra hồ sơ hoặc kiểm tra thực tế). Sau khi nhận đủ hồ sơ, chúng tôi báo thời gian dự kiến cho từng lô.
HP Trading - Transport có làm thủ tục cho hàng xuất khẩu không? | Có. Chúng tôi làm cả thủ tục xuất khẩu lẫn nhập khẩu, bao gồm khai báo điện tử, thông quan và phối hợp giao nhận từ cảng đến kho hoặc từ kho ra cảng.
TXT,
				'body'       => <<<'HTML'
<p>HP Trading - Transport là đại lý hải quan, thay mặt chủ hàng khai báo điện tử và hoàn tất thủ tục thông quan cho hàng xuất khẩu và nhập khẩu. Chúng tôi phân loại mã HS, xác định thuế suất và hướng dẫn hồ sơ theo văn bản pháp luật hiện hành, để lô hàng đi qua cửa khẩu đúng quy định và tránh bị trì hoãn vì sai sót thủ tục.</p>

<h2>Dịch vụ khai báo hải quan của HP Trading - Transport bao gồm những gì</h2>
<ul>
<li>Khai báo hải quan điện tử cho tờ khai nhập khẩu và xuất khẩu.</li>
<li>Phân loại mã HS theo mô tả hàng hóa, kèm cơ sở pháp lý để bạn kiểm soát rủi ro.</li>
<li>Xác định thuế nhập khẩu, thuế giá trị gia tăng và các khoản thu khác theo biểu thuế hiện hành.</li>
<li>Kiểm tra và chuẩn bị bộ hồ sơ: hợp đồng, hóa đơn, vận đơn, phiếu đóng gói, giấy phép (nếu có).</li>
<li>Làm việc với cơ quan hải quan khi có yêu cầu kiểm tra hồ sơ hoặc kiểm tra thực tế.</li>
<li>Tư vấn thủ tục hải quan theo loại hình: sản xuất xuất khẩu, gia công, kinh doanh nhập khẩu.</li>
</ul>

<h2>Quy trình khai báo hải quan</h2>
<ol>
<li><strong>Tiếp nhận thông tin lô hàng:</strong> bạn gửi mô tả hàng hóa, số lượng, giá trị và chứng từ có sẵn.</li>
<li><strong>Phân loại và tính thuế:</strong> chúng tôi xác định mã HS, thuế suất và gửi bạn bảng tính thuế trước khi khai.</li>
<li><strong>Khai báo điện tử:</strong> nộp tờ khai qua hệ thống hải quan và theo dõi trạng thái xử lý.</li>
<li><strong>Thông quan và hoàn tất:</strong> xử lý yêu cầu kiểm tra (nếu có), nhận thông báo thông quan và bàn giao chứng từ cho bạn.</li>
</ol>

<h2>Vì sao doanh nghiệp chọn HP Trading - Transport</h2>
<ul>
<li>Đội ngũ có kinh nghiệm xử lý nhiều nhóm hàng và nhiều loại hình xuất nhập khẩu.</li>
<li>Giải thích rõ từng khoản thuế và từng bước thủ tục, không để bạn phải đoán.</li>
<li>Kết hợp được với dịch vụ vận chuyển và kho bãi, nên một đầu mối phụ trách từ khai báo đến giao hàng.</li>
</ul>

<h2>Thông tin cần gửi để nhận báo giá</h2>
<p>Tên hàng và mô tả chi tiết, mã HS nếu đã biết, khối lượng, số kiện, giá trị, điều kiện giao hàng (Incoterms), cảng hoặc cửa khẩu liên quan, và thời gian mong muốn. Gửi kèm chứng từ có sẵn để chúng tôi đánh giá nhanh hơn.</p>
HTML,
			),
			'en' => array(
				'title'      => 'Customs declaration',
				'keyword'    => 'customs declaration Vietnam',
				'excerpt'    => 'HP Trading - Transport is a licensed customs agent. We prepare electronic declarations, confirm HS codes and duty rates, and guide documents under current rules so your import or export cargo clears on the first attempt.',
				'meta_title' => 'Customs Declaration Vietnam | HP Trading - Transport',
				'meta_desc'  => 'Electronic customs declarations in Vietnam: HS code classification, duty calculation and cargo clearance in Ho Chi Minh City. Clear document guidance.',
				'faq'        => <<<'TXT'
Who needs a customs declaration service? | Importers and exporters without an in-house customs team, or businesses that want one partner to handle all procedures. We take both LCL and FCL shipments.
What documents are needed to declare? | Usually the commercial contract, commercial invoice, bill of lading or air waybill, packing list and cargo details. Depending on the goods, you may also need a licence, a quality certificate or quarantine clearance. We confirm the exact list once we receive your shipment details.
Who decides the HS code, and how certain is it? | We classify the HS code from the product description and current rules, and explain the basis so you can manage risk. For goods with a classification dispute, we recommend clarifying with customs before the official declaration.
How long does clearance take? | It depends on the trade type and the customs inspection outcome (no inspection, document check or physical check). Once we have complete documents, we give an estimated timeline for each shipment.
Do you handle export clearance too? | Yes. We handle both export and import procedures, including electronic declaration, clearance and coordination between port and warehouse.
TXT,
				'body'       => <<<'HTML'
<p>HP Trading - Transport is a licensed customs agent. We prepare electronic declarations on behalf of importers and exporters and complete clearance procedures. We classify HS codes, confirm duty rates and guide documents under current law, so your cargo passes the border under the right rules and avoids delays caused by paperwork errors.</p>

<h2>What our customs declaration service covers</h2>
<ul>
<li>Electronic customs declarations for import and export.</li>
<li>HS code classification from the product description, with the legal basis so you can manage risk.</li>
<li>Calculation of import duty, value-added tax and other charges under the current tariff schedule.</li>
<li>Document preparation and checks: contract, invoice, bill of lading, packing list and any licences.</li>
<li>Coordination with customs when a document check or physical inspection is ordered.</li>
<li>Advice on procedures for each trade type: manufacturing for export, processing, and general trading.</li>
</ul>

<h2>How the declaration process works</h2>
<ol>
<li><strong>Share shipment details:</strong> send the product description, quantities, value and documents you already have.</li>
<li><strong>Classify and calculate duties:</strong> we confirm the HS code and duty rates and send you a duty estimate before declaring.</li>
<li><strong>File the electronic declaration:</strong> we submit through the customs system and track its status.</li>
<li><strong>Clear and close out:</strong> we handle any inspection request, obtain the clearance notice and hand over the documents.</li>
</ol>

<h2>Why businesses choose HP Trading - Transport for customs</h2>
<ul>
<li>Experience across many product groups and trade types.</li>
<li>Clear explanation of each duty item and each procedural step.</li>
<li>Declaration and transport under one partner, so there is one contact from the declaration to the delivery.</li>
</ul>

<h2>What to send us for a quote</h2>
<p>Product name and description, HS code if you already have it, weight, number of packages, value, delivery terms (Incoterms), the port or border crossing involved, and your preferred timing. Attach any documents you have to speed up the review.</p>
HTML,
			),
		),

		/* ================= 2. VẬN CHUYỂN NỘI ĐỊA ================= */
		'truck' => array(
			'slug' => 'van-chuyen-noi-dia',
			'icon' => 'truck',
			'vi' => array(
				'title'      => 'Vận chuyển nội địa',
				'keyword'    => 'vận chuyển nội địa',
				'excerpt'    => 'Vận chuyển nội địa bằng đội xe đầu kéo và romooc chủ động, phục vụ hàng lẻ, hàng nguyên container và hàng dạng đặc biệt. Chúng tôi điều phối theo khung giờ bạn chọn, từ cảng đến kho, từ kho đến điểm giao trên toàn quốc.',
				'meta_title' => 'Vận chuyển nội địa, xe đầu kéo container | HP Trading - Transport',
				'meta_desc'  => 'Vận chuyển nội địa bằng xe đầu kéo và romooc chủ động: hàng lẻ, container, giao tận nơi. Điều phối theo khung giờ, theo dõi lô hàng từ cảng đến kho.',
				'faq'        => <<<'TXT'
Vận chuyển nội địa có những loại hình nào? | Hàng lẻ ghép chuyến, hàng nguyên container (FCL), hàng cần xe kín hoặc có kiểm soát nhiệt độ, và giao hàng tận nơi (door to door). Chúng tôi tư vấn loại xe phù hợp với kích thước và khối lượng hàng.
Có vận chuyển được tuyến nào trên toàn quốc không? | Có. Đội xe của chúng tôi phục vụ các tuyến từ cảng và khu công nghiệp đến kho khách hàng và ngược lại. Với tuyến ít gặp, chúng tôi báo phương án và giá trước khi nhận hàng.
Làm sao biết lô hàng đang ở đâu? | Bạn được cập nhật trạng thái theo từng mốc: nhận hàng, khởi hành, đến điểm giao và giao xong. Với đơn vị hàng cần theo dõi chặt, chúng tôi báo theo mốc bạn yêu cầu.
Hàng bị hư hỏng hoặc thất lạc thì xử lý thế nào? | Chúng tôi lập biên bản ngay tại điểm giao nhận, chụp ảnh tình trạng hàng và phối hợp với bạn để xác định nguyên nhân. Trách nhiệm và mức bồi thường theo hợp đồng vận chuyển và điều kiện bảo hiểm (nếu có).
Cần cung cấp thông tin gì để báo giá? | Điểm lấy hàng, điểm giao hàng, loại hàng, khối lượng, số kiện hoặc kích thước, yêu cầu xe, khung giờ lấy và giao, và có cần bốc xếp hay không.
TXT,
				'body'       => <<<'HTML'
<p>Vận chuyển nội địa là khâu nối giữa cảng, kho và điểm giao hàng cuối cùng. HP Trading - Transport vận hành đội xe đầu kéo và romooc chủ động, điều phối theo khung giờ bạn chọn để hàng đi đúng tuyến, đúng lịch và được theo dõi xuyên suốt.</p>

<h2>Các loại hình vận chuyển nội địa</h2>
<ul>
<li><strong>Hàng lẻ ghép chuyến:</strong> phù hợp lô nhỏ, gửi theo chuyến xe có sẵn để tiết kiệm chi phí.</li>
<li><strong>Hàng nguyên container (FCL):</strong> xe điều riêng cho một container, từ cảng đến kho hoặc ngược lại.</li>
<li><strong>Hàng đặc thù:</strong> hàng cần xe kín, hàng dễ vỡ, hàng cần chằng buộc chắc chắn. Chúng tôi chọn thùng xe và cách chằng buộc theo loại hàng.</li>
<li><strong>Giao hàng tận nơi (door to door):</strong> nhận hàng tại kho nhà cung cấp và giao đến kho hoặc điểm nhận của bạn.</li>
</ul>

<h2>Quy trình vận chuyển</h2>
<ol>
<li><strong>Đặt xe:</strong> bạn gửi điểm lấy, điểm giao, loại hàng và khung giờ. Chúng tôi xác nhận xe và giá trước khi chạy.</li>
<li><strong>Lấy hàng và kiểm đếm:</strong> đối chiếu số kiện, tình trạng bên ngoài và chứng từ tại điểm lấy.</li>
<li><strong>Vận chuyển và cập nhật:</strong> theo dõi hành trình, báo các mốc quan trọng và xử lý phát sinh trên đường.</li>
<li><strong>Giao hàng và xác nhận:</strong> người nhận ký biên bản giao nhận, chúng tôi chuyển bản xác nhận cho bạn.</li>
</ol>

<h2>Vì sao chọn đội xe của HP Trading - Transport</h2>
<ul>
<li>Đội xe đầu kéo và romooc chủ động, không phụ thuộc hoàn toàn vào xe thuê ngoài.</li>
<li>Điều phối kết hợp với các dịch vụ hải quan, đường biển, đường không và kho bãi trong cùng một hệ thống.</li>
<li>Biên bản giao nhận rõ ràng, kèm ảnh tình trạng hàng khi cần.</li>
</ul>

<h2>Thông tin cần gửi để nhận báo giá</h2>
<p>Điểm lấy hàng và điểm giao (địa chỉ đầy đủ), loại hàng, khối lượng, kích thước hoặc số kiện, yêu cầu về xe, khung giờ lấy và giao, và có cần bốc xếp hoặc chờ đợi hay không.</p>
HTML,
			),
			'en' => array(
				'title'      => 'Domestic transport',
				'keyword'    => 'domestic transport Vietnam trucking',
				'excerpt'    => 'Domestic transport with our own tractor trucks and trailers, for LCL, full container and special cargo. We schedule to your time window, from port to warehouse and from warehouse to delivery points across Vietnam.',
				'meta_title' => 'Domestic Trucking Vietnam, Container Transport | HP Trading - Transport',
				'meta_desc'  => 'Domestic trucking in Vietnam with our own tractor trucks and trailers: LCL, full container and door-to-door delivery. Scheduled pickups and shipment tracking.',
				'faq'        => <<<'TXT'
What types of domestic transport do you offer? | LCL shared trucks, full container (FCL) trucks, closed or temperature-controlled trucks for special goods, and door-to-door delivery. We recommend the vehicle that fits the size and weight of your cargo.
Do you serve every route in Vietnam? | Yes. Our trucks serve routes between ports, industrial zones, warehouses and customer sites. For less common routes, we confirm the plan and price before collecting.
How can I track my shipment? | You receive status updates at each milestone: collection, departure, arrival at the delivery point and delivery. For shipments that need closer follow-up, we report at the milestones you request.
What happens if cargo is damaged or lost? | We record the condition at handover, take photos and work with you to identify the cause. Liability and compensation follow the transport contract and any cargo insurance.
What do you need to quote a trip? | Pickup and delivery addresses, cargo type, weight, number of packages or dimensions, vehicle requirements, pickup and delivery time windows, and whether loading or waiting is needed.
TXT,
				'body'       => <<<'HTML'
<p>Domestic transport is the link between port, warehouse and the final delivery point. HP Trading - Transport operates its own tractor trucks and trailers and schedules them to your time window, so cargo moves on the right route, on time, and is tracked from collection to delivery.</p>

<h2>Types of domestic transport</h2>
<ul>
<li><strong>LCL shared trucks:</strong> for smaller consignments, grouped on scheduled trips to keep costs down.</li>
<li><strong>Full container (FCL) trucks:</strong> a dedicated truck for one container, from port to warehouse or back.</li>
<li><strong>Specialised cargo:</strong> closed trucks for goods that need protection, and secure lashing for heavy or fragile items. We match the body and lashing method to the cargo.</li>
<li><strong>Door-to-door delivery:</strong> collection from the supplier's warehouse and delivery to your warehouse or receiving point.</li>
</ul>

<h2>How a domestic trip works</h2>
<ol>
<li><strong>Book the truck:</strong> send the pickup point, delivery point, cargo type and time window. We confirm the vehicle and price before dispatch.</li>
<li><strong>Collect and check:</strong> we count packages, check outer condition and match the documents at pickup.</li>
<li><strong>Transport and update:</strong> we follow the trip, report key milestones and handle issues on the road.</li>
<li><strong>Deliver and confirm:</strong> the receiver signs the delivery record, and we send you the confirmation.</li>
</ol>

<h2>Why HP Trading - Transport's fleet</h2>
<ul>
<li>Our own tractor trucks and trailers, so we are not fully dependent on hired vehicles.</li>
<li>Scheduling is connected to our customs, sea, air and warehousing services, so you have one point of contact.</li>
<li>Clear delivery records, with photos of the cargo condition when needed.</li>
</ul>

<h2>What to send us for a quote</h2>
<p>Full pickup and delivery addresses, cargo type, weight, dimensions or number of packages, vehicle requirements, pickup and delivery time windows, and whether loading or waiting time is involved.</p>
HTML,
			),
		),

		/* ================= 3. VẬN CHUYỂN ĐƯỜNG BIỂN ================= */
		'ship' => array(
			'slug' => 'van-chuyen-duong-bien',
			'icon' => 'ship',
			'vi' => array(
				'title'      => 'Vận chuyển đường biển',
				'keyword'    => 'vận chuyển đường biển FCL LCL',
				'excerpt'    => 'Vận chuyển đường biển xuất nhập khẩu cho hàng nguyên container (FCL) và hàng lẻ ghép container (LCL). Chúng tôi phối hợp với hãng tàu và đại lý tại cảng, chọn tuyến và lịch tàu phù hợp, báo rõ chi phí từng khoản.',
				'meta_title' => 'Vận chuyển đường biển FCL LCL xuất nhập khẩu | HP Trading - Transport',
				'meta_desc'  => 'Vận chuyển đường biển xuất nhập khẩu FCL và LCL: lịch tàu theo tuyến, phối hợp hãng tàu và đại lý cảng, báo giá rõ từng khoản phí tại TP.HCM.',
				'faq'        => <<<'TXT'
FCL và LCL khác nhau thế nào? | FCL là hàng nguyên container, bạn thuê trọn một container. LCL là hàng lẻ được ghép chung container với hàng của khách khác, phù hợp lô nhỏ. Chúng tôi tư vấn lựa chọn theo khối lượng và tần suất gửi hàng.
Lịch tàu được chọn như thế nào? | Lịch tàu phụ thuộc tuyến, hãng tàu và thời điểm. Chúng tôi đưa các lựa chọn tàu và thời gian dự kiến cho bạn trước khi chốt, kèm lưu ý về hạn chót nhận hàng tại cảng.
Chi phí gồm những khoản nào? | Thường gồm cước biển, phụ phí nhiên liệu, phí làm hàng tại cảng và các phụ phí theo tuyến hoặc mùa cao điểm. Chúng tôi báo từng khoản trong bảng giá, không gộp chung.
Hàng đi theo điều kiện giao hàng nào? | Chúng tôi làm việc theo Incoterms bạn chọn (ví dụ FOB, CIF, EXW). Điều kiện giao hàng quyết định ai chịu phí và rủi ro ở từng đoạn, nên bạn nên thống nhất trước khi đặt chỗ.
Có hỗ trợ hàng xuất đi các thị trường nào? | Chúng tôi xử lý các tuyến chính đi và đến Mỹ, châu Âu, Nhật Bản và châu Á, dựa trên mạng lưới đại lý và hãng tàu hợp tác. Với tuyến khác, chúng tôi xác nhận khả năng trước khi nhận đơn.
TXT,
				'body'       => <<<'HTML'
<p>HP Trading - Transport tổ chức vận chuyển đường biển xuất nhập khẩu cho hàng nguyên container (FCL) và hàng lẻ ghép container (LCL). Chúng tôi phối hợp với hãng tàu và đại lý tại cảng, chọn tuyến và lịch tàu phù hợp với hàng hóa và thời gian của bạn, đồng thời báo rõ chi phí từng khoản trước khi đặt chỗ.</p>

<h2>Hai hình thức vận chuyển đường biển</h2>
<ul>
<li><strong>FCL (hàng nguyên container):</strong> bạn thuê trọn một container. Phù hợp hàng có khối lượng lớn, cần bảo vệ hàng khỏi đụng chạm với hàng khác và muốn kiểm soát thời gian xếp hàng.</li>
<li><strong>LCL (hàng lẻ ghép container):</strong> hàng của bạn ghép chung container với hàng khách khác. Phù hợp lô nhỏ, gửi thường xuyên, không cần đủ một container.</li>
</ul>

<h2>Dịch vụ đường biển bao gồm</h2>
<ul>
<li>Đặt chỗ tàu và lựa chọn tuyến, lịch tàu, hãng tàu phù hợp.</li>
<li>Làm việc với hãng tàu và đại lý tại cảng về booking, cấp container và thời hạn nhận hàng.</li>
<li>Vận chuyển từ kho nhà cung cấp đến cảng xếp, hoặc từ cảng dỡ về kho của bạn.</li>
<li>Phối hợp khai báo hải quan và thông quan, để hàng rời cảng đúng lúc.</li>
<li>Hỗ trợ hàng lẻ: gom hàng, ghép container và tách hàng tại điểm dỡ.</li>
</ul>

<h2>Quy trình vận chuyển đường biển</h2>
<ol>
<li><strong>Chọn tuyến và lịch tàu:</strong> bạn gửi thông tin hàng và thời gian mong muốn. Chúng tôi đề xuất các phương án kèm chi phí và thời gian dự kiến.</li>
<li><strong>Đặt chỗ và chuẩn bị chứng từ:</strong> booking với hãng tàu, cấp container, hoàn tất hóa đơn và vận đơn.</li>
<li><strong>Đóng hàng và xếp cảng:</strong> đóng container tại kho hoặc nhận hàng lẻ để đóng ghép, đưa container vào cảng theo lịch.</li>
<li><strong>Theo dõi và giao hàng:</strong> cập nhật lịch tàu, thông báo tàu chạy và hàng đến, phối hợp nhận hàng tại cảng dỡ.</li>
</ol>

<h2>Vì sao doanh nghiệp chọn HP Trading - Transport</h2>
<ul>
<li>Mạng lưới đại lý và hợp tác với hãng tàu giúp chúng tôi chủ động hơn về chỗ và lịch tàu.</li>
<li>Bảng giá chi tiết từng khoản, không để phát sinh bất ngờ ở cuối lô.</li>
<li>Kết hợp với khai báo hải quan và vận chuyển nội địa, nên bạn chỉ cần làm việc với một đầu mối.</li>
</ul>

<h2>Thông tin cần gửi để nhận báo giá</h2>
<p>Loại hàng và mô tả, khối lượng và thể tích, số kiện, cảng đi và cảng đến (hoặc quốc gia), điều kiện giao hàng (Incoterms), thời gian mong muốn, và nhu cầu về container lạnh hoặc hàng nguy hiểm nếu có.</p>
HTML,
			),
			'en' => array(
				'title'      => 'Sea freight',
				'keyword'    => 'sea freight Vietnam FCL LCL',
				'excerpt'    => 'Import and export sea freight for full container (FCL) and consolidated cargo (LCL). We work with shipping lines and port agents, choose routes and sailing schedules that suit your cargo, and quote every charge clearly before booking.',
				'meta_title' => 'Sea Freight Vietnam, FCL and LCL | HP Trading - Transport',
				'meta_desc'  => 'Sea freight for import and export in Vietnam: FCL and LCL, sailing schedules by route, coordination with shipping lines and port agents, and transparent quotes.',
				'faq'        => <<<'TXT'
What is the difference between FCL and LCL? | FCL is full container load: you hire one container for your cargo. LCL is less-than-container load: your goods share a container with other shippers' cargo, which suits smaller shipments. We advise which fits your volume and shipping frequency.
How are sailing schedules chosen? | Schedules depend on the route, carrier and timing. We present the vessel options and estimated transit times before you confirm, with cut-off reminders for port delivery.
What charges are included? | Usually the ocean freight, bunker surcharge, terminal handling and any route or peak-season surcharges. We list each charge separately rather than bundling them.
Which Incoterms do you work with? | We work with the Incoterms you choose, for example FOB, CIF or EXW. The term decides who pays and who bears risk at each stage, so we recommend agreeing it before booking.
Which trade lanes do you handle? | We handle the main lanes to and from the United States, Europe, Japan and Asia, based on our agent network and carrier relationships. For other lanes, we confirm capacity before accepting an order.
TXT,
				'body'       => <<<'HTML'
<p>HP Trading - Transport arranges import and export sea freight for full container load (FCL) and less-than-container load (LCL) cargo. We work with shipping lines and port agents, choose the route and sailing schedule that suit your goods and your timing, and show every charge before you book.</p>

<h2>Two sea freight options</h2>
<ul>
<li><strong>FCL (full container load):</strong> you hire one container for your cargo. Suits large volumes, cargo that should not be mixed with others, and shippers who want control over loading time.</li>
<li><strong>LCL (less-than-container load):</strong> your goods share a container with other shippers' cargo. Suits smaller shipments and regular, lower-volume sending.</li>
</ul>

<h2>What our sea freight service covers</h2>
<ul>
<li>Route, sailing schedule and carrier selection.</li>
<li>Booking with the shipping line and coordination with port agents on container release and cut-off times.</li>
<li>Trucking from the supplier's warehouse to the port of loading, or from the port of discharge to your warehouse.</li>
<li>Customs declaration and clearance, so cargo leaves the port on time.</li>
<li>LCL consolidation: grouping cargo, loading shared containers and separating cargo at the discharge port.</li>
</ul>

<h2>How the sea freight process works</h2>
<ol>
<li><strong>Choose route and schedule:</strong> send us the cargo details and your preferred timing. We propose options with cost and estimated transit time.</li>
<li><strong>Book and prepare documents:</strong> booking with the carrier, container allocation, commercial invoice and bill of lading.</li>
<li><strong>Stuff and load:</strong> we stuff the container at your warehouse or consolidate LCL cargo, then deliver to the port on schedule.</li>
<li><strong>Track and deliver:</strong> we update the sailing schedule, notify departure and arrival, and coordinate collection at the port of discharge.</li>
</ol>

<h2>Why businesses choose HP Trading - Transport for sea freight</h2>
<ul>
<li>Our agent network and carrier relationships help us secure space and schedules.</li>
<li>Itemised quotes, so there are no unexpected charges at the end of a shipment.</li>
<li>Linked with our customs and trucking services, so you deal with one partner from port to door.</li>
</ul>

<h2>What to send us for a quote</h2>
<p>Cargo type and description, weight and volume, number of packages, port of loading and port of discharge (or country), delivery terms (Incoterms), preferred timing, and whether you need reefer containers or dangerous goods handling.</p>
HTML,
			),
		),

		/* ================= 4. VẬN CHUYỂN ĐƯỜNG KHÔNG ================= */
		'plane' => array(
			'slug' => 'van-chuyen-duong-khong',
			'icon' => 'plane',
			'vi' => array(
				'title'      => 'Vận chuyển đường không',
				'keyword'    => 'vận chuyển hàng không',
				'excerpt'    => 'Vận chuyển hàng không cho lô gấp, hàng giá trị cao và hàng cần đúng chuyến bay. Chúng tôi đề xuất phương án theo tuyến, gồm chuyến bay trực tiếp hoặc chuyển tải, và theo dõi lô hàng từ lúc nhận đến khi giao cho người nhận.',
				'meta_title' => 'Vận chuyển hàng không air freight Việt Nam | HP Trading - Transport',
				'meta_desc'  => 'Vận chuyển hàng không xuất nhập khẩu: hàng gấp, hàng giá trị cao, door-to-door. Đề xuất chuyến bay trực tiếp hoặc chuyển tải, theo dõi lô hàng.',
				'faq'        => <<<'TXT'
Khi nào nên chọn vận chuyển hàng không? | Khi hàng cần đến nhanh, có giá trị cao, dễ hư hỏng theo thời gian, hoặc có thời hạn chặt chẽ. So với đường biển, hàng không thường nhanh hơn nhưng chi phí cao hơn, nên chúng tôi tư vấn theo từng lô.
Hàng không có những dịch vụ nào? | Airport-to-airport (nhận và giao tại sân bay), door-to-airport, airport-to-door và door-to-door. Chúng tôi đề xuất phương án phù hợp với vị trí kho và thời hạn của bạn.
Hàng nguy hiểm có vận chuyển được không? | Có, nhưng cần khai báo và đóng gói đúng quy định hàng không. Hàng nguy hiểm đòi hỏi hồ sơ và kiểm tra riêng trước khi nhận, nên bạn cần báo ngay khi có thông tin.
Làm sao biết lô hàng đã bay chưa? | Chúng tôi cập nhật các mốc: nhận hàng, đã làm thủ tục, đã xếp lên máy bay, đã đến sân bay đích và đã giao. Bạn nhận thông báo theo từng mốc.
Có cần kiểm tra hải quan không? | Hàng nhập khẩu đều phải làm thủ tục hải quan. Chúng tôi phối hợp khai báo và thông quan để hàng ra sân bay không bị giữ lại.
TXT,
				'body'       => <<<'HTML'
<p>HP Trading - Transport tổ chức vận chuyển hàng không cho lô hàng cần đến nhanh, hàng giá trị cao và hàng phải đi đúng chuyến bay. Chúng tôi đề xuất phương án theo tuyến, gồm chuyến bay trực tiếp hoặc chuyển tải, và theo dõi lô hàng từ lúc nhận đến khi giao cho người nhận.</p>

<h2>Các hình thức vận chuyển hàng không</h2>
<ul>
<li><strong>Sân bay đến sân bay (airport to airport):</strong> bạn tự đưa hàng đến sân bay đi và nhận tại sân bay đến.</li>
<li><strong>Cửa đến sân bay (door to airport):</strong> chúng tôi lấy hàng tại kho nhà cung cấp và đưa ra sân bay đi.</li>
<li><strong>Sân bay đến cửa (airport to door):</strong> nhận hàng tại sân bay đến và giao đến kho hoặc điểm nhận của bạn.</li>
<li><strong>Cửa đến cửa (door to door):</strong> trọn gói từ kho gửi đến kho nhận, gồm cả thủ tục.</li>
</ul>

<h2>Quy trình vận chuyển hàng không</h2>
<ol>
<li><strong>Đánh giá lô hàng:</strong> kiểm tra kích thước, khối lượng, tính chất hàng và thời hạn để chọn chuyến bay phù hợp.</li>
<li><strong>Đặt chỗ và đóng gói:</strong> booking với hãng bay, chuẩn bị chứng từ và đóng gói theo quy định.</li>
<li><strong>Làm thủ tục và xếp hàng:</strong> khai báo hải quan xuất khẩu, làm thủ tục tại sân bay và xếp hàng lên máy bay.</li>
<li><strong>Theo dõi và nhận hàng:</strong> cập nhật từng mốc, làm thủ tục nhập khẩu và giao hàng cho người nhận.</li>
</ol>

<h2>Vì sao chọn HP Trading - Transport cho hàng không</h2>
<ul>
<li>Phương án được đề xuất theo tuyến và thời hạn, không đặt một chuyến duy nhất cho mọi lô.</li>
<li>Theo dõi hàng xuyên suốt, báo từng mốc quan trọng.</li>
<li>Kết hợp thủ tục hải quan và giao hàng nội địa, nên hàng đi nhanh từ sân bay đến kho bạn.</li>
</ul>

<h2>Thông tin cần gửi để nhận báo giá</h2>
<p>Tên hàng và mô tả, khối lượng và kích thước từng kiện, giá trị hàng, sân bay đi và sân bay đến, điều kiện giao hàng, thời hạn cần hàng đến, và hàng có thuộc nhóm nguy hiểm hay cần nhiệt độ kiểm soát không.</p>
HTML,
			),
			'en' => array(
				'title'      => 'Air freight',
				'keyword'    => 'air freight Vietnam',
				'excerpt'    => 'Air freight for urgent shipments, high-value goods and cargo that must travel on a specific flight. We propose the route, with direct or transit flights, and track the shipment from pickup to delivery to the receiver.',
				'meta_title' => 'Air Freight Vietnam, Air Cargo | HP Trading - Transport',
				'meta_desc'  => 'Air freight for import and export in Vietnam: urgent and high-value cargo, airport-to-airport and door-to-door, with direct or transit options and tracking.',
				'faq'        => <<<'TXT'
When should I choose air freight? | When cargo must arrive quickly, has high value, is time-sensitive, or has a tight deadline. Compared with sea freight, air is usually faster and costs more, so we advise shipment by shipment.
What air freight services do you offer? | Airport-to-airport (you deliver to and collect from the airports), door-to-airport, airport-to-door and door-to-door. We propose the option that fits your warehouse location and deadline.
Can you ship dangerous goods by air? | Yes, but the cargo must be declared and packed under air regulations. Dangerous goods need separate documents and checks before acceptance, so tell us as early as possible.
How can I know whether my shipment has flown? | We update each milestone: collection, check-in, loaded on the aircraft, arrived at the destination airport and delivered. You receive a notice at each stage.
Do air shipments need customs clearance? | Imports always require customs procedures. We coordinate the declaration and clearance so cargo is not held at the airport.
TXT,
				'body'       => <<<'HTML'
<p>HP Trading - Transport arranges air freight for shipments that need to arrive quickly, high-value cargo and goods that must travel on a specific flight. We propose the route, with direct or transit flights, and track each shipment from pickup until it is delivered to the receiver.</p>

<h2>Air freight options</h2>
<ul>
<li><strong>Airport to airport:</strong> you deliver cargo to the departure airport and collect it at the arrival airport.</li>
<li><strong>Door to airport:</strong> we collect from the supplier's warehouse and take the cargo to the departure airport.</li>
<li><strong>Airport to door:</strong> we collect at the arrival airport and deliver to your warehouse or receiving point.</li>
<li><strong>Door to door:</strong> a full service from the shipper's warehouse to the consignee's warehouse, including documentation.</li>
</ul>

<h2>How the air freight process works</h2>
<ol>
<li><strong>Assess the shipment:</strong> we check dimensions, weight, nature of the goods and your deadline to choose the right flight.</li>
<li><strong>Book and pack:</strong> booking with the airline, document preparation and packing to air regulations.</li>
<li><strong>Clear and load:</strong> export customs declaration, airport check-in and loading onto the aircraft.</li>
<li><strong>Track and receive:</strong> we update each milestone, handle import procedures and deliver to the receiver.</li>
</ol>

<h2>Why choose HP Trading - Transport for air freight</h2>
<ul>
<li>We propose options by route and deadline, not one flight for every shipment.</li>
<li>End-to-end tracking, with notice at each key milestone.</li>
<li>Customs and domestic delivery are included, so cargo moves quickly from the destination airport to your warehouse.</li>
</ul>

<h2>What to send us for a quote</h2>
<p>Cargo description, weight and dimensions of each package, declared value, departure and arrival airports, delivery terms, the date the cargo must arrive, and whether the goods are dangerous or need temperature control.</p>
HTML,
			),
		),

		/* ================= 5. KHO BÃI & XẾP DỠ ================= */
		'warehouse' => array(
			'slug' => 'kho-bai-xep-do',
			'icon' => 'warehouse',
			'vi' => array(
				'title'      => 'Kho bãi & xếp dỡ',
				'keyword'    => 'dịch vụ kho bãi logistics',
				'excerpt'    => 'Dịch vụ kho bãi và xếp dỡ: lưu kho ngắn hoặc dài hạn, đóng và rút container, kiểm đếm, quản lý tồn kho và xếp dỡ tại cảng hoặc kho. Chúng tôi xây dựng hệ thống kho liên kết trên toàn quốc để hàng hóa luôn sẵn sàng khi bạn cần.',
				'meta_title' => 'Dịch vụ kho bãi, xếp dỡ, quản lý tồn kho | HP Trading - Transport',
				'meta_desc'  => 'Dịch vụ kho bãi logistics tại Việt Nam: lưu kho, đóng rút container, kiểm đếm, quản lý tồn kho và xếp dỡ tại cảng và kho. Báo cáo định kỳ.',
				'faq'        => <<<'TXT'
Dịch vụ kho bãi gồm những gì? | Lưu kho theo kệ hoặc theo diện tích, đóng và rút container, xếp dỡ, kiểm đếm, đóng gói lại, quản lý tồn kho và xuất nhập kho theo lệnh của bạn.
Kho có phục vụ hàng ngắn hạn không? | Có. Chúng tôi nhận lưu hàng ngắn hạn để chờ thông quan, chờ tàu hoặc chờ phân phối, và lưu dài hạn theo hợp đồng.
Làm sao biết hàng trong kho còn bao nhiêu? | Chúng tôi lập báo cáo tồn kho theo chu kỳ bạn chọn (tuần hoặc tháng), kèm số lượng, vị trí và tình trạng hàng. Bạn có thể yêu cầu kiểm đếm đột xuất.
Hàng có được bảo hiểm trong kho không? | Trách nhiệm của kho và mức bồi thường theo hợp đồng lưu kho. Chúng tôi khuyến nghị bạn mua bảo hiểm hàng hóa cho giá trị lô hàng trong kho.
Xếp dỡ tại cảng có được không? | Có. Chúng tôi phối hợp xếp dỡ container và hàng lẻ tại cảng, và có thể bốc xếp hàng tại kho bạn theo yêu cầu.
TXT,
				'body'       => <<<'HTML'
<p>HP Trading - Transport cung cấp dịch vụ kho bãi và xếp dỡ cho hàng xuất nhập khẩu và hàng nội địa. Chúng tôi lưu kho ngắn hạn hoặc dài hạn, đóng và rút container, kiểm đếm, quản lý tồn kho và xếp dỡ tại cảng hoặc kho, để hàng hóa sẵn sàng đúng lúc bạn cần.</p>

<h2>Dịch vụ kho bãi và xếp dỡ</h2>
<ul>
<li><strong>Lưu kho:</strong> lưu hàng theo kệ hoặc theo diện tích, ngắn hạn để chờ thông quan hoặc dài hạn theo hợp đồng.</li>
<li><strong>Đóng hàng và rút hàng container:</strong> đóng hàng xuất vào container và rút hàng nhập ra kho, kiểm đếm theo phiếu.</li>
<li><strong>Kiểm đếm và kiểm tra tình trạng:</strong> đối chiếu số lượng và tình trạng bên ngoài với chứng từ.</li>
<li><strong>Quản lý tồn kho:</strong> theo dõi xuất nhập, số lượng và vị trí, báo cáo tồn kho theo chu kỳ.</li>
<li><strong>Xếp dỡ:</strong> xếp dỡ container và hàng lẻ tại cảng và kho, bằng thiết bị phù hợp với loại hàng.</li>
<li><strong>Đóng gói bổ sung:</strong> đóng gói lại, dán nhãn và chuẩn bị hàng theo yêu cầu phân phối.</li>
</ul>

<h2>Quy trình làm việc với kho HP Trading - Transport</h2>
<ol>
<li><strong>Khảo sát hàng hóa:</strong> chúng tôi xem loại hàng, khối lượng, yêu cầu bảo quản và thời gian lưu để đề xuất diện tích và cách xếp.</li>
<li><strong>Nhập kho:</strong> kiểm đếm, lập phiếu nhập và chụp ảnh tình trạng hàng khi nhận.</li>
<li><strong>Lưu trữ và xuất nhập:</strong> thực hiện lệnh xuất nhập của bạn, cập nhật tồn kho.</li>
<li><strong>Báo cáo và đối soát:</strong> gửi báo cáo định kỳ và đối soát chi phí lưu kho theo tháng.</li>
</ol>

<h2>Vì sao chọn kho HP Trading - Transport</h2>
<ul>
<li>Hệ thống kho liên kết với mạng vận chuyển, nên hàng ra vào kho được điều phối cùng lịch xe và lịch tàu.</li>
<li>Báo cáo tồn kho rõ ràng, có thể kiểm đếm đột xuất khi cần.</li>
<li>Đội ngũ có kinh nghiệm xếp dỡ nhiều loại hàng và thiết bị.</li>
</ul>

<h2>Thông tin cần gửi để nhận báo giá</h2>
<p>Loại hàng và mô tả, khối lượng và thể tích, số kiện hoặc số pallet, thời gian lưu dự kiến, yêu cầu bảo quản (nhiệt độ, độ ẩm, chống ẩm), và có cần đóng gói hoặc kiểm đếm định kỳ hay không.</p>
HTML,
			),
			'en' => array(
				'title'      => 'Warehousing and handling',
				'keyword'    => 'logistics warehousing Vietnam',
				'excerpt'    => 'Warehousing and handling: short or long-term storage, container stuffing and unstuffing, counting and inspection, inventory management, and port or warehouse handling. Our connected warehouse network across Vietnam keeps your goods ready when you need them.',
				'meta_title' => 'Warehousing and Handling Vietnam | HP Trading - Transport',
				'meta_desc'  => 'Logistics warehousing in Vietnam: short and long-term storage, container stuffing, inventory control, port and warehouse handling and periodic reports.',
				'faq'        => <<<'TXT'
What does warehousing service include? | Racked or area-based storage, container stuffing and unstuffing, handling, counting, repacking, inventory control, and inbound and outbound movements against your instructions.
Do you store goods for a short time? | Yes. We store cargo short term while it waits for customs clearance, a vessel or distribution, and provide long-term storage under contract.
How do I know how much stock is in the warehouse? | We issue inventory reports at the cycle you choose (weekly or monthly), with quantities, locations and condition. You can also request an unscheduled count.
Is goods stored in the warehouse insured? | Warehouse liability and compensation follow the storage contract. We recommend cargo insurance for the value of goods held in storage.
Can you handle port operations too? | Yes. We coordinate container and LCL handling at the port, and can load or unload goods at your warehouse on request.
TXT,
				'body'       => <<<'HTML'
<p>HP Trading - Transport provides warehousing and handling for import, export and domestic cargo. We offer short and long-term storage, container stuffing and unstuffing, counting, inventory control and handling at ports or warehouses, so your goods are ready at the right time.</p>

<h2>Warehousing and handling services</h2>
<ul>
<li><strong>Storage:</strong> racked or area-based storage, short term while cargo awaits clearance, or long term under contract.</li>
<li><strong>Stuffing and unstuffing:</strong> loading export goods into containers and unloading import containers into the warehouse, counted against the packing list.</li>
<li><strong>Counting and condition checks:</strong> matching quantities and outer condition against the documents.</li>
<li><strong>Inventory control:</strong> tracking inbound and outbound movements, quantities and locations, with periodic reports.</li>
<li><strong>Handling:</strong> loading and unloading containers and LCL cargo at ports and warehouses, using equipment suited to the goods.</li>
<li><strong>Value-added packing:</strong> repacking, labelling and preparing goods for distribution.</li>
</ul>

<h2>How working with an HP Trading - Transport warehouse runs</h2>
<ol>
<li><strong>Survey the goods:</strong> we review the cargo type, volume, storage conditions and planned duration to propose space and layout.</li>
<li><strong>Receive into storage:</strong> we count, issue a receiving note and photograph the condition on arrival.</li>
<li><strong>Store and move:</strong> we carry out your inbound and outbound orders and update inventory.</li>
<li><strong>Report and reconcile:</strong> we send periodic reports and reconcile storage charges monthly.</li>
</ol>

<h2>Why choose HP Trading - Transport warehousing</h2>
<ul>
<li>Our warehouses connect to our transport network, so inbound and outbound moves follow the truck and vessel schedules.</li>
<li>Clear inventory reports, with unscheduled counts on request.</li>
<li>Experienced teams and equipment for many types of cargo.</li>
</ul>

<h2>What to send us for a quote</h2>
<p>Cargo type and description, weight and volume, number of packages or pallets, expected storage period, storage requirements (temperature, humidity, moisture protection), and whether you need repacking or scheduled counts.</p>
HTML,
			),
		),

		/* ================= 6. HÀNG DỰ ÁN ================= */
		'project' => array(
			'slug' => 'hang-du-an',
			'icon' => 'project',
			'vi' => array(
				'title'      => 'Hàng dự án',
				'keyword'    => 'vận chuyển hàng dự án quá khổ',
				'excerpt'    => 'Vận chuyển hàng dự án: máy móc, thiết bị, hàng quá khổ và quá tải cho công trình. Chúng tôi khảo sát tuyến, lập phương án chằng buộc và tổ chức vận tải đa phương thức, chịu trách nhiệm từ thủ tục hải quan đến lắp đặt tại công trình.',
				'meta_title' => 'Vận chuyển hàng dự án, hàng quá khổ quá tải | HP Trading - Transport',
				'meta_desc'  => 'Vận chuyển hàng dự án: máy móc thiết bị, hàng quá khổ, quá tải cho công trình. Khảo sát tuyến, chằng buộc, thủ tục hải quan và lắp đặt tại công trình.',
				'faq'        => <<<'TXT'
Hàng dự án là gì? | Hàng cho công trình hoặc nhà máy có kích thước hoặc trọng lượng vượt tiêu chuẩn thông thường, như máy móc, thiết bị, cấu kiện thép, bồn bể và hàng quá khổ hoặc quá tải. Loại hàng này cần kế hoạch riêng từ khâu khảo sát.
Vì sao cần khảo sát tuyến trước khi vận chuyển? | Hàng quá khổ hoặc quá tải có thể không đi được qua cầu, đường hẹp hoặc các điểm giao thông nhất định. Khảo sát giúp xác định tuyến, thời điểm được phép đi và cần xin giấy phép nào.
Có giấy phép vận chuyển hàng quá khổ không? | Nếu tuyến cần giấy phép lưu hành cho xe và hàng quá khổ hoặc quá tải, chúng tôi chuẩn bị hồ sơ và làm việc với cơ quan có thẩm quyền theo quy định.
Có đảm nhận lắp đặt tại công trình không? | Có. Chúng tôi phối hợp cẩu, dỡ và di chuyển thiết bị vào vị trí lắp đặt, hoặc làm việc với đơn vị lắp đặt của chủ đầu tư.
Ai chịu trách nhiệm về thủ tục hải quan? | HP Trading - Transport chịu trách nhiệm toàn bộ thủ tục hải quan và các thủ tục chuyên ngành theo quy định, cùng khâu vận chuyển và giao hàng tại công trình.
TXT,
				'body'       => <<<'HTML'
<p>HP Trading - Transport vận chuyển hàng dự án: máy móc, thiết bị, cấu kiện và hàng quá khổ hoặc quá tải phục vụ công trình và nhà máy. Chúng tôi khảo sát tuyến, lập phương án chằng buộc và tổ chức vận tải đa phương thức, và chịu trách nhiệm từ thủ tục hải quan đến khi hàng được đưa vào vị trí lắp đặt.</p>

<h2>Hàng dự án mà HP Trading - Transport đảm nhận</h2>
<ul>
<li>Máy móc và thiết bị sản xuất, thiết bị công nghiệp, dây chuyền.</li>
<li>Hàng quá khổ, quá tải và hàng có trọng lượng lớn.</li>
<li>Cấu kiện thép, bồn bể, thiết bị điện và hàng có hình dạng đặc biệt.</li>
<li>Vận chuyển theo nhiều phương thức: đường biển, đường bộ, đường thủy nội địa kết hợp.</li>
</ul>

<h2>Năng lực và phương pháp làm hàng dự án</h2>
<ul>
<li><strong>Khảo sát tuyến:</strong> đánh giá cầu, đường, điểm giao cắt và thời điểm được phép lưu hành trước khi cam kết.</li>
<li><strong>Lập phương án:</strong> chọn phương tiện, cách chằng buộc, cẩu và nhân lực theo từng hạng mục.</li>
<li><strong>Đảm bảo chứng từ:</strong> hồ sơ hải quan, giấy phép lưu hành khi cần và các thủ tục chuyên ngành.</li>
<li><strong>Tư vấn cho chủ đầu tư:</strong> góp ý giải pháp và lịch thực hiện để hạn chế chi phí phát sinh.</li>
</ul>

<h2>Quy trình thực hiện hàng dự án</h2>
<ol>
<li><strong>Tiếp nhận hồ sơ kỹ thuật:</strong> bản vẽ, kích thước, khối lượng, trọng tâm và vị trí lắp đặt.</li>
<li><strong>Khảo sát và đề xuất:</strong> khảo sát tuyến, lập phương án và báo chi phí, thời gian từng giai đoạn.</li>
<li><strong>Thực hiện vận chuyển:</strong> cẩu, chằng buộc, vận chuyển và xử lý thủ tục hải quan theo kế hoạch.</li>
<li><strong>Giao hàng và lắp đặt:</strong> đưa thiết bị vào vị trí, phối hợp với đơn vị lắp đặt và bàn giao biên bản.</li>
</ol>

<h2>Vì sao chọn HP Trading - Transport cho hàng dự án</h2>
<ul>
<li>Đội ngũ có kinh nghiệm quy trình chuyên chở và đóng gói hàng công nghiệp.</li>
<li>Đội xe chuyên dụng và đối tác có trang thiết bị phù hợp với hàng nặng và hàng quá khổ.</li>
<li>Một đầu mối chịu trách nhiệm cả chuỗi, nên chủ đầu tư không phải điều phối nhiều bên.</li>
</ul>

<h2>Thông tin cần gửi để nhận khảo sát</h2>
<p>Danh mục hàng hóa kèm kích thước (dài, rộng, cao), khối lượng từng kiện, bản vẽ hoặc ảnh nếu có, điểm đi, điểm đến và vị trí lắp đặt, thời gian dự kiến cho công trình, và yêu cầu về cẩu, lắp đặt.</p>
HTML,
			),
			'en' => array(
				'title'      => 'Project cargo',
				'keyword'    => 'project cargo oversize Vietnam',
				'excerpt'    => 'Project cargo transport: machinery, equipment, oversized and overweight goods for construction and industrial sites. We survey the route, plan lashing and run multimodal transport, taking responsibility from customs clearance to installation at site.',
				'meta_title' => 'Project Cargo, Oversize and Overweight | HP Trading - Transport',
				'meta_desc'  => 'Project cargo transport in Vietnam: machinery and oversize or overweight loads for construction and factories. Route survey, lashing, customs and site delivery.',
				'faq'        => <<<'TXT'
What is project cargo? | Goods for a construction site or factory that exceed standard size or weight, such as machinery, equipment, steel structures, tanks and oversize or overweight loads. This cargo needs its own plan from the survey stage.
Why is a route survey needed before transport? | Oversize or overweight loads may not pass certain bridges, narrow roads or traffic points. The survey confirms the route, permitted travel times and which permits are needed.
Do you obtain permits for oversize transport? | If the route needs permits for oversize or overweight vehicles and loads, we prepare the papers and work with the competent authority as required.
Do you handle installation at site? | Yes. We coordinate lifting, unloading and moving equipment to its installation position, or work with the installer appointed by the owner.
Who is responsible for customs procedures? | HP Trading - Transport is responsible for all customs procedures and specialised procedures required by regulation, together with transport and delivery at site.
TXT,
				'body'       => <<<'HTML'
<p>HP Trading - Transport transports project cargo: machinery, equipment, structural components and oversized or overweight loads for construction sites and factories. We survey the route, plan lashing and run multimodal transport, and we take responsibility from customs clearance until the cargo is placed at its installation position.</p>

<h2>Project cargo we handle</h2>
<ul>
<li>Production machinery, industrial equipment and production lines.</li>
<li>Oversized, overweight and heavy-lift cargo.</li>
<li>Steel structures, tanks and vessels, electrical equipment and irregularly shaped loads.</li>
<li>Multimodal transport combining sea, road and inland waterway legs.</li>
</ul>

<h2>Capability and method for project cargo</h2>
<ul>
<li><strong>Route survey:</strong> we check bridges, roads, junctions and permitted travel times before committing to a plan.</li>
<li><strong>Transport plan:</strong> we select vehicles, lashing method, lifting equipment and crew for each item.</li>
<li><strong>Documents:</strong> customs papers, travel permits where required, and specialised procedures.</li>
<li><strong>Advice to owners:</strong> we suggest solutions and a schedule to limit unplanned costs.</li>
</ul>

<h2>How a project cargo job runs</h2>
<ol>
<li><strong>Receive technical data:</strong> drawings, dimensions, weights, centre of gravity and the installation position.</li>
<li><strong>Survey and propose:</strong> we survey the route, prepare the plan and quote cost and time for each stage.</li>
<li><strong>Carry out transport:</strong> lifting, lashing, transport and customs handling according to the schedule.</li>
<li><strong>Deliver and install:</strong> we place the equipment in position, coordinate with the installer and sign off the handover record.</li>
</ol>

<h2>Why choose HP Trading - Transport for project cargo</h2>
<ul>
<li>Team experience in transporting and packing industrial cargo.</li>
<li>Specialised vehicles and partners with equipment suited to heavy and oversize loads.</li>
<li>One partner responsible for the whole chain, so the owner does not need to coordinate several contractors.</li>
</ul>

<h2>What to send us for a survey</h2>
<p>Cargo list with dimensions (length, width, height), weight of each piece, drawings or photos if available, origin, destination and installation position, the target date for the project, and any lifting or installation requirements.</p>
HTML,
			),
		),
	);
}

/** Lấy nội dung một dịch vụ theo khóa icon (customs, truck, ship, plane, warehouse, project). */
function anp_service_library_item($key) {
	$lib = anp_service_library();
	return isset($lib[$key]) ? $lib[$key] : null;
}
