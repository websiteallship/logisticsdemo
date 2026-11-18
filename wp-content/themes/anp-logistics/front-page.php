<?php
/**
 * Trang chủ: hero ảnh thật, chỉ số, giới thiệu, dịch vụ (thẻ ảnh), quy trình, tin tức, hỏi đáp, liên hệ/báo giá.
 * Mọi nội dung lấy từ Customizer, CPT Dịch vụ hoặc anp_t(). Ảnh lấy từ Customizer, ảnh đại diện dịch vụ,
 * hoặc ảnh mặc định của theme (inc/photos.php).
 */
get_header();

$services    = anp_service_items(6);
$news        = new WP_Query(array('posts_per_page' => 3, 'no_found_rows' => true, 'ignore_sticky_posts' => true));
$process     = anp_pipe_lines('anp_process_lines');
$faq         = anp_faq_items();
$sent        = isset($_GET['anp_sent']) ? sanitize_text_field(wp_unslash($_GET['anp_sent'])) : '';
$hero_img    = anp_opt('anp_hero_image');
$about_img   = anp_opt('anp_about_image');
$process_bg  = anp_opt('anp_process_bg');
$stats       = array(
	array(anp_opt('anp_stat_countries'), anp_opt('anp_stat_countries_label')),
	array(anp_opt('anp_stat_trucks'), anp_opt('anp_stat_trucks_label')),
	array(anp_opt('anp_stat_trailers'), anp_opt('anp_stat_trailers_label')),
	array(anp_opt('anp_founded'), anp_t('year_founded')),
);
$services_options = anp_t_list('service_options');
?>

