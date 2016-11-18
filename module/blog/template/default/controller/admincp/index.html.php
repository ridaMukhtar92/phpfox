<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Blog
 * @version 		$Id: index.html.php 3072 2011-09-12 13:23:50Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if count($aCategories)}
{module name='help.info' phrase='blog.tip_delete_category'}
<form method="post" action="{url link='admincp.blog'}">
	<table>
	<tr>
		<th style="width:10px;"><input type="checkbox" name="val[id]" value="" id="js_check_box_all" class="main_checkbox" /></th>
        <th style="width:20px;"></th>
		<th>{phrase var='blog.name'}</th>
		<th>{phrase var='blog.created_user'}</th>
		<th>{phrase var='blog.created'}</th>
		<th>{phrase var='blog.total_blogs'}</th>
	</tr>
	{foreach from=$aCategories key=iKey item=aCategory}
	<tr id="js_row{$aCategory.category_id}" class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
		<td><input type="checkbox" name="id[]" class="checkbox" value="{$aCategory.category_id}" id="js_id_row{$aCategory.category_id}" /></td>
        <td class="t_center">
            <a href="#" class="js_drop_down_link" title="{_p var='Manage'}">{img theme='misc/bullet_arrow_down.png' alt=''}</a>
            <div class="link_menu">
                <ul>
                    <li><a href="{url link='admincp.blog.add' id=$aCategory.category_id}">{_p var="Edit"}</a></li>
                    <li><a href="{url link='admincp.blog.add' delete=$aCategory.category_id}" onclick="return confirm('{phrase var='pages.are_you_sure'}');">{phrase var='blog.delete'}</a></li>
                </ul>
            </div>
        </td>
		<td id="js_blog_edit_title{$aCategory.category_id}">
            {if Phpfox::isPhrase($this->_aVars['aCategory']['name'])}
                {phrase var=$aCategory.name}
            {else}
                {$aCategory.name|convert|clean}
            {/if}
        </td>
		<td>{if $aCategory.user_name}{$aCategory|user}{else}{phrase var='blog.system'}{/if}</td>
		<td>{$aCategory.added|date:'core.global_update_time'}</td>
		<td>{if $aCategory.used > 0}<a href="{$aCategory.link}" id="js_category_link{$aCategory.category_id}">{$aCategory.used}</a>{else}{phrase var='blog.none'}{/if}</td>
	</tr>
	{/foreach}
	</table>
	<div class="table_bottom">
		<input type="submit" name="delete" value="{phrase var='blog.delete_selected'}" class="sJsConfirm delete button sJsCheckBoxButton disabled" disabled="true" />
	</div>
	{else}
	<div class="p_4">
		{phrase var='blog.no_blog_categories_have_been_created'} <a href="{url link='admincp.blog.add'}">{phrase var='blog.create_one_now'}</a>.
	</div>
	{/if}
</form>

{pager}