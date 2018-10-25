/**===================================================*/
/**判断表格“theForm”下的元素是否为空,留言板的号码是否正确*/
/**===================================================*/
function judge (form){
	
	this.errMsg = new Array(); 
	var form = form == null ? 'theForm' : form;//设置表单名称默认参数
	
	////////////////////////
	this.required = function(controlId, msg) {
		
		var obj = document.forms[form].elements[controlId];
		
		if (typeof(obj) == "undefined" || obj.value == "" || obj.value == "undefined" || obj.value.replace(/(^\s*)|(\s*$)/g, "")==""){
			
			this.errMsg.push(msg);
		}
	};
	/////////////////////////////
	this.passed = function() {
		
	    if (this.errMsg.length > 0) {
	    	
	    	var msg = "";
	    	msg+= "-" + this.errMsg[0];
	    	alert(msg);
	    	return false;
	      
	    } else {
	    	
	    	return true;
	    }
	};
	/////////////////////////////
	this.phone = function() {
		
		var phone = document.forms[form].elements['phone'];
		
		if(phone.value.length == 0 || phone.value.search(/^1\d{10}$/) == -1){ //匹配手机号
			
			alert("请输入11位有效的手机号码！(^_^)"); phone.focus();
			
			return false;
			
		}else
			
			return true;
	}
	/////////////////////////////
	
}
/*---------------------------------
    检查手机号码是否满足11位
 --------------------------------*/
function checkPhone(){
	
	var phoneNum = document.getElementById("phone");
	
	if(phoneNum.value.length == 0 || phoneNum.value.search(/^1\d{10}$/) == -1){//匹配手机号
		
		alert("请输入11位有效的手机号码！(^_^)");
		return false;
		
	}else
		return true;
}
/*---------------------------------
    防止表单多次提交并弹出留言成功提示 
--------------------------------*/
var submitOnce = (function () {
	var submitCount = 0;  
	return function () {
		if (submitCount == 0){  
			submitCount++;  
			alert("留言成功！我们会尽快联系您的,请耐心等候"); 
			return true;  
		} else{  
			alert("你已经留过言了，请不要重复提交，谢谢！");  
			return false;  
		}  
	}
})();

/**===================================================*/
/**给快捷留言添加点击事件*/
/**===================================================*/
function tipsAddClickEvent() {
	
	function $(id){ 
		return document.getElementById(id);
	};
	
	var tips = [
	       "1.项目很好，现在就想加入，请给我预留名额。",
	       "2.请问贵公司哪里有样板店？",
	       "3.请给我打电话，并寄招商资料。",
	       "4.我想详细的了解招商政策，请电话联系。",
	       "5.对这个项目很感兴趣，请尽快寄资料。",
	       "6.请问我这个地方有加入者了吗？",
	       "7.我想加入，请来电话告诉我具体细节。",
	       "8.想了解招商细节，请尽快寄一份资料。",
	       "9.很感兴趣，来电话细谈吧！",
	       "10.我想找一个合适的项目做，想加入您们。"
	       ];
	
	var tarea = [];

	for(var i = 0, m = tips.length; i < m; i ++){

		$("tips"+i).onclick = (function(i){
			
			return function(){
				
				var s = tarea.join(",") .indexOf(tips[i]);
				
				if(s >= 0){  //s等于-1就说明x[i]不存在y里面
					for(var r in tarea){
						if(tarea[r] == tips[i]){//找出y数组里面x[i]的位置
							tarea.splice(r, 1);//删除已添加的提示
						}
					}
				}else{
					
					tarea.push(tips[i]);//往y数组尾部添加内容
				}
				$("tamsg").value = tarea.join("\n");
			}
		})
		(i)//闭包里面传参
	}
}