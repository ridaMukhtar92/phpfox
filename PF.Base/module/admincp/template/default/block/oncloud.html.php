<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: oncloud.html.php 6554 2013-08-30 11:27:59Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if $bNewUpgrade}
<div class="message">
	{phrase var='admincp.new_version_of_oncloud'} ({$aHostingPackage['latest_version']}) {phrase var='admincp.is_available'}.
	<a href="{url link=''}" class="hosting_package_upgrade" onclick="return confirm('Are you sure?');">{phrase var='admincp.upgrade_oncloud'}</a>
</div>
{/if}
{if isset($aHostingPackage)}
<div class="hosting_package_name">
	{$aHostingPackage.title} {phrase var='admincp.package'}
</div>
<div class="info_header">
	{phrase var='admincp.oncloud_usage'}
</div>
<div class="p_4">
	<div class="info">
		<div class="info_left">
            {phrase var='admincp.members'}:
		</div>
		<div class="info_right">
			{$sTotalMemberUsage}			
		</div>
	</div>	
	<div class="info">
		<div class="info_left">		
			{phrase var='admincp.space'}:
		</div>
		<div class="info_right">
			{$sTotalSpaceUsage}
		</div>
	</div>
	<div class="info">
		<div class="info_left">
			{phrase var='admincp.videos'}:
		</div>
		<div class="info_right">
			{$sTotalVideoUsage}
		</div>
	</div>
	<div class="info">
		<div class="info_left">
			{phrase var='admincp.latest_version'}:
		</div>
		<div class="info_right">
			{$aHostingPackage['latest_version']}
		</div>
	</div>
</div>
{if $aHostingPackage.can_upgrade}
<a href="http://www.phpfox.com/account/download/{$aHostingPackage.license}/" class="hosting_package_upgrade">{phrase var='admincp.upgrade_package'}</a>
{/if}
{else}
{phrase var='admincp.unable_to_load_oncloud_info'}.
{/if}