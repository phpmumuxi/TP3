<?php
namespace Admin\Model;
use Think\Model;
class CatModel extends Model{
  public function tree($arr,$fid = 0,$level = 0){
		$res = array();
		foreach ($arr as $v) {
			if ($v['cat_fid'] == $fid) {
				//说明找到，先保存，然后递归查找
				$v['level'] = $level;
				$res[] = $v;
				$res = array_merge($res,$this->tree($arr,$v['cat_id'],$level+1));
			}
		}
		return $res;
	}
}