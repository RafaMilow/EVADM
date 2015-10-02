<?php
date_default_timezone_set('America/Sao_Paulo');

require __DIR__ . '/vendor/autoload.php';

$objEvento 			= new Evnts\Adm\Evento(null);
$_arr_evento 		= $objEvento->buscaTodos();

// Montando a Pagina Principal
$objSmarty = new Smarty;
$objSmarty->template_dir = 'templates/';
$objSmarty->compile_dir  = 'templates_c/';

// BreadCrumb
$arr_breadcrumbs[] =  array('titulo' => 'Eventos', 'url' => 'index.php');

// Montando o HTML de ada hotel que aparece na listagem
$objSmarty->assign('arr_breadcrumbs', $arr_breadcrumbs);
$objSmarty->assign('arr_evento', $_arr_evento);
$_APP = $objSmarty->fetch('lista_evento.tpl');

$objSmarty->assign('APP', $_APP);
$objSmarty->display('index.tpl');