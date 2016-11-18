<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:21 pm */ ?>
<?php

?>
<?php if ($this->_aVars['bIsEdit']): ?>
<div id="js_groups_add_holder">
	<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('groups.add'); ?>" enctype="multipart/form-data">
		<div><input type="hidden" name="id" value="<?php echo $this->_aVars['aForms']['page_id']; ?>" /></div>
		<div><input type="hidden" name="val[category_id]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['category_id']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['category_id']) : (isset($this->_aVars['aForms']['category_id']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['category_id']) : '')); ?>
" id="js_category_groups_add_holder" /></div>

		<div id="js_groups_block_detail" class="js_groups_block page_section_menu_holder">
			<div class="table form-group">
				<div class="table_left">
<?php echo _p('Category'); ?>:
				</div>
				<div class="table_right">
<?php if ($this->_aVars['aForms']['is_app']): ?>
<?php echo _p('App'); ?>
<?php else: ?>
					<div class="groups_add_category form-group">
						<select name="val[type_id]" class="form-control inline">
<?php if (count((array)$this->_aVars['aTypes'])):  foreach ((array) $this->_aVars['aTypes'] as $this->_aVars['aType']): ?>
							<option value="<?php echo $this->_aVars['aType']['type_id']; ?>"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('type_id') && in_array('type_id', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['type_id'])
								&& $aParams['type_id'] == $this->_aVars['aType']['type_id'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['type_id'])
									&& !isset($aParams['type_id'])
									&& $this->_aVars['aForms']['type_id'] == $this->_aVars['aType']['type_id'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>
<?php if (Phpfox ::isPhrase($this->_aVars['aType']['name'])): ?>
<?php echo Phpfox::getPhrase($this->_aVars['aType']['name']); ?>
<?php else: ?>
<?php echo Phpfox::getLib('locale')->convert($this->_aVars['aType']['name']); ?>
<?php endif; ?>
                            </option>
<?php endforeach; endif; ?>
						</select>
					</div>
					<div class="groups_sub_category form-group">
<?php if (count((array)$this->_aVars['aTypes'])):  foreach ((array) $this->_aVars['aTypes'] as $this->_aVars['aType']): ?>
<?php if (isset ( $this->_aVars['aType']['categories'] ) && is_array ( $this->_aVars['aType']['categories'] ) && count ( $this->_aVars['aType']['categories'] )): ?>
								<div class="js_groups_add_sub_category form-inline" id="js_groups_add_sub_category_<?php echo $this->_aVars['aType']['type_id']; ?>"<?php if ($this->_aVars['aType']['type_id'] != $this->_aVars['aForms']['type_id']): ?> style="display:none;"<?php endif; ?>>
									<select name="js_category_<?php echo $this->_aVars['aType']['type_id']; ?>" class="form-control inline">
										<option value=""><?php echo Phpfox::getPhrase('core.select'); ?></option>
<?php if (count((array)$this->_aVars['aType']['categories'])):  foreach ((array) $this->_aVars['aType']['categories'] as $this->_aVars['aCategory']): ?>
										<option value="<?php echo $this->_aVars['aCategory']['category_id']; ?>" <?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('category_id') && in_array('category_id', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['category_id'])
								&& $aParams['category_id'] == $this->_aVars['aCategory']['category_id'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['category_id'])
									&& !isset($aParams['category_id'])
									&& $this->_aVars['aForms']['category_id'] == $this->_aVars['aCategory']['category_id'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>
<?php if (Phpfox ::isPhrase($this->_aVars['aCategory']['name'])): ?>
<?php echo Phpfox::getPhrase($this->_aVars['aCategory']['name']); ?>
<?php else: ?>
<?php echo Phpfox::getLib('locale')->convert($this->_aVars['aCategory']['name']); ?>
<?php endif; ?>
                                        </option>
<?php endforeach; endif; ?>
									</select>
								</div>
<?php endif; ?>
<?php endforeach; endif; ?>
					</div>
					<div class="clear"></div>
<?php endif; ?>
				</div>
			</div>

			<div class="table hide_it">
				<div class="table_left">
<?php echo _p('Use timeline'); ?>
				</div>
				<div class="table_right">
					<input type="radio" value="1" name="val[use_timeline]" <?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));
