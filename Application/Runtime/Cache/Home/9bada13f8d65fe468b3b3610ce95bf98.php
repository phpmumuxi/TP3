<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($title); ?></title>
	<link rel="stylesheet" href="__STATIC__/css/style.css">
	<script type="text/javascript" src="__STATIC__/js/init.js"></script>
</head>
<body>


<!DOCTYPE html>
<!-- saved from url=(0098)https://club.jd.com/myJdcomments/orderVoucher.action?ruleid=44444442677&ot=0&payid=1&shipmentid=70 -->
<html class="root61"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="utf-8">
<title>我的京东-我的评价</title>
<link type="text/css" rel="stylesheet" href="/thinkroot/Public/home/jd/saved_resource">
<script type="text/javascript">window.pageConfig={compatible:true};</script>
<script type="text/javascript" src="/thinkroot/Public/home/jd/saved_resource(1)"></script>
<link type="text/css" rel="stylesheet" href="/thinkroot/Public/home/jd/saved_resource(2)" source="widget">
<link rel="icon" href="https://www.jd.com/favicon.ico" mce_href="//www.jd.com/favicon.ico" type="image/x-icon">

<script type="text/javascript" async="" src="/thinkroot/Public/home/jd/loadFa.js"></script></head>
<body>


<!-- globalShortcut begin-->
<!--shortcut end-->

<!--  /widget/nav/nav.tpl -->
<!--/ /widget/nav/nav.tpl -->

<!-- main -->
<div id="container">
	<div class="w">
		<div class="mycomment-detail">
			<div class="detail-hd" id="o-info-orderinfo" oid="44444442677" payid="1" ot="0" shipmentid="70" venderid="32+ro+cdrp0=">
				<div class="orderinfo">
					<h3 class="o-title">评价订单</h3>
					<div class="o-info">
						<span class="mr20">订单号：<a href="" target="_blank" class="gray1">2016130<?php echo ($order_id); ?></a></span>
						<span>2016-11-11 14:32:42</span>
					</div>
				</div>
				
			</div>
			<div class="mycomment-form">
				
