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
ob_start();
@header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8
require_once ('../includes/page_validate.php');//验证是否是用户登录

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理网站图片</title>
<link href="../styles/add.css" rel="stylesheet" type="text/css" />

<style type="text/css">
    form{background:#DDEEF2; border: 1px solid #80BDCB; padding:5px;}
    img{border:0;}
    input{vertical-align: middle;}
    .upload-div{margin: 20px 10px 10px;}
    .upload-div .add-button{ width:40px; height: 40px; background: url('../images/upload_button.png') no-repeat center; background-size:40px auto; border: 5px solid #fff;}
    .upload-div input[type=submit]{background-image: url('../images/modify.jpg');padding:5px;border:0;border-radius:2px;color:#fff;}
    
    .img-div{ font-family: "微软雅黑";overflow:hidden; }    
    .img-div ul{float:left; list-style: none;z-index: 0;}    
    .img-div ul li{float: left; width: 120px;height:160px; margin: 8px;padding:5px;
                    position: relative;cursor: pointer;}    
    .img-div ul li:HOVER{background: url("../images/hover.png");background-size: 100% 100%;}    
    .img-div ul li .display img{max-height:115px; max-width:120px; position: absolute; bottom: 50px;}    
    .img-div ul li .display p{width:110px;word-break:break-all; position: absolute; top: 115px;left: 10px;text-align: center;}    
    .img-div ul li .operate{width:120px; position: absolute; left:0; bottom: -18px;text-align: center;display: none;}    
    .img-div ul li .operate a{margin: 0 5px;}     
    .img-div ul li:HOVER .operate{display: block;}     

</style>

</head>

<body >

<!--当前操作  -->
<div id="pagehead"  style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; z-index: 1;">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >管理网站图片</span>
</div>
<!--当前操作  -->

<div id="tabbody-div" >
<form enctype="multipart/form-data" action="?" method="post" name="frm" >
    <p style="color: #FF6666;margin: 0;">* 只允许上传jpg, png, gif格式的图片<br/>* 点击图片进行查看,图片不能大于500k</p>
    <div class="upload-div">
    	<input type='button' name='upload_img' value="" onclick="upfile.click()" class="add-button" title="添加文件"/>
    	<input type="button" name='upload_name'  value="" style="background: none;border: 0;"/>
     	<input type='file' name='upfile' accept="image/jpeg,image/png,image/gif"  style="display: none;" onchange="upload_name.value=this.value"/>
     	<input type="submit" name="btn" value="   上传    " /><br />
    </div>
</form>
<?php

    // 全局变量,图片的格式
    $arrType = array(
        'image/jpg',
        'image/gif',
        'image/png',
        'image/bmp',
        'image/jpeg',
        'image/pjpeg',
        'image/x-png',
        'image/x-icon'
    );
    
    $max_size = '1000000'; // 最大文件限制（单位：byte）
    
    $dir = '../img/'; // 图片目录路径
    
    @$file = $_FILES['upfile']; //获取上传的文件数组
    
  /**上传并预览图片
  * */
   if ($_SERVER['REQUEST_METHOD'] == 'POST') { //判断提交方式是否为POST
       
        if (! is_uploaded_file($file['tmp_name'])) { //判断上传文件是否存在
            
            echo "<font color='#FF0000'>文件不存在！</font>";
            exit;
        }
       
        if ($file['size'] > $max_size) {  //判断文件大小是否大于500000字节
            echo "<font color='#FF0000'>上传文件太大！</font>";
            exit;
        } 
        if (! in_array($file['type'], $arrType)) {  //判断图片文件的格式
            echo "<font color='#FF0000'>上传文件格式不对！</font>";
            exit;
        }
        
        if (! file_exists($dir)) {  // 判断存放文件目录是否存在,不存在就创建
            
            mkdir($dir, 0777, true);
        }
        
        $imageSize = getimagesize($file['tmp_name']);
        
        $img = $imageSize[0] . 'x' . $imageSize[1]; // 获取图片的大小
        
        $fname = $file['name'];
        
        @$ftype = end(explode('.', $fname));//获取文件后缀名
        
        $picName = $dir . $fname;
        
        if (file_exists($picName)) {
          unlink($picName);
        }
        
        if (! move_uploaded_file($file['tmp_name'], $picName)) { 
            
            echo "<font color='#FF0000'>移动文件出错！不能上传中文名称的文件</font>";
            exit;
            
        }else{
            //预览图片
            echo '<div style="margin:20px 0;">
                    <p>图片预览：'.$fname.'</p>
                    <div  style="border:1px solid #80BDCB;padding:10px;display:inline-block;">
                        <img src="'.$picName.'" style="height:150px;"/>
 	                </div>
 	             </div>';
        }
    }
    
    /**
     * 修改图片名称
     * */
    if (! empty($_GET['oldname'])) {
        
        $oldname = $dir.trim( $_GET['oldname'] );
        $newname = $dir.trim( $_GET['newname'] );
        
        rename($oldname, $newname);
    }
    
    /**
     * 删除图片
     * */
    if (! empty($_GET['fname'])) {
        
        unlink($dir.$_GET['fname']);
       
    }
    
    /**
     * 查看图片
     * */
    $img = scandir($dir);//获取指定目录下的所有文件名
    
    echo '<p class="title">网站图片列表：</P>
          <div class="img-div">
            <ul>';
    
    for ($i = 2; $i < count($img); $i ++) {
        
        //判断文件名里面是否有‘.’，没有就证明是文件夹，跳过
        if(! strpos($img[$i], '.')) continue;
        
        $size = filesize($dir . $img[$i]); // 获取文件的大小
        $size = round($size / 1024, 1);//转化成kb单位，保留一位数
        
        $imgSize = getimagesize($dir . $img[$i]);//获取图片的尺寸
        
        /* 使用&#13;给title里面的内容换行 */
        echo '
             <li title="尺寸：'.$imgSize[0].' x '.$imgSize[1].' &#13;大小：'.$size.' KB">
                <div class="display">
                    <a href="'.$dir . $img[$i].'" target="_blank" ><img src="'.$dir . $img[$i].'?rand='.time().'" alt="'.$img[$i].'"/>
                    <p>'.$img[$i].'</p><a/>
                </div>
                <div class="operate">
                    <a class="modify" href="javascript:rename(\''.$img[$i].'\');" ><img src="../images/icon_edit.gif" title="重命名"/></a>
                    <a class="delete" href="javascript:deleteImg(\''.$img[$i].'\');" ><img src="../images/icon_trash.gif" title="删除"/></a>
                </div> 
            </li> 
            ';
    }
?>
		</ul>
	</div>
</div>
<script type="text/javascript">
    
    //修改图片名称
    function rename(oldname){
        
        var newname = prompt("重命名为：",oldname);
        
        if(newname){
       
        	window.location.href = "?oldname=" + oldname + "&&newname=" + newname;
        }
    }

    //删除图片
    function deleteImg(fname){
    	
    	if(confirm("确定要删除 ‘" + fname + "’ 吗？")){
    		
    		window.location.href = "?fname=" + fname;
    		
    		return true;
    		
    	}else{
    		
    		return false;
    	}
    
    	
    }
   
</script>
</body>
</html>