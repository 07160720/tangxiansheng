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
require_once ('../includes/page_validate.php');//验证是否是友情链接登录

//连接数据库
include '../includes/db_connect.php';
$db=new MyDB();

$webName=@trim($_POST['name']);
$webLink=@trim($_POST['link']);

if(!empty($webLink)){//添加“http://”
    $http = mb_substr($webLink, 0, 7);
    $webLink = $http == "http://" || $http == "HTTP://" ? $webLink : "http://".$webLink;
}

/*
 * 增加友情链接
 * */
if ($_REQUEST['act']=='add'){
    
   
    $sql="INSERT INTO `friendlylink` (
					`name`,
					`link`) VALUES(
					'$webName', '$webLink')";
    	
    	
    $db->Query($sql);//
    	
    	
    echo "<script language='javascript'>alert('增加完成') ;window.location.href='../templates/link_check.php';</script>" ;
}
/*
 * 友情链接修改
 */
if($_REQUEST['act']=='modify'){
    
    
    $sql="UPDATE `friendlylink` SET `name` = '$webName',
				`link` = '$webLink' WHERE `friendlylink`.`id` =".$_POST['id']." LIMIT 1 ;";

    $db->Query($sql);
    
    echo "<script language='javascript'>alert('修改好了！') ;window.location.href='../templates/link_check.php' ;</script>" ;
}
/*
 *  友情链接删除
 *  */
if ($_REQUEST['act']=='delete' || $_REQUEST['act'] == 'deleteAll'){

    $chk_id = array();
    
    if(!empty($_POST['checkboxes']) && $_REQUEST['act'] == 'deleteAll'){//获取多个文件的id

        $chk_id = $_POST['checkboxes'];
     
    }elseif ($_REQUEST['act'] == 'delete'){//获取单个文件的id
        
        $chk_id[] = $_GET['id'];
    }

    foreach ($chk_id as $key => $del_id){

        $sql="DELETE FROM `friendlylink` WHERE id='$del_id'";

        $db->Query($sql);

    }


	header("Location: ../templates/link_check.php");
}   

    // 更新模板
    include_once '../manage/create_subFoot.php';
    exit;
?>