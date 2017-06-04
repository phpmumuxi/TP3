<?php
namespace Admin\Controller;
use Common\BaseController;
class TypeController extends BaseController{
    public function showlist(){
		$info=M('type')->select();
		$bread=array(
			   'first'=>'商品类型',
			   'second'=>'类型列表',
			   'third'=>array('添加类型',U('Type/add'))
		   );
		$this->assign('bread',$bread)->assign('info',$info);
        $this->display();
    }
	public function add(){
		if(IS_POST){  //收集数据
			$data=array('type_name'=>I('post.type_name'));
		    $n=M('type')->add($data); //类型添加
			if($n){
			  $this->success('添加类型成功',U('Type/showlist'),2);
			}else{
			  $this->error('添加类型失败',U('Type/add'),2);
			}
		}else{   //展示模板
		   $bread=array(
			   'first'=>'商品类型',
			   'second'=>'添加类型',
			   'third'=>array('返回',U('Type/showlist'))
		   );
		   $this->assign('bread',$bread);
		   $this->display();
		}        
    }
	public function upd(){
	   if(IS_POST){  //收集数据
	       $id=I('post.id');
		   $name=I('post.type_name');
		   $data=array('type_name'=>$name); //修改类型的数据
           $n=M('type')->where("type_id=$id")->save($data);
			if($n){			
			  $this->redirect('Type/showlist');
			}else{			
			  $this->error('类型修改失败',U("Type/upd/id/$id"),2);
			}
	   }else{   //展示模板
		   $id=I('get.id');
		   $bread=array(
				   'first'=>'商品类型',
				   'second'=>'类型修改',
				   'third'=>array('返回',U('Type/showlist'))
			   );
		   $info=M('type')->find($id); //查找对应的类型
		   $this->assign('bread',$bread)->assign('info',$info);
		   $this->display();
	   }
	}
	public function del(){
	 $id=I('get.id');
     $n=M('type')->delete($id);  //删除类型
		if($n){			
		  $this->redirect('Type/showlist');
		}else{			
		  $this->error('删除类型失败',U("Type/showlist"),2);
		}
	}
}
