<?php /* Smarty version 3.1.27, created on 2015-10-02 20:34:02
         compiled from "templates/breadcrumb.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:676450506560eea3a883b36_44165419%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f8d8fe9f9802785cf57fc36876e9bfa8cab22a3' => 
    array (
      0 => 'templates/breadcrumb.tpl',
      1 => 1443817722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '676450506560eea3a883b36_44165419',
  'variables' => 
  array (
    'arr_breadcrumbs' => 0,
    'breadcrumb' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_560eea3a8c1192_04042164',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_560eea3a8c1192_04042164')) {
function content_560eea3a8c1192_04042164 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '676450506560eea3a883b36_44165419';
?>
<div class="row">
    <nav class="breadcrumbs show-for-medium-up" role="menubar" aria-label="breadcrumbs">
        <?php
$_from = $_smarty_tpl->tpl_vars['arr_breadcrumbs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['breadcrumb'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['breadcrumb']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['breadcrumb']->value) {
$_smarty_tpl->tpl_vars['breadcrumb']->_loop = true;
$foreach_breadcrumb_Sav = $_smarty_tpl->tpl_vars['breadcrumb'];
?>
        	<?php if ($_smarty_tpl->tpl_vars['breadcrumb']->value['url'] == '') {?>
        	<li role="menuitem" class="current"><a href="#"><?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value['titulo'];?>
</a></li>
        	<?php } else { ?>
        	<li role="menuitem"><a href="<?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['breadcrumb']->value['titulo'];?>
</a></li>
        	<?php }?>
        <?php
$_smarty_tpl->tpl_vars['breadcrumb'] = $foreach_breadcrumb_Sav;
}
?>
    </nav>
</div><?php }
}
?>