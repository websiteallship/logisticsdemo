<?php
/**
 * Template dự phòng: danh sách bài viết (trang blog) và các trang không có template riêng.
 */
get_header();
?>
<section class="mx-auto max-w-7xl px-5 py-16 sm:px-8 sm:py-20">
	<header class="max-w-2xl">
		<h1 class="text-4xl font-extrabold tracking-tight text-brand"><?php echo esc_html(is_home() && !is_front_page() ? get_the_title(get_option('page_for_posts')) : anp_t('news_title')); ?></h1>
	</header>
	<div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="card-lift group overflow-hidden rounded-2xl border border-slate-200 bg-white">
				<a href="<?php the_permalink(); ?>" class="block overflow-hidden bg-slate-100">
					<?php if (has_post_thumbnail()) : the_post_thumbnail('anp-card', array('class' => 'aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-[1.03]', 'loading' => 'lazy')); else : ?>
						<div class="grid aspect-[16/10] place-items-center bg-brand text-accent"><?php echo anp_icon('ship', 'h-12 w-12'); ?></div>
					<?php endif; ?>
				</a>
				<div class="p-6">
					<p class="text-xs font-medium text-slate-500"><?php echo esc_html(anp_date()); ?></p>
					<h2 class="mt-2 text-lg font-bold leading-snug text-brand"><a href="<?php the_permalink(); ?>" class="hover:text-accent-hover"><?php the_title(); ?></a></h2>
					<p class="mt-3 text-sm leading-relaxed text-slate-600"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 22)); ?></p>
				</div>
			</article>
		<?php endwhile; else : ?>
			<p class="text-slate-600"><?php echo esc_html(anp_t('no_content')); ?></p>
		<?php endif; ?>
	</div>
	<div class="mt-14"><?php the_posts_pagination(); ?></div>
</section>
<?php get_footer(); ?>
