<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:08 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: content.html.php 7160 2014-02-26 17:20:13Z Fern $
 */



?>
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
<div class="activity_feed_header">
	<div class="activity_feed_header_info">
<?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aFeed']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aFeed']['user_name'], ((empty($this->_aVars['aFeed']['user_name']) && isset($this->_aVars['aFeed']['profile_page_id'])) ? $this->_aVars['aFeed']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aFeed']['user_id'], $this->_aVars['aFeed']['full_name']), 50, '...') . '</a></span>';  if (( ! empty ( $this->_aVars['aFeed']['parent_module_id'] ) || isset ( $this->_aVars['aFeed']['parent_is_app'] ) )): ?> <?php echo Phpfox::getPhrase('feed.shared');  else:  if (isset ( $this->_aVars['aFeed']['parent_user'] )): ?> <?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/arrow.png','class' => 'v_middle')); ?> <?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aFeed']['parent_user']['parent_user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aFeed']['parent_user']['parent_user_name'], ((empty($this->_aVars['aFeed']['parent_user']['parent_user_name']) && isset($this->_aVars['aFeed']['parent_user']['parent_profile_page_id'])) ? $this->_aVars['aFeed']['parent_user']['parent_profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aFeed']['parent_user']['parent_user_id'], $this->_aVars['aFeed']['parent_user']['parent_full_name']), 50, '...') . '</a></span>'; ?> <?php endif;  if (! empty ( $this->_aVars['aFeed']['feed_info'] )): ?><span class="feed_info"> <?php echo $this->_aVars['aFeed']['feed_info']; ?></span><?php endif;  endif; ?>
		<time>
			<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" class="feed_permalink"><?php echo Phpfox::getLib('date')->convertTime($this->_aVars['aFeed']['time_stamp'], 'feed.feed_display_time_stamp'); ?></a>
<?php if (( isset ( $this->_aVars['sponsor'] ) && $this->_aVars['sponsor'] ) || ( isset ( $this->_aVars['aFeed']['sponsored_feed'] ) && $this->_aVars['aFeed']['sponsored_feed'] )): ?>
            &nbsp;
        <span>
            <b><?php echo Phpfox::getPhrase('ad.sponsored'); ?></b>
        </span>
<?php endif; ?>
		</time>
	</div>
</div>
<?php endif; ?>

<div class="activity_feed_content">
<?php if (( isset ( $this->_aVars['aFeed']['focus'] ) )): ?>
	<div data-is-focus="1">
<?php echo $this->_aVars['aFeed']['focus']['html']; ?>
	</div>
<?php else: ?>
		<?php
						Phpfox::getLib('template')->getBuiltFile('feed.block.focus', $this->_aVars['aFeed']['feed_id']);
						?>
<?php endif; ?>

<?php if (isset ( $this->_aVars['aFeed']['feed_view_comment'] )): ?>
<?php Phpfox::getBlock('feed.comment', array()); ?>
<?php else: ?>
		<?php
						Phpfox::getLib('template')->getBuiltFile('feed.block.comment');
						?>
<?php endif; ?>

<?php if ($this->_aVars['aFeed']['type_id'] != 'friend'): ?>
<?php if (isset ( $this->_aVars['aFeed']['more_feed_rows'] ) && is_array ( $this->_aVars['aFeed']['more_feed_rows'] ) && count ( $this->_aVars['aFeed']['more_feed_rows'] )): ?>
<?php if ($this->_aVars['iTotalExtraFeedsToShow'] = count ( $this->_aVars['aFeed']['more_feed_rows'] )):  endif; ?>
			<a href="#" class="activity_feed_content_view_more" onclick="$(this).parents('.js_feed_view_more_entry_holder:first').find('.js_feed_view_more_entry').show(); $(this).remove(); return false;"><?php echo Phpfox::getPhrase('feed.see_total_more_posts_from_full_name', array('total' => $this->_aVars['iTotalExtraFeedsToShow'],'full_name' => Phpfox::getLib('phpfox.parse.output')->shorten($this->_aVars['aFeed']['full_name'], 40, '...'))); ?></a>
<?php endif; ?>
<?php endif; ?>
</div>
