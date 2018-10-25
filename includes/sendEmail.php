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

if(!empty($_GET['phone'])){
    //###########发送邮件###################
    include_once ('config.php');//常量文件
    require_once ('email.class.php');//邮件配置文件
    $smtpserver = "smtp.qq.com";//SMTP服务器
    $smtpserverport =25;//SMTP服务器端口
    $smtpusermail = "1410409643@qq.com";//SMTP服务器的用户邮箱
    //$smtpemailto = "514243905@qq.com";//发送给谁
    $smtpemailto = "1410409643@qq.com";//发送给谁
    
    $smtpuser = "1410409643";//SMTP服务器的用户帐号
    $smtppass = "qq12345";//SMTP服务器的用户密码
    $mailsubject = "=?UTF-8?B?".base64_encode("".$WEB_NAME."站新留言通知")."?=";//邮件主题,需使用这种方式标题才不会乱码
    //邮件内容
    $mailbody='
    <div>'.$WEB_NAME.'站有新的留言：</div></br>
    <div style="font-size:13px;color:gray;">
    <div style=""><span style="">姓名：</span>'.$_GET['name'].'&nbsp;&nbsp;&nbsp;['.date('Y-m-d  H:i',time()).']</div>
    <div style=""><span style="">电话：</span>'.$_GET['phone'].'</div>
    <div style=""><span style="">邮箱：</span>'.$_GET['email'].'</div>
    <div style=""><span style="">地址：</span>'.$_GET['adress'].'</div>
    <div style=""><span style="">留言：</span>'.$_GET['message'].'</div>
    </div>
    </br><span style="float:auto;">-舜达餐饮网络部</span>';
    
    $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
    ##########################################
    $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $smtp->debug = false;//是否显示发送的调试信息
    $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
   
}
?>