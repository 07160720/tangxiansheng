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

	ob_start();
	require_once ('../includes/page_validate.php');//验证是否是用户登录
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/list.css" rel="stylesheet" type="text/css" />
</head>
<body >
<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >管理用户</span>
</div>
<!--当前操作  -->

<form  method="post" action="client.php" name="listForm" id="list-form" onsubmit="">
  <a href="user_add.php"><input type="button" value="增加用户" /></a>
	<div  id="list-div">
	<span style="color:#666;">*用户"1"只能发表文章，超级用户"2"可以查看留言，管理员"3"具有全部权限</span><br /><br />
    <table cellpadding="0" cellspacing="1">
      <tr >
        <th><span>用户名</span></th>
        <th><span>密码</span></th>
        <th><span>身份</span></th>
        <th><span>操作</span></th>
        
      </tr>
  
  <?php
  
        $sql = "SELECT * FROM user ORDER BY status ASC";

        /* 连接数据库获取数据 */
        include '../includes/db_connect.php';
        $db = new MyDB();
        
        $resource = $db->Query($sql);
     
    	while (! ! $data = mysql_fetch_array($resource)) {
    	
        	echo'<tr>
                	<td align="center"><span >'.$data['name'] .'</span></td>
                	<td align="center"><span >'.$data['password'] .'</span></td>
                	<td align="center"><span >'.$data['status'] .'</span></td>
                    <td align="center" >
                        
                    	<a href="user_modify.php?id='.$data['id'].'" title="编辑"><img src="../images/icon_edit.gif" width="16" height="16" border="0" /></a>
                    	
                    	<a href="javascript:void(0);" id="delete'.$data['id'].'" data="'.$data['name'].'" onclick="deleteData('.$data['id'].')" title="删除">
                        <img src="../images/delete.jpg" width="13" height="14" border="0" /></a>
                    	    
                	</td>
                </tr>
        	 ';
        }
	?>
	</table>
</div>
	<input type="hidden" name="act" value="deleteAll" />
</form>

<script type="text/javascript">

    function deleteData( id ){
    	
    	var title=document.getElementById('delete'+id).attributes["data"].value;
    	
    		if(confirm("确定要删除用户‘ " + title + " ’吗？")){
        		
    			window.location.href = "user.php?act=delete&id=" + id;
    			
    			return true;
    			
    		}else
    			return false;
    		
    }
</script>
</body>
</html>
