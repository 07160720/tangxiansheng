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
    
    /**=============转义post过来的数据=====================*/
    if ( !get_magic_quotes_gpc() ){
        foreach ($_POST as $post_key=>$post_var){
            $_POST[$post_key] = addslashes($post_var);
        }
    }
    /**--------------------------------------------------*/
    
    $dir = "../img/brands/";
    
    // 连接数据库
    include_once '../includes/db_connect.php';
    $db = new MyDB();
   
    /*----------------------------------------------------------*/
	/*增加新品牌*/
	/*----------------------------------------------------------*/
    if ($_REQUEST['act'] == 'add') {
        
        
        $sql = "INSERT INTO `brand` (`ch_name`, `link`, `description`) 
                VALUES
                ('$_POST[ch_name]', '$_POST[link]', '$_POST[description]')";
    
        $db->Query($sql);//插入数据库
        
        $current_id=mysql_insert_id();//获取刚插入文章的id
        
        echo "<script language='javascript'>alert('增加完成'); window.location.href='../templates/brand_check.php';</script>" ;
    }
    
    /*----------------------------------------------------------*/
	/*修改品牌资料*/
	/*----------------------------------------------------------*/
    if($_REQUEST['act']=='modify'){
        
        $sql = "UPDATE `brand` SET 
                    `ch_name` = '$_POST[ch_name]',
                    `link` = '$_POST[link]',
                    `description` = '$_POST[description]'
                WHERE `id` = $_POST[id] LIMIT 1 ";
        
        $db->Query($sql);//插入数据库
        
        echo "<script language='javascript'>alert('修改完成'); window.location.href='../templates/brand_check.php';</script>" ;
    }
    
    /*----------------------------------------------------------*/
	/*删除品牌*/
	/*----------------------------------------------------------*/
    if ($_REQUEST['act'] == 'delete') {
        
        $sql = "DELETE FROM `brand` WHERE id= '$_GET[id]'";
        
        $db->Query($sql);
        
        unlink($dir."logo$_GET[id].png");
        unlink($dir."product$_GET[id].jpg");
        
        header("Location: ../templates/brand_check.php");
    }
    
    /*----------------------------------------------------------*/
	/*上传logo和图片*/
	/*----------------------------------------------------------*/
    if (!empty($_FILES["brand_img0"]['tmp_name']) || !empty($_FILES["brand_img1"]['tmp_name'])){
        
        $prefix = array("logo","product");//两张图片不同的前缀名
        
        for ($i = 0; $i < 2; $i ++) {
            
            $brand_img = $_FILES["brand_img$i"]; //获取传输过来的图片文件
            
            if(empty($_FILES["brand_img$i"]['tmp_name'])){ continue; }//如果是没有上传图片就跳过
            
            if (! is_uploaded_file($brand_img['tmp_name'])) { //判断上传文件是否存在
        
                exit("<font color='#FF0000'>文件不存在！</font>");
            }
             
            if ($brand_img['size'] > 1500000) {  //判断文件大小是否大于500000字节
        
                exit("<font color='#FF0000'>上传图片太大！</font>");
            }
        
            $temp_name = $brand_img['name']; //原文件名字
            $ftype = explode('.', $temp_name);//获取图片类型
        
            $current_id = empty($current_id)?$_REQUEST[id]:$current_id;//id为空时代表进行的是修改操作
            $fname = $prefix[$i]. $current_id. ".". $ftype[1]; // 更改后的文件名
            $picName = $dir. $fname;//路径名+文件名
        
            if (! file_exists($dir)) {  // 判断存放文件目录是否存在,不存在就创建
        
                mkdir($dir, 0777, true);
            }
        
            if (! move_uploaded_file($brand_img['tmp_name'], $picName)) {//将上传的图片从临时路径传到指定的目录里面
        
                exit("<font color='#FF0000'>移动文件出错！</font>");
            }
        }
    }
    
    
    //更新模板内容
    include_once '../manage/create_brand.php';
    include_once '../manage/create_index.php';
    include_once '../manage/create_common.php';
    
    /*----------------------------------------------------------*/
	/*删除文件夹函数*/
	/*----------------------------------------------------------*/
    function deldir($dir) {
        /*先删除目录下的文件：*/
        $dh = opendir($dir);
        while (!! $file = readdir($dh)) {
            if($file != "." && $file != "..") {
                $fullpath = $dir. "/". $file;
                if(!is_dir($fullpath)) {
                    unlink($fullpath);
                } else {
                    deldir($fullpath);
                }
            }
        }
        closedir($dh);
        /*删除当前文件夹:*/
        if(rmdir($dir)) {return true;} else {return false;}
    }
?>