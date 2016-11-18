<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:08 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: block.html.php 6820 2013-10-22 13:05:35Z Raymond_Benc $
 */
 
 

?>
<?php if (( isset ( $this->_aVars['sHeader'] ) && ( ! PHPFOX_IS_AJAX || isset ( $this->_aVars['bPassOverAjaxCall'] ) || isset ( $this->_aVars['bIsAjaxLoader'] ) ) ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Theme_Service_Theme ::instance()->isInDnDMode())): ?>

<div class="block<?php if (( defined ( 'PHPFOX_IN_DESIGN_MODE' ) || Theme_Service_Theme ::instance()->isInDnDMode()) && ( ! isset ( $this->_aVars['bCanMove'] ) || ( isset ( $this->_aVars['bCanMove'] ) && $this->_aVars['bCanMove'] == true ) )): ?> js_sortable<?php endif;  if (isset ( $this->_aVars['sCustomClassName'] )): ?> <?php echo $this->_aVars['sCustomClassName'];  endif; ?>"<?php if (isset ( $this->_aVars['sBlockBorderJsId'] )): ?> id="js_block_border_<?php echo $this->_aVars['sBlockBorderJsId']; ?>"<?php endif;  if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) && Phpfox_Module ::instance()->blockIsHidden('js_block_border_' . $this->_aVars['sBlockBorderJsId'] . '' )): ?> style="display:none;"<?php endif; ?>>
<?php if (! empty ( $this->_aVars['sHeader'] ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Theme_Service_Theme ::instance()->isInDnDMode())): ?>
		<div class="title <?php if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) || Theme_Service_Theme ::instance()->isInDnDMode()): ?>js_sortable_header<?php endif; ?>">
<?php if (isset ( $this->_aVars['sBlockTitleBar'] )): ?>
<?php echo $this->_aVars['sBlockTitleBar']; ?>
<?php endif; ?>
<?php if (( isset ( $this->_aVars['aEditBar'] ) && Phpfox ::isUser())): ?>
			<div class="js_edit_header_bar">
				<a href="#" title="<?php echo Phpfox::getPhrase('core.edit_this_block'); ?>" onclick="$.ajaxCall('<?php echo $this->_aVars['aEditBar']['ajax_call']; ?>', 'block_id=<?php echo $this->_aVars['sBlockBorderJsId'];  if (isset ( $this->_aVars['aEditBar']['params'] )):  echo $this->_aVars['aEditBar']['params'];  endif; ?>'); return false;">
					<i class="fa fa-edit"></i>
				</a>
			</div>
<?php endif; ?>
<?php if (empty ( $this->_aVars['sHeader'] )): ?>
<?php echo $this->_aVars['sBlockShowName']; ?>
<?php else: ?>
<?php echo $this->_aVars['sHeader']; ?>
<?php endif; ?>
		</div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aEditBar'] )): ?>
	<div id="js_edit_block_<?php echo $this->_aVars['sBlockBorderJsId']; ?>" class="edit_bar hidden"></div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aMenu'] ) && count ( $this->_aVars['aMenu'] )): ?>
<?php unset($this->_aVars['aMenu']); ?>
<?php endif; ?>
	<div class="content"<?php if (isset ( $this->_aVars['sBlockJsId'] )): ?> id="js_block_content_<?php echo $this->_aVars['sBlockJsId']; ?>"<?php endif; ?>>
<?php endif; ?>
		<?php

?>

<?php if (! $this->_aVars['bIsHashTagPop'] && ! PHPFOX_IS_AJAX && ! empty ( $this->_aVars['sIsHashTagSearch'] )): ?>
  <h1 id="sHashTagValue">#<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['sIsHashTagSearchValue']); ?></h1>
<?php endif; ?>

<?php (($sPlugin = Phpfox_Plugin::get('feed.component_block_display_process_header')) ? eval($sPlugin) : false); ?>
<?php if (Phpfox ::isUser() && ! defined ( 'FEED_LOAD_MORE_NEWS' ) && ! defined ( 'FEED_LOAD_NEW_FEEDS' ) && ( ! isset ( $this->_aVars['bIsGroupMember'] ) || $this->_aVars['bIsGroupMember'] )): ?>
  <?php
						Phpfox::getLib('template')->getBuiltFile('feed.block.form');
						?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['bForceFormOnly'] ) && $this->_aVars['bForceFormOnly']): ?>
<?php else: ?>
<?php if (Phpfox ::isUser() && ! PHPFOX_IS_AJAX && $this->_aVars['sCustomViewType'] === null && $this->_aVars['bUseFeedForm']): ?>
    <div id="js_main_feed_holder">
    </div>
