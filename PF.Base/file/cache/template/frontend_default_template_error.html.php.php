<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 7:45 pm */ ?>
<div class="_block_error">
<?php if (isset ( $this->_aVars['aPageSectionMenu'] ) && count ( $this->_aVars['aPageSectionMenu'] )): ?>
	<div class="page_section_menu page_section_menu_header">
<?php if ($this->_aVars['aPageExtraLink'] !== null): ?>
		<a href="<?php echo $this->_aVars['aPageExtraLink']['link']; ?>" class="page_section_menu_link" title="<?php echo $this->_aVars['aPageExtraLink']['phrase']; ?>">
			<span><?php echo $this->_aVars['aPageExtraLink']['phrase']; ?></span>
		</a>
<?php endif; ?>
		<div class="">
			<ul class="nav nav-tabs nav-justified">
<?php if (count((array)$this->_aVars['aPageSectionMenu'])):  $this->_aPhpfoxVars['iteration']['pagesectionmenu'] = 0;  foreach ((array) $this->_aVars['aPageSectionMenu'] as $this->_aVars['sPageSectionKey'] => $this->_aVars['sPageSectionMenu']):  $this->_aPhpfoxVars['iteration']['pagesectionmenu']++; ?>

				<li <?php if (( $this->_aPhpfoxVars['iteration']['pagesectionmenu'] == 1 && ! $this->_aVars['bPageIsFullLink'] ) || ( $this->_aVars['bPageIsFullLink'] && $this->_aVars['sPageSectionKey'] == $this->_aVars['sPageCurrentUrl'] )): ?> class="active"<?php endif; ?>><a href="<?php if ($this->_aVars['bPageIsFullLink']):  echo $this->_aVars['sPageSectionKey'];  else: ?>#<?php echo $this->_aVars['sPageSectionKey'];  endif; ?>" <?php if (! $this->_aVars['bPageIsFullLink']): ?>rel="<?php echo $this->_aVars['sPageSectionMenuName']; ?>_<?php echo $this->_aVars['sPageSectionKey']; ?>"<?php endif; ?>><?php echo $this->_aVars['sPageSectionMenu']; ?></a></li>
<?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
<?php endif; ?>
<?php echo Phpfox::getLib('template')->getSectionMenuJavaScript(); ?>
</div>

<?php if (isset ( $this->_aVars['sPublicMessage'] ) && $this->_aVars['sPublicMessage'] && ! is_bool ( $this->_aVars['sPublicMessage'] )): ?>
<div class="public_message" id="public_message">
<?php echo $this->_aVars['sPublicMessage']; ?>
</div>
<script type="text/javascript">
	$Behavior.template_error = function()
	{
	$('#public_message').show();
	};
</script>
<?php else: ?>
<div class="public_message" id="public_message"></div>
<?php endif; ?>
<div id="pem"><a href="#"></a></div>
<div id="core_js_messages">
<?php if (isset ( $this->_aVars['aErrors'] ) && count ( $this->_aVars['aErrors'] )): ?>
<?php if (count((array)$this->_aVars['aErrors'])):  foreach ((array) $this->_aVars['aErrors'] as $this->_aVars['sErrorMessage']): ?>
	<div class="error_message"><?php echo $this->_aVars['sErrorMessage']; ?></div>
<?php endforeach; endif; ?>
<?php unset($this->_aVars['sErrorMessage'], $this->_aVars['sample']); ?>
<?php endif; ?>
</div>