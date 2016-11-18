<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:23 pm */ ?>
<?php 

?>
		<iframe src="#" id="js_pages_frame" name="js_pages_frame" style="display:none;"></iframe>
		<div id="js_pages_widget_error"></div>
		<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('groups.frame'); ?>" target="js_pages_frame" enctype="multipart/form-data">
			<div><input type="hidden" name="val[page_id]" value="<?php echo $this->_aVars['iPageId']; ?>" /></div>
<?php if ($this->_aVars['bIsEdit']): ?>
			<div><input type="hidden" name="widget_id" value="<?php echo $this->_aVars['aForms']['widget_id']; ?>" /></div>
<?php endif; ?>
			<div class="table form-group">
				<div class="table_left">
<?php echo _p('Title'); ?>:
				</div>
				<div class="table_right">
					<input type="text" name="val[title]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['title']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['title']) : (isset($this->_aVars['aForms']['title']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['title']) : '')); ?>
" size="30" class="form=control" />
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="table form-group">
				<div class="table_left">
<?php echo _p('Is a block'); ?>
				</div>
				<div class="table_right">
					<select name="val[is_block]" class="form-control" onchange="if (this.value == '1') { $('#js_pages_widget_block').slideUp(); } else { $('#js_pages_widget_block').slideDown(); }">
						<option value="0"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('is_block') && in_array('is_block', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['is_block'])
								&& $aParams['is_block'] == '0')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['is_block'])
									&& !isset($aParams['is_block'])
									&& $this->_aVars['aForms']['is_block'] == '0')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
> <?php echo Phpfox::getPhrase('core.no'); ?></option>
						<option value="1"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('is_block') && in_array('is_block', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['is_block'])
								&& $aParams['is_block'] == '1')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['is_block'])
									&& !isset($aParams['is_block'])
									&& $this->_aVars['aForms']['is_block'] == '1')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
> <?php echo Phpfox::getPhrase('core.yes'); ?></option>
					</select>
				</div>
				<div class="clear"></div>
			</div>				
			
			<div id="js_pages_widget_block"<?php if ($this->_aVars['bIsEdit'] && $this->_aVars['aForms']['is_block'] == '1'): ?> style="display:none;"<?php endif; ?>>
				<div class="table form-group">
					<div class="table_left">
<?php echo _p('Menu Title'); ?>:
					</div>
					<div class="table_right">
						<input class="form-control" type="text" name="val[menu_title]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['menu_title']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['menu_title']) : (isset($this->_aVars['aForms']['menu_title']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['menu_title']) : '')); ?>
" size="30" />
					</div>
					<div class="clear"></div>
				</div>			

				<div class="table form-group">
					<div class="table_left">
<?php echo _p('Url title'); ?>:
					</div>
					<div class="table_right">
						<span class="extra_info"><?php echo $this->_aVars['sPageUrl']; ?></span><input onclick="this.select();" type="text" name="val[url_title]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['url_title']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['url_title']) : (isset($this->_aVars['aForms']['url_title']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['url_title']) : '')); ?>
" size="15" class="form-control" /><span class="extra_info">/</span>
					</div>
					<div class="clear"></div>
				</div>	
				 
				<div class="table form-group">
					<div class="table_left">
<?php echo _p('Icon'); ?>:
					</div>
					<div class="table_right">
<?php if ($this->_aVars['bIsEdit'] && ! empty ( $this->_aVars['aForms']['image_path'] )): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('thickbox' => true,'server_id' => $this->_aVars['aForms']['image_server_id'],'path' => 'pages.url_image','file' => $this->_aVars['aForms']['image_path'],'suffix' => '_16','class' => 'v_middle')); ?>
						<div class="extra_info">								
<?php echo _p('Upload a new image below if you wish to change this icon.'); ?>
						</div>
<?php endif; ?>
						<input type="file" name="image" accept="image/*"/>
						<div class="extra_info">
<?php echo Phpfox::getPhrase('user.you_can_upload_a_jpg_gif_or_png_file'); ?>
						</div>						
					</div>
					<div class="clear"></div>
				</div>				 
			</div>
			
			<div class="table form-group">
				<div class="table_left">
<?php echo _p('Content'); ?>:
				</div>
				<div class="table_right">
					<div class="editor_holder"><?php echo Phpfox::getLib('phpfox.editor')->get('text', array (
  'id' => 'text',
));  Phpfox::getBlock('attachment.share'); ?></div>			
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="table_clear" id="js_pages_widget_submit_button">
				<ul class="table_clear_button">
					<li><input type="submit" value="<?php echo _p('Submit'); ?>" class="button btn-primary" /></li>
					<li class="table_clear_ajax"></li>
				</ul>		
				<div class="clear"></div>
			</div>			
		
</form>

