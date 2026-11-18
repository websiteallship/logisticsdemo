<?php
/**
 * Trang 404.
 */
get_header();
?>
<section class="mx-auto flex max-w-3xl flex-col items-start px-5 py-24 sm:px-8 sm:py-32">
	<p class="text-sm font-bold uppercase tracking-[0.14em] text-accent-hover"><?php echo esc_html(anp_t('err404_label')); ?></p>
	<h1 class="mt-3 text-4xl font-extrabold tracking-tight text-brand sm:text-5xl"><?php echo esc_html(anp_t('err404_title')); ?></h1>
	<p class="mt-5 text-lg text-slate-600"><?php echo esc_html(anp_t('err404_text')); ?></p>
	<div class="mt-10 flex flex-wrap gap-3">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-accent"><?php echo esc_html(anp_t('back_home')); ?></a>
		<a href="<?php echo esc_url(home_url('/#dich-vu')); ?>" class="btn btn-ghost-dark"><?php echo esc_html(anp_t('view_services')); ?></a>
	</div>
</section>
<?php get_footer(); ?>
