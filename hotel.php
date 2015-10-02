<?php
require __DIR__ . '/vendor/autoload.php';

$objHotel 			= new Evnts\Adm\Hotel();
$_arr_hotel 		= $objHotel->listaHotel();

// Montando a Pagina Principal
$objSmarty = new Smarty;
$objSmarty->template_dir = 'templates/';
$objSmarty->compile_dir  = 'templates_c/';

// BreadCrumb
$arr_breadcrumbs[] =  array('titulo' => 'Hotéis', 'url' => '');

$objSmarty->assign('arr_breadcrumbs', $arr_breadcrumbs);
$objSmarty->assign('arr_hotel', $_arr_hotel);
$_APP = $objSmarty->fetch('listaHoteis.tpl');

$objSmarty->assign('APP', $_APP);
$objSmarty->display('index.tpl');