<!-- 1. HERO: Slider nền ambient chuyển cảnh đa phương thức (design-taste-frontend) -->
<section id="hero-section" class="relative isolate overflow-hidden bg-brand text-white pb-28 sm:pb-32">
	<!-- Hero Slider Background: 4 lĩnh vực logistics thực tế (biển, hàng không, kho bãi, đêm) -->
	<div id="hero-slider" class="absolute inset-0 -z-10 overflow-hidden" data-interval="5000">
		<div class="anp-hero-slide is-active" data-slide="0">
			<?php if ($hero_img) : ?>
				<img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr(anp_t('alt_hero')); ?>" class="h-full w-full object-cover" loading="eager" decoding="async" fetchpriority="high">
			<?php else : ?>
				<?php echo anp_photo_img('hero', array('class' => 'h-full w-full object-cover', 'sizes' => '100vw', 'eager' => true)); // phpcs:ignore ?>
			<?php endif; ?>
		</div>
		<div class="anp-hero-slide" data-slide="1">
			<?php echo anp_photo_img('air', array('class' => 'h-full w-full object-cover', 'sizes' => '100vw', 'eager' => false)); // phpcs:ignore ?>
		</div>
		<div class="anp-hero-slide" data-slide="2">
			<?php echo anp_photo_img('warehouse', array('class' => 'h-full w-full object-cover', 'sizes' => '100vw', 'eager' => false)); // phpcs:ignore ?>
		</div>
		<div class="anp-hero-slide" data-slide="3">
			<?php echo anp_photo_img('night', array('class' => 'h-full w-full object-cover', 'sizes' => '100vw', 'eager' => false)); // phpcs:ignore ?>
		</div>

		<!-- Lớp overlay phủ đa tầng bảo đảm tương phản sắc nét cho chữ & thẻ tracking -->
		<div class="anp-hero-overlay"></div>
	</div>

	<div class="mx-auto grid min-h-[540px] max-w-7xl items-center gap-12 px-5 pb-10 pt-16 sm:px-8 lg:min-h-[660px] lg:grid-cols-12 lg:pb-12 lg:pt-20">
		<div class="lg:col-span-7">
			<p class="reveal-up inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-3.5 py-1.5 text-sm font-medium text-white backdrop-blur">
				<span class="h-1.5 w-1.5 rounded-full bg-accent"></span>
				<?php echo esc_html(anp_opt('anp_hero_eyebrow')); ?>
			</p>
			<h1 class="reveal-up delay-100 mt-6 font-display text-4xl font-semibold leading-[1.12] tracking-tight sm:text-5xl lg:text-6xl"><?php echo esc_html(anp_opt('anp_hero_title')); ?></h1>
			<p class="reveal-up delay-200 mt-6 max-w-2xl text-lg leading-relaxed text-white/85"><?php echo esc_html(anp_opt('anp_hero_subtitle')); ?></p>
			<div class="reveal-up delay-300 mt-10 flex flex-wrap gap-3">
				<a href="#lien-he" class="btn btn-accent"><?php echo esc_html(anp_t('get_quote')); ?> <?php echo anp_icon('arrow', 'h-4 w-4'); ?></a>
				<?php if ($services) : ?>
					<a href="#dich-vu" class="btn btn-ghost-light"><?php echo esc_html(anp_t('view_services')); ?></a>
				<?php endif; ?>
			</div>
		</div>

		<div class="reveal-scale delay-200 hidden lg:col-span-5 lg:block" aria-hidden="true">
			<div class="ml-auto w-full max-w-md rounded-2xl anp-tracking-glass p-6 text-white transition-all duration-300 hover:border-accent/40">
				<!-- Header thẻ: Mã vận đơn & Live Pulse Beacon hài hoà -->
				<div class="flex items-center justify-between border-b border-white/15 pb-4">
					<span class="inline-flex items-center rounded-md border border-white/20 bg-white/10 px-2.5 py-1 font-mono text-xs font-semibold tracking-wider text-white/90">
						B/L #ANP-8924-SGN
					</span>
					<div class="inline-flex items-center gap-2 rounded-full border border-amber-400/40 bg-amber-500/15 px-3 py-1 text-xs font-semibold text-amber-300">
						<span class="relative flex h-2 w-2">
							<span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-amber-400 opacity-75"></span>
							<span class="relative inline-flex h-2 w-2 rounded-full bg-amber-400"></span>
						</span>
						<span><?php echo esc_html(anp_t('panel_badge')); ?></span>
					</div>
				</div>

				<!-- Thông tin tuyến vận chuyển -->
				<div class="mt-4 rounded-xl border border-white/10 bg-white/[0.05] p-3.5">
					<div class="flex items-center justify-between text-xs font-medium text-white/60">
						<span><?php echo esc_html(anp_t('panel_label')); ?></span>
						<span class="font-mono text-white/80"><?php echo esc_html(anp_t('panel_cargo')); ?></span>
					</div>
					<div class="mt-2 flex items-center justify-between gap-3 text-sm font-bold text-white">
						<span class="flex items-center gap-1.5"><?php echo anp_icon('pin', 'h-3.5 w-3.5 text-accent'); ?> <?php echo esc_html(anp_t('panel_route_origin')); ?></span>
						<span class="text-accent"><?php echo anp_icon('arrow', 'h-4 w-4'); ?></span>
						<span class="flex items-center gap-1.5"><?php echo anp_icon('pin', 'h-3.5 w-3.5 text-accent'); ?> <?php echo esc_html(anp_t('panel_route_dest')); ?></span>
					</div>
				</div>

				<!-- Stepper tiến độ 4 bước có animation xuất hiện từng chặng -->
				<div class="relative mt-5">
					<div class="anp-line-grow absolute bottom-5 left-4 top-4 w-0.5 bg-gradient-to-b from-accent via-accent to-white/20" aria-hidden="true"></div>

					<ol class="space-y-4">
						<li class="anp-step-1 relative flex items-start gap-3.5">
							<span class="relative z-10 grid h-8 w-8 shrink-0 place-items-center rounded-full bg-accent text-white shadow-md ring-4 ring-[#143E1C]">
								<?php echo anp_icon('check', 'h-4 w-4'); ?>
							</span>
							<div class="min-w-0 flex-1 pt-0.5">
								<div class="flex items-center justify-between gap-2">
									<p class="text-sm font-semibold text-white"><?php echo esc_html(anp_t('step1_t')); ?></p>
									<span class="font-mono text-[11px] font-medium text-amber-300"><?php echo esc_html(anp_t('panel_step1_time')); ?></span>
								</div>
								<p class="text-xs text-white/70"><?php echo esc_html(anp_t('step1_s')); ?></p>
							</div>
						</li>

						<li class="anp-step-2 relative flex items-start gap-3.5">
							<span class="relative z-10 grid h-8 w-8 shrink-0 place-items-center rounded-full bg-accent text-white shadow-md ring-4 ring-[#143E1C]">
								<?php echo anp_icon('check', 'h-4 w-4'); ?>
							</span>
							<div class="min-w-0 flex-1 pt-0.5">
								<div class="flex items-center justify-between gap-2">
									<p class="text-sm font-semibold text-white"><?php echo esc_html(anp_t('step2_t')); ?></p>
									<span class="font-mono text-[11px] font-medium text-amber-300"><?php echo esc_html(anp_t('panel_step2_time')); ?></span>
								</div>
								<p class="text-xs text-white/70"><?php echo esc_html(anp_t('step2_s')); ?></p>
							</div>
						</li>

						<li class="anp-step-3 relative -mx-2.5 flex items-start gap-3.5 rounded-xl border-l-2 border-accent bg-gradient-to-r from-accent/20 via-accent/10 to-transparent p-2.5">
							<span class="anp-pulse-active relative z-10 grid h-8 w-8 shrink-0 place-items-center rounded-full bg-accent text-white shadow-lg shadow-accent/40 ring-4 ring-[#143E1C]">
								<span class="animate-pulse"><?php echo anp_icon('truck', 'h-4 w-4'); ?></span>
							</span>
							<div class="min-w-0 flex-1 pt-0.5">
								<div class="flex items-center justify-between gap-2">
									<p class="text-sm font-bold text-accent"><?php echo esc_html(anp_t('step3_t')); ?></p>
									<span class="font-mono text-[11px] font-bold text-accent"><?php echo esc_html(anp_t('panel_step3_time')); ?></span>
								</div>
								<p class="text-xs text-white/90"><?php echo esc_html(anp_t('step3_s')); ?></p>
							</div>
						</li>

						<li class="anp-step-4 relative flex items-start gap-3.5">
							<span class="relative z-10 grid h-8 w-8 shrink-0 place-items-center rounded-full border border-white/25 bg-white/10 text-white/50 ring-4 ring-[#143E1C]">
								<?php echo anp_icon('ship', 'h-4 w-4'); ?>
							</span>
							<div class="min-w-0 flex-1 pt-0.5">
								<div class="flex items-center justify-between gap-2">
									<p class="text-sm font-medium text-white/70"><?php echo esc_html(anp_t('step4_t')); ?></p>
									<span class="font-mono text-[11px] text-white/40"><?php echo esc_html(anp_t('panel_step4_time')); ?></span>
								</div>
								<p class="text-xs text-white/50"><?php echo esc_html(anp_t('step4_s')); ?></p>
							</div>
						</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<!-- Timeline Progress Controls: 4 phân đoạn trực quan (anti-slop, zero CLS) -->
	<div class="relative z-20 mx-auto max-w-7xl px-5 pb-4 sm:px-8">
		<div class="border-t border-white/15 pt-5">
			<div id="hero-progress-nav" class="grid grid-cols-2 gap-4 sm:grid-cols-4 sm:gap-6" role="tablist" aria-label="Hero slider controls">
				<button type="button" class="hero-progress-btn group text-left focus:outline-none" data-slide-target="0" role="tab" aria-selected="true" aria-label="<?php echo esc_attr(anp_t('hero_slide_1_label')); ?>">
					<div class="flex items-center gap-2.5">
						<span class="hero-bullet-dot"></span>
						<div class="hero-progress-track flex-1">
							<div class="hero-progress-bar"></div>
						</div>
					</div>
					<div class="mt-2.5 flex items-center justify-between text-xs">
						<span class="hero-label text-white/70 transition group-hover:text-white"><?php echo esc_html(anp_t('hero_slide_1_label')); ?></span>
						<span class="hero-sub font-mono text-[11px] text-white/40 transition"><?php echo esc_html(anp_t('hero_slide_1_sub')); ?></span>
					</div>
				</button>

				<button type="button" class="hero-progress-btn group text-left focus:outline-none" data-slide-target="1" role="tab" aria-selected="false" aria-label="<?php echo esc_attr(anp_t('hero_slide_2_label')); ?>">
					<div class="flex items-center gap-2.5">
						<span class="hero-bullet-dot"></span>
						<div class="hero-progress-track flex-1">
							<div class="hero-progress-bar"></div>
						</div>
					</div>
					<div class="mt-2.5 flex items-center justify-between text-xs">
						<span class="hero-label text-white/70 transition group-hover:text-white"><?php echo esc_html(anp_t('hero_slide_2_label')); ?></span>
						<span class="hero-sub font-mono text-[11px] text-white/40 transition"><?php echo esc_html(anp_t('hero_slide_2_sub')); ?></span>
					</div>
				</button>

				<button type="button" class="hero-progress-btn group text-left focus:outline-none" data-slide-target="2" role="tab" aria-selected="false" aria-label="<?php echo esc_attr(anp_t('hero_slide_3_label')); ?>">
					<div class="flex items-center gap-2.5">
						<span class="hero-bullet-dot"></span>
						<div class="hero-progress-track flex-1">
							<div class="hero-progress-bar"></div>
						</div>
					</div>
					<div class="mt-2.5 flex items-center justify-between text-xs">
						<span class="hero-label text-white/70 transition group-hover:text-white"><?php echo esc_html(anp_t('hero_slide_3_label')); ?></span>
						<span class="hero-sub font-mono text-[11px] text-white/40 transition"><?php echo esc_html(anp_t('hero_slide_3_sub')); ?></span>
					</div>
				</button>

				<button type="button" class="hero-progress-btn group text-left focus:outline-none" data-slide-target="3" role="tab" aria-selected="false" aria-label="<?php echo esc_attr(anp_t('hero_slide_4_label')); ?>">
					<div class="flex items-center gap-2.5">
						<span class="hero-bullet-dot"></span>
						<div class="hero-progress-track flex-1">
							<div class="hero-progress-bar"></div>
						</div>
					</div>
					<div class="mt-2.5 flex items-center justify-between text-xs">
						<span class="hero-label text-white/70 transition group-hover:text-white"><?php echo esc_html(anp_t('hero_slide_4_label')); ?></span>
						<span class="hero-sub font-mono text-[11px] text-white/40 transition"><?php echo esc_html(anp_t('hero_slide_4_sub')); ?></span>
					</div>
				</button>
			</div>
		</div>
	</div>
