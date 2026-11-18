<?php
/**
 * Trang tĩnh (Giới thiệu, Liên hệ, Chính sách...).
 */
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
<article class="mx-auto max-w-4xl px-5 py-16 sm:px-8 sm:py-20">
	<header>
		<h1 class="text-4xl font-extrabold leading-tight tracking-tight text-brand sm:text-5xl"><?php the_title(); ?></h1>
	</header>
	<div class="anp-prose mt-10"><?php the_content(); ?></div>
</article>
<?php endwhile; ?>
<?php get_footer(); ?>
