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
    
    echo '
        <div style="text-align:center; margin-top:190px; font-size:14px;">
            <a style="text-decoration: none; background:#ccc; color:#000; padding:5px 10px; border:2px solid #eee; border-radius:5px;" href="?act=clear">清理缓存</a>
        </div>
        '; 
    
    if(@$_REQUEST['act'] == 'clear'){
        
        include_once("../manage/libs/Smarty.class.php"); //包含smarty类文件
        $smarty = new Smarty(); //建立smarty实例对象$smarty
        $smarty->caching = false; //缓存方式
        $smarty->cache_dir = '../manage/cache';
        $smarty->clear_all_cache();
        //弹出完成提示框
        echo '<div align="center"></br><div style="width:150px; border:1px solid #666; padding:10px; font-size:13px;">已清理模板缓存</br>......</div></div>';
    }
?>