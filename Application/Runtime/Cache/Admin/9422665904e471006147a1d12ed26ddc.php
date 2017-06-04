<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>评论列表</title>

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
    .pages a,.pages span {
    display:inline-block;
    padding:2px 5px;
    margin:0 1px;
    border:1px solid #f0f0f0;
    -webkit-border-radius:3px;
    -moz-border-radius:3px;
    border-radius:3px;
}
.pages a,.pages li {
    display:inline-block;
    list-style: none;
    text-decoration:none; color:#58A0D3;
}
.pages a.first,.pages a.prev,.pages a.next,.pages a.end{
    margin:0;
}
.pages a:hover{
    border-color:#50A8E6;
}
.pages span.current{
    background:#50A8E6;
    color:#FFF;
    font-weight:700;
    border-color:#50A8E6;
}
</style>
<nav class="breadcrumb"><i class="fa fa-home"></i>  首页 <span class="c-gray en">&gt;</span> 评论管理 <span class="c-gray en">&gt;</span> 评论列表 </nav>
<div id="page-wrapper">
    
    <div class="row">
        <div class="col-md-6">
            <a href="" class="btn btn-success">评论列表</a>
        </div>
        <div class="col-md-6">
            <form action="<?php echo U('Comment/search');?>" method="post">
                <div class="form-group input-group">
                    <input type="text" class="form-control" name="key" placeholder="输入商品ID或者评论内容搜索">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>编号</th>
                <th>商品信息</th>
                <th>用户信息</th>
                <th>评论内容</th>
				<th>回复内容</th>
		        <th>评论时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><tr>
                <td><?php echo ($v["cid"]); ?></td>
                <td><?php echo ($v["good_name"]); ?></td>
                <td><a href="javascript:;" class="member_show"><?php echo ($v["uname"]); ?></a></td>
                <td><?php echo ($v["content"]); ?></td>
		<td><?php echo ($v["rcontent"]); ?></td>
                <td><?php echo ($v["time"]); ?></td>
                <td><a href="#none"><span class="sp">回复</span></a> | <a href="<?php echo U('Comment/delete',array('cid'=>$v['cid']));?>" style="color:red;" onclick="javascript:return del('您真的确定要删除吗？\n\n删除后将不能恢复!');">删除</a>
                </td>
            </tr>
            <tr>
                <td colspan='7'>
                    <div style='height:100px;text-align: center;display:none;' class='d1'>
                        <form action="<?php echo U('Comment/rcontent');?>" method="post">
                            <input type='hidden'name='cid'value='<?php echo ($v["cid"]); ?>'>
                            <textarea name='rcontent' style="resize:none;width:700px"></textarea><br/>
                           <input type='submit'name='sub'style='background:#E4393C;width:80px;height:38px;position:relative;left:280px;top:10px;color:white'>
                           <input type="text" name="time" value="<?php echo (date('Y-m-d g:i a',time())); ?>"style="position:relative;left:290px;top:15px;border:0px">
                        </form>
                    </div>
                </td>
            </tr><?php endforeach; endif; ?>
          <tr>
              <td colspan="6" bgcolor="#FFFFFF" style="text-align:center;"><div class="pages">
                        <?php echo ($str); ?>
                </div></td>  
            </tr>
        </tbody>
    </table>
  
</div>

<script type='text/javascript' src="/Public/admin/js/jquery1.8.3.min.js"></script>

<script type="text/javascript" src="/Public/admin/js/show.js"></script>
<script type='text/javascript' src="/Public/admin/layer/layer.js"></script>

<script type="text/javascript">
  $(".member_show").click(function(){
	var num = $(this).html();
		layer.open({
		type: 2,
		title: '用户信息',
		maxmin: true,
		shadeClose: true, //点击遮罩关闭层
		area : ['300px' , '400px'],
		content: "http://localhost/thinkroot/index.php?m=Admin&c=Comment&a=member_info&uname="+num
	});
  })
</script>
<!-- JavaScript -->
<script src="/Public/admin/js/jquery-1.10.2.js"></script>
<script src="/Public/admin/js/bootstrap.js"></script>
<script src="/Public/admin/js/app.js"></script>

</body>
</html>