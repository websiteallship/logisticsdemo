<?php
/**
 * Template Name: Trang Giới Thiệu (About Page)
 * Description: Hồ sơ năng lực doanh nghiệp HP Trading - Transport (Banner Hero hình ảnh thực tế + Tầm nhìn, Sứ mệnh, Câu chuyện, Giá trị cốt lõi).
 */
get_header();

$is_en = anp_lang() === 'en';
$contact_page = get_page_by_path('lien-he') ?: get_page_by_path('contact');
$contact_url  = $contact_page ? get_permalink($contact_page) : home_url('/lien-he/');
$uploads_base = content_url('/uploads/2026/11/');
$theme_assets = get_template_directory_uri() . '/assets/img/';
?>

<!-- 1. Breadcrumb Navigation -->
<nav class="border-b border-slate-200 bg-slate-50" aria-label="<?php echo esc_attr(anp_t('breadcrumb')); ?>">
	<div class="mx-auto flex max-w-7xl flex-wrap items-center gap-2 px-5 py-3.5 text-sm text-slate-600 sm:px-8">
		<a class="hover:text-brand font-medium transition" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(anp_t('home')); ?></a>
		<span aria-hidden="true" class="text-slate-400">/</span>
		<span class="font-semibold text-brand" aria-current="page"><?php echo esc_html($is_en ? 'About Us' : 'Giới thiệu doanh nghiệp'); ?></span>
	</div>
</nav>

<!-- 2. Hero Banner: Ảnh Toàn Cảnh Nhận Diện Doanh Nghiệp & Đội Xe HP Trading (Full-width) -->
<header class="relative w-full overflow-hidden bg-slate-900">
	<h1 class="sr-only"><?php echo esc_html($is_en ? 'HP Trading - Transport | Company Profile & Logistics Solutions' : 'HP Trading - Transport | Giới Thiệu Doanh Nghiệp & Hồ Sơ Năng Lực Chuỗi Cung Ứng'); ?></h1>
	<img src="<?php echo esc_url($uploads_base . 'banner-doi-xe-hp-trading.jpg'); ?>" 
		 alt="HP Trading - Transport - Vận tải hàng hóa, Cho thuê xe đầu kéo, Kho bãi hàng hóa, Tư vấn dịch vụ hải quan" 
		 class="w-full h-auto object-cover block"
		 loading="eager" fetchpriority="high">
</header>

