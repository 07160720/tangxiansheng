<?php /* Smarty version 2.6.30, created on 2018-10-25 06:31:27
         compiled from contact.htm */ ?>
﻿<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="li kunlin" />
    <meta name="Keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
    <meta name="Description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
    <title><?php echo $this->_tpl_vars['column']; ?>
_<?php echo $this->_tpl_vars['page_title']; ?>
</title>
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['domain']; ?>
css/a.css" />
    <link href="<?php echo $this->_tpl_vars['domain']; ?>
css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['domain']; ?>
css/animate.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/css/swiper.min.css">
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['domain']; ?>
js/wow.min.js" ></script>
    <script src="<?php echo $this->_tpl_vars['domain']; ?>
js/jquery.min.js"></script>
    <script src="<?php echo $this->_tpl_vars['domain']; ?>
js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/js/swiper.min.js"></script>
  </head>
  <body>
    <header>
      <!--====================导航====================-->
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headsub.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <img src="<?php echo $this->_tpl_vars['domain']; ?>
img/banner/banner_common.png" class="img-responsive" />   
    </header>
    
    <section>
      <div class="container">
        <div class="site"><span class="glyphicon glyphicon-home"></span> <a href="<?php echo $this->_tpl_vars['domain']; ?>
">官网首页 </a> > <?php echo $this->_tpl_vars['column']; ?>
</div>
      
        <div class="join content-img">
        <div class="title">
          <h3>成功的机会永远留给主动咨询的人！</h3>
          <h5>汤先生·专注健康·专注品牌</h5>
        </div>
        <div class="row">
          <form role="form" class="col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2" enctype="multipart/form-data" action="http://localhost/tangxiansheng/manage/message_add.php" method="post" name="theForm" onsubmit="return validate()">
            <div class="form-group">
              <label for="name">姓名<span>/name</span>：</label>
              <input type="text" id="name" name="name" class="form-control" />
            </div>
            <div class="form-group">
              <label for="phone">电话<span>/phone</span>：</label>
              <input type="text" id="phone" name="phone" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="message">留言<span>/message</span>：</label>
              <textarea id="message" name="message" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group col-xs-8 col-sm-4 col-md-4 col-xs-offset-2 col-sm-offset-4 col-md-offset-4 btn">
              <input type="submit" id="submit" name="submit" value="立即留言" />
              <input type="hidden" name="act" value="add">
              <input type="hidden" name="item">
            </div>
          </form>
        </div>
      </div>
      
      </div>
    </section>
    
     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footsub.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </body>
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['domain']; ?>
js/a.js" ></script>
  <script>
      new WOW().init();
  </script>
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['domain']; ?>
js/judge.js" ></script>
  <script type="text/javascript">

    //导航栏样式选中
    $(function() {
      $('#nav ul ul li a').eq( <?php echo $this->_tpl_vars['index']; ?>
 ).addClass("on");
    });
    
    /*获取当前的品牌名称*/
    $(function() {
      $.ajax({
       type: "get",
       url: "templates/validate.php?brand_name",
       dataType: "text",
       jsonp: "jsoncallback",
       async: false,
       success: function (data) {
         $("input[name=item]").val(data);
       },
       error: function (data) {
         alert("留言板无法获取品牌名");
       }
     });
    });
    
    /* 输入验证 */
    function validate()
    { 

      var validator = new judge();

      validator.required('name', '请输入您的姓名！');
      validator.required('phone', '请输入您的手机号码！');
      //validator.required('message', '请输入留言内容！');

      return validator.passed() && validator.phone() && submitOnce();
    }
  </script>
</html>