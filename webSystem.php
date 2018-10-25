<?php
@header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8
ob_start();//防止output导致header出错
require('includes/init.php'); 


/*------------------------------------------------------ */
/*-----------------------进入登陆界面----------------------- */
/*------------------------------------------------------ */
if($_REQUEST['act']=='login'){
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	
	require('templates/login.html');
}
/*------------------------------------------------------ */
//-- 验证登陆信息
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'signin'){
    
    $userName = isset($_POST['name']) ? trim($_POST['name']) : '';
    $userPwd = isset($_POST['password']) ? trim($_POST['password']) : '';
    // $captcha = isset($_POST['captcha']) ? trim($_POST['captcha']) : '';

    // if (!empty($_SESSION['captcha_word'])) {

    //     include_once(dirname(__FILE__) . '/includes/cls_captcha.php');
        
    //     /* 检查验证码是否正确 */
    //     $validator = new captcha();
    //     if (empty($captcha) || !$validator->check_word($captcha)) {
    //       echo "<script language='javascript'>
    //            alert('验证码错误！'); window.location.href='webSystem.php'; 
    //            </script>";
    //       exit();
    //     }
    // }else{
    //       echo '验证码不存在!';
    // }  
    
    //只允许用户名和密码用0-9,a-z,A-Z,'@','_','.','-'这些字符
    $userName = preg_replace("/[^0-9a-zA-Z_@!\.-]/", '', $userName);
    $userPwd = preg_replace("/[^0-9a-zA-Z_@!\.-]/", '', $userPwd);

    $sql="SELECT * FROM `user` WHERE `name`='{$userName}'";
    /*连接数据库获取数据*/
    include_once 'includes/db_connect.php';
    $db=new MyDB();
    $data=$db->GetData($sql);

    require_once ('includes/operation.class.php');//加密类
    $op=new operation();
    $userPwd=$op->encrypt($userPwd);

    /*判断密码*/
    if(!isset($data['name'])){
        echo "<script language='javascript'>alert('不存在该用户！') ;window.location.href='webSystem.php' ;</script>" ;
        exit;
    }
    elseif ($userPwd != $data['password']){ 
        echo "<script language='javascript'>alert('密码错误！') ;window.location.href='webSystem.php' ;</script>" ;
        exit;
    }else{
        /*设置cookies和session*/
        setcookie('name',$userName);
        setcookie('status',$data['status']);
        $_SESSION['sta'] =$data['status'];
        $_SESSION['is_user'] = "yes";
        
        /*进入主页面*/
        header("Location:templates/mainFrame.php");
        exit;
    }
}

/*------------------------------------------------------ */
//-- 退出登录
/*------------------------------------------------------ */
elseif($_REQUEST['act']=='logout'){
    setcookie("name","",time()-1);
    setcookie("status","",time()-1);
    session_destroy();
    require(dirname(__FILE__) . '/templates/login.html');
}

?>
