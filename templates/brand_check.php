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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/list.css" rel="stylesheet" type="text/css" />
<style type="text/css">

#list-div ul{list-style: none;overflow: hidden;}   
#list-div ul li{width:310px; height: 370px;float: left;background:#DDEEF2;border: 1px solid #80BDCB;
                padding:5px;margin: 5px;position: relative;}
#list-div ul li:hover{background: #fff;}
#list-div ul li span{font-family: "微软雅黑";padding: 0;font-weight: bold;}
#list-div ul li .img-div{height: 150px;padding-bottom: 30px; border-bottom: 1px solid #80BDCB;}
#list-div ul li .img-div img{margin: 0px 2px;width: 150px;display: inline-block;float: left;bottom: 0;}
#list-div ul li .desc-div {}
#list-div ul li .desc-div p{width: 300px; word-break:break-all; border-bottom: 1px solid #ccc; color: #333;line-height: 20px;}
/* 修改删除操作 */
#list-div ul li ul{background: #FFFFFF;position: absolute;top: 0;right: 0;padding:0px;margin: 0px;display: none;}
#list-div ul li ul li{float: inherit;background:#fff;border:1px solid #fff; border-bottom: 1px solid #80BDCB;
                       padding:2px 5px;margin: 3px 5px;height: 15px;width: 27px; font-size: 13px; line-height: 15px;}
#list-div ul li:hover ul{display: block;}
</style>
</head>

<body >
<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; z-index: 1;">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >管理品牌</span>
</div>
<!--当前操作  -->

<form enctype="multipart/form-data" name="listForm" id="list-form" action="news.php" method="post"   onsubmit="return deleteData('all')">
	<div id="list-div">
     	<ul>
     	
	<?php 

    $sql = "SELECT COUNT(*) FROM `brand`";

    /*连接数据库获取数据*/
    include '../includes/db_connect.php';
    $db = new MyDB();
    
    $result = $db->GetData($sql);
    $sum = $result[0];//记录总数
    
    //每页显示的记录数量
    $item = 4;
    
    //获得总页数
    $pageSum = ceil($sum / $item);
     
    //页码容错处理
    if(isset($_GET['page']) && !empty($_GET['page'])){
        
        $temp_page = trim($_GET['page']);
        
        $page = $temp_page > $pageSum ? $pageSum : $temp_page ;//跳转页数大于总页数时处理
    }
    else{
        $page = 1;
    }
   
    $from = ($page - 1) * $item;//获取limit的第一个参数的值
    
   //无数据时的操作
   if($sum == 0){
       
      $from = 0;
      echo "</br><font color='#FF0000'>&nbsp;&nbsp;&nbsp;&nbsp;暂无相关数据</font>" ;
      
   }
    
    $sql = "SELECT * FROM `brand` LIMIT " .$from. "," .$item;

    $resource = $db->Query($sql);
    
    
    //输出信息
    while(!! $data = mysql_fetch_array($resource)){
        
      echo '
            <li>
                <div class="img-div">
                    <img src="../img/brands/logo'.$data[id].'.png" alt="'.$data['ch_name'].'" />
                    <img src="../img/brands/product'.$data[id].'.jpg" alt="'.$data['ch_name'].'" />
                </div>
                <div class="desc-div">
                    <p><span>品牌名称：</span>'.$data['ch_name'].'</p>
                    <p><span>品牌链接：</span><a href="'.$data['link'].'" target="_blank">'.$data['link'].'</a></p>
                    <p><span>品牌描述：</span>'.$data['description'].'</p>
                </div>
                <ul>
                    <li><a href="brand_modify.php?id='.$data['id'].'">修改</a></li>
                    <li><a href="javascript:deleteData('.$data['id'].');" id="delete'.$data['id'].'" data="'.$data['ch_name'].'">删除</a></li>
                </ul>
            </li>
        ';
       
    }
    echo '</ul></div>';
    include_once 'nextPage.php';//上下页文件
   
?>	

<script type="text/javascript">

//删除信息
function deleteData(id){
	
	var title = document.getElementById('delete'+id).attributes["data"].value;
	
	if(confirm("确定要删除 ‘" + title + "’品牌 吗？")){
		
		window.location.href = "brand.php?act=delete&id=" + id;
		return true;
		
	}else
		return false;
}

//跳到指定页面
function goPage(){
	
	var pageSum = document.getElementById("pageSum").attributes["sum"].value;
	var value = document.getElementById("toPage").value;
	
	if(value < 1  || pageSum < value){
		
		alert("请输入正确的页数！");
		
	}else{
		
		window.location.href = "?page=" + value;
	}	
	
}

</script>
</form>
</body>
</html>