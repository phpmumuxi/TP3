<?php
namespace Admin\Controller;
use Common\BaseController;
class AttributeController extends BaseController{
    public function showlist(){//展示模板
		$type_id=I('get.type_id');	//查找对应类型下的属性数据	
		$infos=M('attr')->where(array('type_id'=>$type_id))->select();		
		$bread=array(
			   'first'=>'属性管理',
			   'second'=>'属性列表',
			   'third'=>array('添加属性',U('Attribute/add'))
		   );
		$info=M('type')->select();//类型数据
		$this->assign('bread',$bread)->assign('infos',$infos)->assign('info',$info);
        $this->display();
    }
	public function add(){		
		if(IS_POST){//收集数据
			$data=D('attr')->create();
			if($data){   //添加属性数据         
				$n=D('attr')->add($data);
				if($n){
				  $this->success('添加属性成功',U('Attribute/showlist'),2);
				}else{
				  $this->error('添加属性失败',U('Attribute/add'),2);
				}
			}else{//自动验证错误数据
			  $this ->error(D('attr')->getError(), U('Attribute/add'), 2);
			}
		}else{		//展示模板	
		   $info=M('type')->select();
		   $bread=array(
			   'first'=>'属性管理',
			   'second'=>'添加属性',
			   'third'=>array('返回',U('Attribute/showlist'))
		   );
		   $this->assign('bread',$bread)->assign('info',$info);
		   $this->display();
		}        
    }
	public function upd(){
	   if(IS_POST){	    //收集数据   
		   $data=D('attr')->create();//获得属性数据
		   if($data){//修改属性数据
			   $n=M('attr')->where(array('attr_id'=>I('post.attr_id')))->save($data);
				if($n){	//属性修改成功		
				  $this->redirect("Attribute/showlist");
				}else{			
				  $this->error('属性修改失败',U("Attribute/upd"),2);
				}
		   }else{//自动验证错误数据
		     $this->error(D('attr')->getError(),U("Attribute/upd"),2);
		   }
	   }else{//展示模板
		   $id=I('get.id');
		   $bread=array(
				   'first'=>'属性管理',
				   'second'=>'属性列表',
				   'third'=>array('返回',U('Attribute/showlist'))
			   );
		   $info=M('attr')->find($id);//根据属性id查找数据
		   $infos=M('type')->select();//获得类型数据
		   $this->assign('bread',$bread)->assign('infos',$infos)->assign('info',$info);
		   $this->display();
	   }
	}
	public function del(){
	 $id=I('get.id');//根据属性id删除数据
     $n=M('attr')->delete($id);
		if($n){			
		  $this->redirect('Attribute/showlist');
		}else{			
		  $this->error('删除属性失败',U("Attribute/showlist"),2);
		}
	}
	public function getinfo(){
	  $type_id=I('get.type_id'); //根据类型id查找属性
      $info=M('attr')->where(array('type_id'=>$type_id))->select();	  
	  foreach($info as $k=>$v){//属性值个数判断并追加
	    substr_count($v['attr_value'],',')>0?$info[$k]['type']=1:"";
	  }
	  echo json_encode($info);
	}
}
