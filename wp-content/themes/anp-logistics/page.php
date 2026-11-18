<?php
/**
 * Trang tĩnh chuẩn B2B Logistics (Pháp lý, Chính sách, Điều khoản).
 */
get_header();

$is_en = anp_lang() === 'en';
$current_id = get_the_ID();
$current_slug = get_post_field('post_name', $current_id);

$legal_pages = array(
	'chinh-sach-bao-mat' => array(
		'title' => $is_en ? 'Privacy Policy' : 'Chính sách bảo mật thông tin',
		'desc'  => $is_en ? 'Data protection & security' : 'Bảo vệ dữ liệu & Nghị định 13/2023',
		'url'   => home_url('/chinh-sach-bao-mat/'),
	),
	'dieu-khoan-su-dung' => array(
		'title' => $is_en ? 'Terms of Service' : 'Điều khoản sử dụng & Dịch vụ',
		'desc'  => $is_en ? 'Terms & service conditions' : 'Quy định giao dịch & nghĩa vụ',
		'url'   => home_url('/dieu-khoan-su-dung/'),
	),
	'chinh-sach-van-chuyen' => array(
		'title' => $is_en ? 'Shipping Policy' : 'Chính sách vận chuyển & Giao nhận',
		'desc'  => $is_en ? 'Delivery & cargo handling' : 'Quy trình giao nhận & hàng cấm',
		'url'   => home_url('/chinh-sach-van-chuyen/'),
	),
	'chinh-sach-boi-thuong' => array(
		'title' => $is_en ? 'Claims & Compensation' : 'Chính sách bồi thường & Khiếu nại',
		'desc'  => $is_en ? 'Claims process & insurance' : 'Hạn mức đền bù & bảo hiểm 10 tỷ',
		'url'   => home_url('/chinh-sach-boi-thuong/'),
	),
);
?>

<?php while (have_posts()) : the_post(); ?>

<!-- 1. Breadcrumb Navigation -->
<nav class="border-b border-slate-200 bg-slate-50" aria-label="<?php echo esc_attr(anp_t('breadcrumb')); ?>">
	<div class="mx-auto flex max-w-7xl flex-wrap items-center gap-2 px-5 py-3.5 text-sm text-slate-600 sm:px-8">
		<a class="hover:text-brand font-medium transition" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(anp_t('home')); ?></a>
		<span aria-hidden="true" class="text-slate-400">/</span>
		<span class="text-slate-500"><?php echo esc_html($is_en ? 'Legal & Compliance' : 'Pháp lý & Quy định'); ?></span>
		<span aria-hidden="true" class="text-slate-400">/</span>
		<span class="font-semibold text-brand truncate max-w-xs sm:max-w-md" aria-current="page"><?php the_title(); ?></span>
	</div>
</nav>

<!-- 2. Header Banner -->
<header class="relative isolate overflow-hidden bg-brand py-12 text-white sm:py-16">
	<div class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-brand via-brand/95 to-brand/85"></div>
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="reveal-up max-w-3xl">
			<p class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3.5 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-white">
				<span class="h-1.5 w-1.5 rounded-full bg-accent"></span>
				<?php echo esc_html($is_en ? 'Legal Compliance & Policies' : 'Văn bản Pháp lý & Chính sách Doanh nghiệp'); ?>
			</p>
			<h1 class="mt-4 font-display text-2xl font-bold tracking-tight sm:text-4xl lg:text-5xl">
				<?php the_title(); ?>
			</h1>
			<p class="mt-3 text-xs sm:text-sm text-slate-300">
				<?php echo esc_html($is_en ? 'Effective date & Last updated: November 2026 • Official ANP Logistics Document' : 'Hiệu lực áp dụng & Cập nhật lần cuối: Tháng 11/2026 • Văn bản có giá trị pháp lý'); ?>
			</p>
		</div>
	</div>
</header>

