<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:14 pm */ ?>
<?php

?>
<?php if (isset ( $this->_aVars['vendorCreated'] )): ?>
	<i class="fa fa-spin fa-circle-o-notch"></i>
	<?php echo '
		<script>
			$Ready(function() {
				$Behavior.addDraggableToBoxes();
				$(\'.admin_action_menu .popup\').trigger(\'click\');
			});
		</script>
	'; ?>

<?php else: ?>

	<div class="admincp_apps_holder">

		<section>
			<div class="admincp_apps">

<?php if (count ( $this->_aVars['apps'] )): ?>
<?php if (count((array)$this->_aVars['apps'])):  foreach ((array) $this->_aVars['apps'] as $this->_aVars['app']): ?>
				<article>
					<h1>
						<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.app', array('id' => $this->_aVars['app']['id'])); ?>">
<?php echo $this->_aVars['app']['icon']; ?>
							<span><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['app']['name']); ?></span>
						</a>
					</h1>
				</article>
<?php endforeach; endif; ?>
<?php else: ?>
				<div class="message">
<?php echo Phpfox::getPhrase('admincp.no_apps_have_been_installed'); ?>.
				</div>
<?php endif; ?>
			</div>
		</section>

		<section class="preview">
			<h1><?php echo Phpfox::getPhrase('admincp.featured_apps'); ?></h1>
			<div class="phpfox_store_featured" data-type="apps" data-parent="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.store', array('load' => 'apps')); ?>">

			</div>
		</section>
	</div>

<?php endif; ?>
