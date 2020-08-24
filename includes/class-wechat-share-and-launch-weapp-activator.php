<?php
/*
 * @link       https://chenfengming.cn/
 * @since      1.0.0
 * @package    wp-launch-weapp
 * @subpackage wp-launch-weapp/includes
 * @author     Flemingc <i@chenfengming.cn>
 *
 */
class Wechat_Share_And_Launch_Weapp_Activator{
    
    public static function activate(){
        $options_name='wp-launch-weapp-settings';
        $arr_options=array(
            'openapifriends'=>1,
            'openapifriend'=>1,
            'appid'=>'',
            'appsecret'=>'',
            'opendicon'=>'',
            'description'=>''
        );
        add_option($options_name,$arr_options);
        
    }
}
?>