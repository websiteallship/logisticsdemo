<?php
/**
 * Form báo giá: nhận dữ liệu qua admin-post.php, kiểm tra nonce và honeypot, gửi email về quản trị (tiếng Việt).
 */

if (!defined('ABSPATH')) {
	exit;
}

function anp_handle_contact() {
	$back = wp_get_referer() ? wp_get_referer() : home_url('/#lien-he');
	$back = remove_query_arg('anp_sent', $back);

	if (!isset($_POST['anp_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['anp_nonce'])), 'anp_contact')) {
		wp_safe_redirect(add_query_arg('anp_sent', '0', $back) . '#lien-he');
		exit;
	}

	// Honeypot: bot điền vào ô "website" ẩn thì coi như đã gửi để không lộ bẫy.
	if (!empty($_POST['website'])) {
		wp_safe_redirect(add_query_arg('anp_sent', '1', $back) . '#lien-he');
		exit;
	}

	$name    = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
	$company = isset($_POST['company']) ? sanitize_text_field(wp_unslash($_POST['company'])) : '';
	$phone   = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
	$email   = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
	$service = isset($_POST['service']) ? sanitize_text_field(wp_unslash($_POST['service'])) : '';
	$message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

	if ($name === '' || $phone === '' || !is_email($email)) {
		wp_safe_redirect(add_query_arg('anp_sent', '0', $back) . '#lien-he');
		exit;
	}

	$to = anp_opt('anp_form_email', '');
	if (!is_email($to)) {
		$to = get_option('admin_email');
	}

	// Email gửi quản trị dùng tiếng Việt cố định, không phụ thuộc ngôn ngữ người dùng đang xem.
	$body = implode("\n", array(
		sprintf(anp_t('mail_intro', 'vi'), anp_opt_for('anp_brand_name', 'vi')),
		'',
		anp_t('mail_name', 'vi') . ': ' . $name,
		anp_t('mail_company', 'vi') . ': ' . $company,
		anp_t('mail_phone', 'vi') . ': ' . $phone,
		anp_t('mail_email', 'vi') . ': ' . $email,
		anp_t('mail_service', 'vi') . ': ' . $service,
		'',
		anp_t('mail_content', 'vi') . ':',
		$message,
	));

	$sent = wp_mail(
		$to,
		sprintf(anp_t('mail_subject', 'vi'), $service),
		$body,
		array('Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $email)
	);

	wp_safe_redirect(add_query_arg('anp_sent', $sent ? '1' : '0', $back) . '#lien-he');
	exit;
}
add_action('admin_post_anp_contact', 'anp_handle_contact');
add_action('admin_post_nopriv_anp_contact', 'anp_handle_contact');
