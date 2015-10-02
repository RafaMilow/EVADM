<?php /* Smarty version 3.1.27, created on 2015-07-30 11:31:07
         compiled from "templates/evento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:121074650755ba352b8e0d84_60333533%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4b93505e92240e06cffe3bdf244330f89e5aefe' => 
    array (
      0 => 'templates/evento.tpl',
      1 => 1438266655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121074650755ba352b8e0d84_60333533',
  'variables' => 
  array (
    'arr_hotel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55ba352b9168a7_85134553',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55ba352b9168a7_85134553')) {
function content_55ba352b9168a7_85134553 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '121074650755ba352b8e0d84_60333533';
?>
<!doctype html>
<html>
<head>
<title>Evento</title>

	<!-- Meta Tags -->
    <meta name="viewport" content="width=device-width" />

	<!-- CSS -->
    <link rel="stylesheet" href="bower_components/dragula.js/dist/dragula.min.css">
    <link rel="stylesheet" href="css/min/evnts.min.css">

    <!-- JS -->
    <?php echo '<script'; ?>
 src="bower_components/modernizr/modernizr.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="bower_components/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="bower_components/foundation/js/foundation.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="bower_components/dragula.js/dist/dragula.js"><?php echo '</script'; ?>
>

</head>
<body>




<div class="row">
    <div class="small-11 small-centered columns">
        
        <?php echo $_smarty_tpl->getSubTemplate ('lista_hotel.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('arr_hotel'=>$_smarty_tpl->tpl_vars['arr_hotel']->value), 0);
?>


    </div>
</div>

</body>
</html><?php }
}
?>