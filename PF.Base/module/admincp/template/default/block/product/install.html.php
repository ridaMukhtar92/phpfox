<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<div class="block product_install">
	<div class="title">
		{$product.title|clean}
	</div>
	<div class="bottom">
		<ul>
			<li><a href="{url link='admincp.product.file' install=$product.product_id}">{phrase var='admincp.install'}</a></li>
		</ul>
	</div>
</div>