<?php
/*
 * @link       https://chenfengming.cn
 * @since      1.0.0
 * @package    wp-launch-weapp
 * @subpackage wp-launch-weapp/public/partials
 * @author     Flemingc <i@chenfengming.cn>
 *
 */

?>
<script>
wx.config({
    debug: false, 
	appId: '<?php echo $signPackage["appId"];?>',
	timestamp: <?php echo $signPackage["timestamp"];?>,
	nonceStr: '<?php echo $signPackage["nonceStr"];?>',
	signature: '<?php echo $signPackage["signature"];?>',
	jsApiList: [
    <?php if($arr['openapifriends']){ ?>
        'onMenuShareTimeline',
    <?php }?>
    <?php if($arr['openapifriend']){ ?>
        'onMenuShareAppMessage',
    <?php }?>
        'onMenuShareWeibo'
    ],
    openTagList: ['wx-open-launch-weapp', 'wx-open-launch-app']
});


wx.ready(function () {
	<?php if($arr['openapifriend']){?>
	wx.onMenuShareAppMessage({ 
        title: '', 
        desc: '<?php echo $desc;?>', 
        link: '', 
        imgUrl: '<?php echo $imgurl;?>', 
        success: function () {
       
        }
    });

    <?php } ?>

	<?php if($arr['openapifriends']){?>
    wx.onMenuShareTimeline({ 
        title: '', 
        link: '', 
        imgUrl: '<?php echo $imgurl;?>', 
        success: function () {

        }
    });
    <?php } ?>

    wx.onMenuShareWeibo({
        title: '',
        desc: '<?php echo $desc;?>',
        link: '',
        imgUrl: '<?php echo $imgurl;?>',
        success: function () {
            
        },
        cancel: function () {
            
        }
    });
});

wx.error(function (res) {
  alert(res)
});
</script>