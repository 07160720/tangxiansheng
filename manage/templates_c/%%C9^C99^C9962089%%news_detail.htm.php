<?php /* Smarty version 2.6.30, created on 2018-10-25 06:31:27
         compiled from news_detail.htm */ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="li kunlin" />
    <meta name="Keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
    <meta name="Description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
    <title><?php echo $this->_tpl_vars['page_title']; ?>
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
img/banner/banner_02.png" class="img-responsive"/>   
    </header>
    
    <section>
      <div class="container">
        <div class="site"><span class="glyphicon glyphicon-home"></span> <a href="<?php echo $this->_tpl_vars['domain']; ?>
">官网首页 </a> > <?php echo $this->_tpl_vars['column']; ?>
 </div>
        
        <div class="news-wrap">
          <h3><?php echo $this->_tpl_vars['title']; ?>
</h3>
          <ul class="news-data">
            <li>时间：<?php echo $this->_tpl_vars['date']; ?>
</li>
            <li>浏览：<?php echo $this->_tpl_vars['views']; ?>
</li>
          </ul>
          <div class="content-img">
            <?php echo $this->_tpl_vars['context']; ?>

          </div>
          <div class="bdsharebuttonbox">
            <a href="#" class="bds_more" data-cmd="more"></a>
            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
            <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
            <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
            <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
          </div>
          <ul class="news-f">
            <li>上一篇：<a href="<?php echo $this->_tpl_vars['last_href']; ?>
"><?php echo $this->_tpl_vars['last_title']; ?>
</a></li>
            <li>下一篇：<a href="<?php echo $this->_tpl_vars['next_href']; ?>
"><?php echo $this->_tpl_vars['next_title']; ?>
</a></li>
          </ul>
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
      $('#nav ul li a').eq( <?php echo $this->_tpl_vars['index']; ?>
 ).addClass('on');
//=====百度分享=====
window._bd_share_config={
	"common":{
		"bdSnsKey":{},
		"bdText":"<?php echo $this->_tpl_vars['title']; ?>
",
		"bdUrl":"<?php echo $this->_tpl_vars['this_href']; ?>
",
		"bdMini":"2",
		"bdMiniList":false,
		"bdPic":"",
		"bdStyle":"1",
		"bdSize":"16"
		},
		"share":{},
//图片分享
//		"image":{
//			"viewList":["weixin","tsina","sqq","qzone","tqq","renren"],
//			"viewText":"分享到：","viewSize":"16"},
		"selectShare":{
				"bdContainerClass":null,
				"bdSelectMiniList":["weixin","tsina","sqq","qzone","tqq","renren"]
				}
			};
with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
  </script>

</html>