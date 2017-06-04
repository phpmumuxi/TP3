<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>全部订单</title>
        <title>京西商城</title>
	<link rel="stylesheet" href="/thinkroot/Public/home/css/base.css" type="text/css">
	<link rel="stylesheet" href="/thinkroot/Public/home/css/global.css" type="text/css">
	<link rel="stylesheet" href="/thinkroot/Public/home/css/header.css" type="text/css">
	<link rel="stylesheet" href="/thinkroot/Public/home/css/bottomnav.css" type="text/css">
	<link rel="stylesheet" href="/thinkroot/Public/home/css/footer.css" type="text/css">
	<link rel="stylesheet" href="/thinkroot/Public/home/css/order.css" type="text/css">
	<link rel="stylesheet" href="/thinkroot/Public/home/css/home.css" type="text/css">
	
            <style>
  
  #td div a{;text-decoration:none;padding:5px 10px;border:1px solid #ccc;margin:0px 2px;}
 
  #td div span{padding:5px 10px;border:1px solid #ccc;margin:0px 2px;font-weight:bold;}
 </style>

	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script src="/thinkroot/Public/home/js/jquery-1.8.3.min.js"></script>
	<script src="/thinkroot/Public/home/js/header.js"></script>
        <script src="/thinkroot/Public/home/js/home.js"></script>
