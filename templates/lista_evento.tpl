<ul class="no-bullet">
{foreach $arr_evento as $evento}
	<li><a href="evento.php?id={$evento.id_evento}">{$evento.titulo}</a></li>
{/foreach}
</ul>