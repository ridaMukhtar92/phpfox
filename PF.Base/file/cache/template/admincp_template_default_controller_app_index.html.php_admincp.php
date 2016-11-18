<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:14 pm */ ?>
<?php

?>
<?php if ($this->_aVars['uninstall']): ?>
	<div class="error_message">
<?php echo Phpfox::getPhrase('admincp.to_continue_with_uninstalling__please_enter_your_admin_login_details'); ?>.
	</div>
	<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('current'); ?>" class="ajax_post">
		<div class="table form-group">
			<div class="table_left">
<?php echo Phpfox::getPhrase('admincp.email'); ?>:
			</div>
			<div class="table_right">
				<input type="text" name="val[email]">
			</div>
		</div>
		<div class="table form-group">
			<div class="table_left">
<?php echo Phpfox::getPhrase('admincp.password'); ?>:
			</div>
			<div class="table_right">
				<input type="password" name="val[password]" autocomplete="off">
			</div>
		</div>
		<div style="display:none;">
        <div class="error_message">
<?php echo Phpfox::getPhrase('admincp.please_re_type_your_ftp_account'); ?>
        </div>
        <div class="session_ftp_account">
            <div class="table">
                <div class="table_left">
<?php echo Phpfox::getPhrase('core.file_upload_method'); ?>:
                </div>
                <div class="table_right">
                    <select name="val[method]"
                            onchange="if (this.value=='file_system') $('.hide_file_system_items').hide(); else $('.hide_file_system_items').show();">
<?php if (count((array)$this->_aVars['listMethod'])):  foreach ((array) $this->_aVars['listMethod'] as $this->_aVars['sKey'] => $this->_aVars['sMethod']): ?>
                        <option value="<?php echo $this->_aVars['sKey']; ?>" <?php if ($this->_aVars['sKey'] == $this->_aVars['currentUploadMethod']): ?> selected <?php endif; ?>>
<?php echo $this->_aVars['sMethod']; ?>
                        </option>
<?php endforeach; endif; ?>
                    </select>
                </div>
            </div>
            <div class="hide_file_system_items" <?php if ('file_system' == $this->_aVars['currentUploadMethod']): ?> style="display: none" <?php endif; ?>>
            <div class="table">
                <div class="table_left">
<?php echo Phpfox::getPhrase('core.ftp_host_name'); ?>:
                </div>
                <div class="table_right">
                    <input type="text" class="form-control" placeholder="<?php echo Phpfox::getPhrase('core.ftp_host_name'); ?>"
                           value="<?php echo $this->_aVars['currentHostName']; ?>" name="val[host_name]"/>
                </div>
            </div>

            <div class="table">
                <div class="table_left">
<?php echo _p("Port"); ?>:
                </div>
                <div class="table_right">
                    <input type="text" class="form-control" placeholder="Port" value="<?php echo $this->_aVars['currentPort']; ?>" name="val[port]"/>
                </div>
            </div>

            <div class="table">
                <div class="table_left">
<?php echo Phpfox::getPhrase('core.ftp_user_name'); ?>:
                </div>
                <div class="table_right">
                    <input type="text" class="form-control" placeholder="<?php echo Phpfox::getPhrase('core.ftp_user_name'); ?>"
                           value="<?php echo $this->_aVars['currentUsername']; ?>" name="val[user_name]"/>
                </div>
            </div>

            <div class="table">
                <div class="table_left">
<?php echo Phpfox::getPhrase('core.ftp_password'); ?>:
                </div>
                <div class="table_right">
                    <input type="text" class="form-control" placeholder="<?php echo Phpfox::getPhrase('core.ftp_password'); ?>"
                           value="<?php echo $this->_aVars['currentPassword']; ?>" name="val[ftp_password]"/>
                </div>
            </div>
        </div>
        </div>
        </div>
		<div class="table_clear">
			<input type="submit" class="button btn-primary" value="Submit">
		</div>
	
</form>

<?php else: ?>
	<div id="app-custom-holder" style="display:none; min-height:400px;"></div>
	<div id="app-content-holder">
