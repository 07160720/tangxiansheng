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
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);//忽略警告,否则异步加载无法执行

//连接数据库
include_once '../includes/db_connect.php';
$db = new MyDB();

$typeArr = array("jpg", "png", "gif");//允许上传文件格式
$path = "../img/product/";//上传路径


/*========================================*/
/*增加产品*/
/*========================================*/
if ($_REQUEST['act'] == 'add'){

    $sql = "INSERT INTO `product` (`name`, `img_url`)
            VALUES('$_POST[name]', '$_POST[img_url]')";

    $db->Query($sql);//插入数据库

    echo "<script language='javascript'>alert('增加完成'); window.location.href='../templates/product_add.php';</script>" ;
}
/*========================================*/
/*修改产品*/
/*========================================*/
if ($_REQUEST['act'] == 'modify'){

    $sql = "UPDATE `product` SET `name` = '$_POST[name]' WHERE `id`=$_POST[id]";

    $db->Query($sql);//插入数据库

    header("Location: product_add.php");
}
/*========================================*/
/*删除产品*/
/*========================================*/
if ($_REQUEST['act'] == 'delete'){
    
    $sql = "SELECT `img_url` FROM `product` WHERE `id`=$_GET[id]";
    
    $data = $db->GetData($sql);
    
    unlink($path. $data['img_url']);
    
    $sql = "DELETE FROM `product` WHERE `id`=$_GET[id]";
    
    $db->Query($sql);//插入数据库
    
    header("Location: product_add.php");
}

/*========================================*/
/*更新页面*/
/*========================================*/
if ($_REQUEST['act'] == 'delete' || $_REQUEST['act'] == 'add') {
    include_once '../manage/create_product.php';
    include_once '../manage/create_index.php';
}

/* -------上传图片------- */
if($_REQUEST['act'] == "upimg"){
    
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $name_tmp = $_FILES['file']['tmp_name'];

    if (empty($name)) {
        echo json_encode(array("error"=>"您还未选择图片"));
        exit;
    }
    $type = strtolower(substr(strrchr($name, '.'), 1)); //获取文件类型
     
    if (!in_array($type, $typeArr)) {
        echo json_encode(array("error"=>"请上传jpg,png或gif类型的图片！"));
        exit;
    }
    if ($size > (1024 * 1024 * 10)) {
        echo json_encode(array("error"=>"图片大小已超过10MB！"));
        exit;
    }

    $pic_name = 'product_'. time(). ".". $type;//图片名称
    $pic_url = $path. $pic_name;//上传后图片路径+图片名称

    if (move_uploaded_file($name_tmp, $pic_url)) { //临时文件转移到目标文件夹
        echo json_encode(array("error"=>"1","url"=>$pic_url,"name"=>$pic_name)); exit;
    } else {
        echo json_encode(array("error"=>"上传有误，请检查是否存在文件夹或使用了中文名称！"));  exit;
    }

}

/* ------预览删除图片------- */
if($_REQUEST['act'] == "delimg"){
    $imgsrc = $_GET['imgurl'];
    unlink($imgsrc);
    echo 1;
}

?>