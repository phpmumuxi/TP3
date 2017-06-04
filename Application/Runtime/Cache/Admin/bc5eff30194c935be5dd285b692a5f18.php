<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>类型列表</title>

    <!-- Bootstrap core CSS -->
    <link href="/web/Thinks130/Public/admin/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="/web/Thinks130/Public/admin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="/web/Thinks130/Public/admin/font-awesome/css/font-awesome.min.css">
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
          <?php if(is_array($aub)): foreach($aub as $key=>$vv): if($vv['auth_pid']==$v['auth_id']): ?><li><a href="/web/Thinks130/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>">【-】<?php echo ($vv["auth_name"]); ?></a></li><?php endif; endforeach; endif; ?>
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
 <script type="text/javascript" charset="utf-8" src="/web/Thinks130/Public/ueditor/ueditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="/web/Thinks130/Public/ueditor/ueditor.all.min.js"> </script>
  <script type="text/javascript" charset="utf-8" src="/web/Thinks130/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
        <style type="text/css">
            .div_head{height:23px;width:97%;background:lightblue;margin-left:20px;}
        #tabbar-div {
            background: none repeat scroll 0 0 #80BDCB;
            height: 27px;
            padding-left: 10px;
            padding-top: 1px;
        }
        #tabbar-div p {
            margin: 2px 0 0;
        }
        .tab-front {
            background: none repeat scroll 0 0 #BBDDE5;
            border-right: 2px solid #278296;
            cursor: pointer;
            font-weight: bold;
            line-height: 20px;
            padding: 4px 15px 4px 18px;
        }
        .tab-back {
            border-right: 1px solid #FFFFFF;
            color: #FFFFFF;
            cursor: pointer;
            line-height: 20px;
            padding: 4px 15px 4px 18px;
        }
        .tab-hover {
            background: none repeat scroll 0 0 #94C9D3;
            border-right: 1px solid #FFFFFF;
            color: #FFFFFF;
            cursor: pointer;
            line-height: 20px;
            padding: 4px 15px 4px 18px;
        }
		  #ddd{
		   text-align:center;
			margin:20px;
		  }
        </style>
        <div class="div_head" style="font-size:16px;margin-top:70px;">
                <span class="span1" style="float:left;">当前位置是：<?php echo ($bread['first']); ?>-》<?php echo ($bread['second']); ?></span>
                <span style="float:right;margin-right:20px;font-weight:bold;">
                    <a style="text-decoration:none;" href="<?php echo ($bread['third'][1]); ?>">【<?php echo ($bread['third'][0]); ?>】</a>
                </span>
            <div style="clear:both"></div>
        </div>
