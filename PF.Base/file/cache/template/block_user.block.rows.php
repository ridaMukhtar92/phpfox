<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:24 pm */ ?>
<?php

?>
<div class="user_rows">
	<div class="user_rows_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aUser'],'suffix' => '_120_square')); ?>
	</div>
<?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aUser']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aUser']['user_name'], ((empty($this->_aVars['aUser']['user_name']) && isset($this->_aVars['aUser']['profile_page_id'])) ? $this->_aVars['aUser']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aUser']['user_id'], $this->_aVars['aUser']['full_name']), Phpfox::getParam('user.maximum_length_for_full_name')) . '</a></span>'; ?>
</div>
