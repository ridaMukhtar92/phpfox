<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: small.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="block">
	<div class="title">
		<a href="{url link=''$aSubject.user_name'.friend'}">
			{phrase var='friend.friends'}
			<span>{$aUser.total_friend}</span>
		</a>
	</div>
	<div class="content" id="js_block_content_profile_friend">
		<div class="user_rows_mini">
			{foreach from=$aFriends key=iKey name=friend item=aUser}
				{template file='user.block.rows'}
			{/foreach}
		</div>
	</div>
</div>

{foreach from=$aFriendLists item=aLists}
<div class="block">
	<div class="title">
		<a href="{url link=''$aSubject.user_name'.friend' list=$aLists.list_id}">
			{$aLists.name|clean}
			<span>{$aLists.friends_total}</span>
		</a>
	</div>
	<div class="content" id="js_block_content_profile_friend">
		<div class="user_rows_mini">
			{foreach from=$aLists.friends key=iKey name=friend item=aUser}
				{template file='user.block.rows'}
			{/foreach}
		</div>
	</div>
</div>
{/foreach}