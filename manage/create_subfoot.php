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

ob_start(); //防止output导致header出错
@header("Content-type:text/html;charset=UTF-8"); //把编码转换为utf8
include_once '../includes/config.php';
include_once '../includes/general_function.php';

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

$template = "foot.htm"; //模板文件
$location = "../tpl/"; //存放生成文件的目录

/* 连接数据库获取数据 */
include_once '../includes/db_connect.php'; $db = new MyDB();

/*友情链接*/
$friendlink = null;
$friendlink = $db->GetDatas("SELECT * FROM `friendlylink` ORDER BY `id` ASC");
$column_arrs = null;
$column_arrs = $db->GetDatas("SELECT * FROM `column` WHERE `display` = 'show' ORDER BY `porder`");

$smarty->assign('domain', $cfg_domain);
$smarty->assign('column', formatTree( $column_arrs, 0));
$smarty->assign('cfg_company', $cfg_company);
$smarty->assign('cfg_address', $cfg_address);
$smarty->assign('cfg_icp', $cfg_icp);
$smarty->assign('consult_phone', $cfg_phone);//联系电话
$smarty->assign('friendlink', $friendlink);

$html_content= $smarty->fetch($template);
file_put_contents($location.'footsub.htm', $html_content);

echo "<div style='font-size:13px;'>更新完页面底部</div>";

?>