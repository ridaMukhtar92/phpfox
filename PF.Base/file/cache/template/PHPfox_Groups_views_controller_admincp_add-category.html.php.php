<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:22 pm */ ?>
<?php 

?>
<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('groups.admincp.add-category'); ?>">
<?php if ($this->_aVars['bIsEdit']): ?>
<?php if ($this->_aVars['bIsEdit'] && isset ( $this->_aVars['aForms']['category_id'] )): ?>
        <div><input type="hidden" name="sub" value="<?php echo $this->_aVars['iEditId']; ?>" /></div>
<?php else: ?>
        <div><input type="hidden" name="id" value="<?php echo $this->_aVars['iEditId']; ?>" /></div>
<?php endif; ?>
        <div><input type="hidden" name="val[name]" value="<?php echo $this->_aVars['aForms']['name']; ?>" /></div>
<?php endif; ?>
<?php if ($this->_aVars['bIsEdit'] && ! isset ( $this->_aVars['aForms']['category_id'] )):  else: ?>
	<div class="table form-group">
		<div class="table_left">
<?php echo _p('Parent category'); ?>:
		</div>
		<div class="table_right">
			<select name="val[type_id]" id="add_select" class="form-control">
<?php if (! $this->_aVars['bIsEdit']): ?>
				<option value="0"><?php echo _p('None'); ?></option>
<?php endif; ?>
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
<?php if (count((array)$this->_aVars['aTypes'])):  foreach ((array) $this->_aVars['aTypes'] as $this->_aVars['aType']): ?>
			<div class="hidden" id="pages_type_<?php echo $this->_aVars['aType']['type_id']; ?>" data-group="1"></div>
<?php endforeach; endif; ?>
		</div>
		<div class="clear"></div>		
	</div>	
<?php endif; ?>
<?php if (count((array)$this->_aVars['aLanguages'])):  foreach ((array) $this->_aVars['aLanguages'] as $this->_aVars['aLanguage']): ?>
	<div class="table form-group">
		<div class="table_left">
<?php echo _p('Name'); ?>&nbsp;<strong><?php echo $this->_aVars['aLanguage']['title']; ?></strong>:
		</div>
		<div class="table_right">
<?php $this->assign('value_name', "name_".$this->_aVars['aLanguage']['language_id']); ?>
            <input type="text" name="val[name_<?php echo $this->_aVars['aLanguage']['language_id']; ?>]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams[''.$this->_aVars['value_name'].'']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams[''.$this->_aVars['value_name'].'']) : (isset($this->_aVars['aForms'][''.$this->_aVars['value_name'].'']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms'][''.$this->_aVars['value_name'].'']) : '')); ?>
" size="30" />
		</div>
		<div class="clear"></div>		
	</div>
<?php endforeach; endif; ?>

	<div class="table_clear">
		<input type="submit" value="<?php echo _p('Submit'); ?>" class="button btn-primary" />
	</div>

</form>

