<?php /* Smarty version 3.1.27, created on 2015-07-30 14:35:02
         compiled from "templates/listaHoteis.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:185870833655ba60468915c2_82615652%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '988299f2d0b6602573fb3578513ec2e31a32deb9' => 
    array (
      0 => 'templates/listaHoteis.tpl',
      1 => 1438277700,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185870833655ba60468915c2_82615652',
  'variables' => 
  array (
    'arr_hotel' => 0,
    'hotel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55ba60468aea82_59201034',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55ba60468aea82_59201034')) {
function content_55ba60468aea82_59201034 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '185870833655ba60468915c2_82615652';
?>
<ul>
<?php
$_from = $_smarty_tpl->tpl_vars['arr_hotel']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['hotel'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['hotel']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['hotel']->value) {
$_smarty_tpl->tpl_vars['hotel']->_loop = true;
$foreach_hotel_Sav = $_smarty_tpl->tpl_vars['hotel'];
?>
	<li><a href="hotel_edit.php?id_hotel=<?php echo $_smarty_tpl->tpl_vars['hotel']->value['id_hotel'];?>
"><?php echo $_smarty_tpl->tpl_vars['hotel']->value['titulo'];?>
</a></li>		
<?php
$_smarty_tpl->tpl_vars['hotel'] = $foreach_hotel_Sav;
}
?>
</ul>
<?php }
}
?>