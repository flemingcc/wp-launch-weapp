<?php
/*
 * @link       https://chenfengming.cn
 * @since      1.0.0
 * @package    wp-launch-weapp
 * @subpackage wp-launch-weapp/admin/partials
 * @author     Flemingc <i@chenfengming.cn>
 *
 */
$options_name='wp-launch-weapp-settings';
if(!empty($_POST['submit'])&&check_admin_referer('wp-launch-weapp-settings','_wpnonce')){

    $arr_options=array(
        'openapifriends'=>(int)sanitize_key($_POST['openapifriends']),
        'openapifriend'=>(int)sanitize_key($_POST['openapifriend']),
        'appid'=>sanitize_text_field($_POST['appid']),
        'appsecret'=>sanitize_text_field($_POST['appsecret']),
        'opendicon'=>esc_url_raw(trim($_POST['opendicon'])),
        'description'=>sanitize_text_field($_POST['description']),
    );

    $updateflag=update_option($options_name, $arr_options);
    $updateflag=true;
}
$arr=get_option($options_name);

?>
<?php if( !empty( $updateflag ) ) { echo '<div id="message" class="updated fade"><p>' . __('updatesuccess','wp-launch-weapp') . '</p></div>'; } ?>

<div class="wrap">
<h2><?php _e('settings','wp-launch-weapp'); ?></h2>
<p>
<?php _e('settings_desc','wp-launch-weapp'); ?>
</p>
<form action="<?php echo admin_url('options-general.php?page=wp-launch-weapp-settings');?>" name="settings-wp-launch-weapp" method="post">
<table class="form-table">
                <tbody>
                <tr>
                    <th><label><?php _e('openapi','wp-launch-weapp'); ?></label></th>
                    <td>
                    <fieldset>
                    <label><input name="openapifriends" type="checkbox" value="1" <?php if($arr['openapifriends']) _e('checked="checked"');?>><?php _e('openapifriends','wp-launch-weapp'); ?> </label>
                    <br>
                    <label><input name="openapifriend" type="checkbox" value="1" <?php if($arr['openapifriend']) _e('checked="checked"');?>><?php _e('openapifriend','wp-launch-weapp'); ?> </label>
        			</fieldset>
        			 <p class="description"><?php _e('openapidesc','wp-launch-weapp'); ?></p>
                    </td>
                    
                </tr>
                <tr>
                    <th><label><?php _e('appid','wp-launch-weapp'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php _e($arr['appid']); ?>" id="appid" name="appid">
                    <p class="description"><?php _e('appiddesc','wp-launch-weapp'); ?></p>
                    </td>
                    
                </tr>
               <tr>
                    <th><label><?php _e('appsecret','wp-launch-weapp'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php _e($arr['appsecret']); ?>" id="appsecret" name="appsecret">
                    <p class="description"><?php _e('appsecretdesc','wp-launch-weapp'); ?></p>
                    </td>
                    
                </tr>
                 <tr>
                    <th><label><?php _e('opendicon','wp-launch-weapp'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php _e($arr['opendicon']); ?>" id="opendicon" name="opendicon">
                    <p class="description"><?php _e('opendicondesc','wp-launch-weapp'); ?></p>
                    </td>
                    
                </tr>
       <tr>
                    <th><label><?php _e('description','wp-launch-weapp'); ?></label></th>
                    <td><input type="text" class="regular-text" value="<?php _e($arr['description']); ?>" id="description" name="description">
                    <p class="description"><?php _e('descriptiondesc','wp-launch-weapp'); ?></p>
                    </td>
                    
                </tr>
                </tbody>
            </table>
            <?php 
            wp_nonce_field("wp-launch-weapp-settings");
            submit_button(); 
            ?>
           
</form>
</div>