<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: top.html.php 1135 2009-10-05 12:59:10Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if $aUser.user_id != Phpfox::getUserId()}
<div class="pages_view_sub_menu">
    <ul>
        {if isset($aUser.is_friend) && $aUser.is_friend}
        <li>
            <a href="#" onclick="if (confirm('{phrase var='core.are_you_sure'}')) $.ajaxCall('friend.delete', 'friend_user_id={$aUser.user_id}&reload=1'); return false;" class="no_ajax_link">
                {phrase var='friend.remove_friend'}
            </a>
        </li>
        {/if}
    </ul>
</div>
{/if}
