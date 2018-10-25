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
require_once ('../includes/page_validate.php'); // 验证是否是用户登录
                                                
// 连接数据库
include '../includes/db_connect.php';
$db = new MyDB();

$userName = trim($_POST['name']);
$userPwd = trim($_POST['password']);
$userStatus = trim($_POST['status']);

require_once ('../includes/operation.class.php'); // 加密类
$op = new operation();
$userPwd = $op->encrypt($userPwd);

/*
 * 增加用户
 * */
if ($_REQUEST['act'] == 'add') {
    
    if (empty($userName) || empty($userPwd) || empty($userStatus) ) {
    
        echo '<font color="#FF0000">请填写正确的内容!</font>';
        exit();
    
    }

    $sql="INSERT INTO `user` (
        					`name`,
        					`password`,
        					`status`
                            ) VALUES(
        					'".$userName."', '".$userPwd."', '".$userStatus."')";
    	
    	
    $db->Query($sql);//
    	
    echo "<script language='javascript'>alert('增加完成') ;window.location.href='./user_check.php' ; </script>" ;
}
/*
 * 修改用户
 */
if ($_REQUEST['act'] == 'modify') {
    
    if(empty($userName) || empty($userPwd) || empty($userStatus)){
    
        echo '<font color="#FF0000">请填写正确的内容!</font>';
        exit();
    
    }

    $sql="UPDATE  `user` SET  
                    `name` =  '".$userName."',
    				`password` =  '".$userPwd."',
    				`status` =  '".$userStatus."' 
				    WHERE  `user`.`id` =".$_POST['id']." LIMIT 1 ;";

    $db->Query($sql);
    
    echo "<script language='javascript'>alert('修改好了！'); window.location.href='./user_check.php'; </script>" ;
}
/*
 *  删除用户
 *  */
if ($_REQUEST['act'] == 'delete') {
		
		$sql="DELETE FROM `user` WHERE id = '".$_GET['id']."'";
		
		$db->Query($sql);
		
		header("Location: ./user_check.php");
	}

?>