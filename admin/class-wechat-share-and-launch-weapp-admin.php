<?php
/*
 * @link       https://chenfengming.cn/
 * @since      1.0.0
 * @package    wp-launch-weapp
 * @subpackage wp-launch-weapp/admin
 * @author     Flemingc <i@chenfengming.cn>
 *
 */
class Wechat_Share_And_Launch_Weapp_Admin {

	
	private $plugin_name;

	
	private $version;

	
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		

	}
	
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-launch-weapp-admin.css', array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-launch-weapp-admin.js', array( 'jquery' ), $this->version, false );

	}
	public function links($alinks){
	   
	 
	       $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=wp-launch-weapp-settings') ) .'">'.__('settingsname','wp-launch-weapp').'</a>';
           $alinks=array_merge($links,$alinks);
	
	    return $alinks;
	}
	public function menu(){
	    add_options_page(__('settings','wp-launch-weapp'),  __('settings','wp-launch-weapp'), 'manage_options','wp-launch-weapp-settings', array($this,'settings_page'));
	}
	public function settings_page(){
	    require_once plugin_dir_path( dirname( __FILE__ ) ).'admin/partials/wp-launch-weapp-admin-display.php';
	}
	

}
