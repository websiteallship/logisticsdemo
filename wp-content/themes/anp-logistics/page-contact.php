<?php
/**
 * Template Name: Trang liên hệ (Contact Page)
 * Description: Trang liên hệ & nhận báo giá chuẩn B2B Logistics (design-taste-frontend).
 */
get_header();

$sent             = isset($_GET['anp_sent']) ? sanitize_text_field(wp_unslash($_GET['anp_sent'])) : '';
$services_options = anp_t_list('service_options');
$is_en            = anp_lang() === 'en';

$page_h1 = $is_en ? 'Contact & Cargo Quotation' : 'Liên Hệ & Yêu Cầu Báo Giá Trực Tiếp';

$legal_rows = array();
if (anp_opt('anp_company_name') !== '') {
	$legal_rows[] = array(anp_t('legal_name'), anp_opt('anp_company_name'));
}
if (anp_opt('anp_tax_code') !== '') {
	$legal_rows[] = array(anp_t('tax_code'), anp_opt('anp_tax_code'));
}
if (anp_opt('anp_tax_address') !== '') {
	$legal_rows[] = array(anp_t('tax_address'), anp_opt('anp_tax_address'));
}
if (anp_opt('anp_legal_rep') !== '') {
	$rep = anp_opt('anp_legal_rep');
	if (anp_opt('anp_legal_rep_title') !== '') {
		$rep .= ' – ' . anp_opt('anp_legal_rep_title');
	}
	$legal_rows[] = array(anp_t('legal_rep'), $rep);
}
if (anp_opt('anp_license_no') !== '') {
	$license = anp_opt('anp_license_no');
	if (anp_opt('anp_license_date') !== '') {
		$license .= ' – ' . anp_t('license_date') . ': ' . anp_opt('anp_license_date');
	}
	$legal_rows[] = array(anp_t('license_no'), $license);
}
?>

<!-- 1. Breadcrumb -->
<nav class="border-b border-slate-200 bg-slate-50" aria-label="<?php echo esc_attr(anp_t('breadcrumb')); ?>">
	<ol class="mx-auto flex max-w-7xl flex-wrap items-center gap-2 px-5 py-3.5 text-sm text-slate-600 sm:px-8">
		<li><a class="hover:text-brand font-medium transition" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(anp_t('home')); ?></a></li>
		<li aria-hidden="true" class="text-slate-400">/</li>
		<li class="font-semibold text-brand" aria-current="page"><?php echo esc_html($is_en ? 'Contact' : 'Liên hệ'); ?></li>
	</ol>
</nav>

