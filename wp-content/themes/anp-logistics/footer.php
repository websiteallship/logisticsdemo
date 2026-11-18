<?php
/**
 * Footer: Kiến trúc chuẩn B2B Logistics (design-taste-frontend).
 * Bố cục 4 cột mạch lạc, phân cấp thị giác tinh tế, thông tin pháp lý & liên hệ đầy đủ.
 */

$legal_rows = array();
if (anp_opt('anp_company_name') !== '') {
	$legal_rows[] = array(anp_t('legal_name'), anp_opt('anp_company_name'));
}
if (anp_opt('anp_tax_code') !== '') {
	$legal_rows[] = array(anp_t('tax_code'), anp_opt('anp_tax_code'));
}
if (anp_opt('anp_tax_address') !== '') {
	$legal_rows[] = array(anp_t('tax_address'), anp_opt('anp_tax_address'));
}
if (anp_opt('anp_legal_rep') !== '') {
	$rep = anp_opt('anp_legal_rep');
	if (anp_opt('anp_legal_rep_title') !== '') {
		$rep .= ' – ' . anp_opt('anp_legal_rep_title');
	}
	$legal_rows[] = array(anp_t('legal_rep'), $rep);
}
if (anp_opt('anp_license_no') !== '') {
	$license = anp_opt('anp_license_no');
	if (anp_opt('anp_license_date') !== '') {
		$license .= ' – ' . anp_t('license_date') . ': ' . anp_opt('anp_license_date');
	}
	if (anp_opt('anp_license_issuer') !== '') {
		$license .= ' – ' . anp_t('license_issuer') . ': ' . anp_opt('anp_license_issuer');
	}
	$legal_rows[] = array(anp_t('license_no'), $license);
}
?>
</main>

