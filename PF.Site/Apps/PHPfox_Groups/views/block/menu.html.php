<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<ul>
    {if $aPage.is_admin}
    <li><a href="{url link='groups.add' id=$aPage.page_id}">{_p('Edit group')}</a></li>
    {/if}
    {module name='share.link' type='groups' url=$aPage.link title=$aPage.title display='menu' sharefeedid=$aPage.page_id
    sharemodule='groups'}
    {if !Phpfox::getUserBy('profile_page_id')}
    <li id="js_add_pages_unlike" {if !$aPage.is_liked} style="display:none;" {
    /if}><a href="#"
            onclick="$(this).parent().hide(); $('#pages_like_join_position').show(); $.ajaxCall('like.delete', 'type_id=groups&amp;item_id={$aPage.page_id}'); return false;">{_p('Remove Membership')}</a></li>
    {/if}
</ul>