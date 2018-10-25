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

@ob_start();
@header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8
require_once ("../includes/page_validate.php");//验证是否是用户登录

if($_POST["act"] == "modify") {

    $fileName = $_POST["fileName"];

    $content = $_POST["tempFile"];

    if(get_magic_quotes_gpc()){
        $content = stripcslashes($content);//替换掉代码里面的“\”
    }

    file_put_contents($fileName, $content);

    //弹出完成提示框
    echo '<div align="center"></br><div style="width:150px; border:1px solid #666;padding:10px;">成功保存模板</br>......</div></div>';

    header("Refresh:0.5;url=tpl_check.php");//延时跳转
}
?>