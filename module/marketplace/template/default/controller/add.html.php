<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: add.html.php 4605 2012-08-20 11:17:45Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if $bIsEdit && $aForms.view_id == '2'}
<div class="error_message">
	{phrase var='marketplace.notice_this_listing_is_marked_as_sold'}
</div>
<div class="main_break"></div>
{/if}

{$sCreateJs}
<form method="post" action="{url link='current'}" enctype="multipart/form-data" onsubmit="return startProcess({$sGetJsForm}, false);" id="js_marketplace_form">
	{if $bIsEdit}
	<div><input type="hidden" name="id" value="{$aForms.listing_id}" /></div>
	{/if}
	
	<div id="js_custom_privacy_input_holder">
	{if $bIsEdit && Phpfox::isModule('privacy')}
		{module name='privacy.build' privacy_item_id=$aForms.listing_id privacy_module_id='marketplace'}
	{/if}
	</div>	
	
	<div><input type="hidden" name="page_section_menu" value="" id="page_section_menu_form" /></div>

	<div id="js_mp_block_detail" class="js_mp_block page_section_menu_holder">
		<div class="table form-group">
			<div class="table_left">
			{required}<label for="category">{phrase var='marketplace.category'}:</label>
			</div>
			<div class="table_right">
				{$sCategories}
			</div>
		</div>
		<div class="separate"></div>
		<div class="table form-group">
			<div class="table_left">
			{required}<label for="title">{phrase var='marketplace.what_are_you_selling'}</label>
			</div>
			<div class="table_right">
				<input class="form-control" type="text" name="val[title]" value="{value type='input' id='title'}" id="title" size="40" maxlength="100" />
			</div>
		</div>	

		<div class="table form-group">
			<div class="table_left">
				<label for="mini_description">{phrase var='marketplace.short_description'}:</label>
			</div>
			<div class="table_right">
				<textarea class="form-control" rows="5" name="val[mini_description]" style="height:40px;">{value type='textarea' id='mini_description'}</textarea>
			</div>
		</div>			

		<div class="table form-group">
			<div class="table_left">
				<label for="description">{phrase var='marketplace.description'}:</label>
			</div>
			<div class="table_right">
				{editor id='description' rows='6'}
			</div>
		</div>		
		
		<div class="table form-group">
			<div class="table_left">
				{required}<label for="price">{phrase var='marketplace.price'}:</label>
			</div>
			<div class="table_right">
				<div class="">
					<select class="form-control" name="val[currency_id]">
						{foreach from=$aCurrencies key=sCurrency item=aCurrency}
						<option value="{$sCurrency}"{if $bIsEdit} {value type='select' id='currency_id' default=$sCurrency}{else}{if $aCurrency.is_default} selected="selected"{/if}{/if}>{phrase var=$aCurrency.name}</option>
						{/foreach}
					</select>
					<div class="p_top_8">
						<input class="form-control" type="text" name="val[price]" value="{value type='input' id='price'}" id="price" size="10" maxlength="100" onfocus="this.select();" />
					</div>
        </div>
			</div>
		</div>	
		
		{if Phpfox::getUserParam('marketplace.can_sell_items_on_marketplace')}
		<div class="table form-group-follow">
			<div class="table_left">
				<label for="postal_code">{phrase var='marketplace.enable_instant_payment'}:</label>
			</div>
			<div class="table_right">
				<div class="item_is_active_holder">		
					<span class="js_item_active item_is_active"><input type="radio" name="val[is_sell]" value="1" {value type='radio' id='is_sell' default='1'}/> {phrase var='core.yes'}</span>
					<span class="js_item_active item_is_not_active"><input type="radio" name="val[is_sell]" value="0" {value type='radio' id='is_sell' default='0' selected='true'}/> {phrase var='core.no'}</span>
				</div>
				<div class="extra_info">
					{phrase var='marketplace.if_you_enable_this_option_buyers_can_make_a_payment_to_one_of_the_payment_gateways_you_have_on_file_with_us_to_manage_your_payment_gateways_go_a_href_link_here_a' link=$sUserSettingLink}
				</div>
			</div>
		</div>			

		<div class="table form-group-follow">
			<div class="table_left">
				<label for="postal_code">{phrase var='marketplace.auto_sold'}:</label>
			</div>
			<div class="table_right">
				<div class="item_is_active_holder">		
					<span class="js_item_active item_is_active"><input type="radio" name="val[auto_sell]" value="1" {value type='radio' id='auto_sell' default='1' selected='true'}/> {phrase var='core.yes'}</span>
					<span class="js_item_active item_is_not_active"><input type="radio" name="val[auto_sell]" value="0" {value type='radio' id='auto_sell' default='0'}/> {phrase var='core.no'}</span>
				</div>
				<div class="extra_info">
					{phrase var='marketplace.if_this_is_enabled_and_once_a_successful_purchase_of_this_item_is_made'}
				</div>
			</div>
		</div>		
		{/if}
		
		<div class="separate"></div>
		
		<div class="table form-group">
			<div class="table_left">
				{required}<label for="country_iso">{phrase var='marketplace.location'}:</label>
			</div>
			<div class="table_right">
				{select_location}
				{module name='core.country-child'}
				{if !$bIsEdit}
				<div class="extra_info">
					<a href="#" onclick="$(this).parent().hide(); $('#js_mp_add_city').show(); return false;">{phrase var='marketplace.add_city_zip'}</a>
				</div>
				{/if}				
			</div>
		</div>	
		
		<div id="js_mp_add_city"{if !$bIsEdit} style="display:none;"{/if}>		
			<div class="table form-group">
				<div class="table_left">
					<label for="city">{phrase var='marketplace.city'}:</label>
				</div>
				<div class="table_right">
					<input class="form-control" type="text" name="val[city]" value="{value type='input' id='city'}" id="city" size="20" maxlength="200" />
				</div>
			</div>
			<div class="table form-group">
				<div class="table_left">
					<label for="postal_code">{phrase var='marketplace.zip_postal_code'}:</label>
				</div>
				<div class="table_right">
					<input class="form-control" type="text" name="val[postal_code]" value="{value type='input' id='postal_code'}" id="postal_code" size="10" maxlength="20" />
				</div>
			</div>
		</div>
		
		{if Phpfox::isModule('input')}
			{module name='input.add' action='add-listing' module='marketplace'}
		{/if}
		
		{if $bIsEdit && ($aForms.view_id == '0' || $aForms.view_id == '2')}
		<div class="separate"></div>
		
		<div class="table form-group-follow">
			<div class="table_left">
				<label for="postal_code">{phrase var='marketplace.closed_item_sold'}:</label>
			</div>
			<div class="table_right">
				<div class="item_is_active_holder">		
					<span class="js_item_active item_is_active"><input type="radio" name="val[view_id]" value="2" {value type='radio' id='view_id' default='2'}/> {phrase var='core.yes'}</span>
					<span class="js_item_active item_is_not_active"><input type="radio" name="val[view_id]" value="0" {value type='radio' id='view_id' default='0' selected='true'}/> {phrase var='core.no'}</span>
				</div>
				<div class="extra_info">
					{phrase var='marketplace.enable_this_option_if_this_item_is_sold_and_this_listing_should_be_closed'}
				</div>
			</div>
		</div>		
		{/if}	
		
		{if Phpfox::isModule('privacy')}
		<div class="table form-group-flow">
			<div class="table_left">
				{phrase var='marketplace.listing_privacy'}:
			</div>
			<div class="table_right">	
				{module name='privacy.form' privacy_name='privacy' privacy_info='marketplace.control_who_can_see_this_listing' default_privacy='marketplace.display_on_profile'}
			</div>			
		</div>
		<div class="table form-group-flow hidden">
			<div class="table_left">
				{phrase var='marketplace.comment_privacy'}:
			</div>
			<div class="table_right">	
				{module name='privacy.form' privacy_name='privacy_comment' privacy_info='marketplace.control_who_can_comment_on_this_listing' privacy_no_custom=true}
			</div>			
		</div>		
		{/if}
		<div class="table_clear">
			<input type="submit" value="{if $bIsEdit}{phrase var='marketplace.update'}{else}{phrase var='marketplace.submit'}{/if}" class="button btn btn-primary" />
		</div>
	</div>	
	
	<div id="js_mp_block_customize" class="js_mp_block page_section_menu_holder" style="display:none;">
	
		<div id="js_marketplace_form_holder">
			<div class="table form-group-follow">
				<div class="table_left">
					{phrase var='marketplace.select_image_s'}:
				</div>
				<div class="table_right">
					<div id="js_progress_uploader"></div>
					<div class="extra_info">
						{phrase var='marketplace.you_can_upload_a_jpg_gif_or_png_file'} 
						{if $iMaxFileSize !== null}
						<br />
						{phrase var='marketplace.the_file_size_limit_is_file_size_if_your_upload_does_not_work_try_uploading_a_smaller_picture' file_size=$iMaxFileSize|filesize}
						{/if}						
					</div>
				</div>
			</div>		
			
			<div class="table_clear">
				<input type="submit" value="{phrase var='marketplace.upload'}" class="button btn-primary" />
			</div>		
		</div>

		<div class="form_extra">
			{module name='marketplace.photo'}
		</div>
	
	</div>	
	
	<div id="js_mp_block_invite" class="js_mp_block page_section_menu_holder" style="display:none;">	
	
			{if Phpfox::isModule('friend')}
			<div class="block">
				<div class="title">{phrase var='marketplace.invite_friends'}</div>
				<div class="content">
				{if isset($aForms.listing_id)}
					<div id="js_selected_friends" class="hide_it"></div>
					{module name='friend.search' input='invite' hide=true friend_item_id=$aForms.listing_id friend_module_id='marketplace'}
				{/if}
				</div>
				{/if}

				<div class="title">{phrase var='marketplace.invite_people_via_email'}</div>
				<div class="content">
					<textarea cols="40" rows="8" name="val[emails]" class="form-control"></textarea>
					<div class="extra_info">
						{phrase var='marketplace.separate_multiple_emails_with_a_comma'}
						<div class="checkbox">
							<label>
								<input type="checkbox" name="val[invite_from]" value="1"> {phrase var='mail.send_from_my_own_address_semail' sEmail=$sMyEmail}
							</label>
						</div>
					</div>
				</div>

				<div class="title">{phrase var='marketplace.add_a_personal_message'}</div>
				<div class="content">
					<textarea cols="40" rows="8" name="val[personal_message]" class="form-control"></textarea>
					<div class="p_top_8">
						<input type="submit" value="{phrase var='marketplace.send_invitations'}" class="button btn btn-danger" />
					</div>
				</div>
			</div>
	</div>	
	
	{if isset($aForms.listing_id) && $bIsEdit}
	<div id="js_mp_block_manage" class="js_mp_block page_section_menu_holder" style="display:none;">
		{module name='marketplace.list'}
	</div>
	{/if}	

</form>
{section_menu_js}