<?php
namespace Home\Model;
use Think\Model;
class CatModel extends Model{
  public function child($arr,$fid=0){
     $res=array();
    foreach($arr as $v){
	  if($v['cat_fid']==$fid){
		 $childs=$this->child($arr,$v['cat_id']);
	     $v['child']=$childs;
		 $res[]=$v;
	  }
	  
	}return $res;
  }

}