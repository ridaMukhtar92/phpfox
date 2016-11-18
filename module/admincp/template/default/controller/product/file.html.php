<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Admincp
 * @version 		$Id: file.html.php 1149 2009-10-07 10:14:46Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
	<div class="table_header">
		{phrase var='admincp.manual_install'}
	</div>
	{if count($aNewProducts)}
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>{phrase var='admincp.product'}</th>
                <th>{phrase var='admincp.version'}</th>
			<th style="width:100px;">{phrase var='admincp.action'}</th>
		</tr>
		{foreach from=$aNewProducts key=iKey item=aProduct}
		<tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
			<td>
			{if !empty($aProduct.url)}<a href="{$aProduct.url}" target="_blank">{/if}{$aProduct.title|clean}{if !empty($aProduct.url)}</a>{/if}
				{if !empty($aProduct.description)}
				<div class="extra_info">
					{$aProduct.description|clean}
				</div>
				{/if}
			</td>
			<td class="t_center">{if empty($aProduct.version)}N/A{else}{$aProduct.version}{/if}</td>			
			<td class="t_center">
				<a href="{url link='admincp.product.file' install=$aProduct.product_id}" title="Click to install this product.">{phrase var='admincp.install'}</a>
			</td>
		</tr>
		{/foreach}
	</table>
	{else}
	<div class="table form-group">
		<div class="message">
			{phrase var='admincp.nothing_new_to_install'}.
		</div>	
	</div>	
	{/if}	
	<div class="table_clear"></div>
	<br />