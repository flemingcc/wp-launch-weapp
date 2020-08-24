<?php
/*
 * @link       https://chenfengming.cn/
 * @since      1.0.0
 * @package    wp-launch-weapp
 * @subpackage wp-launch-weapp/public
 * @author     Flemingc <i@chenfengming.cn>
 *
 */
class Wechat_Share_And_Launch_Weapp_Public {


	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
	   
		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/Wechat_Share_And_Launch_Weapp_public.css', array(), $this->version, 'all' );
	}
	
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, 'https://res.wx.qq.com/open/js/jweixin-1.6.0.js', array( 'jquery' ), $ver=null, false );

	}
	private function getImgurl($defaultimg=''){
	    $p=(int)sanitize_key($_GET['p']);
	    $content=get_the_content($p);
	    if(empty($content)&&$p){
	        $post=get_post($p);
	        $content=isset($post->post_content)?$post->post_content:'';
	    }	     
	    $p="/<img.*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/si";
	    if(preg_match($p,$content,$arr)){
	        if(isset($arr[1]))
	            $imgurl=$arr[1];
	    }
	    if(empty($imgurl)) $imgurl=$defaultimg;
	    return $imgurl;
	}
	public function footer(){	
	    $arr=get_option('wp-launch-weapp-settings');
	    if(isset($arr['appid'])&&isset($arr['appsecret'])){
	        require_once plugin_dir_path( dirname( __FILE__ ) ).'public/weixinapi/WechatJSSDK.php';
	        $wechatjssdk=new WechatJSSDK($arr['appid'], $arr['appsecret']);
			$signPackage=$wechatjssdk->getSignPackage();
	        if(isset($arr['opendicon']))
	            $defaultimg=$arr['opendicon'];
            $imgurl=$this->getImgurl($defaultimg);
            $desc=htmlspecialchars(preg_replace('/\s+/','',get_the_excerpt((int)sanitize_key($_GET['p']))));
            if(empty($desc)&&isset($arr['description']))
                $desc=$arr['description'];
            require_once plugin_dir_path( dirname( __FILE__ ) ).'public/partials/wp-launch-weapp-public-display.php';
	    }             
	    
	}

}