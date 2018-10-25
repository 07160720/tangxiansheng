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
    include '../includes/column_array.php'; //包含栏目数组文件
    
    /*=============================================
              设置 smarty BEGIN
    ===========================================*/
     
    include_once("../manage/libs/Smarty.class.php"); //包含smarty类文件
    $smarty = new Smarty(); //建立smarty实例对象$smarty
    
    $smarty->compile_check = true; 
    $smarty->template_dir="../tpl"; //设置模板目录
    $smarty->compile_dir="../manage/templates_c"; //设置编译目录
    $smarty->caching = false; //缓存方式
    $smarty->left_delimiter = "{#";
    $smarty->right_delimiter = "#}";
    $cid = 1;
    /*======设置 smarty END=====================*/
    
    //$template = "index.htm"; //模板文件
    
    $template = "index.htm"; //模板文件
    
    $location = "../"; //存放生成文件的目录
    /* 连接数据库获取数据 */
    include_once '../includes/db_connect.php'; $db = new MyDB();
    //$column_arrs = $db->GetDatas("SELECT * FROM `column` WHERE `display` = 'show' ORDER BY `porder`");
    //$smarty->assign('column', @formatTree( $column_arrs, 0));
    $smarty->assign('domain', $cfg_domain);//域名
    $smarty->assign('page_title', empty($cfg_index_title)?$cfg_webname:$cfg_index_title);//页面标题
    $smarty->assign('keywords', $cfg_keywords);
    $smarty->assign('description', $cfg_description);
    $smarty->assign('column_array', $column_array);//所有栏目数组
    $smarty->assign('consult_phone', $cfg_phone);//咨询电话
    //$smarty->assign("views", rand(300,1000));//浏览次数随机生成
    $smarty->assign("53kf", $cfg_53kf);//53客服链接
    
    /*----------新闻列表---------------  */
    $news_lists = array('3' => 'list_news', '4' => 'list_case');
    
    foreach ($news_lists as $cid => $list) {
        
        $sql = "SELECT `article`.*,`column`.catalog FROM `article`,`column`
        WHERE `article`.`column` = '$cid' and column.id = '$cid' ORDER BY `article`.date DESC LIMIT 0, 10";

        $data = null;
        $data = $db->GetDatas($sql);
        
        $smarty->assign($list, $data);//新闻列表

        unset($data);//释放数组内存
    }

     /*----------新闻列表---------------  */
    $lists_random = array('3' => 'list_random');
    
    foreach ($lists_random as $cid => $list_random) {

        $sql_random = "select  *  from  article order by rand() limit 3";

        $data_random = null;

        $data_random = $db->GetDatas($sql_random);
        
        $smarty->assign($list_random, $data_random);//新闻列表

        unset($data_random);//释放数组内存
    }  

    /*----------产品列表---------------  */
    $sql = "SELECT * FROM `product` ORDER BY `id` ASC";
    
    $data = null;
    $data = $db->GetDatas($sql);
    
    $smarty->assign("list_product", $data);
 
    /*----------门店展示---------------  */
    $sql = "SELECT * FROM `show` ORDER BY `id` DESC";

    $data = null;
    $data = $db->GetDatas($sql);
    
    $smarty->assign("list_show", $data);
    
    /*----------关于我们---------------  */
    $sql = "SELECT * FROM `column_content` WHERE `column` = 2";
    
    $data = null;
    $data = $db->GetData($sql);
    
    $smarty->assign("about_content", $data['content1']);
    
    /*----------留言描述---------------  */
    $sql = "SELECT * FROM `column_content` WHERE `column` = 6";
    
    $data = null;
    $data = $db->GetData($sql);
    
    $smarty->assign("message_content", $data['content1']);
    
    $html_content= $smarty->fetch($template);

    @file_put_contents($location.'index.html', $html_content);

    echo "<div style='font-size:13px;'>更新完首页</div>";
    @$_GET['act']=='goback' && header("Location:../templates/refresh_tpl.php");//只更新首页时返回
?>