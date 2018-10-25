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
include_once ('../includes/config.php');//验证是否是用户登录
@date_default_timezone_set('Asia/BeiJing');//设置时区

/*连接数据库获取数据*/
include '../includes/db_connect.php';
$db=new MyDB();

/* 计算新留言 */
$sql="SELECT count(*) FROM message WHERE ISNULL( state )";
$newMsg = $db->GetData($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="600;url=message_check.php?page=1"/>
<link href="../styles/list.css" rel="stylesheet" type="text/css" />
<title>留言板</title>
<style type="text/css">
    #tabbody-div{padding:0px 2px;border-top:2px solid  #F3F3FA;vertical-align: middle;margin-top: 39px;}
    #operate-div{padding:2px 20px;border-bottom:1px solid #CCCCCC;}
    #operate-div span{vertical-align: middle;}
    #operate-div label.new{color:red;font-size: 15px;}
    #operate-div img{vertical-align: middle;}
    #operate-div select{vertical-align: middle;}
    #operate-div input{vertical-align: middle;}
    #operate-div img.bar{width:1px; height:30px;  margin: 0px 20px;background:#80BDCB; }

    #tabbody-div div div{margin: 6px 0px;}
    #tabbody-div .selectTop{padding-left:10px;}
    #tabbody-div div.ischecked{padding: 20px 20px 10px 30px;border-bottom:1px dotted #CCCCCC;color:#555555;background:#FFFFFF;}
    #tabbody-div div.unchecked{padding: 20px 20px 15px 30px;border-bottom:1px dotted #CCCCCC;color:#333;background: #F3F3FA;margin-top: 1px;}
    #tabbody-div div.ischecked span{color: #000000;}
    #tabbody-div div.ischecked:HOVER{background: #F5F5F5;border-bottom:1px solid #CCCCCC;}
  
</style>
</head>

<body >
<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
  <span style="font-size: 13px;color: #555555;">当前操作 ></span>
  <span style="font-size: 13px;color: gray;" >管理留言</span>
</div>
<!--当前操作  -->
 <div id="tabbody-div">
 
 <!-- 操作 -->
  <form method="get" id="searchform" action="message_check.php" name="searchForm" >
  
    <div id="operate-div">
        <img class="bar"  alt="" />
        
        <!-- 搜索 -->
        <img src="../images/icon_search.gif"   alt="SEARCH" /> 
        <select id="search_cat" name="search_cat"><option value='name'>姓名</option><option value="phone">电话</option></select>
        <input type="text" name="keyword" id="keyword" size="12" />
        <input type="submit" value="查询" />
        <input type="submit" value="显示全部" />
        <img  class="bar"  alt="" />
        
      <!-- 导出 -->
      <span>导出到表格：从</span>
        <input type="date" id="dateFrom" value="<?php echo date('Y-m-d',time());?>"/><span>&nbsp;到</span>
        <input type="date" id="dateTo" value="<?php echo date('Y-m-d',time());?>"/>
        <input type="button" value="导出指定日期" onclick="exportCsv(1)"/>
        <input type="button" value="导出全部" onclick="exportCsv('all')"/>
        
    </div>
  </form>
<!-- 操作# -->



<form enctype="multipart/form-data" name="listForm" id="list-form" action="message.php" method="post"   onsubmit="return deleteData('all')">

  <div  id="list-div">
        <table cellpadding="0" cellspacing="1" id="main-table">
          <?php 
          if(isset($_GET['keyword']) && !empty($_GET['keyword'])){

          $search_cat=trim($_GET['search_cat']);//搜索类别

          $keyword=trim($_GET['keyword']);//搜索关键词

          $sql="SELECT COUNT(*) FROM `message` WHERE ".$search_cat." like '%".$keyword."%' ORDER BY date DESC";

          }else{
            $sql="SELECT COUNT(*) FROM `message`";
          }

          $result=$db->GetData($sql);
          $sum=$result[0];//记录总数
    
          //每页显示的记录数量
          $item=10;
    
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

          if ($sum != 0) {
            echo  "<tr>
                  <th><input type='checkbox'  onclick='selectAll(this, 'checkboxes')' /></th>
                  <th><span>ID</span></th>
                  <th><span>姓名</span></th>
                  <th><span>手机号码</span></th>
                  <th><span>留言信息</span></th>
                  <th><span>时间</span></th>
                  <th><span>加盟项目</span></th>
                  <th><span>网址</span></th>
                  <th><span>操作</span></th>
                  </tr>";
          }
          else{
            echo '';
          }
          ?>
           
<?php 

    //获取limit的第一个参数的值
    $from=($page-1)*$item;
    
   //无数据时的操作
    if($sum==0){
      $from=0;
      echo "</br><font color='#FF0000'>&nbsp;&nbsp;&nbsp;&nbsp;暂无相关数据</font>" ;
    }
    
    if(isset($_GET['keyword']) && !empty($_GET['keyword'])){

       $search_cat=trim($_GET['search_cat']);//搜索类别
       $keyword=trim($_GET['keyword']);//搜索关键词
       
       $sql="SELECT * FROM `message` WHERE ".$search_cat." like '%".$keyword."%' ORDER BY `date` DESC ";

     }else{
       $sql="SELECT * FROM `message` ORDER BY `date` DESC LIMIT ".$from.",".$item;
     }

     $resource=$db->Query($sql);


    //输出信息
    while(!!$data = mysql_fetch_array($resource)){
        
        echo'
        <tr class="hover">

        <td align="center"><input type="checkbox" id="checkboxes" name="checkboxes[]" value="'.$data['id'] .'" onclick="hasselect()" /></td>
        <td align="center"><span>'.$data['id'] .'</span></td>
        <td align="center"><span>'.$data['name'] .'</span></td>
        <td align="center"> <span>'.$data['phone'] .'</span></td>
        <td align="center"><span>'.$data['message'] .'</span></td>
        <td align="center"><span>'.$data['date'] .'</span></td>
        <td align="center"><span>'.$data['item'] .'</span></td>
        <td align="center"><a href='.$data["source"].' target="_blank"><span>'.$data['source'] .'</span></a></td>
        <td align="center" >
        <a href="message_modify.php?id='.$data['id'].'">
        <input type="button" value="修改"/> 
        </a>&nbsp;&nbsp;
        <a href="javascript:void(0);" id="delete'.$data['id'].'" data="'.urldecode($data['name']).'" onclick="deleteOne('.$data['id'].')">
        <input type="button"  value="删除"/>        
        </a>
        </td>
        </tr>';

    }
    echo '</table></div>';
    include_once 'nextPage.php';//上下页文件
    
?>  
<script type="text/javascript">
  //跳转到CSV导出文件
  function exportCsv(temp){
    var dateFrom=document.getElementById("dateFrom").value;
    var dateTo=document.getElementById("dateTo").value;
    if(confirm("是否导出数据？")){
        if(temp=="all"){
          window.location.href="export_csv.php?dateFrom=all&&dateTo=all";
        }else if(temp=="1"){
          window.location.href="export_csv.php?dateFrom="+dateFrom+"&&dateTo="+dateTo;
        }
    } 
  }

  //录入后的操作
  function isCheck(id){
    window.clearInterval(interval);//关闭新消息提醒
    window.parent.maintitle.innerHTML = webtitle;//标题更改回正常
    
    //录入后更改样式
    var div=document.getElementById('item'+id);
    div.className="ischecked"
    var input=document.getElementById('check'+id);
    input.style.display="none";
    
    //ajax无刷新打开message.php将当前的信息设定为已查看状态    
    //创建ajax对象  
    var ajax=null;
      if(window.ActiveXObject){   
          ajax=new ActiveXObject('Microsoft.XMLHTTP');  
      }else if(window.XMLHttpRequest){  
          ajax=new XMLHttpRequest();   
      }
      ajax.open("GET","message.php?id="+id+"&&act=isCheck",true);
      ajax.send(null);
    //创建ajax对象     
  }

  //删除信息
    function deleteOne(id){
      if(id == 'all'){
        if(confirm("确定要删除选中的记录吗？")){
          return true;
        }else{return false;}
        
      }else{
        var title=document.getElementById('delete'+id).attributes["data"].value;
        if(confirm("确定要删除 '"+title+"' 的留言吗？")){
          window.location.href="message.php?act=delete&id="+id;
          return true;
        }else
          return false;
      }
        
    }
    //跳到指定页面
  function goPage(){
    var pageSum=document.getElementById("pageSum").attributes["sum"].value;
    var value = document.getElementById("toPage").value;
    if(value < 1  || pageSum < value){
      alert("请输入正确的页数！");
      
    }else{
      window.location.href="?page="+value;
    } 
    
  }
  //判断是否选中
  function hasselect(){
    var countList = 0;
    var cbxList = document.getElementsByName('checkboxes[]');
      for(var i=0;i<cbxList.length;i++){
         if(cbxList[i].checked == true){
              countList++;
            }
       } 
       if(countList == 0){
         document.getElementById('btnSubmit').disabled=true;
          }else{
            document.getElementById('btnSubmit').disabled=false;
            }
   }
  //选中全部
  selectAll = function(obj, chk)
  {
    
    if (chk == null)
    {
      chk = 'checkboxes';
    }
    var elems = obj.form.getElementsByTagName("INPUT");//获取当前对象的form里面所包含的input

    for (var i=0; i < elems.length; i++)
    {
      if (elems[i].name == chk || elems[i].name == chk + "[]")
      {
        elems[i].checked = obj.checked; 
      }
    }
    if(obj.checked){
      document.getElementById('btnSubmit').disabled=false;
      }else{
        document.getElementById('btnSubmit').disabled=true;
        }
  }

</script>
</form>
</div>
</body>
</html>