<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Profile
 * @version 		$Id: pic.html.php 7305 2014-05-07 19:35:55Z Fern $
 */

    defined('PHPFOX') or exit('NO DICE!');
?>
<style type="text/css">
    .profiles_banner_bg .cover img.cover_photo
        {l}
        position: relative;
        left: 0;
        top: {$iConverPhotoPosition}px;
    {r}
</style>
<div class="profiles_banner {if isset($aCoverPhoto.server_id)}has_cover{/if}" {if $sCoverDefaultUrl}style="background-image:url({$sCoverDefaultUrl})"{/if}>
	{if isset($aCoverPhoto.server_id)}
	<div class="profiles_banner_bg">
	<div class="cover_bg"></div>
	<div class="cover">
		{img server_id=$aCoverPhoto.server_id path='photo.url_photo' file=$aCoverPhoto.destination suffix='_1024' class="hidden-xs cover_photo"}
		{img server_id=$aCoverPhoto.server_id path='photo.url_photo' file=$aCoverPhoto.destination suffix='_1024' class="visible-xs"}
        <div id="change_cover_function" title="{phrase var='profile.change_cover_photo'}">
            {if Phpfox::getUserId() == $aUser.user_id}
            <ul>
                <li class="dropdown">
                    <a role="button" data-toggle="dropdown">
                        <i class="fa fa-camera"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        {if Phpfox::getUserParam('profile.can_change_cover_photo')}
                        <li role="presentation">
                            <a role="button" id="js_change_cover_photo" onclick="$Core.box('profile.logo', 500); return false;">
                                {if empty($aUser.cover_photo)}{phrase var='user.add_a_cover'}{else}{phrase var='profile.upload_photo'}{/if}
                            </a>
                        </li>
                        {if !empty($aUser.cover_photo)}
                        <li role="presentation" class="visible-lg">
                            <a role="button" onclick="repositionCoverPhoto('user',1); return false;">{phrase var='user.reposition'}</a></li>
                        <li role="presentation">
                            <a role="button" onclick="$('#cover_section_menu_drop').hide(); $.ajaxCall('user.removeLogo'); return false;">{phrase var='profile.remove_cover_photo'}</a></li>
                        {/if}
                        {/if}
                    </ul>
                </li>
            </ul>
            {/if}
        </div>
	</div>
	{/if}
	<div class="cover_shadown"></div>
	<div class="profiles_info">
		<h1>
			<a href="{if isset($aUser.link) && !empty($aUser.link)}{url link=$aUser.link}{else}{url link=$aUser.user_name}{/if}" title="{$aUser.full_name|clean} {if Phpfox::getUserParam('profile.display_membership_info')} &middot; {$aUser.title}{/if}">
				{$aUser.full_name|clean}
			</a>
		</h1>
		<div class="profiles_extra_info">
			{if Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'profile.view_location') && (!empty($aUser.city_location) || !empty($aUser.country_child_id) || !empty($aUser.location))}
			{phrase var='profile.lives_in'} {if !empty($aUser.city_location)}{$aUser.city_location}{/if}
			{if !empty($aUser.city_location) && (!empty($aUser.country_child_id) || !empty($aUser.location))},{/if}
			{if !empty($aUser.country_child_id)}&nbsp;{$aUser.country_child_id|location_child}{/if} {if !empty($aUser.location)}{$aUser.location}{/if} &middot;
			{/if}
			{if isset($aUser.birthdate_display) && is_array($aUser.birthdate_display) && count($aUser.birthdate_display)}
			{foreach from=$aUser.birthdate_display key=sAgeType item=sBirthDisplay}
			{if $aUser.dob_setting == '2'}
			{phrase var='profile.age_years_old' age=$sBirthDisplay}
			{else}
			{phrase var='profile.born_on_birthday' birthday=$sBirthDisplay}
			{/if}
			{/foreach}
			{/if}
			{if Phpfox::getParam('user.enable_relationship_status') && isset($sRelationship) && $sRelationship != ''}&middot; {$sRelationship} {/if}
			{if isset($aUser.category_name)}{$aUser.category_name|convert}{/if}
			{if (isset($aUser.is_friend_request) && $aUser.is_friend_request)}
			<div>
                <span class="pending-friend-request">{phrase var='profile.pending_friend_request'}</span>
                &nbsp;
                {if $aUser.is_friend_request == 2}
                <span class="cancel-friend-request">
                    <a href="javascript:void(0)" class="friend_action_remove" onclick="$.ajaxCall('friend.removePendingRequest', 'id={$aUser.is_friend_request_id}','GET');">
                        {_p var='Cancel request'}
                    </a>
                </span>
                {/if}
            </div>
			{/if}
			{if (!empty($aUser.gender_name))}
			&middot; {$aUser.gender_name}
			{/if}
		</div>
	</div>
	<div class="profile_image">
		<div class="profile_image_holder">
		    {if Phpfox::isModule('photo')}
			{if isset($aUser.user_name)}
			    <a href="{permalink module='photo.album.profile' id=$aUser.user_id title=$aUser.user_name}">{$sProfileImage}</a>
			{else}
			    <a href="{permalink module='photo.album.profile' id=$aUser.user_id}">{$sProfileImage}</a>
			{/if}
		    {else}
			    {$sProfileImage}
		    {/if}
		</div>
		{if Phpfox::getUserId() == $aUser.user_id}
		{literal}
		<script>
			function changingProfilePhoto() {
				if ($('.profile_image_holder').find('i.fa.fa-spin.fa-circle-o-notch').length > 0) {
					$('.profile_image_holder').find('a').show();
					$('.profile_image_holder').find('i.fa.fa-spin.fa-circle-o-notch').remove();
				}
				else {
					$('.profile_image_holder').find('a').hide();
					$('.profile_image_holder').append('<i class="fa fa-circle-o-notch fa-spin"></i>');
				}
			};
		</script>
		{/literal}
		<form class="p_4" method="post" enctype="multipart/form-data" action="#">
			<input title="{phrase var='profile.change_picture'}" type="file" accept="image/*" class="ajax_upload" value="Upload" name="image" data-url="{url link='user.photo'}" data-onstart="changingProfilePhoto">
			<span href="{url link='user.photo'}">{phrase var='profile.change_picture'}</span>
		</form>
		{/if}
	</div>
	{if isset($aCoverPhoto.server_id)}
	</div>
	{/if}
	{if Phpfox::getUserId() == $aUser.user_id}
	<div class="profiles_owner_actions">
		<div class="dropdown">
			<a class="icon_btn" role="button" data-toggle="dropdown">
				<i class="fa fa-cog"></i>
			</a>
			<ul class="dropdown-menu dropdown-menu-right">
				{if Phpfox::getUserParam('profile.can_change_cover_photo') && empty($aUser.cover_photo)}
				<li role="presentation">
					<a role="button" id="js_change_cover_photo" onclick="$Core.box('profile.logo', 500); return false;">
						{phrase var='user.add_a_cover'}
					</a>
				</li>
				{/if}
				<li role="presentation"><a role="link" href="{url link='user.profile'}">{phrase var='profile.edit_profile'}</a></li>
			</ul>
		</div>
	</div>
	{/if}

	{if Phpfox::getUserId() != $aUser.user_id}
	<div class="profile_viewer_actions dropdown">
		{if Phpfox::isUser() && Phpfox::isModule('friend') && Phpfox::getUserParam('friend.can_add_friends') && !$aUser.is_friend && $aUser.is_friend_request !== 2}
		<a class="btn btn-success add_as_friend_button" href="#" onclick="return $Core.addAsFriend('{$aUser.user_id}');" title="{phrase var='profile.add_to_friends'}">
			<i class="fa fa-user-plus"></i>
			<span class="hidden-xs">{if !$aUser.is_friend && $aUser.is_friend_request === 3}{phrase var='profile.confirm_friend_request'}{else}{phrase var='profile.add_to_friends'}{/if}</span>
		</a>
		{/if}

		{if Phpfox::isModule('mail') && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'mail.send_message')}
		<a class="btn btn-default" href="#" onclick="$Core.composeMessage({left_curly}user_id: {$aUser.user_id}{right_curly}); return false;">
			<i class="fa fa-envelope"></i>
			<span class="hidden-xs">{phrase var='profile.send_message'}</span>
		</a>
		{/if}

		{if $bCanPoke && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'poke.can_send_poke')}
		<a class="btn btn-default" href="#" id="section_poke" onclick="$Core.box('poke.poke', 400, 'user_id={$aUser.user_id}'); return false;">
			<i class="fa fa-hand-o-right"></i>
			<span class="hidden-xs" >{phrase var='poke.poke' full_name=''}</span>
		</a>
		{/if}
		{plugin call='profile.template_block_menu_more'}

		{if (Phpfox::getUserBy('profile_page_id') <= 0)
			&& ((Phpfox::getUserParam('user.can_block_other_members') && isset($aUser.user_group_id) && Phpfox::getUserGroupParam('' . $aUser.user_group_id . '', 'user.can_be_blocked_by_others'))
				|| (Phpfox::getUserParam('user.can_feature'))
				|| (Phpfox::getUserParam('core.can_gift_points'))
				|| (Phpfox::isModule('friend') && Phpfox::getUserParam('friend.link_to_remove_friend_on_profile') && isset($aUser.is_friend) && $aUser.is_friend === true)
			)
		}
		<a class="btn btn-default" title="{phrase var='profile.more'}" data-toggle="dropdown">
			<i class="fa fa-caret-down" aria-hidden="true"></i>
		</a>
		<ul class="dropdown-menu dropdown-menu-right">
			{if Phpfox::getUserParam('user.can_block_other_members') && isset($aUser.user_group_id) && Phpfox::getUserGroupParam('' . $aUser.user_group_id . '', 'user.can_be_blocked_by_others')}
			<li><a href="#?call=user.block&amp;height=120&amp;width=400&amp;user_id={$aUser.user_id}" class="inlinePopup js_block_this_user" title="{if $bIsBlocked}{phrase var='profile.unblock_this_user'}{else}{phrase var='profile.block_this_user'}{/if}">{if $bIsBlocked}{phrase var='profile.unblock_this_user'}{else}{phrase var='profile.block_this_user'}{/if}</a></li>
			{/if}
			{if Phpfox::getUserParam('user.can_feature')}
			<li {if !isset($aUser.is_featured) || (isset($aUser.is_featured) && !$aUser.is_featured)} style="display:none;" {/if} class="user_unfeature_member">
			<a href="#" title="{phrase var='profile.un_feature_this_member'}" onclick="$(this).parent().hide(); $(this).parents('.dropdown-menu').find('.user_feature_member:first').show(); $.ajaxCall('user.feature', 'user_id={$aUser.user_id}&amp;feature=0&amp;type=1'); return false;">{phrase var='profile.unfeature'}</a></li>
			<li {if isset($aUser.is_featured) && $aUser.is_featured} style="display:none;" {/if} class="user_feature_member">
			<a href="#" title="{phrase var='profile.feature_this_member'}" onclick="$(this).parent().hide(); $(this).parents('.dropdown-menu').find('.user_unfeature_member:first').show(); $.ajaxCall('user.feature', 'user_id={$aUser.user_id}&amp;feature=1&amp;type=1'); return false;">{phrase var='profile.feature'}</a></li>
			{/if}
			{if Phpfox::getUserParam('core.can_gift_points')}
			<li>
				<a href="#?call=core.showGiftPoints&amp;height=120&amp;width=400&amp;user_id={$aUser.user_id}" class="inlinePopup js_gift_points" title="{phrase var='core.gift_points'}">
					{phrase var='core.gift_points'}
				</a>
			</li>
			{/if}
			{if Phpfox::isModule('friend') && Phpfox::getUserParam('friend.link_to_remove_friend_on_profile') && isset($aUser.is_friend) && $aUser.is_friend === true}
			<li>
				<a href="#" onclick="if (confirm('{phrase var='core.are_you_sure'}'))$.ajaxCall('friend.delete', 'friend_user_id={$aUser.user_id}&reload=1'); return false;">
					{phrase var='friend.remove_friend'}
				</a>
			</li>
			{/if}
			{plugin call='profile.template_block_menu'}
		</ul>
		{/if}
	</div>
	{/if}

