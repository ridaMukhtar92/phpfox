<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Blog
 * @version 		$Id: categories.html.php 2254 2011-01-11 08:09:33Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="sub_section_menu">
	<ul class="action">
	{foreach from=$aCategories item=aCategory}
		<li class="{if $iCategoryBlogView == $aCategory.category_id} active{/if}"><a href="{$aCategory.url}" class="ajax_link">
                {if Phpfox::isPhrase($this->_aVars['aCategory']['name'])}
                {phrase var=$aCategory.name}
                {else}
                {$aCategory.name|convert|clean}
                {/if}
            </a></li>
	{/foreach}
	</ul>
</div>