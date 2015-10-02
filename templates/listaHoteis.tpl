<ul>
{foreach $arr_hotel as $hotel}
	<li><a href="hotel_edit.php?id_hotel={$hotel.id_hotel}">{$hotel.titulo}</a></li>		
{/foreach}
</ul>
