<?php
/**
 * Trang chi tiết dịch vụ: đoạn mở đầu trả lời trực tiếp, nội dung đầy đủ, hỏi đáp, dịch vụ liên quan, kêu gọi báo giá.
 * Nội dung lấy từ bài dịch vụ (tiếng Việt) hoặc các trường tiếng Anh tương ứng theo ngôn ngữ đang xem.
 */
get_header();

while (have_posts()) : the_post();
	$id      = get_the_ID();
	$title   = anp_service_field($id, 'title');
	$lead    = anp_service_field($id, 'excerpt');
	$faq     = anp_parse_qa(anp_service_field($id, 'faq'));
	$related = array_values(array_filter(anp_service_items(10), function ($s) use ($id) {
		return $s['url'] !== get_permalink($id);
	}));
	$related = array_slice($related, 0, 5);
	$body    = anp_service_field($id, 'body');
	$icon    = get_post_meta($id, '_anp_icon', true) ?: 'customs';
?>

<!-- Đường dẫn -->
<nav class="border-b border-slate-200 bg-slate-50" aria-label="<?php echo esc_attr(anp_t('breadcrumb')); ?>">
	<ol class="mx-auto flex max-w-7xl flex-wrap items-center gap-2 px-5 py-4 text-sm text-slate-600 sm:px-8">
		<li><a class="hover:text-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(anp_t('home')); ?></a></li>
		<li aria-hidden="true">/</li>
		<li><a class="hover:text-brand" href="<?php echo esc_url(get_post_type_archive_link('anp_service')); ?>"><?php echo esc_html(anp_t('services_label')); ?></a></li>
		<li aria-hidden="true">/</li>
		<li class="font-medium text-brand" aria-current="page"><?php echo esc_html($title); ?></li>
	</ol>
</nav>

<!-- Tiêu đề và đoạn mở đầu -->
<header class="bg-white">
	<div class="mx-auto grid max-w-7xl items-center gap-12 px-5 py-16 sm:px-8 lg:grid-cols-12 lg:py-20">
		<div class="lg:col-span-7">
			<span class="grid h-14 w-14 place-items-center rounded-2xl bg-accent/15 text-brand"><?php echo anp_icon($icon, 'h-7 w-7'); ?></span>
			<h1 class="mt-6 font-display text-4xl font-semibold leading-tight tracking-tight text-brand sm:text-5xl"><?php echo esc_html($title); ?></h1>
			<p class="mt-6 text-lg leading-relaxed text-slate-700"><?php echo esc_html($lead); ?></p>
			<div class="mt-8 flex flex-wrap gap-3">
				<a href="<?php echo esc_url(home_url('/#lien-he')); ?>" class="btn btn-accent"><?php echo esc_html(anp_t('get_quote')); ?> <?php echo anp_icon('arrow', 'h-4 w-4'); ?></a>
				<a href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>" class="btn btn-ghost-dark"><?php echo anp_icon('phone', 'h-4 w-4'); ?> <?php echo esc_html(anp_opt('anp_phone_display')); ?></a>
			</div>
		</div>
		<div class="lg:col-span-5">
			<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail('anp-card', array('class' => 'aspect-[4/3] w-full rounded-2xl object-cover shadow-xl shadow-slate-900/10', 'loading' => 'eager', 'fetchpriority' => 'high')); ?>
			<?php else : ?>
				<?php echo anp_photo_img(anp_photo_key_for_icon($icon), array('class' => 'aspect-[4/3] w-full rounded-2xl object-cover shadow-xl shadow-slate-900/10', 'sizes' => '(min-width:1024px) 40vw, 100vw', 'eager' => true, 'alt' => $title)); // phpcs:ignore ?>
			<?php endif; ?>
		</div>
	</div>
</header>

<!-- Nội dung đầy đủ -->
<article class="anp-prose mx-auto max-w-3xl px-5 pb-16 sm:px-8">
	<?php echo apply_filters('the_content', $body); // phpcs:ignore ?>
</article>

<!-- Hỏi đáp -->
<?php if ($faq) : ?>
<section class="bg-slate-50 py-16 sm:py-20" aria-labelledby="service-faq">
	<div class="mx-auto max-w-3xl px-5 sm:px-8">
		<h2 id="service-faq" class="font-display text-3xl font-semibold tracking-tight text-brand"><?php echo esc_html(anp_t('service_faq_label')); ?></h2>
		<div class="mt-8 space-y-3">
			<?php foreach ($faq as $item) : ?>
				<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5 open:shadow-sm">
					<summary class="flex cursor-pointer list-none items-center justify-between gap-6 font-display font-medium text-brand">
						<span><?php echo esc_html($item['q']); ?></span>
						<span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-slate-100 text-brand transition group-open:rotate-45" aria-hidden="true">+</span>
					</summary>
					<p class="mt-4 leading-relaxed text-slate-700"><?php echo esc_html($item['a']); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- Dịch vụ liên quan -->
<?php if ($related) : ?>
<section class="py-16 sm:py-20" aria-labelledby="related-services">
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<h2 id="related-services" class="font-display text-2xl font-semibold tracking-tight text-brand"><?php echo esc_html(anp_t('related_services')); ?></h2>
		<ul class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
			<?php foreach ($related as $s) : ?>
				<li>
					<a href="<?php echo esc_url($s['url']); ?>" class="card-lift flex h-full items-center gap-3 rounded-xl border border-slate-200 bg-white p-4 font-semibold text-brand">
						<span class="grid h-10 w-10 shrink-0 place-items-center rounded-lg bg-accent/15"><?php echo anp_icon($s['icon'], 'h-5 w-5'); ?></span>
						<span class="text-sm leading-snug"><?php echo esc_html($s['title']); ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<?php endif; ?>

<!-- Kêu gọi báo giá -->
<section class="bg-brand py-16 text-white sm:py-20">
	<div class="mx-auto flex max-w-7xl flex-col items-start justify-between gap-8 px-5 sm:px-8 lg:flex-row lg:items-center">
		<div class="max-w-2xl">
			<h2 class="font-display text-3xl font-semibold tracking-tight"><?php echo esc_html(anp_t('service_cta_title')); ?></h2>
			<p class="mt-3 text-lg text-white/80"><?php echo esc_html(anp_t('service_cta_text')); ?></p>
		</div>
		<a href="<?php echo esc_url(home_url('/#lien-he')); ?>" class="btn btn-accent shrink-0"><?php echo esc_html(anp_t('get_quote')); ?> <?php echo anp_icon('arrow', 'h-4 w-4'); ?></a>
	</div>
</section>

<?php endwhile; ?>
<?php get_footer(); ?>
