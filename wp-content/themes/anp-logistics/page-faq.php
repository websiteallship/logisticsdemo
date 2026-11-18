<?php
/**
 * Template Name: Trang hỏi đáp (FAQ Page)
 * Description: Trang giải đáp thắc mắc chuyên sâu về logistics & hải quan (design-taste-frontend).
 */
get_header();

$faq   = anp_faq_items();
$is_en = anp_lang() === 'en';
?>

<!-- 1. Breadcrumb -->
<nav class="border-b border-slate-200 bg-slate-50" aria-label="<?php echo esc_attr(anp_t('breadcrumb')); ?>">
	<ol class="mx-auto flex max-w-7xl flex-wrap items-center gap-2 px-5 py-3.5 text-sm text-slate-600 sm:px-8">
		<li><a class="hover:text-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(anp_t('home')); ?></a></li>
		<li aria-hidden="true" class="text-slate-400">/</li>
		<li class="font-semibold text-brand" aria-current="page"><?php echo esc_html($is_en ? 'FAQ' : 'Hỏi đáp'); ?></li>
	</ol>
</nav>

<!-- 2. Header Banner & Tìm kiếm câu hỏi -->
<header class="relative isolate overflow-hidden bg-brand py-16 text-white sm:py-20">
	<div class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-brand via-brand/95 to-brand/80"></div>
	<div class="mx-auto max-w-7xl px-5 sm:px-8">
		<div class="reveal-up max-w-3xl">
			<p class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3.5 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-white">
				<span class="h-1.5 w-1.5 rounded-full bg-accent animate-pulse"></span>
				<?php echo esc_html($is_en ? 'Knowledge Base • 24/7 Customs Advisory' : 'Trung tâm giải đáp • Tư vấn hải quan 24/7'); ?>
			</p>
			<h1 class="mt-4 font-display text-3xl font-bold tracking-tight sm:text-5xl">
				<?php echo esc_html(get_the_title() ?: ($is_en ? 'Frequently Asked Questions' : 'Câu hỏi thường gặp')); ?>
			</h1>
			<p class="mt-4 text-base leading-relaxed text-slate-300 sm:text-lg">
				<?php echo esc_html($is_en ? 'Detailed answers regarding customs clearance procedures, preferential tariff rates, transit times, and international cargo delivery.' : 'Giải đáp chi tiết về thủ tục khai báo hải quan, mã HS, thuế suất ưu đãi, thời gian thông quan và các điều khoản giao nhận hàng hóa tại HP Trading - Transport.'); ?>
			</p>
		</div>

		<!-- Ô tìm kiếm câu hỏi nhanh (Client-side Search) -->
		<div class="reveal-up delay-100 mt-8 max-w-xl">
			<div class="relative">
				<span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
					<svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
				</span>
				<input id="faq-search-input" type="search" placeholder="<?php echo esc_attr($is_en ? 'Search question, keyword (e.g. HS code, customs, costs)...' : 'Tìm câu hỏi theo từ khóa (VD: hải quan, mã HS, chi phí, LCL)...'); ?>" class="w-full rounded-xl border border-white/20 bg-white/10 py-3.5 pl-12 pr-4 text-sm text-white placeholder-white/50 backdrop-blur-md transition focus:border-accent focus:bg-white focus:text-slate-900 focus:outline-none focus:ring-4 focus:ring-accent/20">
			</div>
		</div>
	</div>
</header>

