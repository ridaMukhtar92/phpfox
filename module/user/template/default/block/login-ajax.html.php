<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_User
 * @version 		$Id: login-ajax.html.php 2013 2010-11-01 13:12:53Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if $bIsAJaxAdminCp}
<div class="error_message">
	{phrase var='admincp.you_have_logged_out_of_the_site'}
</div>
<script type="text/javascript">
	window.location.href = '{url link='user.login'}';
</script>
{else}
<div class="error_message">
	{phrase var='user.you_need_logged_that'}
</div>
<form method="post" action="{url link="user.login"}" id="js_login_form">
<input type="hidden" name="val[parent_refresh]" value="1"/>
	<div class="p_top_4">
		<label for="js_email">{if Phpfox::getParam('user.login_type') == 'user_name'}{phrase var='user.user_name'}{elseif Phpfox::getParam('user.login_type') == 'email'}{phrase var='user.email'}{else}{phrase var='user.login'}{/if}</label>:
		<div class="p_4">
			<input type="text" name="val[login]" id="js_email" value="" class="form-control"/>
		</div>
	</div>
	
	<div class="p_top_4">
		<label for="js_password">{phrase var='user.password'}:</label> 
		<div class="p_4">
			<input type="password" name="val[password]" id="js_password" value="" class="form-control" autocomplete="off" />
			<div class="checkbox">
				<label><input type="checkbox" name="val[remember_me]" value="" class="checkbox" /> {phrase var='user.remember'}</label>
			</div>
		</div>
	</div>
	
	<div class="p_top_8">
		{if Phpfox::getParam('user.allow_user_registration')}
		<div class="action_contain" style="position:absolute; right:15px;">
			<button type="button" class="button btn-sm btn-danger" onclick="window.location.href = '{url link='user.register'}';" >{phrase var='user.register_for_an_account'}</button>
		</div>			
		{/if}
		<button type="submit" class="button btn-sm btn-danger">
			{phrase var='user.login_button'} <i class="fa fa-sign-in"></i>
		</button>
	</div>
</form>
{/if}