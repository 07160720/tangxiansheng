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
require_once ('../includes/general_function.php');//验证是否是用户登录
date_default_timezone_set('Asia/Shanghai');//设置时区

//连接数据库
include_once '../includes/db_connect.php';
$db = new MyDB();  

$column = check_input($_POST['column']);
$title = check_input($_POST['title']);
$date = check_input($_POST['date']);
$keywords = check_input($_POST['keywords']);
$description = check_input($_POST['description']);
$context = check_input($_POST['context']);

/*==========================================================*/
/*增加新文章*/
/*==========================================================*/
if ($_REQUEST['act']=='add'){
    
    /*获取该篇文章的里面的图片路径*/
    $url_txt = '../articles_img/record_img.txt';
    $imgUrl = file_get_contents($url_txt);
    
    $sql = "INSERT INTO `article` (`column`, `title`, `date`, `keywords`, `description`, `context`, `img_url`) 
            VALUES('$column', '$title', '$date', '$keywords', '$description', '$context', '$imgUrl')";
		
	$db->Query($sql);//插入数据库
	
	file_put_contents($url_txt,"");//清除txt文件临时存储的图片路径
	
	echo "<script language='javascript'>alert('增加完成'); window.location.href='../templates/news_check.php' ;</script>" ;
}

/*==========================================================*/
/*修改文章内容*/
/*==========================================================*/
if($_REQUEST['act'] == 'modify'){
    
    //获取该篇文章的里面的图片路径
    $url_txt = '../articles_img/record_img.txt';
    $imgUrl = file_get_contents($url_txt);
	
	$sql = "UPDATE `article` SET  
		              `column` =  '$column',
		              `title` =  '$title',
		              `date` =  '$date',
				      `keywords` =  '$keywords',
			          `description` =  '$description',
				      `context` =  '$context',
				      `img_url` = '$_POST[img_url].$imgUrl' 
			      WHERE 
				      `id` = $_POST[id] LIMIT 1 ";
	
	$db->Query($sql);
	
	file_put_contents($url_txt,"");//清除txt文件临时存储的图片路径
	
	echo "<script language='javascript'>alert('修改好了！'); window.location.href='../templates/news_check.php' ;</script>" ;
}

/*==========================================================*/
/*删除文章和源文件*/
/*==========================================================*/
if ($_REQUEST['act'] == 'deleteAll' || $_REQUEST['act'] == 'delete'){
    
    $chk_id = array();
    
    if(!empty($_POST['checkboxes']) && $_REQUEST['act'] == 'deleteAll'){//获取多个文件的id

     $chk_id = $_POST['checkboxes'];
     
    }elseif ($_REQUEST['act'] == 'delete'){//获取单个文件的id
        
        $chk_id[] = $_GET['id'];
    }

    foreach ($chk_id as $key => $del_id){

        $sql = "select `article`.*,`column`.catalog from `article`,`column` where `article`.id = '$del_id' AND `article`.column = `column`.id";

        $del_data = $db->GetData($sql);//获取文章里面的图片url

        $sql = "DELETE FROM `article` WHERE `id` = '$del_id'";

        $db->Query($sql);

        unlink("../$del_data[catalog]/$del_id.html");//删除静态页面

        $url = explode(";", $del_data["img_url"]); //以“;”号对字符串分组

        array_pop($url); //移除最后一个空白数组

        foreach ($url as $key => $val){//遍历删除文章图片

            unlink('../'. $val);
        }

        $_REQUEST['column'] = $del_data["column"]; //被删除的文章所属的栏目
    }
    
    header("Location: ./news_check.php");
     
}

/*----------------------------------------------------------*/
/*更新生成模板*/
/*----------------------------------------------------------*/
if(!empty($_REQUEST['column'])){
    
	include_once '../manage/create_index.php';
	
	include_once '../manage/create_article.php';
	
	$article = new article();
	
	$article->create_list($_REQUEST['column']);
	
	include_once '../manage/create_smap.php';
}

?>