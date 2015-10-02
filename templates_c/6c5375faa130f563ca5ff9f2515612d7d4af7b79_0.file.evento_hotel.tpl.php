<?php /* Smarty version 3.1.27, created on 2015-07-31 11:29:27
         compiled from "templates/evento_hotel.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:144645604455bb8647a579d7_89115485%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c5375faa130f563ca5ff9f2515612d7d4af7b79' => 
    array (
      0 => 'templates/evento_hotel.tpl',
      1 => 1438352962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144645604455bb8647a579d7_89115485',
  'variables' => 
  array (
    'arr_evento' => 0,
    'arr_hotel' => 0,
    'arr_quarto' => 0,
    'quarto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55bb8647b07519_28483618',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55bb8647b07519_28483618')) {
function content_55bb8647b07519_28483618 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '144645604455bb8647a579d7_89115485';
?>
<!-- Evento -->
<div class="row panel">
    <div class="small-11 small-centered columns">
        
    	<h2><?php echo $_smarty_tpl->tpl_vars['arr_evento']->value['titulo'];?>
</h2>
    	<h3><?php echo $_smarty_tpl->tpl_vars['arr_evento']->value['local'];?>
</h3>
    	<h3><?php echo $_smarty_tpl->tpl_vars['arr_evento']->value['endereco'];?>
, <?php echo $_smarty_tpl->tpl_vars['arr_evento']->value['cidade'];?>
</h3>

        <p>Lat: <?php echo $_smarty_tpl->tpl_vars['arr_evento']->value['lat'];?>
</p>
        <p>Lng: <?php echo $_smarty_tpl->tpl_vars['arr_evento']->value['lng'];?>
</p>
        <p>Inicio: <?php echo $_smarty_tpl->tpl_vars['arr_evento']->value['data_inicio'];?>
</p>
        <p>Fim: <?php echo $_smarty_tpl->tpl_vars['arr_evento']->value['data_fim'];?>
</p>

    </div>
</div>

<!-- HOTEL -->
<div class="row panel">
    <div class="small-11 small-centered columns">
        
        <h2><?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['titulo'];?>
</h2>
        <h3><?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['endereco'];?>
</h3>

        <label>Distância:</label>
        <input type="text" name="distancia" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['distancia'];?>
" /> 
        
        <label>Escassez:</label>
        <input type="text" name="escassez" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['escassez'];?>
" /> 

    </div>
</div>

<!-- QUARTOS -->
<div class="row panel">
    <div class="small-11 small-centered columns">
        
        <h2>Quartos</h2>

<?php
$_from = $_smarty_tpl->tpl_vars['arr_quarto']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['quarto'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['quarto']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['quarto']->value) {
$_smarty_tpl->tpl_vars['quarto']->_loop = true;
$foreach_quarto_Sav = $_smarty_tpl->tpl_vars['quarto'];
?>
        <div class="row panel">
			
			<h3><?php echo $_smarty_tpl->tpl_vars['quarto']->value['titulo'];?>
 (<?php echo $_smarty_tpl->tpl_vars['quarto']->value['capacidade'];?>
 pessoa(s))</h3>
			<h4><?php echo $_smarty_tpl->tpl_vars['quarto']->value['texto_auxiliar'];?>
</h4>   

			<div class="small-4 columns">
				<label>Tarifa cheia:</label>
				<input type="text" name="" value ="<?php echo $_smarty_tpl->tpl_vars['quarto']->value['tarifa_cheia'];?>
" />
			</div>
			<div class="small-4 columns">
				<label>Tarifa EVNTS:</label>
				<input type="text" name="" value ="<?php echo $_smarty_tpl->tpl_vars['quarto']->value['tarifa_evnts'];?>
" />
			</div>
			<div class="small-4 columns">
				<label>Tarifa FDS:</label>
				<input type="text" name="" value ="<?php echo $_smarty_tpl->tpl_vars['quarto']->value['tarifa_evnts_fds'];?>
" />
			</div>

        </div>
        <br />
<?php
$_smarty_tpl->tpl_vars['quarto'] = $foreach_quarto_Sav;
}
?>

    </div>
</div><?php }
}
?>