if (isset($this->_aVars['aForms']) && is_numeric('use_timeline') && in_array('use_timeline', $this->_aVars['aForms']) ){echo ' checked="checked"';}
if ((isset($aParams['use_timeline']) && $aParams['use_timeline'] == '1'))
{echo ' checked="checked" ';}
else
{
 if (isset($this->_aVars['aForms']) && isset($this->_aVars['aForms']['use_timeline']) && !isset($aParams['use_timeline']) && $this->_aVars['aForms']['use_timeline'] == '1')
 {
    echo ' checked="checked" ';}
 else
 {
 if (!isset($this->_aVars['aForms']) || ((isset($this->_aVars['aForms']) && !isset($this->_aVars['aForms']['use_timeline']) && !isset($aParams['use_timeline']))))
{
 echo ' checked="checked"';
}
 }
}
?> 
 id="rdo_timeline_1"> <label for="rdo_timeline_1"><?php echo Phpfox::getPhrase('core.yes'); ?></label>
					<input type="radio" value="0" name="val[use_timeline]" <?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));
if (isset($this->_aVars['aForms']) && is_numeric('use_timeline') && in_array('use_timeline', $this->_aVars['aForms']) ){echo ' checked="checked"';}
if ((isset($aParams['use_timeline']) && $aParams['use_timeline'] == '0'))
{echo ' checked="checked" ';}
else
{
 if (isset($this->_aVars['aForms']) && isset($this->_aVars['aForms']['use_timeline']) && !isset($aParams['use_timeline']) && $this->_aVars['aForms']['use_timeline'] == '0')
 {
    echo ' checked="checked" ';}
 else
 {
 }
}
?> 
id="rdo_timeline_0"> <label for="rdo_timeline_0"><?php echo Phpfox::getPhrase('core.no'); ?></label>
				</div>
			</div>

			<div class="table form-group">
				<div class="table_left">
<?php echo _p('Name'); ?>:
				</div>
				<div class="table_right">
<?php if ($this->_aVars['aForms']['is_app']): ?>
					<div><input type="hidden" name="val[title]" value="<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['title']); ?>" maxlength="200" size="40" /></div>
					<a href="<?php echo Phpfox::permalink('apps', $this->_aVars['aForms']['app_id'], $this->_aVars['aForms']['title'], false, null, (array) array (
)); ?>"><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['title']); ?></a>
<?php else: ?>
					<input type="text" name="val[title]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['title']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['title']) : (isset($this->_aVars['aForms']['title']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['title']) : '')); ?>
" maxlength="200" size="40" class="form-control"/>
<?php endif; ?>
				</div>
			</div>

			<div class="table_clear">
				<input type="submit" value="<?php echo _p('Update'); ?>" class="button btn-primary" />
			</div>
		</div>

		<div id="js_groups_block_url" class="block js_groups_block page_section_menu_holder" style="display:none;">

			<div class="table form-group">
				<div class="table_left">
<?php echo _p('Vanity url'); ?>:
				</div>
				<div class="table_right">
					<span class="extra_info"><?php echo Phpfox::getParam('core.path'); ?></span><input type="text" name="val[vanity_url]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['vanity_url']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['vanity_url']) : (isset($this->_aVars['aForms']['vanity_url']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['vanity_url']) : '')); ?>
" size="20" id="js_vanity_url_new" class="form-control"/>
				</div>
			</div>

			<div class="table_clear" id="js_groups_vanity_url_button">
				<ul class="table_clear_button">
					<li>
						<div><input type="hidden" name="val[vanity_url_old]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['vanity_url']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['vanity_url']) : (isset($this->_aVars['aForms']['vanity_url']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['vanity_url']) : '')); ?>
" size="20" id="js_vanity_url_old" /></div>
						<input type="button" value="<?php echo _p('Check url'); ?>" class="button btn-primary" onclick="if ($('#js_vanity_url_new').val() != $('#js_vanity_url_old').val()) { $Core.processForm('#js_groups_vanity_url_button'); $($(this).parents('form:first')).ajaxCall('groups.changeUrl'); } return false;" />
					</li>
					<li class="table_clear_ajax"></li>
				</ul>
				<div class="clear"></div>
			</div>

		</div>

		<div id="js_groups_block_photo" class="js_groups_block page_section_menu_holder" style="display:none;">
			<div id="js_groups_block_customize_holder">
				<div class="table form-group-follow">
					<div class="table_left">
