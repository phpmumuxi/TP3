<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>类型列表</title>

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
            .div_head{height:23px;width:97%;background:lightblue;margin-left:20px;}

        </style>
        <div class="div_head" style="font-size:16px;margin-top:70px;">
                <span class="span1" style="float:left;">当前位置是：<?php echo ($bread['first']); ?>-》<?php echo ($bread['second']); ?></span>
                <span style="float:right;margin-right:20px;font-weight:bold;">
                    <a style="text-decoration:none;" href="<?php echo ($bread['third'][1]); ?>">【<?php echo ($bread['third'][0]); ?>】</a>
                </span>
            <div style="clear:both"></div>
        </div>
<div style="margin:12px 20px;">
<p>按商品类型显示：<select id="sel" onchange="selchange()">
   <?php if(is_array($info)): foreach($info as $key=>$vv): if(($infos[0]['type_id']) == $vv['type_id']): ?><option value="<?php echo ($vv["type_id"]); ?>" selected><?php echo ($vv["type_name"]); ?></option>
	<?php else: ?>
	  <option value="<?php echo ($vv["type_id"]); ?>"><?php echo ($vv["type_name"]); ?></option><?php endif; endforeach; endif; ?>
</select></p>
    <table class="tables" border="1" width="100%">
           <tr style="font-weight: bold;">
                <td width="18%">序号</td><td width="18%">名称</td>
					 <td width="18%" id="mm">属性值</td><td width="18%">类型</td>
                <td align="center" colspan='3' >操作</td>
            </tr>
    </table>
</div>
<script src="/Public/admin/js/jquery1.8.3.min.js"></script>
<script type="text/javascript">
function	selchange(){
	var id=$("#sel option:selected").val();
	$.get("<?php echo U('Attribute/getinfo');?>",'type_id='+id,function(res){
		var h="";
      $.each(res,function(k,v){
		   h+="<tr>";
		   h+="<td>"+v.attr_id+"</td>";
		   h+="<td>"+v.attr_name+"</td>";
		   h+="<td>"+v.attr_value+"</td>";
		   h+="<td>"+v.type_id+"</td>";
		   h+="<td><a href=\"<?php echo U('Admin/Attribute/upd/id/"+v.attr_id+"');?>\">修改</a></td>";
			h+="<td><a href=\"javascript:;\" onclick=\"confirmdel("+v.attr_id+")\">删除</a></td>";
			h+="</tr>";
		});
		$(".tables tr:not(:first)").remove();
		$(".tables tr:first").after(h);
	},'json');
}
selchange();
function confirmdel(id){
  if(window.confirm('你确定要删除吗？')){
    location.href="<?php echo U('Admin/Attribute/del/id/"+id+"');?>";
  }
}
</script>



<!-- JavaScript -->
<script src="/Public/admin/js/jquery-1.10.2.js"></script>
<script src="/Public/admin/js/bootstrap.js"></script>
<script src="/Public/admin/js/app.js"></script>

</body>
</html>