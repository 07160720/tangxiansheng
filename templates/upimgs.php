<?php  
ob_start();
@header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);//忽略警告,否则异步加载无法执行

$typeArr = array("jpg", "png", "gif");//允许上传文件格式   
$path = "../img/";//上传路径   

if (isset($_POST)) {   
    /* -------上传图片------- */
    if($_GET['act']=="upimg"){  
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
      
      //$pic_name = time() . rand(10000, 99999) . "." . $type;//图片名称   
      $pic_url = $path . $name;//上传后图片路径+图片名称
      
      if (move_uploaded_file($name_tmp, $pic_url)) { //临时文件转移到目标文件夹   
          echo json_encode(array("error"=>"1","pic"=>$pic_url,"name"=>$name)); exit;     
      } else { 
          echo json_encode(array("error"=>"上传有误，请检查是否存在文件夹或使用了中文名称！"));  exit;    
      } 
      
    }  
    /* ------删除图片------- */
    if($_GET['act']=="delimg"){  
        $imgsrc = $_GET['imgurl'];  
        unlink($imgsrc);  
        echo 1;  
    } 
    /* ------判断文件是否存在------- */
    if($_GET['act']=="isHad"){
        $imgname = $_GET['name'];
        
        echo file_exists($path. $imgname);
    }
} 
?>
