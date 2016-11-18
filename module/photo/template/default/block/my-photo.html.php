<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if !count($aPhotos)}
<div class="extra_info">
    {phrase var='photo.no_photos_uploaded_yet'}
    {if Phpfox::getUserId() == $aUser.user_id}
    <ul class="action">
        <li><a href="{url link='photo.upload'}">{phrase var='photo.click_here_to_upload_photos'}</a></li>
    </ul>
    {/if}
</div>
{else}
<div class="collection-stage-narrow">
{foreach from=$aPhotos item=aPhoto}
    {if ($aPhoto.mature == 0 || (($aPhoto.mature == 1 || $aPhoto.mature == 2) && Phpfox::getUserId() && Phpfox::getUserParam('photo.photo_mature_age_limit') <= Phpfox::getUserBy('age'))) || $aPhoto.user_id == Phpfox::getUserId()}
    <a class="collection-stage-item-narrow my_photo_item" href="{$aPhoto.link}" title="{phrase var='photo.title_by_full_name' title=$aPhoto.title|clean full_name=$aPhoto.full_name|clean}">
        <span style="background-image: url({img server_id=$aPhoto.server_id path='photo.url_photo' file=$aPhoto.destination suffix='_150' max_width=150 max_height=150 class="hover_action" title=$aPhoto.title return_url=true})">

        </span>
    </a>
    {else}

    {/if}
{/foreach}
</div>
<div class="clear"></div>
{/if}