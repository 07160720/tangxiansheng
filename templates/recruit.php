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
require_once ('../includes/page_validate.php'); // 验证是否是用户登录
include_once ('../includes/general_function.php'); // 验证是否是用户登录
                                            
// 连接数据库
include_once '../includes/db_connect.php';
$db = new MyDB();

$position = check_input($_POST['position']);
$salary = check_input($_POST['salary']);
$quantity = check_input($_POST['quantity']);
$place = check_input($_POST['place']);
$date = check_input($_POST['date']);
$description = check_input($_POST['description']);
$qualification = check_input($_POST['qualification']);
$treatment = check_input($_POST['treatment']);
$contact = check_input($_POST['contact']);

/*==========================================================*/
/* 增加 */
/*==========================================================*/
if ($_REQUEST['act']=='add'){
    
    $sql="INSERT INTO `recruit` (
			    `position`,
		        `salary`,
		        `quantity`,
		        `place`,
		        `date`,
				`description`, 
				`qualification`,
                `treatment`,
                `contact`
				) VALUES(
				'$position', '$salary', '$quantity', '$place', '$date',
				'$description', '$qualification', '$treatment' ,'$contact')";
		
		
		$db->Query($sql);//插入数据库
		
		echo "<script language='javascript'>alert('增加完成') ;window.location.href='../templates/recruit_check.php' ;</script>" ;
	}
/*==========================================================*/
/* 招聘信息修改*/
/*==========================================================*/
if($_REQUEST['act']=='modify'){
	
	$sql="UPDATE `recruit` SET
	    
	             `position` =  '$position',
			     `salary` =  '$salary',
			     `quantity` =  '$quantity',
		         `place` =  '$place',
		         `date` =  '$date',
			     `description` =  '$description',
			     `qualification` = '$qualification',
			     `treatment` = '$treatment' ,
			     `contact` = '$contact' 
			         
			      WHERE  `recruit`.`id` =".$_POST['id']." LIMIT 1 ";
	
	$db->Query($sql);
	
	echo "<script language='javascript'>alert('修改好了！') ;window.location.href='../templates/recruit_check.php' ;</script>" ;
}
/*==========================================================*/
/*  招聘信息删除 */
/*==========================================================*/
if ($_REQUEST['act']=='deleteAll' || $_REQUEST['act']=='delete'){
    
    $id=$_POST['checkboxes'];
    
    if (! empty($id) && $_REQUEST['act'] == 'deleteAll') {
        
        for($i=0; $i< count($id); $i++){
            
            $sql = " DELETE FROM `recruit` WHERE `id` = '".$id[$i]."' ";
    
            $db->Query($sql);
            
            unlink("../recruit/articles/".$id[$i].".html");//删除静态页面
            
        }
        	
    } elseif ($_REQUEST['act'] == 'delete') {
        
           $s_id = trim($_GET['id']);
        
           $sql = " DELETE FROM `recruit` WHERE `id` = '" . $s_id . "' ";
        	
           $db->Query($sql);
        
           unlink("../recruit/articles/".$s_id.".html");//删除静态页面
              
    }  	
		
	header("Location: ./recruit_check.php");
}

/*==========================================================*/
/* 更新模板页面 */
/*==========================================================*/
include_once '../manage/create_recruit.php';

?>