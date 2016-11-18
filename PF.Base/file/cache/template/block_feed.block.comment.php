<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:08 pm */ ?>
<?php

?>

<?php if (( isset ( $this->_aVars['showOnlyComments'] ) )): ?>
<?php if (Phpfox ::isModule('comment') && ( isset ( $this->_aVars['aFeed']['comments'] ) && count ( $this->_aVars['aFeed']['comments'] ) )): ?>
<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('feed.comments'); ?>?type=<?php echo $this->_aVars['aFeed']['type_id']; ?>&id=<?php echo $this->_aVars['aFeed']['item_id']; ?>&page=<?php echo $this->_aVars['nextIteration'];  if (defined ( 'PHPFOX_FEED_STREAM_MODE' )): ?>&stream-mode=1<?php endif; ?>" class="load_more_comments ajax"  onclick="$(this).addClass('active');"><i class="fa fa-spin fa-circle-o-notch"></i><span><?php echo Phpfox::getPhrase('comment.view_previous_comments'); ?></span></a>
<?php if (count((array)$this->_aVars['aFeed']['comments'])):  $this->_aPhpfoxVars['iteration']['comments'] = 0;  foreach ((array) $this->_aVars['aFeed']['comments'] as $this->_aVars['aComment']):  $this->_aPhpfoxVars['iteration']['comments']++; ?>

<?php
						Phpfox::getLib('template')->getBuiltFile('comment.block.mini');
						?>
<?php endforeach; endif; ?>
<?php endif; ?>
<?php else: ?>
<?php if (isset ( $this->_aVars['bIsViewingComments'] ) && $this->_aVars['bIsViewingComments']): ?>
		<div id="comment-view"><a name="#comment-view"></a></div>
		<div class="message js_feed_comment_border">
