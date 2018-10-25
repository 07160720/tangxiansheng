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
header("Content-type:text/html;charset=UTF-8"); //把编码转换为utf8
require_once ('../includes/page_validate.php');//验证是否是用户登录
include_once ('../includes/config.php');//全局变量文件
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title><?php echo $WEB_NAME;?>管理系统</title>
    <meta name="keywords" content="简单,实用,网站后台,后台管理,管理系统,网站模板" />
    <meta name="description" content="简单实用网站后台管理系统网站模板下载。" />
    <link rel="stylesheet" href="../css/pintuer.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h5><img src="../images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" /><?php echo $WEB_NAME;?>管理系统</h5>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="http://localhost/tangxiansheng/" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="clear_cache.php" class="button button-little bg-blue" target="_self"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="../webSystem.php?act=logout"><span class="icon-power-off"></span> 退出登录</a>
  &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red; font-weight:bold;font-size: 20px;"></span></div>
</div>
<div class="leftnav" style="position: absolute; top: 85px;">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">

    <h2><span class="icon-pencil-square-o"></span>文章管理</h2>
    <ul>
       <li><a href="news_add.php" target="right"><span class="icon-caret-right"></span>添加文章</a></li>
       <li><a href="news_check.php" target="right"><span class="icon-caret-right"></span>管理文章</a></li>
    </ul>  

    <h2><span class="icon-comments"></span>留言管理</h2>
    <ul>
       <li><a href="message_check.php" target="right"><span class="icon-caret-right"></span>查看留言</a></li> 
       <li><a href="message_chart.php" target="right"><span class="icon-caret-right"></span>统计留言</a></li>
    </ul>
    
    <h2><span class="icon-align-left"></span>内容管理</h2>
    <ul>
     <li><a href="logo_add.php" target="right"><span class="icon-caret-right"></span>网站logo</a></li> 
     <li><a href="banner_add.php" target="right"><span class="icon-caret-right"></span>网站banner图</a></li> 
     <li><a href="product_add.php" target="right"><span class="icon-caret-right"></span>产品图片</a></li> 
     <!--<li><a href="joins_add.php" target="right"><span class="icon-caret-right"></span>加盟资讯</a></li>-->
     <li><a href="content_about.php" target="right"><span class="icon-caret-right"></span>关于我们</a></li>
     <li><a href="content_contact.php" target="right"><span class="icon-caret-right"></span>联系我们</a></li>
   </ul>

   <h2><span class="icon-book"></span>模板管理</h2>
   <ul>
     <li><a href="refresh_tpl.php" target="right"><span class="icon-caret-right"></span>更新内容</a></li> 
     <li><a href="link_check.php" target="right"><span class="icon-caret-right"></span>友情链接</a></li> 
     <li><a href="column_check.php" target="right"><span class="icon-caret-right"></span>网站栏目管理</a></li> 
     <li><a href="img_check.php" target="right"><span class="icon-caret-right"></span>其他图片管理</a></li> 
     <li><a href="tpl_check.php" target="right"><span class="icon-caret-right"></span>模板管理</a></li> 
  </ul>

    <h2><span class="icon-wrench"></span>系统设置</h2>
    <ul>
     <li><a href="password_modify.php" target="right"><span class="icon-caret-right"></span>修改密码</a></li> 
     <li><a href="config_mark.php" target="right"><span class="icon-caret-right"></span>图片水印设置</a></li> 
     <li><a href="config_system.php" target="right"><span class="icon-caret-right"></span>系统参数设置</a></li> 
     <li><a href="user_check.php" target="right"><span class="icon-caret-right"></span>管理用户</a></li> 
    </ul>
   </ul>
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="##" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin" style="position: absolute; top: 85px;">
  <iframe scrolling="auto" rameborder="0" src="welcome.php" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>

