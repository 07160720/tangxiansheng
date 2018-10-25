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
include_once ('../includes/config.php');//验证是否是用户登录

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
	<body style="padding:0;margin:0;background:#80BDCB;overflow:hidden;font-size: 9px;">
		
		<div style="height:100% ; width:100%; position:absolute;text-align: center;">
		
			<p style="color: #555555;line-height: 25px;">© 2016-2017  <?php echo $cfg_company;?>餐饮管理有限公司 版权所有 All rights reserved. | <?php echo $cfg_icp;?></p>
		
		</div>
	</body>
</html>