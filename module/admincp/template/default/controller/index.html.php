<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if isset($aNewProducts)}
<div class="dashboard clearfix mosaicflow_load" data-width="300">
	{if $expires = PHPFOX_TRIAL_EXPIRES}{/if}
<div class="block">
    <div class="title"{if ($expires <= 2)} style="background:red; color:#fff;"{/if}>
        phpFox Trial
        <a href="https://www.phpfox.com/" target="_blank" class="purchase_trial">Purchase</a>
    </div>
    <div class="content">
        <div class="info">
            <div class="info_left">
                Expires:
            </div>
            <div class="info_right">
                {if $expires == 0}
                Today
                {else}
                {$expires} {if ($expires == '1')}day{else}days{/if}
                {/if}
            </div>
        </div>
    </div>
</div>
{foreach from=$aNewProducts item=product}
		{template file='admincp.block.product.install'}
	{/foreach}
	{block location='2'}
	{block location='3'}
	{block location='1'}
</div>
{else}

{/if}