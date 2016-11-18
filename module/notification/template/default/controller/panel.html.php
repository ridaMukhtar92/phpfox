<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{$sScript}
{if $aNotifications}
<ul class="panel_rows">
	{foreach from=$aNotifications name=notifications item=aNotification}
	<li id="js_notification_{$aNotification.notification_id}">
		<div class="notification_delete">
			<a href="#" class="js_hover_title noToggle" onclick="$.ajaxCall('notification.delete', 'id={$aNotification.notification_id}'); return false;">
				<span class="fa fa-times"></span>
				<span class="js_hover_info">
					{phrase var='notification.delete_this_notification'}
				</span>
			</a>
		</div>
		<a href="{$aNotification.link}" class="{if !$aNotification.is_seen} is_new{/if}">
			{if isset($aNotification.custom_icon)}
			<i class="fa {$aNotification.custom_icon}"></i>
			{else}
			<div class="panel_rows_image">
				{img user=$aNotification max_width='50' max_height='50' suffix='_50_square' no_link=true}
			</div>
			{/if}
			<div class="panel_rows_content">
				<div class="panel_focus">
					{$aNotification.message}
					{if isset($aNotification.custom_image)}
					{$aNotification.custom_image}
					{/if}
				</div>
				<div class="panel_rows_time">
					{$aNotification.time_stamp|convert_time}
				</div>
			</div>
		</a>
	</li>
	{/foreach}
</ul>
<div class="panel_actions">
	<a href="#" onclick="$('.js_notification_trash > i').removeClass('fa-trash').addClass('fa-circle-o-notch').addClass('fa-spin'); $(this).ajaxCall('notification.removeAll'); return false;" class="js_hover_title js_notification_trash"><i class="fa fa-trash"></i><span class="js_hover_info">{phrase var='notification.remove_all_notifications'}</span></a>
</div>
{else}
<div class="message">
    {phrase var='notification.no_new_notifications'}
</div>
{/if}