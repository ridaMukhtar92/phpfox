<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:15 pm */ ?>
<?php

?>
<div id="feed_check_new_count" class="hide">
    <a id="feed_check_new_count_link" onclick="loadNewFeeds()" role="button" class="btn btn-block btn-primary"><?php echo Phpfox::getPhrase('feed.you_have_number_updates', array('number' => $this->_aVars['iCnt'])); ?></a>
    <script>$Core.checkNewFeedAfter(<?php echo $this->_aVars['aFeedIds']; ?>);</script>
</div>
