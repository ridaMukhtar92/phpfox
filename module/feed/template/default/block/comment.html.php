<?php
defined('PHPFOX') or exit('NO DICE!');
?>

{if (isset($showOnlyComments))}
{if Phpfox::isModule('comment') && (isset($aFeed.comments) && count($aFeed.comments))}
<a href="{url link='feed.comments'}?type={$aFeed.type_id}&id={$aFeed.item_id}&page={$nextIteration}{if defined('PHPFOX_FEED_STREAM_MODE')}&stream-mode=1{/if}" class="load_more_comments ajax"  onclick="$(this).addClass('active');"><i class="fa fa-spin fa-circle-o-notch"></i><span>{phrase var='comment.view_previous_comments'}</span></a>
{foreach from=$aFeed.comments name=comments item=aComment}
{template file='comment.block.mini'}
{/foreach}
{/if}
{else}
	{if isset($bIsViewingComments) && $bIsViewingComments}
		<div id="comment-view"><a name="#comment-view"></a></div>
		<div class="message js_feed_comment_border">
			{phrase var='comment.viewing_a_single_comment'}
			<a href="{$aFeed.feed_link}">{phrase var='comment.view_all_comments'}</a>
		</div>
		<script>
			{literal}
			$Ready(function() {
				var c = $('#comment-view');
				if (c.length && !c.hasClass('completed') && c.is(':visible')) {
					c.addClass('completed');
					$("html, body").animate({ scrollTop: (c.offset().top - 80) });
				}
			});
			{/literal}
		</script>
	{/if}

	{if isset($sFeedType)}
		<div class="js_parent_feed_entry parent_item_feed">
	{/if}

<div class="js_feed_comment_border">
    {plugin call='feed.template_block_comment_border'}

