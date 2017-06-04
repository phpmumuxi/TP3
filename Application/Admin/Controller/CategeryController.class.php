<?php
namespace Admin\Controller;
use Common\BaseController;
class CategeryController extends BaseController{
    public function showlist(){	
		$total=M('cat')->count();//数据总条数
		$listRows=10;
		$page=new \Common\Page($total,$listRows);		
		$info= M('cat')->limit($page->offset,$listRows)->select();//分页
		$pagelist=$page->fpage();		//分页展示
		$bread=array(
			   'first'=>'商品管理',
			   'second'=>'分类列表',
			   'third'=>array('添加分类',U('Categery/add'))
		   );
		$this->assign('bread',$bread)->assign('info',$info)->assign('pagelist',$pagelist);	
        $this->display();
    }
	public function add(){		
		if(IS_POST){		//收集数据	 
		   $data=M('cat')->create();               
			$n=M('cat')->add($data);
			if($n){  //分类成功判断
			  $this->success('添加分类成功',U('Categery/showlist'),2);
			}else{
			  $this->error('添加分类失败',U('Categery/add'),2);
			}			
		}else{		  //展示模板
		   $bread=array(
			   'first'=>'商品管理',
			   'second'=>'添加分类',
			   'third'=>array('返回',U('Categery/showlist'))
		   );
		   $infos=M('cat')->select();
		   $info=D('cat')->tree($infos);//分类tree方法后的数据
		   $this->assign('bread',$bread)->assign('info',$info);
		   $this->display();
		}        
    }
	public function upd(){
	   if(IS_POST){  //收集数据
		   $cat_id=I('post.cat_id');
		   $data=D('cat')->where(array('cat_fid'=>$cat_id))->find();		  
		   if($data){ //子级分类判断
		     $this->error('有子级分类不能修改',U("Categery/upd",array('cat_id'=>$cat_id)),2);
		   }else{  
		     $res=M('cat')->create();//修改分类数据
		     $n=M('cat')->where(array('cat_id'=>$cat_id))->save($res);
				if($n){			
				  $this->redirect("Categery/showlist");
				}else{			
				  $this->error('分类修改失败',U("Categery/upd"),2);
				}
		   }	   
	   }else{  //展示模板
		   $id=I('get.cat_id');
		   $bread=array(
				   'first'=>'商品管理',
				   'second'=>'分类列表',
				   'third'=>array('返回',U('Categery/showlist'))
			   );
		   $info=M('cat')->find($id);		   
		   $infos=D('cat')->select();
           $infos=D('cat')->tree($infos);//分类tree方法后的数据
		   $this->assign('bread',$bread)->assign('info',$info)->assign('infos',$infos);
		   $this->display();
	   }
	}
	public function del(){
	 $id=I('get.id');
	 $data=D('cat')->where(array('cat_fid'=>$id))->find();//子级分类判断
	 $datas=D('good')->where(array('cat_id'=>$id))->find();//分类下商品判断
	 if($data){ //子级分类判断
        $this->error('有子级分类不能删除',U("Categery/showlist"),2);
	 }elseif($datas){
        $this->error('分类下有商品不能删除',U("Categery/showlist"),2);
	 }else{
		 $n=M('cat')->delete($id);//分类id删除
			if($n){			
			  $this->redirect('Categery/showlist');
			}else{			
			  $this->error('删除属性失败',U("Categery/showlist"),2);
			}
		}
	}
}
