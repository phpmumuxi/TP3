<?php
namespace Admin\Controller;
use Common\BaseController;
class AuthController extends BaseController {
   public function showlist(){		//展示模板	
		$infos=M('auth')->select();
		$info=D('auth')->tree($infos); //权限tree方法后的数据
		$bread=array(
			   'first'=>'权限管理',
			   'second'=>'权限列表',
			   'third'=>array('添加权限',U('Auth/add'))
		   );
		$this->assign('bread',$bread)->assign('info',$info);	
        $this->display();
    }
   public function add(){		
		if(IS_POST){	//收集数据		 
		   $n=D('auth')->sel($_POST);    //sel方法后添加数据判断       
			if($n){
			  $this->success('添加权限成功',U('Auth/showlist'),2);
			}else{
			  $this->error('添加权限失败',U('Auth/add'),2);
			}			
		}else{		//展示模板	  
		   $bread=array(
			   'first'=>'权限管理',
			   'second'=>'添加权限',
			   'third'=>array('返回',U('Auth/showlist'))
		   );
		   $this->assign('bread',$bread);
		   $infos=M('auth')->select();
		   $info=D('auth')->tree($infos); //权限tree方法后的数据
		   $this->assign('info',$info);
		   $this->display();
		}        
    }
	public function upd(){
	   if(IS_POST){ //收集数据
		 $n=D('auth')->authupdate($_POST);//权限修改成功判断
		   if($n){			//权限修改成功
			  $this->redirect("Auth/showlist");
			}else{			
			  $this->error('权限修改失败',U("Auth/upd",array('auth_id'=>I('post.auth_id'))),2);
			}
	   }else{  //展示模板
		   $id=I('get.auth_id');
		   $bread=array(
				   'first'=>'权限管理',
				   'second'=>'权限修改',
				   'third'=>array('返回',U('Auth/showlist'))
			   );
		   $v=M('auth')->find($id);		   
		   $infos=D('auth')->select();
           $info=D('auth')->tree($infos); //权限tree方法后的数据
		   $this->assign('bread',$bread)->assign('v',$v)->assign('info',$info);
		   $this->display();
	   }
	}
	public function del(){
	 $auth_id=I('get.id');	 //根据权限id删除数据
	  $n=M('auth')->delete($auth_id);
		if($n){			
		  $this->redirect('Auth/showlist');
		}else{			
		  $this->error('删除权限失败',U("Auth/showlist"),2);
		} 		
	}
}