</head>
<body>
		<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w1210 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li>您好，<?php echo (session('uname')); ?>欢迎来到京西！[<a href="<?php echo U('User/login');?>">登录</a>] [<a href="register.html">免费注册</a>] </li>
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

	<!-- 头部 start -->
	<div class="header w1210 bc mt15">
		<!-- 头部上半部分 start 包括 logo、搜索、用户中心和购物车结算 -->
		<div class="logo w1210">
			<h1 class="fl"><a href="<?php echo U('/Home/Index/index');?>"><image src="/thinkroot/Public/home/images/logo.png" alt="京西商城"></a></h1>
			<!-- 头部搜索 start -->
			<div class="search fl">
				<div class="search_form">
					<div class="form_left fl"></div>
					<form action="" name="serarch" method="get" class="fl">
						<input type="text" class="txt" value="请输入商品关键字" /><input type="submit" class="btn" value="搜索" />
					</form>
					<div class="form_right fl"></div>
				</div>
				
				<div style="clear:both;"></div>

				<div class="hot_search">
					<strong>热门搜索:</strong>
					<a href="">D-Link无线路由</a>
					<a href="">休闲男鞋</a>
					<a href="">TCL空调</a>
					<a href="">耐克篮球鞋</a>
				</div>
			</div>
			<!-- 头部搜索 end -->

			<!-- 用户中心 start-->
			<div class="user fl">
				<dl>
					<dt>
						<em></em>
						<a href="">用户中心</a>
						<b></b>
					</dt>
					<dd>
						<div class="prompt">
							您好，请<a href="">登录</a>
						</div>
						<div class="uclist mt10">
							<ul class="list1 fl">
								<li><a href="">用户信息></a></li>
								<li><a href="">我的订单></a></li>
								<li><a href="">收货地址></a></li>
								<li><a href="">我的收藏></a></li>
							</ul>

							<ul class="fl">
								<li><a href="">我的留言></a></li>
								<li><a href="">我的红包></a></li>
								<li><a href="">我的评论></a></li>
								<li><a href="">资金管理></a></li>
							</ul>

						</div>
						<div style="clear:both;"></div>
						<div class="viewlist mt10">
							<h3>最近浏览的商品：</h3>
							<ul>
								<li><a href=""><image src="/thinkroot/Public/home/images/view_list1.jpg" alt="" /></a></li>
								<li><a href=""><image src="/thinkroot/Public/home/images/view_list2.jpg" alt="" /></a></li>
								<li><a href=""><image src="/thinkroot/Public/home/images/view_list3.jpg" alt="" /></a></li>
							</ul>
						</div>
					</dd>
				</dl>
			</div>
			<!-- 用户中心 end-->

			<!-- 购物车 start -->
			<div class="cart fl">
				<dl>
					<dt>
						<a  href="<?php echo U('Good/cartgood');?>">去购物车结算</a>
						<b></b>
					</dt>
					<dd>
						<div class="prompt">
							购物车中还没有商品，赶紧选购吧！
						</div>
					</dd>
				</dl>
			</div>
			<!-- 购物车 end -->
		</div>
		<!-- 头部上半部分 end -->
		
		<div style="clear:both;"></div>

		<!-- 导航条部分 start -->
		<div class="nav w1210 bc mt10">
			<!--  商品分类部分 start-->
			<div class="category fl cat1"> <!-- 非首页，需要添加cat1类 -->
				<div class="cat_hd">  <!-- 注意，首页在此div上只需要添加cat_hd类，非首页，默认收缩分类时添加上off类，鼠标滑过时展开菜单则将off类换成on类 -->
					<h2>全部商品分类</h2>
					<em></em>
				</div>
				
				<div class="cat_bd none">
					
					<div class="cat item1">
						<h3><a href="">图像、音像、数字商品</a> <b></b></h3>
						<div class="cat_detail">
							<dl class="dl_1st">
								<dt><a href="">电子书</a></dt>
								<dd>
									<a href="">免费</a>
									<a href="">小说</a>
									<a href="">励志与成功</a>
									<a href="">婚恋/两性</a>
									<a href="">文学</a>
									<a href="">经管</a>
									<a href="">畅读VIP</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">数字音乐</a></dt>
								<dd>
									<a href="">通俗流行</a>
									<a href="">古典音乐</a>
									<a href="">摇滚说唱</a>
									<a href="">爵士蓝调</a>
									<a href="">乡村民谣</a>
									<a href="">有声读物</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">音像</a></dt>
								<dd>
									<a href="">音乐</a>
									<a href="">影视</a>
									<a href="">教育音像</a>
									<a href="">游戏</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">文艺</a></dt>
								<dd>
									<a href="">小说</a>
									<a href="">文学</a>
									<a href="">青春文学</a>
									<a href="">传纪</a>
									<a href="">艺术</a>
									<a href="">经管</a>
									<a href="">畅读VIP</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">人文社科</a></dt>
								<dd>
									<a href="">历史</a>
									<a href="">心理学</a>
									<a href="">政治/军事</a>
									<a href="">国学/古籍</a>
									<a href="">哲学/宗教</a>
									<a href="">社会科学</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">经管励志</a></dt>
								<dd>
									<a href="">经济</a>
									<a href="">金融与投资</a>
									<a href="">管理</a>
									<a href="">励志与成功</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">人文社科</a></dt>
								<dd>
									<a href="">历史</a>
									<a href="">心理学</a>
									<a href="">政治/军事</a>
									<a href="">国学/古籍</a>
									<a href="">哲学/宗教</a>
									<a href="">社会科学</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">生活</a></dt>
								<dd>
									<a href="">烹饪/美食</a>
									<a href="">时尚/美妆</a>
									<a href="">家居</a>
									<a href="">娱乐/休闲</a>
									<a href="">动漫/幽默</a>
									<a href="">体育/运动</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">科技</a></dt>
								<dd>
									<a href="">科普</a>
									<a href="">建筑</a>
									<a href="">IT</a>
									<a href="">医学</a>
									<a href="">工业技术</a>
									<a href="">电子/通信</a>
									<a href="">农林</a>
									<a href="">科学与自然</a>
								</dd>
							</dl>

						</div>
					</div>

					<div class="cat">
						<h3><a href="">家用电器</a><b></b></h3>
						<div class="cat_detail">
							<dl class="dl_1st">
								<dt><a href="">大家电</a></dt>
								<dd>
									<a href="">平板电视</a>
									<a href="">空调</a>
									<a href="">冰箱</a>
									<a href="">洗衣机</a>
									<a href="">热水器</a>
									<a href="">DVD</a>
									<a href="">烟机/灶具</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">生活电器</a></dt>
								<dd>
									<a href="">取暖器</a>
									<a href="">加湿器</a>
									<a href="">净化器</a>
									<a href="">饮水机</a>
									<a href="">净水设备</a>
									<a href="">吸尘器</a>
									<a href="">电风扇</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">厨房电器</a></dt>
								<dd>
									<a href="">电饭煲</a>
									<a href="">豆浆机</a>
									<a href="">面包机</a>
									<a href="">咖啡机</a>
									<a href="">微波炉</a>
									<a href="">电磁炉</a>
									<a href="">电水壶</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">个护健康</a></dt>
								<dd>
									<a href="">剃须刀</a>
									<a href="">电吹风</a>
									<a href="">按摩器</a>
									<a href="">足浴盆</a>
									<a href="">血压计</a>
									<a href="">体温计</a>
									<a href="">血糖仪</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">五金家装</a></dt>
								<dd>
									<a href="">灯具</a>
									<a href="">LED灯</a>
									<a href="">水槽</a>
									<a href="">龙头</a>
									<a href="">门铃</a>
									<a href="">电器开关</a>
									<a href="">插座</a>						
								</dd>
							</dl>
						</div>
					</div>

					<div class="cat">
						<h3><a href="">手机、数码</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

					<div class="cat">
						<h3><a href="">电脑、办公</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>
					
					<div class="cat">
						<h3><a href="">家局、家具、家装、厨具</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>
					
					<div class="cat">
						<h3><a href="">服饰鞋帽</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>
					
					<div class="cat">
						<h3><a href="">个护化妆</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>
					
					<div class="cat">
						<h3><a href="">礼品箱包、钟表、珠宝</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

					<div class="cat">
						<h3><a href="">运动健康</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

					<div class="cat">
						<h3><a href="">汽车用品</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>
					
					<div class="cat">
						<h3><a href="">母婴、玩具乐器</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

					<div class="cat">
						<h3><a href="">食品饮料、保健食品</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

					<div class="cat">
						<h3><a href="">彩票、旅行、充值、票务</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

				</div>

			</div>
			<!--  商品分类部分 end--> 

			<div class="navitems fl">
				<ul class="fl">
					<li class="current"><a href="">首页</a></li>
					<li><a href="">电脑频道</a></li>
					<li><a href="">家用电器</a></li>
					<li><a href="">品牌大全</a></li>
					<li><a href="">团购</a></li>
					<li><a href="">积分商城</a></li>
					<li><a href="">夺宝奇兵</a></li>
				</ul>
				<div class="right_corner fl"></div>
			</div>
		</div>
		<!-- 导航条部分 end -->
	</div>	<div style="clear:both;"></div>

	<!-- 页面主体 start -->
	<div class="main w1210 bc mt10">
		<div class="crumb w1210">
			<h2><strong>我的XX </strong><span>> <a href="<?php echo U('Order/index');?>">我的订单</a></span></h2>
		</div>
		
		<!-- 左侧导航菜单 start -->
		<div class="menu fl">
			<h3>我的XX</h3>
			<div class="menu_wrap">
				<dl>
					<dt>订单中心 <b></b></dt>
					<dd class="cur"><b>.</b><a href="<?php echo U('Order/index');?>">我的订单</a></dd>
                                        <dd><b>.</b><a href="<?php echo U('Order/addorder');?>">添加订单</a></dd>
					<dd><b>.</b><a href="">我的关注</a></dd>
					<dd><b>.</b><a href="">浏览历史</a></dd>
					<dd><b>.</b><a href="">我的团购</a></dd>
				</dl>

				<dl>
					<dt>账户中心 <b></b></dt>
					<dd><b>.</b><a href="">账户信息</a></dd>
					<dd><b>.</b><a href="">账户余额</a></dd>
					<dd><b>.</b><a href="">消费记录</a></dd>
					<dd><b>.</b><a href="">我的积分</a></dd>
					<dd><b>.</b><a href="<?php echo U('Order/add_order');?>">收货地址</a></dd>
				</dl>

				<dl>
					<dt>订单中心 <b></b></dt>
					<dd><b>.</b><a href="">返修/退换货</a></dd>
					<dd><b>.</b><a href="">取消订单记录</a></dd>
					<dd><b>.</b><a href="">我的投诉</a></dd>
				</dl>
			</div>
		</div>
		<!-- 左侧导航菜单 end -->

		<!-- 右侧内容区域 start -->
		<div class="content fl ml10">
			<div class="order_hd">
				<h3>我的订单</h3>
				<dl>
					<dt>便利提醒：</dt>
                                        <dd><a href="">待付款</a></dd>
					<dd><a>待发货</a></dd>
					<dd><a>待确认收货</a></dd>
					<dd><a>待评论</a></dd>
					
				</dl>

				<dl>
					<dt>特色服务：</dt>
					<dd><a href="">我的预约</a></dd>
					<dd><a href="">夺宝箱</a></dd>
				</dl>
			</div>

			<div class="order_bd mt10">
				<table class="orders">
                               
					<thead>
						<tr>
							<th width="10%">订单号</th>
							<th width="20%">订单商品</th>
							<th width="10%">收货人</th>
							<th width="10%">订单金额</th>
							<th width="10%">支付状态</th>
							<th width="20%">下单时间</th>
							<th width="10%">订单状态</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
                                            <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><tr>
							<td><a class="tab"><?php echo ($v["order_id"]); ?></a></td>
							<td><a href=""><img  src="/thinkroot/<?php echo ($v["good_thumb"]); ?>" alt="" /></a>  <strong><a href=""><?php echo ($v["good_name"]); ?></a></strong></td>
							<td><?php echo ($v["get_name"]); ?></td>
							<td><?php echo ($v["sprice"]); ?></td>
                                                        <td>
                                                            <?php if($v['pay_status']==0): ?><p>待付款</p><a href="<?php echo U('Order/pay',array('order_id'=>$v['order_id']));?>">去付款</a>
                                                                <?php else: ?>
                                                                已付款<?php endif; ?>
                                                        </td>
							<td><?php echo date('Y-m-d H:i:s',$v['order_time']);?> </td>
							<td>
                                                        <?php if($v['order_type']==0): ?>等待卖家发货
                                                        <?php elseif($v['order_type']==1): ?>
                                                        <p>卖家已发货</p><a href="<?php echo U('Order/save',array('order_id'=>$v['order_id']));?>">确认收货</a>
                                                         <?php elseif($v['order_type']==2): ?>
                                                         <p>已收货<p><a href="<?php echo U('Comment/index',array('order_id'=>$v['order_id'],'good_id'=>$v['good_id']));?>">请写评论</a>
                                                         <?php else: ?>
                                                         已评价<a>点击查看评论</a><?php endif; ?>
                                                    </td>
							<td><a href="<?php echo U('Order/order_info',array('order_id'=>$v['order_id']));?>">查看</a> | 
                                                            <a href="<?php echo U('Order/delete',array('order_id'=>$v['order_id']));?>">删除</a></td>
						</tr>
						
					</tbody><?php endforeach; endif; ?>
                                            <tr>
             <td  id="td" colspan=8 align="center"><?php echo ($str); ?></td>
        </tr>
	</table>
     <script src="/thinkroot/Public/admin/js/jquery1.8.3.min.js"></script> 
    <script src="/thinkroot/Public/admin/layer/layer.js"></script>
    <script>               
            $(".tab").on('click',function(){
                        layer.tab({
                          area: ['600px', '400px'],
                          tab: [{
                            title: '商品信息', 
                            content:"<?php echo U('Order/order_info',array('order_id'=>$v['order_id']));?>"
                          }, {
                            title: '收货人信息', 
                            content: '内容2'
                          }],
                        });
                        });
		
</script>
			</div>
		</div>
		<!-- 右侧内容区域 end -->
	</div>
	<!-- 页面主体 end-->

	

	<!-- 底部导航 start -->
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
</body>
</html>