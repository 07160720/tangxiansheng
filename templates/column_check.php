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
include_once '../includes/general_function.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    body {background: #fff;font-size: 13px;color:#333;padding:0px;margin:0px;}
    .head_operate{padding: 10px 4px 0px;}
    ul{list-style: none; padding:0px 0; }
    li{} 
    #body-div{
    	background: #fff;
    	margin:40px 5px 0 0px; padding: 0 5px;
    }
    #main-menu{margin-top: 10px;}
    #main-menu ul{display: none;}
    li div{background: #DDEEF2;border-bottom:1px dotted #ccc;  padding:2px; margin: 1px 2px; overflow: hidden;}
    li div:hover{background: #BBDDE5; }
    li div img{cursor: pointer;}
    li span{margin-left: 10px;line-height: 25px;}
    li a{margin-right: 5px; float: right; color: #555;line-height: 25px;}
    li input[type="text"]{margin:0 15px 0 10px; float: right; color: #666;width:25px; line-height: 15px;}
    li li{border-bottom: 1px solid #eee; padding: 2px 5px 2px 20px; margin-left: 0px;}
    li li:hover{background: #BBDDE5; }
</style>
</head>
<body >

<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >网站栏目管理</span>
</div>
<!--当前操作  -->

<!-- start client form -->
<div id="body-div">
	<div class="head_operate"><a href="column_add.php"><input type="button" value="增加顶级栏目"/></a></div>
	<form enctype="multipart/form-data" action="column.php" method="post" name="theForm" onsubmit="" >
        <ul id="main-menu">
          
           <?php 
               /* 连接数据库获取数据 */
               include_once '../includes/db_connect.php'; $db = new MyDB();
               
               $data = $db->GetDatas("select * from `column` order by `porder`");
               
               $columnData = formatTreeById( (array)$data, 0);
               
               foreach ($columnData as $val) {
                   
                   echo '
                    <li>
                       <div>
                       <img src="../images/menu_plus.gif" alt="展开收缩" title="展开全部" onclick="explode()"/>
                       <span>'.$val['name'].' [ID:'.$val['id'].']</span>
                       <input type="text" name="'.$val['id'].'" value="'.$val['porder'].'"/>
                       <a href="javascript:deleteData('.$val['id'].')" id="delete'.$val['id'].'" data="'.$val['name'].'">删除</a>
                       <a href="column_modify.php?id='.$val['id'].'">编辑 |</a>
                       <a href="column_add.php?pid='.$val['id'].'">增加子类 |</a>
                       </div>
                       <ul>';
                       
                   foreach ((array)@$val['child'] as $v) {
                       echo '<li><span>'.$v['name'].' [ID:'.$v['id'].']</span>
                             <input type="text" name="'.$v['id'].'" value="'.$v['porder'].'"/>
                             <a href="javascript:deleteData('.$v['id'].')" id="delete'.$v['id'].'" data="'.$v['name'].'">删除</a>
                             <a href="column_modify.php?id='.$v['id'].'">编辑 |</a></li>';
                   }
                       
                    echo '   
                       </ul>
                    </li>
                   ';
               }
           ?>
        </ul>
        <input type="submit" value="  更新排序   " style="float: right;margin-right: 20px;"/>
        <input type="hidden" name="act" value="sort" />
    </form>
</div>
	
<script language="JavaScript" src="../js/judge.js"></script>
<script  language="JavaScript" >

var menu = document.getElementById("main-menu");
var plus = menu.getElementsByTagName('img');//主标题
var submenu = menu.getElementsByTagName('ul');//小标题
for(var i = 0; i < plus.length; i++)
{	
	plus[i].index = i;
	plus[i].onclick = function(){
			if(submenu[this.index].style.display == "block"){//如果是展开状态就全部闭合
				submenu[this.index].style.display = "none";
				plus[this.index].src = "../images/menu_plus.gif";
				
			}else{								         //是闭合状态时就展开
				submenu[this.index].style.display = "block";
				plus[this.index].src = "../images/menu_minus.gif";
			}
		};
}
//删除信息
function deleteData(id,title){
	var title=document.getElementById('delete'+id).attributes["data"].value;
	if(confirm("确定要删除栏目 '"+title+"' 吗？")){
		window.location.href="column.php?act=delete&id="+id;
		return true;
	}else
		return false;
}
</script>
</body>
</html>