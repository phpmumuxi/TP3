<?php
    namespace Home\Controller;
    use Think\Controller;
    class GoodController extends Controller{
            public function showgood(){
			 $good_id=I('get.good_id');
			 $info=M('good')->find($good_id);
			 $infos=M('GoodImg')->where(array('good_id'=>$good_id))->select();
			 $this->assign('info',$info)->assign('infos',$infos);
                         $m = M("good");
                         $where = "good_id=$good_id";
                         $ar = M('comment m')->join("inner join ts_user1 u on u.uid=m.uid")->where($where)->select();//查询评论信息
                         $sum=  count($ar);//总记录数
                         $num1=array();
                         $num2=array();
                         $num3=array();
                         $res=array();
                         foreach ($ar as $vo){
                         $res[]=  json_decode($vo['imp']);//获取买家印象
                           if($vo['start']==5){
                              $num1[]=$vo['start'];
                          }elseif ($vo['start']==0) {
                               $num3[]=$vo['start'];
                          }  else {
                              $num2[]=$vo['start'];
                     }
                }
                      foreach($res as $v){
                           $res1=array_count_values($v);
                    }
        $re1 = count($num1);
        $re2 = count($num2);
        $re3 = count($num3);
        $str1=$re1/$sum*100;//获取好评率
        $str2=$re2/$sum*100;
        $str3=$re3/$sum*100;
        $old=$res1['old'];
        $high=$res1['high'];
        $pretty=$res1['pretty'];
        $black=$res1['black'];
        $nor=$res1['nor'];
        $this->assign("old",$old)->assign("high",$high)->assign("pretty",$pretty)->assign("nor",$nor)->assign("black",$black);
        $this->assign("str1",$str1)->assign("str2",$str2)->assign("str3",$str3);
         $this->assign('ar',$ar)->display();
            
            
            }
			public function cart(){
			   if(IS_GET){
				  // session(null);
			      $good_id=I('get.good_id');
				  if(!isset($_SESSION['goods'])){
					 $_SESSION['goods'] = array();
				  }
				  foreach($_SESSION['goods'] as $v){
					if($v['good_id']==$good_id){
						$this->error('商品添加重复',U('Good/showgood',array("good_id"=>$good_id)),2);
					}
				  }
                 $info=M('good')->find($good_id);
				  if($info['good_num']==0){
				     $this->error('库存不足哦',U('Good/showgood',array("good_id"=>$good_id)),2);
				  }
				    $num1 = count($_SESSION['goods']);
					$_SESSION['goods'][] = array("good_id"=>$good_id,"good_num"=>1);
					$num2 = count($_SESSION['goods']);
					if($num2-1==$num1){
						$this->redirect("Home/Good/cartgood",array("good_id"=>$good_id));
					}else{
						$this->error("商品添加失败",U('Good/showgood',array("good_id"=>$good_id)),2);
					}
				}
			}
			public function cartgood(){ //dump($_SESSION['goods']);//exit;
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
			  $this->assign('info',$info);
			  $this->display();
			}
	   public function delgood(){
		 if(!isset($_SESSION['goods'])||!isset($_GET['good_id'])||count($_SESSION['goods'])<1){
					$this->redirect("Home/Index/goodlist");
					exit;
		   }
			$res=array();
		     foreach($_SESSION['ids'] as $v){
					if($v!=$_GET['good_id']){
						$res[]=$v;	
					}
				}
				$_SESSION['ids']=$res;
				$num1 = count($_SESSION['goods']);
				$new = array();
				foreach($_SESSION['goods'] as $vo){
					if($vo['good_id']!=$_GET['good_id']){
						$new[] = $vo;
					}
				}
				$_SESSION['goods'] = $new;
				$num2 = count($_SESSION['goods']);
				if($num1==$num2+1){				 
					$this->redirect("Home/Good/cartgood");
				}else{					
					$this->error("商品删除失败",U('Index/goodlist'),10);
				}
	   }
    }