<?php endif; ?>
<?php if (Phpfox ::isUser() && ! defined ( 'PHPFOX_IS_USER_PROFILE' ) && ! PHPFOX_IS_AJAX && ! defined ( 'PHPFOX_IS_PAGES_VIEW' ) && Phpfox ::getParam('feed.allow_choose_sort_on_feeds')): ?>
    <div class="feed_sort_order">
      <a href="#" class="feed_sort_order_link"><?php echo Phpfox::getPhrase('feed.sort'); ?> <span class="caret"></span></a>
      <div class="feed_sort_holder open">
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="#"<?php if (! $this->_aVars['iFeedUserSortOrder']): ?> class="active"<?php endif; ?> rel="0"><?php echo Phpfox::getPhrase('feed.top_stories'); ?></a></li>
          <li><a href="#"<?php if ($this->_aVars['iFeedUserSortOrder']): ?> class="active"<?php endif; ?> rel="1"><?php echo Phpfox::getPhrase('feed.most_recent'); ?></a></li>
        </ul>
      </div>
    </div>
<?php endif; ?>
<?php if (Phpfox ::isModule('captcha') && Phpfox ::getUserParam('captcha.captcha_on_comment')): ?>
<?php Phpfox::getBlock('captcha.form', array('sType' => 'comment','captcha_popup' => true)); ?>
<?php endif; ?>
<?php if (! PHPFOX_IS_AJAX && ! defined ( 'FEED_LOAD_NEW_FEEDS' ) && ! defined ( 'FEED_LOAD_MORE_NEWS' )): ?>
  <div id="feed"><a name="feed"></a></div>
  <div id="js_feed_content" class="js_feed_content">
<?php if ($this->_aVars['sCustomViewType'] !== null): ?>
    <h2><?php echo $this->_aVars['sCustomViewType']; ?></h2>
<?php endif; ?>
    <div id="js_new_feed_update"></div>
  <div id="js_new_feed_comment"></div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['bStreamMode'] ) && $this->_aVars['bStreamMode']): ?>
<?php if (count((array)$this->_aVars['aFeeds'])):  foreach ((array) $this->_aVars['aFeeds'] as $this->_aVars['aFeed']): ?>
<?php if (isset ( $this->_aVars['aFeed']['sponsored_feed'] ) || $this->_aVars['aFeed']['feed_id'] != $this->_aVars['iSponsorFeedId']): ?>
        <div class="feed_stream" data-feed-url="<?php if (( isset ( $this->_aVars['aFeedCallback']['module'] ) )):  echo Phpfox::getLib('phpfox.url')->makeUrl('feed.stream', array('id' => $this->_aVars['aFeed']['feed_id'],'module' => $this->_aVars['aFeedCallback']['module'],'item_id' => $this->_aVars['aFeedCallback']['item_id']));  else:  echo Phpfox::getLib('phpfox.url')->makeUrl('feed.stream', array('id' => $this->_aVars['aFeed']['feed_id']));  if (isset ( $this->_aVars['aFeed']['sponsored_feed'] )): ?>&sponsor=1<?php endif;  endif; ?>"></div>
<?php endif; ?>
<?php endforeach; endif; ?>
<?php else: ?>
<?php if (isset ( $this->_aVars['bNoLoadFeedContent'] )): ?>
<?php else: ?>
<?php if (count((array)$this->_aVars['aFeeds'])):  $this->_aPhpfoxVars['iteration']['iFeed'] = 0;  foreach ((array) $this->_aVars['aFeeds'] as $this->_aVars['aFeed']):  $this->_aPhpfoxVars['iteration']['iFeed']++; ?>

<?php if (isset ( $this->_aVars['aFeed']['sponsored_feed'] ) || $this->_aVars['aFeed']['feed_id'] != $this->_aVars['iSponsorFeedId']): ?>
<?php if (isset ( $this->_aVars['aFeed']['feed_mini'] ) && ! isset ( $this->_aVars['bHasRecentShow'] )): ?>
<?php if ($this->_aVars['bHasRecentShow'] = true):  endif; ?>
      <div class="activity_recent_holder">
        <div class="activity_recent_title">
<?php echo Phpfox::getPhrase('feed.recent_activity'); ?>
        </div>
<?php endif; ?>
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] ) && isset ( $this->_aVars['bHasRecentShow'] )): ?>
      </div>
<?php unset($this->_aVars['bHasRecentShow']); ?>
<?php endif; ?>

      <div class="js_feed_view_more_entry_holder">
        <?php
						Phpfox::getLib('template')->getBuiltFile('feed.block.entry');
						?>
