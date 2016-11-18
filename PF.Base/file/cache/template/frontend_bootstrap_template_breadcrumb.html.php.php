<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 7:45 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: breadcrumb.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */


?>
<?php if (isset ( $this->_aVars['aBreadCrumbs'] ) && count ( $this->_aVars['aBreadCrumbs'] ) > 0): ?>
<div class="row hide-overflow breadcrumbs-holder">
<?php if (isset ( $this->_aVars['aBreadCrumbs'] ) && count ( $this->_aVars['aBreadCrumbs'] ) > 0): ?>
	<div class="clearfix breadcrumbs-top">
		<div class="pull-left">
			<div class="breadcrumbs-list">
<?php if (isset ( $this->_aVars['aBreadCrumbs'] )): ?>
<?php if (count((array)$this->_aVars['aBreadCrumbs'])):  $this->_aPhpfoxVars['iteration']['link'] = 0;  foreach ((array) $this->_aVars['aBreadCrumbs'] as $this->_aVars['sLink'] => $this->_aVars['sCrumb']):  $this->_aPhpfoxVars['iteration']['link']++; ?>


				<a <?php if (! empty ( $this->_aVars['sLink'] )): ?>href="<?php echo $this->_aVars['sLink']; ?>" <?php endif; ?> class="ajax_link">
<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['sCrumb']); ?></a>
<?php endforeach; endif; ?>
<?php endif; ?>
<?php if (! $this->_aVars['bIsDetailPage'] && ! defined ( 'PHPFOX_APP_DETAIL_PAGE' )): ?>
<?php if (! empty ( $this->_aVars['aBreadCrumbTitle'] )): ?>
				<a href="<?php echo $this->_aVars['aBreadCrumbTitle'][1]; ?>" class="ajax_link"><?php echo $this->_aVars['aBreadCrumbTitle'][0]; ?></a>
<?php endif; ?>
<?php endif; ?>
			</div>

		</div>
		<div class="pull-right breadcrumbs_right_section">
<?php Phpfox::getBlock('core.template-breadcrumbmenu'); ?>
		</div>
	</div>
<?php endif; ?>
<?php if (( $this->_aVars['bIsDetailPage'] || defined ( 'PHPFOX_APP_DETAIL_PAGE' ) ) && ! empty ( $this->_aVars['aBreadCrumbTitle'] )): ?>
	<h1 class="breadcrumbs-bottom">
		<a href="<?php echo $this->_aVars['aBreadCrumbTitle'][1]; ?>" class="ajax_link"><?php echo $this->_aVars['aBreadCrumbTitle'][0]; ?></a>
	</h1>
<?php endif; ?>
</div>
<?php endif; ?>
