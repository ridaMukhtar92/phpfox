<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:21 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Admincp
 * @version 		$Id: index.html.php 1544 2010-04-07 13:20:17Z Raymond_Benc $
 */
 


?>
<?php if (count ( $this->_aVars['aProducts'] )): ?>
<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.product'); ?>">
	<table>
<?php if (count((array)$this->_aVars['aProducts'])):  foreach ((array) $this->_aVars['aProducts'] as $this->_aVars['iKey'] => $this->_aVars['aProduct']): ?>
	<tr class="checkRow<?php if (is_int ( $this->_aVars['iKey'] / 2 )): ?> tr<?php else:  endif; ?>">
		<td class="t_center">
			<a href="#" class="js_drop_down_link" title="<?php echo Phpfox::getPhrase('admincp.manage'); ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/bullet_arrow_down.png','alt' => '')); ?></a>
			<div class="link_menu">
				<ul>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.product.add', array('id' => $this->_aVars['aProduct']['product_id'])); ?>"><?php echo Phpfox::getPhrase('admincp.edit'); ?></a></li>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.product.file', array('export' => $this->_aVars['aProduct']['product_id'],'extension' => 'xml')); ?>"><?php echo Phpfox::getPhrase('admincp.export'); ?></a></li>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.product', array('delete' => $this->_aVars['aProduct']['product_id'])); ?>" onclick="return confirm('<?php echo Phpfox::getPhrase('admincp.are_you_sure', array('phpfox_squote' => true)); ?>');"><?php echo Phpfox::getPhrase('admincp.delete'); ?></a></li>
				</ul>
			</div>		
		</td>		
		<td><?php echo $this->_aVars['aProduct']['title']; ?> (<?php echo $this->_aVars['aProduct']['version']; ?>)</td>
		<td class="t_center">
<?php if (isset ( $this->_aVars['aProduct']['upgrade_version'] )): ?>
			<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.product', array('upgrade' => $this->_aVars['aProduct']['product_id'])); ?>" class="action_link">
<?php echo Phpfox::getPhrase('admincp.upgrade_upgrade_version', array('upgrade_version' => $this->_aVars['aProduct']['upgrade_version'])); ?></a>
<?php else: ?>
<?php echo Phpfox::getPhrase('admincp.n_a'); ?>
<?php endif; ?>
		</td>
	</tr>
<?php endforeach; endif; ?>
	</table>

</form>


<?php else: ?>
<div class="extra_info">
<?php echo Phpfox::getPhrase('admincp.no_modules_have_been_installed'); ?>.
</div>
<?php endif; ?>
