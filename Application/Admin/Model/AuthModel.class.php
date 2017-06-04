<?php
namespace Admin\Model;
use Think\Model;
class AuthModel extends Model{
  public function sel($data){
	  $auth_id=$this->add($data);  //先添加记录
	  if($data['auth_pid']==0){ 
	     $auth_path=$auth_id;		//顶级权限 
	  }else{
	     $info=$this->find($data['auth_pid']);
		 $auth_path=$info['auth_path']."-".$auth_id;
	  }                     //权限ids的维护
	  $level=substr_count($auth_path,'-');
	  $res=array(
		'auth_id'=>$auth_id,  
		'auth_path'=>$auth_path,  
		'auth_level'=>$level  
	  );
      return  $this->save($res);
	}
	public function tree($arr,$fid = 0){
		$res = array();
		foreach ($arr as $v) {
			if ($v['auth_pid'] == $fid) {
				//说明找到，先保存，然后递归查找				
				$res[] = $v;
				$res = array_merge($res,$this->tree($arr,$v['auth_id']));
			}
		}
		return $res;
	}
	public function authupdate($data){
	 $auth_id=I('post.auth_id');	 
	 if(I('post.auth_pid')==0){
	     $auth_path=$auth_id;		 //维护数据库字段
	  }else{
	     $info=D('auth')->find(I('post.auth_pid'));		 
		 $auth_path=$info['auth_path']."-".$auth_id;		 
	  }  
	  $level=substr_count($auth_path,'-');
	  $_POST['auth_level']=$level;
	  $_POST['auth_path']=$auth_path;	  //修改后的数据
      return  $this->where("auth_id=$auth_id")->save($_POST);
	}
}