<?php if (isset ( $this->_aVars['aFeed']['more_feed_rows'] ) && is_array ( $this->_aVars['aFeed']['more_feed_rows'] ) && count ( $this->_aVars['aFeed']['more_feed_rows'] )): ?>
<?php if (count((array)$this->_aVars['aFeed']['more_feed_rows'])):  foreach ((array) $this->_aVars['aFeed']['more_feed_rows'] as $this->_aVars['aFeed']): ?>
<?php if ($this->_aVars['bChildFeed'] = true):  endif; ?>
        <div class="js_feed_view_more_entry" style="display:none;">
          <?php
						Phpfox::getLib('template')->getBuiltFile('feed.block.entry');
						?>
        </div>
<?php endforeach; endif; ?>
<?php unset($this->_aVars['bChildFeed']); ?>
<?php endif; ?>
      </div>
<?php endif; ?>
<?php endforeach; endif; ?>
<?php endif; ?>
<?php endif; ?>

<?php if (isset ( $this->_aVars['bHasRecentShow'] ) && ! PHPFOX_IS_AJAX && ! defined ( 'FEED_LOAD_NEW_FEEDS' ) && ! defined ( 'FEED_LOAD_MORE_NEWS' )): ?>
  </div>
<?php endif; ?>


<?php if ($this->_aVars['sCustomViewType'] === null && ! defined ( 'FEED_LOAD_NEW_FEEDS' )): ?>
<?php if (defined ( 'PHPFOX_IN_DESIGN_MODE' )): ?>
<?php else: ?>
<?php if (count ( $this->_aVars['aFeeds'] ) || ( isset ( $this->_aVars['bForceReloadOnPage'] ) && $this->_aVars['bForceReloadOnPage'] )): ?>
<?php if (! ( defined ( 'FEED_LOAD_NEW_NEWS' ) && FEED_LOAD_NEW_NEWS )): ?>
  <div id="feed_view_more">
<?php if ($this->_aVars['bIsHashTagPop']): ?>
<?php if (count ( $this->_aVars['aFeeds'] ) > 8): ?>
    <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('hashtag');  echo $this->_aVars['sIsHashTagSearch']; ?>/page_1/" class="global_view_more no_ajax_link" style="display:block;"><?php echo Phpfox::getPhrase('feed.view_more'); ?></a>
<?php endif; ?>
<?php else: ?>
    <div id="js_feed_pass_info" style="display:none;">page=<?php echo $this->_aVars['iFeedNextPage'];  if (defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] )): ?>&profile_user_id=<?php echo $this->_aVars['aUser']['user_id'];  endif;  if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>&callback_module_id=<?php echo $this->_aVars['aFeedCallback']['module']; ?>&callback_item_id=<?php echo $this->_aVars['aFeedCallback']['item_id'];  endif; ?>&year=<?php echo $this->_aVars['sTimelineYear']; ?>&month=<?php echo $this->_aVars['sTimelineMonth'];  if (! empty ( $this->_aVars['sIsHashTagSearch'] )): ?>&hashtagsearch=<?php echo $this->_aVars['sIsHashTagSearch'];  endif; ?></div>
    <div id="feed_view_more_loader"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></div>
    <a <?php if (! PHPFOX_IS_AJAX && ! defined ( 'FEED_LOAD_NEW_FEEDS' ) && ! defined ( 'FEED_LOAD_MORE_NEWS' ) && isset ( $this->_aVars['bForceReloadOnPage'] ) && $this->_aVars['bForceReloadOnPage']): ?> style="text-indent:-1000px; overflow:hidden; background:transparent; border:0px;"<?php endif; ?> href="<?php if (Phpfox_Module ::instance()->getFullControllerName() == 'core.index-visitor'):  echo Phpfox::getLib('phpfox.url')->makeUrl('core.index-visitor', array('page' => $this->_aVars['iFeedNextPage']));  else:  echo Phpfox::getLib('phpfox.url')->makeUrl('current', array('page' => $this->_aVars['iFeedNextPage']));  endif; ?>" onclick="$(this).hide(); $('#feed_view_more_loader').show();var oLastFeed = $('.js_parent_feed_entry').last();var iLastFeedId = (oLastFeed) ? oLastFeed.attr('id') : null; $.ajaxCall('feed.viewMore', 'page=<?php echo $this->_aVars['iFeedNextPage'];  if (defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] )): ?>&profile_user_id=<?php echo $this->_aVars['aUser']['user_id'];  endif;  if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>&callback_module_id=<?php echo $this->_aVars['aFeedCallback']['module']; ?>&callback_item_id=<?php echo $this->_aVars['aFeedCallback']['item_id'];  endif; ?>&year=<?php echo $this->_aVars['sTimelineYear']; ?>&month=<?php echo $this->_aVars['sTimelineMonth'];  if (! empty ( $this->_aVars['sIsHashTagSearch'] )): ?>&hashtagsearch=<?php echo $this->_aVars['sIsHashTagSearch'];  endif; ?>&last-feed-id='+iLastFeedId, 'GET'); return false;" class="global_view_more no_ajax_link"><?php echo Phpfox::getPhrase('feed.view_more'); ?></a>

