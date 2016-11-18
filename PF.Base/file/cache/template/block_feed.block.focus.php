<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:08 pm */ ?>
<?php

?>
<div class="activity_feed_content_text<?php if (isset ( $this->_aVars['aFeed']['comment_type_id'] ) && $this->_aVars['aFeed']['comment_type_id'] == 'poll'): ?> js_parent_module_feed_<?php echo $this->_aVars['aFeed']['comment_type_id'];  endif; ?>">


<?php if (! empty ( $this->_aVars['aFeed']['feed_mini_content'] )): ?>
	<div class="activity_feed_content_status">
		<div class="activity_feed_content_status_left">
			<img src="<?php echo $this->_aVars['aFeed']['feed_icon']; ?>" alt="" class="v_middle" /> <?php echo $this->_aVars['aFeed']['feed_mini_content']; ?>
		</div>
		<div class="activity_feed_content_status_right">
			<?php
						Phpfox::getLib('template')->getBuiltFile('feed.block.link');
						?>
		</div>
		<div class="clear"></div>
	</div>
<?php endif; ?>

<?php if (isset ( $this->_aVars['aFeed']['feed_status'] ) && ( ! empty ( $this->_aVars['aFeed']['feed_status'] ) || $this->_aVars['aFeed']['feed_status'] == '0' )): ?>
	<div class="activity_feed_content_status">
