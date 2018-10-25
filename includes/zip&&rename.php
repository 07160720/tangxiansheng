<?php 
/** php Class 'ZipArchive' not found的解决办法
 *  在Windows下的解决办法是:

    1、在php.ini文件中,将extension=php_zip.dll前面的分号“;”去除;
    
    (使用phpinfo()查看php.ini文件所在路径，如果没有,请添加extension=php_zip.dll此行并确保php_zip.dll文件存在相应的目录)
    
        然后同样在php.ini文件中,将 zlib.output_compression = Off 改为 zlib.output_compression = On ;
    
    2、重启Apache服务器。
 *  */

// $zip = new ZipArchive; //php自带的扩展类，php版本大于5.2.0才能使用
// if ($zip->open('aa.zip') === TRUE) {
//     $zip->extractTo('./a/');
//     $zip->close();
//     echo 'ok';
// } else {
//     echo 'failed';
// }
// unlink("aa.zip");

/* 初始化session */
session_start();
$_SESSION['is_user'] = "yes";

/** 重命名图片名字程序 */
$folder = "../brands/";

$brand_folder = scandir($folder);

array_shift($brand_folder); array_shift($brand_folder);//删除目录里面的第一第二个

foreach ($brand_folder as $value) {
    
    $dir = $folder.$value.'/';
    
    $images = scandir($dir);
    
    array_shift($images); array_shift($images);//删除目录里面的第一第二个
    
    $i = 1;
    foreach($images as $val) {
        
        rename($dir.$val, $dir.'img_'.sprintf("%02d",$i++).'.jpg');
        
    }
}

?>