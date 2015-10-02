<!-- Evento -->
<div class="row panel">
    <div class="small-11 small-centered columns">
        
    	<h2>{$arr_evento.titulo}</h2>
    	<h3>{$arr_evento.local}</h3>
    	<h3>{$arr_evento.endereco}, {$arr_evento.cidade}</h3>

        <p>Lat: {$arr_evento.lat}</p>
        <p>Lng: {$arr_evento.lng}</p>
        <p>Inicio: {$arr_evento.data_inicio}</p>
        <p>Fim: {$arr_evento.data_fim}</p>

    </div>
</div>

<!-- HOTEL -->
<div class="row panel">
    <div class="small-11 small-centered columns">
        
        <h2>{$arr_hotel.titulo}</h2>
        <h3>{$arr_hotel.endereco}</h3>

        <label>Distância:</label>
        <input type="text" name="distancia" value="{$arr_hotel.distancia}" /> 
        
        <label>Escassez:</label>
        <input type="text" name="escassez" value="{$arr_hotel.escassez}" /> 

    </div>
</div>

<!-- QUARTOS -->
<div class="row panel">
    <div class="small-11 small-centered columns">
        
        <h2>Quartos</h2>

{foreach $arr_quarto as $quarto}
        <div class="row panel">
			
			<h3>{$quarto.titulo} ({$quarto.capacidade} pessoa(s))</h3>
			<h4>{$quarto.texto_auxiliar}</h4>   

			<div class="small-4 columns">
				<label>Tarifa cheia:</label>
				<input type="text" name="" value ="{$quarto.tarifa_cheia}" />
			</div>
			<div class="small-4 columns">
				<label>Tarifa EVNTS:</label>
				<input type="text" name="" value ="{$quarto.tarifa_evnts}" />
			</div>
			<div class="small-4 columns">
				<label>Tarifa FDS:</label>
				<input type="text" name="" value ="{$quarto.tarifa_evnts_fds}" />
			</div>

        </div>
        <br />
{/foreach}

    </div>
</div>