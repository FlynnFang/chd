<!-- top -->
<!-- <div class="top">
    <div class="wrap clearfix">

        <a href="/" class="fr">登录</a>
        <a href="https://mp.weixin.qq.com/" class="fr">微信公众平台</a>
        <span class="fl banner"><?php $this->launch(Yii::app()->name); ?></span>
    </div>
</div>  -->
<!-- top end -->

<!-- content -->
<div class="content">
    <div class="wrap login">
        <form id="loginform" class="loginform" method="POST" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/login/login" success="<?php echo Yii::app()->request->baseUrl; ?>/admin/article/" autocomplete="off">
            <h1 style="margin-bottom:48px"><?php $this->launch(Yii::app()->name); ?></h1>
            <p style="font-size:14px;margin-bottom:15px">请联系系统管理员分配管理员帐号登录</p>
            <p class="errortip"></p>

            <div class="item">
                <i class="icon icon-name"></i>
                <input type="text" class="ipt" value="" autocomplete="off" name="username" tabindex="1" placeholder="用户名" />
            </div>

            <div class="item">
                <i class="icon icon-password"></i>
                <input type="password" class="ipt"  tabindex="2" id="password" name="password" placeholder="密码" autocomplete="off" />
            </div>

            <div class="item">
                <i class="icon icon-vcode"></i>
                <input type="text" class="ipt" tabindex="3" name="captcha" placeholder="验证码" style="width:124px" />
                <p class="item-vcode"><img id="vcode" style="vertical-align:middle" src="<?php echo Yii::app()->request->baseUrl; ?>/admin/login/captcha?r=<?php echo rand(1000, 9999); ?>" alt="验证码" /><a id="vcodeTip"  href="javascript:void(0)">看不清？换一张</a></p>
            </div>

            <div class="item item-sub">
                <input type="submit" class="subbtn" value="登录" />
            </div>
        </form>
    </div>
</div>
<!-- content end -->

<!-- footer -->
<div class="footer">
技术支持：腾讯大渝网 Copyright &copy; 2014-2020
</div>
<!-- footer end -->

<script type="text/javascript">
<!--
function refreshCaptcha(dom){

	var rand = parseInt(new Date().valueOf()/1000);
	var src = "<?php echo Yii::app()->request->baseUrl; ?>/admin/login/captcha?r=" + rand;
	$(dom).attr("src", src);
}

$().ready(function(){

	$("#vcode, #vcodeTip").click(function(){
		refreshCaptcha($("#vcode"));
	});
});

//-->
</script>
