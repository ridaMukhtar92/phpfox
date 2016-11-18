<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 2197 2010-11-22 15:26:08Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 
?>

<div class="table_header">
	{phrase var='event.categories'}
</div>
<table id="js_drag_drop" cellpadding="0" cellspacing="0">
    <tr>
        <th></th>
        <th style="width:20px;"></th>
        <th>{phrase var='event.name'}</th>
        <th class="t_center" style="width:60px;">{_p var='Active'}</th>
    </tr>
    {foreach from=$aCategories key=iKey item=aCategory}
    <tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
        <td class="drag_handle"><input type="hidden" name="val[ordering][{$aCategory.category_id}]" value="{$aCategory.ordering}" /></td>
        <td class="t_center">
            <a href="#" class="js_drop_down_link" title="{_p var='Manage'}">{img theme='misc/bullet_arrow_down.png' alt=''}</a>
            <div class="link_menu">
                <ul>
                    <li><a href="{url link='admincp.event.add' id=$aCategory.category_id}">{phrase var='event.edit'}</a></li>
                    {if isset($aCategory.total_sub) && $aCategory.total_sub>0}
                    <li><a href="{url link='admincp.event' parent={$aCategory.category_id}">{_p var='Manage sub categories'} <span class="label label-default">{$aCategory.total_sub}</span></a></li>
                    {/if}
                    <li><a href="{url link='admincp.event.add' delete=$aCategory.category_id}" onclick="return confirm('{phrase var='core.are_you_sure'}');">{phrase var='event.delete'}</a></li>
                </ul>
            </div>
        </td>
        <td>
            {softPhrase var=$aCategory.name}
        </td>
        <td class="t_center">
            <div class="js_item_is_active"{if !$aCategory.is_active} style="display:none;"{/if}>
            <a href="#?call=event.toggleActiveCategory&amp;id={$aCategory.category_id}&amp;active=0" class="js_item_active_link" title="{_p var='Deactivate'}">{img theme='misc/bullet_green.png' alt=''}</a>
            </div>
            <div class="js_item_is_not_active"{if $aCategory.is_active} style="display:none;"{/if}>
            <a href="#?call=event.toggleActiveCategory&amp;id={$aCategory.category_id}&amp;active=1" class="js_item_active_link" title="{_p var='Activate'}">{img theme='misc/bullet_red.png' alt=''}</a>
            </div>
        </td>
    </tr>
    {/foreach}
</table>