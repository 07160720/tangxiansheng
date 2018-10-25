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
require_once ('../includes/page_validate.php');//验证是否是用户登录
include_once ('../includes/db_connect.php');

if(isset($_GET['dateFrom']) && !empty($_GET['dateFrom'])){
    $dateFrom = trim($_GET['dateFrom']);
    $dateTo = trim($_GET['dateTo']);
    
    // 输出Excel文件头，可把user.csv换成你要的文件名
    header('Content-Type: application/vnd.ms-excel');
    
    if($dateFrom=='all'){//导出全部
        header('Content-Disposition: attachment;filename="'.$WEB_NAME.'全部留言数据.csv"');
    }elseif ($dateFrom==$dateTo){//导出指定一天
        header('Content-Disposition: attachment;filename="'.$WEB_NAME.'留言数据'.$dateFrom.'.csv"');
    }else{//导出几天的
        header('Content-Disposition: attachment;filename="'.$WEB_NAME.'留言数据'.$dateFrom.'至'.$dateTo.'.csv"');
    }
    header('Cache-Control: max-age=0');
    
    // 从数据库中获取数据，为了节省内存，不要把数据一次性读到内存，从句柄中一行一行读即可
    //连接数据库
    
    $db=new MyDB();
    
    if ($dateFrom=='all'){//判断是导出指定日期还是全部数据
        $sql = "select * from message order by date desc";
    }
    else{
        $sql="SELECT * FROM message WHERE DATE( date ) >= '".$dateFrom."' AND DATE( date ) <= '".$dateTo."' ORDER BY DATE DESC";
    }
    $stmt = $db->Query($sql);

    // 打开PHP文件句柄，php://output 表示直接输出到浏览器
    $fp = fopen('php://output', 'a');
    
    // 输出Excel列名信息
    $head = array('ID', '姓名', '电话', 'Email', '地址', '日期', '留言', '来源', '状态');
    foreach ($head as $i => $v) {
        // CSV的Excel支持GBK编码，一定要转换，否则乱码
        $head[$i] = iconv('utf-8', 'gbk', $v);
    }
    // 将数据通过fputcsv写到文件句柄
    fputcsv($fp, $head);
    // 计数器
    $cnt = 0;
    // 每隔$limit行，刷新一下输出buffer，不要太大，也不要太小
    $limit = 100000;
     
    // 逐行取出数据，不浪费内存 
    while (!!$row=mysql_fetch_array($stmt)) { 
    
        $cnt ++; 
        if ($limit == $cnt) { //刷新一下输出buffer，防止由于数据过多造成问题 
            ob_flush(); 
            flush(); 
            $cnt = 0; 
        }
        
        $u=0; $data="";
        foreach ($row as $i => $v) {                       //赋值给$data 
            $data[$u]=iconv('utf-8', 'gbk', $row[$u]."\t");//csv必须转换成gbk格式才不会出现乱码，
                $u++;                                      //每行字符串后面加上"\t"可以避免excel自动转换为科学计数法，不能用'\t'
        } 
       
        fputcsv($fp, $data); 
       
     } 
     
}
?>
