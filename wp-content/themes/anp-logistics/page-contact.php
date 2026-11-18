<?php
/**
 * Template Name: Trang liên hệ (Contact Page)
 * Description: Trang liên hệ chuyên biệt chuẩn B2B Logistics (design-taste-frontend).
 */
get_header();

$sent             = isset($_GET['anp_sent']) ? sanitize_text_field(wp_unslash($_GET['anp_sent'])) : '';
$services_options = anp_t_list('service_options');
$is_en            = anp_lang() === 'en';

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
	if (anp_opt('anp_license_issuer') !== '') {
		$license .= ' – ' . anp_t('license_issuer') . ': ' . anp_opt('anp_license_issuer');
	}
	$legal_rows[] = array(anp_t('license_no'), $license);
}
?>

<!-- 1. Breadcrumb -->
<nav class="border-b border-slate-200 bg-slate-50" aria-label="<?php echo esc_attr(anp_t('breadcrumb')); ?>">
	<ol class="mx-auto flex max-w-7xl flex-wrap items-center gap-2 px-5 py-3.5 text-sm text-slate-600 sm:px-8">
		<li><a class="hover:text-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(anp_t('home')); ?></a></li>
		<li aria-hidden="true" class="text-slate-400">/</li>
		<li class="font-semibold text-brand" aria-current="page"><?php echo esc_html($is_en ? 'Contact' : 'Liên hệ'); ?></li>
	</ol>
</nav>

<!-- 2. Header Banner -->
<header class="relative isolate overflow-hidden bg-brand py-16 text-white sm:py-20">
	<div class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-brand via-brand/95 to-brand/80"></div>
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="reveal-up max-w-3xl">
			<p class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3.5 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-white">
				<span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse"></span>
				<?php echo esc_html($is_en ? 'Direct Communication • 24/7 Support' : 'Kết nối trực tiếp • Hỗ trợ 24/7'); ?>
			</p>
			<h1 class="mt-4 font-display text-3xl font-bold tracking-tight sm:text-5xl">
				<?php echo esc_html(get_the_title() ?: ($is_en ? 'Contact & Cargo Quotation' : 'Liên hệ & Nhận báo giá vận tải')); ?>
			</h1>
			<p class="mt-4 text-base leading-relaxed text-slate-300 sm:text-lg">
				<?php echo esc_html($is_en ? 'Reach out to our logistics consultants for fast customs clearance, freight rates, and door-to-door delivery plans.' : 'Đội ngũ chuyên viên HP Trading - Transport sẵn sàng tiếp nhận hồ sơ, tư vấn lộ trình và gửi bảng báo giá tối ưu chi phí trong vòng 30 phút.'); ?>
			</p>
		</div>
	</div>
</header>

