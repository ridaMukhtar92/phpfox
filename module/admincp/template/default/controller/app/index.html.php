<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if $uninstall}
	<div class="error_message">
		{phrase var='admincp.to_continue_with_uninstalling__please_enter_your_admin_login_details'}.
	</div>
	<form method="post" action="{url link='current'}" class="ajax_post">
		<div class="table form-group">
			<div class="table_left">
                {phrase var='admincp.email'}:
			</div>
			<div class="table_right">
				<input type="text" name="val[email]">
			</div>
		</div>
		<div class="table form-group">
			<div class="table_left">
                {phrase var='admincp.password'}:
			</div>
			<div class="table_right">
				<input type="password" name="val[password]" autocomplete="off">
			</div>
		</div>
		<div style="display:none;">
        <div class="error_message">
            {phrase var='admincp.please_re_type_your_ftp_account'}
        </div>
        <div class="session_ftp_account">
            <div class="table">
                <div class="table_left">
                    {phrase var='core.file_upload_method'}:
                </div>
                <div class="table_right">
                    <select name="val[method]"
                            onchange="if (this.value=='file_system') $('.hide_file_system_items').hide(); else $('.hide_file_system_items').show();">
                        {foreach from=$listMethod key=sKey value=sMethod}
                        <option value="{$sKey}" {if $sKey==$currentUploadMethod} selected {/if}>
                        {$sMethod}
                        </option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="hide_file_system_items" {if 'file_system'==$currentUploadMethod} style="display: none" {/if}>
            <div class="table">
                <div class="table_left">
                    {phrase var='core.ftp_host_name'}:
                </div>
                <div class="table_right">
                    <input type="text" class="form-control" placeholder="{phrase var='core.ftp_host_name'}"
                           value="{$currentHostName}" name="val[host_name]"/>
                </div>
            </div>

            <div class="table">
                <div class="table_left">
                    {_p var="Port"}:
                </div>
                <div class="table_right">
                    <input type="text" class="form-control" placeholder="Port" value="{$currentPort}" name="val[port]"/>
                </div>
            </div>

            <div class="table">
                <div class="table_left">
                    {phrase var='core.ftp_user_name'}:
                </div>
                <div class="table_right">
                    <input type="text" class="form-control" placeholder="{phrase var='core.ftp_user_name'}"
                           value="{$currentUsername}" name="val[user_name]"/>
                </div>
            </div>

            <div class="table">
                <div class="table_left">
                    {phrase var='core.ftp_password'}:
                </div>
                <div class="table_right">
                    <input type="text" class="form-control" placeholder="{phrase var='core.ftp_password'}"
                           value="{$currentPassword}" name="val[ftp_password]"/>
                </div>
            </div>
        </div>
        </div>
        </div>
		<div class="table_clear">
			<input type="submit" class="button btn-primary" value="Submit">
		</div>
	</form>
{else}
	<div id="app-custom-holder" style="display:none; min-height:400px;"></div>
	<div id="app-content-holder">
		{if $customContent}
		<div id="custom-app-content"><i class="fa fa-circle-o-notch fa-spin"></i></div>
		<script>
			var customContent = '{$customContent}', contentIsLoaded = false, extraParams = {$extraParams}, appUrl = '{$appUrl}';
		{literal}
			$Ready(function() {
				if (contentIsLoaded) {
					return;
				}

				contentIsLoaded = true;
				$('.apps_menu a[href="#"]').addClass('active');
				if (extraParams == 1) {
					$('.apps_menu a[href="#"]').attr('href', appUrl).addClass('no_ajax');
				}
				$.ajax({
					url: customContent,
					contentType: 'application/json',
					success: function(e) {
						$('#custom-app-content').html(e.content).show();
						$Core.loadInit();
					}
				});
			});
		{/literal}
		</script>
		{else}
		{if isset($settings) && $settings}
		<script>
			var set_active = false, group_class = '';
			{if ($group_class)}
			group_class = '{$group_class}';
			{/if}
			{literal}
			$Ready(function() {
				if (set_active) {
					return;
				}
				set_active = true;
				$('._is_app_settings').show();
				$('.apps_menu a[href="#settings"]').addClass('active');
				if (group_class) {
					$('.' + group_class + ':not(.is_option_class)').show();

					var do_this = function() {
						var driver = $(this).data('option-class').split('='),
							s_key = driver[0],
							s_value = driver[1],
							i = $(this),
							t = $('.__data_option_' + s_key + '');

						if (t.length) {
							if (t.val() == s_value && i.hasClass(group_class)) {
								i.show();
							} else {
								i.hide();
							}

							t.change(function () {
								$('.is_option_class').each(do_this);
							});
						}
					};

					$('.is_option_class').each(do_this);
				}
			});
			{/literal}
		</script>
		{/if}
		{/if}

		{if isset($settings) && $settings}
		<section class="app_grouping _is_app_settings" style="display:none;">
			{if (!$group_class)}
			<h1>{phrase var='admincp.app_settings'}{if ($App.admincp_help)} <a href="{$App.admincp_help}" target="_blank"><i class="fa fa-info-circle"></i></a>{/if}</h1>
			{/if}
			<form class="on_change_submit" method="post" action="{url link='current'}">
				{foreach from=$settings item=setting key=var}
				<div{if (isset($setting.group_class) && $setting.group_class) || (isset($setting.option_class) && $setting.option_class)} class="{$setting.group_class} {if (isset($setting.option_class) && $setting.option_class)} is_option_class{/if}" {if (isset($setting.option_class) && $setting.option_class)} data-option-class="{$setting.option_class}"{/if} style="display:none;"{/if}>
					<div class="table_header2 settings">
						{$setting.info}
					</div>
					<div class="table3 settings">
						<div class="row_right">
							{if $setting.type == 'input:text'}
							<input type="text" name="setting[{$var}]" value="{$setting.value|clean}">
							{elseif $setting.type == 'input:radio'}
							<div class="item_is_active_holder">
								<span class="js_item_active item_is_active">
									<input type="radio"{if $setting.value == 1} checked="checked"{/if} name="setting[{$var}]" value="1"> {phrase var='core.yes'}
								</span>
								<span class="js_item_active item_is_not_active">
									<input type="radio"{if $setting.value != 1} checked="checked"{/if} name="setting[{$var}]" value="0"> {phrase var='core.no'}
								</span>
							</div>
							{elseif $setting.type == 'select'}
							<select name="setting[{$var}]" class="__data_option_{$var}">
								{foreach item=option key=name from=$setting.options}
								<option value="{$name}"{if ($name == $setting.value)} selected="selected"{/if}>{$option}</option>
								{/foreach}
							</select>
							{/if}
						</div>
					</div>
				</div>
				{/foreach}
			</form>
		</section>

        {$extra}
		{/if}

		{if isset($userGroupSettings) && $userGroupSettings}
		<section class="app_grouping _is_user_group_settings" style="display:none;">
			<form class="on_change_submit" method="post" action="{url link='current'}">
				<h1>{phrase var='admincp.user_group_settings'}</h1>
				{foreach from=$userGroupSettings item=group key=var}
					<div class="user_group_rows">
						<div class="_title">
							{$group.name}
						</div>
						<div class="_settings">
							{foreach from=$group.settings item=setting key=var}
							<div class="table_header2 ">
								{$setting.info}
							</div>
							<div class="table3 settings">
								<div class="row_right">
									{if $setting.type == 'input:text'}
									<input type="text" name="user_group_setting[{$group.id}][{$var}]" value="{$setting.value|clean}">
									{elseif $setting.type == 'input:radio'}
									<div class="item_is_active_holder">
									<span class="js_item_active item_is_active">
										<input type="radio"{if $setting.value == 1} checked="checked"{/if} name="user_group_setting[{$group.id}][{$var}]" value="1"> {_p var="Yes"}
									</span>
									<span class="js_item_active item_is_not_active">
										<input type="radio"{if $setting.value != 1} checked="checked"{/if} name="user_group_setting[{$group.id}][{$var}]" value="0"> {_p var="No"}
									</span>
									</div>
									{/if}
								</div>
							</div>
							{/foreach}
						</div>
					</div>
				{/foreach}
			</form>
		</section>
		{/if}
	</div>
	<div id="app-details">
		{if (!$ActiveApp.is_core)}
		<ul>
			<li><a {if $App.is_module}onclick="return confirm('{phrase var='admincp.are_you_sure' phpfox_squote=true}');"{/if} href="{$uninstallUrl}">{phrase var='admincp.uninstall'}</a></li>
			{if $export_path && defined('PHPFOX_IS_TECHIE') && PHPFOX_IS_TECHIE}
			<li><a href="{$export_path}">Export</a></li>
			{/if}
		</ul>
		{/if}
		<div class="app-copyright">
			{if $ActiveApp.vendor}
			©{$ActiveApp.vendor}
			{/if}
			{if $ActiveApp.credits}
			<div class="app-credits">
				<div>Credits</div>
				{foreach from=$ActiveApp.credits item=url key=name}
				<ul>
					<li><a href="{$url}">{$name|clean}</a></li>
				</ul>
				{/foreach}
			</div>
			{/if}
		</div>
	</div>
{/if}