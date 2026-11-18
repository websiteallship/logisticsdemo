<?php
/**
 * Trang chi tiết bài viết và dịch vụ (Chuẩn Enterprise B2B Logistics - design-taste-frontend).
 */
get_header();

$is_en = anp_lang() === 'en';
$contact_page = get_page_by_path('lien-he') ?: get_page_by_path('contact');
$contact_url  = $contact_page ? get_permalink($contact_page) : home_url('/lien-he/');
$blog_page_id = get_option('page_for_posts');
$blog_url     = $blog_page_id ? get_permalink($blog_page_id) : home_url('/tin-tuc/');
?>

<?php while (have_posts()) : the_post(); ?>
<?php
$current_id   = get_the_ID();
$post_type    = get_post_type();
$categories   = get_the_category();
$primary_cat  = !empty($categories) ? $categories[0] : null;

// Tính thời gian đọc ước tính
$raw_content  = strip_tags(get_the_content());
$word_count   = str_word_count($raw_content);
$read_time    = max(3, ceil($word_count / 220));

// Bài viết liên quan
$related_args = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 4,
	'post__not_in'   => array($current_id),
);
if ($primary_cat) {
	$related_args['cat'] = $primary_cat->term_id;
}
$related_query = new WP_Query($related_args);
if (!$related_query->have_posts() && $primary_cat) {
	unset($related_args['cat']);
	$related_query = new WP_Query($related_args);
}
?>

<!-- 1. Breadcrumb Navigation -->
<nav class="border-b border-slate-200 bg-slate-50" aria-label="<?php echo esc_attr(anp_t('breadcrumb')); ?>">
	<div class="mx-auto flex max-w-7xl flex-wrap items-center gap-2 px-5 py-3.5 text-sm text-slate-600 sm:px-8">
		<a class="hover:text-brand font-medium transition" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(anp_t('home')); ?></a>
		<span aria-hidden="true" class="text-slate-400">/</span>
		<?php if ($post_type === 'post') : ?>
			<a class="hover:text-brand font-medium transition" href="<?php echo esc_url($blog_url); ?>"><?php echo esc_html($is_en ? 'News' : 'Tin tức'); ?></a>
			<span aria-hidden="true" class="text-slate-400">/</span>
		<?php elseif ($post_type === 'anp_service') : ?>
			<a class="hover:text-brand font-medium transition" href="<?php echo esc_url(home_url('/#dich-vu')); ?>"><?php echo esc_html($is_en ? 'Services' : 'Dịch vụ'); ?></a>
			<span aria-hidden="true" class="text-slate-400">/</span>
		<?php endif; ?>
		<span class="font-semibold text-brand truncate max-w-[240px] sm:max-w-md lg:max-w-xl" aria-current="page">
			<?php echo esc_html(get_the_title()); ?>
		</span>
	</div>
</nav>

