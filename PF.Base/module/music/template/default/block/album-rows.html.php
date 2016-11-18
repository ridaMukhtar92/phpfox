<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<article class="music_row music_album_row" id="js_album_{$aAlbum.album_id}">
	<div class="music_row_image">
		<a href="{permalink title=$aAlbum.name id=$aAlbum.album_id module='music.album'}">{img server_id=$aAlbum.server_id title=$aAlbum.name path='music.url_image' file=$aAlbum.image_path suffix='_120_square' itemprop='image'}</a>
	</div>
	<div class="music_row_content">
		<header>
			<h2>{$aAlbum|user}
				<span><a role="link"> &middot; </a></span>
				<span><a role="link">{$aAlbum.time_stamp|convert_time}</a></span></h2>
			<h1><a href="{permalink title=$aAlbum.name id=$aAlbum.album_id module='music.album'}">{$aAlbum.name|clean}</a></h1>
		</header>

		{if isset($aAlbum.songs)}
		<div class="music_songs">
			{if ($aAlbum.total_track == 1)}
			<div>{phrase var='music.album_song_count' songs_count=$aAlbum.total_track}</div>
			{else}
			<div>{phrase var='music.album_songs_count' songs_count=$aAlbum.total_track}</div>
			{/if}
		</div>
		{/if}
	</div>
	{if
	((($aAlbum.user_id == Phpfox::getUserId() && Phpfox::getUserParam('music.can_edit_own_albums')) || Phpfox::getUserParam('music.can_edit_other_music_albums')))
	|| ((($aAlbum.user_id == Phpfox::getUserId() && Phpfox::getUserParam('music.can_edit_own_albums'))))
	|| ($aAlbum.view_id == 0 && Phpfox::getUserParam('music.can_feature_music_albums'))
	|| (Phpfox::getUserParam('music.can_sponsor_album'))
	|| (Phpfox::getUserParam('music.can_purchase_sponsor_album') && !$aAlbum.is_sponsor && ($aAlbum.user_id == Phpfox::getUserId()))
	|| ((($aAlbum.user_id == Phpfox::getUserId() && Phpfox::getUserParam('music.can_delete_own_music_album')) || Phpfox::getUserParam('music.can_delete_other_music_albums')))
	}
	<div class="row_edit_bar_parent">
		<div class="row_edit_bar">
			<a role="button" class="row_edit_bar_action" data-toggle="dropdown">
				<i class="fa fa-action"></i>
			</a>
			<ul class="dropdown-menu">
				{template file='music.block.menu-album'}
			</ul>
		</div>
	</div>
	{/if}
	{if Phpfox::getUserParam('music.can_delete_other_music_albums') || Phpfox::getUserParam('music.can_feature_music_albums') || $aAlbum.user_id == Phpfox::getUserId()}
	<a href="#{$aAlbum.album_id}" class="moderate_link" {if Phpfox::getUserParam('music.can_delete_other_music_albums') || Phpfox::getUserParam('music.can_feature_music_albums')}data-id="mod"{else}data-id="user"{/if} rel="musicalbum"></a>
	{/if}
</article>