<footer id="site-footer" class="border-t border-white/10 bg-[#061220] text-slate-300">
	<div class="mx-auto grid max-w-7xl gap-12 px-5 py-16 sm:px-8 md:grid-cols-2 lg:grid-cols-12 lg:gap-8">
		<!-- Cột 1: Nhận diện thương hiệu & Slogan (4 cols) -->
		<div class="space-y-5 lg:col-span-4">
			<?php anp_logo_markup(true); ?>
			<p class="max-w-sm text-sm leading-relaxed text-slate-400"><?php echo esc_html(anp_opt('anp_tagline')); ?></p>
			
			<div class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-white/[0.04] px-3 py-1.5 text-xs text-slate-400">
				<span class="h-1.5 w-1.5 rounded-full bg-accent"></span>
				<span>Thủ tục rõ ràng • Hàng đi an tâm</span>
			</div>

			<div class="flex items-center gap-2.5 pt-2">
				<?php if (anp_opt('anp_facebook')) : ?>
					<a href="<?php echo esc_url(anp_opt('anp_facebook')); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-white/[0.04] px-3 py-1.5 text-xs font-medium text-slate-300 transition hover:border-accent hover:bg-accent/15 hover:text-white" aria-label="Facebook">
						<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 22v-8h2.7l.4-3.2h-3.1V8.8c0-.9.3-1.6 1.6-1.6h1.7V4.3c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.3H7.3V14h2.8v8z"/></svg>
						<span>Facebook</span>
					</a>
				<?php endif; ?>
				<?php if (anp_opt('anp_zalo')) : ?>
					<a href="<?php echo esc_url(anp_opt('anp_zalo')); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-lg border border-white/10 bg-white/[0.04] px-3 py-1.5 text-xs font-medium text-slate-300 transition hover:border-accent hover:bg-accent/15 hover:text-white" aria-label="Zalo">
						<span class="font-bold text-[11px] text-accent">Z</span>
						<span>Zalo</span>
					</a>
				<?php endif; ?>
			</div>
		</div>

		<!-- Cột 2: Thông tin liên hệ trực tiếp (3 cols) -->
		<div class="lg:col-span-3">
			<h3 class="text-xs font-bold uppercase tracking-[0.16em] text-white/50"><?php echo esc_html(anp_t('footer_contact')); ?></h3>
			<ul class="mt-5 space-y-4 text-sm text-slate-300">
				<li class="flex items-start gap-3">
					<span class="mt-0.5 shrink-0 text-accent"><?php echo anp_icon('pin', 'h-4 w-4'); ?></span>
					<span class="leading-relaxed"><?php echo esc_html(anp_opt('anp_address_hq')); ?></span>
				</li>
				<li class="flex items-center gap-3">
					<span class="shrink-0 text-accent"><?php echo anp_icon('phone', 'h-4 w-4'); ?></span>
					<a class="font-display font-bold text-white transition hover:text-accent" href="tel:<?php echo esc_attr(anp_opt('anp_phone')); ?>">
						<?php echo esc_html(anp_opt('anp_phone_display')); ?>
					</a>
				</li>
				<li class="flex items-center gap-3">
					<span class="shrink-0 text-accent"><?php echo anp_icon('mail', 'h-4 w-4'); ?></span>
					<a class="transition hover:text-white" href="mailto:<?php echo esc_attr(anp_opt('anp_email')); ?>">
						<?php echo esc_html(anp_opt('anp_email')); ?>
					</a>
				</li>
				<li class="flex items-start gap-3">
					<span class="mt-0.5 shrink-0 text-accent"><?php echo anp_icon('clock', 'h-4 w-4'); ?></span>
					<div class="text-xs leading-relaxed text-slate-400">
						<?php foreach (anp_hours_lines() as $hl) : ?>
							<p><?php echo esc_html($hl); ?></p>
						<?php endforeach; ?>
					</div>
				</li>
			</ul>
		</div>

		<!-- Cột 3: Liên kết nhanh (2 cols) -->
		<div class="lg:col-span-2">
			<h3 class="text-xs font-bold uppercase tracking-[0.16em] text-white/50"><?php echo esc_html(anp_t('links')); ?></h3>
			<?php
			wp_nav_menu(array(
				'theme_location' => 'footer',
				'container'      => false,
				'menu_class'     => 'mt-5 space-y-2.5 text-sm text-slate-300',
				'fallback_cb'    => 'anp_fallback_menu',
				'depth'          => 1,
			));
			?>
		</div>

		<!-- Cột 4: Thông tin doanh nghiệp & Pháp lý (3 cols) -->
		<div class="lg:col-span-3">
			<h3 class="text-xs font-bold uppercase tracking-[0.16em] text-white/50"><?php echo esc_html(anp_t('tax_info')); ?></h3>
			<?php if ($legal_rows) : ?>
				<dl class="mt-5 space-y-3 text-xs text-slate-400">
					<?php foreach ($legal_rows as $row) : ?>
						<div>
							<dt class="uppercase tracking-[0.1em] text-white/40 text-[11px]"><?php echo esc_html($row[0]); ?></dt>
							<dd class="mt-0.5 font-medium text-slate-300 leading-relaxed"><?php echo esc_html($row[1]); ?></dd>
						</div>
					<?php endforeach; ?>
				</dl>
			<?php endif; ?>
			<?php if (anp_opt('anp_address_rep') !== '') : ?>
				<div class="mt-4 pt-3 border-t border-white/5 text-xs text-slate-400">
					<p class="uppercase tracking-[0.1em] text-white/40 text-[11px]"><?php echo esc_html(anp_t('rep_office')); ?></p>
					<p class="mt-0.5 leading-relaxed text-slate-300"><?php echo esc_html(anp_opt('anp_address_rep')); ?></p>
				</div>
			<?php endif; ?>
			<div class="mt-5">
				<a href="<?php echo esc_url(anp_opt('anp_map_url')); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-lg border border-accent/30 bg-accent/10 px-3.5 py-2 text-xs font-semibold text-accent transition hover:bg-accent hover:text-white">
					<?php echo anp_icon('pin', 'h-3.5 w-3.5'); ?>
					<span><?php echo esc_html(anp_t('view_map')); ?></span>
					<?php echo anp_icon('arrow', 'h-3 w-3'); ?>
				</a>
			</div>
		</div>
	</div>

	<!-- Dòng bản quyền & Minh bạch theo chuẩn Anti-slop -->
	<div class="border-t border-white/10 bg-black/20">
		<div class="mx-auto flex max-w-7xl flex-col gap-3 px-5 py-5 text-xs text-white/50 sm:flex-row sm:items-center sm:justify-between sm:px-8">
			<p>© <?php echo esc_html(date_i18n('Y')); ?> <?php echo esc_html(anp_opt('anp_company_name')); ?>. <?php echo esc_html(anp_t('rights')); ?></p>
			<p class="text-white/40"><?php echo esc_html(anp_opt('anp_website')); ?></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
