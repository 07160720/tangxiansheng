<?php /* Smarty version 2.6.30, created on 2018-10-25 06:31:27
         compiled from news.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'news.htm', 35, false),array('modifier', 'replace', 'news.htm', 37, false),array('modifier', 'strip_tags', 'news.htm', 37, false),array('modifier', 'truncate', 'news.htm', 37, false),array('modifier', 'mb_substr', 'news.htm', 41, false),)), $this); ?>
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
img/banner/banner_02.png" class="img-responsive" />    
    </header>
    
    <section>
      <div class="container">
        <div class="site"><span class="glyphicon glyphicon-home"></span> <a href="<?php echo $this->_tpl_vars['domain']; ?>
">官网首页 </a>> <?php echo $this->_tpl_vars['column']; ?>
</div>
      
        <div class="news01">
            <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <div class="new01-content row wow slideInUp" data-wow-duration="1s" data-wow-delay="0s">
              <div class="col-xs-9 col-sm-9 col-md-10">
                <p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list'][$this->_sections['row']['index']]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list'][$this->_sections['row']['index']]['catalog'])); ?>
/<?php echo $this->_tpl_vars['list'][$this->_sections['row']['index']]['id']; ?>
.html" target="_blank"><?php echo $this->_tpl_vars['list'][$this->_sections['row']['index']]['title']; ?>
</a></p>
                <div>
                  <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['row']['index']]['context'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&nbsp;", "") : smarty_modifier_replace($_tmp, "&nbsp;", "")))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 150, "...", true) : smarty_modifier_truncate($_tmp, 150, "...", true)); ?>
 
                </div>
              </div>
              <div class="new01-time col-xs-3 col-sm-3 col-md-2">
                <div><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['row']['index']]['date'])) ? $this->_run_mod_handler('mb_substr', true, $_tmp, 8, 10, 'GBK') : mb_substr($_tmp, 8, 10, 'GBK')); ?>
</div>
                <div><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['row']['index']]['date'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 7, "", true) : smarty_modifier_truncate($_tmp, 7, "", true)); ?>
</div>
              </div>          
            </div>
            <hr />
            <?php endfor; endif; ?>
        </div>      
        <!--上下页  -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="page">
              <?php if ($this->_tpl_vars['this_page'] > 1): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list'][0]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list'][0]['catalog'])); ?>
/page_1.html" title="首页"><span>&lt;&lt;</span></a><?php endif; ?>
              <?php if ($this->_tpl_vars['this_page'] > 1): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list'][0]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list'][0]['catalog'])); ?>
/page_<?php echo $this->_tpl_vars['this_page']-1; ?>
.html" title="上一页"><span>&lt;</span></a><?php endif; ?>
              <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['page_array']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?>              <?php if ($this->_tpl_vars['this_page'] == $this->_tpl_vars['page_array'][$this->_sections['row']['index']]): ?>
              <a class="page-active" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list'][0]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list'][0]['catalog'])); ?>
/page_<?php echo $this->_tpl_vars['page_array'][$this->_sections['row']['index']]; ?>
.html"><span><?php echo $this->_tpl_vars['page_array'][$this->_sections['row']['index']]; ?>
</span></a>
              <?php else: ?>
              <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list'][0]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list'][0]['catalog'])); ?>
/page_<?php echo $this->_tpl_vars['page_array'][$this->_sections['row']['index']]; ?>
.html"><span><?php echo $this->_tpl_vars['page_array'][$this->_sections['row']['index']]; ?>
</span></a>
              <?php endif; ?>
              <?php endfor; endif; ?>
              <?php if ($this->_tpl_vars['this_page'] != $this->_tpl_vars['page_sum']): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list'][0]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list'][0]['catalog'])); ?>
/page_<?php echo $this->_tpl_vars['this_page']+1; ?>
.html" title="下一页"><span>&gt;</span></a><?php endif; ?>
              <?php if ($this->_tpl_vars['this_page'] != $this->_tpl_vars['page_sum']): ?><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list'][0]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list'][0]['catalog'])); ?>
/page_<?php echo $this->_tpl_vars['page_sum']; ?>
.html" title="尾页"><span>&gt;&gt;</span></a><?php endif; ?>
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