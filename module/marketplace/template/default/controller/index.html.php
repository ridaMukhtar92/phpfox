<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if (count($aListings))}
{foreach from=$aListings name=listings item=aListing}
	{module name='marketplace.rows'}
{/foreach}
{pager}
{elseif !PHPFOX_IS_AJAX}
{phrase var='marketplace.no_marketplace_listings_found'}
{/if}