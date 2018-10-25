<?php
/**
 * 后台文章管理程序文件
 * ============================================================================
 * 版权所有 2018 
 *-----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: 李坤霖  Contact: 1079539864@qq.com  
*/

@header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8
	class MyDB
	{
		private $con = null;     //
	 
		private function getConn()
		{
			if ($this->con === null)
			{
				
		       $this->con = mysql_connect('localhost', 'root', 'root')or die("数据库连接错误");
			    mysql_select_db('tangxiansheng', $this->con) or die("选择数据库错误");
				mysql_query("set names 'utf8' ");
				mysql_query("set character_set_client = utf8");//设置给上传服务器时的编码方式
				mysql_query("set character_set_results = utf8");//设置输出result的编码方式
			}	
			
		}
		public function Query($query)
		{
		    $this->getConn();
		    $result = mysql_query($query) or die ("数据库无法操作sql语句！");
		    
		    return $result;
		}
		public function GetData($query) 
		{
			$this->getConn();
			$data = null;
			$result = mysql_query($query) or die ("数据库无法操作sql语句！");
			$data = mysql_fetch_array($result);
			
			return $data; 
		}
		public function GetDatas($query)
		{
		    $this->getConn();
		    $sum = 0; $datas = null;
		    $result = mysql_query($query) or die ("数据库无法操作sql语句！");
    		while (!! $row = mysql_fetch_array($result)) {
                $datas[$sum ++] = $row;
            }
            mysql_free_result($result);
		    return $datas;
		}
		
		public function GetLastInsertId()
		{
			$this->getConn();
			$result = mysql_insert_id($this->con);
			
			return $result;
		}
		
		public function GetAffectedRows()
		{
			$this->getConn();
			$result = mysql_affected_rows($this->con) or die ('Can not');
			
			return $result;
		}

	}

?>