</section>

<!-- 2. CHỈ SỐ: thẻ trắng đè lên mép dưới hero -->
<section class="reveal-up relative z-10 -mt-20 px-5 sm:px-8" aria-label="<?php echo esc_attr(anp_t('about_label')); ?>">
	<div class="mx-auto grid max-w-7xl grid-cols-2 gap-y-8 rounded-2xl border border-slate-200/90 bg-white px-6 py-8 shadow-xl shadow-slate-900/10 sm:px-10 lg:grid-cols-4">
		<?php foreach ($stats as $i => $stat) : ?>
			<div class="reveal-up delay-<?php echo min(($i + 1) * 100, 400); ?> text-center lg:px-6 lg:text-left <?php echo $i > 0 ? 'lg:border-l lg:border-slate-200' : ''; ?>">
				<p class="font-display text-4xl font-semibold tracking-tight text-brand sm:text-5xl" data-counter data-counter-value="<?php echo esc_attr($stat[0]); ?>"><?php echo esc_html($stat[0]); ?></p>
				<p class="mt-2 text-sm font-medium text-slate-600"><?php echo esc_html($stat[1]); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<!-- 3. GIỚI THIỆU -->
<section id="gioi-thieu" class="scroll-mt-28 py-20 sm:py-28">
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="grid items-center gap-14 lg:grid-cols-12 lg:gap-16">
			<div class="reveal-left lg:col-span-6">
				<p class="text-sm font-semibold uppercase tracking-[0.14em] text-accent-hover"><?php echo esc_html(anp_t('about_label')); ?></p>
				<h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-brand sm:text-4xl"><?php echo esc_html(anp_opt('anp_about_title')); ?></h2>
				<p class="mt-6 text-lg leading-relaxed text-slate-600"><?php echo esc_html(anp_opt('anp_about_text')); ?></p>
				<blockquote class="mt-8 border-l-4 border-accent pl-5 font-display text-xl font-medium text-brand"><?php echo esc_html(anp_opt('anp_core_value')); ?></blockquote>
			</div>

			<div class="reveal-right delay-100 relative lg:col-span-6">
				<div class="overflow-hidden rounded-2xl shadow-xl shadow-slate-900/10">
					<?php if ($about_img) : ?>
						<img src="<?php echo esc_url($about_img); ?>" alt="<?php echo esc_attr(anp_t('alt_warehouse')); ?>" class="aspect-[4/3] w-full object-cover" loading="lazy" decoding="async">
					<?php else : ?>
						<?php echo anp_photo_img('warehouse', array('class' => 'aspect-[4/3] w-full object-cover', 'sizes' => '(min-width:1024px) 50vw, 100vw')); // phpcs:ignore ?>
					<?php endif; ?>
				</div>
				<div class="absolute -bottom-8 -left-4 hidden w-1/2 overflow-hidden rounded-2xl border-4 border-white shadow-xl shadow-slate-900/15 sm:block">
					<?php echo anp_photo_img('road', array('class' => 'aspect-[4/3] w-full object-cover', 'sizes' => '(min-width:1024px) 25vw, 50vw')); // phpcs:ignore ?>
				</div>
			</div>
		</div>

		<div class="mt-16 grid gap-5 sm:grid-cols-2 lg:mt-24 lg:grid-cols-4">
			<div class="reveal-up delay-100 card-lift rounded-2xl border border-slate-200 bg-white p-7">
				<h3 class="text-sm font-bold uppercase tracking-[0.12em] text-accent-hover"><?php echo esc_html(anp_t('mission_label')); ?></h3>
				<p class="mt-3 text-slate-700"><?php echo esc_html(anp_opt('anp_mission')); ?></p>
			</div>
			<div class="reveal-up delay-200 card-lift rounded-2xl border border-slate-200 bg-white p-7">
				<h3 class="text-sm font-bold uppercase tracking-[0.12em] text-accent-hover"><?php echo esc_html(anp_t('vision_label')); ?></h3>
				<p class="mt-3 text-slate-700"><?php echo esc_html(anp_opt('anp_vision')); ?></p>
			</div>
			<div class="reveal-up delay-300 card-lift rounded-2xl bg-brand p-7 text-white">
				<?php echo anp_icon('customs', 'h-7 w-7 text-accent'); ?>
				<h3 class="mt-4 font-display font-semibold"><?php echo esc_html(anp_t('card_customs_t')); ?></h3>
				<p class="mt-2 text-sm leading-relaxed text-white/75"><?php echo esc_html(anp_t('card_customs_s')); ?></p>
			</div>
			<div class="reveal-up delay-400 card-lift rounded-2xl bg-brand-soft p-7 text-white">
				<?php echo anp_icon('plane', 'h-7 w-7 text-accent'); ?>
				<h3 class="mt-4 font-display font-semibold"><?php echo esc_html(anp_t('card_network_t')); ?></h3>
				<p class="mt-2 text-sm leading-relaxed text-white/75"><?php echo esc_html(anp_t('card_network_s')); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- 3b. ĐỐI TÁC: Marquee 1 dòng chạy liên tục từ phải sang trái (design-taste-frontend) -->
