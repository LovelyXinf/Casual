<h3>Installing: {$module.install_name} V{$module.version}</h3>
<div>{$module.install_descr}</div>
<br>
<div class="bar-level2" id="module_bar"><div class="bar" style="width: {$current_module_percent}%">{$current_module_percent}%</div></div>
<br>
<b>Dependent modules</b><br><br>
{if !empty($errors)}
<div>
		<textarea readonly cols="70" rows="10">{foreach item=item from=$errors}{$item}
______________________________________
{/foreach}</textarea>
</div>
<div class="btn"><div class="l"><input type="button" onclick="javascript: product_install.request('linked');" name="refresh_module" value="Refresh"></div></div>
<div class="clr"></div>
{else}
<script>
{literal}$(function(){{/literal}
	product_install.delayed_request('{$next_step}');
{literal}});{/literal}
</script>
{/if}