<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:21 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: search.html.php 5574 2013-03-27 13:02:04Z Miguel_Espinoza $
 */
 
 

?>
<?php if (! $this->_aVars['bSearch']): ?>
<script type="text/javascript">
	var sPrivacyInputName = '<?php echo $this->_aVars['sPrivacyInputName']; ?>';
	var sSearchByValue = '';
	var sFriendModuleId = '<?php echo $this->_aVars['sFriendModuleId']; ?>';
	var sFriendItemId = '<?php echo $this->_aVars['sFriendItemId']; ?>';
<?php echo '
	$Behavior.searchFriendBlock = function()
	{
		sSearchByValue = $(\'.js_is_enter\').val();		
		
		if ($.browser.mozilla) 
		{
			$(\'.js_is_enter\').keypress(checkForEnter);
		} 
		else 
		{
			$(\'.js_is_enter\').keydown(checkForEnter);
		}		
	};

	$Behavior.friend_block_search_init = function()
	{		
		updateCheckBoxes();
	};
		function updateFriendsList()
		{		
			updateCheckBoxes();
		}
		
		function removeFromSelectList(sId)
		{
			$(\'.js_cached_friend_id_\' + sId + \'\').remove();
			$(\'#js_friends_checkbox_\' + sId).attr(\'checked\', false);
			$(\'#js_friend_input_\' + sId).remove();
			$(\'.js_cached_friend_id_\' + sId).remove(); return false;		
			
			return false;
		}
		
		function addFriendToSelectList(oObject, sId, bForce)
		{	
			if (oObject.checked || bForce)
			{
				iCnt = 0;
				$(\'.js_cached_friend_name\').each(function()
				{			
					iCnt++;
				});			

				if (function_exists(\'plugin_addFriendToSelectList\'))
				{
					plugin_addFriendToSelectList(sId);
				}
				'; ?>

				$('#js_selected_friends').append('<div class="js_cached_friend_name row1 js_cached_friend_id_' + sId + '' + (iCnt ? '' : ' row_first') + '"><span style="display:none;">' + sId + '</span><input type="hidden" name="val[' + sPrivacyInputName + '][]" value="' + sId + '" /><a href="#" onclick="return removeFromSelectList(' + sId + ');"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/delete.gif','class' => "delete_hover v_middle")); ?></a> ' + $('#js_friend_' + sId + '').html() + '</div>');			
				<?php echo '
			}
			else
			{
				if (function_exists(\'plugin_removeFriendToSelectList\'))
				{
					plugin_removeFriendToSelectList(sId);
				}			
				
				$(\'.js_cached_friend_id_\' + sId).remove();
				$(\'#js_friend_input_\' + sId).remove();
			}
		}
		
		function cancelFriendSelection()
		{
			if (function_exists(\'plugin_cancelFriendSelection\'))
			{
				plugin_cancelFriendSelection();
			}			
			
			$(\'#js_selected_friends\').html(\'\');	
			$Core.loadInit(); 
			tb_remove();
		}
		
		function updateCheckBoxes()
		{
			iCnt = 0;
			$(\'.js_cached_friend_name\').each(function()
			{			
				iCnt++;
				$(\'#js_friends_checkbox_\' + $(this).find(\'span\').html()).attr(\'checked\', true);
			});
			
			$(\'#js_selected_count\').html((iCnt / 2));
		}
		
		function showLoader()
		{
			$(\'#js_friend_search_content\').html($.ajaxProcess(oTranslations[\'friend.loading\'], \'large\'));
		}	
		
		function checkForEnter(event)
		{
			if (event.keyCode == 13) 
			{
				showLoader();
				
				$.ajaxCall(\'friend.searchAjax\', \'friend_module_id=\'+ sFriendModuleId + \'&friend_item_id=\' + sFriendItemId + \'&find=\' + $(\'#js_find_friend\').val() + \'&input=\' + sPrivacyInputName + \'\');
			
				return false;	
			}
		}
		
		
'; ?>

</script>
<div id="js_friend_loader_info"></div>
<div id="js_friend_loader">
<?php if ($this->_aVars['sFriendType'] != 'mail'): ?>
<?php if (! $this->_aVars['bInForm']): ?>
	<form method="post" onsubmit="showLoader(); $.ajaxCall('friend.searchAjax', 'friend_module_id=<?php echo $this->_aVars['sFriendModuleId']; ?>&amp;friend_item_id=<?php echo $this->_aVars['sFriendItemId']; ?>&amp;find=' + $('#js_find_friend').val() + '&amp;input=<?php echo $this->_aVars['sPrivacyInputName']; ?>'); return false;">
<?php endif; ?>
		<input type="text" class="js_is_enter v_middle default_value" name="find" placeholder="<?php echo Phpfox::getPhrase('friend.search_by_email_full_name_or_user_name'); ?>" onfocus="if (this.value == sSearchByValue)<?php echo '{'; ?>
this.value = ''; $(this).removeClass('default_value');<?php echo '}'; ?>
" onblur="if (this.value == '')<?php echo '{'; ?>
this.value = sSearchByValue; $(this).addClass('default_value');<?php echo '}'; ?>
" id="js_find_friend" autocomplete="off" size="30" />
<?php if (! $this->_aVars['bInForm']): ?>
	
</form>

<?php endif; ?>
<?php else: ?>
	<input type="text" class="js_is_enter v_middle default_value" name="find" value="<?php echo Phpfox::getPhrase('friend.search_by_email_full_name_or_user_name'); ?>" onfocus="if (this.value == sSearchByValue)<?php echo '{'; ?>
this.value = ''; $(this).removeClass('default_value');<?php echo '}'; ?>
" onblur="if (this.value == '')<?php echo '{'; ?>
this.value = sSearchByValue; $(this).addClass('default_value');<?php echo '}'; ?>
" id="js_find_friend" autocomplete="off" size="30" />
	<input type="button" value="<?php echo Phpfox::getPhrase('friend.find'); ?>" onclick="showLoader(); $.ajaxCall('friend.searchAjax', 'friend_module_id=<?php echo $this->_aVars['sFriendModuleId']; ?>&amp;friend_item_id=<?php echo $this->_aVars['sFriendItemId']; ?>&amp;find=' + $('#js_find_friend').val() + '&amp;input=<?php echo $this->_aVars['sPrivacyInputName']; ?>&amp;type=<?php echo $this->_aVars['sFriendType']; ?>'); return false;" class="button v_middle" />
<?php endif; ?>
<?php endif; ?>
	<div id="js_friend_search_content">
		<div class="label_flow" style="height:200px;">
<?php if (count((array)$this->_aVars['aFriends'])):  $this->_aPhpfoxVars['iteration']['friend'] = 0;  foreach ((array) $this->_aVars['aFriends'] as $this->_aVars['aFriend']):  $this->_aPhpfoxVars['iteration']['friend']++; ?>

			<div class="friend_search_holder <?php if (isset ( $this->_aVars['aFriend']['is_active'] )): ?> friend_search_holder_active<?php endif; ?>"<?php if (! isset ( $this->_aVars['aFriend']['is_active'] )): ?> onclick="if ($('#js_friends_checkbox_<?php echo $this->_aVars['aFriend']['user_id']; ?>').attr('checked') == 'checked') { $('#js_friends_checkbox_<?php echo $this->_aVars['aFriend']['user_id']; ?>').attr('checked', false); $(this).removeClass('friend_search_active'); } else { $('#js_friends_checkbox_<?php echo $this->_aVars['aFriend']['user_id']; ?>').attr('checked', 'checked'); $(this).addClass('friend_search_active'); } <?php if (isset ( $this->_aVars['aFriend']['canMessageUser'] ) && $this->_aVars['aFriend']['canMessageUser'] == false): ?> <?php else: ?> addFriendToSelectList($('#js_friends_checkbox_<?php echo $this->_aVars['aFriend']['user_id']; ?>'), '<?php echo $this->_aVars['aFriend']['user_id']; ?>', ($('#js_friends_checkbox_<?php echo $this->_aVars['aFriend']['user_id']; ?>').attr('checked') == 'checked' ? true : false));<?php endif; ?>"<?php endif; ?>>
				<span style="display:none;"><input type="checkbox" class="checkbox" name="friend[]" class="js_friends_checkbox" id="js_friends_checkbox_<?php echo $this->_aVars['aFriend']['user_id']; ?>" value="<?php echo $this->_aVars['aFriend']['user_id']; ?>" <?php if (( isset ( $this->_aVars['aFriend']['canMessageUser'] ) && $this->_aVars['aFriend']['canMessageUser'] == false ) || isset ( $this->_aVars['aFriend']['is_active'] )): ?>DISABLED <?php else: ?> onclick="addFriendToSelectList(this, '<?php echo $this->_aVars['aFriend']['user_id']; ?>');"<?php endif; ?> style="vertical-align:middle;" /></span>

<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aFriend'],'suffix' => '_50_square','max_width' => 32,'max_height' => 32,'no_link' => true,'style' => "vertical-align:middle;")); ?>
			
				<span id="js_friend_<?php echo $this->_aVars['aFriend']['user_id']; ?>" style="padding-left:5px;"><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aFriend']['full_name']);  if (isset ( $this->_aVars['aFriend']['is_active'] )): ?> <em>(<?php echo $this->_aVars['aFriend']['is_active']; ?>)</em><?php endif;  if (isset ( $this->_aVars['aFriend']['canMessageUser'] ) && $this->_aVars['aFriend']['canMessageUser'] == false): ?> <?php echo Phpfox::getPhrase('friend.cannot_select_this_user');  endif; ?></span>				
			</div>
<?php endforeach; else: ?>
			<div class="extra_info">
<?php if ($this->_aVars['sFriendType'] == 'mail'): ?>
<?php echo Phpfox::getPhrase('user.sorry_no_members_found'); ?>
<?php else: ?>
<?php echo Phpfox::getPhrase('friend.sorry_no_friends_were_found'); ?>
<?php endif; ?>
			</div>		
<?php endif; ?>
		</div>
	</div>
<?php if (! $this->_aVars['bSearch']): ?>
<?php if ($this->_aVars['bIsForShare']): ?>
	
<?php else: ?>
<?php if ($this->_aVars['sPrivacyInputName'] != 'invite'): ?>
	<div class="main_break t_right">		
		<input type="button" name="submit" value="<?php echo Phpfox::getPhrase('friend.use_selected'); ?>" onclick="<?php echo 'if (function_exists(\'plugin_selectSearchFriends\')) { plugin_selectSearchFriends(); } else { $Core.loadInit(); tb_remove(); }'; ?>
" class="button btn-primary" />&nbsp;<input type="button" name="cancel" value="<?php echo Phpfox::getPhrase('friend.cancel'); ?>" onclick="<?php echo 'if (function_exists(\'plugin_cancelSearchFriends\')) { plugin_cancelSearchFriends(); } else { cancelFriendSelection(); }'; ?>
" class="button" />
	</div>
<?php endif; ?>
<?php endif; ?>
</div>
<?php endif; ?>
