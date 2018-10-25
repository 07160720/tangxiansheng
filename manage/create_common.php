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
    include_once '../includes/column_array.php'; //包含栏目数组文件
    
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
    /* 连接数据库获取数据 */
    include_once '../includes/db_connect.php'; $db = new MyDB();
    
    $sql = "SELECT * FROM `column` WHERE `model` = 'common'";
    //var_dump($sql);exit;
    $common_col = $db->GetDatas($sql);

    $sql_joins="SELECT * FROM `joins`";
    
    $result_joins = $db->GetDatas($sql_joins);
   
    foreach ($common_col as $key => $this_col) {
        
        $smarty->assign('domain', $cfg_domain);//域名
        $smarty->assign('web_name',$WEB_NAME);
        $smarty->assign('page_title', $cfg_webname);//页面标题
        $smarty->assign('keywords', $cfg_keywords);
        $smarty->assign('description', $cfg_description);
        $smarty->assign('list', $result_joins);
        $smarty->assign('column', $this_col['name']);//当前栏目
        $smarty->assign('consult_phone', $cfg_phone);//咨询电话
        $smarty->assign('cfg_company', $cfg_company);
        $smarty->assign('cfg_address', $cfg_address);
        $smarty->assign("index", $this_col['porder']-1);//jq选中当前菜单栏的索引
        $smarty->assign("53kf", $cfg_53kf);//53客服链接
        $sql = "SELECT * FROM `column_content` WHERE `column` = '{$this_col['id']}'";

        $data = $db->GetData($sql);

        $smarty->assign('content', $data['content1']); //栏目内容

        if($this_col['pid'] != 0){
            $smarty->assign('upper_col', $column_array[$this_col['pid']]);//上级栏目
            $sql = "SELECT * FROM `column` WHERE `pid` = '{$this_col['pid']}' ORDER BY `porder` ASC";
            $same_col = $db->GetDatas($sql);
            $smarty->assign('same_col', $same_col);//所有栏目栏目
            $smarty->assign("index", $column_array[$this_col['pid']][porder]-1);//jq选中当前菜单栏的索引
        }
        
        $html_content= $smarty->fetch($this_col['template']);
            
        file_put_contents('../'. $this_col['link'], $html_content);
    }

    echo "<div style='font-size:13px;'>更新完通用页面</div>";
?>