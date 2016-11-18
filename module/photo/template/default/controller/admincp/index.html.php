<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 1174 2009-10-11 13:56:13Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Photo
 * @version 		$Id: index.html.php 3072 2011-09-12 13:23:50Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{if count($aCategories)}
{module name='help.info' phrase='photo.tip_delete_category'}
<form method="post" action="{url link='admincp.photo'}">
    <table id="js_drag_drop" cellpadding="0" cellspacing="0">
        <tr>
            <th></th>
            <th style="width:20px;"></th>
            <th>{phrase var='photo.name'}</th>
            <th>{_p var='Last modified'}</th>
            <th>{_p var='Total photos'}</th>
        </tr>
        {foreach from=$aCategories key=iKey item=aCategory}
        <tr id="js_row{$aCategory.category_id}" class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
            <td class="drag_handle"><input type="hidden" name="val[ordering][{$aCategory.category_id}]" value="{$aCategory.ordering}" /></td>
            <td class="t_center">
                <a href="#" class="js_drop_down_link" title="{_p var='Manage'}">{img theme='misc/bullet_arrow_down.png' alt=''}</a>
                <div class="link_menu">
                    <ul>
                        <li><a href="{url link='admincp.photo.add' id=$aCategory.category_id}">{_p var="Edit"}</a></li>
                        {if $aCategory.total_sub > 0}
                        <li><a href="{url link='admincp.photo' parent=$aCategory.category_id}">{_p var="Manage Sub-Category"} ({$aCategory.total_sub})</a></li>
                        {/if}
                        <li><a href="{url link='admincp.photo.add' delete=$aCategory.category_id}" onclick="return confirm('{phrase var='pages.are_you_sure'}');">{phrase var='photo.delete'}</a></li>
                    </ul>
                </div>
            </td>
            <td id="js_photo_edit_title{$aCategory.category_id}">
                {if Phpfox::isPhrase($this->_aVars['aCategory']['name'])}
                {phrase var=$aCategory.name}
                {else}
                {$aCategory.name|convert|clean}
                {/if}
            </td>
            <td>
                {if $aCategory.time_stamp}
                {$aCategory.time_stamp|date:'core.global_update_time'}
                {else}
                {_p var="None"}
                {/if}
            </td>
            <td>{if $aCategory.used > 0}<a href="{$aCategory.link}" id="js_category_link{$aCategory.category_id}">{$aCategory.used}</a>{else}{_p var="None"}{/if}</td>
        </tr>
        {/foreach}
    </table>
    {else}
    <div class="p_4">
        {phrase var='photo.no_photo_categories_have_been_created'} <a href="{url link='admincp.photo.add'}">{phrase var='photo.create_one_now'}</a>.
    </div>
    {/if}
</form>

{pager}