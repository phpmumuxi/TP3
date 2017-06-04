<?php if (!defined('THINK_PATH')) exit();?><title>订单提交成功</title>
<script src="/thinkroot/Public/admin/js/jquery1.8.3.min.js"></script> 
<script type="text/javascript" src="/thinkroot/Public/Home/js/cart2.js"></script>
<script type="text/javascript" src="/thinkroot/Public/Home/js/cart2.js"></script>
<link rel="stylesheet" href="/thinkroot/Public/Home/style/fillin.css" type="text/css">
<link rel="stylesheet" href="/thinkroot/Public/home/style/base.css" >
<link rel="stylesheet" href="/thinkroot/Public/home/style/global.css" >
<link rel="stylesheet" href="/thinkroot/Public/home/style/header.css" >
<link rel="stylesheet" href="/thinkroot/Public/home/style/home.css" >
<link rel="stylesheet" href="/thinkroot/Public/home/css/cart.css" type="text/css">
<link rel="stylesheet" href="/thinkroot/Public/home/style/order.css" >
<link rel="stylesheet" href="/thinkroot/Public/home/style/bottomnav.css" >
<link rel="stylesheet" href="/thinkroot/Public/home/style/footer.css" >
<link rel="stylesheet" href="/thinkroot/Public/home/css/base.css" type="text/css">
<link rel="stylesheet" href="/thinkroot/Public/home/css/global.css" type="text/css">
<link rel="stylesheet" href="/thinkroot/Public/home/css/header.css" type="text/css">
<link rel="stylesheet" href="/thinkroot/Public/home/css/cart.css" type="text/css">
<link rel="stylesheet" href="/thinkroot/Public/home/css/success.css" type="text/css">

	<script type="text/javascript" src="/thinkroot/Public/home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/thinkroot/Public/home/js/cart1.js"></script>
<div class="topnav">
		<div class="topnav_bd w1210 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li>您好，欢迎来到京西！</li>
					<li class="line">|</li>
					<li>我的订单</li>
					<li class="line">|</li>
					<li>客户服务</li>

				</ul>
			</div>
		</div>
	</div>
	
	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="/thinkroot/Public/Home/images/logo.png" alt="京西商城"></a></h2>
			<div class="flow fr flow3">
				<ul>
					<li>1.我的购物车</li>
					<li>2.填写核对订单信息</li>
					<li class="cur">3.成功提交订单</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 页面头部 end -->
	
	<style>
		#alipaysubmit{margin:10px auto;width:150px;}
		#alipaysubmit input{cursor:pointer;padding:5px;background:#F00;color:#FFF;font-weight:bold;font-size:20px;border:0;}
	</style>
	
	<div style="clear:both;"></div>

	<!-- 主体部分 start -->
	<div class="success w990 bc mt15">
		<div class="success_hd">
			<h2>订单提交成功</h2>
		</div>
		<div class="success_bd">
			<p><span></span>订单提交成功，我们将及时为您处理</p>
			<p><?php echo $btn; ?></p>
			<p class="message">完成支付后，你可以 <a href="<?php echo U('Order/index');?>">查看订单状态</a>  <a href="<?php echo U('Index/index');?>">继续购物</a> <a href="">问题反馈</a></p>
		</div>
	</div>
	<!-- 主体部分 end -->
</body>

<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'onMenuShareQZone'
    ]
  });
  wx.ready(function () {
    // 在这里调用 API
        //获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            link:  window.location.href, // 分享链接
            imgUrl: '<?php echo $signPackage["logo"];?>', // 分享图标
        });
        //获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            desc: 'ThinkAdmin通用后台管理系统,博客：http://www.cnsecer.com', // 分享描述
            link:  window.location.href, // 分享链接
            imgUrl: '<?php echo $signPackage["logo"];?>', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        });
        //获取“分享到QQ”按钮点击状态及自定义分享内容接口
        wx.onMenuShareQQ({
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            desc: 'ThinkAdmin通用后台管理系统,博客：http://www.cnsecer.com', // 分享描述
            link:  window.location.href, // 分享链接
            imgUrl: '<?php echo $signPackage["logo"];?>', // 分享图标
        });
        //获取“分享到腾讯微博”按钮点击状态及自定义分享内容接口
        wx.onMenuShareWeibo({
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            desc: 'ThinkAdmin通用后台管理系统,博客：http://www.cnsecer.com', // 分享描述
            link:  window.location.href, // 分享链接
            imgUrl: '<?php echo $signPackage["logo"];?>', // 分享图标
    
        });
        //获取“分享到QQ空间”按钮点击状态及自定义分享内容接口
        wx.onMenuShareQZone({
            title: 'ThinkAdmin分享标题', // ThinkAdmin分享标题
            desc: 'ThinkAdmin通用后台管理系统,博客：http://www.cnsecer.com', // 分享描述
            link:  window.location.href, // 分享链接
            imgUrl: '<?php echo $signPackage["logo"];?>', // 分享图标
        });
  });
</script>


</html>