<!-- 3. Bố cục 2 Cột: Danh mục & Accordion FAQ -->
<section class="py-16 sm:py-24">
	<div class="mx-auto grid max-w-7xl items-start gap-12 px-5 sm:px-8 lg:grid-cols-12 lg:gap-14">
		
		<!-- Cột trái (4 cols): Sticky Hotline Card & Hỗ trợ hiện trường -->
		<div class="reveal-left space-y-6 lg:sticky lg:top-32 lg:col-span-4">
			<!-- Thẻ hỗ trợ trực tiếp 24/7 -->
			<div class="rounded-3xl border border-slate-200/90 bg-white p-7 shadow-lg shadow-slate-200/60">
				<div class="flex items-center gap-3">
					<span class="grid h-12 w-12 place-items-center rounded-2xl bg-accent/15 text-accent">
						<?php echo anp_icon('phone', 'h-6 w-6'); ?>
					</span>
					<div>
						<p class="text-xs font-bold uppercase tracking-wider text-slate-500"><?php echo esc_html($is_en ? 'Direct Hotline 24/7' : 'Tư vấn trực tiếp 24/7'); ?></p>
						<a class="font-display text-xl font-bold text-brand transition hover:text-accent" href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>">
							<?php echo esc_html(anp_opt('anp_phone_display')); ?>
						</a>
					</div>
				</div>
				<p class="mt-4 text-xs leading-relaxed text-slate-600">
					<?php echo esc_html($is_en ? 'Need urgent consultation on HS classification or container demurrage at ports? Call our duty officer anytime.' : 'Cần kiểm tra nhanh mã HS, tư vấn biểu thuế nhập khẩu ưu đãi hoặc hỗ trợ giải phóng hàng tại cảng Cát Lái, VICT, Tân Sơn Nhất.'); ?>
				</p>
				<div class="mt-6 border-t border-slate-100 pt-5">
					<a href="<?php echo esc_url(home_url('/#lien-he')); ?>" class="btn btn-accent w-full justify-center text-sm font-semibold">
						<span><?php echo esc_html(anp_t('get_quote')); ?></span>
						<?php echo anp_icon('arrow', 'h-4 w-4'); ?>
					</a>
				</div>
			</div>

			<!-- Thẻ cam kết bảo mật & nghiệp vụ -->
			<div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
				<h3 class="text-xs font-bold uppercase tracking-wider text-slate-600"><?php echo esc_html($is_en ? 'Our Commitment' : 'Cam kết của HP Trading - Transport'); ?></h3>
				<ul class="mt-4 space-y-3 text-xs text-slate-700">
					<li class="flex items-start gap-2.5">
						<span class="mt-0.5 text-accent"><?php echo anp_icon('check', 'h-4 w-4'); ?></span>
						<span><?php echo esc_html($is_en ? 'Accurate HS Code classification avoiding fines' : 'Áp đúng mã HS, tránh truy thu và phạt thuế'); ?></span>
					</li>
					<li class="flex items-start gap-2.5">
						<span class="mt-0.5 text-accent"><?php echo anp_icon('check', 'h-4 w-4'); ?></span>
						<span><?php echo esc_html($is_en ? 'Full preferential C/O tax deduction guidance' : 'Tận dụng tối đa C/O ưu đãi (Form E, D, EUR.1)'); ?></span>
					</li>
					<li class="flex items-start gap-2.5">
						<span class="mt-0.5 text-accent"><?php echo anp_icon('check', 'h-4 w-4'); ?></span>
						<span><?php echo esc_html($is_en ? 'Field specialists on-site at major ports & ICDs' : 'Đội ngũ hiện trường túc trực giải phóng hàng ngay'); ?></span>
					</li>
				</ul>
			</div>
		</div>

		<!-- Cột phải (8 cols): Danh sách câu hỏi chi tiết -->
		<div class="reveal-right delay-150 lg:col-span-8">
			<div id="faq-list-container" class="space-y-4">
				<?php if ($faq) : ?>
					<?php foreach ($faq as $i => $item) : ?>
						<details class="faq-item group rounded-2xl border border-slate-200/90 bg-white px-6 py-5 transition-all hover:border-slate-300 open:border-accent/40 open:shadow-md"<?php echo $i === 0 ? ' open' : ''; ?>>
							<summary class="flex cursor-pointer list-none items-center justify-between gap-6 text-left font-display text-base font-bold text-brand transition hover:text-accent sm:text-lg">
								<span class="faq-question"><?php echo esc_html($item['q']); ?></span>
								<span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-slate-100 text-brand transition group-open:rotate-45 group-open:bg-accent group-open:text-white" aria-hidden="true">+</span>
							</summary>
							<div class="faq-answer mt-4 border-t border-slate-100 pt-4 text-[15px] leading-relaxed text-slate-700">
								<?php echo nl2br(esc_html($item['a'])); ?>
							</div>
						</details>
					<?php endforeach; ?>
				<?php else : ?>
					<p class="text-slate-500"><?php echo esc_html(anp_t('no_content')); ?></p>
				<?php endif; ?>

				<!-- Thông báo khi tìm kiếm không thấy kết quả -->
				<div id="faq-no-results" class="hidden rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center text-sm text-slate-600">
					<p class="font-bold text-brand"><?php echo esc_html($is_en ? 'No matching questions found' : 'Không tìm thấy câu hỏi phù hợp'); ?></p>
					<p class="mt-1 text-xs text-slate-500"><?php echo esc_html($is_en ? 'Try searching with different keywords or contact us directly.' : 'Vui lòng thử từ khóa khác hoặc gọi trực tiếp hotline để được hỗ trợ tức thì.'); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 4. Closing CTA: Chưa tìm thấy câu trả lời? -->
