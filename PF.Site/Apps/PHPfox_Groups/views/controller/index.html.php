<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if !empty($bShowCategories)}
{if count($aCategories)}
{foreach from=$aCategories item=aCategory}
{if $aCategory.pages}
<div class="block_clear">
    <div class="title"><a href="{$aCategory.link}">
            {if Phpfox::isPhrase($this->_aVars['aCategory']['name'])}
            {phrase var=$aCategory.name}
            {else}
            {$aCategory.name|convert|clean}
            {/if}
        </a></div>
    <div class="content clearfix">
        <div class="collection-stage">
            {foreach from=$aCategory.pages item=aPage}
            <div class="collection-item-stage">
                <div class="pages_item">
                    <a class="pages_photo" href="{$aPage.link}">{img server_id=$aPage.profile_server_id
                        title=$aPage.title path='pages.url_image' file=$aPage.image_path suffix='_120' max_width='120'
                        max_height='120' is_page_image=true}</a>
                    <div class="pages_info">
                        <div>
                            <a href="{$aPage.link}" class="link pages_title">{$aPage.title|clean}</a>
                            <div class="group_members">
                                <span>{$aPage.total_like} {if $aPage.total_like != 1} {_p('Members')} {else} {_p('Member')} {/if}</span>
                                <ul>
                                    {foreach from=$aPage.members item=aMember}
                                    <li>{img user=$aMember suffix='_50' max_width='32' max_height='32'}</li>
                                    {/foreach}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/foreach}
        </div>
    </div>
</div>
{/if}
{/foreach}
{/if}
{if $iCountPage == 0}
<div class="extra_info">
    {_p('No groups found.')}
</div>
{/if}
{else}

{if count($aPages)}
{if $sView == 'my' && Phpfox::getUserBy('profile_page_id')}
<div class="message">
    {_p var='Note that Groups displayed here are groups created by the Group (!<< global_full_name >>!) and not by the parent user (!<< profile_full_name >>!).' global_full_name=$sGlobalUserFullName|clean profile_full_name=$aGlobalProfilePageLogin.full_name|clean}
</div>
{/if}
<div class="collection-stage">
    {foreach from=$aPages item=aPage}
    <div class="collection-item-stage">
        <div class="pages_item">
            <a class="pages_photo" href="{$aPage.link}">{img server_id=$aPage.profile_server_id title=$aPage.title
                path='pages.url_image' file=$aPage.image_path suffix='_120' max_width='120' max_height='120'
                is_page_image=true}</a>
            <div class="pages_info">
                <div>
                    <a href="{$aPage.link}" class="link pages_title">{$aPage.title|clean}</a>
                    <div class="group_members">
                        <span>{$aPage.total_like} {if $aPage.total_like >= 2} {_p('Members')} {else} {_p('Member')} {/if}</span>
                        {if isset($aPage.members)}
                        <ul>
                            {foreach from=$aPage.members item=aMember}
                            <li>{img user=$aMember suffix='_50' max_width='32' max_height='32'}</li>
                            {/foreach}
                        </ul>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {/foreach}
</div>

{pager}

{if user('pf_group_moderate', '0') == '1' }
{moderation}
{/if}

{/if}

{/if}