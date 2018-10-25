<?php /* Smarty version 2.6.30, created on 2018-10-25 06:31:27
         compiled from sitemap.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'sitemap.htm', 22, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>网站地图_<?php echo $this->_tpl_vars['page_title']; ?>
</title>
<meta name="author" content="li kunlin" />
<meta name="Keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
<meta name="Description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
<style type="text/css">
.content{font-size: 13px;}
	.content .item{float: left; color:#333;}
	.content .item h3 a{color:#555; font-weight: bold;text-decoration: none;}
	.content .item li{padding: 2px 0;}
	.content .item li a{color:#555;}
</style>
</head>
<body>
	<div class="content">
		网站地图：
		<ul>
			<li class="item">
				<h3><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list_news'][0]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list_news'][0]['catalog'])); ?>
/page_1.html" target="_blank"><?php echo $this->_tpl_vars['list_news'][0]['name']; ?>
</a></h3>
				<ol>
					<?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['list_news']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?>						<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list_news'][$this->_sections['row']['index']]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list_news'][$this->_sections['row']['index']]['catalog'])); ?>
/<?php echo $this->_tpl_vars['list_news'][$this->_sections['row']['index']]['id']; ?>
.html" target="_blank" ><?php echo $this->_tpl_vars['list_news'][$this->_sections['row']['index']]['title']; ?>
</a></li>
					<?php endfor; endif; ?>
				</ol>
			</li>
			<li class="item">
				<h3><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list_case'][0]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list_case'][0]['catalog'])); ?>
/page_1.html" target="_blank"><?php echo $this->_tpl_vars['list_case'][0]['name']; ?>
</a></h3>
				<ol>
					<?php unset($this->_sections['row']);
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['list_case']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?>						<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['list_case'][$this->_sections['row']['index']]['catalog']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['list_case'][$this->_sections['row']['index']]['catalog'])); ?>
/<?php echo $this->_tpl_vars['list_case'][$this->_sections['row']['index']]['id']; ?>
.html" target="_blank" ><?php echo $this->_tpl_vars['list_case'][$this->_sections['row']['index']]['title']; ?>
</a></li>
					<?php endfor; endif; ?>
				</ol>
			</li>
		</ul>
	</div>
</body>
</html>