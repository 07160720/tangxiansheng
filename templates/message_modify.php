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

require_once ('../includes/page_validate.php');//验证是否是用户登录
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../js/judge.js"></script>

</head>

<body >

<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >修改留言</span>
</div>
<!--当前操作  -->
<!-- start client form -->
<div class="tab-div">
    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="message.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table" cellspacing="10px"> 
        
         <?php 
        $id=$_GET['id'];
        $sql="SELECT * FROM message WHERE id=$id";
        include '../includes/db_connect.php';
	    $db=new MyDB();
        $data[0]=$db->GetData($sql);
        
        echo '
          <input type="hidden" name="id" value="'.$id.'" />
          <tr>
            <td class="label">姓名:</td>
            <td><input type="text" name="name" value="'.$data[0]["name"].'"  style="float:left;" size="30" /></td>
          </tr>
          <tr >
            <td class="label" id="promote_5">电话:</td>
            <td><input type="text" name="phone" value="'.$data[0]["phone"].'"  style="float:left;" size="30" /></td>    
          </tr>
          <tr>
          	<td class="label">留言:</td>
          	<td><textarea  name="message"  style="width:300px;;height:40px;">'.$data[0]["message"].'</textarea></td>
          </tr>
          <tr>
             <td >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td>
            <input type="submit" value="  保存   " />    
          	<input type="reset" value="  重置  " />
          	</td>
          </tr>
       ';?>
        </table>

        <input type="hidden" name="act" value="modify" />
      </form>
   	 </div>
	</div>

<script  language="JavaScript" >

  /**
   * 检查表单输入的内容是否为空
   */
  function validate()
  {		
	 	var validator = new judge();
	    
	    validator.required('name', '姓名不能为空！');
	    validator.required('phone', '电话不能为空！');
	    validator.required('message', '留言不能为空！');
	    return validator.passed();
  }
</script>
</body>
</html>