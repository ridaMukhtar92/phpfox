<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<article class="music_row" id="js_controller_music_track_{$aSong.song_id}">
	{if !isset($aSong.is_in_feed)}
	<div class="music_row_image">{img user=$aSong suffix='_120_square'}</div>
	{/if}
	<div class="music_row_content">
		<header>
			{if !isset($aSong.is_in_feed)}
			<h2>
                {$aSong|user}
                {if !isset($aSong.is_in_feed)}
				<span><a role="link">&middot;</a></span>
				<span>
                <a role="link">{$aSong.time_stamp|convert_time}</a>
                </span>
                {/if}
			</h2>
			<h1><a href="{permalink title=$aSong.title id=$aSong.song_id module='music'}">{$aSong.title|clean}</a></h1>
			{else}
			<div class="feed_block_title_content">
				<a class="activity_feed_content_link_title" href="{permalink title=$aSong.title id=$aSong.song_id module='music'}">{$aSong.title|clean}</a>
			</div>
			{/if}
		</header>

		{if Phpfox::getUserParam('music.can_approve_songs')
		|| (($aSong.user_id == Phpfox::getUserId() && Phpfox::getUserParam('music.can_edit_own_song')) || Phpfox::getUserParam('music.can_edit_other_song'))
		|| ($aSong.user_id == Phpfox::getUserId() && Phpfox::getUserParam('music.can_delete_own_track')) || Phpfox::getUserParam('music.can_delete_other_tracks')
		|| (Phpfox::getUserParam('music.can_purchase_sponsor_song') && $aSong.user_id == Phpfox::getUserId())
		}
		<div class="row_edit_bar_parent">
			<div class="row_edit_bar">
				<a role="button" class="row_edit_bar_action" data-toggle="dropdown">
					<i class="fa fa-action"></i>
				</a>
				<ul class="dropdown-menu">
					{template file='music.block.menu'}
				</ul>
			</div>
		</div>
		{/if}


		<div class="audio_player" data-src="{$aSong.song_path}" data-onplay="{url link='music.view' play=$aSong.song_id}"></div>
		{if !isset($aSong.is_in_feed) && ($aSong.user_id == Phpfox::getUserId() || Phpfox::getUserParam('music.can_approve_songs') || Phpfox::getUserParam('music.can_delete_other_tracks') || Phpfox::getUserParam('music.can_feature_songs'))}
			<a href="#{$aSong.song_id}" class="moderate_link" rel="music" {if Phpfox::getUserParam('music.can_approve_songs') || Phpfox::getUserParam('music.can_delete_other_tracks') || Phpfox::getUserParam('music.can_feature_songs')}data-id="mod"{else}data-id="user"{/if}></a>
		{/if}
	</div>
</article>