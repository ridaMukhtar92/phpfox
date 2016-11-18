<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: pending.html.php 3642 2011-12-02 10:01:15Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if count($aPendingRequests)}
<div class="clearfix">
{foreach from=$aPendingRequests name=friend item=aFriend}
		<div class="friend_row_holder user_rows">
			<div class="user_rows_image">
				{img user=$aFriend suffix='_120_square' max_width=120 max_height=120}
			</div>
			{$aFriend|user}
			<div class="friend_action" title="{phrase var='user.delete'}">
				<div class="js_friend_sort_handler js_friend_edit_order"></div>
				<a href="{url link='friend.pending' id=$aFriend.request_id}" class="friend_action_remove js_hover_title"><i class="fa fa-remove"></i></a>
			</div>			
		</div>
{/foreach}
</div>
{pager}
{else}
<div class="extra_info">
	{phrase var='friend.there_are_no_pending_friends_requests'}
</div>
{/if}