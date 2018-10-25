<?php /* Smarty version 2.6.30, created on 2018-10-25 06:31:27
         compiled from index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'index.htm', 100, false),array('modifier', 'replace', 'index.htm', 102, false),array('modifier', 'strip_tags', 'index.htm', 102, false),array('modifier', 'truncate', 'index.htm', 102, false),array('modifier', 'mb_substr', 'index.htm', 106, false),)), $this); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
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
    <!--====================banner====================-->
    
      <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img class="img-responsive" src="<?php echo $this->_tpl_vars['domain']; ?>
img/banner/banner_01.png" alt="汤先生"/></div>
        <div class="swiper-slide"><img class="img-responsive" src="<?php echo $this->_tpl_vars['domain']; ?>
img/banner/banner_02.png" alt="汤先生"/></div>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev swiper-button-white"></div>
      <div class="swiper-button-next swiper-button-white"></div>
    </div>
    <!--====================banner-end====================-->
    </header>
    
    <section style="overflow: hidden;">
      <div class="container">
        <div class="title wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
          <h3>品牌·<?php echo $this->_tpl_vars['column_array']['2']['name']; ?>
</h3>
          <h5>soup master</h5>
        </div>
        <div class="row brand wow slideInRight" data-wow-duration="1s" data-wow-delay="0s">
          <div class="col-xs-12 col-sm-12 col-md-7">
            <p>
              <?php echo $this->_tpl_vars['about_content']; ?>

            </p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5">
            <img src="<?php echo $this->_tpl_vars['domain']; ?>
img/about_us.png" class="img-responsive center-block" alt="" />
          </div>
        </div>
      </div>
      
      <div class="brand-point">
        <div class="container-fluid">
          <div class="row wow slideInRight" data-wow-duration="1s" data-wow-delay="0s">
            <div class="col-xs-12 col-sm-4 col-md-4 pont-content">
              <div class="col-xs-6 col-sm-5 col-md-7"><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/brand_spec_01.png" class="img-responsive center-block"/></div>
              <div class="col-xs-6 col-sm-7 col-md-5">
                <p>优质产地天然汤材</p>
                <p>只选用无硫熏辅料</p>
              </div>
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-4 pont-content">
              <div class="col-xs-6 col-sm-5 col-md-7"><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/brand_spec_02.png" class="img-responsive center-block"/></div>
              <div class="col-xs-6 col-sm-7 col-md-5">
                <p>不添加味精 鸡精</p>
                <p>保持汤品原汁原味</p>
              </div>
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-4 pont-content">
              <div class="col-xs-6 col-sm-5 col-md-7"><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/brand_spec_03.png" class="img-responsive center-block"/></div>
              <div class="col-xs-6 col-sm-7 col-md-5">
                <p>60min熬煮，释放肉质营养</p>
                <p>60min蒸炖，锁住饱和鲜味</p>
              </div>
            </div>
          </div>          
        </div>
      </div>
      
      <div class="container">
        <div class="title wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
          <h3>新闻中心</h3>
          <h5>news center</h5>
        </div>
        
        <div class="news row">
          <div class="news-new col-xs-12 col-sm-6 col-md-6 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0s">
            <h4><?php echo $this->_tpl_vars['column_array']['3']['name']; ?>
</h4>
            <a href="<?php echo $this->_tpl_vars['domain']; ?>
news/page_1.html"><div class="news-more">更多&raquo;</div></a>
            <hr />
            <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['list_news']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['max'] = (int)5;
$this->_sections['row']['show'] = true;
if ($this->_sections['row']['max'] < 0)
    $this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = min(ceil(($this->_sections['row']['step'] > 0 ? $this->_sections['row']['loop'] - $this->_sections['row']['start'] : $this->_sections['row']['start']+1)/abs($this->_sections['row']['step'])), $this->_sections['row']['max']);
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
            <div class="new-content row">
              <div class="col-xs-9 col-sm-9 col-md-10">
                <p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list_news'][$this->_sections['row']['index']]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list_news'][$this->_sections['row']['index']]['catalog'])); ?>
/<?php echo $this->_tpl_vars['list_news'][$this->_sections['row']['index']]['id']; ?>
.html" target="_blank"><?php echo $this->_tpl_vars['list_news'][$this->_sections['row']['index']]['title']; ?>
</a></p>
                <div>
                  <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list_news'][$this->_sections['row']['index']]['context'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&nbsp;", "") : smarty_modifier_replace($_tmp, "&nbsp;", "")))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 50, "...", true) : smarty_modifier_truncate($_tmp, 50, "...", true)); ?>

                </div>
              </div>
              <div class="new-time col-xs-3 col-sm-3 col-md-2">
                <div><?php echo ((is_array($_tmp=$this->_tpl_vars['list_news'][$this->_sections['row']['index']]['date'])) ? $this->_run_mod_handler('mb_substr', true, $_tmp, 8, 10, 'GBK') : mb_substr($_tmp, 8, 10, 'GBK')); ?>
</div>
                <div><?php echo ((is_array($_tmp=$this->_tpl_vars['list_news'][$this->_sections['row']['index']]['date'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 7, "", true) : smarty_modifier_truncate($_tmp, 7, "", true)); ?>
</div>
              </div>          
            </div>
            <hr />
            <?php endfor; endif; ?>
          </div>

          <div class="news-success col-xs-12 col-sm-5 col-md-5 col-sm-offset-1 col-md-offset-1 wow slideInRight" data-wow-duration="1s" data-wow-delay="0s">
            <h4><?php echo $this->_tpl_vars['column_array']['4']['name']; ?>
</h4>
            <a href="<?php echo $this->_tpl_vars['domain']; ?>
cases/page_1.html"><div class="news-more">更多&raquo;</div></a>
            <hr />
            
            <img src="<?php echo $this->_tpl_vars['domain']; ?>
img/news.jpg"class="img-responsive center-block"/>
            <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['list_case']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['max'] = (int)3;
$this->_sections['row']['show'] = true;
if ($this->_sections['row']['max'] < 0)
    $this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = min(ceil(($this->_sections['row']['step'] > 0 ? $this->_sections['row']['loop'] - $this->_sections['row']['start'] : $this->_sections['row']['start']+1)/abs($this->_sections['row']['step'])), $this->_sections['row']['max']);
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
            <div class="success-content row">
              <div class="col-xs-9 col-sm-9 col-md-10">
                <p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list_case'][$this->_sections['row']['index']]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list_case'][$this->_sections['row']['index']]['catalog'])); ?>
/<?php echo $this->_tpl_vars['list_case'][$this->_sections['row']['index']]['id']; ?>
.html" target="_blank"><?php echo $this->_tpl_vars['list_case'][$this->_sections['row']['index']]['title']; ?>
</a></p>
                <div>
                  <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list_case'][$this->_sections['row']['index']]['context'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&nbsp;", "") : smarty_modifier_replace($_tmp, "&nbsp;", "")))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 70, "...", true) : smarty_modifier_truncate($_tmp, 70, "...", true)); ?>

                </div>
              </div>
              <div class="new-time col-xs-3 col-sm-3 col-md-2">
                <div><?php echo ((is_array($_tmp=$this->_tpl_vars['list_case'][$this->_sections['row']['index']]['date'])) ? $this->_run_mod_handler('mb_substr', true, $_tmp, 8, 10, 'GBK') : mb_substr($_tmp, 8, 10, 'GBK')); ?>
</div>
                <div><?php echo ((is_array($_tmp=$this->_tpl_vars['list_case'][$this->_sections['row']['index']]['date'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 7, "", true) : smarty_modifier_truncate($_tmp, 7, "", true)); ?>
</div>
              </div>          
            </div>
            <hr />
            <?php endfor; endif; ?>
          </div>
        </div>        
      </div>
      
      <div class="products-show">
        <div class="container">
          <div class="box wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
            <ul> 
              <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['list_product']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['max'] = (int)3;
$this->_sections['row']['show'] = true;
if ($this->_sections['row']['max'] < 0)
    $this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = min(ceil(($this->_sections['row']['step'] > 0 ? $this->_sections['row']['loop'] - $this->_sections['row']['start'] : $this->_sections['row']['start']+1)/abs($this->_sections['row']['step'])), $this->_sections['row']['max']);
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
              <li><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/product/<?php echo $this->_tpl_vars['list_product'][$this->_sections['row']['index']]['img_url']; ?>
" class="img-responsive center-block"/></li>
              <?php endfor; endif; ?>      
            </ul>
          </div>
        </div>
      </div>
      
      <div class="container join">
        <div class="title wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
          <h3>成功的机会永远留给主动咨询的人！</h3>
          <h5>汤先生·专注健康·专注品牌</h5>
        </div>
        <div class="row wow slideInRight" data-wow-duration="1s" data-wow-delay="0s">
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
              <input type="submit" id="submit" name="submit" value="立即提交" />
              <input type="hidden" name="act"  value="add" />
              <input type="hidden" name="item"  value="" />
            </div>
          </form>
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
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['domain']; ?>
js/judge.js" ></script>
  <script>
      new WOW().init();
  </script>
  <script type="text/javascript">
    //导航栏样式选中
    $(function() {
      $('#nav ul ul li a').eq(0).addClass("on");
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