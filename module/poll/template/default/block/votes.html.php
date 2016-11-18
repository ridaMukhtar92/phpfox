<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if $page == 1 }
<div style="max-height:300px;" class="label_flow">
	{/if}
	{foreach from=$aVotes name=votes item=aResult}
	<div class="{if is_int($phpfox.iteration.votes/2)}row1{else}row2{/if}{if $phpfox.iteration.votes == 1} row_first{/if}">
		<div class="poll_user_image go_left" style="width:52px; text-align:center;">
			{img user=$aResult suffix='_50_square' max_width=50 max_height=50}	
		</div>
		<div style="margin-left:65px;vertical-align:middle;height:40px">
			{phrase var='poll.user_info_voted_answer_on_time_stamp' user_info=$aResult|user answer=$aResult.answer|clean time_stamp=$aResult.time_stamp|date:'poll.poll_view_time_stamp'}
		</div>
		<div class="clear"></div>
	</div>
	{/foreach}
	{if $hasMore}
	{pager}
	{/if}
	{if $page == 1 }
</div>
{/if}