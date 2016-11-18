<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Poll
 * @version 		$Id: entry.html.php 5074 2012-12-06 10:37:26Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if isset($bIsViewingPoll)}
    <div class="item_info">
		<span>{$aPoll.time_stamp|convert_time:'poll.poll_view_time_stamp'}</span>
		<span>&middot;</span>
		<span>{phrase var='poll.by'} {$aPoll|user}</span>
    </div>

{if $aPoll.image_path}
<div class="item_banner image_load" data-src="{img server_id=$aPoll.server_id title=$aPoll.question path='poll.url_image' file=$aPoll.image_path suffix='' return_url=true}"></div>
{/if}
    
	{if isset($bIsViewingPoll) && (isset($aPoll.view_id) && !isset($bDesign) && $aPoll.view_id == 1)}
	<div class="message js_moderation_off" id="js_approve_message">
		{phrase var='poll.this_poll_is_being_moderated_and_no_votes_can_be_added_until_it_has_been_approved'}
	</div>	
	{/if}			    

	{if (isset($aPoll.view_id) && $aPoll.view_id == 1 && Phpfox::getUserParam('poll.poll_can_moderate_polls'))
		|| $aPoll.bCanEdit
		|| $aPoll.bCanDelete
|| (!isset($bIsCustomPoll) && (isset($aPoll.user_id) && $aPoll.user_id == Phpfox::getUserId() && Phpfox::getUserParam('poll.poll_can_delete_own_polls')))
	}    
	<div class="item_bar">
		<div class="item_bar_action_holder">
			{if isset($aPoll.view_id) && $aPoll.view_id == 1 && Phpfox::getUserParam('poll.poll_can_moderate_polls')}
				<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image">{img theme='ajax/add.gif'}</a>			
				<a href="#" class="item_bar_approve" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('poll.moderatePoll','iResult=0&amp;iPoll={$aPoll.poll_id}&amp;inline=true'); return false;">{phrase var='poll.approve'}</a>
			{/if}			
			<a role="button" data-toggle="dropdown" class="item_bar_action"><span>{phrase var='poll.actions'}</span></a>
			<ul class="dropdown-menu">
				{template file='poll.block.link'}
			</ul>			
		</div>
	</div>
	{/if}
{/if}

{if isset($aPoll)}
<div id="poll_holder_{$aPoll.poll_id}"{if !isset($bIsViewingPoll)} class="{if isset($aPoll.view_id) && (!isset($bDesign) && $aPoll.view_id == 1 && (Phpfox::getUserParam('poll.poll_can_moderate_polls') || ($aPoll.user_id == Phpfox::getUserId())))} {/if}{if isset($bIsViewingPoll) || (isset($bDesign) && $bDesign)}row1 row_first{else}{if isset($phpfox.iteration.polls) && is_int($phpfox.iteration.polls/2)}row1{else}row2{/if}{if isset($phpfox.iteration.polls) && $phpfox.iteration.polls == 1} row_first{/if}{/if}"{/if}>
	
	<div class="vote_holder_{$aPoll.poll_id}">		
		
		{if !isset($bIsViewingPoll)}
		<div class="row_title">
			
			<div class="row_title_image">	
				{img user=$aPoll suffix='_50_square' max_width=50 max_height=50}
				{if !isset($bDesign) && (Phpfox::getUserParam('poll.poll_can_moderate_polls') || $aPoll.bCanEdit
				|| (isset($aPoll.user_id) && $aPoll.user_id == Phpfox::getUserId() && Phpfox::getUserParam('poll.poll_can_delete_own_polls')))}    
				<div class="row_edit_bar_parent">
					<div class="row_edit_bar">
						<a role="button" class="row_edit_bar_action" data-toggle="dropdown">
							<i class="fa fa-action"></i>
						</a>
						<ul class="dropdown-menu">
							{template file='poll.block.link'}
						</ul>
					</div>
				</div>
				{/if}				
				{if !isset($bDesign) && Phpfox::getUserParam('poll.poll_can_moderate_polls')}				
				<a href="#{$aPoll.poll_id}" class="moderate_link" rel="poll">{phrase var='poll.moderate'}</a>							
				{/if}
			</div>			
			
			<div class="row_title_info">
				<header>
					<h1><span id="poll_view_{$aPoll.poll_id}"><a href="{permalink module='poll' id=$aPoll.poll_id title=$aPoll.question}" id="poll_inner_title_{$aPoll.poll_id}" class="link">{$aPoll.question|clean|shorten:55:'...'|split:40}</a></span></h1>
					<div class="row_header">
						<ul>
							<li>{$aPoll.time_stamp|convert_time}</li>
							<li>{phrase var='poll.by'} {$aPoll|user}</li>
						</ul>
					</div>
				</header>
		{/if}


				<div class="item_content">
			<div id="js_poll_results_{$aPoll.poll_id}">
				{template file='poll.block.vote'}
			</div>

	{if !isset($bDesign) && isset($bIsViewingPoll) && $aPoll.total_votes > 0 
		&& ((Phpfox::getUserParam('poll.can_view_user_poll_results_own_poll') && $aPoll.user_id == Phpfox::getUserId()) 
		|| Phpfox::getUserParam('poll.can_view_user_poll_results_other_poll'))}	
		{if isset($aPoll.user_voted_this_poll) && ($aPoll.user_voted_this_poll == false && Phpfox::getUserParam('poll.view_poll_results_before_vote')) ||
			($aPoll.user_voted_this_poll == true && Phpfox::getUserParam('poll.view_poll_results_after_vote'))}
			<div>
				{if !isset($bIsCustomPoll)}			
				<div id="votes"><a name="votes"></a></div>
				<h3 class="txt-success uppercase">{phrase var='poll.members_votes_total_votes' total_votes=$aPoll.total_votes}</h3>
				{if !Phpfox::getUserParam('poll.can_view_hidden_poll_votes') && $aPoll.hide_vote == '1' && Phpfox::getUserId() != $aPoll.user_id}
				<div class="message">
					{phrase var='poll.votes_are_hidden_for_this_poll'}
				</div>
				{else}
				<div id="js_votes">
					{module name="poll.votes" page=0 size=1}
				</div>
			</div>
			{/if}
			{/if}
		{/if}
	{/if}


				</div>

	{if !isset($bIsViewingPoll) && isset($aPoll.aFeed)}

	{module name='feed.comment' aFeed=$aPoll.aFeed}
	{/if}	
	
	{if !isset($bIsViewingPoll)}
			</div>	
			<div class="clear"></div>
		</div>
		{/if}
	</div>	
	
</div>	
{/if}