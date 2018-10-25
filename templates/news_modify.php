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

date_default_timezone_set('Asia/Shanghai');//设置时区
require_once ('../includes/page_validate.php');//验证是否是用户登录
include_once '../includes/column_array.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../js/judge.js"></script>
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
	<span style="font-size: 13px;color: gray;" >修改新闻</span>
</div>
<!--当前操作  -->
<!-- start client form -->
<div class="tab-div">
    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="news.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table" cellspacing="10px" > 
         <?php
         $id = trim($_GET['id']);
         $sql = "SELECT * FROM `article` WHERE `id` = $id";
         include '../includes/db_connect.php';
         $db = new MyDB();
         $data = $db->GetData($sql);
         ?>
          <input type="hidden" name="id" value="<?php  echo $id;?>" />
          <tr>
            <td class="label" >栏目:</td>
            <td>
            	<select name="column">
                <?php 
                  //连接数据库
                  include_once '../includes/db_connect.php';
                  $db=new MyDB();
                  $data1 = $db->GetDatas("SELECT * FROM `column` WHERE `model` = 'article' ORDER BY porder ASC");
                  foreach ($data1 as $key => $column){
                     echo "<option value='$column[id]'>$column[name]</option>";
                  }
                ?>
            	</select>	
            </td>
          </tr> 
          <tr>
            <td class="label">文章标题:</td>
            <td><input type="text" name="title" value="<?php echo $data["title"]; ?>" size="80" /> 
            </td>
          </tr>
          <tr >
            <td class="label">更新日期:</td>
            <td >
            <input name="date" type="text" size="30" value="<?php echo $data["date"]; ?>"  />
              
            </td>
          </tr>
          <tr>
            <td class="label">关键字:</td>
            <td><input type="text" name="keywords" value="<?php echo $data["keywords"]; ?>"  placeholder="使用，隔开关键词" size="80" /></td>
          </tr>
          <tr>
          	<td class="label">内容描述:</td>
          	<td><textarea  name="description"  style="width:80%;height:50px;"><?php echo $data["description"]; ?></textarea></td>
          </tr>
	       <tr>
          	<td class="label">文章内容:</td>
          	
          </tr>
          <tr>
          	<td class="label">&nbsp;</td>
          	<td><textarea  name="context" id="context"  style="width:100%;height:500px;"><?php echo $data["context"]; ?></textarea></td>
	           <input type="hidden" name="img_url" value="<?php echo $data["img_url"]; ?>" />
          </tr>
          <tr>
             <td >&nbsp;</td>
          </tr>
            <tr>
            <td >&nbsp;</td>
            <td>
            <input type="submit" value="  保存   "  />    
          	<input type="reset" value="  重置  "  />
          	</td>
          </tr>
    
        </table>
 
        <input type="hidden" name="act" value="modify" />
      </form>
   	 </div>
	</div>

<script  language="JavaScript" >

  /**
   * 检查表单输入的内容是否为空
   */
  function validate()
  {		
	 	var validator = new judge();
	    
	    validator.required('title', '标题不能为空！');
	    validator.required('context', '内容不能为空！');
	    validator.required('date', '日期不能为空！');
	    return validator.passed();
  }
</script>
</body>
</html>