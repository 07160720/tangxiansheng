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
</head>

<body >

<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >增加品牌</span>
</div>
<!--当前操作  -->

<!-- start client form -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="./brand.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table"  cellspacing="10px" >  
          
          <tr>
            <td class="label" >品牌名称:</td>
            <td>
              	<input type="text" name="ch_name" size="50" />
              	<span class="link-span">（如：九秒九牛排杯）</span> 
            </td>
          </tr>
           <tr>
            <td class="label" >品牌链接:</td>
            <td>
              	<input type="text" name="link" size="50" />
              	<span class="link-span">（如：九秒九牛排杯）</span> 
            </td>
          </tr>
          <tr>
          	<td class="label">品牌描述:</td>
          	<td>
          		<textarea  name="description"  style="width:80%;height:50px;resize:none;" maxlength="100" ></textarea>
          		<span class="link-span">（字符数限定在100左右）</span>
          	</td>
          </tr>
          <tr>
            <td class="label" >品牌logo:</td>
            <td >
              	<input type='file' name='brand_img0'  onchange="checkFileType(this,'png')" />
              	<span class="link-span">（上传的文件格式应为png, 大小：135 x 80）</span>
            </td>
          </tr>
         <tr>
            <td class="label" >产品图片:</td>
            <td >
              	<input type='file' name='brand_img1'  onchange="checkFileType(this,'jpg')" />
              	<span class="link-span">（上传的文件格式应为jpg, 大小：260 x 220）</span>
            </td>
          </tr> 
          <tr>
             <td >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td>
                <input type="submit" value="  保存   " />    
              	<input type="reset" value="  重置   " />
          	</td>
       	</tr>
        </table>
		
        <input type="hidden" name="act" value="add" />
        
      </form>
   	 </div>
	
<script language="JavaScript" src="../js/judge.js"></script>
<script  language="JavaScript" >
	/**
 	 * 检查文件的类型 
	**/ 
     function checkFileType(obj, type){
    	 fileType=obj.value.substr(obj.value.lastIndexOf(".")).toLowerCase();//获得文件后缀名
    	 
    	 if(fileType != "."+type){
    		 obj.value = "";//清空输入框
             alert("文件格式必须为*."+type);
             return false;
         }
     }
	
    /**
     * 检查表单输入的内容是否为空
     */
    function validate()
    {			
    	var validator = new judge();
    	    
    	validator.required('ch_name', '品牌名不能为空！');
    	
    	validator.required('link', '链接不能为空！');
    	
    	validator.required('description', '品牌描述不能为空！');
    	
    	validator.required('brand_img0', '请选择logo文件！');
    	
    	validator.required('brand_img1', '请选择图片文件！');
    	    
    	return validator.passed();
    }
</script>
</body>
</html>