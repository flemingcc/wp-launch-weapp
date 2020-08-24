<?php
/*
 * @link       https://chenfengming.cn/
 * @since      1.0.0
 * @package    wp-launch-weapp
 * @subpackage wp-launch-weapp/includes
 * @author     Flemingc <i@chenfengming.cn>
 *
 */
class Wechat_Share_And_Launch_Weapp {
	
	protected $loader;
	
	protected $plugin_name;
	
	protected $version;
	
	public function __construct() {
	    
		if ( defined( 'Wechat_Share_And_Launch_Weapp_VERSION' ) ) {
			$this->version = Wechat_Share_And_Launch_Weapp_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wp-launch-weapp';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}
	
	private function load_dependencies() {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-launch-weapp-loader.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-launch-weapp-i18n.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-launch-weapp-admin.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wp-launch-weapp-public.php';
		$this->loader = new Wechat_Share_And_Launch_Weapp_Loader();
	}
	
	private function set_locale() {
		$plugin_i18n = new Wechat_Share_And_Launch_Weapp_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}
	
	private function define_admin_hooks() {
		$plugin_admin = new Wechat_Share_And_Launch_Weapp_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action('admin_menu', $plugin_admin, 'menu');
		$this->loader->add_filter('plugin_action_links_'.Wechat_Share_And_Launch_Weapp_PLUGIN_FILE, $plugin_admin, 'links',10, 2);
	}
	
	private function define_public_hooks() {
	    $arr=get_option('wp-launch-weapp-settings');
	    if(isset($arr['appid'])&&isset($arr['appsecret'])){
    		$plugin_public = new Wechat_Share_And_Launch_Weapp_Public( $this->get_plugin_name(), $this->get_version() );
    		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
    		$this->loader->add_action( 'wp_footer', $plugin_public, 'footer' );
	    }
	}

	public function run() {
		$this->loader->run();
	}
	
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}
}
?>