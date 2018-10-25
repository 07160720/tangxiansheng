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

ob_start();
@header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8
require_once ('../includes/page_validate.php');//验证是否是用户登录
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>页首</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/list.css" rel="stylesheet" type="text/css" />

<style type="text/css"></style>

</head>
<body >
<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >查看模板</span>
</div>
<!--当前操作  -->

<form  method="post" action="tpl_modify.php" name="listForm" id="list-form">
<?php 
    if($_COOKIE['name'] == "xxz" && $_COOKIE['status'] == "3"){
        echo'<input type="text" name="fname" placeholder="输入路径及文件名，如：../manage/create_detail.php" size="50"/>&nbsp;
             <input type="submit" value="  确定  "/>';
    }
?>
<div  id="list-div">
<table cellpadding="0" cellspacing="1">
  	<tr >
        <th><span>文件名</span></th>
        <th><span>文件描述</span></th>     
        <th><span>操作</span></th> 
  	</tr>
  <?php 
    /** 连接数据库获取数据 */
    include_once '../includes/db_connect.php'; $db = new MyDB();
    
    $sql = "SELECT `name`, `template` FROM `column` WHERE `id`  IN (SELECT MIN(id) FROM `column` GROUP BY `template`) ORDER BY `id`";
    $list_col = $db->GetDatas($sql);
    
    foreach ($list_col as $key => $list){
        if (empty($list['template'])) continue;
        echo '<tr>
            	<td><span>'.$list['template'].'</span></td>
            	<td><span>'.$list['name'].'模板</span></td>
                <td align="center"><a href="tpl_modify.php?fname=../tpl/'.$list['template'].'" title="编辑">[编辑]</a> </td>
        	  </tr>';
    }
   
    $tpl=array(
        "sitemap.htm"=>"网站地图模板",
        "head.htm"=>"导航栏头部",
        "foot.htm"=>"导航栏尾部"
    );
    
    foreach ($tpl as $file => $description){
        echo '<tr>
            	<td><span>'.$file.'</span></td>
            	<td><span>'.$description.'</span></td>
                <td align="center"><a href="tpl_modify.php?fname=../tpl/'.$file.'" title="编辑">[编辑]</a> </td>
        	  </tr>';
    }
    
  ?>
  	
	</table>
</div>
	
</form>

<script type="text/javascript">

</script>
</body>
</html>

