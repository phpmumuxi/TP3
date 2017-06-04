<?php
namespace Common;
	class Page {  
		private $total;      //总记录  
		private $listRows;    //每页显示行数  
		private $limit;          //limit  
		private $pageNum;      //总页码  
		private $uri;           //地址  
		private $config=array('header'=>"个记录","prev"=>"上一页","next"=>"下一页","first"=>"首页","last"=>"尾页");
        private $listNum=8;
		private $offset = 0;

		//构造方法初始化   $pa="uid=3";外加的条件
		public function __construct($total,$listRows,$pa="") {  
			$this->total = $total;  
			$this->listRows = $listRows;
			$this->uri= $this->getUri($pa);
			$this->page =!empty($_GET["page"])?$_GET["page"]:1;
			$this->pageNum = ceil($this->total / $this->listRows);    
			$this->limit = $this->setLimit(); 
		}  
		private function setLimit(){
		   $this -> offset = ($this->page - 1) * $this->listRows;
		   return "LIMIT ".($this->page-1)*$this->listRows.",$this->listRows";
		}
		private function getUri($pa) {    
			 $url = $_SERVER["REQUEST_URI"].(strpos($_SERVER["REQUEST_URI"],'?')?'':"?").$pa;  
			 $parse = parse_url($url);  
			 if (isset($parse['query'])) {  
					parse_str($parse['query'],$params);  
					unset($params['page']);  
					$url = $parse['path'].'?'.http_build_query($params);  
			 }  
			 return $url;  
	    }
		public function __get($args) {  
			if($args=="limit"){
		        return $this->limit;
			}
			else if ($args == 'offset'){
               return $this -> offset;
			}
			else{
			   return null;
			}
		}
        private function start(){
		     if($this->total==0)
				return 0;
			 else
				return  ($this->page-1)*$this->listRows+1;		
		}
		private function end(){
		    return min($this->page*$this->listRows,$this->total);
		}
	    private function first(){
			 $html="";
			 if($this->page==1)
				$html.="&nbsp;<a href='{$this->uri}&page=1'>首页</a>&nbsp;";
			 else
				$html.="&nbsp;<a href='{$this->uri}&page=1'>{$this->config["first"]}</a>&nbsp;";
              return $html;
		 }
		 private function prev(){
		    $html="";
			 if($this->page==1)
				$html.="&nbsp;<a href='{$this->uri}&page=1'>上一页</a>&nbsp;";
			 else
				$html.="&nbsp;<a href='{$this->uri}&page=".($this->page-1)."'>{$this->config["prev"]}</a>&nbsp;";
             return $html;
		 }
		 private function pageList(){
			 $start=(($this->page-$this->listNum)<1)?1:$this->page-$this->listNum;
			 $end=(($this->page+$this->listNum)>$this->pageNum)?$this->pageNum:$this->page+$this->listNum;
			 $linkPage="";
            for($i=$start;$i<=$end;$i++){
			  if($i==$this->page){
                $linkPage.="&nbsp;".($this->page)."&nbsp;";
			  }else{
			    $linkPage.="&nbsp;<a href='{$this->uri}&page={$i}'>{$i}</a>&nbsp;";
			  }
			}
			return $linkPage;
		 }
		 private function next(){
		    $html="";
			if($this->page==$this->pageNum)
				$html.="&nbsp;<a href='{$this->uri}&page=$this->pageNum'>下一页</a>&nbsp;";
			else
				$html.="&nbsp;<a href='{$this->uri}&page=".($this->page+1)."'>{$this->config["next"]}</a>&nbsp;";
			return $html;
		 }
		 private function last(){
		    $html="";
			if($this->page==$this->pageNum)
				$html.="&nbsp;<a href='{$this->uri}&page=$this->pageNum'>尾页</a>&nbsp;";
			else
				$html.="&nbsp;<a href='{$this->uri}&page=".($this->pageNum)."'>{$this->config["last"]}</a>&nbsp;";
			return $html;
		 }
		 private function goPage(){
		    return '&nbsp;<input type="text" onkeydown="javascript:if(event.keyCode==13){var page=(this.value>'.$this->pageNum.')?'.$this->pageNum.':this.value;location=\''.$this->uri.'&page=\'+Math.abs(page)+\'\'}" value="'.$this->page.'"size=2px><input type="button" value="GO" onclick="javascript:var page=(this.previousSibling.value>'.$this->pageNum.')?'.$this->pageNum.':this.previousSibling.value;location=\''.$this->uri.'&page=\'+Math.abs(page)+\'\'">&nbsp;';
		 }
		 function fpage($display=array(0,1,2,3,4,5,6,7,8)){
		    $html[0]="&nbsp;共有<b>{$this->total}</b>{$this->config["header"]}&nbsp;";
		    $html[1]="每页显示<b>".($this->end()-$this->start()+1)."</b>条，本页 <b>{$this->start()}-{$this->end()}</b>条&nbsp;";
            $html[2]="<b>{$this->page}/{$this->pageNum}</b>页&nbsp;";
                    $html[3]=$this->first();
                    $html[4]=$this->prev();
                    $html[5]=$this->pageList();
                    $html[6]=$this->next();
                    $html[7]=$this->last();
                    $html[8]=$this->goPage();
                    $fpage='';
                    foreach($display as $index){
                         $fpage.=$html[$index];
                    }
                    return $fpage;
		 }
    }