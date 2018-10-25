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


    @header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8
    include_once '../includes/config.php'; //包含参数配置文件
    
    /********设置smarty *************************/
     
    include_once("../manage/libs/Smarty.class.php"); //包含smarty类文件
    $smarty = new Smarty(); //建立smarty实例对象$smarty
    
    $smarty->compile_check = true;
    $smarty->template_dir="../tpl"; //设置模板目录
    $smarty->compile_dir="../manage/templates_c"; //设置编译目录
    $smarty->caching = false; //缓存方式
    $smarty->left_delimiter = "{#";
    $smarty->right_delimiter = "#}";
    
    /**************** 结束设置smarty***************  */

    $template = "sitemap.htm"; //模板文件
    
    $location = "../"; //存放生成文件的目录
        
    /* 连接数据库获取数据 */
    include_once '../includes/db_connect.php'; $db = new MyDB();
    
    $news_lists = array('3' => 'list_news', '4' => 'list_case');
    
    foreach ($news_lists as $cid => $list) {
        
        $sql = "SELECT `article`.*,`column`.catalog,`column`.name FROM `article`,`column`
        WHERE `article`.`column` = '$cid' and column.id = '$cid' ORDER BY `article`.date DESC";
        
        $data = null;
        $data = $db->GetDatas($sql);
        
        $smarty->assign($list, $data);//新闻列表
        
        unset($data);//释放数组内存
    }
    
    $smarty->assign('domain', $cfg_domain);//域名
    $smarty->assign('page_title', $cfg_webname);//页面标题
    $smarty->assign('keywords', $cfg_keywords);
    $smarty->assign('description', $cfg_description);
    
    $html_content= $smarty->fetch($template);
    
    file_put_contents($location.'sitemap.html', $html_content);


    echo "<div style='font-size:13px;'>更新完【网站地图】</div>";
    
?>