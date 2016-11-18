<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Forum
 * @version 		$Id: index.html.php 4074 2012-03-28 14:02:40Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if !PHPFOX_IS_AJAX}
{template file='forum.block.search'}
{if Phpfox::isUser()}
<div class="m_top_15">
	<div class="dropdown pull-right">
		<a href="#" class="button btn-sm" data-toggle="dropdown">{phrase var='forum.quick_links'} <i class="fa fa-chevron-down"></i></a>
		<ul class="dropdown-menu dropdown-menu-right">
			<li><a href="{url link='forum.read'}">{phrase var='forum.mark_forums_read'}</a></li>
			<li><a href="{url link='forum.search' view='new'}">{phrase var='forum.new_posts'}</a></li>
			<li><a href="{url link='forum.search' view='my-thread'}">{phrase var='forum.my_threads'}</a></li>
			<li><a href="{url link='forum.search' view='subscribed'}">{phrase var='forum.subscribed_threads'}</a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>
{/if}
{/if}

{if !count($aForums)}
<div class="extra_info">
	{phrase var='forum.no_forums_have_been_created'}
	{if Phpfox::getUserParam('forum.can_add_new_forum')}
	<ul class="action">
		<li><a href="{url link='admincp.forum.add'}" class="no_ajax">{phrase var='forum.create_a_new_forum'}</a></li>
	</ul>
	{/if}
</div>
{else}
	{template file='forum.block.entry'}
{/if}