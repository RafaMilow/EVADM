<div class="row">
    <nav class="breadcrumbs show-for-medium-up" role="menubar" aria-label="breadcrumbs">
        {foreach $arr_breadcrumbs as $breadcrumb}
        	{if $breadcrumb.url eq ''}
        	<li role="menuitem" class="current"><a href="#">{$breadcrumb.titulo}</a></li>
        	{else}
        	<li role="menuitem"><a href="{$breadcrumb.url}">{$breadcrumb.titulo}</a></li>
        	{/if}
        {/foreach}
    </nav>
</div>