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

include_once 'create_subhead.php';

include_once 'create_subfoot.php';

include_once 'create_index.php';

include_once 'create_article.php';

include_once 'create_common.php';

$article = new article();
$article->create_list('3');
$article->create_list('4');

include_once 'create_product.php';

include_once 'create_smap.php';
header("Refresh:0.5;url=../templates/refresh_tpl.php");//延时跳转
?>