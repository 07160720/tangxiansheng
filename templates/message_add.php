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
	<span style="font-size: 13px;color: gray;" >增加留言</span>
</div>
<!--当前操作  -->

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="message.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table" cellspacing="10px">  
          <tr>
            <td class="label">&nbsp;&nbsp;&nbsp;&nbsp;姓名:</td>
            <td><input type="text" name="name" value=""  size="25" /></td>
          </tr>
          <tr >
            <td class="label" id="">&nbsp;&nbsp;&nbsp;&nbsp;电话:</td>
            <td >
             <input name="phone" type="text" size="25" value=""  />  
            </td>
          </tr>
           <tr >
            <td class="label" id="">&nbsp;&nbsp;&nbsp;&nbsp;邮箱:</td>
            <td >
             <input name="email" type="text" size="25" value=""  />  
            </td>
          </tr>
           <tr >
            <td class="label" id="">&nbsp;&nbsp;&nbsp;&nbsp;地址:</td>
            <td >
             <input name="adress" type="text" size="45" value=""  />  
            </td>
          </tr>
          
          <tr>
          	<td class="label">&nbsp;&nbsp;&nbsp;&nbsp;留言:</td>
          	<td><textarea  name="message"  style="width:300px;height:40px;"></textarea></td>
          </tr>
          <tr>
             <td >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td>
            <input type="submit" value="  确定   "  />    
          	<input type="reset" value="  重置  "  />
          	</td>
          </tr>
        </table>

        <input type="hidden" name="act" value="add" />
      </form>
   	 </div>

<script  language="JavaScript" >
/**
 * 检查表单输入的内容是否为空
 */
function validate()
{		
	 	var validator = new judge();
	    
	    validator.required('name', '名字不能为空！');
	    
	    validator.required('phone', '电话不能为空！');
	    validator.required('message', '留言不能为空！');
	    return validator.passed();
}
</script>
</body>
</html>