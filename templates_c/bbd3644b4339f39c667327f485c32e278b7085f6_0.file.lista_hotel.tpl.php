<?php /* Smarty version 3.1.27, created on 2015-07-30 12:16:58
         compiled from "templates/lista_hotel.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:182698989555ba3fea4e1d57_24030724%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbd3644b4339f39c667327f485c32e278b7085f6' => 
    array (
      0 => 'templates/lista_hotel.tpl',
      1 => 1438269414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182698989555ba3fea4e1d57_24030724',
  'variables' => 
  array (
    'arr_hotel' => 0,
    'hotel' => 0,
    'arr_evento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55ba3fea526272_92469512',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55ba3fea526272_92469512')) {
function content_55ba3fea526272_92469512 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '182698989555ba3fea4e1d57_24030724';
?>


<div id='lst-hoteis' class='container'>
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
	<div class="panel">
		<a href="evento_hotel.php?id_hotel=<?php echo $_smarty_tpl->tpl_vars['hotel']->value['id_hotel'];?>
&id_evento=<?php echo $_smarty_tpl->tpl_vars['arr_evento']->value['id_evento'];?>
"><?php echo $_smarty_tpl->tpl_vars['hotel']->value['titulo'];?>
</a>
		<input type="hidden" name="hotel[]" value="<?php echo $_smarty_tpl->tpl_vars['hotel']->value['id_hotel'];?>
">
	</div>
<?php
$_smarty_tpl->tpl_vars['hotel'] = $foreach_hotel_Sav;
}
?>
</div>


<?php echo '<script'; ?>
 type="text/javascript">

var single2 = $('#lst-hoteis')[0];

dragula({ containers: [single2] });

<?php echo '</script'; ?>
><?php }
}
?>