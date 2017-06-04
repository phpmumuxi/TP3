<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>购物车页面</title>
	<link rel="stylesheet" href="/Public/home/css/base.css" type="text/css">
	<link rel="stylesheet" href="/Public/home/css/global.css" type="text/css">
	<link rel="stylesheet" href="/Public/home/css/header.css" type="text/css">
	<link rel="stylesheet" href="/Public/home/css/cart.css" type="text/css">
	<link rel="stylesheet" href="/Public/home/css/footer.css" type="text/css">

	<script type="text/javascript" src="/Public/home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/Public/home/js/cart1.js"></script>

</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w990 bc">
			<div class="topnav_left">

			</div>
			<div class="topnav_right fr">
				<ul>
					<li>您好，欢迎来到京东！[<a href="login.html">登录</a>] [<a href="register.html">免费注册</a>] </li>
					<li class="line">|</li>
					<li>我的订单</li>
					<li class="line">|</li>
					<li>客户服务</li>

				</ul>
			</div>
		</div>
	</div>
	<!-- 顶部导航 end -->

	<div style="clear:both;"></div>

	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="/Public/home/images/logo.png" alt="京西商城"></a></h2>
			<div class="flow fr">
				<ul>
					<li class="cur">1.我的购物车</li>
					<li>2.填写核对订单信息</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 页面头部 end -->

	<div style="clear:both;"></div>

	<!-- 主体部分 start -->
	<div class="mycart w990 mt10 bc">
		<h2><span>我的购物车</span></h2>
                <form action="<?php echo U('Order/addorder');?>" method="post"  enctype="multipart/form-data">
                
		<table>
			<thead>
				<tr>
					<th class="col1">商品名称</th>
					<th class="col2">商品信息</th>
					<th class="col3">单价</th>
					<th class="col4">数量</th>
					<th class="col5">小计</th>
					<th class="col6">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
					<td class="col1"><a href=""><img src="/<?php echo ($v["good_thumb"]); ?>" alt="" /></a>  <strong><a href=""><?php echo ($v["good_name"]); ?></a></strong></td>
					<td class="col2"> <?php echo ($v["good_descript"]); ?> </td>
					<td class="col3">￥<span><?php echo ($v["good_price"]); ?></span></td>
					<td class="col4">
						<a href="javascript:;" class="reduce_num"></a>
						<input type="text" name="amount" value="1" class="amount"/>
						<a href="javascript:;" class="add_num"></a>
					</td>
					<td class="col5">￥<span><?php echo ($v["good_price"]); ?></span></td>
					<td class="col6"><a href="<?php echo U('Good/delgood',array('good_id'=>$v['good_id']));?>">删除</a></td>
				</tr><?php endforeach; endif; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="6">购物金额总计： <strong>￥ <span id="total"></span></strong></td>
				</tr>
			</tfoot>
		</table>
		<div class="cart_btn w990 bc mt10">
			<a href="<?php echo U('Index/index');?>" class="continue">继续购物</a>
                        <input type="hidden" name="good_price" value="<?php echo ($v["good_price"]); ?>"/>
                        <input class="checkout" type="submit" name="submit" value="结算"/>
			
		</div>
                </from>
	</div>
	<!-- 主体部分 end -->

	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt15">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">商家入驻</a> |
			<a href="">千寻网</a> |
			<a href="">奢侈品网</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> |
			<a href="">销售联盟</a> |
			<a href="">京西论坛</a>
		</p>
		<p class="copyright">
			 © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号
		</p>
		<p class="auth">
			<a href=""><img src="/Public/home/images/xin.png" alt="" /></a>
			<a href=""><img src="/Public/home//kexin.jpg" alt="" /></a>
			<a href=""><img src="/Public/home/images/police.jpg" alt="" /></a>
			<a href=""><img src="/Public/home/images/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->
</body>
</html>