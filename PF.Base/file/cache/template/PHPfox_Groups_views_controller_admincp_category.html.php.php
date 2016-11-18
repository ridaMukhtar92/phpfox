<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:14 pm */ ?>
<?php 

?>
<div class="table_header">
<?php echo _p('Categories'); ?>
</div>
<table id="_sort" data-sort-url="<?php if ($this->_aVars['bSubCategory']):  echo Phpfox::getLib('phpfox.url')->makeUrl('groups.admincp.category.order', array('type' => 'sub'));  else:  echo Phpfox::getLib('phpfox.url')->makeUrl('groups.admincp.category.order', array('type' => 'main'));  endif; ?>">
	<tr>
		<th style="width:20px"></th>
		<th style="width:20px"></th>
		<th><?php echo _p('Name'); ?></th>
		<th class="t_center" style="width:60px;"><?php echo _p('Active'); ?></th>
	</tr>
<?php if (count((array)$this->_aVars['aCategories'])):  foreach ((array) $this->_aVars['aCategories'] as $this->_aVars['iKey'] => $this->_aVars['aCategory']): ?>
	<tr class="<?php if (is_int ( $this->_aVars['iKey'] / 2 )): ?> tr<?php else:  endif; ?>" data-sort-id="<?php if ($this->_aVars['bSubCategory']):  echo $this->_aVars['aCategory']['category_id'];  else:  echo $this->_aVars['aCategory']['type_id'];  endif; ?>">
		<td class="t_center">
			<i class="fa fa-sort"></i>
		</td>
		<td class="t_center">
			<a href="#" class="js_drop_down_link" title="Manage"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/bullet_arrow_down.png','alt' => '')); ?></a>
			<div class="link_menu">
				<ul>
					<li><a class="popup" href="<?php if ($this->_aVars['bSubCategory']):  echo Phpfox::getLib('phpfox.url')->makeUrl('groups.admincp.add-category', array('sub' => $this->_aVars['aCategory']['category_id']));  else:  echo Phpfox::getLib('phpfox.url')->makeUrl('groups.admincp.add-category', array('id' => $this->_aVars['aCategory']['type_id']));  endif; ?>"><?php echo _p('Edit'); ?></a></li>
<?php if (isset ( $this->_aVars['aCategory']['categories'] ) && ( $this->_aVars['iTotalSub'] = count ( $this->_aVars['aCategory']['categories'] ) )): ?>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.app', array('id' => 'PHPfox_Groups','val[sub]' => $this->_aVars['aCategory']['type_id'])); ?>"><?php echo _p('Manage Sub-Categories ({{ total }})', array('total' => $this->_aVars['iTotalSub'])); ?></a></li>
<?php endif; ?>
					<li><a href="<?php if ($this->_aVars['bSubCategory']):  echo Phpfox::getLib('phpfox.url')->makeUrl('groups.admincp', array('sub' => $this->_aVars['aCategory']['type_id'],'delete' => $this->_aVars['aCategory']['category_id']));  else:  echo Phpfox::getLib('phpfox.url')->makeUrl('groups.admincp', array('delete' => $this->_aVars['aCategory']['type_id']));  endif; ?>" onclick="return confirm('<?php echo _p('Are you sure?'); ?>');"><?php echo _p('Delete'); ?></a></li>
				</ul>
			</div>		
		</td>	
		<td>
<?php if (Phpfox ::isPhrase($this->_aVars['aCategory']['name'])): ?>
<?php echo Phpfox::getPhrase($this->_aVars['aCategory']['name']); ?>
<?php else: ?>
<?php echo Phpfox::getLib('locale')->convert($this->_aVars['aCategory']['name']); ?>
<?php endif; ?>
        </td>
		<td class="t_center">
			<div class="js_item_is_active"<?php if (! $this->_aVars['aCategory']['is_active']): ?> style="display:none;"<?php endif; ?>>
				<a href="#?call=groups.updateActivity&amp;id=<?php if ($this->_aVars['bSubCategory']):  echo $this->_aVars['aCategory']['category_id'];  else:  echo $this->_aVars['aCategory']['type_id'];  endif; ?>&amp;active=0&amp;sub=<?php if ($this->_aVars['bSubCategory']): ?>1<?php else: ?>0<?php endif; ?>" class="js_item_active_link" title="<?php echo _p('Deactivate'); ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/bullet_green.png','alt' => '')); ?></a>
			</div>
			<div class="js_item_is_not_active"<?php if ($this->_aVars['aCategory']['is_active']): ?> style="display:none;"<?php endif; ?>>
				<a href="#?call=groups.updateActivity&amp;id=<?php if ($this->_aVars['bSubCategory']):  echo $this->_aVars['aCategory']['category_id'];  else:  echo $this->_aVars['aCategory']['type_id'];  endif; ?>&amp;active=1&amp;sub=<?php if ($this->_aVars['bSubCategory']): ?>1<?php else: ?>0<?php endif; ?>" class="js_item_active_link" title="<?php echo _p('Activate'); ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/bullet_red.png','alt' => '')); ?></a>
			</div>		
		</td>		
	</tr>
<?php endforeach; endif; ?>
</table>
