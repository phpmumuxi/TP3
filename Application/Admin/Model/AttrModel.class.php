<?php
namespace Admin\Model;
use Think\Model;
class AttrModel extends Model{
   //表单自动验证（由create()方法触发）
   protected $_validate=array(
	   array('type_id','0',"类型必须选择 ",0,'notequal'),
   );
}