<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: info.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="info_holder">
	
	{if is_array($aListing.categories) && count($aListing.categories)}
	<div class="info">
		<div class="info_left">
			{phrase var='marketplace.category'}:
		</div>
		<div class="info_right">
			{$aListing.categories|category_display}
		</div>
	</div>		
	{/if}

    <div class="info">
		<div class="info_left">
            {phrase var='marketplace.short_description'}
		</div>
		<div class="info_right">
			{$aListing.mini_description}
		</div>
	</div>
	
	{if Phpfox::isModule('input')}
		{module name='input.display' action='add-listing' module='marketplace' item_id=$aListing.listing_id}
	{/if}
	
	<div class="item_view_content item_content" itemprop="description">
		{$aListing.description|parse|split:70}
	</div>
</div>