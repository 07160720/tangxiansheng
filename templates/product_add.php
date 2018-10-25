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
date_default_timezone_set('Asia/Shanghai');/*设置时区*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />
<style type="text/css">  
#tabbody-div #theForm{display: none;}
.demo *{ margin:0px; padding:0px; font-family:Microsoft Yahei; box-sizing:border-box; -webkit-box-sizing:border-box;}  
.demo{max-width:640px;  min-width:320px;}  
.ul_pics{ float:left;}  
.ul_pics li{width:80px; height:80px; float:left; margin:0px; padding:0px; margin-left:5px; margin-top:0px; position:relative; list-style-type:none; border:1px solid #eee; }  
.ul_pics li img{width:78px;height:78px;}  
.ul_pics li i{width:14px; height:14px; line-height:12px;  position:absolute; top:0px; right:0px; background:#FF6666; font-size:12px; font-style:normal; text-align:center; color:#fff; cursor:pointer;}  
.progress{position:relative; margin-top:40px; background:#eee;}   
.bar {background-color: #009966; display:block; width:0%; height:5px; border-radius:3px;}   
.percent{position:absolute; height:15px; top:-18px; text-align:center; display:inline-block; left:0px; width:80px; color:#666; line-height:15px; font-size:12px; }   
.demo #btn{ width:80px; height:80px; margin:0; border:1px dotted #c2c2c2; background:url(../images/upload_button.png) no-repeat center; background-size:40px auto; text-align:center; line-height:120px; font-size:30px; color:#666; float:left;}  

.show {margin: 10px 0; border: 1px solid #eee;width: 90%;}
.show ul {list-style: none; overflow: hidden; padding: 0px;}
.show li {width:120px; float: left;margin: 5px;border: 1px solid #eee; position: relative;}
.show li img{width:100%; display: block;}
.show .pro-name {padding: 5px;text-align: center;}
.show .delete-img {padding:0 3px; position: absolute;top:0;right: 0;background:#FF6666; font-size: 13px; color:#fff;display: none; cursor: pointer;}
.show li:HOVER .delete-img{
	display: block;
}
</style>
</head>

<body >

<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 ></span>
	<span style="font-size: 13px;color: gray;" >产品图片</span>
</div>
<!--当前操作  -->
<!-- start client form -->

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="product.php" method="post" name="theForm" id="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table"  cellspacing="10px" > 
        	
          <tr>
            <td class="label" >产品名称:</td>
            <td><input type="text" name="name" value=""  size="40" /> 
            </td>
          </tr>
           
          <tr>
            <td class="label">上传图片:</td>
            <td>
            	<div class="demo">  
              		<a href="javascript:void(0)" id="btn"></a>  
              		<ul id="ul_pics" class="ul_pics clearfix"></ul>    
            	</div> 
            	<span class="link-span" >（上传的图片大小要相同，最好为：250 x 300）</span>
            </td>
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
		<br>
        <input type="hidden" name="act" value="add" />
      </form>
   	 
   	 <?php 
   	    
   	 //连接数据库
   	 include_once '../includes/db_connect.php';
   	 $db = new MyDB();
   	  
   	 $data = $db->GetDatas("SELECT * FROM `product` ORDER BY `id` DESC ");
   	 
   	 foreach ($data as $pro) {
   	     ;
   	 }
   	 
   	 ?>
   	 <input type="button" value="添加产品" onclick="document.getElementById('theForm').style.display='block';this.style.display='none'"/>
   	 	<span class="link-span">*点击名称进行修改</span>
   	 <div class="show" >
   	 	<ul>
   	 		<?php 
   	    
           	 //连接数据库
           	 include_once '../includes/db_connect.php';
           	 $db = new MyDB();
           	  
           	 $data = $db->GetDatas("SELECT * FROM `product` ORDER BY `id` DESC ");
           	 
           	 foreach ($data as $pro) {
           	     echo '
                  <li>
   	 			        <span class="delete-img" onclick="deletePro('.$pro['id'].')">x</span>
   	 			        <img src="../img/product/'.$pro['img_url'].'?rand='.time().'" alt="" />
   	 			        <div class="pro-name">
                            <form enctype="multipart/form-data" action="product.php" method="post" >
                                <input type="text" name="name" value="'.$pro['name'].'" onblur="this.form.submit()" style="width:90%;border:0;"/>
                                <input type="hidden" name="id" value="'.$pro['id'].'" />
                                <input type="hidden" name="act" value="modify" />
                            </form>
                        </div>
	                </li>
                    ';
           	 }
           	 
           	 ?>
   	 	</ul>
   	 </div>
   	</div>
<script type="text/javascript" src="../js/jquery.min.js"></script>  
<script type="text/javascript" src="../js/plupload.full.min.js"></script>	
<script type="text/javascript">  
    var uploader = new plupload.Uploader({        //创建实例的构造方法  
      runtimes: 'html5,flash,silverlight,html4',  //上传插件初始化选用那种方式的优先级顺序  
      browse_button: 'btn',                      // 上传按钮  
      url: "product.php?act=upimg",               //远程上传地址  
      flash_swf_url: '',       //flash文件地址  
      silverlight_xap_url: '', //silverlight文件地址  
      filters: {  
        max_file_size: '10mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）  
        mime_types: [{title: "files", extensions: "jpg,png,gif"} ]  //允许文件上传类型  
      },  
      multipart_params:{ },    //文件上传附加参数  
      file_data_name:"file", //文件上传的名称  
      multi_selection: true, //true:ctrl多文件上传, false 单文件上传  
      init: {  
        FilesAdded: function(up, files) { //文件上传前  
            
            if ($("#ul_pics").children("li").length > 2) {  
                alert("您上传的图片太多了！");  
                uploader.destroy();  
            } else {  
                var li = '';  
                plupload.each(files, function(file) { //遍历文件  
                    li += "<li id='" + file['id'] + "'><div class='progress'><span class='bar'></span><span class='percent'>上传中 0%</span></div></li>";  
                });  
                $("#ul_pics").append(li);  
                uploader.start();  
            }  
        },  
        UploadProgress: function(up, file) { //上传中，显示进度条  
        	var percent = file.percent;  
            $("#" + file.id).find('.bar').css({"width": percent + "%"});  
            $("#" + file.id).find(".percent").text("上传中 "+percent + "%"); 
        },  
        FileUploaded: function(up, file, info) { //文件上传后触发  
            var data = eval("(" + info.response + ")"); 
            if(data.error != "1"){alert(data.error);}//服务端数据出错提示
            $("#" + file.id).html("<img src='" + data.url + "'/><i onclick='delImg(this)'>x</i><input type='hidden' name='img_url' value='"+ data.name +"'>");  
        },  
        Error: function(up, err) { //上传出错的时候触发  
            alert(err.message+":"+err.code);  
        }  
      }  
    });  
    uploader.init();//初始化执行文件  
      
    function delImg(o){//删除上传图片  
        var src = $(o).prev().attr("src");    
        $.post("product.php?act=delimg&imgurl="+src,function(data){        
            if(data==1){  
                $(o).parent().remove();  
            }  
        })    
    }  

    function deletePro(id){//删除整个产品 

    	if(confirm("确定要删除吗？")){
        		
    		window.location.href = "product.php?act=delete&&id=" + id;
    		
    		return true;
        		
    	}else{
        		
    		return false;
    	}   
    }  

    function validate() {
    	if ($("#ul_pics").children("li").length < 1) { 
        	alert('请上传照片');
        	return false
    	}else return true;
	}
    
</script>  
</body>
</html>