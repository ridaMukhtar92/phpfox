<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 7:45 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: controller.html.php 64 2009-01-19 15:05:54Z Raymond_Benc $
 */



?>
<?php if (( ( count ( $this->_aVars['aSubMenus'] ) || isset ( $this->_aVars['customMenu'] ) ) ) && Phpfox ::isUser()): ?>
<div class="page_breadcrumbs_menu">
<?php if (Phpfox ::isUser()): ?>
<?php if (( isset ( $this->_aVars['customMenu'] ) )): ?>
	<a class="btn btn-success<?php if (( isset ( $this->_aVars['customMenu']['css_class'] ) )): ?> <?php echo $this->_aVars['customMenu']['css_class'];  endif; ?>" href="<?php echo $this->_aVars['customMenu']['url']; ?>" <?php echo $this->_aVars['customMenu']['extra']; ?>>
		<span></span><?php echo $this->_aVars['customMenu']['title']; ?>
	</a>
<?php endif; ?>
<?php if (count((array)$this->_aVars['aSubMenus'])):  $this->_aPhpfoxVars['iteration']['submenu'] = 0;  foreach ((array) $this->_aVars['aSubMenus'] as $this->_aVars['iKey'] => $this->_aVars['aSubMenu']):  $this->_aPhpfoxVars['iteration']['submenu']++; ?>

<?php if (isset ( $this->_aVars['aSubMenu']['module'] ) && ( isset ( $this->_aVars['aSubMenu']['var_name'] ) || isset ( $this->_aVars['aSubMenu']['text'] ) )): ?>
        <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aSubMenu']['url']); ?>"<?php if (( isset ( $this->_aVars['aSubMenu']['css_name'] ) )): ?> class="btn btn-success <?php echo $this->_aVars['aSubMenu']['css_name']; ?> no_ajax"<?php else: ?>class="btn btn-success"<?php endif; ?>>
		<span></span>
<?php if (isset ( $this->_aVars['aSubMenu']['text'] )): ?>
<?php echo $this->_aVars['aSubMenu']['text']; ?>
<?php else: ?>
<?php echo Phpfox::getPhrase($this->_aVars['aSubMenu']['module'].'.'.$this->_aVars['aSubMenu']['var_name']); ?>
<?php endif; ?>
        </a>
<?php endif; ?>
<?php endforeach; endif; ?>
<?php else: ?>
<?php if (Phpfox ::getParam('user.allow_user_registration')): ?>
<?php endif; ?>
<?php endif; ?>
</div>
<?php endif; ?>



