<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Blog
 * @version 		$Id: entry.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
<div style="word-wrap:break-word;" id="js_blog_entry{$aItem.blog_id}"{if !isset($bBlogView)} class="moderation_row js_blog_parent{if $aItem.is_approved != 1} {/if}"{/if}>
{if !isset($bBlogView)}
<div class="row_title">
    <div>
        {if Phpfox::getUserParam('blog.can_approve_blogs')
        || (Phpfox::getUserParam('blog.edit_own_blog') && Phpfox::getUserId() == $aItem.user_id) || Phpfox::getUserParam('blog.edit_user_blog')
        || (Phpfox::getUserParam('blog.delete_own_blog') && Phpfox::getUserId() == $aItem.user_id) || Phpfox::getUserParam('blog.delete_user_blog')
        }
        <div class="row_edit_bar_parent">
            <div class="row_edit_bar">
                <a role="button" class="row_edit_bar_action" data-toggle="dropdown">
                    <i class="fa fa-action"></i>
                </a>
                <ul class="dropdown-menu">
                    {template file='blog.block.link'}
                </ul>
            </div>
        </div>
        {/if}
        {if $aItem.user_id == Phpfox::getUserId() || Phpfox::getUserParam('blog.can_approve_blogs') || Phpfox::getUserParam('blog.delete_user_blog')}<a href="#{$aItem.blog_id}" class="moderate_link" {if Phpfox::getUserParam('blog.can_approve_blogs') || Phpfox::getUserParam('blog.delete_user_blog')}data-id="mod" {else} data-id="user"{/if} rel="blog"></a>{/if}
    </div>
    <div class="row_title_info_blog">
        {if $aItem.post_status == 2}
			  <span class="blog_status_draft">
          {phrase var='blog.draft_info'}
        </span>
        {/if}
        <header>
            <h1 id="js_blog_edit_title{$aItem.blog_id}" itemprop="name">
                <a href="{permalink module='blog' id=$aItem.blog_id title=$aItem.title}" id="js_blog_edit_inner_title{$aItem.blog_id}" class="link ajax_link" itemprop="url">{$aItem.title|clean}</a>
            </h1>
            <div class="row_header">
                <div class="pull-left" style="margin-top:2px;">{img user=$aItem suffix='_50_square' max_width=40 max_height=40}</div>
                <div style="padding-left: 55px;">
                    <div>{phrase var='blog.by_full_name' full_name=$aItem|user:'':'':50:'':'author'}</div>
                    <div>{$aItem.time_stamp|convert_time:'blog.blog_time_stamp'}<span>{plugin call='blog.template_block_entry_date_end'}</span></div>

                </div>
            </div>
        </header>

        {/if}
        <div class="row_content blog_content">
            <div id="js_blog_edit_text{$aItem.blog_id}">
                <div class="item_content item_view_content" itemprop="articleBody">
                    {if isset($bBlogView)}
                    {$aItem.text|parse|highlight:'search'|split:500}
                    {else}
                    <div class="extra_info">
                        {if !empty($iShorten)}
                        {$aItem.text|stripbb|highlight:'search'|split:500|shorten:$iShorten:'...'}
                        {else}
                        {$aItem.text|stripbb|highlight:'search'|split:500}
                        {/if}
                    </div>
                    {/if}
                </div>
            </div>

            {if isset($bBlogView) && $aItem.total_attachment}
            {module name='attachment.list' sType=blog iItemId=$aItem.blog_id}
            {/if}
            {if isset($aItem.tag_list)}
            {module name='tag.item' sType=$sTagType sTags=$aItem.tag_list iItemId=$aItem.blog_id iUserId=$aItem.user_id sMicroKeywords='keywords'}
            {/if}

            {plugin call='blog.template_block_entry_text_end'}
        </div>

        {plugin call='blog.template_block_entry_end'}
        {if !isset($bBlogView)}
    </div>
</div>
{/if}
</div>