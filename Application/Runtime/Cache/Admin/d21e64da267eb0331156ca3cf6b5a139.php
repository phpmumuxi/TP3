<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>分类列表</title>

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
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#66cc99" style="margin-bottom:8px;margin-top:8px;">
    <tr>
        <td background="/Public/Admin/images/wbg.gif" bgcolor="#EEF4EA" class="title" colspan="2">
            <span><img src="/Public/Admin/images/arr3.gif" style="margin-right:10px;">网站配置列表</span>
        </td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td>
            <table width="50%" border="1" cellpadding="2" cellspacing="1" bgcolor="#CFCFCF" align="center" style="margin-top:8px">
                <tr align="center" bgcolor="#FBFCE2" height="25">
                    <td width="10%">配置编号</td>
                    <td width="10%">配置名称</td>
                    <td width="10%">配置标题</td>
                    <td width="10%">配置类型</td>
                    <td colspan="2">操作</td>
                </tr>
                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr align="center" bgcolor="#FFFFFF" height="26" align="center" onMouseMove="javascript:this.bgColor = '#FCFDEE';" onMouseOut="javascript:this.bgColor = '#FFFFFF';">
                    <td><?php echo ($vo["ts_id"]); ?></td>
                    <td><?php echo ($vo["ts_name"]); ?></td>
                    <td><?php echo ($vo["ts_title"]); ?></td>
                    <td><?php echo ($vo["ts_type"]); ?></td>
                    <td><a href="<?php echo U('System/upd',array('ts_id'=>$vo['ts_id']));?>">修改</a></td>
                    <td><a href="<?php echo U('System/del',array('ts_id'=>$vo['ts_id']));?>">删除</a></td>
                </tr><?php endforeach; endif; ?>	
            </table>
        </td>
    </tr>
</table>
<!-- JavaScript -->
<script src="/Public/admin/js/jquery-1.10.2.js"></script>
<script src="/Public/admin/js/bootstrap.js"></script>
<script src="/Public/admin/js/app.js"></script>

</body>
</html>