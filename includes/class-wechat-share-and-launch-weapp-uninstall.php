<?php
/*
 * @link       https://chenfengming.cn/
 * @since      1.0.0
 * @package    wp-launch-weapp
 * @subpackage wp-launch-weapp/includes
 * @author     Flemingc <i@chenfengming.cn>
 *
 */
class Wechat_Share_And_Launch_Weapp_Uninstall {

	
	public static function uninstall() {
        delete_option('wp-launch-weapp-settings');
	}

}
