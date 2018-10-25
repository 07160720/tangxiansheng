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

ob_start();//防止output导致header出错
@header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8
require_once ('../includes/page_validate.php');//验证是否是用户登录
include_once ('../includes/config.php');

$config = "../includes/config.php";


if (@$_POST['act']=="modify"){
    
    $arguments = array(
                    "WEB_NAME" => $_POST['web_name'],
                    "cfg_webname" => $_POST['cfg_webname'],
                    "cfg_index_title" => $_POST['cfg_index_title'],
                    "cfg_keywords" => $_POST['cfg_keywords'],
                    "cfg_description" => $_POST['cfg_description'],
                    "cfg_company" => $_POST['cfg_company'],
                    "cfg_address" => $_POST['cfg_address'],
                    "cfg_phone" => $_POST['cfg_phone'],
                    "cfg_icp" => $_POST['cfg_icp'],
                    "cfg_53kf" => $_POST['cfg_53kf']
        
    );

    foreach ($arguments as $name => $value) {
        
        update_config($config, $name, $value);
    }
    
    header('Location: ?');//刷新当前页面
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
<script language="JavaScript" src="../js/judge.js"></script>

</head>
<body >

    <!--当前操作  -->
    <div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
    <span style="font-size: 13px;color: #555555;">当前操作 ></span>
    <span style="font-size: 13px;color: gray;" >系统参数设置</span>
    </div>
    <!--当前操作  -->
    <!-- start client form -->

    <!-- tab body -->
    <div id="tabbody-div">
    	<form enctype="multipart/form-data" action="?.php" method="post" name="theForm" onsubmit="return validate()" >
    		<table width="90%" id="general-table" cellspacing="10px">
    			
            	<tr>
                    <td class="label">后台名称:</td>
                    <td><input type="text" name="web_name" value="<?php echo $WEB_NAME;?>"  size="100" /></td>
                </tr>
    			<tr>
                    <td class="label">网站名称:</td>
                    <td><input type="text" name="cfg_webname" value="<?php echo $cfg_webname;?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">首页标题:</td>
                    <td><input type="text" name="cfg_index_title" value="<?php echo $cfg_index_title;?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">站点关键字:</td>
                    <td><input type="text" name="cfg_keywords" value="<?php echo $cfg_keywords;?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">站点描述:</td>
                    <td><textarea name="cfg_description" style="width:630px;height:50px;"><?php echo $cfg_description;?></textarea></td>
                </tr>
                <tr>
                    <td class="label">公司名称:</td>
                    <td><input type="text" name="cfg_company" value="<?php echo $cfg_company;?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">公司地址:</td>
                    <td><input type="text" name="cfg_address" value="<?php echo $cfg_address;?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">加盟热线:</td>
                    <td><input type="text" name="cfg_phone" value="<?php echo $cfg_phone;?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">网站备案号:</td>
                    <td><input type="text" name="cfg_icp" value="<?php echo $cfg_icp;?>"  size="100" /></td>
                </tr>
                <tr>
                    <td class="label">53kf:</td>
                    <td>
                    	<input type="text"  name="cfg_53kf" value="<?php echo $cfg_53kf;?>"  size="100" />
                    	<input type="button" value="插入" onclick="kfmsg.click()" > 
    					<input type="hidden"  name="kfmsg" value="http://tb.53kf.com/kf.php?arg=10127835&style=1" onclick="cfg_53kf.value=this.value">
                    </td>
                </tr>
              	<tr>
                 	<td >&nbsp;</td>
              	</tr>
          		<tr>
            		<td >&nbsp;</td>
                	<td>
                        <input type="submit" id="save" value="  保存   "  />&nbsp;&nbsp;    
                      	<input type="reset" value="  重置  " />
              		</td>
          		</tr>
        	</table>

        <input type="hidden" name="act" value="modify" />
      </form>
	</div>
	

<script type="text/javascript">

    //给提交按钮添加键盘监听事件“ctrl + s”
    document.onkeydown = function(e) {
        
        var keyCode = e.keyCode || e.which || e.charCode;
        var ctrlKey = e.ctrlKey || e.metaKey;
        
        if(ctrlKey && keyCode == 83) {
            
        	document.getElementById("save").click();//调用按钮点击
            
            return false;	
        }
       
    }
    function validate(){
    	alert("成功配置参数！");
    	return true;
    }
</script>
</body>
</html>
