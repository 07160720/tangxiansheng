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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    body{font-size: 13px; color:#333;}
    .main-div {text-align: center;margin-top: 150px;}
    .main-div div{margin-top: 15px;}
    .main-div a {display:inline-block; width:150px; height:25px; line-height:25px; border: 1px solid #ccc; background: #eee; color:#333; border-radius:1px;}
    .main-div .refresh{padding:5px 0px; background: #ccc; }
</style>
</head>

<body >
<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >更新内容</span>
</div>
<!--当前操作  -->

<div class="main-div">
	<div><a href="../manage/refresh_all.php" class="refresh">一键更新所有内容 </a></div>
	<div><a href="../manage/create_index.php?act=goback" >只更新首页</a></div>
</div>

</body>
</html>