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

ob_start(); //防止output导致header出错
@header("Content-type:text/html;charset=UTF-8"); //把编码转换为utf8
require_once ('../includes/page_validate.php'); //验证是否是用户登录
include_once '../includes/general_function.php';

/**=============转义post过来的数据=====================*/
if ( !get_magic_quotes_gpc() ){
    foreach ($_POST as $post_key=>$post_var){
        $_POST[$post_key] = addslashes($post_var);
    }
}
/**--------------------------------------------------*/

//连接数据库
include '../includes/db_connect.php';
$db=new MyDB();

if ($_REQUEST['act']=='add'){
     
    $sql = "INSERT INTO `column` (`model`, `name`, `pid`, `catalog`, `link`, `target`, `porder`, `template`, `display`)
    VALUES('$_POST[model]', '$_POST[name]', '$_POST[pid]', '$_POST[catalog]', '$_POST[link]', '$_POST[target]', '$_POST[porder]', '$_POST[template]', '$_POST[display]')";
    	
    $db->Query($sql);//插入数据库

    echo "<script language='javascript'>alert('增加完成'); window.location.href='../templates/column_check.php' ;</script>" ;
}
/*
 * 修改
 */
if($_REQUEST['act']=='modify'){

    $sql="UPDATE  `column` SET  
                `model` =  '$_POST[model]',
                `name` =  '$_POST[name]',
				`pid` =  '$_POST[pid]',
				`catalog` =  '$_POST[catalog]',
				`link` =  '$_POST[link]',
				`target` =  '$_POST[target]',
				`porder` =  '$_POST[porder]' ,
				`template` = '$_POST[template]', 
				`display` = '$_POST[display]' 
    WHERE `id` ='$_POST[id]' LIMIT 1 ;";

    $db->Query($sql);
    
    echo "<script language='javascript'>alert('修改好了！'); window.location.href='../templates/column_check.php'; </script>" ;
}
/*
 * 删除
 */
if($_REQUEST['act']=='delete'){
    
    $sid = trim($_GET['id']);
     
    $sql = "DELETE FROM `column` WHERE `id` ='$sid' or `pid`='$sid'";
    
    $db->Query($sql);
    
    header("Location: ../templates/column_check.php");
}
/*
 * 更新排序
 */
if($_REQUEST['act']=='sort'){
    
    $sql = "SELECT `id` FROM `column`";
    
    $ids = $db->GetDatas($sql);
    
    foreach ($ids as $value) {
        $db->Query("UPDATE `column` SET `porder`='".$_POST[$value[id]]."' WHERE `id`=$value[id]");
    }
    
    header("Location: ../templates/column_check.php");
}
/*
 * 更新栏目数组
 */
$data = $db->GetDatas("select * from `column` order by `porder`");            
$tree = formatTreeById( $data, 0);
$str='<?php 
      $column_array =' . var_export($tree,true) . '; 
      ?>';
file_put_contents('../includes/column_array.php', $str);
?>