<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if isset($vendorCreated)}
	<i class="fa fa-spin fa-circle-o-notch"></i>
	{literal}
		<script>
			$Ready(function() {
				$Behavior.addDraggableToBoxes();
				$('.admin_action_menu .popup').trigger('click');
			});
		</script>
	{/literal}
{else}

	<div class="admincp_apps_holder">

		<section>
			<div class="admincp_apps">

				{if count($apps)}
				{foreach from=$apps item=app}
				<article>
					<h1>
						<a href="{url link='admincp.app' id=$app.id}">
							{$app.icon}
							<span>{$app.name|clean}</span>
						</a>
					</h1>
				</article>
				{/foreach}
				{else}
				<div class="message">
					{phrase var='admincp.no_apps_have_been_installed'}.
				</div>
				{/if}
			</div>
		</section>

		<section class="preview">
			<h1>{phrase var='admincp.featured_apps'}</h1>
			<div class="phpfox_store_featured" data-type="apps" data-parent="{url link='admincp.store' load='apps'}">

			</div>
		</section>
	</div>

{/if}