<?php echo _p('Photo'); ?>:
					</div>
					<div class="table_right">
<?php if ($this->_aVars['bIsEdit'] && ! empty ( $this->_aVars['aForms']['image_path'] )): ?>
						<div id="js_event_current_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => $this->_aVars['aForms']['image_server_id'],'path' => 'pages.url_image','file' => $this->_aVars['aForms']['image_path'],'suffix' => '_120','max_width' => '120','max_height' => '120')); ?>
							<div class="extra_info">
<?php echo _p('Click <a href="#" id="js_groups_add_change_photo">here</a> to change this photo.'); ?>
							</div>
						</div>
<?php endif; ?>
						<div id="js_event_upload_image"<?php if ($this->_aVars['bIsEdit'] && ! empty ( $this->_aVars['aForms']['image_path'] )): ?> style="display:none;"<?php endif; ?>>
							<div id="js_progress_uploader"></div>
							<div class="extra_info">
<?php echo _p('You can upload a JPG, GIF or PNG file.'); ?>
<?php if ($this->_aVars['iMaxFileSize'] !== null): ?>
								<br />
<?php echo Phpfox::getPhrase('pages.the_file_size_limit_is_filesize_if_your_upload_does_not_work_try_uploading_a_smaller_picture', array('filesize' => $this->_aVars['iMaxFileSize'])); ?>
<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<div id="js_submit_upload_image" class="table_clear"<?php if ($this->_aVars['bIsEdit'] && ! empty ( $this->_aVars['aForms']['image_path'] )): ?> style="display:none;"<?php endif; ?>>
					<input type="submit" value="<?php echo _p('Upload photo'); ?>" class="button btn-primary" />
				</div>
			</div>
		</div>

		<div id="js_groups_block_info" class="js_groups_block page_section_menu_holder" style="display:none;">
<?php (($sPlugin = Phpfox_Plugin::get('groups.template_controller_add_1')) ? eval($sPlugin) : false); ?>
			<div class="table form-group">
				<div class="table_right">
					<div class="editor_holder"><?php echo Phpfox::getLib('phpfox.editor')->get('text', array (
  'id' => 'text',
));  Phpfox::getBlock('attachment.share'); ?></div>
				</div>
			</div>
			<div class="table_clear p_top_8">
				<input type="submit" value="<?php echo _p('Update'); ?>" class="button btn-primary" />
			</div>
		</div>

		<div id="js_groups_block_permissions" class="block js_groups_block page_section_menu_holder" style="display:none;">
			<div id="privacy_holder_table">
<?php if ($this->_aVars['bIsEdit']): ?>
				<div class="table form-group-follow hidden">
					<div class="table_left">
<?php echo _p('Group privacy'); ?>:
					</div>
					<div class="table_right extra_info_custom">
<?php Phpfox::getBlock('privacy.form', array('privacy_name' => 'privacy','privacy_info' => 'groups.control_who_can_see_this_page','privacy_no_custom' => true)); ?>
						<div class="extra_info">
<?php echo _p('Group privacy information'); ?>
						</div>
					</div>
				</div>
<?php endif; ?>

<?php if ($this->_aVars['bIsEdit']): ?>
				<div class="table form-group">
					<div class="table_left">
<?php echo _p('Groups privacy'); ?>
					</div>
					<div class="table_right">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label><input type="radio" name="val[reg_method]" id="reg_method" value="0" <?php if ($this->_aVars['aForms']['reg_method'] == '0'): ?> checked<?php endif; ?>>&nbsp;<i class="fa fa-privacy fa-privacy-0"></i>&nbsp;<?php echo _p('Public'); ?></label>
                                <div class="extra_info"><?php echo _p("Anyone can see the group, its members and their posts."); ?></div>
                            </li>
                            <li class="list-group-item">
                                <label><input type="radio" name="val[reg_method]" id="reg_method" value="1" <?php if ($this->_aVars['aForms']['reg_method'] == '1'): ?> checked<?php endif; ?>>&nbsp;<i class="fa fa-unlock-alt" aria-hidden="true"></i>&nbsp;<?php echo _p('Closed'); ?></label>
                                <div class="extra_info"><?php echo _p("Anyone can find the group and see who's in it. Only members can see posts."); ?></div>
                            </li>
                            <li class="list-group-item">
                                <label><input type="radio" name="val[reg_method]" id="reg_method" value="2" <?php if ($this->_aVars['aForms']['reg_method'] == '2'): ?> checked<?php endif; ?>>&nbsp;<i class="fa fa-lock" aria-hidden="true"></i>&nbsp;<?php echo _p('Secret'); ?></label>
                                <div class="extra_info"><?php echo _p("Only members can find the group and see posts."); ?></div>
                            </li>
                        </ul>
					</div>
				</div>
