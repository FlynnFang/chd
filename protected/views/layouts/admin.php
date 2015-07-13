<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>红星全民游戏</title>

	<meta name="viewport" content="width=device-width, initial-scale=1,, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes" /><!-- 删除苹果默认的工具栏和菜单栏 -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black" /><!-- 设置苹果工具栏颜色 -->
	<meta name="format-detection" content="telphone=no, email=no" /><!-- 忽略页面中的数字识别为电话，忽略email识别 -->
	<!-- 启用360浏览器的极速模式(webkit) -->
	<meta name="renderer" content="webkit">
	<!-- 避免IE使用兼容模式 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<!-- 针对手持设备优化，主要是针对一些老的不识别viewport的浏览器，比如黑莓 -->
	<meta name="HandheldFriendly" content="true">
	<!-- 微软的老式浏览器 -->
	<meta name="MobileOptimized" content="320">
	<!-- uc强制竖屏 -->
	<meta name="screen-orientation" content="portrait">
	<!-- QQ强制竖屏
	<meta name="x5-orientation" content="portrait">
	-->
	<!-- UC强制全屏 -->
	<meta name="full-screen" content="yes">
	<!-- QQ强制全屏 -->
	<meta name="x5-fullscreen" content="true">
	<!-- UC应用模式 -->
	<meta name="browsermode" content="application">
	<!-- QQ应用模式 -->
	<meta name="x5-page-mode" content="app">
	<!-- windows phone 点击无高光 -->
	<meta name="msapplication-tap-highlight" content="no">
	<!-- 适应移动端end -->
	<meta name="Description" content="兄弟装饰">
	<meta name="Keywords" content="兄弟装饰">


	<script src="http://cq.qq.com/seanwang/js/jquery-1.10.1.min.js"></script>
	<script src="http://cq.qq.com/seanwang/antiJapan/js/loadingr.js"></script>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>



</head>
<body>
<?php echo $content; ?>

<script type="text/javascript">
window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload();
    }
};
</script>

</body>
</html>