<section id="doi-tac" class="scroll-mt-28 border-y border-slate-200 bg-white py-14 sm:py-16">
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="reveal-up text-center">
			<p class="text-sm font-semibold uppercase tracking-[0.14em] text-accent-hover"><?php echo esc_html(anp_t('partners_label')); ?></p>
			<h2 class="mx-auto mt-2 max-w-2xl font-display text-2xl font-semibold tracking-tight text-brand sm:text-3xl"><?php echo esc_html(anp_t('partners_title')); ?></h2>
		</div>
	</div>

	<div class="anp-marquee mt-10" aria-label="<?php echo esc_attr(anp_t('partners_title')); ?>">
		<ul class="anp-marquee__track">
			<?php
			$partner_items = anp_partners();
			// Hiển thị 2 lượt để vòng lặp trôi ngang liền mạch vô tận
			for ($loop = 0; $loop < 2; $loop++) :
				foreach ($partner_items as $partner) :
			?>
				<li class="anp-marquee__item shrink-0"<?php echo $loop === 1 ? ' aria-hidden="true"' : ''; ?>>
					<div class="group flex h-20 w-40 sm:h-24 sm:w-48 items-center justify-center rounded-xl border border-slate-200 bg-white p-3.5 transition duration-300 hover:-translate-y-1 hover:border-accent hover:shadow-md">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/partners/' . $partner['file']); ?>" alt="<?php echo esc_attr($partner['name']); ?>" width="407" height="273" class="max-h-full max-w-full object-contain transition duration-300 group-hover:scale-105" loading="lazy" decoding="async">
					</div>
				</li>
			<?php
				endforeach;
			endfor;
			?>
		</ul>
	</div>
