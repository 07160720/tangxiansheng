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

require_once ('../includes/page_validate.php');//验证是否是用户登录
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../js/judge.js"></script>
<style type="text/css">

span.info{background:#FFF;border:0px solid #F99;font-size:14px;color:gray;}  
span.ok{background:#FFF;border:0px solid #F99;font-size:14px;color:green;}  
span.bad{background:#FCC;border:1px solid #F99;padding:2px;font-size:14px;color:black;}

</style>
</head>

<body >

<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >修改用户</span>
</div>
<!--当前操作  -->
<?php 
        $id=$_GET['id'];
        $sql="SELECT * FROM user WHERE id=$id";
        include '../includes/db_connect.php';
	    $db=new MyDB();
        $data=$db->GetData($sql);
        
        require_once ('../includes/operation.class.php');//加解密类
        $op=new operation();
        $data['password']=$op->decrypt($data['password']);
        ?>
<!-- start client form -->
    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="user.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table" align="center">  
            <tr>
                <td class="label">用户名:</td>
                <td><input type="text" id="add_name" name="name" value="<?php echo $data['name']?>"  size="25" readonly="true"/></td>
            </tr>
          	<tr>
                <td class="label" >密码:</td>
          		<td>
              		<input id="add_password" name="password" type="text" size="25" value="<?php echo $data['password']?>" onblur="verify_password()" />
                 	<span  id="add_password_tip" class="info" >以字母开头，长度在6~18之间，只能包含字符、数字和下划线</span>  
               	</td>
         	</tr>
            <tr>
              	<td class="label">身份:</td>
              	<td>
                  	<?php 
                  	if($data['status']=="admin"){
                  	    echo '<select name="status"><option value="3">管理员</option><option value="2">超级用户</option><option value="1">用户</option></select>';
                  	}elseif ($data['status']=="suser"){
                  	    echo '<select name="status"><option value="2">超级用户</option><option value="3">管理员</option><option value="1">用户</option></select>';
                  	}else{
                  	    echo '<select name="status"><option value="1">用户</option><option value="2">超级用户</option><option value="3">管理员</option></select>';
                  	}
                  	?>	 
              	</td>
          	</tr>
          	<tr>
              	<td >&nbsp;</td><td >&nbsp;</td>
            </tr>
          	<tr>
             	<td >&nbsp;</td>
             	<td>
            		<input type="submit" value="  确定   "  />    
          			<input type="reset" value="  重置  "  />
          		</td>
          	</tr>
        </table>
		<?php echo '<input type="hidden" name="id" value="'.$id.'" />';?>
        <input type="hidden" name="act" value="modify" />
      </form>
   	 </div>

<script  language="JavaScript" >
document.forms['theForm'].elements['password'].focus();

/**
 * 检查表单输入的内容是否正确
 */

//验证密码
function verify_password(){
	
	var add_password=document.getElementById("add_password").value;
	var tips = document.getElementById("add_password_tip");
	var reg=/^[a-zA-Z]\w{5,17}$/;//正则表达式"以字母开头，长度在6~18之间，只能包含字符、数字和下划线"
	
	if(!reg.test(add_password)){
		tips.className='bad';
		tips.innerHTML = '以字母开头，长度在6~18之间，只能包含字符、数字和下划线';
		return false;
	}else{
		tips.className='ok';
		tips.innerHTML = '√ ';
		return true;
	}
}
function validate()
{		
	 	var validator = new judge();
	    
	    validator.required('name', '用户名不能为空！');
	    validator.required('password', '密码不能为空！');

	    var isTrue=validator.passed() && verify_password();
	    
	    return isTrue;
}
</script>
</body>
</html>
