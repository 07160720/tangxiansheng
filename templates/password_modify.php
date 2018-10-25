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
<style type="text/css">

span.info{background:#FFF;border:0px solid #F99;font-size:14px;color:gray;}  
span.ok{background:#FFF;border:0px solid #F99;font-size:14px;color:green;}  
span.bad{background:#FCC;border:1px solid #F99;padding:2px;font-size:14px;color:black;}

</style>
</head>

<body >

<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >修改密码</span>
</div>
<!--当前操作  -->
<!-- start client form -->

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="password.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table" align="center" >
          <tr>
            <td class="label">原密码:</td>
            <td><input type="password" name="ad_password"  style="float:left;color:;" size="25" /></td>
          </tr>
         <tr>
            <td class="label" >新密码:</td>
            <td >
             <input type="password" id="new_password1" name="new_password1"  size="25"  onblur="verify_password();"/>
             <span  id="modify_password_tip1" class="info" >以字母开头，长度在6~18之间，只能包含字符、数字和下划线</span>  
            </td>
          </tr>
          <tr>
            <td class="label">密码确认:</td>
            <td>
            <input type="password" id="new_password2" name="new_password2"  size="25" onblur="comfirm();"/>
            <span id="modify_password_tip2" ></span>
            </td>
          </tr>
          <tr>
             <td >&nbsp;</td><td >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td>
            <input type="submit" value="  确定   "  />    
          	<input type="reset" value="  重置  "  />
          	</td>
          </tr>
        </table>
		
        <input type="hidden" name="act" value="password_modify" />
      </form>
   	 </div>

	
<script language="JavaScript" src="../js/judge.js"></script>
<script  language="JavaScript" >
  document.forms['theForm'].elements['ad_password'].focus();
  /**
   * 检查表单输入的内容
   */
  function verify_password(){
	var add_password=document.getElementById("new_password1").value;
	var tips = document.getElementById("modify_password_tip1");
	var reg=/^[a-zA-Z]\w{5,17}$/;//正则表达式"以字母开头，长度在6~18之间，只能包含字符、数字和下划线"
	
	if(!reg.test(add_password)){
		tips.className='bad';
		tips.innerHTML = '以字母开头，长度在6~18之间，只能包含字符、数字和下划线';
		return false;
	}else{
		tips.className='ok';
		tips.innerHTML = '√ ';
		return true;
	}
  
}
  /**
   * 检查两次输入的密码是否正确
   */
  function comfirm(){
		var pw1=document.getElementById("new_password1").value;
		var pw2=document.getElementById("new_password2").value;
		var tips = document.getElementById("modify_password_tip2");
		if(pw1 != pw2){
			tips.className='bad';
			tips.innerHTML = '密码不一致';
			return false;
		}else{
			tips.className='ok';
			tips.innerHTML = '√ ';
			return true;
		}
	  }
  function validate()
  {		
	 	 var validator = new judge();
	    validator.required('ad_password', '原密码不能为空！');
	    validator.required('new_password1', '新密码不能为空！');
	    validator.required('new_password2', '确认密码不能为空！');
	    
 		var isTrue=validator.passed() && verify_password() && comfirm();
	    
	    return isTrue;
  }
  
</script>
</body>
</html>