<?php
/**
 * Plugin Name: ByteDesk Chat for WooCommerce
 * Plugin URI: https://www.bytedesk.com/support
 * Description: ByteDesk客服系统的WooCommerce插件集成方案，支持在WooCommerce商店中嵌入ByteDesk在线客服功能
 * Version: 1.0.0
 * Author: ByteDesk
 * Author URI: https://www.bytedesk.com
 * License: BSL 1.1
 * Text Domain: bytedesk-woocommerce
 * Domain Path: /languages
 * Requires PHP: 7.0
 * WC requires at least: 3.0
 * WC tested up to: 8.5
 */

// 防止直接访问
if (!defined('ABSPATH')) {
    exit;
}

// 确保WooCommerce已经安装
if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    return;
}

// 定义插件常量
define('BYTEDESK_WC_VERSION', '1.0.0');
define('BYTEDESK_WC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('BYTEDESK_WC_PLUGIN_URL', plugin_dir_url(__FILE__));

// 加载核心类
require_once BYTEDESK_WC_PLUGIN_DIR . 'includes/class-bytedesk-woocommerce.php';

// 初始化插件
function bytedesk_wc_init() {
    global $bytedesk_wc;
    $bytedesk_wc = ByteDesk_WooCommerce::get_instance();
}
add_action('plugins_loaded', 'bytedesk_wc_init'); 