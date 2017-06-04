<?php
namespace Admin\Controller;
use Common\BaseController;
class RoleController extends BaseController {
   public function showlist(){			
		$info=M('role')->select();		
		$this->assign('info',$info);
		$bread=array(
			   'first'=>'角色管理',
			   'second'=>'角色列表',
			   'third'=>array('添加角色',U('Role/add'))
		   );
		$this->assign('bread',$bread);	
        $this->display();
    }
   public function add(){		
		if(IS_POST){			//收集数据 
		   $n=D('role')->sel($_POST);      //调用sel方法添加角色     
			if($n){
			  $this->success('添加角色成功',U('Role/showlist'),2);
			}else{
			  $this->error('添加角色失败',U('Role/add'),2);
			}			
		}else{		  //展示模板
		   $bread=array(
			   'first'=>'角色管理',
			   'second'=>'添加角色',
			   'third'=>array('返回',U('Role/showlist'))
		   );
		   $infos=M('auth')->select();
		   $info=D('auth')->tree($infos); //权限tree方法后的数据
		   $this->assign('bread',$bread)->assign('info',$info);
		   $this->display();
		}        
    }
  public function upd(){
	   if(IS_POST){ //收集数据
		 $n=D('role')->check($_POST);
		   if($n){			
			  $this->redirect("Role/showlist");
			}else{			
			  $this->error('角色修改失败',U("Role/upd",array('role_id'=>I('post.role_id'))),2);
			}
	   }else{  //展示模板
		   $id=I('get.role_id');
		   $bread=array(
				   'first'=>'角色管理',
				   'second'=>'角色修改',
				   'third'=>array('返回',U('Role/showlist'))
			   );
		   $vo=M('role')->find($id);		    //查找对应的角色
		   $infos=D('auth')->select();
           $info=D('auth')->tree($infos);   //权限tree方法后的数据
		   $this->assign('bread',$bread)->assign('vo',$vo)->assign('info',$info);
		   $this->display();
	   }
	}
   public function del(){
	 $role_id=I('get.id');	 
	  $n=M('role')->delete($role_id);  //删除角色
		if($n){			
		  $this->redirect('Role/showlist');
		}else{			
		  $this->error('删除角色失败',U("Role/showlist"),2);
		} 		
	}
}