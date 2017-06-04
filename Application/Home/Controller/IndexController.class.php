<?php
    namespace Home\Controller;
    use Think\Controller;
    class IndexController extends Controller{
            public function index(){
			$arr=D('cat')->select();
			$info=D('good')->where('type_id=8')->select();
			$infos=D('good')->where('type_id=5')->select();
               $res=D('cat')->child($arr);
			   //dump($res);exit;
                    $this->assign('res',$res)->assign('info',$info)->assign('infos',$infos);
                    $this->display();
            }
			public function goodlist(){
			  $res=D('brand')->select();
              $total=D('good')->where('type_id=8')->count();
              $page=new \Common\Page($total,2);
              $info=D('good')->where('type_id=8')->limit($page -> offset,2)->select();
			  $pagelist=$page->fpage();
              $this->assign('res',$res)->assign('info',$info)->assign('pagelist',$pagelist);
             $this->display();
             
            }
              
            
    }