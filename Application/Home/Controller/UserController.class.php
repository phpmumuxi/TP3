<?php
	namespace Home\Controller;
	use Think\Controller;
	class UserController extends Controller{
		public function login(){
			 if(!isset($_POST['sub'])){
				$this->display();
				}else{
					$ver = new \Think\Verify();
					if($ver->check($_POST['verify'])) {
						$user = $_POST['uname'];
						$pwd = md5($_POST['pwd']);
						$where = "uname='$user'and pwd='$pwd'";
						$id = M('user1')->where($where)->find();
					if ($id > 0) {
						$_SESSION['uname'] = $user;
						//print_r($_SUSSION);
						$this->success("登陆成功，请登录", U("Home/Index/index"), 2);
					} else {
						$this->error("登陆失败");
					}
					}else{
						$this->error("验证码错误",U("login"),1);
			}
        }
    }
		public function regist(){
			if(!isset($_POST['sub'])){
				$this->display();
			  }else{
					$ver = new \Think\Verify();
					if($ver->check($_POST['verify']) && I('post.chec')==1) {
						$_POST['pwd'] = md5($_POST['pwd']);
						$data = M("user1")->create();
						$re = M("user1")->add($data);
						//echo $re;
						if ($re > 0) {
							$this->success("注册成功，请登录", U("Home/User/login"), 2);
						} else {
							$this->error("注册失败");
					}
			  }else{
				$this->error("验证码错误",U("regist"));
			}
        }
    }
            public function makeVerify(){
			$config = array(
				'length'    =>  4,        // 验证码位数
        		'fontSize'  =>  20,       // 验证码字体大小(px)
        		'useImgBg'  =>  true,           // 使用背景图片 
        		'useCurve'  =>  false,            // 是否画混淆曲线
                'useNoise'  =>  false,            // 是否添加杂点
			);
			$Verify = new \Think\Verify($config);
			$Verify->entry();
		}
			public function checkverify(){
				if(IS_AJAX && isset($_GET['str'])){
					$str = $_GET['str'];	//接收模板传过来的值
					$Verify = new \Think\Verify();
					$Verify->reset = false;		//验证成功后是否重置
					echo $Verify->check($str);	//
				}else{
					return false;
				}
			}
             public function loginout(){
				$_SESSION=array();
				session_destroy();
				if(isset($_SESSION['uname'])){
					$this->error("退出失败");
				}else{
					$this->success("退出成功",U("Home/Index/index"),0);
				}
			}
		 }