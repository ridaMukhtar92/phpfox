<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Event
 * @version 		$Id: index.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{if !count($aEvents)}
<div class="extra_info">
	{phrase var='event.no_events_found'}
</div>
{else}
{if ! PHPFOX_IS_AJAX }
<div class="collection-stage">
	{/if}
{foreach from=$aEvents key=sDate item=aGroups}
				{foreach from=$aGroups name=events item=aEvent}
				<div class="collection-item-stage">
			{item name='Event'}
				<div id="js_event_item_holder_{$aEvent.event_id}" class="event_large_item image_load js_event_parent {if empty($aEvent.image_path)}no_image{else}has_image{/if}">
					<header class="clearfix">
						<div class="event_large_date">
							<div class="day">{$aEvent.start_time_short_day}</div>
							<div class="month">{$aEvent.start_time_short_month}</div>
						</div>
						<div class="event_large_time">
							<div class="time">{$aEvent.start_time_phrase_stamp}</div>
						</div>
						<div class="event_large_title">
							<h1 itemprop="name"><a href="{$aEvent.url}" class="link" itemprop="url">{$aEvent.title|clean}</a></h1>
							<div>{phrase var='event.by'} {$aEvent|user}</div>
						</div>
					</header>

					<div class="event_large_image" {if $aEvent.image_path}style="background-image:url({img server_id=$aEvent.server_id title=$aEvent.title path='event.url_image' file=$aEvent.image_path suffix='' return_url=true})"{/if}  itemprop='image'>
					</div>
					{if ($aEvent.user_id == Phpfox::getUserId() && Phpfox::getUserParam('event.can_edit_own_event')) || Phpfox::getUserParam('event.can_edit_other_event')
					|| ($aEvent.view_id == 0 && ($aEvent.user_id == Phpfox::getUserId() && Phpfox::getUserParam('event.can_edit_own_event')) || Phpfox::getUserParam('event.can_edit_other_event'))
					|| ($aEvent.user_id == Phpfox::getUserId() && Phpfox::getUserParam('event.can_edit_own_event')) || Phpfox::getUserParam('event.can_edit_other_event')
					|| ($aEvent.user_id == Phpfox::getUserId() && Phpfox::getUserParam('event.can_delete_own_event')) || Phpfox::getUserParam('event.can_delete_other_event')
					|| (defined('PHPFOX_IS_PAGES_VIEW') && defined('PHPFOX_PAGES_ITEM_TYPE') && Phpfox::getService(PHPFOX_PAGES_ITEM_TYPE)->isAdmin('' . $aPage.page_id . ''))
					}
					<div class="row_edit_bar_parent">
						<div class="row_edit_bar">
							<a role="button" class="row_edit_bar_action" data-toggle="dropdown">
								<i class="fa fa-action"></i>
							</a>
							<ul class="dropdown-menu">
								{template file='event.block.menu'}
							</ul>
						</div>
					</div>
					{/if}
					{if Phpfox::getUserParam('event.can_approve_events') || Phpfox::getUserParam('event.can_delete_other_event')}<a href="#{$aEvent.event_id}" class="moderate_link" rel="event" data-id="mod">{phrase var='event.moderate'}</a>{/if}
				</div>
			{/item}
			</div>
			{/foreach}
{/foreach}
<!--		end foreach2-->
	{if ! PHPFOX_IS_AJAX }
	</div>
		{/if}
{if Phpfox::getUserParam('event.can_approve_events') || Phpfox::getUserParam('event.can_delete_other_event')}
{moderation}
{/if}

{pager}
{/if}