</section>

<!-- 4. DỊCH VỤ: thẻ có ảnh thật -->
<?php if ($services) : ?>
<section id="dich-vu" class="scroll-mt-28 bg-slate-50 py-20 sm:py-28">
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="reveal-up max-w-2xl">
			<p class="text-sm font-semibold uppercase tracking-[0.14em] text-accent-hover"><?php echo esc_html(anp_t('services_label')); ?></p>
			<h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-brand sm:text-4xl"><?php echo esc_html(anp_opt('anp_services_title')); ?></h2>
			<p class="mt-4 text-lg text-slate-600"><?php echo esc_html(anp_opt('anp_services_lead')); ?></p>
		</div>
		<div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
			<?php foreach ($services as $i => $s) : ?>
				<a href="<?php echo esc_url($s['url']); ?>" class="reveal-up delay-<?php echo min(($i % 3 + 1) * 100, 300); ?> card-lift group flex cursor-pointer flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
					<div class="relative">
						<div class="overflow-hidden">
							<?php if (!empty($s['thumb_id'])) : ?>
								<?php echo wp_get_attachment_image($s['thumb_id'], 'anp-card', false, array('class' => 'aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-[1.03]', 'loading' => 'lazy')); // phpcs:ignore ?>
							<?php else : ?>
								<?php echo anp_photo_img($s['photo'], array('class' => 'aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-[1.03]', 'sizes' => '(min-width:1024px) 33vw, (min-width:768px) 50vw, 100vw', 'alt' => $s['title'])); // phpcs:ignore ?>
							<?php endif; ?>
						</div>
						<span class="anp-service-badge absolute bottom-0 left-6 grid h-12 w-12 translate-y-1/2 place-items-center text-white ring-4 ring-white shadow-xl"><?php echo anp_icon($s['icon'], 'h-6 w-6 text-white'); ?></span>
					</div>
					<div class="flex flex-1 flex-col p-7 pt-10">
						<h3 class="font-display text-lg font-semibold text-brand"><?php echo esc_html($s['title']); ?></h3>
						<p class="mt-3 flex-1 text-[15px] leading-relaxed text-slate-600"><?php echo esc_html($s['text']); ?></p>
						<span class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-brand"><?php echo esc_html(anp_t('learn_more')); ?> <?php echo anp_icon('arrow', 'h-4 w-4 transition group-hover:translate-x-1'); ?></span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- 5. QUY TRÌNH: Connected Glass Stepper Cards (design-taste-frontend) -->
