<?php
if (!defined('ABSPATH')) {
    exit;
}

class ByteDesk_WooCommerce_Settings {
    public function __construct() {
        add_filter('woocommerce_settings_tabs_array', array($this, 'add_settings_tab'), 50);
        add_action('woocommerce_settings_tabs_bytedesk_settings', array($this, 'settings_tab'));
        add_action('woocommerce_update_options_bytedesk_settings', array($this, 'update_settings'));
    }
    
    public function add_settings_tab($settings_tabs) {
        $settings_tabs['bytedesk_settings'] = __('ByteDesk客服', 'bytedesk-woocommerce');
        return $settings_tabs;
    }
    
    public function settings_tab() {
        woocommerce_admin_fields($this->get_settings());
    }
    
    public function update_settings() {
        woocommerce_update_options($this->get_settings());
    }
    
    public function get_settings() {
        $settings = array(
            'section_title' => array(
                'name' => __('ByteDesk客服设置', 'bytedesk-woocommerce'),
                'type' => 'title',
                'desc' => '',
                'id' => 'bytedesk_wc_section_title'
            ),
            'org_id' => array(
                'name' => __('企业ID', 'bytedesk-woocommerce'),
                'type' => 'text',
                'desc' => __('输入您的ByteDesk企业ID', 'bytedesk-woocommerce'),
                'id' => 'bytedesk_wc_settings[org_id]'
            ),
            'work_group' => array(
                'name' => __('工作组ID', 'bytedesk-woocommerce'),
                'type' => 'text',
                'desc' => __('输入您的工作组ID', 'bytedesk-woocommerce'),
                'id' => 'bytedesk_wc_settings[work_group]'
            ),
            'window_title' => array(
                'name' => __('窗口标题', 'bytedesk-woocommerce'),
                'type' => 'text',
                'desc' => __('客服窗口的标题', 'bytedesk-woocommerce'),
                'default' => '在线客服',
                'id' => 'bytedesk_wc_settings[window_title]'
            ),
            'placement' => array(
                'name' => __('窗口位置', 'bytedesk-woocommerce'),
                'type' => 'select',
                'options' => array(
                    'bottom-right' => __('右下角', 'bytedesk-woocommerce'),
                    'bottom-left' => __('左下角', 'bytedesk-woocommerce')
                ),
                'default' => 'bottom-right',
                'id' => 'bytedesk_wc_settings[placement]'
            ),
            'auto_popup' => array(
                'name' => __('自动弹出', 'bytedesk-woocommerce'),
                'type' => 'checkbox',
                'desc' => __('是否自动弹出客服窗口', 'bytedesk-woocommerce'),
                'default' => 'no',
                'id' => 'bytedesk_wc_settings[auto_popup]'
            ),
            'theme_color' => array(
                'name' => __('主题颜色', 'bytedesk-woocommerce'),
                'type' => 'color',
                'desc' => __('选择客服窗口的主题颜色', 'bytedesk-woocommerce'),
                'default' => '#0066FF',
                'id' => 'bytedesk_wc_settings[theme_color]'
            ),
            'section_end' => array(
                'type' => 'sectionend',
                'id' => 'bytedesk_wc_section_end'
            )
        );
        
        return apply_filters('bytedesk_wc_settings', $settings);
    }
} 