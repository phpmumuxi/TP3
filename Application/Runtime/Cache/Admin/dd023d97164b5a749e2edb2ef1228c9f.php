<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>管理员登陆</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[title]</title>

    <!-- Bootstrap core CSS -->
    <link href="/web/Thinks130/Public/admin/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="/web/Thinks130/Public/admin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="/web/Thinks130/Public/admin/font-awesome/css/font-awesome.min.css">
	 <script src="/web/Thinks130/Public/admin/js/jquery1.8.3.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>管理员登陆</h1>

            <form action="/web/Thinks130/index.php/Admin/User/login" method="post">
                <div class="form-group">
                    <label for="exampleInputUser">用户名</label>
                    <input type="text" name="name" class="form-control" id="exampleInputUser" placeholder="用户名">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">密码</label>
                    <input type="password" name="pwd" class="form-control" id="exampleInputPassword" placeholder="密码">
                </div>
                <div class="form-group">
                    <label for="exampleInputCode">验证码</label>
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text"  name="verify" class="form-control" id="exampleInputCode" placeholder="验证码">
                        </div>
                        <div class="col-md-4">
                            <a href="javascript:void(0)"><img class="verify" src="<?php echo U('Admin/User/makecode');?>" alt="点击刷新"/></a>
									 <a id="kanbuq" style="cursor:pointer">看不清，换一张</a>
									 <script>
									 $("#kanbuq").click(function(){
										$(".verify").attr('src',"<?php echo U('Admin/User/makecode/id/"+Math.random()+"');?>");
									 })
									</script>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">登陆</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>