<?php if ($process) : ?>
<?php
$is_en      = anp_lang() === 'en';
$step_icons = array('customs', 'project', 'truck', 'check');
$step_slas  = array(
	$is_en ? '30-Min SLA Response' : 'Phản hồi trong 30 phút',
	$is_en ? 'All-in Transparent Quote' : 'Báo giá trọn gói 0 phí ẩn',
	$is_en ? '24/7 Live Monitoring' : 'Cập nhật tiến độ 24/7',
	$is_en ? 'Full POD & Tax Invoicing' : 'Bàn giao đủ POD & Hóa đơn',
);
?>
<section id="quy-trinh" class="relative isolate scroll-mt-28 overflow-hidden bg-[#061220] py-20 text-white sm:py-28">
	<!-- Ảnh nền cảng đêm & Lớp phủ gradient sâu chống chói (Deep Maritime Navy) -->
	<div class="absolute inset-0 -z-10">
		<?php if ($process_bg) : ?>
			<img src="<?php echo esc_url($process_bg); ?>" alt="" class="h-full w-full object-cover" loading="lazy" decoding="async">
		<?php else : ?>
			<?php echo anp_photo_img('night', array('class' => 'h-full w-full object-cover', 'sizes' => '100vw', 'alt' => '')); // phpcs:ignore ?>
		<?php endif; ?>
		<div class="absolute inset-0 bg-gradient-to-b from-[#061220]/95 via-[#0B192C]/85 to-[#061220]/95"></div>
	</div>

	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="reveal-up max-w-2xl">
			<p class="inline-flex items-center gap-2 rounded-full border border-amber-400/30 bg-amber-500/10 px-3.5 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-amber-400">
				<span class="h-1.5 w-1.5 rounded-full bg-amber-400 animate-pulse"></span>
				<?php echo esc_html(anp_t('process_label')); ?>
			</p>
			<h2 class="mt-4 font-display text-3xl font-bold tracking-tight text-white sm:text-4xl"><?php echo esc_html(anp_opt('anp_process_title')); ?></h2>
			<p class="mt-3 text-base text-slate-300/90"><?php echo esc_html($is_en ? 'Standardized 4-stage logistics pipeline from cargo intake, customs handling to last-mile fulfillment.' : 'Quy trình 4 bước chuẩn hóa từ khâu tiếp nhận, xử lý hải quan đến điều phối và đối soát minh bạch.'); ?></p>
		</div>

		<!-- Grid 4 Card kính mờ quy trình -->
		<div class="mt-14">
			<ol class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
				<?php foreach (array_values($process) as $i => $step) :
					$icon_name = isset($step_icons[$i]) ? $step_icons[$i] : 'check';
					$sla_text  = isset($step_slas[$i]) ? $step_slas[$i] : '';
				?>
					<li class="reveal-up delay-<?php echo min(($i + 1) * 100, 400); ?> group flex">
						<div class="anp-stepper-glass w-full">
							<!-- Header card: Icon tròn kính mờ & Badge số bước -->
							<div>
								<div class="flex items-center justify-between">
									<div class="relative z-10 grid h-12 w-12 place-items-center rounded-xl border border-white/20 bg-white/[0.08] text-white shadow-md backdrop-blur-md transition-all duration-300 group-hover:scale-105 group-hover:border-accent group-hover:bg-accent group-hover:text-white">
										<?php echo anp_icon($icon_name, 'h-5 w-5'); ?>
									</div>
									<span class="font-mono text-xs font-bold tracking-wider text-amber-300 rounded-md border border-amber-400/30 bg-amber-500/15 px-2.5 py-1">
										STAGE 0<?php echo esc_html($i + 1); ?>
									</span>
								</div>

								<!-- Tiêu đề bước -->
								<h3 class="mt-5 font-display text-lg font-bold tracking-tight text-white transition-colors group-hover:text-amber-300">
									<?php echo esc_html($step['q']); ?>
								</h3>

								<!-- Mô tả bước -->
								<p class="mt-2.5 text-sm leading-relaxed text-slate-300/85">
									<?php echo esc_html($step['a']); ?>
								</p>
							</div>

							<!-- Footer card: Cam kết SLA & Trạng thái minh bạch -->
							<?php if ($sla_text) : ?>
								<div class="mt-6 border-t border-white/10 pt-4">
									<span class="inline-flex items-center gap-2 text-xs font-medium text-amber-400">
										<span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
										<span><?php echo esc_html($sla_text); ?></span>
									</span>
								</div>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- 6. TIN TỨC -->
<?php if ($news->have_posts()) : ?>
<section id="tin-tuc" class="scroll-mt-28 py-20 sm:py-28">
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="reveal-up flex flex-wrap items-end justify-between gap-6">
			<div class="max-w-2xl">
				<p class="text-sm font-semibold uppercase tracking-[0.14em] text-accent-hover"><?php echo esc_html(anp_t('news_label')); ?></p>
				<h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-brand sm:text-4xl"><?php echo esc_html(anp_opt('anp_news_title')); ?></h2>
			</div>
			<a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog/')); ?>" class="btn btn-ghost-dark"><?php echo esc_html(anp_t('view_all')); ?></a>
		</div>
		<div class="mt-12 grid gap-6 md:grid-cols-3">
			<?php $i = 0; while ($news->have_posts()) : $news->the_post(); $i++; ?>
				<article class="reveal-up delay-<?php echo min($i * 100, 300); ?> card-lift group overflow-hidden rounded-2xl border border-slate-200 bg-white">
					<a href="<?php the_permalink(); ?>" class="block cursor-pointer overflow-hidden bg-slate-100">
						<?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('anp-card', array('class' => 'aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-[1.03]', 'loading' => 'lazy')); ?>
						<?php else : ?>
							<?php echo anp_photo_img('sea', array('class' => 'aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-[1.03]', 'sizes' => '(min-width:768px) 33vw, 100vw')); // phpcs:ignore ?>
						<?php endif; ?>
					</a>
					<div class="p-6">
						<p class="text-xs font-medium text-slate-600"><?php echo esc_html(anp_date()); ?></p>
						<h3 class="mt-2 font-display text-lg font-semibold leading-snug text-brand"><a href="<?php the_permalink(); ?>" class="hover:text-accent-hover"><?php the_title(); ?></a></h3>
						<p class="mt-3 text-sm leading-relaxed text-slate-600"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 22)); ?></p>
					</div>
				</article>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- 7. HỎI ĐÁP (FAQ) -->
