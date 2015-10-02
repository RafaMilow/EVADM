<?php /* Smarty version 3.1.27, created on 2015-07-30 14:35:02
         compiled from "templates/hoteis.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:24606075255ba604685ae64_23073517%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba0ab97337d46c30eb0596a250330339b6702c13' => 
    array (
      0 => 'templates/hoteis.tpl',
      1 => 1438277635,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24606075255ba604685ae64_23073517',
  'variables' => 
  array (
    'arr_hotel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55ba604688ba16_00558338',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55ba604688ba16_00558338')) {
function content_55ba604688ba16_00558338 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '24606075255ba604685ae64_23073517';
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
        
        <?php echo $_smarty_tpl->getSubTemplate ('listaHoteis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('arr_hotel'=>$_smarty_tpl->tpl_vars['arr_hotel']->value), 0);
?>


    </div>
</div>

</body>
</html><?php }
}
?>