<!-- page -->

		
		<div id="installVoucher" style="display:none" class="f-item f-service">
			<div class="fi-info">
			<div class="comment-service cs-others">
				<div class="s-img">
					<span class="i-install"></span>
				</div>
				<div class="s-main">
										<div class="s-info">请对安装服务打分吧~</div>
				</div>
			</div>			
			</div>
			<div class="fi-operate  ">
				<div class="commstar-wrap">
					<div class="commstar-group ">
						<div class="item">
							<span class="label">安装服务态度</span>
							<span class="commstar z-star-checked">
								<span class="star star1" ><i class="face"></i></span>
								<span class="star star2"><i class="face"></i></span>
								<span class="star star3"><i class="face"></i></span>
								<span class="star star4"><i class="face"></i></span>
								<span class="star star5"><i class="face"></i></span>
								<span class="star-info">0分</span>
							</span>								
						</div>
						
						<div class="item">
							<span class="label">安装服务及时性</span>
							<span class="commstar z-star-checked">
								<span class="star star1"><i class="face"></i></span>
								<span class="star star2"><i class="face"></i></span>
								<span class="star star3"><i class="face"></i></span>
								<span class="star star4"><i class="face"></i></span>
								<span class="star star5"><i class="face"></i></span>
								<span class="star-info">0分</span>
							</span>								
						</div>
						
						<div class="item">
							<span class="label">出示收费标准</span>
							<span class="commstar z-star-checked">
								<span class="star star1"><i class="face"></i></span>
								<span class="star star2"><i class="face"></i></span>
								<span class="star star3"><i class="face"></i></span>
								<span class="star star4"><i class="face"></i></span>
								<span class="star star5"><i class="face"></i></span>
								<span class="star-info">0分</span>
							</span>								
						</div>
					</div>				
				</div>
			</div>
		</div>
		
		<div class="f-cutline"></div>
		<div class="f-item f-goods product-1057746" voucherstatus="0" catefi="9987" catese="653" cateth="655">
			<div class="fi-info">
                            <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><div class="comment-goods">
					<div class="p-img"><a clstag="pageclick|keycount|fabupingjia_201608055|2" href="" target="_blank"><img src="/thinkroot/<?php echo ($v["good_thumb"]); ?>" alt=""></a></div>
					<div class="p-name"><a clstag="pageclick|keycount|fabupingjia_201608055|3" href="" target="_blank"><?php echo ($v["good_descript"]); ?></a></div>
					<div class="p-price"><strong><?php echo ($v["good_price"]); ?></strong></div>
					<div class="p-attr"><?php echo ($v["good_name"]); ?></div>
				</div><?php endforeach; endif; ?>
			</div>
			<div class="fi-operate">
                            <?php if(is_array($res)): foreach($res as $key=>$vo): ?><div class="fop-item fop-star   z-tip-warn">
					<div class="fop-label">商品满意度</div>
					<form action="<?php echo U('Comment/add');?>" method="post">
					<div class="fop-main" name="start">	
						<input type="radio" name="start" value="5" checked>&nbsp<img src="/thinkroot/Public/home/image/5.png" style="position:relative;top:-5px;" >
						<input type="radio" name="start" value="4">&nbsp<img src="/thinkroot/Public/home/image/4.png"style="position:relative;top:-5px;">
						<input type="radio" name="start" value="3">&nbsp<img src="/thinkroot/Public/home/image/3.png"style="position:relative;top:-5px;">
						<input type="radio" name="start" value="2">&nbsp<img src="/thinkroot/Public/home/image/2.png"style="position:relative;top:-5px;">
						<input type="radio" name="start" value="1">&nbsp<img src="/thinkroot/Public/home/image/1.png"style="position:relative;top:-5px;">
						
					</div>
					<div class="fop-tip"><i class="tip-icon"></i><em class="tip-text"></em></div>
				<div class="fi-tip"><i class="tip-icon"></i><em class="tip-text">请至少填写一件商品的评价</em></div></div><div class="fop-item J-mjyx">    <div class="fop-label">买家印象</div>    <div class="fop-main">        <div class="m-tagbox m-multi-tag" style="position:relative;top:10px;">
				<input type="checkbox" name="imp[]" value="high" style="border:0px;"><span style="font-size:20px;color:red;">高品质</span>
				<input type="checkbox" name="imp[]" value="old" style="border:0px;"><span style="font-size:20px;color:red;">系统流畅</span>
			   <input type="checkbox" name="imp[]" value="pretty" style="border:0px;"><span style="font-size:20px;color:red;">外观漂亮</span>
				<input type="checkbox" name="imp]" value="black" style="border:0px;"><span style="font-size:20px;color:red;">黑科技</span>
				<input type="checkbox" name="imp[]" value="nor" style="border:0px;"><span style="font-size:20px;color:red;">比较一般</span>
				</div>        
				</div>     
				</div> 
				<div class="fop-tip"><i class="tip-icon"></i><em class="tip-text"></em></div></div>
				
		      <input type="hidden" name="good_id" value="<?php echo ($vo["good_id"]); ?>">
			  <input type="hidden" name="uid" value="<?php echo ($vo["uid"]); ?>">
				<div class="fop-item ">
					<div class="fop-label">评价晒单</div>
					<div class="fop-main">
						<div class="f-textarea">
							<textarea name="content" id="con" placeholder="大小合适么？用的习惯么？质量如何？快写下你的评价，分享给大家吧！"></textarea>
							<div class="textarea-ext"><em class="textarea-num"><b>0</b> / 500</em><span class="tips">（评价多于<span class="ftc1">10</span>个字,有机会奖励京豆哦~）</span></div>
						</div>
						<div class="m-imgshow f-imgshow">
							<div class="thumbnail-list" id="container_image-upload-1057746" style="position: relative;">
								<span id="image-upload-1057746" class="btn-upload" style="position: relative; z-index: 0;"></span>
								<span class="upload-num">共<em>0</em>张,还能上传<em>10</em>张</span>
							<div id="p1b25g7eg41pch1hreimq1v49kv20_html5_container" class="plupload html5" style="position: absolute; width: 50px; height: 50px; overflow: hidden; z-index: -1; opacity: 0; top: 0px; left: 0px; background: transparent;"><input id="p1b25g7eg41pch1hreimq1v49kv20_html5" style="font-size: 999px; position: absolute; width: 100%; height: 100%;" type="file" accept="image/jpeg,image/gif,image/png,image/bmp" multiple="multiple"></div></div>
							<div class="bigimg-switch hide">
								
								<div class="switch-inner">
									<img src="" alt="" class="bigimg">
									<div class="cursor-small"></div>
									<div class="cursor-prev"></div>
									<div class="cursor-next"></div>
								</div>

							</div>
						</div>		
					</div>
					<div class="fop-tip"><i class="tip-icon"></i><em class="tip-text"></em></div>
                     
				</div>
				
			</div>

		</div>
	</div>
