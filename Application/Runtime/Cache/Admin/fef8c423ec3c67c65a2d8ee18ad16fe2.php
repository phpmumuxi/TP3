<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>订单列表</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/admin/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="/Public/admin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/admin/font-awesome/css/font-awesome.min.css">
</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo U('index/index');?>">管理后台</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="nav navbar-nav side-nav">
   <li class="dropup"><a href="<?php echo U('index/index');?>" ><i class="fa fa-dashboard"></i>后台管理</a></li>
   <?php if(is_array($aua)): foreach($aua as $key=>$v): ?><li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-reorder"></i> <?php echo ($v["auth_name"]); ?><b class="caret"></b></a>
		  <ul class="dropdown-menu">
          <?php if(is_array($aub)): foreach($aub as $key=>$vv): if($vv['auth_pid']==$v['auth_id']): ?><li><a href="/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>">【-】<?php echo ($vv["auth_name"]); ?></a></li><?php endif; endforeach; endif; ?>
        </ul>
    </li><?php endforeach; endif; ?>
</ul>
<!--<script src="/Public/admin/js/jquery1.8.3.min.js"></script>
<script type="text/javascript">
 $(".dropup").click(function(){
   $(".dropdown").hide();
 })
</script>-->

            <ul class="nav navbar-nav navbar-right navbar-user">

                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
						  <?php if(!empty($_SESSION['user'])): ?>你好,<?php echo (session('user')); ?>
						  <?php else: ?>你好<?php endif; ?>
						  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-gear"></i> 设置</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('Admin/User/logout');?>"><i class="fa fa-power-off"></i> 退出</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
 <style>
  
  #td div a{;text-decoration:none;padding:5px 10px;border:1px solid #ccc;margin:0px 2px;}
 
  #td div span{padding:5px 10px;border:1px solid #ccc;margin:0px 2px;font-weight:bold;}
 </style>
<nav class="breadcrumb"><i class="fa fa-home"></i>  首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 订单列表 </nav>
<div class="page-container">
<div id="page-wrapper">
   <!--模糊查询功能-->
         
        <div>
            <form action="<?php echo U('Order/search');?>" method="post">
                <div class="form-group input-group">
                    订单号:<input style="width:150px;height:20px" type="text" class="form-control" name="order_number" placeholder="输入订单号">      
                    下单用户:<input style="width:150px;height:20px" type="text" class="form-control" name="order_user" placeholder="输入下单用户">
                    收货人:<input style="width:150px;height:20px" type="text" class="form-control" name="get_name" placeholder="输入收货人姓名">
                    收货地址:<input style="width:150px;height:20px" type="text" class="form-control" name="get_addr" placeholder="输入收货地址"><br/>
                   
                    <br/>  <span class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>   
                </div>
            </form>
        </div>
    </div> 
    <!--用table表输出订单的内容-->
    <table class="table table-hover table-striped" border='1' id="list">  
        <thead>
            <tr style='background-color: #cccccc'>
                
                <td>订单编号</td>
                <td>订单号</td>
                <td>下单用户</td>
                <td>商品信息</td>
                <td>下单时间</td> 
                <td>收货人信息</td>
                <td>当前状态</td> 
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
            <!--遍历数据库信息-->
         <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><tr>
                
                <td><?php echo ($v["order_id"]); ?></td>
                <td><?php echo ($v["order_number"]); ?></td>
                <td><?php echo ($v["order_user"]); ?></td>
               <td>
                   <div style='font-size:8px'>
                       <p>商品名称:撒打算啊速度爱上大叔</p>
                       <p>商品图片:是爱上大叔</p>
                       <p>商品价格:122yuan </p>
                   </div>
               
                <td><?php echo date('Y-m-d H:i:s',$v['order_time']);?> </td>
                <td>
                   <div style='font-size:8px'>
                       <p>姓名:<?php echo ($v["get_name"]); ?></p>
                       <p>电话:<?php echo ($v["get_phone"]); ?></p>
                       <p>地址:<?php echo ($v["get_addr"]); ?></p>
                   </div>
               </td>
                <td>
                    <?php if($v['order_type']==0): ?><p>待发货</p><a href="<?php echo U('Order/save',array('order_id'=>$v['order_id']));?>">点击发货</a>
                    <?php elseif($v['order_type']==1): ?>
                    已发货
                     <?php elseif($v['order_type']==2): ?>
                     待收货
                     <?php else: ?>
                     已收货<?php endif; ?>
                </td>
                
               <td><p><a href="<?php echo U('Order/update',array('order_id'=>$v['order_id']));?>">修改</a></p>
                   <a href="<?php echo U('Order/delete',array('order_id'=>$v['order_id']));?>" style="color:red;" onclick="javascript:return del('您真的确定要删除吗？\n\n删除后将不能恢复!');">删除</a></td><?php endforeach; endif; ?>      
            </tr>           
        </tbody>
        <!--分页的实现-->
        <tr>
             <td  id="td" colspan=9 align="center"><?php echo ($str); ?></td>
        </tr>
    </table>
     
</div>
    <script src="/Public/admin/js/jquery1.8.3.min.js"></script> 
    <script src="/Public/admin/layer/layer.js"></script>
    <script>
//                        $("#tab").on('click',function(){
//                        layer.tab({
//                          area: ['600px', '400px'],
//                          tab: [{
//                            title: '商品信息', 
//                            content: '内容1'
//                          }, {
//                            title: '收货人信息', 
//                            content: '内容2'
//                          }, {
//                            title: 'TAB3', 
//                            content: '内容3'
//                          }]
//                        });
//		});
//		   $(".sp").toggle(function(){
//     $(".d1").show();
//  $(this).parent().parent().parent().next().find(".d1").show();
//  
//    },function(){
//     $(this).parent().parent().parent().next().find(".d1").hide();
//    })
//			//全选
			$(".select").toggle(function () { 
				$(".list :checkbox,#all").find("checked", true).show();   
			}); 
			
			$(".select").click(function () {   
			   $(".list :checkbox,#all").attr("checked", false);   
			});  
			//反选
			$("#reverse").click(function () {  
				$("#list :checkbox").each(function () {   
					$(this).attr("checked", !$(this).attr("checked"));   
				}); 
				allchk(); 
			}); 
		</script>
<!-- JavaScript -->
<script src="/Public/admin/js/jquery-1.10.2.js"></script>
<script src="/Public/admin/js/bootstrap.js"></script>
<script src="/Public/admin/js/app.js"></script>

</body>
</html>