<div id="js_feed_like_holder_{$aFeed.type_id}_{$aFeed.item_id}" class="comment_mini_content_holder{if (isset($aFeed.is_app) && $aFeed.is_app && isset($aFeed.app_object))} _is_app{/if}"{if (isset($aFeed.is_app) && $aFeed.is_app && isset($aFeed.app_object))} data-app-id="{$aFeed.app_object}"{/if}>
        <div class="comment_mini_content_holder_icon"{if isset($aFeed.marks) || (isset($aFeed.likes) && is_array($aFeed.likes)) || (isset($aFeed.total_comment) && $aFeed.total_comment > 0)}{else}{/if}></div>
			<div class="comment_mini_content_border">

				<div class="comment_mini_content_commands">
					{if isset($aFeed.like_type_id) && !(isset($aFeed.disable_like_function) && $aFeed.disable_like_function)}
					<div class="feed_like_link">
						{if isset($aFeed.like_item_id)}
						{module name='like.link' like_type_id=$aFeed.like_type_id like_item_id=$aFeed.like_item_id like_is_liked=$aFeed.feed_is_liked}
						{else}
						{module name='like.link' like_type_id=$aFeed.like_type_id like_item_id=$aFeed.item_id like_is_liked=$aFeed.feed_is_liked}
						{/if}
					</div>
					{/if}

					{plugin call='feed.template_block_comment_commands_1'}

					{if isset($aFeed.like_type_id) && !(isset($aFeed.disable_like_function) && $aFeed.disable_like_function)}
					<div class="js_comment_like_holder" id="js_feed_like_holder_{$aFeed.feed_id}">
						<div id="js_like_body_{$aFeed.feed_id}">
							{template file='like.block.display'}
						</div>
					</div>
					{/if}

					{plugin call='feed.template_block_comment_commands_2'}

					{if !isset($aFeed.feed_mini)}
					<div class="feed_options_holder">
						<a role="button" data-toggle="dropdown" href="#" class="feed_options"></a>
						{template file='feed.block.link'}
					</div>
					{/if}
					{if Phpfox::isModule('share') && !isset($aFeed.no_share) && !empty($aFeed.type_id) && (!isset($bGroupIsShareable) || $bGroupIsShareable)}
					<div class="feed_comment_share_holder">
						{assign var=empty value=false}
						{if $aFeed.privacy == '0' || $aFeed.privacy == '1' || $aFeed.privacy == '2'}
						{module name='share.link' type='feed' display='menu_btn' url=$aFeed.feed_link title=$aFeed.feed_title sharefeedid=$aFeed.item_id sharemodule=$aFeed.type_id}
						{else}
						{module name='share.link' type='feed' display='menu_btn' url=$aFeed.feed_link title=$aFeed.feed_title}
						{/if}
					</div>
					{/if}
					{plugin call='feed.template_block_comment_commands_3'}
				</div>
				{if  Phpfox::isModule('comment') && Phpfox::getParam('feed.allow_comments_on_feeds')}
		    	<div id="js_feed_comment_post_{$aFeed.feed_id}" class="js_feed_comment_view_more_holder">
					
		{if isset($aFeed.comments) && count($aFeed.comments)}
		<div>
			<div class="comment_pager_holder" id="js_feed_comment_pager_{$aFeed.type_id}{$aFeed.item_id}">
				{if Phpfox::isModule('comment') && $aFeed.total_comment > Phpfox::getParam('comment.comment_page_limit')}
				<a href="{url link='feed.comments'}?type={$aFeed.type_id}&id={$aFeed.item_id}&page=2{if defined('PHPFOX_FEED_STREAM_MODE')}&stream-mode=1{/if}" class="load_more_comments ajax"  onclick="$(this).addClass('active');"><i class="fa fa-spin fa-circle-o-notch"></i><span>{phrase var='comment.view_previous_comments'}</span></a>
				{/if}
			</div>
			<div id="js_feed_comment_view_more_{$aFeed.feed_id}"{if isset($sFeedType) &&  $sFeedType == 'view'}{else} class="comment-limit" data-limit="{if ($thisLimit = Phpfox::getParam('comment.total_comments_in_activity_feed'))}{$thisLimit}{/if}"{/if}>
			{foreach from=$aFeed.comments name=comments item=aComment}
				{template file='comment.block.mini'}
			{/foreach}
			</div><!-- // #js_feed_comment_view_more_{$aFeed.feed_id} -->
		</div>
		{else}
			<div id="js_feed_comment_view_more_{$aFeed.feed_id}"></div><!-- // #js_feed_comment_view_more_{$aFeed.feed_id} -->
		{/if}
		</div><!-- // #js_feed_comment_post_{$aFeed.feed_id} -->		
		{/if}		
		
		{if isset($sFeedType) &&  $sFeedType == 'mini'}

		{else}
		{if Phpfox::isModule('comment') 
			&& isset($aFeed.comment_type_id)
            && Phpfox::getUserParam('comment.can_post_comments')
			&& Phpfox::getParam('feed.allow_comments_on_feeds') 
			&& Phpfox::isUser() 
			&& $aFeed.can_post_comment
			&& Phpfox::getUserParam('feed.can_post_comment_on_feed')
            && (!isset($bIsGroupMember) || $bIsGroupMember)
		}
		{if Phpfox::isModule('captcha') && Phpfox::getUserParam('captcha.captcha_on_comment')}
		{module name='captcha.form' sType='comment' captcha_popup=true}
		{/if}
		<div class="js_feed_comment_form" {if isset($sFeedType) &&  $sFeedType == 'view'} id="js_feed_comment_form_{$aFeed.feed_id}"{/if}>
			<div class="js_comment_feed_textarea_browse"></div>
			<div class="{if isset($sFeedType) &&  $sFeedType == 'view'} feed_item_view{/if} comment_mini comment_mini_end">
				<form method="post" action="#" class="js_comment_feed_form">
					{if (isset($aFeed.is_app) && $aFeed.is_app && isset($aFeed.app_object))}
					<div><input type="hidden" name="val[app_object]" value="{$aFeed.app_object}" /></div>
					{/if}
					<div><input type="hidden" name="val[type]" value="{$aFeed.comment_type_id}" /></div>			
					<div><input type="hidden" name="val[item_id]" value="{$aFeed.item_id}" /></div>
					<div><input type="hidden" name="val[parent_id]" value="0" class="js_feed_comment_parent_id" /></div>
					<div><input type="hidden" name="val[is_via_feed]" value="{$aFeed.feed_id}" /></div>
					{if defined('PHPFOX_IS_THEATER_MODE')}
					<div><input type="hidden" name="ajax_post_photo_theater" value="1" /></div>	
					{/if}
					{if Phpfox::isUser()}
					<div class="comment_mini_image"{if isset($sFeedType) &&  $sFeedType == 'view'} {else}style="display:none;"{/if}>
					{img user=$aGlobalUser suffix='_50_square' max_width='32' max_height='32'}
					</div>				
					{/if}	
					<div class="{if isset($sFeedType) &&  $sFeedType == 'view'}comment_mini_content {/if}comment_mini_textarea_holder">
						<div><input type="hidden" name="val[default_feed_value]" value="{phrase var='feed.write_a_comment'}" /></div>						
						<div class="js_comment_feed_value">{phrase var='feed.write_a_comment'}</div>
						<textarea cols="60" rows="4" name="val[text]" class="js_comment_feed_textarea" id="js_feed_comment_form_textarea_{$aFeed.feed_id}" placeholder="{phrase var='feed.write_a_comment'}"></textarea>
						<div class="js_feed_comment_process_form"><i class="fa fa-spin fa-circle-o-notch"></i></div>
					</div>
				</form>
			</div>
		</div>
		{/if}		
		{/if}
	</div><!-- // .comment_mini_content_border -->
</div><!-- // .comment_mini_content_holder -->
</div>
{if isset($sFeedType)}
</div>
{/if}
{/if}