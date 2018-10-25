<?php
/**
 * KindEditor PHP
 *
 * 本PHP程序是演示程序，建议不要直接在实际项目中使用。
 * 如果您确定直接使用本程序，使用之前请仔细确认相关安全设置。
 *
 */
require_once ('../../../includes/page_validate.php');//验证是否是用户登录
require_once 'JSON.php';
$php_path = dirname(__FILE__) . '/';
$php_url = dirname($_SERVER['PHP_SELF']) . '/';

//根目录路径，可以指定绝对路径，比如 /var/www/attached/
$root_path = $php_path . '../../../articles_img/';
//根目录URL，可以指定绝对路径，比如 http://www.yoursite.com/attached/
$root_url = $php_url . '../../../articles_img/';
//图片扩展名
$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');

//目录名
$dir_name = empty($_GET['dir']) ? '' : trim($_GET['dir']);
if (!in_array($dir_name, array('', 'image', 'flash', 'media', 'file'))) {
	echo "Invalid Directory name.";
	exit;
}
if ($dir_name !== '') {
	$root_path .= $dir_name . "/";
	$root_url .= $dir_name . "/";
	if (!file_exists($root_path)) {
		mkdir($root_path);
	}
}

//根据path参数，设置各路径和URL
if (empty($_GET['path'])) {
	$current_path = realpath($root_path) . '/';
	$current_url = $root_url;
	$current_dir_path = '';
	$moveup_dir_path = '';
} else {
	$current_path = realpath($root_path) . '/' . $_GET['path'];
	$current_url = $root_url . $_GET['path'];
	$current_dir_path = $_GET['path'];
	$moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
}
//echo realpath($root_path);
//排序形式，name or size or type
$order = empty($_GET['order']) ? 'name' : strtolower($_GET['order']);

//不允许使用..移动到上一级目录
if (preg_match('/\.\./', $current_path)) {
	echo 'Access is not allowed.';
	exit;
}
//最后一个字符不是/
if (!preg_match('/\/$/', $current_path)) {
	echo 'Parameter is not valid.';
	exit;
}
//目录不存在或不是目录
if (!file_exists($current_path) || !is_dir($current_path)) {
	echo 'Directory does not exist.';
	exit;
}

//遍历目录取得文件信息
$file_list = array();
if ($handle = opendir($current_path)) {
	$i = 0;
	while (false !== ($filename = readdir($handle))) {
		if ($filename{0} == '.') continue;
		$file = $current_path . $filename;
		if (is_dir($file)) {
			$file_list[$i]['is_dir'] = true; //是否文件夹
			$file_list[$i]['has_file'] = (count(scandir($file)) > 2); //文件夹是否包含文件
			$file_list[$i]['filesize'] = 0; //文件大小
			$file_list[$i]['is_photo'] = false; //是否图片
			$file_list[$i]['filetype'] = ''; //文件类别，用扩展名判断
		} else {
			$file_list[$i]['is_dir'] = false;
			$file_list[$i]['has_file'] = false;
			$file_list[$i]['filesize'] = filesize($file);
			$file_list[$i]['dir_path'] = '';
			$file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
			$file_list[$i]['is_photo'] = in_array($file_ext, $ext_arr);
			$file_list[$i]['filetype'] = $file_ext;
		}
		$file_list[$i]['filename'] = $filename; //文件名，包含扩展名
		$file_list[$i]['datetime'] = date('Y-m-d H:i:s', filemtime($file)); //文件最后修改时间
		$i++;
	}
	closedir($handle);
}

//排序
function cmp_func($a, $b) {
	global $order;
	if ($a['is_dir'] && !$b['is_dir']) {
		return -1;
	} else if (!$a['is_dir'] && $b['is_dir']) {
		return 1;
	} else {
		if ($order == 'size') {
			if ($a['filesize'] > $b['filesize']) {
				return 1;
			} else if ($a['filesize'] < $b['filesize']) {
				return -1;
			} else {
				return 0;
			}
		} else if ($order == 'type') {
			return strcmp($a['filetype'], $b['filetype']);
		} else {
			return strcmp($a['filename'], $b['filename']);
		}
	}
}
usort($file_list, 'cmp_func');

$result = array();
//相对于根目录的上一级目录
$result['moveup_dir_path'] = $moveup_dir_path;
//相对于根目录的当前目录
$result['current_dir_path'] = $current_dir_path;
//当前目录的URL
$result['current_url'] = $current_url;
//文件数
$result['total_count'] = count($file_list);
//文件列表数组
$result['file_list'] = $file_list;

//输出JSON字符串
header('Content-type: application/json; charset=UTF-8');
$json = new Services_JSON();
echo $json->encode($result);

/*图片添加删除的*/
if($_GET["action"]=="delete"){//如果action=delete
    
    $url=$_GET["url"];
    $url=$_SERVER['DOCUMENT_ROOT'].$url;//替换路径
    if(empty($url)){//如果url为空
        die(0);
    }
    
    if(file_exists($url)){//检查文件是否存在
        $result=unlink($url);//删除文件
        if($result){//如果成功删除
            echo 1;
        }else{
            echo 0;
        }
    }else{
        echo -1;
    }
    
   die(json_encode($result)); 
}
/*图片添加删除的*/

/** 删除所有空目录  * @param String $path 目录路径  */ 
function rm_empty_dir($path){ 
    if(is_dir($path) && ($handle = opendir($path))!==false){   
        while(($file=readdir($handle))!==false){// 遍历文件夹        
            if($file!='.' && $file!='..'){          
                $curfile = $path.'/'.$file;// 当前目录          
                if(is_dir($curfile)){// 目录            
                    rm_empty_dir($curfile);// 如果是目录则继续遍历            
                    if(count(scandir($curfile))==2){//目录为空,=2是因为.和..存在             
                        rmdir($curfile);// 删除空目录           
                    }          
                }        
            }      
        }      
        closedir($handle);    
    }  
}  
 $folder = '../../../articles_img/image'; 
rm_empty_dir($folder);
            