<?php endif; ?>
  </div>
<?php endif; ?>
<?php else: ?>
<?php if (defined ( 'PHPFOX_IS_USER_PROFILE' ) && Profile_Service_Profile ::instance()->timeline()): ?>
<?php Phpfox::getBlock('user.birth', array()); ?>
<?php else: ?>
<?php if (! defined ( 'FEED_LOAD_NEW_FEEDS' )): ?>
  <div class="message js_no_feed_to_show"><?php echo Phpfox::getPhrase('feed.there_are_no_new_feeds_to_view_at_this_time'); ?></div>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php if (! PHPFOX_IS_AJAX || ( PHPFOX_IS_AJAX && count ( $this->_aVars['aFeedVals'] ) )): ?>
  </div>
<?php endif; ?>

<?php if (Phpfox ::getParam('feed.refresh_activity_feed') > 0): ?>
  <script type="text/javascript">
    window.$iCheckForNewFeedsTime = <?php echo Phpfox::getParam('feed.refresh_activity_feed'); ?>;
  </script>
<?php endif; ?>
<?php endif; ?>

<script type="text/javascript">
  $Behavior.hideEmptyActionList = function() {
    $('.feed_options_holder ul.dropdown-menu').each(function() {
      if ($(this).find('li').length == 0) {
        oParent = $(this).parent('.feed_options_holder');
        if (oParent) {
            oParent.find('a.feed_options:first').hide();
        }
      }
    });
  };
</script>

		
		
<?php if (( isset ( $this->_aVars['sHeader'] ) && ( ! PHPFOX_IS_AJAX || isset ( $this->_aVars['bPassOverAjaxCall'] ) || isset ( $this->_aVars['bIsAjaxLoader'] ) ) ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Theme_Service_Theme ::instance()->isInDnDMode())): ?>
	</div>
<?php if (isset ( $this->_aVars['aFooter'] ) && count ( $this->_aVars['aFooter'] )): ?>
	<div class="bottom">
<?php if (count ( $this->_aVars['aFooter'] ) == 1): ?>
<?php if (count((array)$this->_aVars['aFooter'])):  $this->_aPhpfoxVars['iteration']['block'] = 0;  foreach ((array) $this->_aVars['aFooter'] as $this->_aVars['sPhrase'] => $this->_aVars['sLink']):  $this->_aPhpfoxVars['iteration']['block']++; ?>

<?php if ($this->_aVars['sLink'] == '#'): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','class' => 'ajax_image')); ?>
<?php endif; ?>
			<a class="btn btn-block btn-default" href="<?php echo $this->_aVars['sLink']; ?>" id="js_block_bottom_link_<?php echo $this->_aPhpfoxVars['iteration']['block']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a>
<?php endforeach; endif; ?>
<?php else: ?>
		<ul>
<?php if (count((array)$this->_aVars['aFooter'])):  $this->_aPhpfoxVars['iteration']['block'] = 0;  foreach ((array) $this->_aVars['aFooter'] as $this->_aVars['sPhrase'] => $this->_aVars['sLink']):  $this->_aPhpfoxVars['iteration']['block']++; ?>

				<li id="js_block_bottom_<?php echo $this->_aPhpfoxVars['iteration']['block']; ?>"<?php if ($this->_aPhpfoxVars['iteration']['block'] == 1): ?> class="first"<?php endif; ?>>
<?php if ($this->_aVars['sLink'] == '#'): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','class' => 'ajax_image')); ?>
<?php endif; ?>
					<a href="<?php echo $this->_aVars['sLink']; ?>" id="js_block_bottom_link_<?php echo $this->_aPhpfoxVars['iteration']['block']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a>
				</li>
<?php endforeach; endif; ?>
		</ul>
<?php endif; ?>
	</div>
<?php endif; ?>
</div>
<?php endif; ?>
<?php unset($this->_aVars['sHeader'], $this->_aVars['sComponent'], $this->_aVars['aFooter'], $this->_aVars['sBlockBorderJsId'], $this->_aVars['bBlockDisableSort'], $this->_aVars['bBlockCanMove'], $this->_aVars['aEditBar'], $this->_aVars['sDeleteBlock'], $this->_aVars['sBlockTitleBar'], $this->_aVars['sBlockJsId'], $this->_aVars['sCustomClassName'], $this->_aVars['aMenu']); ?>