<!-- page -->
		       <div class="f-btnbox floatbar-submit" style="position:relative;left:800px;top:-70px;">
					<input type="submit" name="sub" value="提交评价" id="sub" style="background:red;width:100px;height:40px;color:white;">&nbsp
					<span class="f-checkbox">
					<input id="check1" class="i-check" type="checkbox" checked="checked">
					<label for="check1">匿名评价</label>
					</span>&nbsp
					<span><input type="text" name="time" value="<?php echo (date('Y-m-d g:i a',time())); ?>" style="border:0px;"></span>
				</div>	
		</div>
</form><?php endforeach; endif; ?>
		
</div>
</div>
</div>
<!-- globalService begin-->
<!-- globalFooter end-->

<!-- /js 位置 -->
<script type="text/javascript" src="/thinkroot/Public/home/jd/saved_resource(3)"></script>

<script type="text/javascript">
	seajs.use('//misc.360buyimg.com/user/myjd/comment/1.0.0/js/comment.js')
     
</script>

<!-- globalAnalysis begin-->
<script type="text/javascript" src="/thinkroot/Public/home/jd/wl.js"></script><!-- globalAnalysis end-->
<div id="service-2014">
	<div class="slogen">
		<span class="item fore1">
			<i></i><b>多</b>品类齐全，轻松购物
		</span>
		<span class="item fore2">
			<i></i><b>快</b>多仓直发，极速配送
		</span>
		<span class="item fore3">
			<i></i><b>好</b>正品行货，精致服务
		</span>
		<span class="item fore4">
			<i></i><b>省</b>天天低价，畅选无忧
		</span>
	</div>
	<div class="w">
		<dl class="fore1">
			<dt>购物指南</dt>
			<dd>
				<div><a rel="nofollow" target="_blank" href="">购物流程</a></div>
				<div><a rel="nofollow" target="_blank" href="">会员介绍</a></div>
				<div><a rel="nofollow" target="_blank" href="">生活旅行/团购</a></div>
				<div><a rel="nofollow" target="_blank" href="">常见问题</a></div>
				<div><a rel="nofollow" target="_blank" href="">大家电</a></div>
				<div><a rel="nofollow" target="_blank" href="">联系客服</a></div>
			</dd>
		</dl>
		<dl class="fore2">		
			<dt>配送方式</dt>
			<dd>
				<div><a rel="nofollow" target="_blank" href="">上门自提</a></div>
				<div><a rel="nofollow" target="_blank" href="">211限时达</a></div>
				<div><a rel="nofollow" target="_blank" href="">配送服务查询</a></div>
				<div><a rel="nofollow" target="_blank" href="">配送费收取标准</a></div>				
				<div><a target="_blank" href="">海外配送</a></div>
			</dd>
		</dl>
		<dl class="fore3">
			<dt>支付方式</dt>
			<dd>
				<div><a rel="nofollow" target="_blank" href="">货到付款</a></div>
				<div><a rel="nofollow" target="_blank" href="">在线支付</a></div>
				<div><a rel="nofollow" target="_blank" href="">分期付款</a></div>
				<div><a rel="nofollow" target="_blank" href="">邮局汇款</a></div>
				<div><a rel="nofollow" target="_blank" href="">公司转账</a></div>
			</dd>
		</dl>
		<dl class="fore4">		
			<dt>售后服务</dt>
			<dd>
				<div><a rel="nofollow" target="_blank" href="">售后政策</a></div>
				<div><a rel="nofollow" target="_blank" href="">价格保护</a></div>
				<div><a rel="nofollow" target="_blank" href="">退款说明</a></div>
				<div><a rel="nofollow" target="_blank" href="">返修/退换货</a></div>
				<div><a rel="nofollow" target="_blank" href="">取消订单</a></div>
			</dd>
		</dl>
		<dl class="fore5">
			<dt>特色服务</dt>
			<dd>		
				<div><a target="_blank" href="https://help.jd.com/user/issue/list-133.html">夺宝岛</a></div>
				<div><a target="_blank" href="https://help.jd.com/user/issue/list-134.html">DIY装机</a></div>
				<div><a rel="nofollow" target="_blank" href="https://fuwu.jd.com/">延保服务</a></div>
				<div><a rel="nofollow" target="_blank" href="https://o.jd.com/market/index.action">京东E卡</a></div>				
				<div><a rel="nofollow" target="_blank" href="https://mobile.jd.com/">京东通信</a></div>
				<div><a rel="nofollow" target="_blank" href="https://s.jd.com/">京东JD+</a></div>
			</dd>
		</dl>
		<span class="clr"></span>
	</div>
</div><!-- globalService end-->


