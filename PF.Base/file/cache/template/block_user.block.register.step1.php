<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 7:45 pm */ ?>
<?php

?>
	<div id="js_register_step1">
<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step1_3')) ? eval($sPlugin) : false); ?>
<?php if (Phpfox ::getParam('user.split_full_name')): ?>
		<div><input type="hidden" name="val[full_name]" id="full_name" value="stock" size="30" /></div>
		<div class="table form-group">
			<div class="table_left">
				<label for="first_name"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.first_name'); ?>:</label>
			</div>
			<div class="table_right form-group">
				<input class="form-control" placeholder="<?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.first_name'); ?>" type="text" name="val[first_name]" id="first_name" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['first_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['first_name']) : (isset($this->_aVars['aForms']['first_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['first_name']) : '')); ?>
" size="30" />
			</div>			
		</div>		
		<div class="table form-group">
			<div class="table_left">
				<label for="last_name"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.last_name'); ?>:</label>
			</div>
			<div class="table_right">
				<input class="form-control" type="text" name="val[last_name]" id="last_name" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['last_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['last_name']) : (isset($this->_aVars['aForms']['last_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['last_name']) : '')); ?>
" size="30" />
			</div>			
		</div>		
		<div class="separate"></div>
<?php else: ?>
		<div class="table form-group">
			<div class="table_right">
				<input class="form-control" placeholder="<?php echo Phpfox::getPhrase('user.full_name'); ?>" type="text" name="val[full_name]" id="full_name" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['full_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['full_name']) : (isset($this->_aVars['aForms']['full_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['full_name']) : '')); ?>
" size="30" />
			</div>			
		</div>
<?php endif; ?>
<?php if (! Phpfox ::getParam('user.profile_use_id') && ! Phpfox ::getParam('user.disable_username_on_sign_up')): ?>
		<div class="table form-group">
			<div class="table_right">                           
				<input class="form-control" placeholder="<?php echo Phpfox::getPhrase('user.choose_a_username'); ?>" type="text" name="val[user_name]" id="user_name" title="<?php echo Phpfox::getPhrase('user.your_username_is_used_to_easily_connect_to_your_profile'); ?>" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['user_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['user_name']) : (isset($this->_aVars['aForms']['user_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['user_name']) : '')); ?>
" size="30" autocomplete="off" />
				<div id="js_user_name_error_message"></div>
				<div style="display:none;" id="js_verify_username"></div>
			</div>			
		</div>		
<?php endif; ?>
<?php if (Phpfox ::getParam('user.reenter_email_on_signup')): ?>
		<div class="separate"></div>
<?php endif; ?>
		<div class="table form-group">
			<div class="table_right">
				<input class="form-control" placeholder="<?php echo Phpfox::getPhrase('user.email'); ?>" type="text" name="val[email]" id="email" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['email']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['email']) : (isset($this->_aVars['aForms']['email']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['email']) : '')); ?>
" size="30" />
			</div>			
		</div>
<?php if (Phpfox ::getParam('user.reenter_email_on_signup')): ?>
		<div class="table form-group">
			<div class="table_right">
				<div class="p_top_8">
					<input class="form-control" type="text" name="val[confirm_email]" id="confirm_email" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['confirm_email']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['confirm_email']) : (isset($this->_aVars['aForms']['confirm_email']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['confirm_email']) : '')); ?>
" size="30" onblur="$('#js_form').ajaxCall('user.confirmEmail');" placeholder="<?php echo Phpfox::getPhrase('user.please_reenter_your_email_again'); ?>"/>
				</div>
				<div id="js_confirm_email_error" style="display:none;"><div class="error_message"><?php echo Phpfox::getPhrase('user.email_s_do_not_match'); ?></div></div>
			</div>			
		</div>				
		<div class="separate"></div>
<?php endif; ?>

<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step1_5')) ? eval($sPlugin) : false); ?>
		<div class="table form-group">
			<div class="table_right">
<?php if (isset ( $this->_aVars['bIsPosted'] )): ?>
				<input class="form-control" placeholder="<?php echo Phpfox::getPhrase('user.password'); ?>" type="password" name="val[password]" id="password" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['password']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['password']) : (isset($this->_aVars['aForms']['password']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['password']) : '')); ?>
" size="30" autocomplete="off" />
<?php else: ?>
				<input class="form-control" placeholder="<?php echo Phpfox::getPhrase('user.password'); ?>" type="password" name="val[password]" id="password" value="" size="30" autocomplete="off" />
<?php endif; ?>
			</div>			
		</div>
<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step1_4')) ? eval($sPlugin) : false); ?>
	</div>
