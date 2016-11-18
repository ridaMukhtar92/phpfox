<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright        [PHPFOX_COPYRIGHT]
 * @author           Raymond_Benc
 * @package          Phpfox
 * @version          $Id: link.html.php 6671 2013-09-25 10:06:46Z Fern $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{if $aLike.like_type_id == 'feed_mini'}
<li>
    {/if}
    <a role="button"
       data-toggle="like_toggle_cmd"
       data-label1="{phrase var='feed.like'}"
       data-label2="{phrase var='feed.unlike'}"
       data-liked="{if $aLike.like_is_liked}1{else}0{/if}"
       data-type_id="{$aLike.like_type_id}"
       data-item_id="{$aLike.like_item_id}"
       data-feed_id="{if isset($aFeed.feed_id)}{$aFeed.feed_id}{else}0{/if}"
       data-is_custom="{if $aLike.like_is_custom}1{else}0{/if}"
       class="js_like_link_toggle {if $aLike.like_is_liked}liked{else}unlike{/if}">
        {if $aLike.like_is_liked}
        <span>{phrase var='feed.unlike'}</span>
        {else}
        <span>{phrase var='feed.like'}</span>
        {/if}
    </a>
    {if $aLike.like_item_id == 'feed_mini'}
</li>
{/if}