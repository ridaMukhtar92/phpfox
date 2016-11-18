<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Quiz
 * @version 		$Id: entry.html.php 3771 2011-12-13 11:41:30Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if isset($bIsViewingQuiz)}
    <div class="item_info">
		<span>{$aQuiz.time_stamp|convert_time:'quiz.quiz_view_time_stamp'}</span>
		<span>&middot;</span>
		<span>{phrase var='quiz.by'} {$aQuiz|user}</span>
    </div>

	{if $aQuiz.image_path}
	<div class="item_banner image_load" data-src="{img server_id=$aQuiz.server_id title=$aQuiz.title path='quiz.url_image' file=$aQuiz.image_path suffix='' return_url=true}"></div>
	{/if}
    
	{if (isset($aQuiz.view_id) && $aQuiz.view_id == 1)}
	<div class="message js_moderation_off" id="js_approve_message">
		{phrase var='quiz.this_quiz_is_awaiting_moderation'}
	</div>	
	{/if}			    

	{if Phpfox::getUserParam('quiz.can_approve_quizzes') 
		|| Phpfox::getUserParam('quiz.can_delete_others_quizzes')
		|| ( ($aQuiz.user_id == Phpfox::getUserId()) && Phpfox::getUserParam('quiz.can_delete_own_quiz') )
		|| ($aQuiz.user_id == Phpfox::getUserId())
		|| ( (Phpfox::getUserId() == $aQuiz.user_id && (Phpfox::getUserParam('quiz.can_edit_own_questions') || Phpfox::getUserParam('quiz.can_edit_own_title'))) || (Phpfox::getUserId() != $aQuiz.user_id && (Phpfox::getUserParam('quiz.can_edit_others_questions') || Phpfox::getUserParam('quiz.can_edit_others_title'))))
	}   
	<div class="item_bar">
		<div class="item_bar_action_holder">
			{if isset($aQuiz.view_id) && $aQuiz.view_id == 1 && Phpfox::getUserParam('quiz.can_approve_quizzes')}
				<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image">{img theme='ajax/add.gif'}</a>			
				<a href="#" class="item_bar_approve" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('quiz.approve','iQuiz={$aQuiz.quiz_id}&amp;inline=true'); return false;">{phrase var='quiz.approve'}</a>
			{/if}			
			<a role="button" data-toggle="dropdown" class="item_bar_action"><span>{phrase var='quiz.actions'}</span></a>
			<ul class="dropdown-menu">
				{template file='quiz.block.link'}
			</ul>			
		</div>
	</div>
	{/if}
{/if}
		
