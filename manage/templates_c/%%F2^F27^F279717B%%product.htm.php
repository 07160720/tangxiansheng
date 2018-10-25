<?php /* Smarty version 2.6.30, created on 2018-10-25 06:31:27
         compiled from product.htm */ ?>
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
img/banner/banner_01.png" class="img-responsive" />    
    </header>
    
    <section>
      <div class="container products">
        <div class="site"><span class="glyphicon glyphicon-home"></span> <a href="<?php echo $this->_tpl_vars['domain']; ?>
">官网首页 </a> > <?php echo $this->_tpl_vars['column']; ?>
</div>      
        <div class="products-home row">
          <div class="col-xs-12 col-sm-3 col-md-3 products-p wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <div>堂食系列汤品</div>
            <hr />
            <ul>
              <li id="pro01">养生汤</li>
              <li id="pro02">甜汤</li>
              <li id="pro03">汤点</li>
              <li id="pro04">配菜</li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-9 col-md-9 products-content01">
            <div class="row">
              <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['list_p1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['show'] = true;
$this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = $this->_sections['row']['loop'];
    if ($this->_sections['row']['total'] == 0)
        $this->_sections['row']['show'] = false;
} else
    $this->_sections['row']['total'] = 0;
if ($this->_sections['row']['show']):

            for ($this->_sections['row']['index'] = $this->_sections['row']['start'], $this->_sections['row']['iteration'] = 1;
                 $this->_sections['row']['iteration'] <= $this->_sections['row']['total'];
                 $this->_sections['row']['index'] += $this->_sections['row']['step'], $this->_sections['row']['iteration']++):
$this->_sections['row']['rownum'] = $this->_sections['row']['iteration'];
$this->_sections['row']['index_prev'] = $this->_sections['row']['index'] - $this->_sections['row']['step'];
$this->_sections['row']['index_next'] = $this->_sections['row']['index'] + $this->_sections['row']['step'];
$this->_sections['row']['first']      = ($this->_sections['row']['iteration'] == 1);
$this->_sections['row']['last']       = ($this->_sections['row']['iteration'] == $this->_sections['row']['total']);
?>
              <div class="col-xs-6 col-sm-4 col-md-4">
                <figure><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/product/<?php echo $this->_tpl_vars['list_p1'][$this->_sections['row']['index']]['img_url']; ?>
" class="img-responsive center-block"/></figure>
                <figcaption>
                  <p>大大鸡腿汤</p>
                  <div>加油打Call、鲜香爽滑</div>
                </figcaption>
              </div>
              <?php endfor; endif; ?>
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-9 col-md-9 products-content02">
            <div class="row">
              <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['list_p2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['show'] = true;
$this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = $this->_sections['row']['loop'];
    if ($this->_sections['row']['total'] == 0)
        $this->_sections['row']['show'] = false;
} else
    $this->_sections['row']['total'] = 0;
if ($this->_sections['row']['show']):

            for ($this->_sections['row']['index'] = $this->_sections['row']['start'], $this->_sections['row']['iteration'] = 1;
                 $this->_sections['row']['iteration'] <= $this->_sections['row']['total'];
                 $this->_sections['row']['index'] += $this->_sections['row']['step'], $this->_sections['row']['iteration']++):
$this->_sections['row']['rownum'] = $this->_sections['row']['iteration'];
$this->_sections['row']['index_prev'] = $this->_sections['row']['index'] - $this->_sections['row']['step'];
$this->_sections['row']['index_next'] = $this->_sections['row']['index'] + $this->_sections['row']['step'];
$this->_sections['row']['first']      = ($this->_sections['row']['iteration'] == 1);
$this->_sections['row']['last']       = ($this->_sections['row']['iteration'] == $this->_sections['row']['total']);
?>
              <div class="col-xs-6 col-sm-4 col-md-4">
                <figure><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/product/<?php echo $this->_tpl_vars['list_p2'][$this->_sections['row']['index']]['img_url']; ?>
