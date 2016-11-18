<?php 
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_User
 * @version 		$Id: setting.html.php 7121 2014-02-18 13:57:28Z Fern $
 */

defined('PHPFOX') or exit('NO DICE!'); 

?>
{$sCreateJs}
<div class="main_break">
	<form method="post" action="{url link='user.setting'}" id="js_form" onsubmit="{$sGetJsForm}">		
		{if Phpfox::getUserId() == $aForms.user_id && Phpfox::getUserParam('user.can_change_own_full_name')}
		
		{if Phpfox::getParam('user.split_full_name')}
		<div><input type="hidden" name="val[full_name]" id="full_name" value="{value type='input' id='full_name'}" size="30" /></div>
		<div class="table form-group">
			<div class="table_left">
				<label for="first_name">{required}{phrase var='user.first_name'}:</label>
			</div>
			<div class="table_right">
				<input class="form-control" type="text" name="val[first_name]" id="first_name" value="{value type='input' id='first_name'}" size="30" {if $iTotalFullNameChangesAllowed != 0 && $aForms.total_full_name_change >= $iTotalFullNameChangesAllowed}readonly="readonly"{/if} />
			</div>			
		</div>		
		<div class="table form-group">
			<div class="table_left">
				<label for="last_name">{required}{phrase var='user.last_name'}:</label>				
			</div>
			<div class="table_right">
				<input class="form-control" type="text" name="val[last_name]" id="last_name" value="{value type='input' id='last_name'}" size="30" {if $iTotalFullNameChangesAllowed != 0 && $aForms.total_full_name_change >= $iTotalFullNameChangesAllowed}readonly="readonly"{/if} />
			</div>			
		</div>

		{if $iTotalFullNameChangesAllowed > 0}
		<div class="extra_info">
			{phrase var='user.total_full_name_change_out_of_allowed' total_full_name_change=$aForms.total_full_name_change allowed=$iTotalFullNameChangesAllowed}
		</div>
		{/if}
		<div class="separate"></div>
		{else}		
		<div class="table form-group">
			<div class="table_left">
				<label for="full_name">{required}{$sFullNamePhrase}:</label>
			</div>
			<div class="table_right">
				{if $iTotalFullNameChangesAllowed != 0 && $aForms.total_full_name_change >= $iTotalFullNameChangesAllowed}
				<input class="form-control" type="text" name="val[full_name]" id="full_name" value="{value type='input' id='full_name'}" size="30" readonly="readonly" />
				{else}
				<input class="form-control" type="text" name="val[full_name]" id="full_name" value="{value type='input' id='full_name'}" size="30" />
				{/if}

				{if $iTotalFullNameChangesAllowed > 0}
				<div class="extra_info">
					{phrase var='user.total_full_name_change_out_of_allowed' total_full_name_change=$aForms.total_full_name_change allowed=$iTotalFullNameChangesAllowed}
				</div>
				{/if}
			</div>
			<div class="clear"></div>
		</div>
		{/if}
		{/if}
		{if Phpfox::getUserParam('user.can_change_own_user_name') && !Phpfox::getParam('user.profile_use_id')}
		<div class="table form-group">
			<div class="table_left">
				<label for="user_name">{required}{phrase var='user.username'}:</label>
			</div>
			<div class="table_right">
				{if $aForms.total_user_change >= $iTotalChangesAllowed}
				<input class="form-control" type="text" name="val[user_name]" id="user_name" value="{value type='input' id='user_name'}" size="30" readonly="readonly" />
				{else}
				<input class="form-control" type="text" name="val[user_name]" id="user_name" value="{value type='input' id='user_name'}" size="30" />
				{/if}
				<div class="extra_info">
					{phrase var='user.total_user_change_out_of_total_user_name_changes' total_user_change=$aForms.total_user_change total=$iTotalChangesAllowed}
				</div>
				<div><input type="hidden" name="val[old_user_name]" id="user_name" value="{value type='input' id='user_name'}" size="30" /></div>
			</div>
			<div class="clear"></div>
		</div>
		{/if}
		{if Phpfox::getUserParam('user.can_change_email') }
		<div class="table form-group">
			<div class="table_left">
				<label for="email">{required}{phrase var='user.email_address'}:</label>
			</div>
			<div class="table_right">
				{if $bEnable2StepVerification}
				<div class="extra_info">
				<a href="{url link='user.passcode'}">{phrase var='user.get_new_google_authencator_barcode_when_you_change_email'}</a>
				</div>
				{/if}
				<input class="form-control" type="text" {if Phpfox::getParam('user.verify_email_at_signup')}onfocus="$('#js_email_warning').show();" {/if}name="val[email]" id="email" value="{value type='input' id='email'}" size="30" />
					   {if Phpfox::getParam('user.verify_email_at_signup')}
					   <div class="extra_info" style="display:none;" id="js_email_warning">
					{phrase var='user.changing_your_email_address_requires_you_to_verify_your_new_email'}
				</div>
				{/if}
			</div>
			<div class="clear"></div>
		</div>
		{/if}
		{if !Phpfox::getUserBy('fb_user_id')}
			<div class="table form-group-follow">
				<div class="table_left">
					<label for="password">{required}{phrase var='user.password'}:</label>
				</div>
				<div class="table_right">
					<div id="js_password_info" style="padding-top:2px;"><a href="#" onclick="tb_show('{phrase var='user.change_password' phpfox_squote=true}', $.ajaxBox('user.changePassword', 'height=250&amp;width=500')); return false;">{phrase var='user.change_password'}</a></div>
				</div>
				<div class="clear"></div>
			</div>
		{/if}

		<div class="table form-group">
			<div class="table_left">
				<label for="language_id">{phrase var='user.primary_language'}:</label>
			</div>
			<div class="table_right">
				<select class="form-control" name="val[language_id]" id="language_id">
				{foreach from=$aLanguages item=aLanguage}
					<option value="{$aLanguage.language_id}"{value type='select' id='language_id' default=$aLanguage.language_id}>{$aLanguage.title|clean}</option>
				{/foreach}
				</select>
			</div>
			<div class="clear"></div>
		</div>

		<div class="table form-group" id="tbl_time_zone">
			<div class="table_left">
				{phrase var='user.time_zone'}:
			</div>
			<div class="table_right">
				<select class="form-control" name="val[time_zone]" id="time_zone">
					{foreach from=$aTimeZones key=sTimeZoneKey item=sTimeZone}
					<option value="{$sTimeZoneKey}"{if (empty($aForms.time_zone) && $sTimeZoneKey == Phpfox::getParam('core.default_time_zone_offset')) || (!empty($aForms.time_zone) && $aForms.time_zone == $sTimeZoneKey)} selected="selected"{/if}>{$sTimeZone}</option>
					{/foreach}
				</select>
				{if PHPFOX_USE_DATE_TIME != true && Phpfox::getParam('core.identify_dst')}
				<div class="extra_info">
					<label><input type="checkbox" name="val[dst_check]" value="1" class="v_middle" {if $aForms.dst_check}checked="checked" {/if}/> {phrase var='user.enable_dst_daylight_savings_time'}</label>
				</div>
				{/if}
			</div>
			<div class="clear"></div>
		</div>
		
		
		{if Phpfox::getUserParam('user.can_edit_currency')}
			
		<div class="table form-group">
			<div class="table_left">
				{phrase var='user.preferred_currency'}:
			</div>
			<div class="table_right">		
				<select  class="form-control" name="val[default_currency]">
					<option value="">{phrase var='user.select'}:</option>
				{foreach from=$aCurrencies key=sCurrency item=aCurrency}
					<option value="{$sCurrency}"{if $aForms.default_currency == $sCurrency} selected="selected"{/if}>{phrase var=$aCurrency.name}</option>
				{/foreach}	
				</select>
				<div class="extra_info">
					{phrase var='user.show_prices_and_make_purchases_in_this_currency'}
				</div>				
			</div>
			<div class="clear"></div>
		</div>
		{/if}		

		{plugin call='user.template_controller_setting'}
		
		<div class="table_clear">
			<input type="submit" value="{phrase var='user.save'}" class="button btn-primary" />
		</div>

		{if Phpfox::getParam('core.display_required')}
			<div class="table_clear">
				{required} {phrase var='core.required_fields'}
			</div>
		{/if}		
		
		{if isset($aGateways) && is_array($aGateways) && count($aGateways)}
		<h3>{phrase var='user.payment_methods'}</h3>
		{foreach from=$aGateways item=aGateway}
			{foreach from=$aGateway.custom key=sFormField item=aCustom}
			<div class="table form-group">
				<div class="table_left">
					{$aCustom.phrase}:
				</div>
				<div class="table_right">
					{if (isset($aCustom.type) && $aCustom.type == 'textarea')}
						<textarea  class="form-control" name="val[gateway_detail][{$aGateway.gateway_id}][{$sFormField}]" cols="50" rows="8">{if isset($aCustom.user_value)}{$aCustom.user_value|clean}{/if}</textarea>
					{else}
						<input  class="form-control" type="text" name="val[gateway_detail][{$aGateway.gateway_id}][{$sFormField}]" value="{if isset($aCustom.user_value)}{$aCustom.user_value|clean}{/if}" size="40" />
					{/if}
					{if !empty($aCustom.phrase_info)}
					<div class="extra_info">
						{$aCustom.phrase_info}
					</div>
					{/if}
				</div>
				<div class="clear"></div>
			</div>			
			{/foreach}			
			{if isset($aGateway.custom) && is_array($aGateway.custom) && count($aGateway.custom)}<div class="separate"></div>{/if}
		{/foreach}		

		<div class="table_clear">
			<input type="submit" value="{phrase var='user.save'}" class="button btn-primary" />
		</div>
		{/if}
		{if (Phpfox::getUserParam('user.can_delete_own_account'))}
		<br />
		<br />
		<br />
		<br />
		<div class="p_top_8">
			<a href="{url link='user.remove'}">{phrase var='user.cancel_account'}</a>
		</div>
		{/if}
	</form>
</div>
