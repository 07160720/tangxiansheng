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

//连接数据库
include_once '../includes/db_connect.php';$db = new MyDB();

$sql_p1 = "SELECT * FROM `product` ORDER BY `id` ASC limit 0,9";
        
$data_p1 = $db->GetDatas($sql_p1);

$sql_p2 = "SELECT * FROM `product` ORDER BY `id` ASC limit 9,18";
        
$data_p2 = $db->GetDatas($sql_p2);

$sql_p3 = "SELECT * FROM `product` ORDER BY `id` ASC limit 18,24";
      
$data_p3 = $db->GetDatas($sql_p3);

$sql_p4 = "SELECT * FROM `product` ORDER BY `id` ASC limit 24,33";

$data_p4 = $db->GetDatas($sql_p4);

$sum = count($data);

$cid = 5; //控制器所属栏目的id

$template = $column_array[$cid]['template']; //模板文件

$location = "../".$column_array[$cid]['catalog']."/"; //存放生成文件的目录

$listSum = 9; //列表显示的项数

$pageItem = 5; //上下页栏要显示的项数

$pageSum = ceil($sum / $listSum);//分页处理

if (! file_exists($location)) {  // 判断存放文件目录是否存在,不存在就创建

    mkdir($location, 0777, true);
}

for ($page = 1; $page <= $pageSum; $page ++) {//每页循环

    $temp_data_p1 = array_slice($data_p1, ($page - 1) * $listSum, $listSum);//按页数切分数组
    $temp_data_p2 = array_slice($data_p2, ($page - 1) * $listSum, $listSum);//按页数切分数组
    $temp_data_p3 = array_slice($data_p3, ($page - 1) * $listSum, $listSum);//按页数切分数组
    $temp_data_p4 = array_slice($data_p4, ($page - 1) * $listSum, $listSum);//按页数切分数组
    $smarty->assign('domain', $cfg_domain);//域名
    $smarty->assign('column', $column_array[$cid]['name']);//当前栏目
    $smarty->assign('page_title', $cfg_webname);//页面标题
    $smarty->assign('keywords', $cfg_keywords);
    $smarty->assign('description', $cfg_description);
    $smarty->assign("list_p1", $temp_data_p1);//列表
    $smarty->assign("list_p2", $temp_data_p2);//列表
    $smarty->assign("list_p3", $temp_data_p3);//列表
    $smarty->assign("list_p4", $temp_data_p4);//列表
    $smarty->assign("page_sum", $pageSum);//页面总数
    $smarty->assign("this_page", $page);//当前页数
    @$smarty->assign("index", $column_array[$cid][porder]-1);//jq选中当前菜单栏的索引
    $smarty->assign("53kf", $cfg_53kf);//53客服链接

    $pageArray = array(); //装载页码的数组
    //exit;

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

    $html_content= $smarty->fetch($template);

    file_put_contents($location.'page_'. $page. '.html', $html_content);
}

echo "<div style='font-size:13px;'>更新完【".$column_array[$cid]['name']."】</div>";

?>