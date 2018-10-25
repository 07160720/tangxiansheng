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
@header("Content-type:text/html;charset=UTF-8"); //把编码转换为utf8
require_once ('../includes/page_validate.php'); //验证是否是用户登录

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    body {color:#555;}
    #tabbody-div img{height: 50px; border: 1px solid #eee;}
    #tabbody-div form{padding-top: 30px; margin-top:20px; border-top: 1px solid #ccc;}
</style>
</head>

<body >
    <!--当前操作  -->
    <div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
    	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
    	<span style="font-size: 13px;color: gray;" >网站logo管理</span>
    </div>
    <!--当前操作  -->
    
	<div id="tabbody-div">
		<span>当前网站logo:</span>
 		<img src="../img/logo.png?rand=<?php echo time();?>" alt="" /> 
		<form enctype="multipart/form-data" action="?" method="post">
			<span>*请上传png格式的logo图片</span><br/><br/>
			<span>上传新的logo:</span>
			<input type="file" name="upfile" value="" accept="image/png/jpg"/>
			<input type="submit" name="btn" value="   上传    " /><br />
		</form>
		
	</div>

</body>
</html>
<?php

    // 全局变量,图片的格式
    $arrType = array('image/jpg','image/gif','image/png','image/jpeg','image/pjpeg','image/x-png','image/x-icon');
    
    $max_size = '500000'; // 最大文件限制（单位：byte）
    
    $dir = '../img/'; // 图片目录路径
    
    @$file = $_FILES['upfile']; //获取上传的文件数组
    
   if ($_SERVER['REQUEST_METHOD'] == 'POST') { //判断提交方式是否为POST
       
        if (! is_uploaded_file($file['tmp_name'])) { //判断上传文件是否存在
            
            echo "<font color='#FF0000'>文件不存在！</font>";
            exit;
        }
       
        if ($file['size'] > $max_size) {  //判断文件大小是否大于500000字节
            echo "<font color='#FF0000'>上传文件太大！</font>";
            exit;
        } 
        if (! in_array($file['type'], $arrType)) {  //判断图片文件的格式
            echo "<font color='#FF0000'>上传文件格式不对！</font>";
            exit;
        }
        
        if (! file_exists($dir)) {  // 判断存放文件目录是否存在,不存在就创建
            
            mkdir($dir, 0777, true);
        }
        
        //$imageSize = getimagesize($file['tmp_name']);
        
        //$img = $imageSize[0] . 'x' . $imageSize[1]; // 获取图片的大小
        
        $fname = 'logo.png';
        
        //$ftype = end(explode('.', $fname));//获取文件后缀名
        
        $picName = $dir . $fname;
        
        if (file_exists($picName)) {
          unlink($picName);
        }
        
        if (! move_uploaded_file($file['tmp_name'], $picName)) { 
            
            echo "<font color='#FF0000'>移动文件出错！不能上传中文名称的文件</font>";
            exit;
            
        }
   }
  ?>