<!-- 2. Header Banner (Deep Navy & Emerald Atmosphere) -->
<header class="relative isolate overflow-hidden bg-[#061220] py-14 sm:py-20 text-white">
	<div class="pointer-events-none absolute -left-32 -top-32 h-96 w-96 rounded-full bg-brand/35 blur-3xl"></div>
	<div class="pointer-events-none absolute -right-20 top-1/2 h-80 w-80 -translate-y-1/2 rounded-full bg-[#1F4F25]/30 blur-3xl"></div>
	<div class="pointer-events-none absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-white/[0.04] via-transparent to-transparent"></div>

	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="max-w-3xl">
			<div class="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-[#1F4F25]/50 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-emerald-300 backdrop-blur-md">
				<span class="relative flex h-2 w-2">
					<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
					<span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-400"></span>
				</span>
				<?php echo esc_html($is_en ? 'Direct Logistics Advisory • 24/7 Response' : 'Tư Vấn Trực Tiếp • Phản Hồi Trong 30 Phút'); ?>
			</div>

			<h1 class="mt-4 font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
				<?php echo esc_html($page_h1); ?>
			</h1>

			<p class="mt-4 text-base sm:text-lg leading-relaxed text-slate-300 max-w-2xl">
				<?php echo esc_html($is_en ? 'Connect directly with HP Trading - Transport field dispatchers and customs specialists. We survey your container routes and provide all-in transparent quotations with 0 hidden costs.' : 'Kết nối trực tiếp chuyên viên hiện trường và đội ngũ điều phối xe HP Trading - Transport. Khảo sát tuyến đường và cung cấp bảng báo giá trọn gói minh bạch trong 30 phút.'); ?>
			</p>

			<!-- 3 Quick Contact Pills -->
			<div class="mt-8 flex flex-wrap items-center gap-3">
				<a href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>" class="inline-flex items-center gap-2 rounded-xl border border-white/15 bg-white/5 px-4 py-2 text-xs font-semibold text-white backdrop-blur-sm transition hover:bg-white/10 hover:border-accent">
					<span class="text-accent"><?php echo anp_icon('phone', 'h-4 w-4'); ?></span>
					<span>Hotline 24/7: <strong><?php echo esc_html(anp_opt('anp_phone_display')); ?></strong></span>
				</a>
				<a href="mailto:<?php echo esc_attr(anp_opt('anp_email')); ?>" class="inline-flex items-center gap-2 rounded-xl border border-white/15 bg-white/5 px-4 py-2 text-xs font-semibold text-white backdrop-blur-sm transition hover:bg-white/10 hover:border-accent">
					<span class="text-emerald-300"><?php echo anp_icon('mail', 'h-4 w-4'); ?></span>
					<span><?php echo esc_html(anp_opt('anp_email')); ?></span>
				</a>
				<div class="inline-flex items-center gap-2 rounded-xl border border-white/15 bg-white/5 px-4 py-2 text-xs font-semibold text-slate-300 backdrop-blur-sm">
					<span class="text-accent">✓</span>
					<span><?php echo esc_html($is_en ? 'On-site at Cat Lai & Cai Mep' : 'Túc trực cảng Cát Lái & Cái Mép'); ?></span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- 3. Bố cục 2 Cột: Thông tin liên hệ & Form báo giá chuyên sâu -->