<?php if ($this->_aVars['customContent']): ?>
		<div id="custom-app-content"><i class="fa fa-circle-o-notch fa-spin"></i></div>
		<script>
			var customContent = '<?php echo $this->_aVars['customContent']; ?>', contentIsLoaded = false, extraParams = <?php echo $this->_aVars['extraParams']; ?>, appUrl = '<?php echo $this->_aVars['appUrl']; ?>';
		<?php echo '
			$Ready(function() {
				if (contentIsLoaded) {
					return;
				}

				contentIsLoaded = true;
				$(\'.apps_menu a[href="#"]\').addClass(\'active\');
				if (extraParams == 1) {
					$(\'.apps_menu a[href="#"]\').attr(\'href\', appUrl).addClass(\'no_ajax\');
				}
				$.ajax({
					url: customContent,
					contentType: \'application/json\',
					success: function(e) {
						$(\'#custom-app-content\').html(e.content).show();
						$Core.loadInit();
					}
				});
			});
		'; ?>

		</script>
<?php else: ?>
<?php if (isset ( $this->_aVars['settings'] ) && $this->_aVars['settings']): ?>
		<script>
			var set_active = false, group_class = '';
<?php if (( $this->_aVars['group_class'] )): ?>
			group_class = '<?php echo $this->_aVars['group_class']; ?>';
<?php endif; ?>
			<?php echo '
			$Ready(function() {
				if (set_active) {
					return;
				}
				set_active = true;
				$(\'._is_app_settings\').show();
				$(\'.apps_menu a[href="#settings"]\').addClass(\'active\');
				if (group_class) {
					$(\'.\' + group_class + \':not(.is_option_class)\').show();

					var do_this = function() {
						var driver = $(this).data(\'option-class\').split(\'=\'),
							s_key = driver[0],
							s_value = driver[1],
							i = $(this),
							t = $(\'.__data_option_\' + s_key + \'\');

						if (t.length) {
							if (t.val() == s_value && i.hasClass(group_class)) {
								i.show();
							} else {
								i.hide();
							}

							t.change(function () {
								$(\'.is_option_class\').each(do_this);
							});
						}
					};

					$(\'.is_option_class\').each(do_this);
				}
			});
			'; ?>

		</script>
<?php endif; ?>
<?php endif; ?>

<?php if (isset ( $this->_aVars['settings'] ) && $this->_aVars['settings']): ?>
		<section class="app_grouping _is_app_settings" style="display:none;">
<?php if (( ! $this->_aVars['group_class'] )): ?>
			<h1><?php echo Phpfox::getPhrase('admincp.app_settings');  if (( $this->_aVars['App']['admincp_help'] )): ?> <a href="<?php echo $this->_aVars['App']['admincp_help']; ?>" target="_blank"><i class="fa fa-info-circle"></i></a><?php endif; ?></h1>
<?php endif; ?>
			<form class="on_change_submit" method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('current'); ?>">
<?php if (count((array)$this->_aVars['settings'])):  foreach ((array) $this->_aVars['settings'] as $this->_aVars['var'] => $this->_aVars['setting']): ?>
				<div<?php if (( isset ( $this->_aVars['setting']['group_class'] ) && $this->_aVars['setting']['group_class'] ) || ( isset ( $this->_aVars['setting']['option_class'] ) && $this->_aVars['setting']['option_class'] )): ?> class="<?php echo $this->_aVars['setting']['group_class']; ?> <?php if (( isset ( $this->_aVars['setting']['option_class'] ) && $this->_aVars['setting']['option_class'] )): ?> is_option_class<?php endif; ?>" <?php if (( isset ( $this->_aVars['setting']['option_class'] ) && $this->_aVars['setting']['option_class'] )): ?> data-option-class="<?php echo $this->_aVars['setting']['option_class']; ?>"<?php endif; ?> style="display:none;"<?php endif; ?>>
					<div class="table_header2 settings">
<?php echo $this->_aVars['setting']['info']; ?>
					</div>
					<div class="table3 settings">
						<div class="row_right">
<?php if ($this->_aVars['setting']['type'] == 'input:text'): ?>
							<input type="text" name="setting[<?php echo $this->_aVars['var']; ?>]" value="<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['setting']['value']); ?>">
<?php elseif ($this->_aVars['setting']['type'] == 'input:radio'): ?>
							<div class="item_is_active_holder">
								<span class="js_item_active item_is_active">
									<input type="radio"<?php if ($this->_aVars['setting']['value'] == 1): ?> checked="checked"<?php endif; ?> name="setting[<?php echo $this->_aVars['var']; ?>]" value="1"> <?php echo Phpfox::getPhrase('core.yes'); ?>
								</span>
								<span class="js_item_active item_is_not_active">
									<input type="radio"<?php if ($this->_aVars['setting']['value'] != 1): ?> checked="checked"<?php endif; ?> name="setting[<?php echo $this->_aVars['var']; ?>]" value="0"> <?php echo Phpfox::getPhrase('core.no'); ?>
								</span>
							</div>
<?php elseif ($this->_aVars['setting']['type'] == 'select'): ?>
							<select name="setting[<?php echo $this->_aVars['var']; ?>]" class="__data_option_<?php echo $this->_aVars['var']; ?>">
<?php if (count((array)$this->_aVars['setting']['options'])):  foreach ((array) $this->_aVars['setting']['options'] as $this->_aVars['name'] => $this->_aVars['option']): ?>
								<option value="<?php echo $this->_aVars['name']; ?>"<?php if (( $this->_aVars['name'] == $this->_aVars['setting']['value'] )): ?> selected="selected"<?php endif; ?>><?php echo $this->_aVars['option']; ?></option>
<?php endforeach; endif; ?>
							</select>
<?php endif; ?>
						</div>
					</div>
				</div>
<?php endforeach; endif; ?>
			
</form>

		</section>

<?php echo $this->_aVars['extra']; ?>
<?php endif; ?>

<?php if (isset ( $this->_aVars['userGroupSettings'] ) && $this->_aVars['userGroupSettings']): ?>
		<section class="app_grouping _is_user_group_settings" style="display:none;">
			<form class="on_change_submit" method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('current'); ?>">
				<h1><?php echo Phpfox::getPhrase('admincp.user_group_settings'); ?></h1>
<?php if (count((array)$this->_aVars['userGroupSettings'])):  foreach ((array) $this->_aVars['userGroupSettings'] as $this->_aVars['var'] => $this->_aVars['group']): ?>
					<div class="user_group_rows">
						<div class="_title">
<?php echo $this->_aVars['group']['name']; ?>
						</div>
						<div class="_settings">
<?php if (count((array)$this->_aVars['group']['settings'])):  foreach ((array) $this->_aVars['group']['settings'] as $this->_aVars['var'] => $this->_aVars['setting']): ?>
							<div class="table_header2 ">
<?php echo $this->_aVars['setting']['info']; ?>
							</div>
							<div class="table3 settings">
								<div class="row_right">
<?php if ($this->_aVars['setting']['type'] == 'input:text'): ?>
									<input type="text" name="user_group_setting[<?php echo $this->_aVars['group']['id']; ?>][<?php echo $this->_aVars['var']; ?>]" value="<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['setting']['value']); ?>">
<?php elseif ($this->_aVars['setting']['type'] == 'input:radio'): ?>
									<div class="item_is_active_holder">
									<span class="js_item_active item_is_active">
										<input type="radio"<?php if ($this->_aVars['setting']['value'] == 1): ?> checked="checked"<?php endif; ?> name="user_group_setting[<?php echo $this->_aVars['group']['id']; ?>][<?php echo $this->_aVars['var']; ?>]" value="1"> <?php echo _p("Yes"); ?>
									</span>
									<span class="js_item_active item_is_not_active">
										<input type="radio"<?php if ($this->_aVars['setting']['value'] != 1): ?> checked="checked"<?php endif; ?> name="user_group_setting[<?php echo $this->_aVars['group']['id']; ?>][<?php echo $this->_aVars['var']; ?>]" value="0"> <?php echo _p("No"); ?>
									</span>
									</div>
<?php endif; ?>
								</div>
							</div>
<?php endforeach; endif; ?>
						</div>
					</div>
<?php endforeach; endif; ?>
			
</form>

		</section>
<?php endif; ?>
	</div>
	<div id="app-details">
<?php if (( ! $this->_aVars['ActiveApp']['is_core'] )): ?>
		<ul>
			<li><a <?php if ($this->_aVars['App']['is_module']): ?>onclick="return confirm('<?php echo Phpfox::getPhrase('admincp.are_you_sure', array('phpfox_squote' => true)); ?>');"<?php endif; ?> href="<?php echo $this->_aVars['uninstallUrl']; ?>"><?php echo Phpfox::getPhrase('admincp.uninstall'); ?></a></li>
<?php if ($this->_aVars['export_path'] && defined ( 'PHPFOX_IS_TECHIE' ) && PHPFOX_IS_TECHIE): ?>
			<li><a href="<?php echo $this->_aVars['export_path']; ?>">Export</a></li>
<?php endif; ?>
		</ul>
<?php endif; ?>
		<div class="app-copyright">
<?php if ($this->_aVars['ActiveApp']['vendor']): ?>
			©<?php echo $this->_aVars['ActiveApp']['vendor']; ?>
<?php endif; ?>
<?php if ($this->_aVars['ActiveApp']['credits']): ?>
			<div class="app-credits">
				<div>Credits</div>
<?php if (count((array)$this->_aVars['ActiveApp']['credits'])):  foreach ((array) $this->_aVars['ActiveApp']['credits'] as $this->_aVars['name'] => $this->_aVars['url']): ?>
				<ul>
					<li><a href="<?php echo $this->_aVars['url']; ?>"><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['name']); ?></a></li>
				</ul>
<?php endforeach; endif; ?>
			</div>
<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
