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
date_default_timezone_set('Asia/Shanghai');//设置时区
include_once '../includes/db_connect.php';
/**========================================
  * 增加留言
  *========================================**/
if (@$_REQUEST['act'] == 'add' && !empty($_POST['phone']) ) {
    
    !is_numeric($_POST['phone']) && exit("请输入正确的电话号码！");
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $source = $_SERVER['HTTP_REFERER'];
    $item = $_POST['item'];
    date_default_timezone_set('PRC');
    $date = date('Y-m-d H:i:s', time()); 
    $sql = "INSERT INTO `message`(`name`,`phone`,`date`,`message`,`source`,`item`) VALUES ('$name','$phone','$date','$message','$source','$item')";

    $db = new MyDB();

    $data = $db->Query($sql);

    if ($data) {
        echo '<script>alert("留言成功，我们会在24小时内给你答复！");header("Location:$_SERVER[HTTP_REFERER]");</script>';
        
    }
    else{
        echo '<script>alert("无法获取当前品牌！");header("Location:$_SERVER[HTTP_REFERER]");</script>';
    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://localhost/msgsystem/manage/message_add.php');
 
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $msg_array);
    
    curl_exec($ch);
    curl_close($ch);
    //留言成功返回上一页
    header("Location:$_SERVER[HTTP_REFERER]");
    
    // 使用<img/>异步执行发送邮件提醒
    //echo '<img src="../includes/sendEmail.php?phone=1"/>';
    
}

?>
