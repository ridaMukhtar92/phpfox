<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:08 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: form.html.php 4854 2012-10-09 05:20:40Z Raymond_Benc $
 */



?>
<div class="<?php if ($this->_aVars['sPrivacyFormType'] == 'mini'): ?>privacy_setting_mini<?php else: ?>privacy_setting<?php endif; ?> privacy_setting_div">
    <input type="hidden" id="<?php echo $this->_aVars['sPrivacyFormName']; ?>" name="val<?php if (! empty ( $this->_aVars['sPrivacyArray'] )): ?>[<?php echo $this->_aVars['sPrivacyArray']; ?>]<?php endif; ?>[<?php echo $this->_aVars['sPrivacyFormName']; ?>]" value="<?php echo $this->_aVars['aSelectedPrivacyControl']['value']; ?>" />
    <a role="button" data-toggle="dropdown" class="privacy_setting_active<?php if ($this->_aVars['sPrivacyFormType'] == 'mini'): ?> js_hover_title<?php endif; ?> btn <?php if ($this->_aVars['sPrivacyFormType'] == 'mini'): ?>btn-lg<?php endif; ?> btn-default">
        <i class="fa fa-privacy fa-privacy-<?php echo $this->_aVars['aSelectedPrivacyControl']['value']; ?>"></i>
        <span class="txt-label"><?php echo $this->_aVars['aSelectedPrivacyControl']['phrase']; ?></span>
		<span class="txt-label js_hover_info"><?php echo $this->_aVars['aSelectedPrivacyControl']['phrase']; ?>
		</span>
        <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-checkmark">
<?php if (count((array)$this->_aVars['aPrivacyControls'])):  $this->_aPhpfoxVars['iteration']['privacycontrol'] = 0;  foreach ((array) $this->_aVars['aPrivacyControls'] as $this->_aVars['aPrivacyControl']):  $this->_aPhpfoxVars['iteration']['privacycontrol']++; ?>

<?php if (isset ( $this->_aVars['aPrivacyControl']['onclick'] )): ?>
        <li class="divider"></li>
<?php endif; ?>
        <li role="presentation">
            <a role="button" <?php if (isset ( $this->_aVars['aPrivacyControl']['onclick'] )): ?> onclick="<?php echo $this->_aVars['aPrivacyControl']['onclick']; ?> return false;"<?php endif; ?> data-toggle="privacy_item" rel="<?php echo $this->_aVars['aPrivacyControl']['value']; ?>" <?php if (( isset ( $this->_aVars['aPrivacyControl']['is_active'] ) ) || ( isset ( $this->_aVars['bNoActive'] ) && $this->_aVars['bNoActive'] && $this->_aPhpfoxVars['iteration']['privacycontrol'] == 1 )): ?>class="is_active_image"<?php endif; ?>><?php echo $this->_aVars['aPrivacyControl']['phrase']; ?>
            </a>
        </li>
<?php endforeach; endif; ?>
    </ul>
</div>
<?php if (! empty ( $this->_aVars['sPrivacyFormInfo'] )): ?>
<div class="extra_info">
<?php echo $this->_aVars['sPrivacyFormInfo']; ?>
</div>
<?php endif; ?>
