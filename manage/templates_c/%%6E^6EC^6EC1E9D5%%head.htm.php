<?php /* Smarty version 2.6.30, created on 2018-10-25 06:31:27
         compiled from head.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'head.htm', 17, false),)), $this); ?>
   <nav class="navbar navbar-default wow slideInDown" role="navigation" id="nav1" data-wow-duration="1s">
    <div class="container">
      <div class="logo"><a href="<?php echo $this->_tpl_vars['domain']; ?>
"><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/logo.png" alt="汤先生" class="img-responsive center-block"/></a></div>
      <div class="navbar-header">
        <div class="navbar-brand"><a href="<?php echo $this->_tpl_vars['domain']; ?>
"><img src="<?php echo $this->_tpl_vars['domain']; ?>
img/logo.png" alt="汤先生"/></a></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>  
        </button>
      </div>
      <div class="collapse navbar-collapse" id="nav">
        <ul>
          <ul id="li-left">
            <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['column_left']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <li>
              <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['column_left'][$this->_sections['row']['index']]['link']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['column_left'][$this->_sections['row']['index']]['link'])); ?>
"><?php echo $this->_tpl_vars['column_left'][$this->_sections['row']['index']]['name']; ?>
</a>
            </li>
            <?php endfor; endif; ?>
          </ul>
          <ul id="li-right">
            <?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['column_right']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <li>
              <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['column_right'][$this->_sections['row']['index']]['link']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['column_right'][$this->_sections['row']['index']]['link'])); ?>
"><?php echo $this->_tpl_vars['column_right'][$this->_sections['row']['index']]['name']; ?>
</a>
            </li>
            <?php endfor; endif; ?>
          </ul>
        </ul>
      </div>
    </div>
  </nav>