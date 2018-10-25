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
require_once ('../includes/page_validate.php');//验证是否是用户登录


/*连接数据库获取数据*/
include '../includes/db_connect.php';
$db = new MyDB();

/* 计算新信息 */
$sql = "SELECT count(*) FROM message WHERE ISNULL( state )";
$newMsg = $db->GetData($sql);

/*计算信息总数  */
$sql = "select count(*) from message";
$countMsg = $db->GetData($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body{font-size: 13px;background: #F4FAFB;padding: 0;margin: 0;}
.tab-div{padding:70px 30px 30px;border-top:2px solid #BBDDE5; }
.information-div{width: 500px;margin-bottom: 15px;}
.information-div div{padding:7px 0px 7px 10px;border-bottom: 1px dashed gray;border-left: 1px solid #80BDCB;border-right: 1px solid #80BDCB;}
.information-div .title{background:#DDEEF2;border: 1px solid #80BDCB;color:#80BDCB;font-weight: bold;}
.information-div .end{border-bottom: 1px solid #80BDCB;}
.information-div .new{color:red;font-size: 18px;font-weight: bold;}
</style>
</head>

<body >

    <!--当前操作  -->
    <div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
    	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
    	<span style="font-size: 13px;color: gray;" >首页</span>
    </div>
    <!--当前操作  -->
    
	<div class="tab-div">

        <div class="information-div" >
          
            <div class="title">信息统计</div>
            <?php 
                if (!isset($_SESSION)) {
                   session_start();
                }
                
                if ($_SESSION['sta'] >= 2){//权限判断
                    
                    $class = $newMsg[0] > 0 ? "new" : "";//判断如果有新消息显示的字体就放大
                    
                    echo "<div >留言：有 <a href='message_check.php' class='$class' title='点击查看新留言'>$newMsg[0]</a> 条新留言  
                                <span>共  $countMsg[0] 条</span>
                          </div>";
                }
                
                $sql = "select `id`,`name` from `column` WHERE `model` = 'article'";
                $article_col = $db->GetDatas($sql);
                
                /*计算文章数  */
                foreach ((array)$article_col as $key => $value) {
                    
                    $sql = "select count(*) from `article` WHERE `column` = '$value[id]'";
                    $sum = $db->GetData($sql);
                    
                    if ($value == end($article_col)) {
                        echo "<div class='end'>$value[name]|文章数: $sum[0] 条</div>";
                    }else {
                        echo "<div>$value[name]|文章数: $sum[0] 条</div>";
                    }
                }
                
            ?>
            
       	 </div>
       	 <div class="information-div" >
          
                <div class="title">登录信息</div>
                
                <div class="end">身份级别：
                <?php 
                    switch ( $_COOKIE['status'] ) {
                        case '3':
                            echo "管理员"; break;
                        case '2':
                            echo "超级用户"; break;
                        case '1':
                            echo "用户"; break;
                    }
                ?>
                </div>
           
       	 </div>
   	 </div>
	
</body>
</html>