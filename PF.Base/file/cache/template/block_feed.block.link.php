<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:08 pm */ ?>
<?php

?>
<ul class="dropdown-menu dropdown-menu-right">
<?php if (Phpfox ::isModule('report') && $this->_aVars['aFeed']['type_id'] == 'user_status' && $this->_aVars['aFeed']['user_id'] != Phpfox ::getUserId()): ?>
    <li class=""><a href="#?call=report.add&height=210&width=400&type=user_status&id=<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="inlinePopup" title="<?php echo Phpfox::getPhrase('feed.report'); ?>">
            <i class="fa fa-flag"></i> <?php echo Phpfox::getPhrase('feed.report'); ?></a></li>
<?php endif; ?>

<?php if (! empty ( $this->_aVars['feed_entry_be'] ) && ( ( defined ( 'PHPFOX_FEED_CAN_DELETE' ) ) || ( Phpfox ::getUserParam('feed.can_delete_own_feed') && $this->_aVars['aFeed']['user_id'] == Phpfox ::getUserId()) || Phpfox ::getUserParam('feed.can_delete_other_feeds'))): ?>
	<li class=""><a href="#" class="" onclick="tb_show('<?php echo _p('Notice'); ?>', $.ajaxBox('feed.delete', 'height=400&amp;width=600&amp;TB_inline=1&amp;call=feed.delete&amp;type=delete&amp;id=<?php echo $this->_aVars['aFeed']['feed_id'];  if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>&amp;module=<?php echo $this->_aVars['aFeedCallback']['module']; ?>&amp;item=<?php echo $this->_aVars['aFeedCallback']['item_id'];  endif; ?>')); return false;">
			<i class="fa fa-trash"></i> <?php echo Phpfox::getPhrase('feed.delete_this_feed'); ?></a></li>
<?php endif; ?>

<?php $this->assign('empty', true); ?>
	
<?php if (Phpfox ::isModule('report') && isset ( $this->_aVars['sFeedType'] ) && isset ( $this->_aVars['aFeed']['report_module'] )): ?>
<?php $this->assign('empty', false); ?>
		<li><a href="#?call=report.add&amp;height=100&amp;width=400&amp;type=<?php echo $this->_aVars['aFeed']['report_module']; ?>&amp;id=<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="inlinePopup activity_feed_report" title="<?php echo $this->_aVars['aFeed']['report_phrase']; ?>">
				<i class="fa fa-flag"></i>
<?php echo Phpfox::getPhrase('feed.report'); ?></a>
		</li>
<?php endif; ?>

<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_entry_2')) ? eval($sPlugin) : false); ?>

<?php (($sPlugin = Phpfox_Plugin::get('core.template_block_comment_border_new')) ? eval($sPlugin) : false); ?>

</ul>
<?php if ($this->_aVars['empty']): ?>
<input type="hidden" class="comment_mini_link_like_empty" value="1" />
<?php endif; ?>
