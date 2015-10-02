

<div id='lst-hoteis' class='container'>
{foreach $arr_hotel as $hotel}
	<div class="panel">
		<a href="evento_hotel.php?id_hotel={$hotel.id_hotel}&id_evento={$arr_evento.id_evento}">{$hotel.titulo}</a>
		<input type="hidden" name="hotel[]" value="{$hotel.id_hotel}">
	</div>
{/foreach}
</div>


<script type="text/javascript">

var single2 = $('#lst-hoteis')[0];

dragula({ containers: [single2] });

</script>