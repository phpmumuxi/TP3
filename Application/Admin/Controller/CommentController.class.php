<?php
namespace Admin\Controller;
use Common\BaseController;

class CommentController extends BaseController{
    public function index(){
        $model = M("comment");//实例化基础模型层
      
        //
        $totalRows=$model->count();//获取总记录数
        $page = new \Think\Page($totalRows,4);//每页显示多少条
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $str =$page->show();
        // $arr=$model->select();
        $arr = M('comment m')->join("inner join ts_user1 u on u.uid=m.uid")->join("inner join ts_good g on g.good_id=m.good_id")->limit($page->firstRow,$page->listRows)->order("cid asc")->select();
        //搜索数据
		//var_dump($arr);exit;
        $this->assign("arr",$arr)->assign("str",$str)->display("index");//展示
    }
    public function rcontent(){
//        print_r($_POST);
      $model = M("comment");
      $cid = $_POST['cid'];
      $rcontent = trim($_POST['rcontent']);
      $rtime = $_POST['time'];
      $where="cid = $cid";//根据ID进行修改
      $data=array("rcontent"=>"$rcontent","rtime"=>"$rtime");//修改的数据
      $re= $model->where($where)->save($data);
      //dump($re);exit;
      if($re!=0){
         $this->success("回复成功",U("Comment/index"));
      }else{
         $this->error("回复失败");    
     }
    }
    public function delete(){
        $model = M("comment");
        $cid=$_GET['cid'];//根据ID删除
        $model->where("cid=$cid")->delete();
        $this->index();
    }
   
    public function search(){
        $model = M("comment");
        $info = $_POST['key'];
        $where = array("content"=>array("like","%$info%"),"good_id"=>"$info","_logic"=>'or');//设置模糊查询的条件
        $arr=$model->where($where)->select();
//        dump($arr);
        if(empty($arr)){
            $this->error("评论不存在");
        }else{
        $this->assign("arr",$arr);
        $this->display();
        }
    }
    public function member_info(){
        $model=M("user1");
        $uname=$_GET['uname'];//根据uname查询个人信息
        $where = array("uname"=>array("like","%$uname%"));
        $arr=$model->where($where)->select();
        $this->assign("arr",$arr);
        $this->display();
    }
}
