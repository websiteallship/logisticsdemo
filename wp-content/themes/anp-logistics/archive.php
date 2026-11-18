<?php
/**
 * Trang lưu trữ: danh mục, thẻ, tác giả, và danh sách dịch vụ (/dich-vu/).
 */
get_header();
?>
<section class="mx-auto max-w-7xl px-5 py-16 sm:px-8 sm:py-20">
	<header class="max-w-2xl">
		<h1 class="text-4xl font-extrabold tracking-tight text-brand"><?php the_archive_title(); ?></h1>
		<?php the_archive_description('<div class="mt-4 text-lg text-slate-600">', '</div>'); ?>
	</header>
	<div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $is_service = get_post_type() === 'anp_service'; ?>
			<article class="card-lift group overflow-hidden rounded-2xl border border-slate-200 bg-white p-7">
				<?php if ($is_service) : ?>
					<span class="grid h-12 w-12 place-items-center rounded-xl bg-accent/15 text-brand"><?php echo anp_icon(get_post_meta(get_the_ID(), '_anp_icon', true) ?: 'customs', 'h-6 w-6'); ?></span>
				<?php endif; ?>
				<h2 class="mt-5 text-lg font-bold text-brand"><a href="<?php the_permalink(); ?>" class="hover:text-accent-hover"><?php echo esc_html($is_service ? anp_service_title(get_the_ID()) : get_the_title()); ?></a></h2>
				<p class="mt-3 text-sm leading-relaxed text-slate-600"><?php echo esc_html($is_service ? anp_service_excerpt(get_the_ID()) : wp_trim_words(get_the_excerpt(), 26)); ?></p>
			</article>
		<?php endwhile; else : ?>
			<p class="text-slate-600"><?php echo esc_html(anp_t('no_content')); ?></p>
		<?php endif; ?>
	</div>
	<div class="mt-14"><?php the_posts_pagination(); ?></div>
</section>
<?php get_footer(); ?>
