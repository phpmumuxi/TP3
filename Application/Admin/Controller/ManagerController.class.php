<?php
namespace Admin\Controller;
use Common\BaseController;
class ManagerController extends BaseController{
    public function showlist(){ //根据登陆者的id查找角色
		$info=M('manager m')->join('left join __ROLE__ r on m.role_id=r.role_id')->field('m.*,role_name')->select();
		$bread=array(
			   'first'=>'管理员管理',
			   'second'=>'管理员列表',
			   'third'=>array('添加管理员',U('Manager/add'))
		   );
		$this->assign('bread',$bread)->assign('info',$info)->assign('roleinfo',$roleinfo);
		
        $this->display();
    }
	public function add(){
		if(IS_POST){  //收集数据
			$data=M('manager')->create();
		    $n=M('manager')->add($data); //管理员添加
			if($n){  
			  $this->success('添加管理员成功',U('Manager/showlist'),2);
			}else{
			  $this->error('添加管理员失败',U('Manager/add'),2);
			}
		}else{  //展示模板
		   $bread=array(
			   'first'=>'管理员管理',
			   'second'=>'添加管理员',
			   'third'=>array('返回',U('Manager/showlist'))
		   );
		   $info=M('role')->field("role_name,role_id")->select();		   
		   $this->assign('bread',$bread)->assign('info',$info);
		   $this->display();
		}        
    }
	public function upd(){
	   if(IS_POST){  //收集数据
		   $manager_id=I('post.manager_id');		//修改管理员   
           $n=M('manager')->where("manager_id=$manager_id")->save($_POST);
			if($n){			
			  $this->redirect('Manager/showlist');
			}else{			
			  $this->error('管理员修改失败',U("Manager/upd/manager_id/$manager_id"),2);
			}
	   }else{  //展示模板
		   $id=I('get.manager_id');
		   $bread=array(
				   'first'=>'管理员管理',
				   'second'=>'管理员修改',
				   'third'=>array('返回',U('Manager/showlist'))
			   );
		   $vo=M('manager')->find($id);
		   $info=M('role')->field("role_name,role_id")->select();	//收集角色信息	   
		   $this->assign('bread',$bread)->assign('vo',$vo)->assign('info',$info);
		   $this->display();
	   }
	}
	public function del(){
	 $id=I('get.id');
     $n=M('manager')->delete($id); //删除管理员
		if($n){			
		  $this->redirect('Manager/showlist');
		}else{			
		  $this->error('删除管理员失败',U("Manager/showlist"),2);
		}
	}
}
