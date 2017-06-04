<?php 
namespace Home\Controller;
    use Think\Controller;
    class OrderController extends Controller{
    //查询所有订单信息并分页
    public function index(){ 
      //  $order_user=$_SESSION['user_name'];
       // $where="order_user='$order_user'";
       $M=M("order");
       $totalRows=$M->count();
       $page=new \Think\Page($totalRows,4);       
       $str=$page->show();        
       $arr=$M->where($where)->limit($page->firstRow,$page->listRows)->order("order_id asc")->select();
       $this->assign("arr",$arr)->assign("str",$str)->display("index");
 
    }
    //更新订单状态
    public function save(){
        $M=M("order");
        $order_id=$_GET{'order_id'};
        $where="order_id='$order_id'";
        $data =array("order_type"=>2); //把订单状态修改为已收货
        $re= $M->where($where)->save($data);
        $this->index();
        }
        public function pay(){
        $M=M("order");
        $order_id=$_GET{'order_id'};
        $where="order_id='$order_id'";
        $data =array("pay_status"=>1); //把订单状态修改为已付款
        $re= $M->where($where)->save($data);
        $this->index();
    }
    public function delete(){
        $M=M("order");
        $order_id=$_GET{'order_id'};
        $where="order_id='$order_id'";
        $arr=$M->where($where)->delete();
        $this->index();
    }
    //查询具体的订单信息
    public function order_info(){
        $M=M("order");
        $order_id=$_GET{'order_id'};
        $where="order_id='$order_id'";
        $arr=$M->where($where)->select();
        $this->assign("arr",$arr)->display("order_info");
    }
    public function addorder(){
       
        	 //dump($_SESSION['goods']);//exit;
                          $cart=$_POST['amount'];
                          //dump($cart);
			  $good_id=I('get.good_id');
			  if(!isset($_SESSION['ids'])){
                            $_SESSION['ids'] = array();
			  }
			  $_SESSION['ids'][] = $good_id;
                            $arr1=array_unique($_SESSION['ids']);
                            $arr2=array_values($arr1);
                            $ids1=implode(',',$arr2);
                                        $ids=trim($ids1,',');
                                        if(!empty($ids)){
                              $info=M('Good')->where("good_id in ($ids)")->select();
                         
                                        } 
                                        foreach ($info as $v){
                                        $sprice = $v['good_price']*$cart;
                                       }
                                        //echo $sprice;
                                        $this->assign('info',$info)->assign('cart',$cart)->assign('sprice',$sprice);
                                        $this->display();
                                        
                                       
         }
    
    public function success(){
       $get_name="刘航";
       $get_phone="13888888888";
       $get_addr="江苏省 南京市秦淮区 弓箭坊40号四楼甘池软件";
       $order_user=$_SESSION['uname'];
       $cart=$_POST['amount'];
       $sprice=$_POST['sprice'];
       $order_time=time();
      
                    
       $good_id=I('get.good_id');
			  if(!isset($_SESSION['ids'])){
                           $_SESSION['ids'] = array();
			  }
			  $_SESSION['ids'][] = $good_id;
                         $arr1=array_unique($_SESSION['ids']);
                           $arr2=array_values($arr1);
                            $ids1=implode(',',$arr2);
                                        $ids=trim($ids1,',');
                                        if(!empty($ids)){
                              $info=M('Good')->where("good_id in ($ids)")->select();
                                        } 
                                        foreach ($info as $v){
                                        $good_price = $v['good_price'];
                                        $good_thumb = $v['good_thumb'];
                                        $good_id = $v['good_id'];
       
       $data=array('get_name'=>'刘航','get_phone'=>"$get_phone",'get_addr'=>"$get_addr",
           'order_user'=>"$order_user",'order_time'=>"$order_time",'good_id'=>"$good_id",'good_price'=>"$good_price",
           'good_thumb'=>"$good_thumb",'cart'=>"$cart",'sprice'=>"$sprice");
       $id=M("order")->data($data)->add();
                    if($id>0){
                        unset($_SESSION['ids']);
                       $this->display();
                    }else{
                        $this->error();
                    }
    }
    }
} 


