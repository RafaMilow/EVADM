<?php
require __DIR__ . '/vendor/autoload.php';

$objEvento 			= new Evnts\Adm\Evento($_GET["id"]);
$_arr_evento 		= $objEvento->buscaEvento();

$objHotel 			= new Evnts\Adm\Hotel();
$objHotel->_evento 	= $objEvento->getEvento();
$_arr_hotel 		= $objHotel->buscaHoteisQuartosEvento('', 4);


// BreadCrumb
$arr_breadcrumbs[] =  array('titulo' => 'Eventos', 'url' => 'index.php');
$arr_breadcrumbs[] =  array('titulo' => $_arr_evento['titulo'], 'url' => '');

// Montando a Pagina Principal
$objSmarty = new Smarty;
$objSmarty->template_dir = 'templates/';
$objSmarty->compile_dir  = 'templates_c/';

$objSmarty->assign('arr_breadcrumbs', $arr_breadcrumbs);
$objSmarty->assign('arr_evento', $_arr_evento);
$objSmarty->assign('arr_hotel', $_arr_hotel);
$_APP = $objSmarty->fetch('lista_hotel.tpl');

$objSmarty->assign('APP', $_APP);
$objSmarty->display('index.tpl');