<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class UserController extends Controller {
    public function login(){
		if(empty($_POST)){ //展示模板
		   $this->display();
		}else{
		   $ver=new Verify();
		   if($ver->check($_POST['verify'])){ //验证码判断
			   $data=array(
				 'name'=>addslashes(trim($_POST['name'])),				
				 'pwd'=>md5(trim($_POST['pwd']))
			   );   //数据处理
			  $z=M('user')->where($data)->find();
			  if($z){
				 session('user',$z['name']); //保存用户登录的名字
			     $this->success('登陆成功',U("Admin/Index/index"),2);
			  }else{
			     $this->error('用户名或密码错误',U("Admin/User/login"),2);
			  }  
		   }else{
		      $this->error('验证码错误',U("Admin/User/login"),2);
		   }
		}		
    }
	public function logout(){	
		session(null); //清空session
		$this->redirect('Admin/User/login');
    }
	public function makecode(){			
		$conf=array(
		   'fontSize'  =>  16,
		   'imageH'    =>  32,              
           'imageW'    =>  110,               
           'length'    =>  4,  
		   'fontttf'   =>  '4.ttf'
		);
		$ver = new Verify($conf);
		$ver->entry();  //制作验证码
    }
}