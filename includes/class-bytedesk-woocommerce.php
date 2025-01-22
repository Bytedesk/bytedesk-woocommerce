<?php
if (!defined('ABSPATH')) {
    exit;
}

class ByteDesk_WooCommerce {
    private static $instance = null;
    
    public function __construct() {
        $this->init();
    }
    
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function init() {
        // 加载设置类
        require_once BYTEDESK_WC_PLUGIN_DIR . 'includes/class-bytedesk-woocommerce-settings.php';
        new ByteDesk_WooCommerce_Settings();
        
        // 加载脚本和样式
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        
        // 在页面底部添加客服代码
        add_action('wp_footer', array($this, 'add_chat_widget'));
    }
    
    public function enqueue_scripts() {
        wp_enqueue_script('bytedesk-web', 'https://www.weiyuai.cn/embed/bytedesk-web.js', array(), BYTEDESK_WC_VERSION, true);
        wp_enqueue_style('bytedesk-wc', BYTEDESK_WC_PLUGIN_URL . 'assets/css/bytedesk-woocommerce.css', array(), BYTEDESK_WC_VERSION);
    }
    
    public function add_chat_widget() {
        $options = get_option('bytedesk_wc_settings');
        if (empty($options['org_id']) || empty($options['work_group'])) {
            return;
        }
        
        $config = array(
            'baseUrl' => esc_url($options['base_url'] ?? 'https://www.weiyuai.cn'),
            'placement' => esc_attr($options['placement'] ?? 'bottom-right'),
            'autoPopup' => !empty($options['auto_popup']),
            'inviteParams' => array(
                'show' => !empty($options['show_invite']),
                'text' => esc_html($options['invite_text'] ?? '需要帮助么'),
            ),
            'bubbleConfig' => array(
                'show' => true,
                'icon' => '👋',
                'title' => esc_html($options['window_title'] ?? '在线客服'),
                'subtitle' => esc_html($options['window_subtitle'] ?? '点击我，与我对话')
            ),
            'theme' => array(
                'theme' => 'system',
                'backgroundColor' => esc_attr($options['theme_color'] ?? '#0066FF'),
                'textColor' => '#ffffff'
            ),
            'window' => array(
                'width' => '380'
            ),
            'chatParams' => array(
                'org' => esc_attr($options['org_id']),
                't' => '2',
                'sid' => esc_attr($options['work_group'])
            )
        );
        
        ?>
        <script>
            const config = <?php echo json_encode($config); ?>;
            const bytedesk = new BytedeskWeb(config);
            bytedesk.init();
        </script>
        <?php
    }
} 