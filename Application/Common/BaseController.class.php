<?php
namespace Common;
use Think\Controller;
class BaseController extends Controller {
    function __construct(){
	   parent::__construct();
	   $admin_name=session('user');
	   $nac=CONTROLLER_NAME."-".ACTION_NAME;
	   $aac="User-login,User-logout,User-makecode,Index-index";
       if(empty($admin_name) && strpos($aac,$nac)===false){
	      $this->redirect("Admin/User/login");
	   }else{
          $info=M('manager m')->join('__ROLE__ r on m.role_id=r.role_id')->field('r.role_ac')->where(array('manager_name'=>$admin_name))->find();
		  $hac=$info['role_ac'];	  
		    if($admin_name!='admin' && strpos($aac,$nac)==false && strpos($hac,$nac)===false){
			  $this->error('没有访问权限');
			  exit;
			}
	   }
	}
}