<main class="py-10 sm:py-16 bg-white">
	<div class="mx-auto max-w-7xl px-5 sm:px-8 space-y-16 sm:space-y-24">

		<!-- SECTION 1: TẦM NHÌN & SỨ MỆNH (VISION & MISSION CARDS) -->
		<section class="reveal-up">
			<div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12">
				<span class="text-xs font-bold uppercase tracking-wider text-accent"><?php echo esc_html($is_en ? 'Guiding Principles' : 'Kim Chỉ Nam Hoạt Động'); ?></span>
				<h2 class="mt-2 font-display text-2xl sm:text-4xl font-extrabold text-brand">
					<?php echo esc_html($is_en ? 'Vision & Mission' : 'Sứ Mệnh Phụng Sự & Tầm Nhìn Chiến Lược'); ?>
				</h2>
				<p class="mt-3 text-slate-600 text-sm sm:text-base">
					<?php echo esc_html($is_en ? 'Building enduring value for partners through discipline, transparency, and continuous technological enhancement.' : 'Định hình tương lai vận tải container cảng biển bằng cam kết minh bạch chi phí, kỷ luật giờ giấc và trách nhiệm pháp lý trọn vẹn.'); ?>
				</p>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10">
				
				<!-- Thẻ SỨ MỆNH (Tone Trắng / Công nghiệp tinh khiết) -->
				<div class="relative rounded-3xl border border-slate-200 bg-slate-50/80 p-8 sm:p-10 shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between">
					<div>
						<div class="flex items-center justify-between pb-6 border-b border-slate-200">
							<span class="inline-flex items-center gap-2 rounded-full bg-[#1F4F25]/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-brand">
								<span class="h-1.5 w-1.5 rounded-full bg-brand"></span>
								<?php echo esc_html($is_en ? 'Our Mission' : 'Sứ Mệnh Của Chúng Tôi'); ?>
							</span>
							<span class="text-3xl font-display font-black text-slate-300">01</span>
						</div>
						<h3 class="mt-6 font-display text-xl sm:text-2xl font-bold text-brand leading-snug">
							<?php echo esc_html($is_en ? 'Simplify the Supply Chain & Protect Client Value' : 'Đơn Giản Hóa Chuỗi Cung Ứng • Bảo Vệ Lợi Ích Khách Hàng'); ?>
						</h3>
						<p class="mt-4 text-slate-600 text-sm sm:text-base leading-relaxed">
							<?php echo esc_html($is_en ? 'HP Trading - Transport exists to eliminate the greatest pain points in import-export: port demurrage fees, clearance bottlenecks, and unforeseen surcharges. We act as an unwavering extension of your logistics department with total accountability.' : 'HP Trading - Transport ra đời nhằm giải quyết triệt để các rủi ro lớn nhất của doanh nghiệp xuất nhập khẩu: trễ hạn tàu, lưu bãi phát sinh chi phí và ách tắc thủ tục hải quan. Sứ mệnh của chúng tôi là trở thành cánh tay nối dài tin cậy, bảo vệ từng lô hàng và tối ưu dòng tiền của khách hàng bằng sự tận tâm, chuẩn xác và kỷ luật tuyệt đối.'); ?>
						</p>
					</div>
					
					<div class="mt-8 pt-6 border-t border-slate-200/80 space-y-3">
						<div class="flex items-center gap-3 text-sm text-slate-700">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-brand font-bold text-xs">✓</span>
							<span><?php echo esc_html($is_en ? '100% Adherence to shipping line closing times' : 'Kiểm soát 100% closing time của mọi hãng tàu lớn'); ?></span>
						</div>
						<div class="flex items-center gap-3 text-sm text-slate-700">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-brand font-bold text-xs">✓</span>
							<span><?php echo esc_html($is_en ? 'Itemized quotes with absolute zero hidden costs' : 'Minh bạch toàn bộ cước phí, nâng hạ và phí bến bãi'); ?></span>
						</div>
						<div class="flex items-center gap-3 text-sm text-slate-700">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-brand font-bold text-xs">✓</span>
							<span><?php echo esc_html($is_en ? 'Round-the-clock on-site port problem solving' : 'Túc trực xử lý kiểm hóa và giải phóng hàng tại cảng 24/7'); ?></span>
						</div>
					</div>
				</div>

				<!-- Thẻ TẦM NHÌN (Tone Deep Navy Doanh Nghiệp) -->
				<div class="relative rounded-3xl border border-white/10 bg-[#061220] p-8 sm:p-10 text-white shadow-xl hover:shadow-2xl transition duration-300 flex flex-col justify-between overflow-hidden">
					<div class="pointer-events-none absolute -right-20 -top-20 h-56 w-56 rounded-full bg-brand/40 blur-3xl"></div>
					
					<div class="relative z-10">
						<div class="flex items-center justify-between pb-6 border-b border-white/10">
							<span class="inline-flex items-center gap-2 rounded-full bg-accent/20 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-accent">
								<span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse"></span>
								<?php echo esc_html($is_en ? 'Vision Toward 2030' : 'Tầm Nhìn Đến Năm 2030'); ?>
							</span>
							<span class="text-3xl font-display font-black text-white/20">02</span>
						</div>
						<h3 class="mt-6 font-display text-xl sm:text-2xl font-bold text-white leading-snug">
							<?php echo esc_html($is_en ? 'Leading Port Logistics Ecosystem in Southern Vietnam' : 'Thương Hiệu Vận Tải Cảng Biển & Hải Quan Uy Tín Hàng Đầu'); ?>
						</h3>
						<p class="mt-4 text-slate-300 text-sm sm:text-base leading-relaxed">
							<?php echo esc_html($is_en ? 'To expand HP Trading - Transport into a premier multimodal transport ecosystem across Southern Vietnam, expanding our active fleet to 100+ tractor units, integrating digital TMS/WMS software directly connected to deep-water port systems.' : 'Phát triển HP Trading - Transport trở thành thương hiệu vận tải container và dịch vụ hải quan kiểu mẫu tại vùng kinh tế trọng điểm phía Nam. Nâng quy mô đội xe lên 100+ đầu kéo chuyên dụng, ứng dụng hệ thống số hóa điều vận TMS và quản lý kho bãi WMS thông minh kết nối trực tiếp với cụm cảng Cát Lái - Cái Mép - Long Thành.'); ?>
						</p>
					</div>

					<div class="relative z-10 mt-8 pt-6 border-t border-white/10 space-y-3">
						<div class="flex items-center gap-3 text-sm text-slate-200">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-accent/20 text-accent font-bold text-xs">⬡</span>
							<span><?php echo esc_html($is_en ? '100+ Heavy tractors meeting Euro 5/6 emission standards' : '100+ Đầu kéo đời mới Chenglong, Scania chuẩn Euro 5/6'); ?></span>
						</div>
						<div class="flex items-center gap-3 text-sm text-slate-200">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-accent/20 text-accent font-bold text-xs">⬡</span>
							<span><?php echo esc_html($is_en ? '3 Strategic transit hubs next to main expressways' : '03 Bãi xe & kho trung chuyển vệ tinh tiếp giáp cao tốc'); ?></span>
						</div>
						<div class="flex items-center gap-3 text-sm text-slate-200">
							<span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-accent/20 text-accent font-bold text-xs">⬡</span>
							<span><?php echo esc_html($is_en ? 'Trusted by Top 10 International Shipping Lines' : 'Đối tác vận tải chỉ định của các tập đoàn sản xuất FDI'); ?></span>
						</div>
					</div>
				</div>

			</div>
		</section>

		<!-- SECTION 2: CÂU CHUYỆN THƯƠNG HIỆU & HÀNH TRÌNH 10 NĂM (BRAND STORY & TIMELINE) -->
		<section class="reveal-up grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
			
			<!-- Cột Trái: Câu Chuyện Hình Thành -->
			<div class="lg:col-span-6 space-y-5">
				<span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-100 px-3.5 py-1 text-xs font-semibold uppercase tracking-wider text-slate-700">
					<?php echo esc_html($is_en ? 'Company Journey' : 'Hành Trình 10 Năm Phát Triển'); ?>
				</span>
				<h2 class="font-display text-2xl sm:text-4xl font-extrabold text-brand leading-tight">
					<?php echo esc_html($is_en ? 'From Deep Regulatory Expertise to a Powerful Owned Fleet' : 'Thấu Hiểu Trực Địa • Làm Chủ Năng Lực Vận Tải'); ?>
				</h2>
				<p class="text-slate-600 leading-relaxed text-sm sm:text-base">
					<?php echo esc_html($is_en ? 'Founded in 2014, HP Trading - Transport originated from a team of customs brokers who witnessed first-hand the heavy losses enterprises endured simply because of document delays or mismatched trucking schedules.' : 'Khởi đầu từ năm 2014, HP Trading - Transport được sáng lập bởi những chuyên gia hải quan dày dạn kinh nghiệm thực tế. Chúng tôi từng chứng kiến không ít doanh nghiệp xuất nhập khẩu phải gánh chịu hàng trăm triệu tiền phạt lưu bãi, lưu container chỉ vì một sai sót nhỏ trên tờ khai hoặc do phụ thuộc vào đội xe thuê ngoài thiếu trách nhiệm.'); ?>
				</p>
				<p class="text-slate-600 leading-relaxed text-sm sm:text-base">
					<?php echo esc_html($is_en ? 'That reality motivated our bold investment: instead of being a traditional forwarder, we invested directly in heavy-duty tractor trucks and built our own logistics infrastructure to guarantee absolute service quality from port to factory gate.' : 'Thực tế đó đã thôi thúc chúng tôi chọn hướng đi khác biệt: Không đơn thuần làm môi giới trung gian, HP Trading - Transport quyết định đầu tư trực tiếp vào đội xe đầu kéo chuyên dụng và bãi xe vệ tinh. Nhờ đó, chúng tôi nắm quyền chủ động 100% trong điều phối, bảo đảm hàng hạ bãi xuất cảng an toàn và đúng hẹn trong mọi tình huống.'); ?>
				</p>

				<div class="pt-2 flex items-center gap-4">
					<div class="flex items-center gap-3">
						<div class="grid h-12 w-12 place-items-center rounded-xl bg-brand text-accent font-black text-lg">
							10
						</div>
						<div>
							<div class="font-bold text-sm text-brand"><?php echo esc_html($is_en ? '10 Years of Excellence' : '10 Năm Thực Chiến Bền Bỉ'); ?></div>
							<div class="text-xs text-slate-500"><?php echo esc_html($is_en ? 'Over 50,000 successful container trips' : 'Hơn 50,000 chuyến container an toàn'); ?></div>
						</div>
					</div>
				</div>
			</div>

			<!-- Cột Phải: Dòng Thời Gian Mốc Son Phát Triển -->
			<div class="lg:col-span-6 space-y-4">
				
				<div class="relative pl-8 pb-6 border-l-2 border-slate-200">
					<div class="absolute -left-2.5 top-0 h-5 w-5 rounded-full border-4 border-white bg-brand shadow"></div>
					<div class="text-xs font-bold uppercase tracking-wider text-accent">Năm 2014</div>
					<h3 class="font-bold text-brand text-base sm:text-lg mt-0.5"><?php echo esc_html($is_en ? 'Foundation & Customs Brokerage Focus' : 'Thành Lập Doanh Nghiệp & Chuyên Môn Hóa Hải Quan'); ?></h3>
					<p class="mt-1 text-sm text-slate-600 leading-relaxed">
						<?php echo esc_html($is_en ? 'Established in HCMC, focusing on customs declarations, tariff consulting, and local delivery around Cat Lai port.' : 'Thành lập tại TP.HCM, tập trung cung cấp giải pháp khai báo hải quan điện tử VNACCS và tư vấn áp mã HS cho các doanh nghiệp gia công, sản xuất xuất khẩu.'); ?>
					</p>
				</div>

				<div class="relative pl-8 pb-6 border-l-2 border-slate-200">
					<div class="absolute -left-2.5 top-0 h-5 w-5 rounded-full border-4 border-white bg-brand shadow"></div>
					<div class="text-xs font-bold uppercase tracking-wider text-accent">Năm 2017</div>
					<h3 class="font-bold text-brand text-base sm:text-lg mt-0.5"><?php echo esc_html($is_en ? 'First 10 Tractor Trucks Investment' : 'Đầu Tư Đội Xe Đầu Kéo Đầu Tiên (10 Xe)'); ?></h3>
					<p class="mt-1 text-sm text-slate-600 leading-relaxed">
						<?php echo esc_html($is_en ? 'Direct purchase of 10 modern tractor trucks, fully mastering the container delivery route between HCMC and Binh Duong.' : 'Đầu tư trực tiếp 10 xe đầu kéo chuyên dụng mới, hoàn toàn tự chủ khâu kéo container từ cảng Cát Lái về các nhà máy tại KCN Sóng Thần, VSIP Bình Dương.'); ?>
					</p>
				</div>

				<div class="relative pl-8 pb-6 border-l-2 border-slate-200">
					<div class="absolute -left-2.5 top-0 h-5 w-5 rounded-full border-4 border-white bg-brand shadow"></div>
					<div class="text-xs font-bold uppercase tracking-wider text-accent">Năm 2020</div>
					<h3 class="font-bold text-brand text-base sm:text-lg mt-0.5"><?php echo esc_html($is_en ? 'Fleet Expansion & Satellite Depot' : 'Mở Rộng 25 Đầu Kéo & Vận Hành Bãi Xe Bình Dương'); ?></h3>
					<p class="mt-1 text-sm text-slate-600 leading-relaxed">
						<?php echo esc_html($is_en ? 'Expanded fleet to 25 Chenglong/Scania units and opened a dedicated satellite depot for container staging and staging maintenance.' : 'Nâng quy mô lên 25 xe đầu kéo Chenglong, Hải Âu H7 và đưa vào hoạt động bãi xe trung chuyển tại Thuận An, rút ngắn 40% thời gian giao nhận giờ cao điểm.'); ?>
					</p>
				</div>

				<div class="relative pl-8 border-l-2 border-transparent">
					<div class="absolute -left-2.5 top-0 h-5 w-5 rounded-full border-4 border-white bg-accent shadow animate-pulse"></div>
					<div class="text-xs font-bold uppercase tracking-wider text-accent">Hiện Nay (2024+)</div>
					<h3 class="font-bold text-brand text-base sm:text-lg mt-0.5"><?php echo esc_html($is_en ? '40+ Fleet & Full Supply Chain Partner' : '40+ Đầu Kéo Chủ Động & Hệ Thống Kho Bãi Hiện Đại'); ?></h3>
					<p class="mt-1 text-sm text-slate-600 leading-relaxed">
						<?php echo esc_html($is_en ? 'Operating 40+ heavy trucks, modern warehousing, serving 500+ FDI enterprises with 10 Billion VND comprehensive insurance.' : 'Sở hữu hơn 40 đầu kéo và rơ-moóc chuyên dụng, kho bãi tiêu chuẩn, kết nối thông suốt Cát Lái - Cái Mép, phục vụ hơn 500 khách hàng FDI với bảo hiểm 10 tỷ VNĐ.'); ?>
					</p>
				</div>

			</div>
		</section>

		<!-- SECTION 3: 4 GIÁ TRỊ CỐT LÕI (CORE VALUES BENTO GRID) -->
		<section class="reveal-up rounded-3xl bg-slate-50 border border-slate-200/80 p-8 sm:p-12">
			<div class="text-center max-w-2xl mx-auto mb-10">
				<span class="text-xs font-bold uppercase tracking-wider text-accent"><?php echo esc_html($is_en ? 'Our Core Values' : 'Văn Hóa & Cam Kết Bất Biến'); ?></span>
				<h2 class="mt-2 font-display text-2xl sm:text-4xl font-extrabold text-brand">
					<?php echo esc_html($is_en ? '4 Core Values Behind Every Shipment' : '4 Giá Trị Cốt Lõi Tạo Nên Uy Tín HP Trading'); ?>
				</h2>
				<p class="mt-2 text-slate-600 text-sm sm:text-base">
					<?php echo esc_html($is_en ? 'The bedrock principles guiding every decision, dispatch route, and customer interaction.' : 'Những nguyên tắc sống còn định hình phong cách làm việc chuyên nghiệp, tận tâm trên từng cung đường.'); ?>
				</p>
			</div>

			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
				
				<!-- Giá trị 1 -->
				<div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm hover:shadow-md transition">
					<div class="flex items-center justify-between mb-4">
						<span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#1F4F25]/10 text-brand font-black text-lg">01</span>
						<span class="text-xs font-bold uppercase tracking-wider text-slate-400">Minh Bạch</span>
					</div>
					<h3 class="font-bold text-brand text-base sm:text-lg"><?php echo esc_html($is_en ? 'Integrity & Transparency' : 'Chính Trực & Minh Bạch'); ?></h3>
					<p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
						<?php echo esc_html($is_en ? 'Itemized all-in pricing with absolute zero hidden costs. Complete honesty in tariff classifications and customs procedures.' : 'Báo giá trọn gói 1 lần không chi phí ẩn. Trung thực trong kê khai hải quan, đối soát rõ ràng từng khoản cước, phí nâng hạ và cầu đường.'); ?>
					</p>
				</div>

				<!-- Giá trị 2 -->
				<div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm hover:shadow-md transition">
					<div class="flex items-center justify-between mb-4">
						<span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#1F4F25]/10 text-brand font-black text-lg">02</span>
						<span class="text-xs font-bold uppercase tracking-wider text-slate-400">Kỷ Luật</span>
					</div>
					<h3 class="font-bold text-brand text-base sm:text-lg"><?php echo esc_html($is_en ? 'Disciplined Punctuality' : 'Kỷ Luật Giờ Giấc'); ?></h3>
					<p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
						<?php echo esc_html($is_en ? 'Punctuality is honor. Strict adherence to vessel closing time and factory loading schedules with GPS tracking.' : 'Đúng giờ là danh dự. Lịch đóng hàng tại nhà máy và thời gian hạ bãi xuất cảng được kiểm soát chặt chẽ từng phút, thông báo tiến độ trực tiếp.'); ?>
					</p>
				</div>

				<!-- Giá trị 3 -->
				<div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm hover:shadow-md transition">
					<div class="flex items-center justify-between mb-4">
						<span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#1F4F25]/10 text-brand font-black text-lg">03</span>
						<span class="text-xs font-bold uppercase tracking-wider text-slate-400">An Toàn</span>
					</div>
					<h3 class="font-bold text-brand text-base sm:text-lg"><?php echo esc_html($is_en ? 'Safety First Mindset' : 'An Toàn Tuyệt Đối'); ?></h3>
					<p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
						<?php echo esc_html($is_en ? 'Comprehensive 10 Billion VND cargo insurance. Fleet regularly inspected and maintained to ensure zero transport mishaps.' : 'Bảo hiểm trách nhiệm hàng hóa 10 tỷ VNĐ toàn diện. Đội xe được bảo dưỡng định kỳ khắt khe, tài xế có chứng chỉ và đạo đức nghề nghiệp cao.'); ?>
					</p>
				</div>

				<!-- Giá trị 4 -->
				<div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm hover:shadow-md transition">
					<div class="flex items-center justify-between mb-4">
						<span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#1F4F25]/10 text-brand font-black text-lg">04</span>
						<span class="text-xs font-bold uppercase tracking-wider text-slate-400">Tận Tâm</span>
					</div>
					<h3 class="font-bold text-brand text-base sm:text-lg"><?php echo esc_html($is_en ? 'Client-Centric Dedication' : 'Tận Tâm Phụng Sự'); ?></h3>
					<p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
						<?php echo esc_html($is_en ? 'We treat your cargo as our own. 24/7 dedicated support resolving unexpected customs or dispatch issues on the spot.' : 'Lô hàng của khách là tài sản của chính mình. Đội ngũ chuyên viên và tài xế túc trực hiện trường 24/7 giải quyết mọi phát sinh tại cảng và bãi.'); ?>
					</p>
				</div>

			</div>
		</section>

		<!-- SECTION 4: HỆ THỐNG ĐỘI XE & CƠ SỞ VẬT CHẤT (HÌNH ẢNH THỰC TẾ) -->
		<section id="nang-luc-doi-xe" class="reveal-up scroll-mt-24">
			<div class="text-center max-w-3xl mx-auto mb-10">
				<span class="text-xs font-bold uppercase tracking-wider text-accent"><?php echo esc_html($is_en ? 'Fleet & Infrastructure' : 'Cơ Sở Vật Chất & Năng Lực Phương Tiện'); ?></span>
				<h2 class="mt-2 font-display text-2xl sm:text-4xl font-extrabold text-brand">
					<?php echo esc_html($is_en ? 'Owned Modern Fleet & Standard Warehousing' : 'Hệ Thống Đội Xe Hiện Đại & Kho Bãi Quy Chuẩn'); ?>
				</h2>
				<p class="mt-3 text-slate-600 text-sm sm:text-base">
					<?php echo esc_html($is_en ? 'Active fleet of Chenglong, Scania, Haiau H7 heavy tractor trucks equipped with GPS tracking and round-the-clock dispatch.' : 'Đội xe chủ động hơn 40 đầu kéo Chenglong, Scania, Hải Âu H7 được kiểm định định kỳ, tích hợp thiết bị giám sát hành trình GPS và camera 24/7.'); ?>
				</p>
			</div>

			<!-- Ảnh Đội Xe & Bãi Trung Chuyển Thực Tế -->
			<div class="overflow-hidden rounded-2xl sm:rounded-3xl border border-slate-200 shadow-xl bg-slate-900">
				<img src="<?php echo esc_url($uploads_base . 'doi-ngu-anp-logistics-fleet.jpg'); ?>" 
					 alt="Đội xe đầu kéo và bãi container HP Trading - Transport" 
					 class="w-full h-auto object-cover max-h-[550px]"
					 loading="lazy" decoding="async">
			</div>

			<!-- 4 Trụ Cột Năng Lực Trực Quan -->
			<div class="mt-8 grid grid-cols-2 gap-4 lg:grid-cols-4">
				<div class="rounded-xl border border-slate-200 bg-slate-50/70 p-5 text-center">
					<div class="mx-auto grid h-12 w-12 place-items-center rounded-xl bg-brand text-accent font-bold mb-3">
						<?php echo anp_icon('truck', 'h-6 w-6'); ?>
					</div>
					<h3 class="font-bold text-sm text-brand"><?php echo esc_html($is_en ? 'Cargo Freight' : 'Vận Tải Hàng Hóa'); ?></h3>
					<p class="mt-1 text-xs text-slate-500"><?php echo esc_html($is_en ? 'Container & domestic trucking' : 'Kéo cont cảng biển & vận chuyển nội địa'); ?></p>
				</div>
				<div class="rounded-xl border border-slate-200 bg-slate-50/70 p-5 text-center">
					<div class="mx-auto grid h-12 w-12 place-items-center rounded-xl bg-brand text-accent font-bold mb-3">
						<?php echo anp_icon('project', 'h-6 w-6'); ?>
					</div>
					<h3 class="font-bold text-sm text-brand"><?php echo esc_html($is_en ? 'Tractor Rental' : 'Cho Thuê Xe Đầu Kéo'); ?></h3>
					<p class="mt-1 text-xs text-slate-500"><?php echo esc_html($is_en ? 'Heavy tractors & specialized trailers' : 'Đầu kéo đời mới kèm rơ-moóc chuyên dụng'); ?></p>
				</div>
				<div class="rounded-xl border border-slate-200 bg-slate-50/70 p-5 text-center">
					<div class="mx-auto grid h-12 w-12 place-items-center rounded-xl bg-brand text-accent font-bold mb-3">
						<?php echo anp_icon('warehouse', 'h-6 w-6'); ?>
					</div>
					<h3 class="font-bold text-sm text-brand"><?php echo esc_html($is_en ? 'Warehousing' : 'Kho Bãi Hàng Hóa'); ?></h3>
					<p class="mt-1 text-xs text-slate-500"><?php echo esc_html($is_en ? 'Standard storage & barcode WMS' : 'Lưu kho an toàn, quản lý mã vạch WMS'); ?></p>
				</div>
				<div class="rounded-xl border border-slate-200 bg-slate-50/70 p-5 text-center">
					<div class="mx-auto grid h-12 w-12 place-items-center rounded-xl bg-brand text-accent font-bold mb-3">
						<?php echo anp_icon('customs', 'h-6 w-6'); ?>
					</div>
					<h3 class="font-bold text-sm text-brand"><?php echo esc_html($is_en ? 'Customs Brokerage' : 'Tư Vấn Thủ Tục Hải Quan'); ?></h3>
					<p class="mt-1 text-xs text-slate-500"><?php echo esc_html($is_en ? 'VNACCS electronic declarations' : 'Khai báo điện tử, thông quan trong 24h'); ?></p>
				</div>
			</div>
		</section>

		<!-- SECTION 5: ĐỘI NGŨ NHÂN SỰ THỰC CHIẾN (HÌNH ẢNH THẬT) -->
		<section class="reveal-up rounded-3xl bg-slate-50 border border-slate-200/80 p-6 sm:p-12">
			<div class="text-center max-w-2xl mx-auto mb-10">
				<span class="text-xs font-bold uppercase tracking-wider text-accent"><?php echo esc_html($is_en ? 'Our Dedicated People' : 'Con Người Là Trọng Tâm'); ?></span>
				<h2 class="mt-2 font-display text-2xl sm:text-3xl font-bold text-brand">
					<?php echo esc_html($is_en ? 'Experienced Professionals at Your Service' : 'Đội Ngũ Thực Chiến Tận Tâm & Kỷ Luật'); ?>
				</h2>
				<p class="mt-2 text-slate-600 text-sm">
					<?php echo esc_html($is_en ? 'More than 50 experienced dispatchers, customs specialists, and licensed heavy-duty drivers working 24/7.' : 'Hơn 50 cán bộ điều hành, chuyên viên chứng từ hải quan và đội ngũ tài xế đường dài được cấp chứng chỉ nghề nghiệp.'); ?>
				</p>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
				<div class="overflow-hidden rounded-2xl border border-slate-200 shadow-md group">
					<img src="<?php echo esc_url($uploads_base . 'doi-ngu-nhan-su-hp-trading.jpg'); ?>" 
						 alt="Đội ngũ cán bộ nhân viên và tài xế HP Trading - Transport" 
						 class="w-full h-auto aspect-[4/3] object-cover transition duration-500 group-hover:scale-105"
						 loading="lazy" decoding="async">
					<div class="p-5 bg-white">
						<h4 class="font-bold text-brand text-base"><?php echo esc_html($is_en ? 'Operations & Driver Force' : 'Tập Thể Cán Bộ Điều Hành & Đội Ngũ Bác Tài'); ?></h4>
						<p class="mt-1 text-xs text-slate-500 leading-relaxed">
							<?php echo esc_html($is_en ? 'United by professionalism and safety-first mindset across all transport hubs.' : 'Đoàn kết, kỷ luật, đặt an toàn hàng hóa và đúng giờ lên hàng đầu tại mọi bãi xe và cung đường.'); ?>
						</p>
					</div>
				</div>

				<div class="overflow-hidden rounded-2xl border border-slate-200 shadow-md group">
					<img src="<?php echo esc_url($uploads_base . 'dieu-hanh-xe-kho-bai.jpg'); ?>" 
						 alt="Điều hành giao nhận thực tế tại kho bãi và cảng biển HP Trading - Transport" 
						 class="w-full h-auto aspect-[4/3] object-cover transition duration-500 group-hover:scale-105"
						 loading="lazy" decoding="async">
					<div class="p-5 bg-white">
						<h4 class="font-bold text-brand text-base"><?php echo esc_html($is_en ? 'On-site Dispatch & Field Execution' : 'Tác Nghiệp Thực Địa & Giám Sát Cảng Bãi 24/7'); ?></h4>
						<p class="mt-1 text-xs text-slate-500 leading-relaxed">
							<?php echo esc_html($is_en ? 'Field managers inspecting container seals and liaising directly with port authorities.' : 'Cán bộ điều phối túc trực trực tiếp tại kho bãi Logitem, cổng cảng Cát Lái và Cái Mép đối soát seal chì.'); ?>
						</p>
					</div>
				</div>
			</div>
		</section>

		<!-- SECTION 6: HỒ SƠ PHÁP NHÂN & MINH BẠCH DOANH NGHIỆP -->
		<section class="rounded-3xl border border-slate-200 bg-white p-7 sm:p-10 shadow-sm">
			<div class="flex items-center gap-3 border-b border-slate-200 pb-5">
				<span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand text-accent font-bold text-lg">
					§
				</span>
				<div>
					<h3 class="font-bold text-brand text-lg sm:text-xl"><?php echo esc_html($is_en ? 'Legal Profile & Official Corporate Information' : 'Thông Tin Doanh Nghiệp & Hồ Sơ Pháp Nhân'); ?></h3>
					<p class="text-xs text-slate-500"><?php echo esc_html($is_en ? 'Registered in accordance with the Enterprise Law of Vietnam' : 'Đăng ký kinh doanh hợp pháp theo quy định của pháp luật Việt Nam'); ?></p>
				</div>
			</div>

			<div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-slate-700">
				<div class="space-y-3">
					<div>
						<span class="text-xs font-semibold uppercase tracking-wider text-slate-400"><?php echo esc_html(anp_t('legal_name')); ?></span>
						<p class="font-bold text-brand text-base mt-0.5"><?php echo esc_html(anp_opt('anp_company_name')); ?></p>
					</div>
					<div>
						<span class="text-xs font-semibold uppercase tracking-wider text-slate-400"><?php echo esc_html(anp_t('tax_code')); ?></span>
						<p class="font-bold text-brand mt-0.5"><?php echo esc_html(anp_opt('anp_tax_code')); ?></p>
					</div>
					<div>
						<span class="text-xs font-semibold uppercase tracking-wider text-slate-400"><?php echo esc_html(anp_t('legal_rep')); ?></span>
						<p class="font-medium text-slate-800 mt-0.5"><?php echo esc_html(anp_opt('anp_legal_rep') . ' – ' . anp_opt('anp_legal_rep_title')); ?></p>
					</div>
				</div>

				<div class="space-y-3">
					<div>
						<span class="text-xs font-semibold uppercase tracking-wider text-slate-400"><?php echo esc_html(anp_t('tax_address')); ?></span>
						<p class="text-slate-800 mt-0.5 leading-relaxed"><?php echo esc_html(anp_opt('anp_address_hq')); ?></p>
					</div>
					<div>
						<span class="text-xs font-semibold uppercase tracking-wider text-slate-400"><?php echo esc_html(anp_t('rep_office')); ?></span>
						<p class="text-slate-800 mt-0.5 leading-relaxed"><?php echo esc_html(anp_opt('anp_address_rep')); ?></p>
					</div>
					<div>
						<span class="text-xs font-semibold uppercase tracking-wider text-slate-400"><?php echo esc_html(anp_t('license_no')); ?></span>
						<p class="text-slate-800 mt-0.5"><?php echo esc_html(anp_opt('anp_license_no') . ' (' . anp_opt('anp_license_date') . ')'); ?></p>
					</div>
				</div>
			</div>
		</section>

		<!-- SECTION 7: CTA BÁO GIÁ & HOTLINE TRỰC TIẾP -->
		<section id="bao-gia" class="rounded-3xl bg-gradient-to-br from-[#061220] via-brand to-[#0B192C] p-8 sm:p-14 text-white shadow-2xl relative overflow-hidden">
			<div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-accent/20 blur-3xl pointer-events-none"></div>
			<div class="relative z-10 max-w-2xl">
				<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-accent/20 text-accent text-xs font-bold tracking-wider uppercase">
					<?php echo esc_html($is_en ? 'Direct Partnership' : 'Hợp Tác Dài Hạn Cùng HP Trading - Transport'); ?>
				</span>
				<h2 class="mt-4 font-display text-2xl sm:text-4xl font-extrabold text-white leading-tight">
					<?php echo esc_html($is_en ? 'Looking for a Reliable Logistics Partner?' : 'Sẵn Sàng Tối Ưu Hóa Chi Phí Logistics Của Bạn?'); ?>
				</h2>
				<p class="mt-3 text-slate-300 text-sm sm:text-base leading-relaxed">
					<?php echo esc_html($is_en ? 'Contact our team for a personalized route survey and all-in quote within 30 minutes.' : 'Liên hệ ngay đội ngũ chuyên viên HP Trading - Transport để được khảo sát tuyến đường và nhận bảng báo giá trọn gói trong 30 phút.'); ?>
				</p>

				<div class="mt-8 flex flex-col sm:flex-row items-center gap-4">
					<a href="<?php echo esc_url($contact_url); ?>" class="btn btn-accent w-full sm:w-auto px-8 py-3.5 font-bold text-sm justify-center shadow-lg">
						<?php echo esc_html($is_en ? 'Request an All-in Quote' : 'Yêu cầu báo giá trọn gói'); ?> &rarr;
					</a>
					<a href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>" class="btn btn-ghost-light w-full sm:w-auto px-7 py-3 font-semibold text-sm justify-center flex items-center gap-2">
						<?php echo anp_icon('phone', 'h-4 w-4 text-accent'); ?>
						Hotline: <?php echo esc_html(anp_opt('anp_phone_display')); ?>
					</a>
				</div>
			</div>
		</section>

	</div>
</main>

<?php get_footer(); ?>
