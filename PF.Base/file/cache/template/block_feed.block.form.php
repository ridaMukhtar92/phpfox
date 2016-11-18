<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:08 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: display.html.php 4176 2012-05-16 10:49:38Z Raymond_Benc $
 */



?>
<?php if (! defined ( 'PHPFOX_IS_USER_PROFILE' ) || $this->_aVars['aUser']['user_id'] == Phpfox ::getUserId() || ( Phpfox ::getUserParam('profile.can_post_comment_on_profile') && Phpfox ::getService('user.privacy')->hasAccess('' . $this->_aVars['aUser']['user_id'] . '' , 'feed.share_on_wall' ) )): ?>
<div class="activity_feed_form_share">
  <div class="activity_feed_form_share_process"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','class' => 'v_middle')); ?></div>
<?php if (! isset ( $this->_aVars['bSkipShare'] )): ?>
  <ul class="activity_feed_form_attach">
    <li class="share">
      <a role="button"><?php echo Phpfox::getPhrase('feed.share'); ?>:</a>
    </li>
<?php if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>
    <li><a href="#" rel="global_attachment_status" class="global_attachment_status active"><div><?php echo Phpfox::getPhrase('feed.post'); ?><span class="activity_feed_link_form_ajax"><?php echo $this->_aVars['aFeedCallback']['ajax_request']; ?></span></div><div class="drop"></div></a></li>
<?php elseif (! isset ( $this->_aVars['bFeedIsParentItem'] ) && ( ! defined ( 'PHPFOX_IS_USER_PROFILE' ) || ( defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] ) && $this->_aVars['aUser']['user_id'] == Phpfox ::getUserId()))): ?>
    <li><a href="#" rel="global_attachment_status" class="global_attachment_status active"><div><?php echo Phpfox::getPhrase('feed.status'); ?><span class="activity_feed_link_form_ajax">user.updateStatus</span></div><div class="drop"></div></a></li>
<?php else: ?>
    <li><a href="#" rel="global_attachment_status" class="global_attachment_status active"><div><?php echo Phpfox::getPhrase('feed.post'); ?><span class="activity_feed_link_form_ajax">feed.addComment</span></div><div class="drop"></div></a></li>
<?php endif; ?>
<?php if (count((array)$this->_aVars['aFeedStatusLinks'])):  $this->_aPhpfoxVars['iteration']['feedlinks'] = 0;  foreach ((array) $this->_aVars['aFeedStatusLinks'] as $this->_aVars['aFeedStatusLink']):  $this->_aPhpfoxVars['iteration']['feedlinks']++; ?>


<?php if ($this->_aPhpfoxVars['iteration']['feedlinks'] == 3 && Profile_Service_Profile ::instance()->timeline()): ?>
    <li><a href="#" rel="view_more_link" class="timeline_view_more js_hover_title"><span class="js_hover_info"><?php echo Phpfox::getPhrase('feed.view_more'); ?></span></a>
      <ul class="view_more_drop">
<?php endif; ?>

<?php if (isset ( $this->_aVars['aFeedCallback']['module'] ) && $this->_aVars['aFeedStatusLink']['no_profile']): ?>
<?php else: ?>
<?php if (( $this->_aVars['aFeedStatusLink']['no_profile'] && ! isset ( $this->_aVars['bFeedIsParentItem'] ) && ( ! defined ( 'PHPFOX_IS_USER_PROFILE' ) || ( defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] ) && $this->_aVars['aUser']['user_id'] == Phpfox ::getUserId()))) || ! $this->_aVars['aFeedStatusLink']['no_profile']): ?>
        <li>
          <a href="#" rel="global_attachment_<?php echo $this->_aVars['aFeedStatusLink']['module_id']; ?>"<?php if ($this->_aVars['aFeedStatusLink']['no_input']): ?> class="no_text_input"<?php endif; ?>>
<?php echo Phpfox::getLib('locale')->convert($this->_aVars['aFeedStatusLink']['title']); ?>
          <div>
<?php if ($this->_aVars['aFeedStatusLink']['is_frame']): ?>
            <span class="activity_feed_link_form"><?php echo Phpfox::getLib('phpfox.url')->makeUrl(''.$this->_aVars['aFeedStatusLink']['module_id'].'.frame'); ?></span>