<section id="lien-he" class="scroll-mt-28 py-14 sm:py-20 bg-slate-50/50">
	<div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-8 lg:grid-cols-12 lg:gap-12 items-start">
		
		<!-- Cột trái (5 cols): Thông tin liên hệ, Trụ sở & Pháp lý -->
		<div class="space-y-6 lg:col-span-5">
			
			<!-- Thẻ Hotline Nổi Bật -->
			<div class="rounded-3xl border border-[#1F4F25]/20 bg-[#1F4F25] p-6 text-white shadow-lg">
				<div class="flex items-center gap-3">
					<span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-white/15 text-white ring-4 ring-white/10">
						<?php echo anp_icon('phone', 'h-6 w-6 text-white'); ?>
					</span>
					<div>
						<p class="text-xs font-bold uppercase tracking-wider text-emerald-200"><?php echo esc_html(anp_t('hotline')); ?> (24/7)</p>
						<a class="mt-0.5 block font-display text-2xl font-black text-white hover:text-accent transition" href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>">
							<?php echo esc_html(anp_opt('anp_phone_display')); ?>
						</a>
					</div>
				</div>
				<p class="mt-4 text-xs text-emerald-100 leading-relaxed border-t border-white/15 pt-3">
					<?php echo esc_html($is_en ? 'Direct line for emergency container dispatch, port demurrage clearance and customs support.' : 'Đường dây nóng điều hành đầu kéo, cứu cont trễ hạn closing time và xử lý kiểm hóa gấp.'); ?>
				</p>
			</div>

			<!-- Danh sách văn phòng & kho bãi -->
			<div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-7 shadow-sm space-y-5">
				<div>
					<span class="text-xs font-bold uppercase tracking-wider text-accent"><?php echo esc_html($is_en ? 'Headquarters & Locations' : 'Hệ Thống Trụ Sở & Bãi Xe'); ?></span>
					<h3 class="mt-1 font-display text-lg font-bold text-brand"><?php echo esc_html(anp_opt('anp_company_name')); ?></h3>
				</div>

				<ul class="space-y-4 text-sm text-slate-700 divide-y divide-slate-100">
					<!-- Trụ sở chính -->
					<li class="pt-3 first:pt-0">
						<div class="flex items-start gap-3">
							<span class="mt-1 shrink-0 text-brand"><?php echo anp_icon('pin', 'h-5 w-5'); ?></span>
							<div>
								<p class="text-xs font-bold uppercase tracking-wider text-slate-400"><?php echo esc_html(anp_t('head_office')); ?></p>
								<p class="mt-0.5 font-medium text-slate-800 leading-relaxed"><?php echo esc_html(anp_opt('anp_address_hq')); ?></p>
								<?php if (anp_opt('anp_map_url')) : ?>
									<a href="<?php echo esc_url(anp_opt('anp_map_url')); ?>" target="_blank" rel="noopener" class="mt-1.5 inline-flex items-center gap-1 text-xs font-semibold text-brand hover:text-accent transition">
										<span><?php echo esc_html(anp_t('view_map')); ?></span>
										<?php echo anp_icon('arrow', 'h-3 w-3'); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</li>

					<!-- Văn phòng đại diện -->
					<?php if (anp_opt('anp_address_rep')) : ?>
					<li class="pt-3">
						<div class="flex items-start gap-3">
							<span class="mt-1 shrink-0 text-brand"><?php echo anp_icon('pin', 'h-5 w-5'); ?></span>
							<div>
								<p class="text-xs font-bold uppercase tracking-wider text-slate-400"><?php echo esc_html(anp_t('rep_office')); ?></p>
								<p class="mt-0.5 font-medium text-slate-800 leading-relaxed"><?php echo esc_html(anp_opt('anp_address_rep')); ?></p>
							</div>
						</div>
					</li>
					<?php endif; ?>

					<!-- Email tiếp nhận hồ sơ -->
					<li class="pt-3">
						<div class="flex items-start gap-3">
							<span class="mt-1 shrink-0 text-brand"><?php echo anp_icon('mail', 'h-5 w-5'); ?></span>
							<div>
								<p class="text-xs font-bold uppercase tracking-wider text-slate-400"><?php echo esc_html(anp_t('email')); ?></p>
								<a class="mt-0.5 block font-semibold text-brand hover:text-accent transition" href="mailto:<?php echo esc_attr(anp_opt('anp_email')); ?>">
									<?php echo esc_html(anp_opt('anp_email')); ?>
								</a>
							</div>
						</div>
					</li>

					<!-- Giờ làm việc -->
					<li class="pt-3">
						<div class="flex items-start gap-3">
							<span class="mt-1 shrink-0 text-brand"><?php echo anp_icon('clock', 'h-5 w-5'); ?></span>
							<div>
								<p class="text-xs font-bold uppercase tracking-wider text-slate-400"><?php echo esc_html(anp_t('working_hours')); ?></p>
								<div class="mt-0.5 font-medium text-slate-800 leading-relaxed">
									<?php foreach (anp_hours_lines() as $hl) : ?>
										<p><?php echo esc_html($hl); ?></p>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>

			<!-- Thông tin pháp lý thu gọn -->
			<?php if ($legal_rows) : ?>
				<div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
					<div class="flex items-center gap-2 mb-3">
						<span class="grid h-6 w-6 place-items-center rounded bg-slate-100 text-slate-600 font-bold text-xs">§</span>
						<h3 class="text-xs font-bold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_t('tax_info')); ?></h3>
					</div>
					<dl class="space-y-2 text-xs text-slate-600">
						<?php foreach ($legal_rows as $row) : ?>
							<div>
								<dt class="text-[11px] uppercase tracking-wider text-slate-400"><?php echo esc_html($row[0]); ?></dt>
								<dd class="mt-0.5 font-semibold text-slate-800"><?php echo esc_html($row[1]); ?></dd>
							</div>
						<?php endforeach; ?>
					</dl>
				</div>
			<?php endif; ?>

		</div>

		<!-- Cột phải (7 cols): Thẻ Form báo giá B2B chuyên nghiệp -->
		<div class="lg:col-span-7">
			<div class="rounded-3xl border border-slate-200 bg-white p-7 sm:p-10 shadow-xl shadow-slate-200/50">
				<div>
					<span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-500/20 bg-emerald-50 px-3 py-1 text-xs font-bold text-brand">
						<span class="h-1.5 w-1.5 rounded-full bg-brand"></span>
						<?php echo esc_html($is_en ? 'FAST QUOTE REQUEST' : 'TIẾP NHẬN YÊU CẦU BÁO GIÁ'); ?>
					</span>
					<h2 class="mt-3 font-display text-2xl sm:text-3xl font-extrabold text-brand tracking-tight">
						<?php echo esc_html(anp_opt('anp_contact_title') ?: ($is_en ? 'Request Cargo Quotation' : 'Gửi Yêu Cầu Báo Giá Lô Hàng')); ?>
					</h2>
					<p class="mt-2 text-sm leading-relaxed text-slate-600">
						<?php echo esc_html(anp_opt('anp_contact_lead') ?: ($is_en ? 'Fill in your cargo details and our specialists will revert with optimal routing and pricing.' : 'Điền thông tin lô hàng của bạn. Đội ngũ chuyên viên sẽ liên hệ lại xác nhận và đề xuất phương án tối ưu trong 30 phút.')); ?>
					</p>
				</div>

				<!-- Thông báo trạng thái gửi -->
				<?php if ($sent === '1') : ?>
					<div class="mt-6 rounded-2xl bg-emerald-50 border border-emerald-300 p-5 text-sm text-emerald-900 shadow-sm" role="status">
						<div class="flex items-center gap-2">
							<span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-600 text-white font-bold text-xs">✓</span>
							<p class="font-bold text-base"><?php echo esc_html($is_en ? 'Request sent successfully!' : 'Gửi yêu cầu thành công!'); ?></p>
						</div>
						<p class="mt-2 text-xs sm:text-sm text-emerald-800 leading-relaxed"><?php echo esc_html(anp_t('f_ok')); ?></p>
					</div>
				<?php elseif ($sent === '0') : ?>
					<div class="mt-6 rounded-2xl bg-rose-50 border border-rose-300 p-5 text-sm text-rose-900 shadow-sm" role="alert">
						<p class="font-bold text-base"><?php echo esc_html($is_en ? 'Transmission failed' : 'Gửi yêu cầu thất bại'); ?></p>
						<p class="mt-1 text-xs sm:text-sm text-rose-800 leading-relaxed"><?php echo esc_html(anp_t('f_err')); ?></p>
					</div>
				<?php endif; ?>

				<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="mt-8 grid gap-5 sm:grid-cols-2">
					<input type="hidden" name="action" value="anp_contact">
					<?php wp_nonce_field('anp_contact', 'anp_nonce'); ?>

					<div>
						<label for="f-name" class="mb-2 block text-sm font-semibold text-brand">
							<?php echo esc_html(anp_t('f_name')); ?> <span class="text-rose-600" aria-hidden="true">*</span>
						</label>
						<input id="f-name" name="name" type="text" required autocomplete="name" class="anp-input" placeholder="<?php echo esc_attr($is_en ? 'Your full name' : 'Nguyễn Văn A'); ?>">
					</div>

					<div>
						<label for="f-company" class="mb-2 block text-sm font-semibold text-brand">
							<?php echo esc_html(anp_t('f_company')); ?>
						</label>
						<input id="f-company" name="company" type="text" autocomplete="organization" class="anp-input" placeholder="<?php echo esc_attr($is_en ? 'Company name' : 'Công ty TNHH / CP...'); ?>">
					</div>

					<div>
						<label for="f-phone" class="mb-2 block text-sm font-semibold text-brand">
							<?php echo esc_html(anp_t('f_phone')); ?> <span class="text-rose-600" aria-hidden="true">*</span>
						</label>
						<input id="f-phone" name="phone" type="tel" required autocomplete="tel" class="anp-input" placeholder="<?php echo esc_attr($is_en ? 'Phone number' : '0911 22 12 14'); ?>">
					</div>

					<div>
						<label for="f-email" class="mb-2 block text-sm font-semibold text-brand">
							<?php echo esc_html(anp_t('f_email')); ?> <span class="text-rose-600" aria-hidden="true">*</span>
						</label>
						<input id="f-email" name="email" type="email" required autocomplete="email" class="anp-input" placeholder="<?php echo esc_attr($is_en ? 'name@company.com' : 'email@doanhnghiep.com'); ?>">
					</div>

					<div class="sm:col-span-2">
						<label for="f-service" class="mb-2 block text-sm font-semibold text-brand">
							<?php echo esc_html(anp_t('f_service')); ?>
						</label>
						<select id="f-service" name="service" class="anp-input">
							<?php foreach ($services_options as $opt) : ?>
								<option><?php echo esc_html($opt); ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="sm:col-span-2">
						<label for="f-message" class="mb-2 block text-sm font-semibold text-brand">
							<?php echo esc_html(anp_t('f_message')); ?>
						</label>
						<textarea id="f-message" name="message" rows="4" class="anp-input" placeholder="<?php echo esc_attr($is_en ? 'Cargo type, container size, pickup & delivery locations, estimated date...' : 'Loại hàng, loại container (20ft/40ft), tuyến đường giao nhận (VD: Cát Lái -> KCN VSIP 1), ngày dự kiến...'); ?>"></textarea>
					</div>

					<!-- Honeypot -->
					<div class="hidden" aria-hidden="true">
						<label><?php echo esc_html(anp_t('f_honeypot')); ?> <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
					</div>

					<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pt-3 sm:col-span-2 border-t border-slate-100">
						<p class="text-xs text-slate-500 leading-relaxed"><?php echo esc_html(anp_t('f_privacy')); ?></p>
						<button type="submit" class="btn btn-accent px-8 py-3.5 font-bold text-sm shadow-lg w-full sm:w-auto justify-center flex items-center gap-2">
							<span><?php echo esc_html(anp_t('send_request')); ?></span>
							<?php echo anp_icon('arrow', 'h-4 w-4'); ?>
						</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</section>

