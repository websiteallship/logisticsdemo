<?php
/**
 * Template Name: Trang tin tức (Blog Archive)
 * Description: Giao diện lưu trữ bài viết chuẩn B2B Logistics (design-taste-frontend).
 */
get_header();

$paged = max(1, get_query_var('paged'), get_query_var('page'));
$blog_query = new WP_Query(array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 9,
	'paged'          => $paged,
));

$is_en = anp_lang() === 'en';
$contact_page = get_page_by_path('lien-he') ?: get_page_by_path('contact');
$contact_url  = $contact_page ? get_permalink($contact_page) : home_url('/lien-he/');
?>

<!-- 1. Breadcrumb -->
<nav class="border-b border-slate-200 bg-slate-50" aria-label="<?php echo esc_attr(anp_t('breadcrumb')); ?>">
	<ol class="mx-auto flex max-w-7xl flex-wrap items-center gap-2 px-5 py-3.5 text-sm text-slate-600 sm:px-8">
		<li><a class="hover:text-brand font-medium" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(anp_t('home')); ?></a></li>
		<li aria-hidden="true" class="text-slate-400">/</li>
		<li class="font-semibold text-brand" aria-current="page"><?php echo esc_html($is_en ? 'News & Insights' : 'Tin tức & Hoạt động'); ?></li>
	</ol>
</nav>

<!-- 2. Header Banner (Deep Navy & Emerald Atmosphere) -->
<header class="relative isolate overflow-hidden bg-[#061220] py-14 sm:py-20 text-white">
	<div class="pointer-events-none absolute -left-32 -top-32 h-96 w-96 rounded-full bg-brand/35 blur-3xl"></div>
	<div class="pointer-events-none absolute -right-20 top-1/2 h-80 w-80 -translate-y-1/2 rounded-full bg-[#1F4F25]/30 blur-3xl"></div>
	<div class="pointer-events-none absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-white/[0.04] via-transparent to-transparent"></div>

	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="max-w-3xl">
			<div class="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-[#1F4F25]/50 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-emerald-300 backdrop-blur-md">
				<span class="relative flex h-2 w-2">
					<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
					<span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-400"></span>
				</span>
				<?php echo esc_html($is_en ? 'Logistics & Supply Chain Insights' : 'Bản Tin Nghiệp Vụ & Xuất Nhập Khẩu'); ?>
			</div>
			<h1 class="mt-4 font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
				<?php echo esc_html($is_en ? 'News, Tariff Guides & Industry Insights' : 'Tin tức, Biểu thuế XNK & Kiến thức Logistics'); ?>
			</h1>
			<p class="mt-4 text-base sm:text-lg leading-relaxed text-slate-300 max-w-2xl">
				<?php echo esc_html($is_en ? 'Practical guides on customs declaration, freight cost optimization, and supply chain updates from HP Trading - Transport experts.' : 'Cập nhật chính sách biểu thuế hải quan, cẩm nang thông quan cảng biển và giải pháp tối ưu hóa chi phí chuỗi cung ứng từ các chuyên gia HP Trading - Transport.'); ?>
			</p>
		</div>
	</div>
</header>

