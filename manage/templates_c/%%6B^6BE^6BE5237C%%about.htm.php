<?php /* Smarty version 2.6.30, created on 2018-10-25 06:31:27
         compiled from about.htm */ ?>
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
    <link rel="icon" href="" type="image/x-ico">
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
img/banner/banner_03.jpg" class="img-responsive" />    
    </header>
    
    <section>
      <div class="container">
        <div class="site"><span class="glyphicon glyphicon-home"></span> <a href="<?php echo $this->_tpl_vars['domain']; ?>
">官网首页 </a>> <?php echo $this->_tpl_vars['column']; ?>
</div>
      
        <div class="about">
          <p>
            <?php echo $this->_tpl_vars['content']; ?>

          </p>
          <img src="<?php echo $this->_tpl_vars['domain']; ?>
img/about01.jpg" class="img-responsive center-block" />  
          <p> 针对现代都市人的不断增加的健康需求，提供新鲜炖制、功效性、无添加的养生汤，让健康养生，成为随手可得的时尚健康生活方式。用健康的方式来追求属于我们生活，让健康美味成为生活常态，让养生的生活成为一种习惯。汤先生加盟，让我们的生活更精彩，让健康唾手可得。</p>
          <p>汤先生是一个汤品垂直单品消费升级品牌，通过网上下单及线下体验店的形式，满足有养生调理，饮食无负担需求的都市白领，和有手术康复、孕期前后刚性需求的人群。</p>
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
    //导航栏样式选中
    $(function() {
      $('#nav ul ul li a').eq( <?php echo $this->_tpl_vars['index']; ?>
 ).addClass("on");
    });
  </script>
</html>