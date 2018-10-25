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
include_once ('../includes/config.php');/* 常量配置文件  */
include_once ('../includes/db_connect.php');
/*==========================================*/
/*验证是否存在用户名*/
/*==========================================*/
if (isset($_GET['name'])) {//当有用户名提交时  
    
    $username = trim($_GET['name']);
    
    $result = array();
    
    if (! preg_match('/^[a-z][a-z0-9]{2,19}$/i', $username)) { //不匹配就说明用户名不正确 
        
        $result['status'] = 0;
        
        $result['text'] = '用户名 "' . $username . '" 格式不正确';
        
        die( json_encode($result) );  
    }
    
    // 连接数据库
    $db = new MyDB();
    
    $sql = "select count(*) from user where name ='" . $username . "'";
    
    $data = $db->GetData($sql);
    
    if ($data[0] != 0) { // 如果记录数不等于0就说明用户名已存在
        
        $result['status'] = 0;
        
        $result['text'] = '用户 "' . $username . '" 已存在';
        
    } else {
        
        $result['status'] = 1;
        
        $result['text'] = '√';  
    }   
      
    die( json_encode($result) );  
}  
/*==========================================*/
/*留言板获取当前网站的品牌名称*/
/*==========================================*/
if (isset($_GET['brand_name'])) {//获取品牌名称
    
    // $result['item'] = $WEB_NAME; 
    //var_dump($result['item']);exit;
    die( $WEB_NAME );
}
?>  