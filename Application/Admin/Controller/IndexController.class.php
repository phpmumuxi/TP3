<?php
namespace Admin\Controller;
use Common\BaseController;
class IndexController extends BaseController{
    public function index(){		
		$admin_name=I("session.user");
		if(!empty($admin_name)){ //查找登陆者的权限id
			$info=M('manager m')->join('__ROLE__ r on m.role_id=r.role_id')->field('r.role_all')->where(array('manager_name'=>$admin_name))->find();
			$acs=$info['role_all'];
			if($admin_name == 'admin'){
				$aua = M('auth')->where("auth_level=0 ")->select();
				$aub = M('auth')->where("auth_level=1 ")->select();        
			}else{ //展示权限
				$aua = M('auth')->where("auth_level=0 and auth_id in ($acs)")->select();
				$aub = M('auth')->where("auth_level=1 and auth_id in ($acs)")->select();
			}
			$this -> assign('aua',$aua)-> assign('aub',$aub);
			$this->display();
		}else{
		    $this->redirect("Admin/User/login");
		}
    }
}
