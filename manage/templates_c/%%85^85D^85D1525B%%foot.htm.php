<?php /* Smarty version 2.6.30, created on 2018-10-25 06:31:27
         compiled from foot.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'foot.htm', 15, false),)), $this); ?>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="col-md-4"><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/code.jpg" class="center-block"/></div>
          <div class="col-md-8">
            <p>友情链接</p>
            <ul>
              <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['friendlink']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              <li><a href="<?php echo $this->_tpl_vars['friendlink'][$this->_sections['row']['index']]['link']; ?>
" target="_blank"><?php echo $this->_tpl_vars['friendlink'][$this->_sections['row']['index']]['name']; ?>
</a></li>
              <?php endfor; endif; ?>
            </ul>
            <ul class="footer-nav">
              <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['column']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              <li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['column'][$this->_sections['row']['index']]['link']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['column'][$this->_sections['row']['index']]['link'])); ?>
"><?php echo $this->_tpl_vars['column'][$this->_sections['row']['index']]['name']; ?>
</a></li>
              <?php endfor; endif; ?>
              <li><a href="<?php echo $this->_tpl_vars['domain']; ?>
sitemap.html" target="_blank">网站地图</a></li>
            </ul>
            <p><span class="glyphicon glyphicon-map-marker"></span><?php echo $this->_tpl_vars['cfg_address']; ?>
</p>
            <p>©2018 <?php echo $this->_tpl_vars['cfg_company']; ?>
版权所有   <a href="http://www.miitbeian.gov.cn/" class="footer-ip" target="_blank"><?php echo $this->_tpl_vars['cfg_icp']; ?>
</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="footer-phone">
    <li><a href="tel:<?php echo $this->_tpl_vars['consult_phone']; ?>
" rel="nofollow">电话咨询</a></li>
    <li><a href="sms:<?php echo $this->_tpl_vars['consult_phone']; ?>
" rel="nofollow">短信咨询</a></li>
    <li><a href="<?php echo $this->_tpl_vars['domain']; ?>
contact.html" rel="nofollow">在线咨询</a></li>
  </div>