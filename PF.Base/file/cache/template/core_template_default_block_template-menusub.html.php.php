<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 7:45 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright        [PHPFOX_COPYRIGHT]
 * @author           Raymond_Benc
 * @package          Phpfox
 * @version          $Id: template-menusub.html.php 2817 2011-08-08 16:59:43Z Raymond_Benc $
 */



?>
<?php if (isset ( $this->_aVars['aFilterMenus'] ) && is_array ( $this->_aVars['aFilterMenus'] ) && count ( $this->_aVars['aFilterMenus'] )): ?>
<div class="block" id="js_block_border_core_menusub">
    <div class="title"><?php echo Phpfox::getPhrase('core.menu'); ?></div>
    <div class="content">
        <div class="sub_section_menu header_display">
            <ul class="action">
<?php if (count((array)$this->_aVars['aFilterMenus'])):  $this->_aPhpfoxVars['iteration']['filtermenu'] = 0;  foreach ((array) $this->_aVars['aFilterMenus'] as $this->_aVars['aFilterMenu']):  $this->_aPhpfoxVars['iteration']['filtermenu']++; ?>

<?php if (! isset ( $this->_aVars['aFilterMenu']['name'] )): ?>
                <li class="menu_line"></li>
<?php else: ?>
                <li class="<?php if ($this->_aVars['aFilterMenu']['active']): ?>active<?php endif; ?>"><a href="<?php echo $this->_aVars['aFilterMenu']['link']; ?>"><?php echo $this->_aVars['aFilterMenu']['name']; ?></a>
                </li>
<?php endif; ?>
<?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>
							