<div style="margin:12px 20px;">
  <div id="tabbar-div">
            <p>
                <span id="info" class="tab-front">商品信息</span>
                <span id="des" class="tab-back">详细描述</span>
                <span id="attr" class="tab-back">商品属性</span>
                <span id="img" class="tab-back">商品相册</span>
                <span id="oth" class="tab-back">其他</span>
            </p>
        </div>
   <form method="post" action="/web/Thinks130/index.php/Admin/Good/upd" enctype="multipart/form-data">
	<input type="hidden" name="good_id" value="<?php echo ($info["good_id"]); ?>"/>
    <table class="table_a"  id="info_tb" border="1" width="100%">
        <tr style="font-weight:bold;">
            <td>商品名称：</td><td><input type="text" name="good_name" value="<?php echo ($info["good_name"]); ?>"/></td>
        </tr>
		  <tr style="font-weight:bold;">
            <td>商品价格：</td><td><input type="text" name="good_price" value="<?php echo ($info["good_price"]); ?>"/></td>
        </tr>
        <tr style="font-weight:bold;">
            <td>商品促销价：</td><td><input type="text" name="good_cxj"
				value="<?php echo ($info["good_cxj"]); ?>"/></td>
        </tr>
		  <tr style="font-weight:bold;">
            <td>商品标题图片：</td><td><img src="/web/Thinks130/<?php echo ($info["good_thumb"]); ?>" width="120"/>
				上传新图片，原图片会被删除
				<input type="file" name="good_thumb" /></td>
        </tr>
    </table>
	 <table class="table_a" id="des_tb" border="1" width="100%">
	     <tr style="font-weight:bold;" height="30px">
		      <td >商品品牌：</td><td>
				<select name="brand_id">
					<?php if(is_array($brandinfo)): foreach($brandinfo as $key=>$vv): if(($info['brand_id']) == $vv['brand_id']): ?><option value="<?php echo ($vv["brand_id"]); ?>" selected>
					<?php else: ?>
					<option value="<?php echo ($vv["brand_id"]); ?>"><?php endif; ?>
					<?php echo ($vv["brand_name"]); ?></option><?php endforeach; endif; ?>
            </select></td>
        </tr>
        <tr style="font-weight:bold;">
            <td>商品描述：</td>
				<td>
				<textarea id="goods" type="text/plain" name="good_descript" style="width:600px;height:300px;"><?php echo ($info["good_descript"]); ?></textarea>
				 <script type="text/javascript">
					var ue = UE.getEditor('goods');
				 </script>
           </td>
        </tr>
    </table>
	 <table class="table_a"  id="attr_tb" border="1" width="100%">
        <tr style="font-weight:bold;background:yellow">
            <td width="20%">商品类型：</td><td>
				<select id="type" name="type_id" onchange="changetype()">
					<?php if(is_array($typeinfo)): foreach($typeinfo as $key=>$v): if(($info['type_id']) == $v['type_id']): ?><option value="<?php echo ($v["type_id"]); ?>" selected>
					<?php else: ?>
					<option value="<?php echo ($v["type_id"]); ?>"><?php endif; ?>
					<?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
            </select></td>
			</tr>
    </table>
    <table class="table_a" id="img_tb" border="1" width="100%">
        <tr style="font-weight:bold;">
            <td width="15%">商品相册：</td><td><ul>
				<?php if(is_array($imginfo)): foreach($imginfo as $key=>$vvv): ?><li id="img_<?php echo ($vvv["gi_id"]); ?>" style="float:left;list-style:none;margin:20px">
            <img src="/web/Thinks130/<?php echo ($vvv["good_small"]); ?>" />
				<span style="cursor:pointer" onclick="if(confirm('确定要删除相册吗？')){del_img(<?php echo ($vvv["gi_id"]); ?>)}">
				[-]</span></li><?php endforeach; endif; ?></ul>
            <div style="clear:both"></div>
				<input type="file" name="good_big[]" multiple/>
				</td>
        </tr>
    </table>
	 <table class="table_a" id="oth_tb" border="1" width="100%">
        <tr style="font-weight:bold;">
            <td>上下架：</td>
				<?php if($info['good_sale']==1): ?><td><input type="text" name="good_sale" value='是'/></td>
				<?php else: ?>
				<td><input type="text" name="good_sale" value='否'/></td><?php endif; ?>
        </tr>
		  <tr style="font-weight:bold;">
            <td>上架时间：</td><td><input type="text" name="good_time" value="<?php echo date('Y-m-d',$info['good_time']);?>"/></td>
        </tr>
		  <tr style="font-weight:bold;">
            <td>商品库存：</td><td><input type="text" name="good_num" value="<?php echo ($info["good_num"]); ?>"/></td>
        </tr>
        <tr style="font-weight:bold;">
            <td>商品分类：</td><td>
				<select id="" name="cat_id">
					<?php if(is_array($infos)): foreach($infos as $key=>$vo): if(($info['cat_id']) == $vo['cat_id']): ?><option value="<?php echo ($vo["cat_id"]); ?>" selected>
					<?php else: ?>
					<option value="<?php echo ($vo["cat_id"]); ?>" ><?php endif; ?>
					<?php echo str_repeat("&nbsp;&nbsp;&nbsp;",$vo['level']); echo ($vo["cat_name"]); ?></option><?php endforeach; endif; ?>
				</select>
        </tr>
    </table>
   <div id="ddd"><input type="submit" value='修改'/></div>
	</form>
</div>
 <script type="text/javascript" src="/web/Thinks130/Public/admin/js/jquery1.8.3.min.js"></script>
 <script type="text/javascript">
function changetype(){
	var id=$("#type option:selected").val();
	$.get("<?php echo U('Attribute/getinfo');?>",'type_id='+id,function(res){
		var h="";
      $.each(res,function(k,vv){
			   h+="<tr>";
				if(vv.type!=1){
              h+="<td style='text-align:right'>"+vv.attr_name+"：</td>";
				  h+="<td><input type='text' name='info["+vv.attr_id+"][]' value='"+vv.attr_value+"' /></td>";
				}else{
				var s=vv.attr_value.split(",");
				  h+="<td style='text-align:right'>";
				  h+="<em><span onclick='add_tr($(this).parent().parent().parent())' style='cursor:pointer'>[+]</span></em>";
				  h+=vv.attr_name+"：</td>";
				  h+="<td><select name='info["+vv.attr_id+"][]'>";
				 $.each(s,function(m,n){
				  h+="<option value='"+n+"'>"+n+"</option>";
				 })
				  h+="</select></td>";
				}
				h+="</tr>";
		});
		$("#attr_tb tr:not(:first)").remove();
		$("#attr_tb tr:first").after(h);
	},'json');
}
changetype();
	function add_tr(o){
		var tr_o=o.clone();
		tr_o.find('span').remove();
		tr_o.find('em').append("<span onclick='$(this).parent().parent().parent().remove()' style='cursor:pointer'>[-]</span>");
		o.after(tr_o);
	}
	function del_img(id){
	 $.get("<?php echo U('Good/delimg');?>",'gi_id='+id,function(res){
		if(res=='ok'){
		  $("#img_"+id).remove();
		}
	 })
	}
	$(function(){
        //加载事件里边定义click事件

			   $('.table_a').hide();
            $("#info_tb").show();
            $('#tabbar-div span').click(function(){
                $('#tabbar-div span').attr('class','tab-back');//全部标签 变暗
                $(this).attr('class','tab-front');//当前被点击标签 高亮
                $('.table_a').hide();//全部table 变暗
                var id = $(this).attr('id');//当前被点击标签对应的table 高亮
                $('#'+id+"_tb").show();
            });
   });
 </script>
<!-- JavaScript -->
<script src="/web/Thinks130/Public/admin/js/jquery-1.10.2.js"></script>
<script src="/web/Thinks130/Public/admin/js/bootstrap.js"></script>
<script src="/web/Thinks130/Public/admin/js/app.js"></script>

</body>
</html>