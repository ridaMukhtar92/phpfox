<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: index.html.php 4445 2012-07-02 10:41:03Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if $iTotalFriendRequests > 0}
<a href="{url link='friend.accept'}" class="global_notification_site">{if $iTotalFriendRequests == 1}{phrase var='friend.you_have_1_new_friend_request'}{else}{phrase var='friend.you_have_total_new_friend_requests' total=$iTotalFriendRequests}{/if}</a>
{/if}
{if $iList > 0 && !PHPFOX_IS_AJAX}
<div class="friend_list_holder">
	<div class="item_info">
	</div>
	<div class="item_bar">
		<div class="item_bar_action_holder">
			<a role="button" data-toggle="dropdown" class="item_bar_action"><span>{phrase var='blog.actions'}</span></a>
			<ul class="dropdown-menu">
				<li class="item_delete"><a href="{url link='friend' dlist=$iList}" class="friend_list_delete">{phrase var='friend.delete_list'}</a></li>
				<li><a href="#" class="js_friend_list_edit_name" rel="{$aList.list_id}">{phrase var='friend.edit_name'}</a></li>
				<li{if $aList.is_profile} style="display:none;"{/if}><a href="#" class="friend_list_display_profile" rel="{$iList}">{phrase var='friend.display_on_profile'}</a></li>
				<li{if !$aList.is_profile} style="display:none;"{/if}><a href="#" class="friend_list_remove_profile" rel="{$iList}">{phrase var='friend.remove_from_profile'}</a></li>
				{if count($aFriends)}
				<li><a href="#" class="friend_list_change_order">{phrase var='friend.change_order'}</a></li>
				{/if}
			</ul>
		</div>
	</div>
</div>
{/if}
{if count($aFriends)}
{if !PHPFOX_IS_AJAX}
<form method="post" action="#" id="js_friend_list_order_form">	
	{if $iList > 0}
	<div><input type="hidden" name="list_id" value="{$iList}" /></div>
	{/if}
	<div id="js_friend_sort_holder">
{/if}
	{if ($aFriends)}
		{foreach from=$aFriends item=aFriend name=friend}
		<div id="js_friend_{$aFriend.friend_id}" class="friend_row_holder js_selector_class_{$aFriend.friend_id} user_rows">
			<div><input type="hidden" name="friend_id[]" value="{$aFriend.friend_user_id}" class="js_friend_actual_user_id" /></div>
			<div class="user_rows_image" id="js_image_div_{$aFriend.friend_id}">
				{img id='sJsUserImage_'$aFriend.friend_id'' user=$aFriend suffix='_120_square' max_width=120 max_height=120}
			</div>

			{$aFriend|user:'':'':50}

			<div class="friend_action">
				<a href="javascript:void(0)" class="js_friend_sort_handler"><i class="fa fa-arrows"></i></a>
				<a data-toggle="dropdown"><i class="fa fa-cog"></i></a>
				<ul class="friend_action_drop_down dropdown-menu dropdown-menu-right dropdown-menu-checkmark">
					<li class="friend_action_edit_list" {if empty($aFriend.lists)}style="display:none;"{/if}><a href="#" onclick="$(this).closest('ul').find('.add_to_list:not(.friend_action_edit_list)').toggleClass('hidden'); event.cancelBubble = true; if (event.stopPropagation) event.stopPropagation();return false;">{phrase var='friend.edit_lists'}</a></li>
					<li class="divider" {if empty($aFriend.lists)}style="display:none;"{/if}></li>
					{foreach from=$aFriend.lists name=lists item=aList}
					<li class="add_to_list hidden"><a href="#" rel="{$aList.list_id}|{$aFriend.friend_user_id}"{if $aList.is_active} class="active {if $aList.list_id == $iList}selected{/if}"{/if}><span></span>{$aList.name|clean}</a></li>
					{/foreach}
					<li class="add_to_list divider hidden"></li>
					<li class="item_delete">
						<a href="#" class="friend_action_remove" rel="{$aFriend.friend_id}">{phrase var='friend.remove_this_friend'}</a>
					</li>
				</ul>
			</div>
		</div>
		{/foreach}
		{pager}

	{/if}
	{if !PHPFOX_IS_AJAX}
	<div id="js_view_more_friends"></div>
	{/if}	
{if !PHPFOX_IS_AJAX}
	</div>	
	<div class="p_top_8 js_friend_edit_order js_friend_edit_order_submit">		
		<ul class="table_clear_button">
			<li><input type="submit" value="{phrase var='friend.save_changes'}" class="button btn-primary" /></li>
			<li class="table_clear_ajax"></li>
		</ul>
		<div class="clear"></div>		
	</div>	
</form>
{/if}
{else}
{if !PHPFOX_IS_AJAX}
<div class="extra_info">
	{phrase var='friend.no_friends'}
</div>
{/if}
{/if}