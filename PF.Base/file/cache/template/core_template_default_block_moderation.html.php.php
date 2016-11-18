<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:32 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: moderation.html.php 4086 2012-04-05 12:32:32Z Raymond_Benc $
 */
 
 

?>
<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('current'); ?>" id="js_global_multi_form_holder">
<?php if (! empty ( $this->_aVars['sCustomModerationFields'] )): ?>
<?php echo $this->_aVars['sCustomModerationFields']; ?>
<?php endif; ?>
	<div id="js_global_multi_form_ids"><?php echo $this->_aVars['sInputFields']; ?></div>
	<div class="moderation_holder btn-group <?php if (! $this->_aVars['iTotalInputFields']): ?> not_active<?php endif; ?>">
		<a role="button" class="btn btn-sm moderation_drop"><span><?php echo Phpfox::getPhrase('core.with_selected'); ?> (<strong class="js_global_multi_total"><?php echo $this->_aVars['iTotalInputFields']; ?></strong>)</span></a>
		<a role="button" class="moderation_action moderation_action_select btn btn-sm pull-right"
		   rel="select"><?php echo Phpfox::getPhrase('core.select_all'); ?>
		</a>

		<ul class="dropdown-menu">
			<li>
				<a role="button" class="moderation_clear_all"><?php echo Phpfox::getPhrase('core.clear_all_selected'); ?></a>
			</li>
<?php if (count((array)$this->_aVars['aModerationParams']['menu'])):  foreach ((array) $this->_aVars['aModerationParams']['menu'] as $this->_aVars['aModerationMenu']): ?>
			<li>
				<a href="#<?php echo $this->_aVars['aModerationMenu']['action']; ?>" class="moderation_process_action" rel="<?php echo $this->_aVars['aModerationParams']['ajax']; ?>"><?php echo $this->_aVars['aModerationMenu']['phrase']; ?></a>
			</li>
<?php endforeach; endif; ?>
		</ul>
		<span class="moderation_process"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?>
		</span>
		<a role="button"
		   class="moderation_action moderation_action_unselect btn btn-sm btn-default pull-right"
		   rel="unselect"><?php echo Phpfox::getPhrase('core.un_select_all'); ?></a>
	</div>

</form>

