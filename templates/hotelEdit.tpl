<h1 class="text-center">Edição Hotéis</h1>

<!-- HOTEL -->
<div class="row panel">
    <div class="small-6 columns">
        
        <label>Título:</label>
		<input type="text" name="" value="{$arr_hotel.titulo}" />

		<label>Tipo de acomodação:</label>
		<select>
			<option>Hotel</option>	
			<option>Hostel</option>	
		</select>        

		<label>TripAdvisor:</label>
		<input type="text" name="" value="{$arr_hotel.tripadvisor}" />

		<label>ISS:</label>
		<input type="text" name="" value="{$arr_hotel.iss}" />

		<label>Avaliação:</label>
		<input type="text" name="" value="{$arr_hotel.avaliacao}" />

		<label>Endereço:</label>
		<input type="text" name="" value="{$arr_hotel.endereco}" />

		<label>Telefone:</label>
		<input type="text" name="" value="{$arr_hotel.telefone}" />	
        
		<label>E-Mail:</label>
		<input type="text" name="" value="{$arr_hotel.email}" />	



    </div>

    <div class="small-6 columns">

    	<label>Descrição:</label>
		<textarea rows="11" name="mensagem" placeholder="">{$arr_hotel.resumo}</textarea>

		<div class="row">
			<div class="small-6 columns">
				<label>Check-in:</label>
				<input type="text" name="" value="{$arr_hotel.horario_entrada}" />	
			</div>
			<div class="small-6 columns">
				<label>Check-out:</label>
				<input type="text" name="" value="{$arr_hotel.horario_saida}" />	
			</div>
		</div>

		<div class="row">
			<div class="small-2 columns">
				<label>WIFI</label>
				<input type="checkbox" name="" value="" {if $arr_hotel.caracteristicas.0}checked{/if}>
			</div>
			<div class="small-2 columns">
				<label>Academia</label>
				<input type="checkbox" name="" value="" {if $arr_hotel.caracteristicas.1}checked{/if}>
			</div>
			<div class="small-2 columns">
				<label>Ar</label>
				<input type="checkbox" name="" value="" {if $arr_hotel.caracteristicas.2}checked{/if}>
			</div>
			<div class="small-2 columns">
				<label>Café</label>
				<input type="checkbox" name="" value="" {if $arr_hotel.caracteristicas.3}checked{/if}>
			</div>
			<div class="small-2 columns end">
				<label>Estacionamento</label>
				<input type="checkbox" name="" value="" {if $arr_hotel.caracteristicas.4}checked{/if}>
			</div>
		</div>

		<div class="row">
			<div class="small-6 columns">
				<label>Latitude:</label>
				<input type="text" name="" value="{$arr_hotel.lat}" />	
			</div>
			<div class="small-6 columns">
				<label>Longitude:</label>
				<input type="text" name="" value="{$arr_hotel.lng}" />	
			</div>
		</div>


    </div>


</div>

<!-- QUARTOS -->
<div class="row panel">
    <div class="small-12 columns container-quarto">
        
        <h2>Quartos</h2>
        <p><a id="btn-add-quarto" href="">Adicionar Quarto</a></p>

{foreach $arr_quarto as $quarto}
        <div class="row panel">
			
			<h3>{$quarto.titulo}</h3>
			<label>Título:</label>
			<input type="text" name="" value ="{$quarto.titulo}" />

			<label>Texto Auxiliar:</label>
			<input type="text" name="" value ="{$quarto.texto_auxiliar}" />

			<label>Capacidade:</label>
			<input type="text" name="" value ="{$quarto.capacidade}" />

        </div>
{/foreach}

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

<script id="quarto-template" type="text/x-handlebars-template">
	<div class="row panel">

		<h3>Novo Quarto</h3>

		<label>Título:</label>
		<input type="text" name="" value ="" />

		<label>Texto Auxiliar:</label>
		<input type="text" name="" value ="" />

		<label>Capacidade:</label>
		<input type="text" name="" value ="" />

	</div>
</script>

<script type="text/javascript">

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

</script>