<?php if ($faq) : ?>
<section id="hoi-dap" class="scroll-mt-28 bg-slate-50 py-20 sm:py-28">
	<div class="mx-auto grid max-w-7xl items-start gap-12 px-5 sm:px-8 lg:grid-cols-12">
		<div class="reveal-left lg:sticky lg:top-32 lg:col-span-4">
			<div>
				<p class="text-sm font-semibold uppercase tracking-[0.14em] text-accent-hover"><?php echo esc_html(anp_t('faq_label')); ?></p>
				<h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-brand sm:text-4xl"><?php echo esc_html(anp_opt('anp_faq_title')); ?></h2>
				<p class="mt-4 text-base leading-relaxed text-slate-600"><?php echo esc_html(anp_opt('anp_faq_lead')); ?></p>
				<p class="mt-3 text-sm text-slate-500"><?php echo esc_html(anp_t('faq_pad_hint')); ?></p>
			</div>

			<!-- Box tư vấn & hỗ trợ nghiệp vụ liền kề -->
			<div class="mt-6 rounded-2xl border border-slate-200/90 bg-white p-6 shadow-sm">
				<div class="flex items-center gap-3.5">
					<span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-accent/15 text-accent-hover">
						<?php echo anp_icon('phone', 'h-5 w-5'); ?>
					</span>
					<div>
						<p class="text-xs font-semibold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_t('hotline')); ?> 24/7</p>
						<a href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>" class="font-display text-lg font-bold text-brand transition hover:text-accent">
							<?php echo esc_html(anp_opt('anp_phone_display')); ?>
						</a>
					</div>
				</div>
				<p class="mt-3 text-xs leading-relaxed text-slate-600">
					Tư vấn miễn phí áp mã HS, biểu thuế xuất nhập khẩu và hỗ trợ giải phóng hàng nhanh tại cảng Cát Lái, VICT, ICD và sân bay.
				</p>
				<a href="#lien-he" class="btn btn-ghost-dark mt-4 w-full justify-center text-sm font-semibold">
					<?php echo esc_html(anp_t('get_quote')); ?> <?php echo anp_icon('arrow', 'h-4 w-4'); ?>
				</a>
			</div>
		</div>
		<div class="space-y-3.5 lg:col-span-8">
			<?php foreach ($faq as $i => $item) : ?>
				<details class="reveal-right delay-<?php echo min(($i + 1) * 60, 350); ?> group rounded-2xl border border-slate-200/90 bg-white px-6 py-5 transition-shadow hover:border-slate-300 open:shadow-sm"<?php echo $i === 0 ? ' open' : ''; ?>>
					<summary class="flex cursor-pointer list-none items-center justify-between gap-6 text-left font-display text-base sm:text-lg font-semibold text-brand transition hover:text-accent">
						<span><?php echo esc_html($item['q']); ?></span>
						<span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-slate-100 text-brand transition group-open:rotate-45" aria-hidden="true">+</span>
					</summary>
					<div class="mt-4 border-t border-slate-100 pt-4 text-[15px] leading-relaxed text-slate-600">
						<?php echo nl2br(esc_html($item['a'])); ?>
					</div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- 8. LIÊN HỆ & BÁO GIÁ -->
