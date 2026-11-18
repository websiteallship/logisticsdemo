<?php
/**
 * Trang chi tiết bài viết và dịch vụ.
 */
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
<article class="mx-auto max-w-3xl px-5 py-16 sm:px-8 sm:py-20">
	<header>
		<p class="text-sm font-medium text-slate-500"><?php echo esc_html(anp_date()); ?></p>
		<h1 class="mt-3 text-4xl font-extrabold leading-tight tracking-tight text-brand sm:text-5xl"><?php echo esc_html(get_post_type() === 'anp_service' ? anp_service_title(get_the_ID()) : get_the_title()); ?></h1>
	</header>
	<?php if (has_post_thumbnail()) : ?>
		<div class="mt-10 overflow-hidden rounded-2xl"><?php the_post_thumbnail('large', array('class' => 'w-full object-cover')); ?></div>
	<?php endif; ?>
	<div class="anp-prose mt-10"><?php the_content(); ?></div>
	<div class="mt-14 border-t border-slate-200 pt-8">
		<a href="<?php echo esc_url(home_url('/#lien-he')); ?>" class="btn btn-accent"><?php echo esc_html(anp_t('get_quote')); ?> <?php echo anp_icon('arrow', 'h-4 w-4'); ?></a>
	</div>
</article>
<?php endwhile; ?>
<?php get_footer(); ?>
