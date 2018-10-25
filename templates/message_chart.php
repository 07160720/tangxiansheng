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

@header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8php
require_once ('../includes/page_validate.php');//验证是否是用户登录
date_default_timezone_set('Asia/BeiJing');//设置时区

/*连接数据库获取数据*/
include '../includes/db_connect.php';

$db = new MyDB();

/* 计算当月总留言数 */
@$sql = "SELECT count(*) FROM `message` WHERE `date` like '".date('Y-m',time())."%'";

$msgSum = $db->GetData($sql);

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

body{margin:0;padding:0;font-size: 13px;}
ul,li,dl,dd,dt,p{margin:0;padding:0;}
ul,li{list-style:none;}
/* 当月统计 */
.month-sum{margin-top: 80px;padding:0 20px;}
.month-sum span{font-size: 15px;font-weight: bold;text-decoration: underline;}
/*柱状图样式*/
.histogram-container{position:relative;margin:80px auto 50px; width:800px;padding: 0 10px;}
.histogram-bg-line{border:#666 solid;border-width:0 0 1px 1px;overflow:hidden;width:670px;padding-top: 20px}
.histogram-bg-line ul{overflow:hidden;border:#eee solid;border-width:1px 0 0 0;width: 650px;}
.histogram-bg-line li{float:left;width:130px;/*根据.histogram-bg-line下的ul里面li标签的个数来控制比例*/overflow:hidden;}
.histogram-bg-line li div{border-right:1px #eee solid;}

.histogram-content{position:absolute;left:10px;top:0px;width:650px;height:270px;}
.histogram-content ul{height:100%;}
.histogram-content li{float:left;height:100%;width:20%;/*根据直方图的个数来控制这个width比例*/text-align:center;position:relative;}

.histogram-content .histogram-box{position:relative;display:inline-block;height:100%;width:30px;}
.histogram-content li a{position:absolute;bottom:0;right:0;display:block;width:30px;}
.histogram-content li a .sum{position:absolute;display:inline-block;top:-30px;left:5px;color: #FF4500; font-weight: bold;}/* 统计数量 */
.histogram-content li .name{position:absolute;bottom:-25px;left:0px;white-space:nowrap;display:inline-block;width:100%;font-size:13px;}

.histogram-y{position:absolute;left:-60px;top:-37px;font:12px/1.8 verdana,arial;}
.histogram-y li{text-align:right;width:55px;padding-right:5px;color:#333;}
.histogram-bg-line li div,.histogram-y li{height:49px;/*控制单元格的高度及百分比的高度，使百分数与线条对齐*/}

.des{width: 300px;margin: auto;margin-bottom: 50px;color: #666666;}/* 图标描述 */

#select{display: none;}/*上下页的控制*/
.paging input[type="text"]{display: none;}
</style>

</head>

<body>
<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed;top: 0px;background:#DDEEF2;padding: 10px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >留言统计</span>
</div>
<!--当前操作  -->
<div class="month-sum">本月留言数据总数：<span><?php echo $msgSum[0]?></span> 条</div>
<div class="histogram-container" id="histogram-container">
    <!--背景方格-->
    <div class="histogram-bg-line">
        <ul>
            <li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li>
        </ul>
       <ul>
            <li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li>
        </ul>
        <ul>
            <li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li>
        </ul>
        <ul>
            <li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li>
        </ul>
        <ul>
            <li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li><li><div></div></li>
        </ul>
    </div>
    <!--柱状条-->
    <div class="histogram-content">
        <ul>
        <?php 

        $sql="SELECT COUNT(*) FROM `message_count`";
   
        $result=$db->GetData($sql);
        $sum=$result[0];//记录总数
        
        //每页显示的记录数量
        $item=5;
        
        //获得总页数
        $pageSum=ceil($sum/$item);
        
        //页码容错处理
        if(isset($_GET['page']) && !empty($_GET['page'])){
            
            $temp_page = trim($_GET['page']);
            
            //跳转页数大于总页数时处理
            $page = $temp_page > $pageSum ? $pageSum : $temp_page ;
        }
        else{
            $page=1;
        }
       
        //获取limit的第一个参数的值
        $from=($page-1)*$item;
        
       //无数据时的操作
       if($sum==0){
          $from=0;
          echo "</br><font color='#FF0000'>&nbsp;&nbsp;&nbsp;&nbsp;暂无相关数据</font>" ;
       }
        
        $sql="SELECT * FROM `message_count` ORDER BY `date` DESC LIMIT ".$from.",".$item;
    
        $resource=$db->Query($sql);
        
        $color = array("#2f87d9","green","orange","gray","yellow");//颜色数组
        $i = 0;
        
        //输出信息
        while($data=mysql_fetch_array($resource)){
            
            echo "
            <li>
                <span class='histogram-box'><a style='height:".($data["sum"]*10)."px;background:{$color[$i]};' title='{$data["sum"]}'><span class='sum'>{$data["sum"]}</span></a></span>
                <span class='name'>{$data['date']}</span>
            </li>
            ";
            $i++;
        }
       ?>
        </ul>
    </div>
    
    <!--百分比 y轴-->
    <div class="histogram-y">
        <ul>
           	<li>(数量/条)</li>
            <li>25</li>
            <li>20</li>
            <li>15</li>
            <li>10</li>
            <li>5</li>
            <li>0</li>
             
        </ul>
    </div>
</div>
<div class="des">每日留言数据统计条形图</div>
<?php include_once 'nextPage.php';//上下页文件?>
<script type="text/javascript">
  function goPage(value){
	window.location.href="?page="+value;
  }
  
</script>
</body>