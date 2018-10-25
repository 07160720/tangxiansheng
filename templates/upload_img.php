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

?>
<!DOCTYPE html>  
  
<head>  
<meta charset="utf-8" />  
<meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">  
<title>多图上传</title>  
<script type="text/javascript" src="../js/jquery.min.js"></script>  
<script type="text/javascript" src="../js/plupload.full.min.js"></script>
<style type="text/css">  
.demo *{ margin:0px; padding:0px; font-family:Microsoft Yahei; box-sizing:border-box; -webkit-box-sizing:border-box;}  
.demo{max-width:640px; margin:0 auto; min-width:320px;}  
.ul_pics{ float:left;}  
.ul_pics li{width:80px; height:80px; float:left; margin:0px; padding:0px; margin-left:5px; margin-top:5px; position:relative; list-style-type:none; border:1px solid #eee; }  
.ul_pics li img{width:78px;height:78px;}  
.ul_pics li i{width:14px; height:14px; line-height:12px; position:absolute; top:-1px; right:-1px; background:#FF6666; font-size:12px; font-style:normal; text-align:center; color:#fff; cursor:pointer;}  
.progress{position:relative; margin-top:40px; background:#eee;}   
.bar {background-color: #009966; display:block; width:0%; height:5px; border-radius:3px;}   
.percent{position:absolute; height:15px; top:-18px; text-align:center; display:inline-block; left:0px; width:80px; color:#666; line-height:15px; font-size:12px; }   
.demo #btn{ width:80px; height:80px; margin-left:5px; margin-top:5px; border:1px dotted #c2c2c2; background:url(../images/upload_button.png) no-repeat center; background-size:40px auto; text-align:center; line-height:120px; font-size:30px; color:#666; float:left;}  
</style>  
</head>  
<body>  

<div class="demo">  
  <a href="javascript:void(0)" id="btn"></a>  
  <ul id="ul_pics" class="ul_pics clearfix">  
  </ul>    
</div>  
<script type="text/javascript">  
var uploader = new plupload.Uploader({        //创建实例的构造方法  
  runtimes: 'html5,flash,silverlight,html4',  //上传插件初始化选用那种方式的优先级顺序  
  browse_button: 'btn',                      // 上传按钮  
  url: "upimgs.php?act=upimg",               //远程上传地址  
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
        
    	/* plupload.each(files, function(file) { //遍历文件检查是否已存在
    		$.post("upimgs.php?act=isHad&name="+file.name,function(data){        
    	        if(data==1){
    	        	if(confirm("文件已存在，是否覆盖？")){
    	    			return true;
    	    		}else{
    	    			uploader.destroy();  
    	    		}
    	        }  
    	    })
    	}); */
        
        if ($("#ul_pics").children("li").length > 5) {  
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
        $("#" + file.id).html("<img src='" + data.pic + "'/><i onclick='delimg(this)'>x</i><input type='hidden' name='' value='"+ data.pic +"'>");  
    },  
    Error: function(up, err) { //上传出错的时候触发  
        alert(err.message+":"+err.code);  
    }  
  }  
});  
uploader.init();//初始化执行文件  
  
function delimg(o){  
    var src = $(o).prev().attr("src");    
    $.post("upimgs.php?act=delimg&imgurl="+src,function(data){        
        if(data==1){  
            $(o).parent().remove();  
        }  
    })    
}  
</script>  
</body>  
</html>  