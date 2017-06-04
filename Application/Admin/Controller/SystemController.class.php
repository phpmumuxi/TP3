<?php
namespace Admin\Controller;
use Common\BaseController;
class SystemController extends BaseController{
    public function showlist(){
        $list=M("config")->select();
        $this->assign("list",$list);
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $data=M("config")->create();
            $a=M("config")->add($data);
            if($a){
                $this->success("添加配置项成功",U("System/showlist"),2);
            }else{
                $this->error("添加配置项失败",U("System/add"),2);
            }
        }
        $this->display();
    }
    public function upd(){
        if(IS_POST){
            $ts_id=I("post.ts_id");
//            dump($ts_id);exit;
           $n= M("config")->where("ts_id=$ts_id")->save($_POST);
//            dump($n);exit;
           if($n){
               $this->success("修改成功",U("System/showlist"),2);
           }else{
               $this->error("修改失败",U("System/upd"),2);
           }
        }else{
            $ts_id=I("get.ts_id");
            $info=M("config")->find($ts_id);
//            dump($info);exit;
            $this->assign("info",$info);
            $this->display();
        } 
    }
    public function del(){
        $ts_id=I("get.ts_id");
        $m=M("config")->where("ts_id=$ts_id")->delete();
        if($m){
            $this->success("删除成功",U("System/showlist"),2);
        }else{
            $this->error("删除失败");
        }
    }
}