<!-- 4. Cam kết chất lượng dịch vụ B2B (3 Cột) - Pattern & Brand Emerald Lift -->
<section class="relative isolate overflow-hidden border-t border-slate-200/80 bg-slate-100/70 py-16 sm:py-20">
	<!-- Subtle Architectural Logistics Dot Pattern & Ambient Glows -->
	<div class="pointer-events-none absolute inset-0 -z-10 opacity-60" style="background-image: radial-gradient(rgba(31, 79, 37, 0.14) 1.2px, transparent 1.2px); background-size: 24px 24px;"></div>
	<div class="pointer-events-none absolute -left-20 top-1/2 h-72 w-72 -translate-y-1/2 rounded-full bg-[#1F4F25]/10 blur-3xl"></div>
	<div class="pointer-events-none absolute -right-20 top-1/2 h-72 w-72 -translate-y-1/2 rounded-full bg-[#1F4F25]/10 blur-3xl"></div>

	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="grid gap-6 sm:grid-cols-3">
			
			<!-- Card 1 -->
			<div class="relative rounded-3xl border border-slate-200/90 bg-white p-7 sm:p-8 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-[#1F4F25]/40 hover:shadow-2xl hover:shadow-[#1F4F25]/12 group overflow-hidden flex flex-col justify-between">
				<div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-[#1F4F25] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
				<div>
					<div class="flex items-center justify-between">
						<div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#1F4F25] text-white ring-4 ring-emerald-100/90 shadow-md group-hover:scale-110 group-hover:bg-[#143E1C] transition-all duration-300">
							<?php echo anp_icon('clock', 'h-6 w-6 text-white'); ?>
						</div>
						<span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-1 text-[11px] font-bold text-slate-500 group-hover:bg-emerald-50 group-hover:text-[#1F4F25] transition">SLA 30 Phút</span>
					</div>
					<h3 class="mt-5 font-display font-bold text-brand text-lg group-hover:text-[#1F4F25] transition"><?php echo esc_html($is_en ? '30-Minute Response' : 'Phản hồi trong 30 phút'); ?></h3>
					<p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed"><?php echo esc_html($is_en ? 'Fast quotes and customs consultancy directly from field specialists.' : 'Báo giá nhanh chóng và tư vấn chính xác biểu thuế, mã HS từ chuyên viên hiện trường.'); ?></p>
				</div>
				<div class="mt-5 pt-4 border-t border-slate-100 flex items-center gap-2 text-xs font-semibold text-[#1F4F25]">
					<span class="h-1.5 w-1.5 rounded-full bg-[#1F4F25]"></span>
					<span><?php echo esc_html($is_en ? 'Direct specialist contact' : 'Tiếp nhận yêu cầu trực tiếp'); ?></span>
				</div>
			</div>

			<!-- Card 2 -->
			<div class="relative rounded-3xl border border-slate-200/90 bg-white p-7 sm:p-8 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-[#1F4F25]/40 hover:shadow-2xl hover:shadow-[#1F4F25]/12 group overflow-hidden flex flex-col justify-between">
				<div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-[#1F4F25] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
				<div>
					<div class="flex items-center justify-between">
						<div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#1F4F25] text-white ring-4 ring-emerald-100/90 shadow-md group-hover:scale-110 group-hover:bg-[#143E1C] transition-all duration-300">
							<?php echo anp_icon('check', 'h-6 w-6 text-white'); ?>
						</div>
						<span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-1 text-[11px] font-bold text-slate-500 group-hover:bg-emerald-50 group-hover:text-[#1F4F25] transition">100% Minh Bạch</span>
					</div>
					<h3 class="mt-5 font-display font-bold text-brand text-lg group-hover:text-[#1F4F25] transition"><?php echo esc_html($is_en ? 'Zero Hidden Surcharges' : 'Báo giá trọn gói 0 phí ẩn'); ?></h3>
					<p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed"><?php echo esc_html($is_en ? 'Every fee itemized transparently with legal contracts and full VAT.' : 'Mọi khoản phí minh bạch từ đầu, hợp đồng pháp lý rõ ràng và xuất hóa đơn VAT đầy đủ.'); ?></p>
				</div>
				<div class="mt-5 pt-4 border-t border-slate-100 flex items-center gap-2 text-xs font-semibold text-[#1F4F25]">
					<span class="h-1.5 w-1.5 rounded-full bg-[#1F4F25]"></span>
					<span><?php echo esc_html($is_en ? 'Itemized cost calculation' : 'Đối soát hóa đơn & chứng từ'); ?></span>
				</div>
			</div>

			<!-- Card 3 -->
			<div class="relative rounded-3xl border border-slate-200/90 bg-white p-7 sm:p-8 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-[#1F4F25]/40 hover:shadow-2xl hover:shadow-[#1F4F25]/12 group overflow-hidden flex flex-col justify-between">
				<div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-[#1F4F25] to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
				<div>
					<div class="flex items-center justify-between">
						<div class="grid h-14 w-14 place-items-center rounded-2xl bg-[#1F4F25] text-white ring-4 ring-emerald-100/90 shadow-md group-hover:scale-110 group-hover:bg-[#143E1C] transition-all duration-300">
							<?php echo anp_icon('truck', 'h-6 w-6 text-white'); ?>
						</div>
						<span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-1 text-[11px] font-bold text-slate-500 group-hover:bg-emerald-50 group-hover:text-[#1F4F25] transition">Túc Trực 24/7</span>
					</div>
					<h3 class="mt-5 font-display font-bold text-brand text-lg group-hover:text-[#1F4F25] transition"><?php echo esc_html($is_en ? '24/7 Port & Fleet Support' : 'Hỗ trợ cảng & xe 24/7'); ?></h3>
					<p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed"><?php echo esc_html($is_en ? 'Dedicated operational team on-site at major ports, airports and ICDs.' : 'Đội ngũ giao nhận túc trực tại Cát Lái, Cái Mép, ICD và sân bay sẵn sàng xử lý phát sinh.'); ?></p>
				</div>
				<div class="mt-5 pt-4 border-t border-slate-100 flex items-center gap-2 text-xs font-semibold text-[#1F4F25]">
					<span class="h-1.5 w-1.5 rounded-full bg-[#1F4F25]"></span>
					<span><?php echo esc_html($is_en ? 'GPS tracking & on-site staff' : 'Giám sát hành trình GPS & hiện trường'); ?></span>
				</div>
			</div>

		</div>
	</div>
</section>

<?php get_footer(); ?>
