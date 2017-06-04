<?php
namespace Home\Controller;
use Think\Controller;

class CommentController extends Controller{
    public function index(){
        $order_id=$_GET['order_id'];
        $model = M(order);
        $res = $model->where("order_id = $order_id")->select();
        $good_id=I("get.good_id");
        $m=M("good");
        $arr = $m->where("good_id=$good_id")->select();
        
        $this->assign("arr",$arr)->assign("order_id",$order_id)->assign("res",$res)->display();
        
    }
    public function add(){
        
//        dump($_POST);
        if($_POST['content']==""){
            $this->error("评价内容不能为空");
        }else{
         $model = M("comment");//实例化基类
         $imp=  json_encode($_POST['imp']);//将数组转化成字符串
         $start = $_POST['start'];
         $gid = $_POST['good_id'];
         $uid = $_POST['uid'];
         $content = $_POST['content'];
         $time = $_POST['time'];
        $date = array("uid"=>"$uid","good_id"=>"$gid","content"=>"$content","time"=>"$time","start"=>"$start","imp"=>"$imp");//组装要存入的数据
        $re=$model->add($date);//存入数据
        if($re>0){
           $this->success("评价成功,即将返回首页",U("Home/Index/index"));
       }else{
           $this->error("评价失败");
       }
        }
    }
    
}