<?php else: ?>
            <span class="activity_feed_link_form_ajax"><?php echo $this->_aVars['aFeedStatusLink']['module_id']; ?>.<?php echo $this->_aVars['aFeedStatusLink']['ajax_request']; ?></span>
<?php endif; ?>
            <span class="activity_feed_extra_info"><?php echo Phpfox::getLib('locale')->convert($this->_aVars['aFeedStatusLink']['description']); ?></span>
          </div>
          <div class="drop"></div>
          </a>
        </li>
<?php endif; ?>
<?php endif; ?>

<?php if ($this->_aPhpfoxVars['iteration']['feedlinks'] == count ( $this->_aVars['aFeedStatusLinks'] ) && Profile_Service_Profile ::instance()->timeline()): ?>
      </ul>
    </li>
<?php endif; ?>

<?php endforeach; endif; ?>
  </ul>
<?php endif; ?>
  <div class="clear"></div>
</div>

<div class="activity_feed_form">
  <form method="post" action="#" id="js_activity_feed_form" enctype="multipart/form-data">
    <div id="js_custom_privacy_input_holder"></div>
<?php if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>
    <div><input type="hidden" name="val[callback_item_id]" value="<?php echo $this->_aVars['aFeedCallback']['item_id']; ?>" /></div>
    <div><input type="hidden" name="val[callback_module]" value="<?php echo $this->_aVars['aFeedCallback']['module']; ?>" /></div>
    <div><input type="hidden" name="val[parent_user_id]" value="<?php echo $this->_aVars['aFeedCallback']['item_id']; ?>" /></div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['bFeedIsParentItem'] )): ?>
    <div><input type="hidden" name="val[parent_table_change]" value="<?php echo $this->_aVars['sFeedIsParentItemModule']; ?>" /></div>
<?php endif; ?>
<?php if (defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] ) && $this->_aVars['aUser']['user_id'] != Phpfox ::getUserId()): ?>
    <div><input type="hidden" name="val[parent_user_id]" value="<?php echo $this->_aVars['aUser']['user_id']; ?>" /></div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['bForceFormOnly'] ) && $this->_aVars['bForceFormOnly']): ?>
    <div><input type="hidden" name="force_form" value="1" /></div>
<?php endif; ?>
    <div class="activity_feed_form_holder">

      <div id="activity_feed_upload_error" style="display:none;"><div class="error_message" id="activity_feed_upload_error_message"></div></div>

      <div class="global_attachment_holder_section" id="global_attachment_status" style="display:block;">
        <div id="global_attachment_status_value" style="display:none;"></div>
        <textarea <?php if (isset ( $this->_aVars['aPage'] )): ?> id="pageFeedTextarea" <?php else: ?> <?php if (isset ( $this->_aVars['aEvent'] )): ?> id="eventFeedTextarea" <?php else: ?> <?php if (isset ( $this->_aVars['bOwnProfile'] ) && $this->_aVars['bOwnProfile'] == false): ?>id="profileFeedTextarea" <?php endif;  endif;  endif; ?> cols="60" rows="8" name="val[user_status]" placeholder="<?php if (isset ( $this->_aVars['aFeedCallback']['module'] ) || defined ( 'PHPFOX_IS_USER_PROFILE' )):  echo Phpfox::getPhrase('feed.write_something');  else:  echo Phpfox::getPhrase('feed.what_s_on_your_mind');  endif; ?>"></textarea>
<?php if (isset ( $this->_aVars['bLoadCheckIn'] ) && $this->_aVars['bLoadCheckIn'] == true): ?>
        <script type="text/javascript">
          oTranslations['feed.at_location'] = "<?php echo Phpfox::getPhrase('feed.at_location'); ?>";
        </script>
        <div id="js_location_feedback"></div>
<?php endif; ?>
      </div>

<?php if (count((array)$this->_aVars['aFeedStatusLinks'])):  foreach ((array) $this->_aVars['aFeedStatusLinks'] as $this->_aVars['aFeedStatusLink']): ?>
<?php if (! empty ( $this->_aVars['aFeedStatusLink']['module_block'] )): ?>
<?php Phpfox::getBlock($this->_aVars['aFeedStatusLink']['module_block'], array()); ?>
<?php endif; ?>
<?php endforeach; endif; ?>
<?php if (Phpfox ::isModule('egift')): ?>
<?php Phpfox::getBlock('egift.display', array()); ?>
<?php endif; ?>
    </div>
    <div class="activity_feed_form_button">
