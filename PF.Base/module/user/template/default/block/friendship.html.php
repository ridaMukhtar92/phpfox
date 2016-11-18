<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if Phpfox::isUser() && Phpfox::isModule('friend') && Phpfox::getUserParam('friend.can_add_friends')}
<ul class="list-unstyled">
    {if !$is_friend}
    <li><a class="btn btn-sm btn-default" href="#" onclick="return $Core.addAsFriend('{$user_id}');" title="{phrase var='profile.add_to_friends'}">
            <i class="fa fa-plus"></i>
            {phrase var='user.add_as_friend'}
        </a></li>
    {/if}
</ul>
{/if}