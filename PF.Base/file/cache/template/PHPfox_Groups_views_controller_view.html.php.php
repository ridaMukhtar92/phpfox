<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:24 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: controller.html.php 64 2009-01-19 15:05:54Z Raymond_Benc $
 */
 
 

?>

<?php if (( isset ( $this->_aVars['app_content'] ) )): ?>
<?php echo $this->_aVars['app_content']; ?>
<?php else: ?>

<?php if ($this->_aVars['aPage']['view_id'] == '1'): ?>
	<div class="message js_moderation_off" id="js_approve_message">
<?php echo _p('This group is pending an Admins approval before it can be displayed publicly.'); ?>
	</div>
<?php endif; ?>

<?php if ($this->_aVars['bCanViewPage']): ?>
<?php if (isset ( $this->_aVars['aWidget'] )): ?>
		<div class="block p_10 item_view_content">
<?php echo Phpfox::getLib('phpfox.parse.output')->parse($this->_aVars['aWidget']['text']); ?>
		</div>
<?php elseif ($this->_aVars['sCurrentModule'] == 'info' && ! $this->_aVars['iViewCommentId']): ?>
		<div class="block p_10 item_view_content">
<?php echo Phpfox::getLib('phpfox.parse.output')->parse($this->_aVars['aPage']['text']); ?>
		</div>
<?php elseif ($this->_aVars['sCurrentModule'] == 'pending'): ?>
<?php if (isset ( $this->_aVars['aPendingUsers'] ) && count ( $this->_aVars['aPendingUsers'] )): ?>
<?php if (count((array)$this->_aVars['aPendingUsers'])):  $this->_aPhpfoxVars['iteration']['pendingusers'] = 0;  foreach ((array) $this->_aVars['aPendingUsers'] as $this->_aVars['aPendingUser']):  $this->_aPhpfoxVars['iteration']['pendingusers']++; ?>

				<div id="js_pages_user_entry_<?php echo $this->_aVars['aPendingUser']['signup_id']; ?>" class="user_rows">
<?php if (Phpfox ::getService('groups')->isAdmin($this->_aVars['aPage']['page_id'])): ?>
					<div class="_moderator">
						<a href="#<?php echo $this->_aVars['aPendingUser']['signup_id']; ?>" class="moderate_link built" rel="pages"><i class="fa"></i></a>
					</div>
<?php endif; ?>
					<div class="user_rows_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aPendingUser'],'suffix' => '_120_square','max_width' => '120','max_height' => '120')); ?>
					</div>
<?php echo Phpfox::getLib('phpfox.parse.output')->shorten('<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aPendingUser']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aPendingUser']['user_name'], ((empty($this->_aVars['aPendingUser']['user_name']) && isset($this->_aVars['aPendingUser']['profile_page_id'])) ? $this->_aVars['aPendingUser']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aPendingUser']['user_id'], $this->_aVars['aPendingUser']['full_name']), Phpfox::getParam('user.maximum_length_for_full_name')) . '</a></span>', 50, '...'); ?>
				</div>
<?php endforeach; endif; ?>
<?php Phpfox::getBlock('core.moderation'); ?>
<?php else: ?>
<?php endif; ?>
<?php else: ?>
<?php if ($this->_aVars['bHasPermToViewPageFeed']): ?>
			
<?php else: ?>
<?php echo _p('Unable to view this section due to privacy settings.'); ?>
<?php endif; ?>
<?php endif; ?>
<?php else: ?>
	<div class="message">
<?php if (isset ( $this->_aVars['aPage']['is_invited'] ) && $this->_aVars['aPage']['is_invited']): ?>
<?php echo _p('You have been invited to join this community.'); ?>
<?php else: ?>
<?php echo _p('Due to privacy settings this page is not visible.'); ?>
<?php if ($this->_aVars['aPage']['page_type'] == '1' && $this->_aVars['aPage']['reg_method'] == '2'): ?>
<?php echo _p('This group is also "Invite Only".'); ?>
<?php endif; ?>
<?php endif; ?>
	</div>
<?php endif; ?>

<?php endif; ?>
