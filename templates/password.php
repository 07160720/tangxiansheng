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

/*
 * 个人密码修改
 * */
if($_REQUEST['act']=='password_modify'){
    
    $sql="SELECT password FROM `user` WHERE `name`='".$_COOKIE['name']."'";
    /*连接数据库获取数据*/
    include '../includes/db_connect.php';
    $db=new MyDB();
    $data=$db->GetData($sql);
    
    $oldPwd=trim($_POST['ad_password']);
    $newPwd1=trim($_POST['new_password1']);
    $newPwd2=trim($_POST['new_password2']);
   
    require_once ('../includes/operation.class.php');//加密类
    $op=new operation();
    
    $oldPwd=$op->encrypt($oldPwd);
    $newPwd1=$op->encrypt($newPwd1);
    $newPwd2=$op->encrypt($newPwd2);

    if($oldPwd != $data['password']){
        echo "<script language='javascript'>alert('原密码错误！') ;window.location.href='../templates/password_modify.php' ;</script>" ;
        exit;
    }
    if (empty($newPwd1)){
        echo "<script language='javascript'>alert('密码不能为空！') ;window.location.href='../templates/password_modify.php' ;</script>" ;
        exit;
    }elseif ($newPwd1 != $newPwd2){
        echo "<script language='javascript'>alert('确认密码与新密码不一致！') ;window.location.href='../templates/password_modify.php' ;</script>" ;
        exit;
    }else{
       
        $sql2="UPDATE  `user` SET  `password` = '".$newPwd1."'
    				 WHERE  `user`.`name` ='".$_COOKIE['name']."' LIMIT 1 ;";
    
        $db->Query($sql2);

    
        echo "<script language='javascript'>alert('密码修改好了！') ;window.location.href='../templates/password_modify.php' ;</script>" ;
    }
}
?>