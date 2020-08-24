<?php
/**
 * Plugin Name: wp-launch-weapp
 * Plugin URI:  https://chenfengming.cn/2020/07/12/wechat-share-and-lauch-weapp.html
 * Description: 实现文章微信里分享有图标，支持小程序跳转
 * Version:     1.0.0
 * Author:      Flemingc
 * Author URI:  https://chenfengming.cn/
 * License:     MIT
 * Text Domain: wp-launch-weapp
 * Domain Path: /languages
 */
if ( ! defined( 'WPINC' ) ) {
    die;
}
define('Wechat_Share_And_Launch_Weapp_VERSION','1.0.0');
define('Wechat_Share_And_Launch_Weapp_PLUGIN_FILE',plugin_basename(__FILE__));
function activate_Wechat_Share_And_Launch_Weapp(){
    require plugin_dir_path(__FILE__).'includes/class-wp-launch-weapp-activator.php';
    Wechat_Share_And_Launch_Weapp_Activator::activate();
}
register_activation_hook(__FILE__, 'activate_Wechat_Share_And_Launch_Weapp');

function uninstall_Wechat_Share_And_Launch_Weapp(){
    require plugin_dir_path(__FILE__).'includes/class-wp-launch-weapp-uninstall.php';
    Wechat_Share_And_Launch_Weapp_Uninstall::uninstall();
}

register_uninstall_hook(__FILE__,'uninstall_Wechat_Share_And_Launch_Weapp');

require plugin_dir_path(__FILE__).'includes/class-wp-launch-weapp.php';

function run_Wechat_Share_And_Launch_Weapp(){
    $plugin=new Wechat_Share_And_Launch_Weapp();
    $plugin->run();
}
run_Wechat_Share_And_Launch_Weapp();
?>
