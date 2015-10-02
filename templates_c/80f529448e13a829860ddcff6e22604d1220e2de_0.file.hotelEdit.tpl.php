<?php /* Smarty version 3.1.27, created on 2015-07-31 15:32:25
         compiled from "templates/hotelEdit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:136106511555bbbf39373885_53339618%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80f529448e13a829860ddcff6e22604d1220e2de' => 
    array (
      0 => 'templates/hotelEdit.tpl',
      1 => 1438367543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136106511555bbbf39373885_53339618',
  'variables' => 
  array (
    'arr_hotel' => 0,
    'arr_quarto' => 0,
    'quarto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55bbbf394349d0_89030614',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55bbbf394349d0_89030614')) {
function content_55bbbf394349d0_89030614 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '136106511555bbbf39373885_53339618';
?>
<h1 class="text-center">Edição Hotéis</h1>

<!-- HOTEL -->
<div class="row panel">
    <div class="small-6 columns">
        
        <label>Título:</label>
		<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['titulo'];?>
" />

		<label>Tipo de acomodação:</label>
		<select>
			<option>Hotel</option>	
			<option>Hostel</option>	
		</select>        

		<label>TripAdvisor:</label>
		<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['tripadvisor'];?>
" />

		<label>ISS:</label>
		<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['iss'];?>
" />

		<label>Avaliação:</label>
		<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['avaliacao'];?>
" />

		<label>Endereço:</label>
		<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['endereco'];?>
" />

		<label>Telefone:</label>
		<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['telefone'];?>
" />	
        
		<label>E-Mail:</label>
		<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['email'];?>
" />	



    </div>

    <div class="small-6 columns">

    	<label>Descrição:</label>
		<textarea rows="11" name="mensagem" placeholder=""><?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['resumo'];?>
</textarea>

		<div class="row">
			<div class="small-6 columns">
				<label>Check-in:</label>
				<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['horario_entrada'];?>
" />	
			</div>
			<div class="small-6 columns">
				<label>Check-out:</label>
				<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['horario_saida'];?>
" />	
			</div>
		</div>

		<div class="row">
			<div class="small-2 columns">
				<label>WIFI</label>
				<input type="checkbox" name="" value="" <?php if ($_smarty_tpl->tpl_vars['arr_hotel']->value['caracteristicas'][0]) {?>checked<?php }?>>
			</div>
			<div class="small-2 columns">
				<label>Academia</label>
				<input type="checkbox" name="" value="" <?php if ($_smarty_tpl->tpl_vars['arr_hotel']->value['caracteristicas'][1]) {?>checked<?php }?>>
			</div>
			<div class="small-2 columns">
				<label>Ar</label>
				<input type="checkbox" name="" value="" <?php if ($_smarty_tpl->tpl_vars['arr_hotel']->value['caracteristicas'][2]) {?>checked<?php }?>>
			</div>
			<div class="small-2 columns">
				<label>Café</label>
				<input type="checkbox" name="" value="" <?php if ($_smarty_tpl->tpl_vars['arr_hotel']->value['caracteristicas'][3]) {?>checked<?php }?>>
			</div>
			<div class="small-2 columns end">
				<label>Estacionamento</label>
				<input type="checkbox" name="" value="" <?php if ($_smarty_tpl->tpl_vars['arr_hotel']->value['caracteristicas'][4]) {?>checked<?php }?>>
			</div>
		</div>

		<div class="row">
			<div class="small-6 columns">
				<label>Latitude:</label>
				<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['lat'];?>
" />	
			</div>
			<div class="small-6 columns">
				<label>Longitude:</label>
				<input type="text" name="" value="<?php echo $_smarty_tpl->tpl_vars['arr_hotel']->value['lng'];?>
" />	
			</div>
		</div>


    </div>


</div>

<!-- QUARTOS -->
<div class="row panel">
    <div class="small-12 columns container-quarto">
        
        <h2>Quartos</h2>
        <p><a id="btn-add-quarto" href="">Adicionar Quarto</a></p>

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
</h3>
			<label>Título:</label>
			<input type="text" name="" value ="<?php echo $_smarty_tpl->tpl_vars['quarto']->value['titulo'];?>
" />

			<label>Texto Auxiliar:</label>
			<input type="text" name="" value ="<?php echo $_smarty_tpl->tpl_vars['quarto']->value['texto_auxiliar'];?>
" />

			<label>Capacidade:</label>
			<input type="text" name="" value ="<?php echo $_smarty_tpl->tpl_vars['quarto']->value['capacidade'];?>
" />

        </div>
<?php
$_smarty_tpl->tpl_vars['quarto'] = $foreach_quarto_Sav;
}
?>

    </div>
</div>

<div class="row">
	<div class="small-6 columns text-left">
		<button class="alert">Apagar Hotel</button>
	</div>
	<div class="small-6 columns">
		<button class="expand">Salvar Alterações</button>
	</div>
</div>

<?php echo '<script'; ?>
 id="quarto-template" type="text/x-handlebars-template">
	<div class="row panel">

		<h3>Novo Quarto</h3>

		<label>Título:</label>
		<input type="text" name="" value ="" />

		<label>Texto Auxiliar:</label>
		<input type="text" name="" value ="" />

		<label>Capacidade:</label>
		<input type="text" name="" value ="" />

	</div>
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">

// FORM de ORDENACAO
$( "#btn-add-quarto" ).bind( "click", function() {

	// Template
	var qHTML 	= $("#quarto-template").html();

	// Compile the template
  	var qTPL 	= Handlebars.compile(qHTML);

  	// Add the compiled html to the page
  	$('.container-quarto').append(qTPL);

  	var news = $('.container-quarto div:last-child').position().top;
  	news += 800;
  	$('body, html').animate({ scrollTop: news }, 1000);

	return false;
});

<?php echo '</script'; ?>
><?php }
}
?>