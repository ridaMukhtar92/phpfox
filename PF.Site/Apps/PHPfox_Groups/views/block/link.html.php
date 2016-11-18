<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<li><a href="{url link='groups.add' id=$aPage.page_id}">{_p('Manage')}</a></li>
{if user('pf_group_add_cover_photo')}
<li>
    <a href="#"
       onclick="$(this).closest('ul').find('.cover_section_menu_item').toggleClass('hidden'); event.cancelBubble = true; if (event.stopPropagation) event.stopPropagation();return false;">
        {if empty($aPage.cover_photo_id)}
        {phrase var='user.add_a_cover'}
        {else}
        {phrase var='user.change_cover'}
        {/if}
    </a>
</li>
<li class="cover_section_menu_item hidden">
    <a href="{url link='groups.'$aPage.page_id}photo">
        {phrase var='user.choose_from_photos'}
    </a>
</li>
<li class="cover_section_menu_item hidden">
    <a href="#"
       onclick="$(this).closest('ul').find('.cover_section_menu_item').addClass('hidden'); $Core.box('profile.logo', 500, 'groups_id={$aPage.page_id}'); return false;">
        {_p('Upload photo')}
    </a>
</li>
{if !empty($aPage.cover_photo_id)}
<li class="cover_section_menu_item hidden visible-lg">
    <a role="button" onclick="repositionCoverPhoto('groups',{$aPage.page_id})">
        {_p('Reposition')}
    </a>
</li>
<li class="cover_section_menu_item hidden">
    <a href="#"
       onclick="$(this).closest('ul').find('.cover_section_menu_item').addClass('hidden'); $.ajaxCall('groups.removeLogo', 'page_id={$aPage.page_id}'); return false;">
        {_p('user.remove')}
    </a>
</li>
{/if}
{/if}
{if user('pf_group_moderate', 0) || $aPage.user_id == Phpfox::getUserId()}
<li class="item_delete">
    <a href="{url link='groups' delete=$aPage.page_id}" onclick="return confirm(\"{_p('Are you sure')}\");"
       class="no_ajax_link">
        {_p('Delete')}
    </a>
</li>
{/if}