<?php endif; ?>
<?php if (count((array)$this->_aVars['aPermissions'])):  foreach ((array) $this->_aVars['aPermissions'] as $this->_aVars['aPerm']): ?>
				<div class="table form-group">
					<div class="table_left">
<?php echo $this->_aVars['aPerm']['phrase']; ?>
					</div>
					<div class="table_right">
						<select name="val[perms][<?php echo $this->_aVars['aPerm']['id']; ?>]" class="form-control">
							<option value="1"<?php if ($this->_aVars['aPerm']['is_active'] == '1'): ?> selected="selected"<?php endif; ?>><?php echo _p('Members only'); ?></option>
							<option value="2"<?php if ($this->_aVars['aPerm']['is_active'] == '2'): ?> selected="selected"<?php endif; ?>><?php echo _p('Admins only'); ?></option>
						</select>
					</div>
				</div>
<?php endforeach; endif; ?>
				<div class="table_clear">
					<input type="submit" value="<?php echo _p('Update'); ?>" class="button btn-primary" />
				</div>
			</div>
		</div>

		<div id="js_groups_block_admins" class="js_groups_block page_section_menu_holder" style="display:none;">

			<div class="table form-group">
				<div>
					<div id="js_custom_search_friend_placement"><?php if (count ( $this->_aVars['aForms']['admins'] )): ?>
						<div class="js_custom_search_friend_holder">
							<ul>
<?php if (count((array)$this->_aVars['aForms']['admins'])):  foreach ((array) $this->_aVars['aForms']['admins'] as $this->_aVars['aAdmin']): ?>
								<li>
									<a href="#" class="friend_search_remove" title="Remove" onclick="$(this).parents('li:first').remove(); return false;"><?php echo _p('Remove'); ?></a>
									<div class="friend_search_image"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aAdmin'],'suffix' => '_50_square','max_width' => '25','max_height' => '25')); ?></div>
									<div class="friend_search_name"><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aAdmin']['full_name']); ?></div>
									<div class="clear"></div>
									<div><input type="hidden" name="admins[]" value="<?php echo $this->_aVars['aAdmin']['user_id']; ?>" /></div>
								</li>
<?php endforeach; endif; ?>
							</ul>
						</div>
<?php endif; ?></div>
				</div>
				<div>
					<div id="js_custom_search_friend"></div>
				</div>
			</div>

			<div class="table_clear">
				<input type="submit" value="<?php echo _p('Update'); ?>" class="button btn-primary" />
			</div>

			<script type="text/javascript">
				$Behavior.groupsSearchFriends = function()
				{
					$Core.searchFriends({
						'id': '#js_custom_search_friend',
						'placement': '#js_custom_search_friend_placement',
						'width': '100%',
						'max_search': 10,
						'input_name': 'admins',

						'default_value': '<?php echo _p('Search friends by their name...'); ?>'
					});
				};
			</script>
		</div>

		<div id="js_groups_block_invite" class="js_groups_block page_section_menu_holder" style="display:none;">
			<div class="block">
				<div class="content">
<?php if (isset ( $this->_aVars['aForms']['page_id'] )): ?>
					<div id="js_selected_friends" class="hide_it"></div>
<?php Phpfox::getBlock('friend.search', array('input' => 'invite','hide' => true,'friend_item_id' => $this->_aVars['aForms']['page_id'],'friend_module_id' => 'groups','in_form' => true)); ?>
<?php endif; ?>
					<div class="p_top_8">
						<input type="submit" value="<?php echo _p('Send invitations'); ?>" class="button btn-primary" />
					</div>
				</div>
			</div>
		</div>

		<div id="js_groups_block_widget" class="block js_groups_block page_section_menu_holder" style="display:none;">
			<div class="table form-group">
				<div class="groups_create_new_widget">
					<a href="#" onclick="$Core.box('groups.widget', 700, 'page_id=<?php echo $this->_aVars['aForms']['page_id']; ?>'); return false;"><?php echo _p('Create new widget'); ?></a>
				</div>
				<ul class="groups_edit_widget">
