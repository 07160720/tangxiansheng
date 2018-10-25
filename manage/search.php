<?php
/**
 * 后台文章管理程序文件
 * ============================================================================
 * 版权所有 2016-2017 
 *-----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: 谢贤柱  Contact: 13560343554  
*/


    @header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8
    include_once '../includes/config.php'; //包含参数配置文件
    
    /********设置smarty *************************/
     
    include_once("./libs/Smarty.class.php"); //包含smarty类文件
    $smarty = new Smarty(); //建立smarty实例对象$smarty
    
    $smarty->compile_check = false;
    $smarty->template_dir="../tpl"; //设置模板目录
    $smarty->compile_dir="./templates_c"; //设置编译目录
    $smarty->caching = true; //缓存方式
    $smarty->cache_dir = './cache';
    $smarty->cache_lifetime = 3600 * 24;
    $smarty->left_delimiter = "{#";
    $smarty->right_delimiter = "#}";
    
    /**************** 结束设置smarty***************  */
    
    $template = "search_list.htm"; //模板文件
    
    $listSum = 7; //列表显示的项数
    
    $pageItem = 5; //上下页栏要显示的项数
    
    $cat = $_REQUEST['cat'];
    
    $page = $_REQUEST['page'];
    
    /* 连接数据库获取数据 */
    include_once '../includes/db_connect.php'; $db = new MyDB();
    
    $sum = 0; $sum1 = 0; $data = null; //遍历总数
    
    $sql = "SELECT * FROM `brand` where `ch_name` LIKE '%".$cat."%' ORDER BY `id` ASC";
    $data = $db->GetDatas($sql);
    $sum = count($data);

    $sql = "SELECT * FROM `article` ORDER BY `date` DESC LIMIT 0, 10";
    $list_latest = $db->GetDatas($sql);
    
    $pageSum = ceil($sum / $listSum);//分页处理
    
    if(empty($data) || $page > $pageSum || $page < 1){
        
        $smarty->assign('noresult', "抱歉，没有找到与‘" .$cat. "’相关的内容，请查看输入的文字是否有误");//无结果时输出
        $smarty->assign('arrow_l', '<!--'); //隐藏页码的注释箭头
        $smarty->assign('arrow_r', '-->'); //隐藏页码的注释箭头
        
    }else{
      
        $temp_data = array_slice($data, ($page - 1) * $listSum, $listSum);//按页数切分数组
    }
    
    $smarty->assign('domain', $cfg_domain);//域名
    $smarty->assign('column', "醉鹅搜索");//当前栏目
    $smarty->assign('page_title', $cfg_webname);//页面标题
    $smarty->assign('keywords', $cfg_keywords);
    $smarty->assign('description', $cfg_description);
    $smarty->assign("list", $temp_data);//新闻列表 
    $smarty->assign("page_sum", $pageSum);//页面总数
    $smarty->assign("this_page", $page);//当前页数
    $smarty->assign("cat", $cat);//当前关键词
    $smarty->assign("list_latest", $list_latest); //右侧框
    
    $pageArray = array(); //装载页码的数组
    
    if ($pageSum <= $pageItem) { /**总页数小于等于显示的页框数*/
    
        for ($j = 1; $j <= $pageSum; $j ++) {
            $pageArray[] = $j;
        }
    
    } elseif ($pageSum > $pageItem) {/**总页数大于显示的页框数 */
    
        if ($page < $pageItem) { // 当前页码小于显示的页框数
    
            for ($j = 1; $j <= $pageItem; $j ++) {
                $pageArray[] = $j;
            }
        
        } elseif ($pageItem <= $page && $page <= $pageSum - floor($pageItem/2)) {//当前页码大于等于显示的页框数小于倒数($pageItem/2)个
    
            for ($j = $page - floor($pageItem/2); $j <= $page + floor($pageItem/2); $j ++) {
                $pageArray[] = $j;
            }
    
        } else {//当前页码为倒数($pageItem/2)个的操作
    
            for ($j = $pageSum - $pageItem + 1; $j <= $pageSum; $j ++) {
                $pageArray[] = $j;
            }
        }
    }
    
    $smarty->assign("page_array", $pageArray);//页码赋值
    
    $smarty->display($template, $cat, $page);
        
?>