" class="img-responsive center-block"/></figure>
                <figcaption>
                  <p>椰香碧根果白美人</p>
                </figcaption>
              </div>
              <?php endfor; endif; ?>
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-9 col-md-9 products-content03">
            <div class="row">
              <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['list_p3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['show'] = true;
$this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = $this->_sections['row']['loop'];
    if ($this->_sections['row']['total'] == 0)
        $this->_sections['row']['show'] = false;
} else
    $this->_sections['row']['total'] = 0;
if ($this->_sections['row']['show']):

            for ($this->_sections['row']['index'] = $this->_sections['row']['start'], $this->_sections['row']['iteration'] = 1;
                 $this->_sections['row']['iteration'] <= $this->_sections['row']['total'];
                 $this->_sections['row']['index'] += $this->_sections['row']['step'], $this->_sections['row']['iteration']++):
$this->_sections['row']['rownum'] = $this->_sections['row']['iteration'];
$this->_sections['row']['index_prev'] = $this->_sections['row']['index'] - $this->_sections['row']['step'];
$this->_sections['row']['index_next'] = $this->_sections['row']['index'] + $this->_sections['row']['step'];
$this->_sections['row']['first']      = ($this->_sections['row']['iteration'] == 1);
$this->_sections['row']['last']       = ($this->_sections['row']['iteration'] == $this->_sections['row']['total']);
?>
              <div class="col-xs-6 col-sm-4 col-md-4">
                <figure><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/product/<?php echo $this->_tpl_vars['list_p3'][$this->_sections['row']['index']]['img_url']; ?>
" class="img-responsive center-block"/></figure>
                <figcaption>
                  <p>玫瑰树莓小挞</p>
                </figcaption>
              </div>
              <?php endfor; endif; ?>
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-9 col-md-9 products-content04">
            <div class="row">
              <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['list_p4']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['show'] = true;
$this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = $this->_sections['row']['loop'];
    if ($this->_sections['row']['total'] == 0)
        $this->_sections['row']['show'] = false;
} else
    $this->_sections['row']['total'] = 0;
if ($this->_sections['row']['show']):

            for ($this->_sections['row']['index'] = $this->_sections['row']['start'], $this->_sections['row']['iteration'] = 1;
                 $this->_sections['row']['iteration'] <= $this->_sections['row']['total'];
                 $this->_sections['row']['index'] += $this->_sections['row']['step'], $this->_sections['row']['iteration']++):
$this->_sections['row']['rownum'] = $this->_sections['row']['iteration'];
$this->_sections['row']['index_prev'] = $this->_sections['row']['index'] - $this->_sections['row']['step'];
$this->_sections['row']['index_next'] = $this->_sections['row']['index'] + $this->_sections['row']['step'];
$this->_sections['row']['first']      = ($this->_sections['row']['iteration'] == 1);
$this->_sections['row']['last']       = ($this->_sections['row']['iteration'] == $this->_sections['row']['total']);
?>
              <div class="col-xs-6 col-sm-4 col-md-4">
                <figure><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/product/<?php echo $this->_tpl_vars['list_p4'][$this->_sections['row']['index']]['img_url']; ?>
" class="img-responsive center-block"/></figure>
                <figcaption>
                  <p>烫时蔬</p>
                </figcaption>
              </div>
              <?php endfor; endif; ?>
            </div>
          </div>
          </div>
          
          <div class="products-sell row">
            <div class="col-xs-12 col-sm-3 col-md-3 products-p">
              <div>零售系列汤品</div>
              <hr />
              <ul>
                <li>八分钟自加热</li>
              </ul>
            </div>
            
            <div class="col-xs-12 col-sm-9 col-md-9 products-content05">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <figure><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/product1.png" class="img-responsive center-block"/></figure>
                  <figcaption>
                    <p>阿胶乌鸡汤</p>
                    <div>营养滋补、喝出好气色</div>
                  </figcaption>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <figure><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/product2.png" class="img-responsive center-block"/></figure>
                  <figcaption>
                    <p>阿胶乌鸡汤</p>
                    <div>汤味香浓、喝出Q弹美肌</div>
                  </figcaption>
                </div>              
              </div>
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
      //导航栏样式选中
      $(function() {
         $('#nav ul ul li a').eq( <?php echo $this->_tpl_vars['index']; ?>
 ).addClass("on");
      });
  </script>
</html>