<!-- 3. Bố cục 2 Cột: Thông tin liên hệ & Form báo giá chuyên sâu -->
<section id="lien-he" class="scroll-mt-28 py-16 sm:py-24">
	<div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-12 lg:gap-14">
		
		<!-- Cột trái (5 cols): Thông tin trụ sở, chi nhánh, pháp lý -->
		<div class="reveal-left space-y-8 lg:col-span-5">
			<div>
				<p class="text-xs font-bold uppercase tracking-[0.16em] text-accent-hover"><?php echo esc_html($is_en ? 'Office & Contacts' : 'Thông tin liên hệ'); ?></p>
				<h2 class="mt-2 font-display text-2xl font-bold text-brand sm:text-3xl"><?php echo esc_html(anp_opt('anp_company_name')); ?></h2>
				<p class="mt-2 text-sm text-slate-600"><?php echo esc_html(anp_opt('anp_tagline')); ?></p>
			</div>

			<!-- Danh sách liên lạc chính -->
			<ul class="space-y-5 text-slate-700">
				<!-- Hotline -->
				<li class="flex items-start gap-4 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-4 transition hover:border-accent/40 hover:bg-white hover:shadow-sm">
					<span class="mt-1 shrink-0 text-accent"><?php echo anp_icon('phone', 'h-5 w-5'); ?></span>
					<div class="min-w-0 flex-1">
						<p class="text-xs font-semibold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_t('hotline')); ?></p>
						<a class="mt-0.5 block font-display text-lg font-bold text-brand transition hover:text-accent" href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>">
							<?php echo esc_html(anp_opt('anp_phone_display')); ?>
						</a>
						<span class="text-xs text-emerald-600 font-medium"><?php echo esc_html($is_en ? 'Available 24/7 for urgent cargo' : 'Hỗ trợ giải phóng hàng nhanh 24/7'); ?></span>
					</div>
				</li>

				<!-- Email -->
				<li class="flex items-start gap-4 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-4 transition hover:border-accent/40 hover:bg-white hover:shadow-sm">
					<span class="mt-1 shrink-0 text-accent"><?php echo anp_icon('mail', 'h-5 w-5'); ?></span>
					<div class="min-w-0 flex-1">
						<p class="text-xs font-semibold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_t('email')); ?></p>
						<a class="mt-0.5 block font-semibold text-brand transition hover:text-accent" href="mailto:<?php echo esc_attr(anp_opt('anp_email')); ?>">
							<?php echo esc_html(anp_opt('anp_email')); ?>
						</a>
						<span class="text-xs text-slate-500"><?php echo esc_html($is_en ? 'Response within 30 minutes' : 'Phản hồi trong giờ làm việc'); ?></span>
					</div>
				</li>

				<!-- Trụ sở chính -->
				<li class="flex items-start gap-4 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-4 transition hover:border-accent/40 hover:bg-white hover:shadow-sm">
					<span class="mt-1 shrink-0 text-accent"><?php echo anp_icon('pin', 'h-5 w-5'); ?></span>
					<div class="min-w-0 flex-1">
						<p class="text-xs font-semibold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_t('head_office')); ?></p>
						<p class="mt-0.5 text-sm font-medium text-slate-800 leading-relaxed"><?php echo esc_html(anp_opt('anp_address_hq')); ?></p>
						<?php if (anp_opt('anp_map_url')) : ?>
							<a href="<?php echo esc_url(anp_opt('anp_map_url')); ?>" target="_blank" rel="noopener" class="mt-2 inline-flex items-center gap-1.5 text-xs font-semibold text-accent hover:text-accent-hover">
								<span><?php echo esc_html(anp_t('view_map')); ?></span>
								<?php echo anp_icon('arrow', 'h-3 w-3'); ?>
							</a>
						<?php endif; ?>
					</div>
				</li>

				<!-- Văn phòng đại diện -->
				<?php if (anp_opt('anp_address_rep')) : ?>
				<li class="flex items-start gap-4 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-4 transition hover:border-accent/40 hover:bg-white hover:shadow-sm">
					<span class="mt-1 shrink-0 text-accent"><?php echo anp_icon('pin', 'h-5 w-5'); ?></span>
					<div class="min-w-0 flex-1">
						<p class="text-xs font-semibold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_t('rep_office')); ?></p>
						<p class="mt-0.5 text-sm font-medium text-slate-800 leading-relaxed"><?php echo esc_html(anp_opt('anp_address_rep')); ?></p>
					</div>
				</li>
				<?php endif; ?>

				<!-- Giờ làm việc -->
				<li class="flex items-start gap-4 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-4">
					<span class="mt-1 shrink-0 text-accent"><?php echo anp_icon('clock', 'h-5 w-5'); ?></span>
					<div class="min-w-0 flex-1">
						<p class="text-xs font-semibold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_t('working_hours')); ?></p>
						<div class="mt-0.5 text-sm font-medium text-slate-800 leading-relaxed">
							<?php foreach (anp_hours_lines() as $hl) : ?>
								<p><?php echo esc_html($hl); ?></p>
							<?php endforeach; ?>
						</div>
					</div>
				</li>
			</ul>

			<!-- Thông tin pháp lý thu gọn -->
			<?php if ($legal_rows) : ?>
				<div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-5">
					<h3 class="text-xs font-bold uppercase tracking-[0.14em] text-slate-600"><?php echo esc_html(anp_t('tax_info')); ?></h3>
					<dl class="mt-4 space-y-2.5 text-xs text-slate-600">
						<?php foreach ($legal_rows as $row) : ?>
							<div>
								<dt class="text-[11px] uppercase tracking-wider text-slate-500"><?php echo esc_html($row[0]); ?></dt>
								<dd class="mt-0.5 font-medium text-slate-800"><?php echo esc_html($row[1]); ?></dd>
							</div>
						<?php endforeach; ?>
					</dl>
				</div>
			<?php endif; ?>
		</div>

		<!-- Cột phải (7 cols): Thẻ Form báo giá B2B chuyên nghiệp -->
		<div class="reveal-right delay-150 lg:col-span-7">
			<div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-xl shadow-slate-200/60 sm:p-10">
				<div>
					<span class="inline-flex items-center gap-1.5 rounded-md border border-accent/25 bg-accent/10 px-2.5 py-1 text-xs font-bold text-accent">
						<?php echo esc_html($is_en ? 'FAST QUOTE REQUEST' : 'YÊU CẦU BÁO GIÁ NHANH'); ?>
					</span>
					<h2 class="mt-3 font-display text-2xl font-bold tracking-tight text-brand sm:text-3xl">
						<?php echo esc_html(anp_opt('anp_contact_title') ?: ($is_en ? 'Request Cargo Quotation' : 'Gửi yêu cầu báo giá lô hàng')); ?>
					</h2>
					<p class="mt-2 text-sm leading-relaxed text-slate-600">
						<?php echo esc_html(anp_opt('anp_contact_lead') ?: ($is_en ? 'Fill in your cargo details and our specialists will revert with optimal routing and pricing.' : 'Điền thông tin lô hàng của bạn. Đội ngũ chuyên viên sẽ liên hệ lại xác nhận và đề xuất phương án tối ưu.')); ?>
					</p>
				</div>

				<!-- Thông báo trạng thái gửi -->
				<?php if ($sent === '1') : ?>
					<div class="mt-6 rounded-xl bg-emerald-50 border border-emerald-200 p-4 text-sm text-emerald-800" role="status">
						<p class="font-bold"><?php echo esc_html($is_en ? 'Request sent successfully!' : 'Gửi yêu cầu thành công!'); ?></p>
						<p class="mt-1 text-xs"><?php echo esc_html(anp_t('f_ok')); ?></p>
					</div>
				<?php elseif ($sent === '0') : ?>
					<div class="mt-6 rounded-xl bg-rose-50 border border-rose-200 p-4 text-sm text-rose-800" role="alert">
						<p class="font-bold"><?php echo esc_html($is_en ? 'Transmission failed' : 'Gửi yêu cầu thất bại'); ?></p>
						<p class="mt-1 text-xs"><?php echo esc_html(anp_t('f_err')); ?></p>
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
						<textarea id="f-message" name="message" rows="5" class="anp-input" placeholder="<?php echo esc_attr(anp_t('f_message_ph')); ?>"></textarea>
					</div>

					<!-- Honeypot: ẩn với người dùng, bẫy bot -->
					<div class="hidden" aria-hidden="true">
						<label><?php echo esc_html(anp_t('f_honeypot')); ?> <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
					</div>

					<div class="flex flex-wrap items-center justify-between gap-4 pt-2 sm:col-span-2">
						<p class="text-xs text-slate-500"><?php echo esc_html(anp_t('f_privacy')); ?></p>
						<button type="submit" class="btn btn-accent">
							<span><?php echo esc_html(anp_t('send_request')); ?></span>
							<?php echo anp_icon('arrow', 'h-4 w-4'); ?>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!-- 4. Cam kết chất lượng dịch vụ B2B (3 Cột) -->
