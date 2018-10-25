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
date_default_timezone_set('Asia/Shanghai');/*设置时区*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../js/judge.js"></script>

<!-- kindeidtor编辑器设置 -->
<link rel="stylesheet" href="../js/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="../js/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="../js/kindeditor/lang/zh-CN.js"></script>
<script type="text/javascript">
	var editor,temp = true;
	KindEditor.ready(function(K) {
		
		editor = K.create('textarea', {
			allowFileManager : true,
			pasteType : 1, //只允许纯文本黏贴
			items : [
						'source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'link'
					]
		});
		
	});
</script>
<!-- kindeidtor编辑器设置 -->

<style type="text/css">

</style>

</head>

<body >

<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >增加招聘信息</span>
</div>
<!--当前操作  -->
<!-- start client form -->

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="recruit.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table"  cellspacing="10px" >  
          <tr >
            <td class="label" >职位名称:</td>
            <td><input type="text" name="position" value=""  size="25" /></td>
          </tr>
          <tr >
            <td class="label" >薪资:</td>
            <td >
              <input type="text" name="salary" value="面议" size="25" /><span class="link-span">*输入薪资如3000-5000 或者 “面议”</span> 
            </td>
          </tr>
          <tr>
            <td class="label">招聘人数:</td>
            <td><input type="text" name="quantity" value="" size="1" /></td>
          </tr>
          <tr >
            <td class="label" >工作地点:</td>
            <td >
              <input type="text" name="place"  value="广州白云" size="25" /> 
            </td>
          </tr>
          <tr >
            <td class="label" >更新时间:</td>
            <td >
              <input type="text" name="date"  value="<?echo date('Y-m-d  H:i',time());?>" size="25" /> 
            </td>
          </tr>
          <tr>
          	<td class="label">职位描述:</td>
          	<td><textarea  name="description"  style=" width:80%; height:200px; " ></textarea></td>
          </tr>
          <tr>
          	<td class="label">任职资格:</td>
          	<td><textarea  name="qualification" style=" width:80%; height:200px; "></textarea></td>
          </tr>
          <tr>
          	<td class="label">薪酬待遇:</td>
          	<td><textarea  name="treatment" style=" width:80%; height:150px; "></textarea></td>
          </tr>
          <tr>
          	<td class="label">联系方式:</td>
          	<td><textarea  name="contact" style=" width:80%; height:100px; "></textarea></td>
          </tr>
          <tr>
             <td >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td>
            
                <input type="submit" name="save" value="  保存   "  />    
              	<input type="reset" value="  重置   "  />
              	<input type="hidden" name="act" value="add" /><!-- 隐藏的操作属性 -->
              	
          	</td>
          </tr>
        </table>
      </form>
   	 </div>
	

<script  language="JavaScript" >
/**
 * 检查表单输入的内容是否为空
 */
function validate()
{		
	 	var validator = new judge();
	    
	    validator.required('position', '"职位名称"还没填写！');
	    
	    validator.required('quantity', '"招聘人数"还没填写！');
	     
	    validator.required('description', '"职位描述"还没填写！');
	
	    validator.required('qualification', '"任职资格"还没填写！');
		
	    validator.required('treatment', '"薪酬待遇"还没填写！');
		
	    validator.required('contact', '"联系方式"还没填写！');
		
	    return validator.passed();
    
}
</script>
</body>
</html>