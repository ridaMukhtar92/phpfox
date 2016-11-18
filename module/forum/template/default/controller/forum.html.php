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

{if !PHPFOX_IS_AJAX}
{template file='forum.block.search'}
{/if}

{if !PHPFOX_IS_AJAX && count($aThreads) && !$bIsSearch && Phpfox::getParam('forum.enable_rss_on_threads') && Phpfox::isModule('rss')}
<div class="forum_header_menu">
	<a href="{if $aCallback === null}{url link='forum.rss' forum=$aForumData.forum_id}{else}{url link='forum.rss' pages=$aCallback.item_id}{/if}" title="{phrase var='forum.subscribe_to_this_forum'}" class="no_ajax_link rss_link">
		<i class="fa fa-rss-square"></i>
	</a>
</div>
{/if}

{if !PHPFOX_IS_AJAX && $aCallback === null && !$bIsSearch}
	{template file='forum.block.entry'}
{/if}

{if !PHPFOX_IS_AJAX && !$bIsSearch && count($aAnnouncements)}
	<div class="forum_section_header announcements">
		<div>{phrase var='forum.announcements'}</div>
	</div>
	{foreach from=$aAnnouncements item=aThread}
		{template file='forum.block.thread-entry'}
	{/foreach}
{/if}

{if count($aThreads)}
	{if !PHPFOX_IS_AJAX}
	{if isset($bResult) && $bResult}
	<div class="forum_section_header posts">
		<div>{phrase var='forum.posts'}</div>
	</div>
	{else}
	<div class="forum_section_header threads">
		<div>{phrase var='forum.threads'}</div>
	</div>
	{/if}
	{/if}
	{if isset($bResult) && $bResult}
		{foreach from=$aThreads item=aPost}
			{template file='forum.block.post'}
		{/foreach}
	{else}
		{foreach from=$aThreads item=aThread}
			{template file='forum.block.thread-entry'}
		{/foreach}
	{/if}

	{pager}
{/if}

{if !isset($bIsPostSearch) && (Phpfox::getUserParam('forum.can_approve_forum_thread') || Phpfox::getUserParam('forum.can_delete_other_posts'))}
	{moderation}
{/if}