</div>
<div class="profiles_menu set_to_fixed" data-class="profile_menu_is_fixed">
	<ul class="container-fluid">
		<li class="profile_menu_image_holder">
			<div class="profile_menu_image">
				{if Phpfox::isModule('photo')}
				{if isset($aUser.user_name)}
				<a href="{permalink module='photo.album.profile' id=$aUser.user_id title=$aUser.user_name}">{$sProfileImage}</a>
				{else}
				<a href="{permalink module='photo.album.profile' id=$aUser.user_id}">{$sProfileImage}</a>
				{/if}
				{else}
				{$sProfileImage}
				{/if}
			</div>
		</li>
		<li><a href="{url link=$aUser.user_name}">{phrase var='profile.profile'}</a></li>
		<li><a href="{url link=''$aUser.user_name'.info'}">{phrase var='profile.info'}</a></li>
		<li class="hidden-xs"><a href="{url link=''$aUser.user_name'.friend'}">{phrase var='profile.friends'}{if $aUser.total_friend > 0}<span>{$aUser.total_friend}</span>{/if}</a></li>
		{if $aProfileLinks}
		<li class="dropdown">
			<a role="button" data-toggle="dropdown" class="explore">
				<i class="fa fa-ellipsis-h"></i>
			</a>
			<ul class="dropdown-menu dropdown-menu-left">
                <li class="visible-xs"><a href="{url link=''$aUser.user_name'.friend'}">{phrase var='profile.friends'}{if $aUser.total_friend > 0}<span class="badge_number">{$aUser.total_friend}</span>{/if}</a></li>
				{foreach from=$aProfileLinks item=aProfileLink}
					<li class="{if isset($aProfileLink.is_selected)} active{/if}">
						<a href="{url link=$aProfileLink.url}" class="ajax_link">{$aProfileLink.phrase}{if isset($aProfileLink.total)}<span class="badge_number">{$aProfileLink.total|number_format}</span>{/if}</a>
					</li>
				{/foreach}
			</ul>
		</li>
		{/if}
	</ul>
</div>
<div class="clear"></div>
<div class="js_cache_check_on_content_block" style="display:none;"></div>
<div class="js_cache_profile_id" style="display:none;">{$aUser.user_id}</div>
<div class="js_cache_profile_user_name" style="display:none;">{if isset($aUser.user_name)}{$aUser.user_name}{/if}</div>