<?php if (count((array)$this->_aVars['aWidgetEdits'])):  foreach ((array) $this->_aVars['aWidgetEdits'] as $this->_aVars['aWidgetEdit']): ?>
					<li class="widget" id="js_groups_widget_<?php echo $this->_aVars['aWidgetEdit']['widget_id']; ?>">
						<div class="groups_edit_widget_tools">

							<div class="row_edit_bar_parent" style="display:block;">
								<div class="row_edit_bar">
									<a role="button" class="row_edit_bar_action" data-toggle="dropdown">
										<i class="fa fa-action"></i>
									</a>
									<ul class="dropdown-menu">
										<li>
											<a href="#" onclick="$Core.box('groups.widget', 700, 'widget_id=<?php echo $this->_aVars['aWidgetEdit']['widget_id']; ?>'); return false;"><?php echo _p('Edit'); ?></a>
										</li>
										<li class="item_delete">
											<a href="#" onclick="if (confirm('Are you sure?')) { $.ajaxCall('groups.deleteWidget', 'widget_id=<?php echo $this->_aVars['aWidgetEdit']['widget_id']; ?>'); } return false;"><?php echo _p('Delete'); ?></a>
										</li>
									</ul>
								</div>
							</div>

						</div>
<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aWidgetEdit']['title']); ?>
					</li>
<?php endforeach; endif; ?>
				</ul>
			</div>
		</div>

	
</form>

</div>
<?php else: ?>
<?php if (Phpfox ::getUserBy('profile_page_id')): ?>

<?php else: ?>
<div id="js_groups_add_holder">
	<div class="extra_info">
<?php echo _p('Connect with friends, associates & fans.'); ?>
	</div>
	<div class="main_break"></div>
<?php if (count((array)$this->_aVars['aTypes'])):  foreach ((array) $this->_aVars['aTypes'] as $this->_aVars['aType']): ?>
	<div class="groups_type_add_holder">
		<a href="#" class="groups_type_add_inner_link">
			<span>
<?php if (Phpfox ::isPhrase($this->_aVars['aType']['name'])): ?>
<?php echo Phpfox::getPhrase($this->_aVars['aType']['name']); ?>
<?php else: ?>
<?php echo Phpfox::getLib('locale')->convert($this->_aVars['aType']['name']); ?>
<?php endif; ?>
            </span>
		</a>
		<div class="groups_type_add_form">
			<div class="groups_type_add_form_holder">
				<form method="post" action="#">
					<div><input type="hidden" name="val[type_id]" value="<?php echo $this->_aVars['aType']['type_id']; ?>" /></div>
<?php if (isset ( $this->_aVars['aType']['categories'] ) && is_array ( $this->_aVars['aType']['categories'] ) && count ( $this->_aVars['aType']['categories'] )): ?>
					<div class="table form-group">
						<div class="table_right">
							<select name="val[category_id]" class="form-control">
								<option value=""><?php echo _p('Choose a category'); ?></option>
<?php if (count((array)$this->_aVars['aType']['categories'])):  foreach ((array) $this->_aVars['aType']['categories'] as $this->_aVars['aCategory']): ?>
								<option value="<?php echo $this->_aVars['aCategory']['category_id']; ?>">
<?php if (Phpfox ::isPhrase($this->_aVars['aCategory']['name'])): ?>
<?php echo Phpfox::getPhrase($this->_aVars['aCategory']['name']); ?>
<?php else: ?>
<?php echo Phpfox::getLib('locale')->convert($this->_aVars['aCategory']['name']); ?>
<?php endif; ?>
                                </option>
<?php endforeach; endif; ?>
							</select>
						</div>
					</div>
<?php endif; ?>
					<div class="table form-group">
						<div class="table_right">
							<input type="text" name="val[title]" value="" class="form-control groups_type_add_input" placeholder="<?php echo _p('Name'); ?>" />
						</div>
					</div>

					<div class="table_clear" id="js_groups_add_submit_button">
						<input type="submit" value="<?php echo _p('Get started'); ?>" class="button btn-primary" />
					</div>

				
</form>

			</div>
		</div>
	</div>
<?php endforeach; endif; ?>
	<div class="clear"></div>
</div>
<?php endif; ?>
<?php endif; ?>