<section id="lien-he" class="scroll-mt-28 py-20 sm:py-28">
	<div class="mx-auto grid max-w-7xl gap-12 px-5 sm:px-8 lg:grid-cols-12">
		<div class="reveal-left lg:col-span-5">
			<p class="text-sm font-semibold uppercase tracking-[0.14em] text-accent-hover"><?php echo esc_html(anp_t('contact_label')); ?></p>
			<h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-brand sm:text-4xl"><?php echo esc_html(anp_opt('anp_contact_title')); ?></h2>
			<p class="mt-2 text-sm font-semibold text-slate-700"><?php echo esc_html(anp_opt('anp_company_name')); ?></p>
			<p class="mt-4 text-slate-600"><?php echo esc_html(anp_opt('anp_contact_lead')); ?></p>
			<ul class="mt-10 space-y-6 text-slate-700">
				<li class="flex items-start gap-3.5"><span class="mt-0.5 shrink-0 text-accent"><?php echo anp_icon('phone', 'h-5 w-5'); ?></span><div><p class="text-xs font-semibold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_t('hotline')); ?></p><a class="font-display text-lg font-bold text-brand transition hover:text-accent" href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>"><?php echo esc_html(anp_opt('anp_phone_display')); ?></a></div></li>
				<li class="flex items-start gap-3.5"><span class="mt-0.5 shrink-0 text-accent"><?php echo anp_icon('mail', 'h-5 w-5'); ?></span><div><p class="text-xs font-semibold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_t('email')); ?></p><a class="font-semibold text-brand transition hover:text-accent" href="mailto:<?php echo esc_attr(anp_opt('anp_email')); ?>"><?php echo esc_html(anp_opt('anp_email')); ?></a></div></li>
				<li class="flex items-start gap-3.5"><span class="mt-0.5 shrink-0 text-accent"><?php echo anp_icon('pin', 'h-5 w-5'); ?></span><div><p class="text-xs font-semibold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_t('head_office')); ?></p><p class="font-medium text-slate-800"><?php echo esc_html(anp_opt('anp_address_hq')); ?></p></div></li>
				<li class="flex items-start gap-3.5"><span class="mt-0.5 shrink-0 text-accent"><?php echo anp_icon('clock', 'h-5 w-5'); ?></span><div><p class="text-xs font-semibold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_t('working_hours')); ?></p><div class="font-medium text-slate-800"><?php foreach (anp_hours_lines() as $hours_line) : ?><p><?php echo esc_html($hours_line); ?></p><?php endforeach; ?></div></div></li>
			</ul>
		</div>

		<div class="reveal-right delay-150 rounded-3xl border border-slate-200 bg-white p-7 shadow-xl shadow-slate-200/60 sm:p-10 lg:col-span-7">
			<?php if ($sent === '1') : ?>
				<div class="mb-6 rounded-xl bg-emerald-50 px-5 py-4 text-emerald-800" role="status"><?php echo esc_html(anp_t('f_ok')); ?></div>
			<?php elseif ($sent === '0') : ?>
				<div class="mb-6 rounded-xl bg-rose-50 px-5 py-4 text-rose-800" role="alert"><?php echo esc_html(anp_t('f_err')); ?></div>
			<?php endif; ?>

			<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="grid gap-5 sm:grid-cols-2">
				<input type="hidden" name="action" value="anp_contact">
				<?php wp_nonce_field('anp_contact', 'anp_nonce'); ?>
				<div>
					<label for="f-name" class="mb-2 block text-sm font-semibold text-brand"><?php echo esc_html(anp_t('f_name')); ?> <span class="text-rose-600" aria-hidden="true">*</span><span class="sr-only"> (<?php echo esc_html(anp_t('f_required')); ?>)</span></label>
					<input id="f-name" name="name" type="text" required autocomplete="name" class="anp-input">
				</div>
				<div>
					<label for="f-company" class="mb-2 block text-sm font-semibold text-brand"><?php echo esc_html(anp_t('f_company')); ?></label>
					<input id="f-company" name="company" type="text" autocomplete="organization" class="anp-input">
				</div>
				<div>
					<label for="f-phone" class="mb-2 block text-sm font-semibold text-brand"><?php echo esc_html(anp_t('f_phone')); ?> <span class="text-rose-600" aria-hidden="true">*</span><span class="sr-only"> (<?php echo esc_html(anp_t('f_required')); ?>)</span></label>
					<input id="f-phone" name="phone" type="tel" required autocomplete="tel" class="anp-input">
				</div>
				<div>
					<label for="f-email" class="mb-2 block text-sm font-semibold text-brand"><?php echo esc_html(anp_t('f_email')); ?> <span class="text-rose-600" aria-hidden="true">*</span><span class="sr-only"> (<?php echo esc_html(anp_t('f_required')); ?>)</span></label>
					<input id="f-email" name="email" type="email" required autocomplete="email" class="anp-input">
				</div>
				<div class="sm:col-span-2">
					<label for="f-service" class="mb-2 block text-sm font-semibold text-brand"><?php echo esc_html(anp_t('f_service')); ?></label>
					<select id="f-service" name="service" class="anp-input">
						<?php foreach ($services_options as $opt) : ?>
							<option><?php echo esc_html($opt); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="sm:col-span-2">
					<label for="f-message" class="mb-2 block text-sm font-semibold text-brand"><?php echo esc_html(anp_t('f_message')); ?></label>
					<textarea id="f-message" name="message" rows="5" class="anp-input" placeholder="<?php echo esc_attr(anp_t('f_message_ph')); ?>"></textarea>
				</div>
				<!-- Honeypot: ẩn với người dùng, bot thường điền vào -->
				<div class="hidden" aria-hidden="true"><label><?php echo esc_html(anp_t('f_honeypot')); ?> <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
				<div class="flex flex-wrap items-center justify-between gap-4 pt-2 sm:col-span-2">
					<p class="text-xs text-slate-600"><?php echo esc_html(anp_t('f_privacy')); ?></p>
					<button type="submit" class="btn btn-accent"><?php echo esc_html(anp_t('send_request')); ?> <?php echo anp_icon('arrow', 'h-4 w-4'); ?></button>
				</div>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>
