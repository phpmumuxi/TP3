<?php
namespace Admin\Controller;
use Common\BaseController;
class BrandController extends BaseController{
    public function showlist(){  //展示模板
		$info=M('brand')->select();
		$bread=array(
			   'first'=>'商品品牌',
			   'second'=>'品牌列表',
			   'third'=>array('添加品牌',U('Brand/add'))
		   );
		$this->assign('bread',$bread)->assign('info',$info);
        $this->display();
    }
	public function add(){
		if(IS_POST){//收集数据
			$data=array('brand_name'=>I('post.brand_name'));
		    $n=M('brand')->add($data);//添加品牌数据
			if($n){
			  $this->success('添加品牌成功',U('Brand/showlist'),2);
			}else{
			  $this->error('添加品牌失败',U('Brand/add'),2);
			}
		}else{//展示模板
		   $bread=array(
			   'first'=>'商品管理',
			   'second'=>'添加品牌',
			   'third'=>array('返回',U('Brand/showlist'))
		   );
		   $this->assign('bread',$bread);
		   $this->display();
		}        
    }
	public function upd(){
	   if(IS_POST){//收集数据
	       $id=I('post.id');
		   $name=I('post.brand_name');
		   $data=array('brand_name'=>$name);//收集数据，修改品牌数据
           $n=M('brand')->where("brand_id=$id")->save($data);
			if($n){			
			  $this->redirect('Brand/showlist');
			}else{			
			  $this->error('品牌修改失败',U("Brand/upd/id/$id"),2);
			}
	   }else{//展示模板
		   $id=I('get.id');
		   $bread=array(
				   'first'=>'商品品牌',
				   'second'=>'品牌修改',
				   'third'=>array('返回',U('Type/showlist'))
			   );
		   $info=M('brand')->find($id);
		   $this->assign('bread',$bread)->assign('info',$info);
		   $this->display();
	   }
	}
	public function del(){
	 $id=I('get.id');
     $n=M('brand')->delete($id);//根据品牌id删除品牌
		if($n){			
		  $this->redirect('Brand/showlist');
		}else{			
		  $this->error('删除品牌失败',U("Brand/showlist"),2);
		}
	}
}