<!-- 3. Nội dung chính & Sidebar -->
<main class="bg-white py-12 sm:py-16">
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
			
			<!-- CỘT NỘI DUNG PHÁP LÝ (8 CỘT) -->
			<article class="lg:col-span-8 min-w-0">
				<div class="anp-prose">
					<?php the_content(); ?>
				</div>

				<!-- Khung xác nhận pháp lý doanh nghiệp -->
				<div class="mt-14 rounded-2xl border border-slate-200 bg-slate-50/80 p-6 sm:p-8">
					<div class="flex items-center gap-3">
						<span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-brand text-accent font-bold">
							§
						</span>
						<h4 class="font-bold text-brand text-base sm:text-lg">Xác Nhận & Cam Kết Thực Hiện</h4>
					</div>
					<div class="mt-4 text-xs sm:text-sm text-slate-600 space-y-2 leading-relaxed">
						<p><strong>Doanh nghiệp ban hành:</strong> <?php echo esc_html(anp_opt('anp_company_name')); ?></p>
						<p><strong>Mã số doanh nghiệp:</strong> <?php echo esc_html(anp_opt('anp_tax_code')); ?> do Sở Kế hoạch & Đầu tư cấp.</p>
						<p><strong>Địa chỉ trụ sở:</strong> <?php echo esc_html(anp_opt('anp_address_hq')); ?></p>
						<p>Mọi tranh chấp hoặc yêu cầu hỗ trợ pháp lý, quý khách hàng vui lòng liên hệ trực tiếp Bộ phận Pháp chế & Quản lý Rủi ro qua email <a href="mailto:<?php echo esc_attr(anp_opt('anp_email')); ?>" class="font-semibold text-brand underline"><?php echo esc_html(anp_opt('anp_email')); ?></a> hoặc hotline <a href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>" class="font-semibold text-brand underline"><?php echo esc_html(anp_opt('anp_phone_display')); ?></a>.</p>
					</div>
				</div>
			</article>

			<!-- CỘT SIDEBAR CHÍNH SÁCH (4 CỘT) -->
			<aside class="lg:col-span-4 space-y-6 lg:sticky lg:top-24">
				
				<!-- 1. Danh sách các trang chính sách pháp lý -->
				<div class="rounded-2xl border border-slate-200 bg-slate-50/70 p-6 shadow-sm">
					<h3 class="font-bold text-brand text-sm uppercase tracking-wider text-slate-800">
						Chính Sách & Quy Định
					</h3>
					<div class="mt-4 space-y-2">
						<?php foreach ($legal_pages as $slug => $item) : 
							$is_active = ($current_slug === $slug);
						?>
							<a href="<?php echo esc_url($item['url']); ?>" class="flex items-center justify-between p-3 rounded-xl transition <?php echo $is_active ? 'bg-brand text-white font-semibold shadow-sm' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200/80'; ?>">
								<div>
									<div class="text-sm leading-snug <?php echo $is_active ? 'text-white' : 'text-slate-800'; ?>">
										<?php echo esc_html($item['title']); ?>
									</div>
									<div class="text-xs <?php echo $is_active ? 'text-slate-300' : 'text-slate-400'; ?> mt-0.5">
										<?php echo esc_html($item['desc']); ?>
									</div>
								</div>
								<span class="text-xs <?php echo $is_active ? 'text-accent' : 'text-slate-400'; ?>">→</span>
							</a>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- 2. Hỗ trợ pháp lý & Tiếp nhận khiếu nại -->
				<div class="rounded-2xl bg-brand p-6 text-white shadow-xl border border-white/10 relative overflow-hidden">
					<div class="relative z-10">
						<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-accent/20 text-accent text-xs font-bold tracking-wider uppercase">
							Bộ Phận Pháp Chế
						</span>
						<h3 class="mt-4 text-lg font-bold leading-snug text-white">
							Cần Làm Rõ Điều Khoản Hoặc Khiếu Nại Dịch Vụ?
						</h3>
						<p class="mt-2 text-xs text-slate-300 leading-relaxed">
							Bộ phận Chăm sóc khách hàng & Pháp chế của ANP sẵn sàng tiếp nhận biên bản và xử lý trong 24h.
						</p>

						<div class="mt-5 space-y-3">
							<a href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>" class="btn btn-accent w-full py-3 text-center font-bold text-xs justify-center shadow-lg">
								Hotline: <?php echo esc_html(anp_opt('anp_phone_display')); ?>
							</a>
							<a href="mailto:<?php echo esc_attr(anp_opt('anp_email')); ?>" class="btn btn-ghost-light w-full py-2.5 text-center font-semibold text-xs justify-center">
								Gửi Email Khiếu Nại
							</a>
						</div>
					</div>
				</div>

			</aside>

		</div>
	</div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>
