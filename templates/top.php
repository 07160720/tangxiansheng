<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body{
	background:#80BDCB;
}
#header-div {
  	border-bottom: 0px solid #DCDCDC;
	
}

#logo-div {
  height: 50px;
  float: left;
	margin-left:20px;
}
#logo-div h3 {
    color: #FFF;
	margin-top: 12px;
	font-weight:900;
	letter-spacing: 2px;
}


#submenu-div {
  height: 50px;
}

#submenu-div ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

#submenu-div li {
  float: right;
  padding: 0 13px;
  margin: 3px 0;
  border-left: 1px solid #FFF;
}
#submenu-div a{
    font-size:12px; 
    color: #FFF;
    text-decoration: none;
}

#submenu-div a:hover {
  color: gray;
}
#submenu-div a.fix-submenu{ clear:both; margin-left:5px; padding:1px 3px; *padding:3px 3px 5px;  color:#fff; }
#submenu-div a.fix-submenu:hover{ color: gray;}
#menu-div li.fix-spacel{ width:30px; border-left:none; }
#menu-div li.fix-spacer{ border-right:none; }
</style>
</head>
<body >
    <div id="header-div">
          <div id="logo-div" style=""><h3><?php include_once ('../includes/config.php');/* 常量文件  */echo $WEB_NAME;?>后台管理系统</h3></div>
              <div id="submenu-div">
                <ul>
                 	<li><a href="#">帮助</a></li>
                     <li><a href="password_modify.php" target="main-frame">个人设置</a></li>
                     <li><a href="mainFrame.php"  target="_parent" >刷新</a></li>
                     <li><a href="../index.html"  target="_blank" >网站主页</a></li>
                     <li><a href="#">用户：<?php echo $_COOKIE['name'];?></a></li>
                </ul>
                <div id="send_info" style="padding: 5px 10px 0 0; clear:right;text-align: right; color: #FF9900;width:40%;float: right;">
                  <a >&nbsp;</a>
                  <a href="../webSystem.php?act=logout" class="fix-submenu" target="_parent">注销</a>
                </div>
              </div>
    </div>
</body>

</html>