<section class="border-t border-slate-200 bg-slate-50 py-16">
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="grid gap-6 sm:grid-cols-3">
			<div class="rounded-2xl border border-slate-200/90 bg-white p-6 shadow-sm">
				<div class="grid h-10 w-10 place-items-center rounded-xl bg-accent/15 text-accent">
					<?php echo anp_icon('clock', 'h-5 w-5'); ?>
				</div>
				<h3 class="mt-4 font-display font-bold text-brand"><?php echo esc_html($is_en ? '30-Minute Response' : 'Phản hồi trong 30 phút'); ?></h3>
				<p class="mt-1.5 text-xs text-slate-600 leading-relaxed"><?php echo esc_html($is_en ? 'Fast quotes and customs consultancy directly from field specialists.' : 'Báo giá nhanh chóng và tư vấn chính xác biểu thuế, mã HS từ chuyên viên hiện trường.'); ?></p>
			</div>

			<div class="rounded-2xl border border-slate-200/90 bg-white p-6 shadow-sm">
				<div class="grid h-10 w-10 place-items-center rounded-xl bg-accent/15 text-accent">
					<?php echo anp_icon('check', 'h-5 w-5'); ?>
				</div>
				<h3 class="mt-4 font-display font-bold text-brand"><?php echo esc_html($is_en ? 'Zero Hidden Surcharges' : 'Báo giá trọn gói 0 phí ẩn'); ?></h3>
				<p class="mt-1.5 text-xs text-slate-600 leading-relaxed"><?php echo esc_html($is_en ? 'Every fee itemized transparently with legal contracts and full VAT.' : 'Mọi khoản phí minh bạch từ đầu, hợp đồng pháp lý rõ ràng và xuất hóa đơn VAT đầy đủ.'); ?></p>
			</div>

			<div class="rounded-2xl border border-slate-200/90 bg-white p-6 shadow-sm">
				<div class="grid h-10 w-10 place-items-center rounded-xl bg-accent/15 text-accent">
					<?php echo anp_icon('truck', 'h-5 w-5'); ?>
				</div>
				<h3 class="mt-4 font-display font-bold text-brand"><?php echo esc_html($is_en ? '24/7 Port & Fleet Support' : 'Hỗ trợ cảng & xe 24/7'); ?></h3>
				<p class="mt-1.5 text-xs text-slate-600 leading-relaxed"><?php echo esc_html($is_en ? 'Dedicated operational team on-site at major ports, airports and ICDs.' : 'Đội ngũ giao nhận túc trực tại Cát Lái, VICT, ICD và sân bay sẵn sàng xử lý phát sinh.'); ?></p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
