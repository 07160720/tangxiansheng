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
require_once ('../includes/page_validate.php'); //验证是否是用户登录

$cid = 2; //栏目ID

//连接数据库
include_once '../includes/db_connect.php';
$db = new MyDB();
 
if (isset($_POST)) {
    if (@$_REQUEST['act'] == 'modify') {
        $sql = "UPDATE `column_content` SET `content1`='$_POST[content1]' WHERE `column`='$cid'";
        $db->Query($sql);
    }
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />
<!-- 百度编辑器 -->
<script src="../ueditor/ueditor.config.js"></script>
<script src="../ueditor/ueditor.all.min.js"></script>
<script src="../ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
       var ue = UE.getEditor('context',{initialFrameWidth:800,initialFrameHeight:400,});
</script>
<!-- 百度编辑器 -->
</head>

<body >

<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >关于我们>详情</span>
</div>
<!--当前操作  -->
<!-- start client form -->

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="?.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table"  cellspacing="10px" > 
        	<?php 
        	
        	
        	?>
          <tr>
          	<td class="label">内容详情:</td>
          	<td></td>
          </tr>
          <tr>
          	<td class="label">&nbsp;</td>
          	<td><textarea  name="content1" id="context" style="width:100%;height:300px; ">
          		<?php 
              		$data = $db->GetData("SELECT * FROM `column_content` WHERE `column`=$cid");
              		echo $data['content1'];
          		?>
          		</textarea></td>
          </tr>
          <tr>
             <td >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td>
            <input type="submit" value="  保存   " name="save" />    
          	<input type="reset" value="  重置   " style="" />
          	</td>
          </tr>
        </table>
		
        <input type="hidden" name="act" value="modify" />
      </form>
   	 </div>
	
<script language="JavaScript" src="../js/judge.js"></script>
<script  language="JavaScript" >

</script>
</body>
</html>