<!-- globalFooter begin-->
<div class="w">
	<div id="footer-2014">
		<div class="links"><a rel="nofollow" target="_blank" href="https://www.jd.com/intro/about.aspx">关于我们</a>|<a rel="nofollow" target="_blank" href="https://www.jd.com/contact/">联系我们</a>|<a rel="nofollow" target="_blank" href="https://www.jd.com/contact/joinin.aspx">商家入驻</a>|<a rel="nofollow" target="_blank" href="https://jzt.jd.com/">营销中心</a>|<a rel="nofollow" target="_blank" href="https://app.jd.com/">手机京东</a>|<a target="_blank" href="https://club.jd.com/links.aspx">友情链接</a>|<a target="_blank" href="https://media.jd.com/">销售联盟</a>|<a href="https://club.jd.com/" target="_blank">京东社区</a>|<a href="https://sale.jd.com/act/FTrWPesiDhXt5M6.html" target="_blank">风险监测</a>|<a href="https://gongyi.jd.com/" target="_blank">京东公益</a>|<a href="https://en.jd.com/" target="_blank">English Site</a>|<a href="https://en.jd.com/help/question-58.html" target="_blank">Contact Us</a></div>
		<div class="copyright"><a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11000002000088"><img src="/thinkroot/Public/home/jd/56a0a994Nf1b662dc.png"> 京公网安备 11000002000088号</a>&nbsp;&nbsp;|&nbsp;&nbsp;京ICP证070359号&nbsp;&nbsp;|&nbsp;&nbsp;<a target="_blank" href="https://img14.360buyimg.com/da/jfs/t256/349/769670066/270505/3b03e0bb/53f16c24N7c04d9e9.jpg">互联网药品信息服务资格证编号(京)-经营性-2014-0008</a>&nbsp;&nbsp;|&nbsp;&nbsp;新出发京零&nbsp;字第大120007号<br>互联网出版许可证编号新出网证(京)字150号&nbsp;&nbsp;|&nbsp;&nbsp;<a rel="nofollow" href="https://img30.360buyimg.com/uba/jfs/t1036/328/1487467280/1405104/ea57ab94/5732f60aN53b01d06.jpg" target="_blank">出版物经营许可证</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://misc.360buyimg.com/wz/wlwhjyxkz.jpg" target="_blank">网络文化经营许可证京网文[2014]2148-348号</a>&nbsp;&nbsp;|&nbsp;&nbsp;违法和不良信息举报电话：4006561155<br>Copyright&nbsp;&#169;&nbsp;2004-2016&nbsp;&nbsp;京东JD.com&nbsp;版权所有&nbsp;&nbsp;|&nbsp;&nbsp;消费者维权热线：4006067733<br>京东旗下网站：<a href="https://www.jdpay.com/" target="_blank">京东钱包</a>
		</div>		
		<div class="authentication">
			<a rel="nofollow" target="_blank" href="http://www.hd315.gov.cn/beian/view.asp?bianhao=010202007080200026">
				<img width="103" height="32" alt="经营性网站备案中心" src="/thinkroot/Public/home/jd/54b8871eNa9a7067e.png" class="err-product">
			</a>
			<script type="text/JavaScript">function CNNIC_change(eleId){var str= document.getElementById(eleId).href;var str1 =str.substring(0,(str.length-6));str1+=CNNIC_RndNum(6); document.getElementById(eleId).href=str1;}function CNNIC_RndNum(k){var rnd=""; for (var i=0;i < k;i++) rnd+=Math.floor(Math.random()*10); return rnd;}</script>
			<a rel="nofollow" target="_blank" id="urlknet" tabindex="-1" href="https://ss.knet.cn/verifyseal.dll?sn=2008070300100000031&ct=df&pa=294005">
				<img border="true" width="103" height="32" onclick="CNNIC_change(&#39;urlknet&#39;)" oncontextmenu="return false;" name="CNNIC_seal" alt="可信网站" src="/thinkroot/Public/home/jd/54b8872dNe37a9860.png" class="err-product">
			</a>
			<a rel="nofollow" target="_blank" href="http://www.bj.cyberpolice.cn/index.do">
				<img width="103" height="32" alt="网络警察" src="/thinkroot/Public/home/jd/56a89b8fNfbaade9a.jpg" class="err-product">
			</a>
			<a rel="nofollow" target="_blank" href="https://search.szfw.org/cert/l/CX20120111001803001836">
				<img width="103" height="32" src="/thinkroot/Public/home/jd/54b8875fNad1e0c4c.png" class="err-product">
			</a>
			<a target="_blank" href="http://www.12377.cn/"><img width="103" height="32" src="/thinkroot/Public/home/jd/5698dc03N23f2e3b8.jpg"></a>
			<a target="_blank" href="http://www.12377.cn/node_548446.htm"><img width="103" height="32" src="/thinkroot/Public/home/jd/5698dc16Nb2ab99df.jpg"></a>
		</div>
	</div>
</div>

</body>