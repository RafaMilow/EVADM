<?php
require __DIR__ . '/vendor/autoload.php';

$objEvento 			= new Evnts\Adm\Evento($_GET["id_evento"]);
$_arr_evento 		= $objEvento->buscaEvento();

$objHotel 			= new Evnts\Adm\Hotel();
$objHotel->_evento 	= $objEvento->getEvento();
$objHotel->_hotel 	= $_GET['id_hotel'];

// Hoteis
$_arr_hotel 	= $objHotel->buscaHotelEvento();
$_arr_quarto 	= $objHotel->buscaQuartos();

// BreadCrumb
$arr_breadcrumbs[] =  array('titulo' => 'Eventos', 'url' => 'index.php');
$arr_breadcrumbs[] =  array('titulo' => $_arr_evento['titulo'], 'url' => 'evento.php?id='.$_arr_evento['id_evento']);
$arr_breadcrumbs[] =  array('titulo' => $_arr_hotel['titulo'], 'url' => '');

// Montando a Pagina Principal
$objSmarty = new Smarty;
$objSmarty->template_dir = 'templates/';
$objSmarty->compile_dir  = 'templates_c/';

$objSmarty->assign('arr_breadcrumbs', $arr_breadcrumbs);
$objSmarty->assign('arr_evento', $_arr_evento);
$objSmarty->assign('arr_hotel', $_arr_hotel);
$objSmarty->assign('arr_quarto', $_arr_quarto);
$_APP = $objSmarty->fetch('evento_hotel.tpl');

$objSmarty->assign('APP', $_APP);
$objSmarty->display('index.tpl');