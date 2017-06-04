<?php
namespace Admin\Controller;
use Common\BaseController;
class OrderController extends BaseController{
    public function index(){ 
           $M=M("order");  
           $totalRows=$M->count();
           $page=new \Think\Page($totalRows,4);    //实例化分页类   
           $str=$page->show();        
           $arr=$M->limit($page->firstRow,$page->listRows)->order("order_id asc")->select();
           $this->assign("arr",$arr)->assign("str",$str)->display("index");
        }
        

public function update(){
    $M=M("order");
    $order_id=$_GET{'order_id'};
    $where="order_id='$order_id'";
    $arr=$M->where($where)->select();
    $this->assign("arr", $arr)->display(order_list);    
}
//删除订单
public function delete(){
    $M=M("order");
    $order_id=$_GET{'order_id'};
    $where="order_id='$order_id'";
    $arr=$M->where($where)->delete();
    $this->index();
}
//修改订单的状态
    public function save(){
    $M=M("order");
    $order_id=$_GET{'order_id'};
    $where="order_id='$order_id'";
    $data =array("order_type"=>1); //把订单状态修改为已发货
    $re= $M->where($where)->save($data);
    $this->index();
    }
    public function search(){
        //如果存在查询的内容
            $M=M("order");
            $order_number=$_POST['order-number'];
            $order_user=$_POST['order-user'];
            $get_name=$_POST['get_name'];
            $get_addr=$_POST['get_addr'];
            $where =array("get_addr"=>array("like","%$get_addr%"),"order_number"=>"$order_number","order_user"=>"$order_user","get_name"=>"$get_name","_logic"=>'or');//设置模糊查询的条件
            $totalRows=$M->count();
            $page=new \Think\Page($totalRows,4);    //实例化分页类   
            $str=$page->show();       
            $arr=$M->where($where)->limit($page->firstRow,$page->listRows)->order("order_id asc")->select();
            $this->assign("arr",$arr)->assign("str",$str)->display("order_list");
    
}
}
