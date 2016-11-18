<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: search.html.php 7102 2014-02-11 14:28:49Z Fern $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{if !defined('PHPFOX_IS_FORCED_404') && !empty($aSearchTool) && is_array($aSearchTool)}
	<div class="header_bar_menu">
		{if isset($aSearchTool.search)}
			<div class="header_bar_search">
				<form method="GET" action="{$aSearchTool.search.action|clean}" onbeforesubmit="$Core.Search.checkDefaultValue(this,\'{$aSearchTool.search.default_value}\');">
					<div>
						{if (isset($aSearchTool.search.hidden))}
						{$aSearchTool.search.hidden}
						{/if}
					</div>
					<div class="header_bar_search_holder">
						<div class="header_bar_search_default">{$aSearchTool.search.default_value}</div>
						<input type="text" class="txt_input{if isset($aSearchTool.search.actual_value)} input_focus{/if}" name="search[{$aSearchTool.search.name}]" value="{if isset($aSearchTool.search.actual_value)}{$aSearchTool.search.actual_value|clean}{else}{$aSearchTool.search.default_value}{/if}" />
						<div class="header_bar_search_input"></div>
					</div>
					<div id="js_search_input_holder">
						<div id="js_search_input_content">
							{if isset($sModuleForInput)}
								{module name='input.add' module=$sModuleForInput bAjaxSearch=true}
							{/if}
						</div>
					</div>
				</form>
			</div>
		{/if}

		{if isset($aSearchTool.filters) && count($aSearchTool.filters)}
			<div class="header_filter_holder">
				{foreach from=$aSearchTool.filters key=sSearchFilterName item=aSearchFilters}
					{if !isset($aSearchFilters.is_input)}
						<div class="header_bar_float">
							<div class="dropdown header_bar_drop_holder">
								<ul data-toggle="dropdown" class="header_bar_drop">
									<li><span>{$sSearchFilterName}:</span></li>
									<li><a href="#" class="header_bar_drop">{if isset($aSearchFilters.active_phrase)}{$aSearchFilters.active_phrase}{else}{$aSearchFilters.default_phrase}{/if}</a></li>
								</ul>
								<ul class="dropdown-menu action_drop">
									{if (isset($aSearchFilters.default))}
									<li><a href="{$aSearchFilters.default.url}" class="is_default">{$aSearchFilters.default.phrase}</a></li>
									<li class="divider"></li>
									{/if}
									{foreach from=$aSearchFilters.data item=aSearchFilter}
									<li>
										<a href="{$aSearchFilter.link}" class="ajax_link {if isset($aSearchFilter.is_active)}active{/if}" {if isset($aSearchFilter.nofollow)}rel="nofollow"{/if}>
										{$aSearchFilter.phrase}
										</a>
									</li>
									{/foreach}
								</ul>
							</div>
						</div>
					{/if}
				{/foreach}
				{if Phpfox::isModule('input') && isset($bHasInputs) && $bHasInputs == true}
					<div class="header_bar_float">
						<div class="header_bar_drop_holder">
							<ul class="header_bar_drop">
								<li>
									<a href="#" class="header_bar_drop" onclick="$('#js_search_input_holder').show(); return false;">
										{phrase var='input.advanced_filters'}
									</a>
								</li>
							</ul>
							<div class="clear"></div>
						</div>
					</div>
				{/if}				
				<div class="clear"></div>
			</div>

		{/if}
	</div>
{/if}

