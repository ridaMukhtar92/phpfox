<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Forum
 * @version 		$Id: $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{if !isset($bIsPostUpdateText)}
<article class="forum_post_article {if isset($bIsSearch)}is_search{/if}">
<div id="post{$aPost.post_id}" class="moderation_row">
{/if}
	<div class="js_post_count"><a name="post{$aPost.post_id}"></a></div>
	<div class="forum_outer">
		<div class="forum_user_info_holder">
			<div class="forum_user_info_holder_inner">
				<div class="forum_user_info_holder_inner_image"></div>
				<div class="forum_user_info">
					<div class="forum_thread_photo">
						{img user=$aPost suffix='_50_square'}
					</div>
					<div class="forum_thread_user">
						{if isset($aPost.cache_name) && $aPost.cache_name}
							<span class="user_profile_link_span"><a href="#">{$aPost.cache_name|clean}</a></span>
						{else}
							{$aPost|user:'':'':25}
						{/if}
					</div>
					{if !isset($bIsSearch)}
					<div class="extra_info">
						{$aPost.time_stamp|convert_time:'forum.forum_user_time_stamp'}
					</div>
					{/if}

					{plugin call='forum.template_block_post_1'}
				</div>
			</div>

			{if (Phpfox::getUserParam('forum.can_approve_forum_thread') || Phpfox::getUserParam('forum.can_delete_other_posts'))}
				<a href="#{$aPost.post_id}" class="moderate_link" rel="forumpost" data-id="mod">{phrase var='forum.moderate'}</a>
			{/if}

		</div>
		<div class="forum_main">
			{plugin call='forum.template_block_post_2'}
			{if isset($bIsSearch)}
			<div class="forum_search_post">
				<ul class="extra_info_middot"><li>{phrase var='forum.posted_in'} "<a href="{permalink module='forum.thread' id=$aPost.thread_id title=$aPost.thread_title}">{$aPost.thread_title|clean}</a>"</li><li>&middot;</li><li>{$aPost.time_stamp|convert_time}</li></ul>
			</div>
			{/if}
			<div class="forum_content{if (isset($aPost.view_id) && $aPost.view_id && !isset($sView)) || (isset($sView) && $sView != 'pending-post')} row_moderate{/if} item_view_content" id="js_post_edit_text_{$aPost.post_id}">
				{$aPost.text|parse|split:55}
			</div>
			{if Phpfox::getUserParam('core.can_view_update_info') && !empty($aPost.update_user)}
			<div class="extra_info p_10">
				{$aPost.last_update_on}
			</div>
			{/if}
			{if isset($aPost.attachments)}
				{module name='attachment.list' sType=forum attachments=$aPost.attachments}
			{/if}

			{plugin call='forum.template_block_post_after_content'}

			{if !isset($phpfox.iteration.posts)}
				{if Phpfox::isModule('tag') && isset($aThread.tag_list)}
					{module name='tag.item' sType='forum' sTags=$aThread.tag_list item_id=$aThread.thread_id iUserId=$aThread.user_id}
				{/if}
			{/if}

			{if isset($aPost.aFeed)}
			<div class="forum_time_stamp">
				{if Phpfox::isModule('feed')}
					{module name='feed.comment' aFeed=$aPost.aFeed}
				{else}
					<div class="js_feed_comment_border">
						<ul>
							{if !isset($aPost.aFeed.feed_mini)}
								{if !empty($aPost.aFeed.feed_icon)}
									<li><img src="{$aPost.aFeed.feed_icon}" alt="" /></li>
								{/if}
								{if isset($aPost.aFeed.time_stamp)}
									<li class="feed_entry_time_stamp">
										<a href="{$aPost.aFeed.feed_link}" class="feed_permalink">{$aPost.aFeed.time_stamp|convert_time:'core.global_update_time'}</a>{if !empty($aPost.aFeed.app_link)} {phrase var='forum.via'} {$aPost.aFeed.app_link}{/if}
									</li>

									<li><span> &middot;</span></li>
								{/if}

								{if $aPost.aFeed.privacy > 0 && $aPost.aFeed.user_id == Phpfox::getUserId()}
									<li><div class="js_hover_title">{img theme='layout/privacy_icon.png' alt=$aPost.aFeed.privacy}<span class="js_hover_info">2 {$aPost.aFeed.privacy|privacy_phrase}</span></div></li>

									{if Phpfox::isModule('like')}
										<li><span>&middot;</span></li>
									{/if}
								{/if}
							{/if}

							{if Phpfox::isModule('like') && isset($aPost.Feed.like_type_id)}
								{if isset($aPost.aFeed.like_item_id)}
									{module name='like.link' like_type_id=$aPost.aFeed.like_type_id like_item_id=$aPost.aFeed.like_item_id like_is_liked=$aPost.aFeed.feed_is_liked}
								{else}
									{module name='like.link' like_type_id=$aPost.aFeed.like_type_id like_item_id=$aPost.aFeed.item_id like_is_liked=$aPost.aFeed.feed_is_liked}
								{/if}

								<li><span>&middot;</span></li>

							{/if}

							{if Phpfox::isModule('comment') && (isset($aPost.aFeed.comment_type_id) && $aPost.aFeed.can_post_comment) || (!isset($aPost.aFeed.comment_type_id) && isset($aPost.aFeed.total_comment))}
								<li>
									<a href="{$aPost.aFeed.feed_link}add-comment/" class="{if (isset($sFeedType) && $sFeedType == 'mini') || (!isset($aPost.aFeed.comment_type_id) && isset($aPost.aFeed.total_comment))}{else}js_feed_entry_add_comment no_ajax_link{/if}">{phrase var='feed.comment'}</a>
								</li>
								{if (Phpfox::isModule('share') && !isset($aPost.aFeed.no_share)) || (isset($aPost.aFeed.report_module) && isset($aPost.aFeed.force_report))}
									<li><span>&middot;</span></li>
								{/if}
							{/if}
							{if Phpfox::isModule('share') && !isset($aPost.aFeed.no_share)}
								{module name='share.link' type='feed' display='menu' url=$aPost.aFeed.feed_link title=$aPost.aFeed.feed_title}

								{if Phpfox::isModule('report')}
									<li><span>&middot;</span></li>
								{/if}
							{/if}

							{if Phpfox::isModule('report') && isset($aPost.aFeed.report_module) && isset($aPost.aFeed.force_report)}

								<li><a href="#?call=report.add&amp;height=100&amp;width=400&amp;type={$aPost.aFeed.report_module}&amp;id={$aPost.aFeed.item_id}" class="inlinePopup activity_feed_report" title="{$aPost.aFeed.report_phrase}">{phrase var='forum.report'}</a></li>
							{/if}

						</ul>

							{plugin call='core.template_block_comment_border_new'}

					</div>
				{/if}
			</div>
			{/if}
		</div>
	</div>
{if !isset($bIsPostUpdateText)}
</div>
</article>
{/if}
