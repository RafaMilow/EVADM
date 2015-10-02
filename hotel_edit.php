<?php
require __DIR__ . '/vendor/autoload.php';

$objHotel 			= new Evnts\Adm\Hotel();
$objHotel->_hotel 	= $_GET['id_hotel'];
$_arr_hotel 		= $objHotel->buscaHotel();
$_arr_quarto 		= $objHotel->buscaHotelQuartos();


// BreadCrumb
$arr_breadcrumbs[] =  array('titulo' => 'Hotéis', 'url' => 'hotel.php');
$arr_breadcrumbs[] =  array('titulo' => $_arr_hotel['titulo'], 'url' => '');

// Montando a Pagina Principal
$objSmarty = new Smarty;
$objSmarty->template_dir = 'templates/';
$objSmarty->compile_dir  = 'templates_c/';

$objSmarty->assign('arr_breadcrumbs', $arr_breadcrumbs);
$objSmarty->assign('arr_hotel', $_arr_hotel);
$objSmarty->assign('arr_quarto', $_arr_quarto);
$_APP = $objSmarty->fetch('hotelEdit.tpl');

$objSmarty->assign('APP', $_APP);
$objSmarty->display('index.tpl');