# wp-launch-weapp

#### 介绍
WordPress H5跳转微信小程序插件，用于WordPress页面在微信浏览器中打开微信小程序。此外，插件还支持微信分享带图带描述。
* 支持文章页面跳转微信小程序
* 支持文章、页面分享给朋友或朋友圈，显示分享图标（文章里有图片显示可显示，没有图片显示后台自定义默认图标）
* 支持微信分享到朋友，显示分享描述（如文章有内容就作为描述，没有描述显示后台自定义默认描述）
* 支持自定义微信默认分享图标URL
* 支持自定义微信默认分享描述

#### 准备
在开始之前，请先准备一个已认证的微信公众号。微信小程序跳转、微信分享都需要使用公众号的AppID和AppSecret，并将WordPress所在域名加到公众号信任白名单中。小伙伴们可参照公众号官方文档进行设置[https://mp.weixin.qq.com/](https://mp.weixin.qq.com/)。


#### 安装说明

第一种方法，在WordPress插件列表页面，点击安装，选择从本地上传，将插件zip压缩包上传，并在插件列表中将新安装的插件启用即可。第二种方法是，将整个目录上传到WordPress下的wp-content-> plugins目录下，并在插件列表中启用即可。或者通过


#### 使用说明

1.  在WordPress插件列表中启用插件。
2.  在WordPress编辑器中新增“区块”,将下列打开小程序按钮粘贴到区块中，并将“username”和“path”修改成你需要跳转的小程序id和页面路径。
```HTML
<wx-open-launch-weapp id="launch-btn" username="gh_xxx" path="/pages/index/index.html"> 
    <template> 
        <style>.open-weapp { padding: 10px 20px; }</style>
        <button>打开小程序</button>
    </template>
</wx-open-launch-weapp>
```
3.  在文章中使用新建的打开小程序区块即可。

#### 参与贡献

1.  Fork 本仓库
2.  新建 Feat_xxx 分支
3.  提交代码
4.  新建 Pull Request


#### 码云特技

1.  使用 Readme\_XXX.md 来支持不同的语言，例如 Readme\_en.md, Readme\_zh.md
2.  码云官方博客 [blog.gitee.com](https://blog.gitee.com)
3.  你可以 [https://gitee.com/explore](https://gitee.com/explore) 这个地址来了解码云上的优秀开源项目
4.  [GVP](https://gitee.com/gvp) 全称是码云最有价值开源项目，是码云综合评定出的优秀开源项目
5.  码云官方提供的使用手册 [https://gitee.com/help](https://gitee.com/help)
6.  码云封面人物是一档用来展示码云会员风采的栏目 [https://gitee.com/gitee-stars/](https://gitee.com/gitee-stars/)