<section class="border-t border-slate-200 bg-slate-50 py-16">
	<div class="mx-auto max-w-7xl px-5 text-center sm:px-8">
		<h2 class="font-display text-2xl font-bold tracking-tight text-brand sm:text-3xl">
			<?php echo esc_html($is_en ? 'Have questions regarding your specific cargo?' : 'Bạn có thắc mắc riêng về lô hàng cụ thể?'); ?>
		</h2>
		<p class="mx-auto mt-3 max-w-2xl text-sm leading-relaxed text-slate-600 sm:text-base">
			<?php echo esc_html($is_en ? 'Submit your cargo packing list or invoice details. Our experts will revert with an itemized customs & shipping plan in 30 minutes.' : 'Gửi danh mục hàng hóa hoặc yêu cầu vận chuyển, đội ngũ chuyên viên của HP Trading - Transport sẽ tư vấn giải pháp tối ưu và gửi báo giá chi tiết hoàn toàn miễn phí.'); ?>
		</p>
		<div class="mt-8 flex flex-wrap items-center justify-center gap-4">
			<a href="<?php echo esc_url(home_url('/#lien-he')); ?>" class="btn btn-accent">
				<span><?php echo esc_html(anp_t('send_request')); ?></span>
				<?php echo anp_icon('arrow', 'h-4 w-4'); ?>
			</a>
			<a href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>" class="btn btn-ghost-dark">
				<?php echo anp_icon('phone', 'h-4 w-4'); ?>
				<span><?php echo esc_html(anp_opt('anp_phone_display')); ?></span>
			</a>
		</div>
	</div>
</section>

<script>
// Bộ lọc tìm kiếm câu hỏi tức thì (Client-side FAQ Search)
document.addEventListener('DOMContentLoaded', function () {
	var input = document.getElementById('faq-search-input');
	var items = document.querySelectorAll('.faq-item');
	var noResults = document.getElementById('faq-no-results');
	if (input && items.length) {
		input.addEventListener('input', function () {
			var query = input.value.trim().toLowerCase();
			var matchCount = 0;
			items.forEach(function (item) {
				var q = item.querySelector('.faq-question').textContent.toLowerCase();
				var a = item.querySelector('.faq-answer').textContent.toLowerCase();
				if (!query || q.indexOf(query) !== -1 || a.indexOf(query) !== -1) {
					item.style.display = '';
					matchCount++;
					if (query) item.open = true; // tự mở khi có từ khóa khớp
				} else {
					item.style.display = 'none';
				}
			});
			if (noResults) {
				noResults.classList.toggle('hidden', matchCount > 0);
			}
		});
	}
});
</script>

<?php get_footer(); ?>
