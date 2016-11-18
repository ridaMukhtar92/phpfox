<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if isset($check)}
{if $failed}
<div class="error_message">
    {phrase var='admincp.failed_file_s_failed' failed=$failed}.
</div>
<table>
	<tr>
		<th>{phrase var='admincp.file'}</th>
		<th>{phrase var='admincp.type'}</th>
	</tr>
	{foreach from=$files name=files item=message key=file}
	<tr class="checkRow{if is_int($phpfox.iteration.files/2)} tr{else}{/if}">
		<td>{$file}</td>
		<td>{$message}</td>
	</tr>
	{/foreach}
</table>
{else}
<div class="valid_message">
	{phrase var='admincp.all_files_have_passed'}!
</div>
{/if}
{else}
	<div id="checkFiles" data-url="{$url}">
		<i class="fa fa-spin fa-circle-o-notch"></i>
	</div>
	{literal}
	<script>
		var isChecked = false;
		$Ready(function() {
			if (isChecked) {
				return;
			}
			isChecked = true;
			$.ajax({
				url: $('#checkFiles').data('url'),
				contentType: 'application/json',
				success: function(e) {
					$('#checkFiles').html(e.content);
				}
			});
		});
	</script>
	{/literal}
{/if}