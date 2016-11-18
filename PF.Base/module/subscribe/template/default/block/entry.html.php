<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: entry.html.php 1339 2009-12-19 00:37:55Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="info_holder">
    <div class="info form-group">
        <div class="info_left">
            {phrase var='subscribe.purchase_id'}:
        </div>
        <div class="info_right">
            <a href="{url link='subscribe.view' id=$aPurchase.purchase_id}">{$aPurchase.purchase_id}</a>
        </div>
    </div>
    <div class="info form-group">
        <div class="info_left">
            {phrase var='subscribe.membership'}:
        </div>
        <div class="info_right">
            {if $aPurchase.status == "completed"}
                {$aPurchase.s_title|convert|clean}
            {else}
                {$aPurchase.f_title|convert|clean}
            {/if}
        </div>
    </div>
    <div class="info form-group">
        <div class="info_left">
            {phrase var='subscribe.status'}:
        </div>
        <div class="info_right">
            {if $aPurchase.status == 'completed'}
            <span class="item_action_active">{phrase var='subscribe.active'}</span>
            {elseif $aPurchase.status == 'cancel'}
            <span class="item_action_cancel">{phrase var='subscribe.canceled'}</span>
            {elseif $aPurchase.status == 'pending'}
            <span class="item_action_pending_payment">{phrase var='subscribe.pending_payment'}</span>
            {else}
            <span class="item_action_pending_action">{phrase var='subscribe.pending_action'}</span>
            {/if}
        </div>
    </div>
    <div class="info form-group">
        <div class="info_left">
            {phrase var='subscribe.price'}:
        </div>
        <div class="info_right">
            {if isset($aPurchase.default_cost) && $aPurchase.default_cost != '0.00'}
                {if isset($aPurchase.default_recurring_cost)}
                    {$aPurchase.default_recurring_currency_id|currency_symbol}{$aPurchase.default_recurring_cost}
                {else}
                    {$aPurchase.default_currency_id|currency_symbol}{$aPurchase.default_cost|number_format}
                {/if}
            {else}
            {phrase var='subscribe.free'}
            {/if}
        </div>
    </div>
    <div class="info form-group">
        <div class="info_left">
            {phrase var='subscribe.activated_date'}:
        </div>
        <div class="info_right">
            {$aPurchase.time_purchased|convert_time}
        </div>
    </div>
    <div class="info form-group">
        <div class="info_left">
            {phrase var='subscribe.type'}:
        </div>
        <div class="info_right">
            {$aPurchase.type}
        </div>
    </div>
    <div class="info form-group">
        <div class="info_left">
            {phrase var='subscribe.expiry_date'}:
        </div>
        <div class="info_right">
            {if $aPurchase.recurring_period == 0}
            {phrase var='subscribe.no_expiration_date'}
            {else}
            {$aPurchase.expiry_date|convert_time}
            {/if}
        </div>
    </div>
</div>
{if empty($aPurchase.status)}
<div class="t_right">
	<ul class="item_menu">
		<li><a href="#?call=subscribe.upgrade&amp;height=400&amp;width=400&amp;purchase_id={$aPurchase.purchase_id}" class="inlinePopup" title="{phrase var='subscribe.select_payment_gateway'}">{phrase var='subscribe.upgrade'}</a></li>
	</ul>
</div>
{/if}