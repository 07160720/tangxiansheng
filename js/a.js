//========================表单验证============================
//产品中心
$(document).ready(function(){
	$("#pro01").click(function(){
		$(".products-content01").css("display","block");
		$(".products-content02").css("display","none");
		$(".products-content03").css("display","none");
		$(".products-content04").css("display","none");
	})
	$("#pro02").click(function(){
		$(".products-content02").css("display","block");
		$(".products-content01").css("display","none");
		$(".products-content03").css("display","none");
		$(".products-content04").css("display","none");
	})
	$("#pro03").click(function(){
		$(".products-content03").css("display","block");
		$(".products-content01").css("display","none");
		$(".products-content02").css("display","none");
		$(".products-content04").css("display","none");
	})
	$("#pro04").click(function(){
		$(".products-content04").css("display","block");
		$(".products-content01").css("display","none");
		$(".products-content02").css("display","none");
		$(".products-content03").css("display","none");
	})
})



//swiper

var mySwiper=new Swiper('.swiper-container',{
				direction:'horizontal',
				loop:true,
				grabCursor:true,
				speed:2000,
				
				autoplay:{
					delay:3000,					
					disableOnInteraction:false,
				},
				pagination:{
					el:'.swiper-pagination',
					Clickable:true
				},
				navigation:{
					nextEl:'.swiper-button-next',
					prevEl:'.swiper-button-prev',
				}
			})