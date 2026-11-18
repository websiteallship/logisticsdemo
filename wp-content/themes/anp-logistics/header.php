<?php
/**
 * Header: Top Utility Bar + Main Navigation (Chuẩn quốc tế Maersk / DHL).
 */
$contact_page = get_page_by_path('lien-he') ?: get_page_by_path('contact');
$contact_url  = $contact_page ? get_permalink($contact_page) : home_url('/lien-he/');
$faq_page     = get_page_by_path('hoi-dap') ?: get_page_by_path('faq');
$faq_url      = $faq_page ? get_permalink($faq_page) : home_url('/hoi-dap/');
?><!doctype html>
<html lang="<?php echo esc_attr(anp_lang()); ?>">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class('bg-white font-sans text-slate-800 antialiased'); ?>>
<?php wp_body_open(); ?>

<a class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-lg focus:bg-white focus:px-4 focus:py-2 focus:text-brand focus:shadow-lg" href="#main"><?php echo esc_html(anp_t('skip_nav')); ?></a>

<header id="site-header" class="fixed inset-x-0 top-0 z-50 bg-white transition-shadow duration-300">
	<!-- 1. Top Utility Bar (36px) -->
	<div class="anp-topbar border-b border-white/10 bg-brand text-xs text-slate-300">
		<div class="mx-auto flex h-9 max-w-7xl items-center justify-between px-5 sm:px-8">
			<div class="flex items-center gap-5 sm:gap-7">
				<a href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>" class="inline-flex items-center gap-2 transition hover:text-white">
					<?php echo anp_icon('phone', 'h-3.5 w-3.5 text-accent'); ?>
					<span class="font-medium text-white"><?php echo esc_html(anp_opt('anp_phone_display')); ?></span>
				</a>
				<a href="mailto:<?php echo esc_attr(anp_opt('anp_email')); ?>" class="hidden items-center gap-2 transition hover:text-white md:inline-flex">
					<?php echo anp_icon('mail', 'h-3.5 w-3.5 text-accent'); ?>
					<span><?php echo esc_html(anp_opt('anp_email')); ?></span>
				</a>
				<?php if (anp_hours_inline() !== '') : ?>
				<span class="hidden items-center gap-2 text-slate-300 lg:inline-flex" title="<?php echo esc_attr(implode("\n", anp_hours_lines())); ?>">
					<?php echo anp_icon('clock', 'h-3.5 w-3.5 text-accent/80'); ?>
					<span><?php echo esc_html(anp_hours_inline()); ?></span>
				</span>
				<?php endif; ?>
			</div>
			<div class="flex items-center gap-4">
				<?php anp_lang_switch_markup('dark'); ?>
			</div>
		</div>
	</div>

	<!-- 2. Main Navigation Bar (72px) -->
	<div class="border-b border-slate-200/90 bg-white/95 backdrop-blur-md">
		<div class="anp-mainbar mx-auto flex max-w-7xl items-center justify-between gap-6 px-5 sm:px-8">
			<a href="<?php echo esc_url(home_url('/')); ?>" class="shrink-0" aria-label="<?php echo esc_attr(anp_opt('anp_brand_name') . ' – ' . anp_t('home')); ?>">
				<?php anp_logo_markup(); ?>
			</a>

			<nav class="anp-nav hidden whitespace-nowrap text-[15px] font-semibold text-slate-700 lg:block" aria-label="<?php echo esc_attr(anp_t('nav_main')); ?>">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'flex items-center gap-6 xl:gap-8',
					'fallback_cb'    => 'anp_fallback_menu',
					'depth'          => 2,
				));
				?>
			</nav>

			<div class="flex items-center gap-3">
				<div class="hidden sm:block">
					<a href="<?php echo esc_url($contact_url); ?>" class="btn btn-accent shadow-sm"><?php echo esc_html(anp_t('get_quote')); ?> <?php echo anp_icon('arrow', 'h-4 w-4'); ?></a>
				</div>
				<button type="button" id="menu-toggle" class="grid h-11 w-11 place-items-center rounded-xl border border-slate-200 text-brand lg:hidden" aria-expanded="false" aria-controls="mobile-menu" data-label-open="<?php echo esc_attr(anp_t('open_menu')); ?>" data-label-close="<?php echo esc_attr(anp_t('close_menu')); ?>" aria-label="<?php echo esc_attr(anp_t('open_menu')); ?>">
					<span data-icon-open><?php echo anp_icon('menu', 'h-5 w-5'); ?></span>
					<span data-icon-close class="hidden"><?php echo anp_icon('close', 'h-5 w-5'); ?></span>
				</button>
			</div>
		</div>
	</div>

	<!-- Mobile Menu Drawer (Chuẩn App B2B Logistics) -->
	<div id="mobile-menu" class="hidden border-b border-slate-200/90 bg-white shadow-2xl lg:hidden">
		<div class="anp-mobile-drawer max-h-[calc(100vh-90px)] overflow-y-auto px-5 py-5 sm:px-8 space-y-4 overscroll-contain">
			<!-- Header tiện ích mobile: Trạng thái trực & Chuyển ngôn ngữ -->
			<div class="flex items-center justify-between pb-3 border-b border-slate-100">
				<div class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500">
					<span class="inline-block h-2 w-2 rounded-full bg-amber-500 animate-pulse" aria-hidden="true"></span>
					<span><?php echo esc_html(anp_lang() === 'en' ? 'Direct Support 24/7' : 'Hỗ trợ trực tuyến 24/7'); ?></span>
				</div>
				<div>
					<?php anp_lang_switch_markup('light'); ?>
				</div>
			</div>

			<!-- Danh sách Menu chính (Accordion) -->
			<nav class="anp-nav" aria-label="<?php echo esc_attr(anp_t('nav_main')); ?>">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'anp-mobile-nav-list flex flex-col gap-1 text-base font-semibold text-slate-800',
					'fallback_cb'    => 'anp_fallback_menu',
					'depth'          => 2,
				));
				?>
			</nav>

			<!-- Card liên hệ nhanh & CTA Báo giá -->
			<div class="pt-3 border-t border-slate-100 space-y-3">
				<div class="flex items-center justify-between p-3.5 rounded-2xl bg-gradient-to-r from-slate-50 to-accent/10 border border-slate-200/80 shadow-xs">
					<div class="flex items-center gap-3">
						<span class="grid h-10 w-10 place-items-center rounded-xl bg-accent text-white shadow-sm ring-2 ring-accent/20">
							<?php echo anp_icon('phone', 'h-5 w-5'); ?>
						</span>
						<div>
							<span class="block text-[11px] font-semibold uppercase tracking-wider text-slate-500"><?php echo esc_html(anp_lang() === 'en' ? 'Call hotline' : 'Hotline tư vấn'); ?></span>
							<a href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>" class="text-[15px] font-extrabold text-brand hover:text-accent transition">
								<?php echo esc_html(anp_opt('anp_phone_display')); ?>
							</a>
						</div>
					</div>
					<a href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>" class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg bg-white border border-slate-200 text-xs font-bold text-slate-700 hover:bg-slate-50 transition shadow-xs">
						<?php echo esc_html(anp_lang() === 'en' ? 'Call Now' : 'Gọi ngay'); ?>
					</a>
				</div>

				<a href="<?php echo esc_url($contact_url); ?>" class="btn btn-accent w-full justify-center shadow-md py-3 text-base font-bold">
					<span><?php echo esc_html(anp_t('get_quote')); ?></span>
					<?php echo anp_icon('arrow', 'h-4 w-4 ml-1.5'); ?>
				</a>
			</div>
		</div>
	</div>
</header>

<main id="main" class="pt-[108px]">