<div id="js_quiz_{$aQuiz.quiz_id}" class="{if isset($phpfox.iteration.quizzes)} {if is_int($phpfox.iteration.quizzes/2)}row1{else}row2{/if}{if $phpfox.iteration.quizzes == 1} row_first{/if}{/if}">

	<div id="js_message_{$aQuiz.quiz_id}" style="display: none;"></div>
	{if !isset($bIsViewingQuiz)}
		<div class="row_title">
		
			<div class="row_title_image">
				{img user=$aQuiz suffix='_50_square' max_width=50 max_height=50}
				{if Phpfox::getUserParam('quiz.can_approve_quizzes') 
					|| Phpfox::getUserParam('quiz.can_delete_others_quizzes')
					|| ( ($aQuiz.user_id == Phpfox::getUserId()) && Phpfox::getUserParam('quiz.can_delete_own_quiz') )
					|| ($aQuiz.user_id == Phpfox::getUserId())
					|| ( (Phpfox::getUserId() == $aQuiz.user_id && (Phpfox::getUserParam('quiz.can_edit_own_questions') || Phpfox::getUserParam('quiz.can_edit_own_title'))) || (Phpfox::getUserId() != $aQuiz.user_id && (Phpfox::getUserParam('quiz.can_edit_others_questions') || Phpfox::getUserParam('quiz.can_edit_others_title'))))
				}   		
				<div class="row_edit_bar_parent">
					<div class="row_edit_bar">
						<a role="button" class="row_edit_bar_action" data-toggle="dropdown">
							<i class="fa fa-action"></i>
						</a>
						<ul class="dropdown-menu">
							{template file='quiz.block.link'}
						</ul>
					</div>
				</div>		
				{/if}				
				{if Phpfox::getUserParam('quiz.can_approve_quizzes')}
				<a href="#{$aQuiz.quiz_id}" class="moderate_link" rel="quiz">{phrase var='quiz.moderate'}</a>
				{/if}
			</div>
			<div class="row_title_info">
				<a href="{permalink module='quiz' id=$aQuiz.quiz_id title=$aQuiz.title}" id="quiz_inner_title_{$aQuiz.quiz_id}" class="link" title="{$aQuiz.title|clean}">{$aQuiz.title|clean|shorten:75:'...'}</a>
				<div class="extra_info">
					{$aQuiz.time_stamp|convert_time} {phrase var='quiz.by'} {$aQuiz|user}
				</div>			
			
		
	{/if}		

		<div class="item_content">
		
		{$aQuiz.description|parse|split:55}				

		{if isset($bShowResults) && $bShowResults}		
			{template file='quiz.block.result'}
		{elseif isset($bShowUsers) && $bShowUsers}
			<p>&nbsp;</p>
			<h3 class="txt-success uppercase fw-500 fs-base">{phrase var='quiz.users_results'}</h3>
			{foreach from=$aQuiz.aTakenBy name=users item=aUser}
			<div{if isset($phpfox.iteration.results)} class="{if is_int($phpfox.iteration.results/2)}row1{else}row2{/if}{if $phpfox.iteration.results == 1} row_first{/if}"{/if} style="position:relative;" id="quiz_taken_by">
				<div style="width:55px; position:absolute;">
					{img user=$aUser.user_info suffix='_50' max_width=50 max_height=50}
				</div>
				<div class="p_2" style="margin-left:60px; height:55px;">
					<a href="{url link=""$aUser.user_info.user_name""}">{$aUser.user_info.full_name}</a> {if (Phpfox::getParam('quiz.show_percentage_in_results'))}{$aUser.iSuccessPercentage}%{else}{$aUser.total_correct}/{$aUser.iTotalCorrectAnswers}{/if}.
					<div class="t_right">
						<a href="{permalink module='quiz' id=$aQuiz.quiz_id title=$aQuiz.title}results/id_{$aUser.user_info.user_id}/" id="quiz_inner_title_{$aQuiz.quiz_id}">{phrase var='quiz.view_results'}</a>
					</div>
				</div>
			</div>
			{foreachelse}
				<div class="t_left">{phrase var='quiz.be_the_first_to_answer_this_quiz'}</div>
			{/foreach}
				{if $hasMore}
			{pager}
				{/if}
		{else}
			{if isset($bIsViewingQuiz)}
				{if isset($aQuiz.question)}
				<form class="p_top_15" name="js_form_answer" method="post" action="{permalink module='quiz' id=$aQuiz.quiz_id title=$aQuiz.title}answer/">
						{foreach from=$aQuiz.question key=iQuestionId name=questions item=aQuestion}
						<div class="quiz_questions radio">
							<strong>{$phpfox.iteration.questions}. {$aQuestion.question}</strong>
							{foreach from=$aQuestion.answer key=iAnswerId name=answers item=sAnswer}
								<div class="quiz_answers">
									<label><input class="checkbox" name="val[answer][{$iQuestionId}]" value="{$iAnswerId}" style="vertical-align: middle;" type="radio"> {$sAnswer}</label>
								</div>
							{/foreach}
						</div>
						{/foreach}
					{if isset($aQuiz.view_id) && $aQuiz.view_id != 1}
						<input type="submit" value="{phrase var='quiz.submit_your_answers'}" class="btn btn-danger button_link" />
					{/if}
				</form>
				{/if}
			{/if}
		{/if}

		
	{if !isset($bIsViewingQuiz) && isset($aQuiz.aFeed)}
	{module name='feed.comment' aFeed=$aQuiz.aFeed}
	{/if}			
		
		{if !isset($bIsViewingQuiz)}
			</div>		
		</div>
		{/if}
	</div>	
</div>