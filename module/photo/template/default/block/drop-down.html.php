<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Photo
 * @version 		$Id: drop-down.html.php 2633 2011-05-30 13:57:44Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<select {if $bMultiple}name="val{if isset($aForms.photo_id)}[{$aForms.photo_id}]{/if}[category_id][]" multiple="multiple" size="8"{else}name="val[category_id]"{/if} style="max-width:100%">
{if !$bMultiple}
	<option value="">{phrase var='photo.select'}:</option>
{/if}
	{$sCategories}
</select>