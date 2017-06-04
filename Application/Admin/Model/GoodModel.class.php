<?php
namespace Admin\Model;
use Think\Model;
class GoodModel extends Model{
   protected function _before_insert(&$data,$options) {	 
		 if($_FILES['good_thumb']['error']==0){           
			$conf=array(
				'rootPath'      =>  './public/uploads/', //保存根路径
			);		 
			$up= new \Think\Upload($conf);	
			$m=$up->uploadOne($_FILES['good_thumb']); //上传商品图片
           $thumb=$up->rootPath.$m['savepath'].$m['savename'];		   
		   $data['good_thumb']=$thumb;
	     }
    }
   protected function _after_insert($data,$options) {
	 foreach($_FILES['good_big']['error'] as $v){
		  if($v===0){		   
			$conf=array(
					'rootPath'      =>  './public/uploads/', //保存根路径
			 );
			 $up= new \Think\Upload($conf);	
			 $n=$up->upload(array('good_big'=>$_FILES['good_big']));
			   foreach($n as $vv){  //批量处理图片库
                  $good_big=$up->rootPath.$vv['savepath'].$vv['savename'];
				  $small= new \Think\Image();
				  $small->open($good_big);
				  $small->thumb(50,50);  //批量制作缩略图
				  $good_small=$up->rootPath.$vv['savepath']."small_".$vv['savename'];
                  $small->save($good_small);
				  $arr=array(
					  'good_id'=>$data['good_id'],
					  'good_big'=>$good_big,
					  'good_small'=>$good_small,
					);
					D('GoodImg')->add($arr);
			   }			 
		  }
    }      
    if(!empty($_POST['info'])){
	  foreach($_POST['info'] as $k=>$v){
	     foreach($v as $ko=>$vo){   //商品对应的属性
	        $arr=array(
			  'good_id'=>$data['good_id'],
			  'attr_id'=>$k,
			  'ga_value'=>$vo,
			);
			D('GoodAttr')->add($arr);
	    }	
	  }	
	}
   }
   protected function _before_update(&$data,$options) {
       if($_FILES['good_thumb']['error']==0){		   
		   $res=D('good')->find($options['where']['good_id']);
		   if(isset($res['good_thumb'])){
		      unlink($res['good_thumb']);  //删除图片
		   }
			$conf=array(
				'rootPath'      =>  './public/uploads/', //保存根路径
			);		 
			$up= new \Think\Upload($conf);	
			$m=$up->uploadOne($_FILES['good_thumb']);
           $thumb=$up->rootPath.$m['savepath'].$m['savename'];		   
		   $data['good_thumb']=$thumb;  //上传图片覆盖原图片
	    }
	   foreach($_FILES['good_big']['error'] as $v){
		  if($v===0){		   
			  $conf=array(
					'rootPath'      =>  './public/uploads/', //保存根路径
			  );
			 $up= new \Think\Upload($conf);	
			 $n=$up->upload(array('good_big'=>$_FILES['good_big']));
			   foreach($n as $vv){
                  $good_big=$up->rootPath.$vv['savepath'].$vv['savename'];
				  $small= new \Think\Image();
				  $small->open($good_big);
				  $small->thumb(50,50);
				  $good_small=$up->rootPath.$vv['savepath']."small_".$vv['savename'];
                  $small->save($good_small);  //批量处理图片库和缩略图
				  $arr=array(
					  'good_id'=>$options['where']['good_id'],
					  'good_big'=>$good_big,
					  'good_small'=>$good_small,
					);
					D('GoodImg')->add($arr);
			    }			 
		    }
	    }
    }
   protected function _after_update($data,$options) { //删除原商品对应的属性
	 D('GoodAttr')->where(array('good_id'=>$data['good_id']))->delete();
		if(!empty($_POST['info'])){
		  foreach($_POST['info'] as $k=>$v){
			 foreach($v as $ko=>$vo){
				$arr=array(
				  'good_id'=>$data['good_id'],
				  'attr_id'=>$k,
				  'ga_value'=>$vo,
				);
				D('GoodAttr')->add($arr);//原商品对应的属性值重新加入
			  }	
			}	
		}
	}
}