<!-- 3. Khu vực nội dung Blog Archive -->
<main class="py-14 sm:py-20 bg-slate-50/60">
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		
		<?php if ($blog_query->have_posts()) : ?>
			<?php
			$all_posts = $blog_query->posts;
			$featured_post = ($paged === 1 && count($all_posts) > 0) ? array_shift($all_posts) : null;
			?>

			<!-- Bài viết tiêu điểm (Featured Hero Card) - chỉ hiện ở trang 1 -->
			<?php if ($featured_post) : ?>
				<?php
				$f_id    = $featured_post->ID;
				$f_title = get_the_title($f_id);
				$f_url   = get_permalink($f_id);
				$f_date  = anp_date($f_id);
				$f_desc  = get_the_excerpt($f_id);
				?>
				<div class="reveal-up mb-14 overflow-hidden rounded-3xl border border-slate-200/90 bg-white shadow-xl shadow-slate-900/5 transition hover:shadow-2xl">
					<div class="grid items-stretch lg:grid-cols-12">
						<div class="relative min-h-[280px] overflow-hidden bg-slate-100 lg:col-span-7 lg:min-h-[400px]">
							<a href="<?php echo esc_url($f_url); ?>" class="block h-full w-full">
								<?php if (has_post_thumbnail($f_id)) : ?>
									<?php echo get_the_post_thumbnail($f_id, 'large', array('class' => 'h-full w-full object-cover transition duration-700 hover:scale-105')); ?>
								<?php else : ?>
									<div class="grid h-full place-items-center bg-brand text-accent"><?php echo anp_icon('ship', 'h-16 w-16'); ?></div>
								<?php endif; ?>
							</a>
							<span class="absolute top-4 left-4 rounded-xl bg-brand/90 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-accent backdrop-blur-md shadow-sm">
								<?php echo esc_html($is_en ? 'Featured Insight' : 'Tiêu điểm • Mới nhất'); ?>
							</span>
						</div>
						<div class="flex flex-col justify-between p-7 sm:p-10 lg:col-span-5">
							<div class="space-y-3.5">
								<div class="flex items-center gap-3 text-xs font-medium text-slate-500">
									<span><?php echo esc_html($f_date); ?></span>
									<span>•</span>
									<span class="font-semibold text-accent"><?php echo esc_html($is_en ? '5 min read' : '5 phút đọc'); ?></span>
								</div>
								<h2 class="font-display text-2xl font-extrabold leading-snug text-brand sm:text-3xl">
									<a href="<?php echo esc_url($f_url); ?>" class="transition hover:text-accent"><?php echo esc_html($f_title); ?></a>
								</h2>
								<p class="text-sm leading-relaxed text-slate-600 line-clamp-4">
									<?php echo esc_html(wp_trim_words($f_desc, 38)); ?>
								</p>
							</div>
							<div class="mt-8 flex items-center justify-between border-t border-slate-100 pt-5">
								<span class="text-xs font-semibold text-slate-500"><?php echo esc_html($is_en ? 'By HP Trading - Transport Expert Team' : 'Ban biên tập HP Trading - Transport'); ?></span>
								<a href="<?php echo esc_url($f_url); ?>" class="inline-flex items-center gap-1.5 font-bold text-accent hover:text-accent-hover transition text-sm">
									<span><?php echo esc_html($is_en ? 'Read Full Article' : 'Đọc bài viết'); ?></span>
									<?php echo anp_icon('arrow', 'h-4 w-4'); ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<!-- Lưới bài viết (3 Columns Grid) -->
			<?php if (!empty($all_posts)) : ?>
				<div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
					<?php foreach ($all_posts as $post) : ?>
						<?php
						$p_id    = $post->ID;
						$p_title = get_the_title($p_id);
						$p_url   = get_permalink($p_id);
						$p_date  = anp_date($p_id);
						$p_desc  = get_the_excerpt($p_id);
						$tags    = get_the_tags($p_id);
						$tag_name = (!empty($tags) && !is_wp_error($tags)) ? $tags[0]->name : 'Logistics';
						?>
						<article class="reveal-up card-lift group flex flex-col overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-sm transition hover:shadow-xl">
							<a href="<?php echo esc_url($p_url); ?>" class="block aspect-[16/10] overflow-hidden bg-slate-100">
								<?php if (has_post_thumbnail($p_id)) : ?>
									<?php echo get_the_post_thumbnail($p_id, 'anp-card', array('class' => 'h-full w-full object-cover transition duration-500 group-hover:scale-105')); ?>
								<?php else : ?>
									<div class="grid h-full place-items-center bg-brand text-accent"><?php echo anp_icon('ship', 'h-12 w-12'); ?></div>
								<?php endif; ?>
							</a>
							<div class="flex flex-1 flex-col justify-between p-6 space-y-4">
								<div class="space-y-3">
									<div class="flex items-center justify-between text-xs text-slate-500">
										<span><?php echo esc_html($p_date); ?></span>
										<span class="rounded-md bg-slate-100 px-2 py-0.5 font-semibold text-slate-700"><?php echo esc_html($tag_name); ?></span>
									</div>
									<h3 class="font-display text-lg font-bold leading-snug text-brand">
										<a href="<?php echo esc_url($p_url); ?>" class="transition hover:text-accent line-clamp-2"><?php echo esc_html($p_title); ?></a>
									</h3>
									<p class="text-sm leading-relaxed text-slate-600 line-clamp-3">
										<?php echo esc_html(wp_trim_words($p_desc, 24)); ?>
									</p>
								</div>
								<div class="border-t border-slate-100 pt-4">
									<a href="<?php echo esc_url($p_url); ?>" class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-accent transition hover:text-accent-hover">
										<span><?php echo esc_html($is_en ? 'Read More' : 'Đọc tiếp'); ?></span>
										<?php echo anp_icon('arrow', 'h-3.5 w-3.5'); ?>
									</a>
								</div>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<!-- Phân trang (Pagination) -->
			<?php if ($blog_query->max_num_pages > 1) : ?>
				<div class="mt-14 flex justify-center">
					<?php
					echo paginate_links(array(
						'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
						'format'    => '?paged=%#%',
						'current'   => $paged,
						'total'     => $blog_query->max_num_pages,
						'prev_text' => '&larr; ' . ($is_en ? 'Previous' : 'Trang trước'),
						'next_text' => ($is_en ? 'Next' : 'Trang sau') . ' &rarr;',
						'type'      => 'list',
					));
					?>
				</div>
			<?php endif; ?>

		<?php else : ?>
			<div class="py-16 text-center">
				<p class="text-base text-slate-600"><?php echo esc_html(anp_t('no_content')); ?></p>
			</div>
		<?php endif; ?>

	</div>
