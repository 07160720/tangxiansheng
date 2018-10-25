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

  @ob_start();
  @header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8
  require_once ('../includes/page_validate.php');//验证是否是用户登录
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />
<style type="text/css">

#tabbody-div span{color: #0000CD;font-family: "微软雅黑";}

textarea { 
    
    width: 98%; 
    height: 500px; 
    padding: 10px; 
    font-size: 14px; 
    word-wrap: break-word; 
    overflow: auto;
	background: #FFFFE0;
	border: 1px solid #ccc;
	resize:none; 
} 
.button{width: 300px;margin: 20px auto;}
.button input{margin-right: 30px;}

</style>
</head>

<body >
<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >修改模板</span>
</div>
<!--当前操作  -->
<div id="tabbody-div">

<!-- start client form -->

	<?php
	       
          $fileName = empty($_POST['fname']) ? $_GET['fname'] : $_POST['fname'];//获取从输入框传过来的文件路径名
          
          if (file_exists($fileName)) {//如果存在文件就获取文件的源码
              
            $html = file_get_contents($fileName);
            
          }else {
              
              echo '<div align="center"></br><div style="width:150px; border:1px solid #000;padding:10px;">抱歉，该文件不存在</div></div>';
              
              header("Refresh:0.5;url=tpl_check.php");//延时跳转
              
              exit();
          }
     ?>
     <form enctype="multipart/form-data" action="tpl.php" method="post" onsubmit="return validate()">
		<span>文件：<?php echo $fileName;?></span><br/><br/>
		
		<input type="hidden" name="fileName" value="<?php echo $fileName;?>"/>
	
		<textarea id="tempFile" name="tempFile"><?php echo htmlspecialchars($html);?></textarea>        
      
        <div class="button">
            <input type="submit" id="save" value="  保存  "/>
            <input type="reset" value="  取消  " onclick="javascript:history.go(-1)"/>
        </div>
        
        <input type="hidden" name="act" value="modify"/>
     </form>



<script type="text/javascript">

	//给提交按钮添加键盘监听事件“ctrl + s”
    document.onkeydown = function(e) {
        
        var keyCode = e.keyCode || e.which || e.charCode;
        var ctrlKey = e.ctrlKey || e.metaKey;
        
        if(ctrlKey && keyCode == 83) {
            
        	document.getElementById("save").click();//调用按钮点击
            
            return false;	
        }
       
    }
    
    function validate(){

    	var content = document.getElementById("tempFile").value;
    	
    	if (content.length == 0 || content == ""){
        	
    		alert("不能提交空页面");
    		
    		return false;
    	}
    	
    }
    
</script>
</div>
</body>
</html>