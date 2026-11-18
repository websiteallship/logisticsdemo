<?php
/**
 * HP Trading - Transport – functions.php
 * Điểm vào của theme. Các phần chức năng nằm trong thư mục inc/.
 */

if (!defined('ABSPATH')) {
	exit;
}

define('ANP_VERSION', '1.0.2');

require_once get_template_directory() . '/inc/i18n.php';
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/photos.php';
require_once get_template_directory() . '/inc/services-content.php';
require_once get_template_directory() . '/inc/services-sync.php';
require_once get_template_directory() . '/inc/nav.php';
require_once get_template_directory() . '/inc/options.php';
require_once get_template_directory() . '/inc/seo.php';
require_once get_template_directory() . '/inc/contact.php';
