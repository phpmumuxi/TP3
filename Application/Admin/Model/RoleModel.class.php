<?php
namespace Admin\Model;
use Think\Model;
class RoleModel extends Model{
  public function sel($data){
	  $auth_id=$data['auth_id'];
	  if(!is_array($auth_id)){
	     $info=M('auth')->find($auth_id);
         if($info['auth_pid']!=0){
		   $data['role_ac']=$info['auth_c']."-".$info['auth_a'];
		 }
         $data['role_all']=$info['auth_id'];		
	  }else{
		$arr=array();
	    foreach($auth_id as $v){
		   $info=M('auth')->find($v);
		   if($info['auth_pid']!=0){
		     $arr['role_ac'][]=$info['auth_c']."-".$info['auth_a'];
		   }		  
           $arr['role_all'][]=$info['auth_id'];		   
		}
		$data['role_ac']=implode(',',$arr['role_ac']);
		$data['role_all']=implode(',',$arr['role_all']);		   
		return M('role')->add($data);
	  }
	}
	 public function check($data){
		 $role_id=$data['role_id'];
         $auth_id=$data['auth_id'];
		 if(!is_array($auth_id)){
			$info=M('auth')->find($auth_id);
             if($info['auth_pid']!=0){
		        $data['role_ac']=$info['auth_c']."-".$info['auth_a'];
		      }
              $data['role_all']=$info['auth_id']; 		
		  }else{
			$arr=array();
			foreach($auth_id as $v){
			   $info=M('auth')->find($v);
			   if($info['auth_pid']!=0){
				 $arr['role_ac'][]=$info['auth_c']."-".$info['auth_a'];
			   }		  
			   $arr['role_all'][]=$info['auth_id'];		   
			}
			$data['role_ac']=implode(',',$arr['role_ac']);
			$data['role_all']=implode(',',$arr['role_all']);		   
			return M('role')->where("role_id=$role_id")->save($data);
		  }
	 }
}