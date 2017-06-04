<?php
namespace Admin\Controller;
use Common\BaseController;
class GoodController extends BaseController{
    public function showlist(){
		$total=D('good')->count();//数据总条数
		$listRows=3;
		$page=new \Common\Page($total,$listRows);
		$sql="select * from ts_good order by good_id desc ".$page->limit;
		$info=D('good')->query($sql); //分页
		$pagelist=$page->fpage(); //分页展示
		$bread=array(
			   'first'=>'商品管理',
			   'second'=>'商品列表',
			   'third'=>array('添加商品',U('Good/add'))
		   );
		$this->assign('bread',$bread)->assign('info',$info)->assign('pagelist',$pagelist);	
        $this->display();
    }
	public function add(){		 
	   if(IS_POST){  //收集数据
		   $cat_id=I('post.cat_id');
		   $info=D('cat')->where(array('cat_fid'=>$cat_id))->find();		  
		   if($info){  
		     $this->error('有子级分类不能添加',U("Good/add"),2);
		   }else{   //数据整合
			 $_POST['good_time']=strtotime($_POST['good_time']);
			 $_POST['good_sale']=="是"?$_POST['good_sale']=1:0;
			 $data=D('good')->create($_POST);
			 $s=D('good')->add($data); 		    //收集数据		  
			  if($s){
				$this->success('添加商品成功',U("Good/showlist"),2); 
			   }else{	
				$this->error('添加商品失败',U("Good/add"),2);
			   }
		   }
		}else{		  //展示模板
		   $bread=array(
			   'first'=>'商品管理',
			   'second'=>'添加商品',
			   'third'=>array('返回',U('Good/showlist'))
		   );
		   $typeinfo=M('type')->select();
		   $this->assign('typeinfo',$typeinfo);
		   $brandinfo=M('brand')->select();
		   $infos=M('cat')->select();
		   $info=D('cat')->tree($infos);	//分类tree方法后的数据	   
		   $this->assign('bread',$bread)->assign('info',$info)->assign('brandinfo',$brandinfo);
		   $this->display();
		}        
    }
	public function upd(){      
	   if(IS_POST){	      
		   $good_id=I('post.good_id');
		   $cat_id=I('post.cat_id');		
		   $info=D('cat')->where(array('cat_fid'=>$cat_id))->find();		  	  
		   if($info){		   //获得品牌数据
			 $this->error('有子级分类不能修改',U("Good/upd",array('good_id'=>$good_id)),2);
		   }else{
			 $_POST['good_descript']= strip_tags($_POST['good_descript']);
		     $data=D('good')->create($_POST);		//收集商品数据	
		     $n=D('good')->where(array('good_id'=>$good_id))->save($data);
				if($n){			
				  $this->redirect("Good/showlist");
				}else{			
				  $this->error('商品修改失败',U("Good/upd",array('good_id'=>$good_id)),2);
				}
		   }	  
	   }else{
		   $id=I('get.good_id');
		   $bread=array(
				   'first'=>'商品管理',
				   'second'=>'修改商品',
				   'third'=>array('返回',U('Good/showlist'))
			   );
           $info=D('good')->find($id);	   
		   $imginfo=M('GoodImg')->where(array('good_id'=>$id))->select();
           $typeinfo=M('type')->select();      //获得类型数据
		   $brandinfo=M('brand')->select();	   //获得品牌数据
		   $infos=D('cat')->select();
           $infos=D('cat')->tree($infos);  //分类tree方法后的数据
		   $this->assign('bread',$bread)->assign('info',$info)->assign('imginfo',$imginfo)->assign('typeinfo',$typeinfo)->assign('brandinfo',$brandinfo)->assign('infos',$infos);
		   $this->display();
	   }
	}
	public function del(){
	 $id=I('get.id');
	 $data=D('good')->where(array('good_id'=>$id))->find();
	 unlink($data['good_thumb']); //删除图片物理图片
     $n=D('good')->delete($id);  //删除商品
	 if($n){
		$this->redirect('Good/showlist');        
	 }else{				
	   $this->error('删除商品失败',U("Good/showlist"),2);
	  }
	}
    public function delimg(){
	  $gi_id=I('get.gi_id');
	  $res=M('GoodImg')->find($gi_id);
	  unlink($res['good_big']); //删除大图物理图片
	  unlink($res['good_small']);//删除小图物理图片
	  $n=M('GoodImg')->delete($gi_id);
	  if($n){
	    echo 'ok';
	  }
	}
}