</main>

<!-- 4. Section Callout CRO: Kết nối tư vấn & Nhận báo giá -->
<section class="border-t border-slate-200 bg-white py-16">
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="rounded-3xl bg-gradient-to-r from-brand via-[#162D4A] to-brand p-8 text-white sm:p-12 shadow-xl">
			<div class="grid items-center gap-8 lg:grid-cols-12">
				<div class="space-y-3 lg:col-span-8">
					<span class="inline-flex items-center gap-2 rounded-full bg-accent/20 px-3.5 py-1 text-xs font-bold uppercase tracking-wider text-accent">
						<?php echo esc_html($is_en ? 'Consulting & Quotes in 30 Minutes' : 'Tư vấn & Báo giá trong 30 phút'); ?>
					</span>
					<h2 class="font-display text-2xl font-bold tracking-tight sm:text-3xl text-white">
						<?php echo esc_html($is_en ? 'Need Expert Advice on Customs or Freight Routes?' : 'Bạn cần tư vấn thủ tục hải quan hoặc tối ưu cước vận tải?'); ?>
					</h2>
					<p class="text-sm leading-relaxed text-slate-300 sm:text-base max-w-2xl">
						<?php echo esc_html($is_en ? 'Connect with HP Trading - Transport specialists for tailored solutions, transparent pricing, and zero hidden costs.' : 'Đội ngũ chuyên gia của HP Trading - Transport luôn sẵn sàng phân tích hồ sơ, áp mã HS chính xác và xây dựng phương án giao nhận Door-to-Door tối ưu nhất cho bạn.'); ?>
					</p>
				</div>
				<div class="flex flex-col sm:flex-row items-center gap-4 lg:col-span-4 lg:justify-end">
					<a href="<?php echo esc_url($contact_url); ?>" class="btn btn-accent w-full sm:w-auto px-6 py-3.5 font-bold shadow-md">
						<?php echo esc_html(anp_t('get_quote')); ?> <?php echo anp_icon('arrow', 'h-4 w-4 ml-1'); ?>
					</a>
					<a href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>" class="btn btn-ghost-light w-full sm:w-auto px-5 py-3.5 font-semibold">
						<?php echo esc_html(anp_opt('anp_phone_display')); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
