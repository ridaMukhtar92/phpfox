<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: suggestion.html.php 1320 2009-12-15 14:29:49Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if !count($aSuggestions)}
<div class="extra_info">
	{phrase var='friend.we_are_unable_to_find_any_friends_to_suggest_at_this_time_once_we_do_you_will_be_notified_within_our_dashboard'}
</div>
{else}
<div class="main_break"></div>
<div class="clearfix js_suggestion_wrapper">
{foreach from=$aSuggestions name=suggestion item=aSuggestion}
<div class="js_suggestion_parent user_rows" id="js_suggestion_parent_{$aSuggestion.user_id}">
	<div class="user_rows_image" id="js_image_div_{$aSuggestion.user_id}">
		{img user=$aSuggestion suffix='_120_square' max_width=120 max_height=120}
	</div>

	{$aSuggestion|user:'':'':50}

	<div class="friend_action">
		<a data-toggle="dropdown"><i class="fa fa-cog"></i></a>
		<ul class="dropdown-menu dropdown-menu-right dropdown-menu-checkmark">
			<li>
				<a href="#" onclick="$(this).parents('.js_suggestion_parent:first').hide(); $.ajaxCall('friend.removeSuggestion', 'user_id={$aSuggestion.user_id}'); return false;" title="{phrase var='friend.hide_this_suggestion'}">{phrase var='friend.hide_this_suggestion'}</a>
			</li>
			<li>
				<a href="#?call=friend.request&amp;user_id={$aSuggestion.user_id}&amp;width=420&amp;height=250&amp;suggestion_page=true" class="inlinePopup" title="{phrase var='profile.add_to_friends'}">{phrase var='friend.add_to_friends'}</a>
			</li>
		</ul>
	</div>
</div>

{if is_int($phpfox.iteration.suggestion / 3)}
<div class="clear"></div>
{/if}
{/foreach}
</div>
<div class="clear"></div>
{/if}