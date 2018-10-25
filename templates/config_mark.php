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

ob_start(); //防止output导致header出错
header("Content-type:text/html;charset=UTF-8"); //把编码转换为utf8
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
require_once ('../includes/page_validate.php'); //验证是否是用户登录
include_once ('../includes/config.php');

$config = "../includes/config.php";

if (@$_POST['act']=="modify"){

    $arguments = array(
        "cfg_water_off" => $_POST['cfg_water_off'],
        "cfg_water_type" => $_POST['cfg_water_type'],
        "cfg_water_text" => $_POST['cfg_water_text'],
        "cfg_water_fontsize" => $_POST['cfg_water_fontsize'],
        "cfg_water_position" => $_POST['cfg_water_position'],
        "cfg_water_color" => $_POST['cfg_water_color']
    );

    foreach ($arguments as $name => $value) {

        update_config($config, $name, $value);
    }

    header('Location: ?');//刷新当前页面
}
/*----------------------------------------------------------*/
/*上传水印图片*/
/*----------------------------------------------------------*/
if (!empty($_FILES["upimg"]['tmp_name'])){

    $upimg = $_FILES["upimg"]; //获取传输过来的图片文件

    if (! in_array($upimg['type'], array('image/png', 'image/x-png'))) {  //判断图片文件的格式,兼容IE8格式

        exit($upimg['type']. "， <font color='#FF0000'>上传文件格式不对！</font>");
    }

    $temp_name = $upimg['name']; //原文件名字
    $ftype = explode('.', $temp_name);//获取图片类型

    $fname = 'waterlogo.'. $ftype[1]; // 更改后的文件名
    $picName = "../js/kindeditor/php/". $fname;//路径名+文件名

    if (! move_uploaded_file($upimg['tmp_name'], $picName)) {//将上传的图片从临时路径传到指定的目录里面
        
        exit("<font color='#FF0000'>移动文件出错！</font>");
    }
    
}

function update_config($file, $ini, $value){ //更改配置变量的值

    if ( ! file_exists($file) ) return false;

    $str = file_get_contents($file);

    $str2 = "";

    $str2 = preg_replace("/".preg_quote($ini)." = (.*);/", $ini." = \"".$value."\";", $str);

    file_put_contents($file, $str2);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />

<style type="text/css">
    #general-table td.label{width: 220px;}

</style>

</head>
<body >

    <!--当前操作  -->
    <div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
    <span style="font-size: 13px;color: #555555;">当前操作 ></span>
    <span style="font-size: 13px;color: gray;" >图片水印设置</span>
    </div>
    <!--当前操作  -->
    <!-- start client form -->

    <!-- tab body -->
    <div id="tabbody-div">
    	<form enctype="multipart/form-data" action="?" method="post" name="theForm" onsubmit="return validate()" >
    		<table width="90%" id="general-table" >
            	<tr>
                    <td class="label">上传的图片是否使用图片水印功能:</td>
                    <td>
                    	<input type="radio" name="cfg_water_off" value="1" <?php echo $cfg_water_off==1?'checked="checked"':'';?>/>开&nbsp;
                        <input type="radio" name="cfg_water_off" value="0" <?php echo $cfg_water_off==0?'checked="checked"':'';?>/>关 
                    </td>
                </tr>
    			<tr>
                    <td class="label">选择水印的文件类型:</td>
                    <td>
                    	<input type="radio" name="cfg_water_type" value="1" <?php echo $cfg_water_type==1?'checked="checked"':'';?>/>文字&nbsp;
                        <input type="radio" name="cfg_water_type" value="0" <?php echo $cfg_water_type==0?'checked="checked"':'';?>/>图片 
                    </td>
                </tr>
                <tr>
                    <td class="label">水印图片:</td>
                    <td><img src="../js/kindeditor/php/waterlogo.png" alt="" style="background: #ccc;"/></td>
                </tr>
                <tr>
                    <td class="label">上传新的水印图片:</td>
                    <td><input type="file" name="upimg" onchange="checkFileType(this)"/></td>
                </tr>
                <tr>
                    <td class="label">水印文字:</td>
                    <td><input type="text" name="cfg_water_text" value="<?php echo $cfg_water_text;?>"  size="30" /></td>
                </tr>
               <tr>
                    <td class="label">水印文字字体大小:</td>
                    <td><input type="text" name="cfg_water_fontsize" value="<?php echo $cfg_water_fontsize;?>"  size="8" /></td>
                </tr>
                <tr>
                    <td class="label">水印文字颜色(默认为白色):</td>
                    <td><input type="text" name="cfg_water_color" value="<?php echo $cfg_water_color;?>"  size="8" /></td>
                </tr>
                <tr>
                    <td class="label">水印位置:</td>
                    <td>
                        <table width="300" border="1" cellspacing="0" cellpadding="0" >
                        
                    		<tr>
                                <td><input type="radio" name="cfg_water_position"  value="0" <?php echo $cfg_water_position==0?'checked="checked"':'';?>/> 顶部居左</td>
                                <td><input type="radio" name="cfg_water_position"  value="1" <?php echo $cfg_water_position==1?'checked="checked"':'';?>/>顶部居中</td>
                                <td><input type="radio" name="cfg_water_position"  value="2" <?php echo $cfg_water_position==2?'checked="checked"':'';?>/>顶部居右</td>
                          	</tr>
                          	<tr>
                                <td><input type="radio" name="cfg_water_position"  value="3" <?php echo $cfg_water_position==3?'checked="checked"':'';?>/>中部居左</td>
                                <td><input type="radio" name="cfg_water_position"  value="4" <?php echo $cfg_water_position==4?'checked="checked"':'';?>/>图片中心</td>
                                <td><input type="radio" name="cfg_water_position"  value="5" <?php echo $cfg_water_position==5?'checked="checked"':'';?>/>中部居右</td>
                          	</tr>
                          	<tr>
                                <td><input type="radio" name="cfg_water_position"  value="6" <?php echo $cfg_water_position==6?'checked="checked"':'';?>/>底部居左</td>
                                <td><input type="radio" name="cfg_water_position"  value="7" <?php echo $cfg_water_position==7?'checked="checked"':'';?>/>底部居中</td>
                                <td><input type="radio" name="cfg_water_position"  value="8" <?php echo $cfg_water_position==8?'checked="checked"':'';?>/>底部居右</td>
                          	</tr>
                        </table>
					</td>
                </tr>
              	<tr>
                 	<td >&nbsp;</td><td >&nbsp;</td>
              	</tr>
          		<tr>
            		<td >&nbsp;</td>
                	<td>
                        <input type="submit" value="  保存   "  />&nbsp;&nbsp;    
                      	<input type="reset" value="  重置  " />
              		</td>
          		</tr>
        	</table>

        <input type="hidden" name="act" value="modify" />
      </form>
	</div>
	
<script language="JavaScript" src="../js/judge.js"></script>
<script  language="JavaScript" >
    /**
     * 检查文件的类型 
    **/ 
    function checkFileType(obj){
    
    var path = obj.value.toString();
    
    var perfix = path.substring(path.indexOf('.')+1);//获取后缀名
    
    var regExp = /(png)/gi; //'/(jpg|jpeg|gif|png)/gi'
    var hinttext = '对不起，请选择png格式图片！';
    
    if(perfix.match(regExp)){
    	
    	return true;
    
    }else{
    	
    	alert(hinttext);
    	obj.value = "";//清空输入框
    	
    	return false;
    } 
    }
    /**
     * 检查表单输入的内容是否为空
     */
    function validate(){
    
    	alert("成功配置参数！");
    	return true;
    }
</script>
</body>
</html>
