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
include_once ('../includes/config.php'); //系统参数文件

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />

<!-- kindeidtor编辑器设置 -->
<link rel="stylesheet" href="../js/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="../js/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript">
	var editor;
	KindEditor.ready(function(K) {
		
		editor = K.create('textarea[name="context"]', {
			allowFileManager : true
		});
		
		K('input[name=save]').click(function(e) {
			if(editor.isEmpty()){alert("文章内容还没填写噢（^_^）!");}
		});

	});
</script>
<!-- kindeidtor编辑器设置 -->

</head>

<body >

<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >增加栏目</span>
</div>
<!--当前操作  -->
<!-- start client form -->
<div class="tab-div">
    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="column.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table" cellspacing="10px" > 
          <tr>
            <td class="label" >内容模型:</td>
            <td>
            	<select name="model">
                <?php 
            	  
            	   foreach ($cfg_model as $name => $value){
            	       echo '<option value="'.$name.'">'.$value.'</option>';
            	   }
                ?>
            	</select>	
            </td>
          </tr> 
          <tr>
            <td class="label" >栏目名称:</td>
            <td>
            	<input type="text" name="name" value="" size="20" />
            </td>
          </tr> 
          <tr>
            <td class="label" >所属栏目ID:</td>
            <td>
            	<input type="text" name="pid" value="<?php echo @empty($_GET[pid])? 0:$_GET[pid]; ?>" size="1" readOnly="true"/> 
            	<span class="link-span">（顶级目录默认为0）</span>
            </td>
          </tr> 
          <tr >
            <td class="label">栏目存放的目录:</td>
            <td >
            	<input type="text" name="catalog" value="" size="30"/>
            	<span class="link-span">请不要使用中文名称的目录名</span>
            </td>
          </tr>
          <tr>
            <td class="label">默认链接:</td>
            <td><input type="text" name="link" value=""  size="80" /></td>
          </tr>
          <tr>
            <td class="label">打开方式:</td>
            <td>
            	<input type="radio" name="target" value="_blank" checked="checked"/>空白页&nbsp;
                <input type="radio" name="target" value="" />当前页 
            </td>
          </tr>
          <tr>
            <td class="label">排列顺序:</td>
            <td>
            	<input type="text" name="porder" value="" size="1"  onblur="isInteger(this)"/> 
            	<span class="link-span">（由低->高）</span>
            </td>
          </tr>
          <tr>
            <td class="label">模板名称:</td>
            <td>
            	<input type="text" name="template" value="" size="20" onblur="getFileSize(this)"/> 
            </td>
          </tr>
          <tr>
            <td class="label">是否显示栏目:</td>
            <td>
            	<input type="radio" name="display" value="show" checked="checked"/>显示&nbsp;
                <input type="radio" name="display" value="hide" />隐藏 
            </td>
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
 
        <input type="hidden" name="act" value="add" />
      </form>
   	 </div>
	</div>
<script language="JavaScript" src="../js/judge.js"></script>
<script  language="JavaScript" >
    //判断文件名类型
    function getFileSize(obj){
        fileExt=obj.value.substr(obj.value.lastIndexOf(".")).toLowerCase();//获得文件后缀名
        if(fileExt!='.htm'){
            alert("文件名必须为*.htm");
            return false;
        }
    }
	/* 判断是否是整数 */
	function isInteger(obj) {
	 	if(isNaN(Number(obj.value))){
	 		alert("请输入整数");
		}
	}
  /**
   * 检查表单输入的内容是否为空
   */
  function validate()
  {		
	 	var validator = new judge();
	    
	    validator.required('name', '栏目名称不能为空！');
	    validator.required('pid', '所属栏目id不能为空！');
	    validator.required('porder', '排列顺序不能为空！');
	    
	    return validator.passed();
  }
</script>
</body>
</html>