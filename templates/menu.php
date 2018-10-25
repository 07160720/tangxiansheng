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
<title>Insert title here</title>
<style type="text/css">
html{height: 100%;}
body {background: #DDEEF2;height: 100%; font-family: "宋体";font-size: 13px;color:#555555;padding:0px;margin:0px;overflow:atuo;
		border-right: 4px solid #80BDCB;border-left: 6px solid #80BDCB;position: relative;}
a{text-decoration: none;color:#555555}
img{margin-right: 5px;}
.label{text-align: center;padding:13px 0px 11px 0px;background: #DDEEF2;border-bottom: 2px solid #BBDDE5;margin-bottom: -10px;}
.label img{margin-left: 50px;}
#main-menu {background: #fff;}
#main-menu .show-menu{position: absolute; top: 40%;right: -1px;padding: 2px;font-weight: bold;background: #CCCCCC;}

#main-menu .menu{padding:0px 0px 0px 0px;list-style-type:none;text-indent:0;}
#main-menu .menu li{}
.menu .item{padding:7px 12px 7px 15px;background: url("../images/nav02.gif") no-repeat;}
.menu li .menu1{padding:7px 0px 0px 18px;list-style-type:none;text-indent:0;display: none;}
.menu1 li{padding:3px 0px 3px 0px;}
.menu1 a:HOVER {color:#008080;}
.menu1 a:FOCUS {color:red;}

</style>

</head>
<body>
<div class="label" id="label">主菜单 <img src="../images/menu_plus.gif" alt="展开收缩" title="展开全部" onclick="explode()"/></div>
<div id="main-menu">
	<a href="#" class="show-menu" title="隐藏菜单" onclick="showMenu(this)"><</a>
	<ul class="menu" id="menu">
	<?php 
	
	   //描述用户等级的数组,"1"只能发布文章，"2"能够查看新闻，"3"拥有所有权限
	   //记录菜单的三维函数
	    $menu = array(
               '文章管理' => array(
                    '增加文章' => array(0 => "news_add.php", 1 => 1),
                    '管理文章' => array(0 => "news_check.php", 1 => 1)
                ),
	        
    	        '留言管理' => array(
    	            '查看留言' => array(0 => "message_check.php", 1 => 2),
    	            '留言统计' => array(0 => "message_chart.php", 1 => 2),
    	        ),
	        
    	        '内容管理' => array(
    	            '网站logo' => array(0 => "logo_add.php", 1 => 1),
    	            '网站banner图' => array(0 => "banner_add.php", 1 => 1),
    	            '产品图片' => array(0 => "product_add.php", 1 => 1),
    	            '关于我们' => array(0 => "content_about.php", 1 => 1),
    	            '联系我们' => array(0 => "content_contact.php", 1 => 1),
    	        ),
    	        
	           '模板管理' => array(
    	            '更新内容' => array(0 => "refresh_tpl.php", 1 => 1),
    	            '友情链接' => array(0 => "link_check.php", 1 => 1),
    	            '网站栏目管理' => array(0 => "column_check.php", 1 => 3),
	                '其他图片管理' => array(0 => "img_check.php", 1 => 3),
    	            '模板管理' => array(0 => "tpl_check.php", 1 => 3)
	            ),
	        
	           '系统设置' => array(
    	            '修改密码' => array(0 => "password_modify.php", 1 => 1),
    	            '图片水印设置' => array(0 => "config_mark.php", 1 => 1),
    	            '系统参数设置' => array(0 => "config_system.php", 1 => 3),
    	            '清理缓存' => array(0 => "clear_cache.php", 1 => 3),
    	            '管理用户' => array(0 => "user_check.php", 1 => 3)
	            )
          );
	    //遍历输出菜单
	   foreach($menu as $item=>$list) {
	   	   if (!isset($_SESSION)) {
	   	     session_start();//开启session
	   	   }
	      
	       $mystatus = trim($_SESSION["sta"]);//获取当前登录的用户的权限等级
	       
	       foreach($list as $name=>$limit)
	       {
	           $expand=0;
	           if($mystatus >= $limit[1]){
	              $expand=1;
	              break;
	           }
	       }
	       if ($expand==0){continue;}//如果$expand=0,说明该菜单栏目下所有子目录都没权限，就跳过该栏目
	       
	       echo '<li><div class="item"><img src="../images/icon01.gif"/><a href="#">'.$item.'</a></div>
			         <ul class="menu1" >';
	       
	       foreach($list as $name=>$limit)
	       {
	           
	           if($mystatus >= $limit[1]){//判断用户的等级
	               echo '<li><img src="../images/icon03.gif"/><a href="'.$limit[0].'" target="main-frame">'.$name.'</a></li>';
	           }
	       }
	       echo '</ul></li>';
	   }
	?>
		
	</ul>
</div>
<script type="text/javascript">

var label=document.getElementById("label");
var menu=document.getElementById("menu");
var item=menu.getElementsByTagName('div');//主标题
var menu1=menu.getElementsByTagName('ul');//小标题
var state = 0;//代表全部菜单的状态

/** 
 **********隐藏整个菜单***********
 */
function showMenu(arrow){
	
	if(window.parent.framebody.cols == "200,*"){
		
		window.parent.framebody.cols = "10,*"; 
		label.style.display = "none";
		menu.style.display = "none";
		arrow.innerHTML = ">";
		
	}else{
		
		window.parent.framebody.cols = "200,*"; 
		label.style.display = "";
		menu.style.display = "";
		arrow.innerHTML = "<";
	}	
}

/**
 *********菜单展开闭合操作*******************
**/

for(var i=0; i<item.length;i++)
{	
	item[i].index=i;
	item[i].onclick=function(){
			if(menu1[this.index].style.display =="block"){//如果是展开状态就全部闭合
				for(var i=0; i<item.length;i++){
					menu1[i].style.display="none";
					var icon=item[i].getElementsByTagName('img');
					icon[0].src="../images/icon01.gif";
				}
			}else{								//是闭合状态时就展开
				for(var i=0; i<item.length;i++){
					menu1[i].style.display="none";
					var icon=item[i].getElementsByTagName('img');
					icon[0].src="../images/icon01.gif";
				}//先闭合全部再展开当前的栏
				menu1[this.index].style.display="block";
				var icon=item[this.index].getElementsByTagName('img');
				icon[0].src="../images/icon02.gif";
				}
			
		};
}
//菜单右边的“+”号的开闭操作
function explode(){
	var label = document.getElementById("label");
	var explode=label.getElementsByTagName('img');//获取展开的图片
	if(state == 0){
		for(var i=0; i<item.length;i++){//展开全部
			menu1[i].style.display="block";
			var icon=item[i].getElementsByTagName('img');
			icon[0].src="../images/icon02.gif";
			explode[0].src="../images/menu_minus.gif";
			explode[0].title="收缩全部";
			state=1;
		}
	}else{
		for(var i=0; i<item.length;i++){//收缩全部
			menu1[i].style.display="none";
			var icon=item[i].getElementsByTagName('img');
			icon[0].src="../images/icon01.gif";
			explode[0].src="../images/menu_plus.gif";
			explode[0].title="展开全部";
			state=0;
		}
	}
}
/**
 **********菜单展开闭合操作******************
 **/
</script>
</body>
</html>