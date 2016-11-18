<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<div id="feed_check_new_count" class="hide">
    <a id="feed_check_new_count_link" onclick="loadNewFeeds()" role="button" class="btn btn-block btn-primary">{phrase var='feed.you_have_number_updates' number=$iCnt}</a>
    <script>$Core.checkNewFeedAfter({$aFeedIds});</script>
</div>