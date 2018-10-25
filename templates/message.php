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
require_once ('../includes/page_validate.php');//验证是否是用户登录

//连接数据库
include '../includes/db_connect.php';
$db=new MyDB();

/*
 * 增加留言
 * */
if ($_REQUEST['act']=='add'){

    $sql="INSERT INTO `message` (
		
					`name`,
					`phone`,
					`message`) VALUES(
					'".$_POST['name']."', '".$_POST['phone']."','".$_POST['message']."')";
     
    	
    $db->Query($sql);//
    	
    	
    	
    	
    echo "<script language='javascript'>alert('增加完成') ;window.location.href='../templates/message_check.php' ;</script>" ;
}
/*
 * 留言修改
 */
if($_REQUEST['act']=='modify'){

    $sql="UPDATE  `message` SET  `name` =  '".$_POST['name']."',
				`phone` =  '".$_POST['phone']."',
				`message` =  '".$_POST['message']."' WHERE  `message`.`id` =".$_POST['id']." LIMIT 1 ;";

    $db->Query($sql);
    echo "<script language='javascript'>alert('修改好了！') ;window.location.href='../templates/message_check.php' ;</script>" ;
}
/*
 *  留言删除
 *  */
if ($_REQUEST['act']=='deleteAll' || $_REQUEST['act']=='delete'){
	    
	    $id=@$_POST['checkboxes'];
	    if(!empty($id) && $_REQUEST['act']=='deleteAll'){
	        for($i=0; $i< count($id); $i++){
	            $sql="DELETE FROM message WHERE id='".$id[$i]."'";
	    
	            $db->Query($sql);
	           
	        }
	        	
	    }elseif($_REQUEST['act']=='delete'){
	        @$sql="DELETE FROM message WHERE id='".@$_GET[id]."'";
	        	
	        $db->Query($sql);
	      
	    }  	
		
		header("Location: ../templates/message_check.php");
	}
/*
 *  留言已查看
 *  */
	if($_REQUEST['act'] == "isCheck"){
	    
	    $sql="UPDATE  `message` SET 
				`state` = 'checked' WHERE `message`.`id` =".$_GET['id']." LIMIT 1 ;";
	    
	    $db->Query($sql);
	    die();
	}

?>