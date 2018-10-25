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
	@header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8
	require_once ('../includes/page_validate.php');//验证是否是用户登录
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/list.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    

</style>
</head>

<body >
<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >友情链接</span>
</div>
<!--当前操作  -->

<form enctype="multipart/form-data" name="listForm" id="list-form" action="link.php" method="post"   onsubmit="return deleteData('all')">
	<a href="link_add.php"><input type="button" value="增加友情链接" /></a>
	<div  id="list-div">
       	<table cellpadding="0" cellspacing="1" id="main-table">
          	<tr >
                <th><input type="checkbox"  onclick="selectAll(this, 'checkboxes')" /></th>
                <th><span>ID</span></th>
                <th><span>网站名称</span></th>
                <th><span>网站地址</span></th>
            	<th><span>操作</span></th>
          	</tr>
<?php 

    $sql="SELECT COUNT(*) FROM `friendlylink`";

    /*连接数据库获取数据*/
    include '../includes/db_connect.php';
    $db=new MyDB();
    
    $result = $db->GetData($sql);
    
    $sum=$result[0];//记录总数
    
    //每页显示的记录数量
    $item=15;
    
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
    
    $sql="SELECT * FROM `friendlylink` ORDER BY `id` ASC LIMIT ".$from.",".$item;

    $resource=$db->Query($sql);
    
    $i=0;//给选择框赋值id
    
    //输出信息
    while($data=mysql_fetch_array($resource)){
        
        echo'
        <tr class="hover">
        	<td align="center"><input type="checkbox" id="checkboxes'.$i.'" name="checkboxes[]" value="'.$data['id'] .'" onclick="hasselect()" /></td>
        	<td align="center"><span>'.$data['id'] .'</span></td>
        	<td onclick="checkboxes'.$i.'.click()" align="center"> <span>'.$data['name'] .'</span></td>
        	<td align="center"><span>'.$data['link'] .'</span></td>
            <td align="center" >
                
            	<a href="link_modify.php?id='.$data['id'].'" title="编辑"><img src="../images/icon_edit.gif" width="16" height="16" border="0" /></a>
            	
            	<a href="javascript:;" id="delete'.$data['id'].'" data="'.$data['name'].'" onclick="deleteData('.$data['id'].')" title="删除">
                <img src="../images/icon_trash.gif" width="14" height="15" border="0" /></a>
            	    
        	</td>
        </tr>';
        $i++;
    }
    echo '</table></div>';
    include_once 'nextPage.php';//上下页文件
    echo '';
?>	

<script type="text/javascript">

//删除信息
function deleteData(id){
	if(id == 'all'){
		if(confirm("确定要删除选中的记录吗？")){
			return true;
		}else{return false;}
		
	}else{
		var title=document.getElementById('delete'+id).attributes["data"].value;
		if(confirm("确定要删除 '"+title+"' 吗？")){
			window.location.href="link.php?act=delete&id="+id;
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
            cbxList[i].parentNode.parentNode.style.background="#BBDDE5";//选中后改变整行的背景色
       }else{
     	  cbxList[i].parentNode.parentNode.style.background="";
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
      
      if(obj.checked==true){
      	elems[i].parentNode.parentNode.style.background="#BBDDE5";//选中后改变整行的背景色 
      }else{elems[i].parentNode.parentNode.style.background="";}
      
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
</body>
</html>