<!-- 2. Khung Nội Dung Toàn Trang (Full Width Container max-w-7xl) -->
<main class="bg-white py-10 sm:py-14">
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-start">
			
			<!-- CỘT NỘI DUNG CHÍNH (8 CỘT) -->
			<article class="lg:col-span-8 min-w-0">
				<!-- Header Bài Viết -->
				<header class="border-b border-slate-200 pb-8">
					<div class="flex flex-wrap items-center gap-3 text-xs sm:text-sm text-slate-500">
						<?php if ($primary_cat) : ?>
							<a href="<?php echo esc_url(get_category_link($primary_cat->term_id)); ?>" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-brand font-semibold hover:bg-slate-200 transition">
								<span class="h-1.5 w-1.5 rounded-full bg-accent"></span>
								<?php echo esc_html($primary_cat->name); ?>
							</a>
						<?php endif; ?>
						<span class="flex items-center gap-1.5">
							<svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
							<?php echo esc_html(anp_date()); ?>
						</span>
						<span>•</span>
						<span class="font-semibold text-accent flex items-center gap-1">
							<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
							<?php echo esc_html($read_time . ($is_en ? ' min read' : ' phút đọc')); ?>
						</span>
					</div>

					<h1 class="mt-4 font-display text-2xl sm:text-3xl lg:text-[38px] font-extrabold leading-[1.28] tracking-tight text-brand">
						<?php echo esc_html(get_the_title()); ?>
					</h1>

					<?php if (has_excerpt()) : ?>
						<p class="mt-4 text-base sm:text-lg font-medium leading-relaxed text-slate-600">
							<?php echo esc_html(get_the_excerpt()); ?>
						</p>
					<?php endif; ?>
				</header>

				<!-- Ảnh Đại Diện Bài Viết -->
				<?php if (has_post_thumbnail()) : ?>
					<div class="mt-8 overflow-hidden rounded-2xl shadow-sm border border-slate-100">
						<?php the_post_thumbnail('large', array('class' => 'w-full h-auto aspect-[16/9] object-cover')); ?>
					</div>
				<?php endif; ?>

				<!-- Thân Bài Viết (Typography Chuẩn Editorial) -->
				<div class="anp-prose mt-8">
					<?php the_content(); ?>
				</div>

				<!-- Box Tác Giả & Kiểm Duyệt Nội Dung -->
				<div class="mt-12 rounded-2xl border border-slate-200 bg-slate-50/70 p-6 sm:p-7 flex flex-col sm:flex-row items-start sm:items-center gap-5">
					<div class="h-16 w-16 shrink-0 rounded-2xl bg-brand text-white flex items-center justify-center font-bold text-xl shadow-md">
						ANP
					</div>
					<div>
						<h4 class="font-bold text-brand text-base sm:text-lg">Ban Biên Tập Chuyên Môn ANP Logistics</h4>
						<p class="mt-1 text-sm text-slate-600 leading-relaxed">
							Nội dung được tổng hợp và kiểm duyệt bởi đội ngũ chuyên viên giao nhận & khai báo hải quan hơn 10 năm kinh nghiệm thực chiến tại Cát Lái, Cái Mép và các KCN trọng điểm miền Nam.
						</p>
					</div>
				</div>

				<!-- Nút Điều Hướng Cuối Bài -->
				<div class="mt-8 flex flex-wrap items-center justify-between gap-4 border-t border-slate-200 pt-6">
					<a href="<?php echo esc_url($blog_url); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-brand transition">
						<svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
						<?php echo esc_html($is_en ? 'Back to News' : 'Về trang tin tức'); ?>
					</a>
					<a href="<?php echo esc_url($contact_url); ?>" class="btn btn-accent px-6 py-2.5 text-sm font-bold shadow-sm">
						<?php echo esc_html(anp_t('get_quote')); ?> &rarr;
					</a>
				</div>
			</article>

			<!-- CỘT SIDEBAR STICKY (4 CỘT) -->
			<aside class="lg:col-span-4 space-y-6 lg:sticky lg:top-24">
				
				<!-- 1. Card Kêu Gọi Báo Giá 30 Phút -->
				<div class="rounded-2xl bg-gradient-to-br from-brand to-brand-soft p-6 sm:p-7 text-white shadow-xl border border-white/10 relative overflow-hidden">
					<div class="absolute -right-12 -top-12 h-36 w-36 rounded-full bg-accent/20 blur-2xl pointer-events-none"></div>
					<div class="relative z-10">
						<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-accent/20 text-accent text-xs font-bold tracking-wider uppercase border border-accent/30">
							<span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse"></span>
							SLA Phản Hồi 30 Phút
						</span>
						<h3 class="mt-4 text-xl font-bold leading-snug text-white">
							Cần Tư Vấn & Báo Giá Tuyến Vận Chuyển?
						</h3>
						<p class="mt-2 text-sm text-slate-300 leading-relaxed">
							ANP Logistics khảo sát và gửi bảng giá chi tiết, cam kết trọn gói minh bạch 100% không chi phí ẩn.
						</p>

						<div class="mt-6 space-y-3">
							<a href="<?php echo esc_url($contact_url); ?>" class="btn btn-accent w-full py-3.5 text-center font-bold text-sm justify-center shadow-lg shadow-accent/30">
								Nhận báo giá trọn gói &rarr;
							</a>
							<a href="tel:0911221214" class="btn btn-ghost-light w-full py-3 text-center font-semibold text-sm justify-center flex items-center gap-2">
								<svg class="h-4 w-4 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
								Hotline: 0911 22 12 14
							</a>
						</div>
					</div>
				</div>

				<!-- 2. Thẻ Cam Kết Năng Lực ANP -->
				<div class="rounded-2xl border border-slate-200 bg-slate-50/70 p-6 shadow-sm">
					<h3 class="font-bold text-brand text-base uppercase tracking-wider text-slate-800">
						Cam Kết Năng Lực ANP
					</h3>
					<ul class="mt-4 space-y-3 text-sm text-slate-600">
						<li class="flex items-start gap-2.5">
							<span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 font-bold text-xs">✓</span>
							<span><strong>Đội xe 40+ đầu kéo</strong> & rơ-moóc chuyên dụng kiểm định định kỳ.</span>
						</li>
						<li class="flex items-start gap-2.5">
							<span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 font-bold text-xs">✓</span>
							<span><strong>Thông quan 24h</strong> trực tiếp tại Cát Lái, Cái Mép, Tân Sơn Nhất.</span>
						</li>
						<li class="flex items-start gap-2.5">
							<span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 font-bold text-xs">✓</span>
							<span><strong>Hệ thống WMS & GPS</strong> giám sát hành trình và nhiệt độ 24/7.</span>
						</li>
						<li class="flex items-start gap-2.5">
							<span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 font-bold text-xs">✓</span>
							<span><strong>Bảo hiểm hàng hóa 10 tỷ</strong> bồi thường 100% khi phát sinh rủi ro.</span>
						</li>
					</ul>
				</div>

				<!-- 3. Bài Viết Mới / Liên Quan -->
				<?php if ($related_query->have_posts()) : ?>
					<div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
						<h3 class="font-bold text-brand text-base">
							<?php echo esc_html($is_en ? 'Related Articles' : 'Bài viết cùng chủ đề'); ?>
						</h3>
						<div class="mt-4 divide-y divide-slate-100">
							<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
								<div class="py-3.5 first:pt-0 last:pb-0 flex items-start gap-3.5 group">
									<?php if (has_post_thumbnail()) : ?>
										<a href="<?php the_permalink(); ?>" class="shrink-0 overflow-hidden rounded-lg">
											<?php the_post_thumbnail('thumbnail', array('class' => 'h-16 w-16 object-cover transition-transform duration-300 group-hover:scale-105')); ?>
										</a>
									<?php else : ?>
										<div class="h-16 w-16 shrink-0 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400 font-bold text-xs">
											ANP
										</div>
									<?php endif; ?>
									<div class="min-w-0 flex-1">
										<a href="<?php the_permalink(); ?>" class="font-medium text-sm text-slate-800 line-clamp-2 leading-snug group-hover:text-accent transition">
											<?php the_title(); ?>
										</a>
										<p class="mt-1 text-xs text-slate-400">
											<?php echo esc_html(anp_date()); ?>
										</p>
									</div>
								</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
				<?php endif; ?>

			</aside>

		</div>
	</div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>
