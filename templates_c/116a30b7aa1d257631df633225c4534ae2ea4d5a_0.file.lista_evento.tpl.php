<?php /* Smarty version 3.1.27, created on 2015-07-30 11:15:53
         compiled from "templates/lista_evento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:209448352655ba3199f36889_81693967%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '116a30b7aa1d257631df633225c4534ae2ea4d5a' => 
    array (
      0 => 'templates/lista_evento.tpl',
      1 => 1438265749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209448352655ba3199f36889_81693967',
  'variables' => 
  array (
    'arr_evento' => 0,
    'evento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55ba319a035bd9_66058458',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55ba319a035bd9_66058458')) {
function content_55ba319a035bd9_66058458 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '209448352655ba3199f36889_81693967';
?>
<ul class="no-bullet">
<?php
$_from = $_smarty_tpl->tpl_vars['arr_evento']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['evento'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['evento']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['evento']->value) {
$_smarty_tpl->tpl_vars['evento']->_loop = true;
$foreach_evento_Sav = $_smarty_tpl->tpl_vars['evento'];
?>
	<li><a href="evento.php?id=<?php echo $_smarty_tpl->tpl_vars['evento']->value['id_evento'];?>
"><?php echo $_smarty_tpl->tpl_vars['evento']->value['titulo'];?>
</a></li>
<?php
$_smarty_tpl->tpl_vars['evento'] = $foreach_evento_Sav;
}
?>
</ul><?php }
}
?>