<?php echo Phpfox::getPhrase('comment.viewing_a_single_comment'); ?>
			<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>"><?php echo Phpfox::getPhrase('comment.view_all_comments'); ?></a>
		</div>
		<script>
			<?php echo '
			$Ready(function() {
				var c = $(\'#comment-view\');
				if (c.length && !c.hasClass(\'completed\') && c.is(\':visible\')) {
					c.addClass(\'completed\');
					$("html, body").animate({ scrollTop: (c.offset().top - 80) });
				}
			});
			'; ?>

		</script>
<?php endif; ?>

<?php if (isset ( $this->_aVars['sFeedType'] )): ?>
		<div class="js_parent_feed_entry parent_item_feed">
<?php endif; ?>

<div class="js_feed_comment_border">
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_comment_border')) ? eval($sPlugin) : false); ?>

<div id="js_feed_like_holder_<?php echo $this->_aVars['aFeed']['type_id']; ?>_<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="comment_mini_content_holder<?php if (( isset ( $this->_aVars['aFeed']['is_app'] ) && $this->_aVars['aFeed']['is_app'] && isset ( $this->_aVars['aFeed']['app_object'] ) )): ?> _is_app<?php endif; ?>"<?php if (( isset ( $this->_aVars['aFeed']['is_app'] ) && $this->_aVars['aFeed']['is_app'] && isset ( $this->_aVars['aFeed']['app_object'] ) )): ?> data-app-id="<?php echo $this->_aVars['aFeed']['app_object']; ?>"<?php endif; ?>>
        <div class="comment_mini_content_holder_icon"<?php if (isset ( $this->_aVars['aFeed']['marks'] ) || ( isset ( $this->_aVars['aFeed']['likes'] ) && is_array ( $this->_aVars['aFeed']['likes'] ) ) || ( isset ( $this->_aVars['aFeed']['total_comment'] ) && $this->_aVars['aFeed']['total_comment'] > 0 )):  else:  endif; ?>></div>
			<div class="comment_mini_content_border">

				<div class="comment_mini_content_commands">
<?php if (isset ( $this->_aVars['aFeed']['like_type_id'] ) && ! ( isset ( $this->_aVars['aFeed']['disable_like_function'] ) && $this->_aVars['aFeed']['disable_like_function'] )): ?>
					<div class="feed_like_link">
<?php if (isset ( $this->_aVars['aFeed']['like_item_id'] )): ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['like_item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php else: ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php endif; ?>
					</div>
<?php endif; ?>

<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_comment_commands_1')) ? eval($sPlugin) : false); ?>

<?php if (isset ( $this->_aVars['aFeed']['like_type_id'] ) && ! ( isset ( $this->_aVars['aFeed']['disable_like_function'] ) && $this->_aVars['aFeed']['disable_like_function'] )): ?>
					<div class="js_comment_like_holder" id="js_feed_like_holder_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
						<div id="js_like_body_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
							<?php
						Phpfox::getLib('template')->getBuiltFile('like.block.display');
						?>
						</div>
					</div>
<?php endif; ?>

<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_comment_commands_2')) ? eval($sPlugin) : false); ?>

<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
					<div class="feed_options_holder">
						<a role="button" data-toggle="dropdown" href="#" class="feed_options"></a>
						<?php
						Phpfox::getLib('template')->getBuiltFile('feed.block.link');
						?>
					</div>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && ! isset ( $this->_aVars['aFeed']['no_share'] ) && ! empty ( $this->_aVars['aFeed']['type_id'] ) && ( ! isset ( $this->_aVars['bGroupIsShareable'] ) || $this->_aVars['bGroupIsShareable'] )): ?>
					<div class="feed_comment_share_holder">
<?php $this->assign('empty', false); ?>
<?php if ($this->_aVars['aFeed']['privacy'] == '0' || $this->_aVars['aFeed']['privacy'] == '1' || $this->_aVars['aFeed']['privacy'] == '2'): ?>
<?php Phpfox::getBlock('share.link', array('type' => 'feed','display' => 'menu_btn','url' => $this->_aVars['aFeed']['feed_link'],'title' => $this->_aVars['aFeed']['feed_title'],'sharefeedid' => $this->_aVars['aFeed']['item_id'],'sharemodule' => $this->_aVars['aFeed']['type_id'])); ?>
<?php else: ?>
<?php Phpfox::getBlock('share.link', array('type' => 'feed','display' => 'menu_btn','url' => $this->_aVars['aFeed']['feed_link'],'title' => $this->_aVars['aFeed']['feed_title'])); ?>
<?php endif; ?>
					</div>
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_comment_commands_3')) ? eval($sPlugin) : false); ?>
				</div>
<?php if (Phpfox ::isModule('comment') && Phpfox ::getParam('feed.allow_comments_on_feeds')): ?>
		    	<div id="js_feed_comment_post_<?php echo $this->_aVars['aFeed']['feed_id']; ?>" class="js_feed_comment_view_more_holder">
					
<?php if (isset ( $this->_aVars['aFeed']['comments'] ) && count ( $this->_aVars['aFeed']['comments'] )): ?>
		<div>
			<div class="comment_pager_holder" id="js_feed_comment_pager_<?php echo $this->_aVars['aFeed']['type_id'];  echo $this->_aVars['aFeed']['item_id']; ?>">
<?php if (Phpfox ::isModule('comment') && $this->_aVars['aFeed']['total_comment'] > Phpfox ::getParam('comment.comment_page_limit')): ?>
				<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('feed.comments'); ?>?type=<?php echo $this->_aVars['aFeed']['type_id']; ?>&id=<?php echo $this->_aVars['aFeed']['item_id']; ?>&page=2<?php if (defined ( 'PHPFOX_FEED_STREAM_MODE' )): ?>&stream-mode=1<?php endif; ?>" class="load_more_comments ajax"  onclick="$(this).addClass('active');"><i class="fa fa-spin fa-circle-o-notch"></i><span><?php echo Phpfox::getPhrase('comment.view_previous_comments'); ?></span></a>
<?php endif; ?>
			</div>
			<div id="js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'):  else: ?> class="comment-limit" data-limit="<?php if (( $this->_aVars['thisLimit'] = Phpfox ::getParam('comment.total_comments_in_activity_feed'))):  echo $this->_aVars['thisLimit'];  endif; ?>"<?php endif; ?>>
<?php if (count((array)$this->_aVars['aFeed']['comments'])):  $this->_aPhpfoxVars['iteration']['comments'] = 0;  foreach ((array) $this->_aVars['aFeed']['comments'] as $this->_aVars['aComment']):  $this->_aPhpfoxVars['iteration']['comments']++; ?>

				<?php
						Phpfox::getLib('template')->getBuiltFile('comment.block.mini');
						?>
<?php endforeach; endif; ?>
			</div><!-- // #js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
		</div>
<?php else: ?>
			<div id="js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"></div><!-- // #js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
<?php endif; ?>
		</div><!-- // #js_feed_comment_post_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->		
<?php endif; ?>
		
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini'): ?>

<?php else: ?>
<?php if (Phpfox ::isModule('comment') && isset ( $this->_aVars['aFeed']['comment_type_id'] ) && Phpfox ::getUserParam('comment.can_post_comments') && Phpfox ::getParam('feed.allow_comments_on_feeds') && Phpfox ::isUser() && $this->_aVars['aFeed']['can_post_comment'] && Phpfox ::getUserParam('feed.can_post_comment_on_feed') && ( ! isset ( $this->_aVars['bIsGroupMember'] ) || $this->_aVars['bIsGroupMember'] )): ?>
<?php if (Phpfox ::isModule('captcha') && Phpfox ::getUserParam('captcha.captcha_on_comment')): ?>
<?php Phpfox::getBlock('captcha.form', array('sType' => 'comment','captcha_popup' => true)); ?>
<?php endif; ?>
		<div class="js_feed_comment_form" <?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> id="js_feed_comment_form_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"<?php endif; ?>>
			<div class="js_comment_feed_textarea_browse"></div>
			<div class="<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> feed_item_view<?php endif; ?> comment_mini comment_mini_end">
				<form method="post" action="#" class="js_comment_feed_form">
<?php if (( isset ( $this->_aVars['aFeed']['is_app'] ) && $this->_aVars['aFeed']['is_app'] && isset ( $this->_aVars['aFeed']['app_object'] ) )): ?>
					<div><input type="hidden" name="val[app_object]" value="<?php echo $this->_aVars['aFeed']['app_object']; ?>" /></div>
<?php endif; ?>
					<div><input type="hidden" name="val[type]" value="<?php echo $this->_aVars['aFeed']['comment_type_id']; ?>" /></div>			
					<div><input type="hidden" name="val[item_id]" value="<?php echo $this->_aVars['aFeed']['item_id']; ?>" /></div>
					<div><input type="hidden" name="val[parent_id]" value="0" class="js_feed_comment_parent_id" /></div>
					<div><input type="hidden" name="val[is_via_feed]" value="<?php echo $this->_aVars['aFeed']['feed_id']; ?>" /></div>
<?php if (defined ( 'PHPFOX_IS_THEATER_MODE' )): ?>
					<div><input type="hidden" name="ajax_post_photo_theater" value="1" /></div>	
<?php endif; ?>
<?php if (Phpfox ::isUser()): ?>
					<div class="comment_mini_image"<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> <?php else: ?>style="display:none;"<?php endif; ?>>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aGlobalUser'],'suffix' => '_50_square','max_width' => '32','max_height' => '32')); ?>
					</div>				
<?php endif; ?>
					<div class="<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>comment_mini_content <?php endif; ?>comment_mini_textarea_holder">
						<div><input type="hidden" name="val[default_feed_value]" value="<?php echo Phpfox::getPhrase('feed.write_a_comment'); ?>" /></div>						
						<div class="js_comment_feed_value"><?php echo Phpfox::getPhrase('feed.write_a_comment'); ?></div>
						<textarea cols="60" rows="4" name="val[text]" class="js_comment_feed_textarea" id="js_feed_comment_form_textarea_<?php echo $this->_aVars['aFeed']['feed_id']; ?>" placeholder="<?php echo Phpfox::getPhrase('feed.write_a_comment'); ?>"></textarea>
						<div class="js_feed_comment_process_form"><i class="fa fa-spin fa-circle-o-notch"></i></div>
					</div>
				
</form>

			</div>
		</div>
<?php endif; ?>
<?php endif; ?>
	</div><!-- // .comment_mini_content_border -->
</div><!-- // .comment_mini_content_holder -->
</div>
<?php if (isset ( $this->_aVars['sFeedType'] )): ?>
</div>
<?php endif; ?>
<?php endif; ?>
