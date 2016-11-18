<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<div class="item_view">
		<div class="item_info">
			{phrase var='photo.time_stamp_by_full_name' time_stamp=$aForms.time_stamp|convert_time full_name=$aForms|user:'':'':35:'':'author'}
			{if !empty($aForms.album_id)} {phrase var='photo.in'} <a href="{$aForms.album_url}">{$aForms.album_title|convert|clean|split:45|shorten:75:'...'}</a>{/if}
		</div>
		{if (Phpfox::getUserParam('photo.can_edit_own_photo') && $aForms.user_id == Phpfox::getUserId()) || Phpfox::getUserParam('photo.can_edit_other_photo')
		|| (Phpfox::getUserParam('photo.can_delete_own_photo') && $aForms.user_id == Phpfox::getUserId()) || Phpfox::getUserParam('photo.can_delete_other_photos')
		}
		<div class="item_bar">
			<div class="dropup item_bar_action_holder">
				{if $aForms.view_id == '1' && Phpfox::getUserParam('photo.can_approve_photos')}
				<a href="#" class="item_bar_action approve btn-primary" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('photo.approve', 'inline=true&amp;id={$aForms.photo_id}'); return false;" title="{phrase var='photo.approve'}"></a>
				{/if}
				<a role="button" data-toggle="dropdown" class="item_bar_action"><span>{phrase var='photo.actions'}</span></a>
				<ul class="dropdown-menu">
					{template file='photo.block.menu'}
				</ul>
			</div>
		</div>
		{/if}

	{if Phpfox::isModule('tag') && isset($aForms.tag_list)}
	{module name='tag.item' sType='photo' sTags=$aForms.tag_list iItemId=$aForms.photo_id iUserId=$aForms.user_id}
	{/if}
	<div class="item_detail_wrapper">
		<a class="button btn-sm btn-primary pull-right" href="javascript:void(0);" onclick="$('#js_photo_item_detail').slideToggle();">{phrase var='photo.image_details'} <i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
		<div id="js_photo_item_detail" hidden>
			{module name='photo.detail'}
		</div>
	</div>
	<div class="item_content">
		{$aForms.description|clean}
	</div>

	<div class="js_moderation_on">
		{module name='feed.comment'}
	</div>

</div>
<script type="text/javascript">
	var bChangePhoto = true;
	var aFeedPhotos = {$sFeedPhotos};
	$Behavior.tagPhoto = function() {l} $Core.photo_tag.init({l}{$sPhotoJsContent}{r}); {r};
	$Behavior.removeTagBox = function()
	{l}
	{literal}
	if ($('#noteform').length > 0)$('#noteform').hide(); if ($('#js_photo_view_image').length > 0 && typeof $('#js_photo_view_image').imgAreaSelect == 'function')$('#js_photo_view_image').imgAreaSelect({ hide: true });
	{/literal}
	{r};
	
	
	$Behavior.removeImgareaselectBox = function()
	{l}
	{literal}
	if ($('body#page_photo_view').length == 0 || ($('body#page_photo_view').length > 0 && bChangePhoto == true)) {
		bChangePhoto = false;
		$('.imgareaselect-outer').hide();
		$('.imgareaselect-selection').each(function() {
			$(this).parent().hide();
		});
	}
	{/literal}
	{r};
</script>