<?php if ($this->_aVars['bLoadCheckIn']): ?>
      <div id="js_location_input">
        <a class="btn btn-danger" href="#" onclick="$Core.Feed.cancelCheckIn(); return false;"><i class="fa fa-times"></i></a>
        <input type="text" id="hdn_location_name">
      </div>
<?php endif; ?>

      <div class="activity_feed_form_button_status_info">
        <textarea id="activity_feed_textarea_status_info" cols="60" rows="8" name="val[status_info]"></textarea>
      </div>
      <div class="activity_feed_form_button_position">

<?php if (( defined ( 'PHPFOX_IS_PAGES_VIEW' ) && $this->_aVars['aPage']['is_admin'] )): ?>

        <div id="activity_feed_share_this_one">
          <ul class="">
<?php if (defined ( 'PHPFOX_IS_PAGES_VIEW' ) && $this->_aVars['aPage']['is_admin'] && $this->_aVars['aPage']['page_id'] != Phpfox ::getUserBy('profile_page_id') && ( $this->_aVars['aPage']['item_type'] == 0 )): ?>
            <li>
              <input type="hidden" name="custom_pages_post_as_page" value="<?php echo $this->_aVars['aPage']['page_id']; ?>">
              <a data-toggle="dropdown" role="button" class="btn btn-lg">
                <span class="txt-prefix"><?php echo Phpfox::getPhrase('pages.posting_as'); ?>: </span>
                <span class="txt-label"><?php echo Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPage']['full_name']), 20, '...'); ?></span>
                <i class="caret"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-checkmark">
                <li>
                  <a class="is_active_image" data-toggle="privacy_item" role="button" rel="<?php echo $this->_aVars['aPage']['page_id']; ?>"><?php echo Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPage']['full_name']), 20, '...'); ?></a>
                </li>
                <li>
                  <a data-toggle="privacy_item" role="button" rel="0"><?php echo Phpfox::getLib('phpfox.parse.output')->shorten($this->_aVars['sGlobalUserFullName'], 20, '...'); ?></a>
                </li>
              </ul>
            </li>
<?php endif; ?>
<?php if ($this->_aVars['bLoadCheckIn']): ?>
            <?php
						Phpfox::getLib('template')->getBuiltFile('feed.block.checkin');
						?>
<?php endif; ?>
          </ul>
          <div class="clear"></div>
        </div>

<?php else: ?>
<?php if ($this->_aVars['bLoadCheckIn']): ?>
        <div id="activity_feed_share_this_one">
          <ul>
            <?php
						Phpfox::getLib('template')->getBuiltFile('feed.block.checkin');
						?>
          </ul>
          <div class="clear"></div>
        </div>
<?php endif; ?>
<?php endif; ?>

        <div class="activity_feed_form_button_position_button">
          <input type="submit" value="<?php echo Phpfox::getPhrase('feed.share'); ?>"  id="activity_feed_submit" class="button btn-lg btn-primary" />
        </div>
<?php if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>
<?php else: ?>
<?php if (! isset ( $this->_aVars['bFeedIsParentItem'] ) && ( ! defined ( 'PHPFOX_IS_USER_PROFILE' ) || ( defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] ) && $this->_aVars['aUser']['user_id'] == Phpfox ::getUserId()))): ?>
<?php Phpfox::getBlock('privacy.form', array('privacy_name' => 'privacy','privacy_type' => 'mini')); ?>
<?php endif; ?>
<?php endif; ?>
        <div class="clear"></div>
      </div>

<?php if (Phpfox ::getParam('feed.enable_check_in') && ( Phpfox ::getParam('core.ip_infodb_api_key') != '' || Phpfox ::getParam('core.google_api_key') != '' )): ?>
      <div id="js_add_location">
        <div><input type="hidden" id="val_location_latlng" name="val[location][latlng]"></div>
        <div><input type="hidden" id="val_location_name" name="val[location][name]"></div>
        <div id="js_add_location_suggestions" style="overflow-y: auto;"></div>
        <div id="js_feed_check_in_map"></div>
      </div>
<?php endif; ?>

    </div>
  
</form>

  <div class="activity_feed_form_iframe"></div>
</div>
<?php endif; ?>
