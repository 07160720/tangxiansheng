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
/* 判断首页是否在制定时间段内被修改过 */
date_default_timezone_set('Asia/Shanghai');//设置时区
$mt=@filemtime("index.html");
$date1 = date("H:i:s",$mt);
$date2="08:00:00";
$date3="18:30:00";
if(!(strtotime($date2)<strtotime($date1) && strtotime($date1)<strtotime($date3))){
    echo "首页非工作时间被修改，修改时间：".date("Y-m-d H:i:s",$mt);
}

/* 初始化session */
if (!isset($_SESSION)) {
 session_start();
}

if (@$_SESSION['is_user'] == "yes" && !empty($_COOKIE['name']) && @$_REQUEST['act']!="logout"){//检测是否注销，否者直接进入主界面
    echo "<script language='javascript'>window.location.href='templates/mainFrame.php';</script>" ;
    exit();
}
/* 初始化 action */
if (!isset($_REQUEST['act']) || empty($_REQUEST['act'])){
    
    $_REQUEST['act'] = 'login';
    
}else{
    
    $_REQUEST['act'] = trim($_REQUEST['act']);
}

/* 产生验证码*/
if ($_REQUEST['act'] == 'captcha'){
    
    include('cls_captcha.php');
    $img = new captcha('captcha/');
    @ob_end_clean(); //清除之前出现的多余输入
    $img->generate_image();
}

?>