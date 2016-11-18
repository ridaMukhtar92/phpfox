<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 7:45 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-menufooter.html.php 6413 2013-08-05 09:42:03Z Miguel_Espinoza $
 */
 
 

?>
<div class="row footer-holder">
	<div class="col-md-6 col-sm-6 copyright">
        <?php
						Phpfox::getLib('template')->getBuiltFile('core.block.template-copyright');
						?>
	</div>
	<div class="col-md-6 col-sm-6">
		<ul class="list-inline footer-menu">
<?php if (count((array)$this->_aVars['aFooterMenu'])):  $this->_aPhpfoxVars['iteration']['footer'] = 0;  foreach ((array) $this->_aVars['aFooterMenu'] as $this->_aVars['iKey'] => $this->_aVars['aMenu']):  $this->_aPhpfoxVars['iteration']['footer']++; ?>

			<li<?php if ($this->_aPhpfoxVars['iteration']['footer'] == 1): ?> class="first"<?php endif; ?>><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl(''.$this->_aVars['aMenu']['url'].''); ?>" class="ajax_link<?php if ($this->_aVars['aMenu']['url'] == 'mobile'): ?> no_ajax_link<?php endif; ?>"><?php echo Phpfox::getPhrase($this->_aVars['aMenu']['module'].'.'.$this->_aVars['aMenu']['var_name']); ?></a></li>
<?php endforeach; endif; ?>
		</ul>
	</div>
</div>

