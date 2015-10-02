<?php /* Smarty version 3.1.27, created on 2015-07-31 15:04:40
         compiled from "templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:29517752555bbb8b80121f3_44514283%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1438365689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29517752555bbb8b80121f3_44514283',
  'variables' => 
  array (
    'arr_breadcrumbs' => 0,
    'APP' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55bbb8b8021648_51299460',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55bbb8b8021648_51299460')) {
function content_55bbb8b8021648_51299460 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '29517752555bbb8b80121f3_44514283';
?>
<!doctype html>
<html>
<head>
<title>Template</title>

	<!-- Meta Tags -->
    <meta name="viewport" content="width=device-width" />

	<!-- CSS -->
    <link rel="stylesheet" href="bower_components/dragula.js/dist/dragula.min.css">
    <link rel="stylesheet" href="css/min/evnts.min.css">
    <link rel="stylesheet" href="css/min/extra.min.css">

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
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"><?php echo '</script'; ?>
>

</head>
<body>

<div class="contain-to-grid sticky">
  <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
    ...
  </nav>
</div>

<div class="row full">
    <div class="small-2 columns">

        <ul class="side-nav">
            <li><a href="hotel.php">Hóteis</a></li>
            <li><a href="index.php">Eventos</a></li>
            <li><a href="#">Reservas</a></li>
            <li><a href="#">Relatórios</a></li>
        </ul>
       
    </div>

    <div class="small-10 columns">

    <?php echo $_smarty_tpl->getSubTemplate ('breadcrumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('breadcrumbs'=>$_smarty_tpl->tpl_vars['arr_breadcrumbs']->value), 0);
?>

    <?php echo $_smarty_tpl->tpl_vars['APP']->value;?>


    </div>
</div>


</body>
</html><?php }
}
?>