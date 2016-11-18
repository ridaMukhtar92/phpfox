<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:32 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: pager.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */
 
 

?>

<?php if (! empty ( $this->_aVars['bPopup'] )): ?>
<?php if (! empty ( $this->_aVars['aPager']['nextAjaxUrl'] )): ?>
<div class="js_pager_popup_view_more_link">
	<a href="<?php echo $this->_aVars['aPager']['nextUrl']; ?>" class="button btn-small no_ajax_link" onclick="$.ajaxCall('<?php echo $this->_aVars['sAjax']; ?>', 'page=<?php echo $this->_aVars['aPager']['nextAjaxUrl'];  echo $this->_aVars['aPager']['sParamsAjax']; ?>', 'GET'); return false;">
<?php if (! empty ( $this->_aVars['aPager']['icon'] )): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => $this->_aVars['aPager']['icon'],'class' => 'v_middle')); ?>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aPager']['phrase'] )):  echo $this->_aVars['aPager']['phrase'];  else:  echo Phpfox::getPhrase('core.view_more');  endif; ?>
	</a>
</div>
<?php endif; ?>
<?php else: ?>
<div class="js_pager_view_more_link">
<?php if (! empty ( $this->_aVars['bIsAdminCp'] ) && Phpfox ::isAdminPanel()): ?>
	<div class="pager_view_more_holder">
		<div class="pager_view_more_link">
<?php if (! empty ( $this->_aVars['aPager']['nextAjaxUrl'] )): ?>
			<a href="<?php echo $this->_aVars['aPager']['nextUrl']; ?>" class="pager_view_more no_ajax_link" onclick="$.ajaxCall('<?php echo $this->_aVars['sAjax']; ?>', 'page=<?php echo $this->_aVars['aPager']['nextAjaxUrl'];  echo $this->_aVars['aPager']['sParamsAjax']; ?>', 'GET'); return false;">
<?php if (! empty ( $this->_aVars['aPager']['icon'] )): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => $this->_aVars['aPager']['icon'],'class' => 'v_middle')); ?>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aPager']['phrase'] )):  echo $this->_aVars['aPager']['phrase'];  else:  echo Phpfox::getPhrase('core.view_more');  endif; ?>
				<span><?php echo Phpfox::getPhrase('core.displaying_of_total', array('displaying' => $this->_aVars['aPager']['displaying'],'total' => $this->_aVars['aPager']['totalRows'])); ?></span>
			</a>
<?php endif; ?>
		</div>
	</div>
<?php else: ?>
	<a href="<?php echo $this->_aVars['sCurrentUrl']; ?>" class="next_page" data-paging="<?php if (isset ( $this->_aVars['sPagingVar'] )):  echo $this->_aVars['sPagingVar'];  endif; ?>">
		<i class="fa fa-spin fa-circle-o-notch"></i>
		<span>View More</span>
	</a>
<?php endif; ?>
</div>
<?php endif; ?>
