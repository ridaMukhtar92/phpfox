<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:08 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright        [PHPFOX_COPYRIGHT]
 * @author           Raymond_Benc
 * @package          Phpfox
 * @version          $Id: link.html.php 6671 2013-09-25 10:06:46Z Fern $
 */



?>
<?php if ($this->_aVars['aLike']['like_type_id'] == 'feed_mini'): ?>
<li>
<?php endif; ?>
    <a role="button"
       data-toggle="like_toggle_cmd"
       data-label1="<?php echo Phpfox::getPhrase('feed.like'); ?>"
       data-label2="<?php echo Phpfox::getPhrase('feed.unlike'); ?>"
       data-liked="<?php if ($this->_aVars['aLike']['like_is_liked']): ?>1<?php else: ?>0<?php endif; ?>"
       data-type_id="<?php echo $this->_aVars['aLike']['like_type_id']; ?>"
       data-item_id="<?php echo $this->_aVars['aLike']['like_item_id']; ?>"
       data-feed_id="<?php if (isset ( $this->_aVars['aFeed']['feed_id'] )):  echo $this->_aVars['aFeed']['feed_id'];  else: ?>0<?php endif; ?>"
       data-is_custom="<?php if ($this->_aVars['aLike']['like_is_custom']): ?>1<?php else: ?>0<?php endif; ?>"
       class="js_like_link_toggle <?php if ($this->_aVars['aLike']['like_is_liked']): ?>liked<?php else: ?>unlike<?php endif; ?>">
<?php if ($this->_aVars['aLike']['like_is_liked']): ?>
        <span><?php echo Phpfox::getPhrase('feed.unlike'); ?></span>
<?php else: ?>
        <span><?php echo Phpfox::getPhrase('feed.like'); ?></span>
<?php endif; ?>
    </a>
<?php if ($this->_aVars['aLike']['like_item_id'] == 'feed_mini'): ?>
</li>
<?php endif; ?>