<?php if (strpos ( $this->_aVars['aFeed']['feed_status'] , '<br />' ) >= 200): ?>
<?php echo Phpfox::getLib('parse.output')->maxLine(Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aFeed']['feed_status']), 200, 'feed.view_more', true), 55)); ?>
<?php else: ?>
<?php echo Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->maxLine(Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aFeed']['feed_status']), 55)), 200, 'feed.view_more', true); ?>
<?php endif; ?>
<?php if (Phpfox ::getParam('feed.enable_check_in') && Phpfox ::getParam('core.google_api_key') != '' && isset ( $this->_aVars['aFeed']['location_name'] )): ?>
		<span class="js_location_name_hover" <?php if (isset ( $this->_aVars['aFeed']['location_latlng'] ) && isset ( $this->_aVars['aFeed']['location_latlng']['latitude'] )): ?>onmouseover="$Core.Feed.showHoverMap('<?php echo $this->_aVars['aFeed']['location_latlng']['latitude']; ?>','<?php echo $this->_aVars['aFeed']['location_latlng']['longitude']; ?>', this);"<?php endif; ?>> - <a href="<?php if (Phpfox ::getParam('core.force_https_secure_pages')): ?>https://<?php else: ?>http://<?php endif; ?>maps.google.com/maps?daddr=<?php echo $this->_aVars['aFeed']['location_latlng']['latitude']; ?>,<?php echo $this->_aVars['aFeed']['location_latlng']['longitude']; ?>" target="_blank"><?php echo Phpfox::getPhrase('feed.at_location', array('location' => $this->_aVars['aFeed']['location_name'])); ?></a>
		</span>
<?php endif; ?>
	</div>
<?php endif; ?>

	<div class="activity_feed_content_link">
<?php if ($this->_aVars['aFeed']['type_id'] == 'friend' && isset ( $this->_aVars['aFeed']['more_feed_rows'] ) && is_array ( $this->_aVars['aFeed']['more_feed_rows'] ) && count ( $this->_aVars['aFeed']['more_feed_rows'] )): ?>
<?php if (count((array)$this->_aVars['aFeed']['more_feed_rows'])):  foreach ((array) $this->_aVars['aFeed']['more_feed_rows'] as $this->_aVars['aFriends']): ?>
<?php echo $this->_aVars['aFriends']['feed_image']; ?>
<?php endforeach; endif; ?>
<?php echo $this->_aVars['aFeed']['feed_image']; ?>
<?php else: ?>

<?php if (! empty ( $this->_aVars['aFeed']['feed_image'] )): ?>
		<div class="activity_feed_content_image"<?php if (isset ( $this->_aVars['aFeed']['feed_custom_width'] )): ?> style="width:<?php echo $this->_aVars['aFeed']['feed_custom_width']; ?>;"<?php endif; ?>>
<?php if (is_array ( $this->_aVars['aFeed']['feed_image'] )): ?>
		<div class="activity_feed_multiple_image feed-img-stage-<?php echo $this->_aVars['aFeed']['total_image']; ?>">
<?php if (count((array)$this->_aVars['aFeed']['feed_image'])):  $this->_aPhpfoxVars['iteration']['image'] = 0;  foreach ((array) $this->_aVars['aFeed']['feed_image'] as $this->_aVars['sFeedImage']):  $this->_aPhpfoxVars['iteration']['image']++; ?>

			<div class="img-<?php echo $this->_aPhpfoxVars['iteration']['image']; ?>">
<?php echo $this->_aVars['sFeedImage']; ?>
			</div>
<?php endforeach; endif; ?>
		</div>
		<div class="clear"></div>
<?php else: ?>
		<a href="<?php if (isset ( $this->_aVars['aFeed']['feed_link_actual'] )):  echo $this->_aVars['aFeed']['feed_link_actual'];  else:  echo $this->_aVars['aFeed']['feed_link'];  endif; ?>"<?php if (! isset ( $this->_aVars['aFeed']['no_target_blank'] )): ?> target="_blank"<?php endif; ?> class="<?php if (isset ( $this->_aVars['aFeed']['custom_css'] )): ?> <?php echo $this->_aVars['aFeed']['custom_css']; ?> <?php endif;  if (! empty ( $this->_aVars['aFeed']['feed_image_onclick'] )):  if (! isset ( $this->_aVars['aFeed']['feed_image_onclick_no_image'] )): ?>play_link <?php endif; ?> no_ajax_link<?php endif; ?>"<?php if (! empty ( $this->_aVars['aFeed']['feed_image_onclick'] )): ?> onclick="<?php echo $this->_aVars['aFeed']['feed_image_onclick']; ?>"<?php endif;  if (! empty ( $this->_aVars['aFeed']['custom_rel'] )): ?> rel="<?php echo $this->_aVars['aFeed']['custom_rel']; ?>"<?php endif;  if (isset ( $this->_aVars['aFeed']['custom_js'] )): ?> <?php echo $this->_aVars['aFeed']['custom_js']; ?> <?php endif;  if (Phpfox ::getParam('core.no_follow_on_external_links')): ?> rel="nofollow"<?php endif; ?>><?php if (! empty ( $this->_aVars['aFeed']['feed_image_onclick'] )):  if (! isset ( $this->_aVars['aFeed']['feed_image_onclick_no_image'] )): ?><span class="play_link_img"><?php echo Phpfox::getPhrase('feed.play'); ?></span><?php endif;  endif;  echo $this->_aVars['aFeed']['feed_image']; ?></a>
<?php endif; ?>

	</div>
<?php endif; ?>

<?php if (isset ( $this->_aVars['aFeed']['feed_image_banner'] )): ?>
	<div class="feed_banner">
<?php echo $this->_aVars['aFeed']['feed_image_banner']; ?>
<?php endif; ?>

<?php if (isset ( $this->_aVars['aFeed']['load_block'] )): ?>
<?php Phpfox::getBlock($this->_aVars['aFeed']['load_block'], array('this_feed_id' => $this->_aVars['aFeed']['feed_id'])); ?>
<?php else: ?>

		<div class="feed_block_title_content <?php if (( ! empty ( $this->_aVars['aFeed']['feed_content'] ) || ! empty ( $this->_aVars['aFeed']['feed_custom_html'] ) ) && empty ( $this->_aVars['aFeed']['feed_image'] ) && empty ( $this->_aVars['aFeed']['feed_image_banner'] )): ?> activity_feed_content_no_image<?php endif;  if (! empty ( $this->_aVars['aFeed']['feed_image'] )): ?> activity_feed_content_float<?php endif; ?>"<?php if (isset ( $this->_aVars['aFeed']['feed_custom_width'] )): ?> style="margin-left:<?php echo $this->_aVars['aFeed']['feed_custom_width']; ?>;"<?php endif; ?>>
<?php if (! empty ( $this->_aVars['aFeed']['feed_title'] ) || $this->_aVars['aFeed']['type_id'] == 'link'): ?>
<?php if (isset ( $this->_aVars['aFeed']['feed_title_sub'] )): ?>
						<span class="user_profile_link_span" id="js_user_name_link_<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aFeed']['feed_title_sub']); ?>">
<?php endif; ?>
					<a href="<?php if (isset ( $this->_aVars['aFeed']['feed_link_actual'] )):  echo $this->_aVars['aFeed']['feed_link_actual'];  else:  echo $this->_aVars['aFeed']['feed_link'];  endif; ?>" class="activity_feed_content_link_title"<?php if (isset ( $this->_aVars['aFeed']['feed_title_extra_link'] )): ?> target="_blank"<?php endif;  if (Phpfox ::getParam('core.no_follow_on_external_links')): ?> rel="nofollow"<?php endif; ?>><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aFeed']['feed_title']), 30); ?></a>
<?php if (isset ( $this->_aVars['aFeed']['feed_title_sub'] )): ?>
						</span>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_title_extra'] )): ?>
		<div class="activity_feed_content_link_title_link">
			<a href="<?php echo $this->_aVars['aFeed']['feed_title_extra_link']; ?>" target="_blank"<?php if (Phpfox ::getParam('core.no_follow_on_external_links')): ?> rel="nofollow"<?php endif; ?>><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aFeed']['feed_title_extra']); ?></a>
		</div>
<?php endif; ?>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_content'] )): ?>
		<div class="activity_feed_content_display">
<?php echo Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aFeed']['feed_content']); ?>
		</div>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_custom_html'] )): ?>
		<div class="activity_feed_content_display_custom">
<?php echo $this->_aVars['aFeed']['feed_custom_html']; ?>
		</div>
<?php endif; ?>

<?php if (! empty ( $this->_aVars['aFeed']['app_content'] )): ?>
<?php echo $this->_aVars['aFeed']['app_content']; ?>
<?php endif; ?>

<?php if (! empty ( $this->_aVars['aFeed']['parent_module_id'] )): ?>
<?php Phpfox::getBlock('feed.mini', array('parent_feed_id' => $this->_aVars['aFeed']['parent_feed_id'],'parent_module_id' => $this->_aVars['aFeed']['parent_module_id'])); ?>
<?php endif; ?>

<?php if (( isset ( $this->_aVars['aFeed']['parent_is_app'] ) ) && empty ( $this->_aVars['aFeed']['parent_module_id'] )): ?>
		<div class="feed_is_child" style="display: block">
			<div class="feed_stream" data-feed-url="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('feed.stream', array('id' => $this->_aVars['aFeed']['parent_is_app'])); ?>"></div>
		</div>
<?php endif; ?>

	</div>

<?php endif; ?>

<?php if (isset ( $this->_aVars['aFeed']['feed_image_banner'] )): ?>
</div>
<?php endif; ?>

<?php if (! empty ( $this->_aVars['aFeed']['feed_image'] )): ?>
<div class="clear"></div>
<?php endif; ?>
<?php endif; ?>
</div>
</div>
