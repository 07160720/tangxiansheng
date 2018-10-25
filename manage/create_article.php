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

class article{

    private $smarty;
    private $db;
   
    function __construct() {
       
        /********初始化smarty *************************/
         
        include_once("../manage/libs/Smarty.class.php"); //包含smarty类文件
        $smarty = new Smarty(); //建立smarty实例对象$smarty
        
        $smarty->compile_check = true;
        $smarty->template_dir= "../tpl"; //设置模板目录
        $smarty->compile_dir= "../manage/templates_c"; //设置编译目录
        $smarty->caching = false; //缓存方式
        $smarty->left_delimiter = "{#";
        $smarty->right_delimiter = "#}";
        
        $this->smarty = $smarty;
        
        /**************** 完成smarty初始化***************  */
        
        /** 连接数据库获取数据 */
        include_once '../includes/db_connect.php'; $this->db = new MyDB();

    }
    function create_list($cid) {
        
        include '../includes/config.php'; //包含参数配置文件
        include '../includes/column_array.php'; //包含栏目数组文件
  
        $smarty = $this->smarty; //smarty对象
       
        $sum = 0; $sum1 = 0; $data = null; //遍历总数
        
        $sql = "SELECT `article`.*,`column`.catalog FROM `article`,`column` 
                WHERE `article`.`column` = '$cid' and column.id = '$cid' ORDER BY `article`.date DESC";
        
        $data = $this->db->GetDatas($sql); 

        $sum = count($data);

        $template = "news.htm"; //模板文件  

        @$location = "../".$column_array[$cid][catalog]."/"; //存放生成文件的目录
        //var_dump($location);
        $listSum = 7; //列表显示的项数
        
        $pageItem = 5; //上下页栏要显示的项数
        
        $pageSum = ceil($sum / $listSum);//分页处理
        
        if (! file_exists($location)) {  // 判断存放文件目录是否存在,不存在就创建
        
            mkdir($location, 0777, true);
        }

        for ($page = 1; $page <= $pageSum; $page ++) {//每页循环
            $temp_data = array_slice($data, ($page - 1) * $listSum, $listSum);//按页数切分数组
            $smarty->assign('domain', $cfg_domain);//域名
            @$smarty->assign('column', $column_array[$cid][name]);//当前栏目
            $smarty->assign('page_title', $cfg_webname);//页面标题
            $smarty->assign('keywords', $cfg_keywords);
            $smarty->assign('description', $cfg_description);
            $smarty->assign("list", $temp_data);//新闻列表
            $smarty->assign("views", rand(300,1000));//浏览次数随机生成
            $smarty->assign("page_sum", $pageSum);//页面总数
            $smarty->assign("this_page", $page);//当前页数
            $smarty->assign("consult_phone", $cfg_phone);//咨询电话
            @$smarty->assign("index", $column_array[$cid][porder]-1);//jq选中当前菜单栏的索引
            $smarty->assign("53kf", $cfg_53kf);//53客服链接
            //var_dump($temp_data);exit;
             /*----------产品列表---------------  */
            $sql_product = "SELECT * FROM `product` ORDER BY `id` ASC";

            $db = new MyDB();

            $data_product = null;
            $data_product = $db->GetDatas($sql_product);
            //var_dump($data_product);exit;

            $smarty->assign("list_product", $data_product);
           
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
        
            $smarty->assign("page_array",$pageArray);//页码赋值

            $html_content= $smarty->fetch($template);

            file_put_contents($location.'page_'. $page. '.html', $html_content);

        }
        echo "<div style='font-size:13px;'>更新完【".$column_array[$cid]['name']."】文章列表</div>";
        
        $this->create_detail($cid);
    }
    
    function create_detail($cid) {
        include '../includes/config.php'; //包含参数配置文件
        include '../includes/column_array.php'; //包含栏目数组文件
        
        $smarty = $this->smarty; //smarty对象
        
        $sum = 0; $sum1 = 0; $data = null; //遍历总数
        
        $sql = "SELECT * FROM `article` WHERE `column` = '$cid' ORDER BY `date` DESC";

        $data = $this->db->GetDatas($sql);

        $sum = count($data);

        $template = "news_detail.htm"; //模板文件
         
        $location = $column_array[$cid]['catalog']."/"; //存放生成文件的目录
        
        for ($i = 0; $i <= $sum; $i ++) {
        
            $smarty->assign('domain', $cfg_domain);//域名
            @$smarty->assign('page_title', $data[$i]['title']. '_'. $cfg_webname);//页面标题
            $smarty->assign('keywords', empty($data[$i]['keywords'])?$cfg_keywords:$data[$i]['keywords']);
            @$smarty->assign('description', empty($data[$i]['description']) ? mb_substr(str_replace(array("\t", "\r", "\n","&nbsp;"),"",strip_tags($data[$i]['context'])), 0, 60, "utf-8") : $data[$i]['description']);        
            @$smarty->assign('column', '<a href="'.$cfg_domain.$column_array[$cid]['catalog'].'/page_1.html"> '.$column_array[$cid]['name'].' </a> > '. $data[$i]['title']); //当前栏目
            @$smarty->assign("id", $data[$i]['id']); //文件ID，传递给统计点击的文件
            @$smarty->assign("title", $data[$i]['title']);
            @$smarty->assign("date", $data[$i]['date']);
            $smarty->assign("views", rand(300,1000));//浏览次数随机生成
            @$smarty->assign("context", $data[$i]['context']);
            $smarty->assign("consult_phone", $cfg_phone);//咨询电话
            @$smarty->assign("index", $column_array[$cid][porder]-1);//jq选中当前菜单栏的索引
            $smarty->assign("53kf", $cfg_53kf);//53客服链接
        
            @$smarty->assign('last_href', $cfg_domain. $location. $data[$i - 1]['id'] . ".html");
            @$smarty->assign('this_href', $cfg_domain. $location. $data[$i]['id'] . ".html");
            @$smarty->assign('last_title', $data[$i - 1]['title']);
            @$smarty->assign('next_href', $cfg_domain. $location. $data[$i + 1]['id'] . ".html");
            @$smarty->assign('next_title', $data[$i + 1]['title']);
        
            $html_content= $smarty->fetch($template);
        
            @file_put_contents('../'. $location. $data[$i]['id']. '.html', $html_content);

        }
       
        echo "<div style='font-size:13px;'>更新完【".$column_array[$cid]['name']."】文章内容详情</div>";
    }
    
    
}

//$a = new article();$a->create_list(3);
?>