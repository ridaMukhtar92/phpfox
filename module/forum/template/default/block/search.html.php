<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: stat.html.php 2635 2011-06-01 18:58:25Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>

<div id="js_forum_search_wrapper">
    <input type="hidden" value="{$aSearchValues.adv_search}" id="js_adv_search_value" name="search[adv_search]"/>
    <div id="js_forum_search_result" class="item_is_active_holder item_selection_active">
        <span class="js_item_active {if empty($bResult)}item_is_active{else}item_is_not_active{/if}"><input type="radio" value="0" name="search[result]" {if empty($bResult)}checked="checked"{/if} class="checkbox"> {phrase var='forum.show_threads'}</span>
        <span class="js_item_active {if empty($bResult)}item_is_not_active{else}item_is_active{/if}"><input type="radio" value="1" name="search[result]" {if !empty($bResult)}checked="checked"{/if} class="checkbox"> {phrase var='forum.show_posts'}</span>
        <div class="pull-right">
            <a id="js_forum_enable_adv_search_btn" class="button btn-sm btn-primary" href="#" onclick="forumEnableAdvSearch(this);return false;"><span class="hidden-xs">{phrase var='forum.advanced_search'}</span> <i class="fa fa-angle-double-down"></i></a>
        </div>
    </div>
</div>

<div id="js_forum_adv_search_wrapper" style="display: none;">
    <div class="table form-group">
        <div class="table_left">
            <label>{phrase var='forum.search_for_author'}:</label>
        </div>
        <div class="table_right">
            {$aFilters.user}
        </div>
        <div class="clear"></div>
    </div>

    {if empty($aCallback)}
    <div class="table form-group adv_search_forum">
        <div class="table_left">
            <label for="adv_search_forum">{phrase var='forum.find_in_forum'}:</label>
        </div>
        <div class="table_right">
            <select name="search[forum][]" multiple="multiple" size="10">
                {$sForumList}
            </select>
        </div>
        <div class="clear"></div>
    </div>
    {/if}

    <div class="table form-group">
        <div class="table_left">
            <label>{phrase var='forum.display'}:</label>
        </div>
        <div class="table_right">
            {$aFilters.display}
        </div>
        <div class="clear"></div>
    </div>

    <div class="table form-group adv_search_sort">
        <div class="table_left">
            <label>{phrase var='forum.sort'}:</label>
        </div>
        <div class="table_right">
            {$aFilters.sort}{$aFilters.sort_by}
        </div>
        <div class="clear"></div>
    </div>

    <div class="table form-group">
        <div class="table_left">
            <label>{phrase var='forum.from'}:</label>
        </div>
        <div class="table_right">
            {$aFilters.days_prune}
        </div>
        <div class="clear"></div>
    </div>

    <input class="form-control btn-primary" type="submit" name="submit" id="adv_search_user" value="{phrase var='forum.search'}">
</div>

{literal}
<script type="text/javascript">
    $Behavior.initForumSearch = function() {
        if ($('#form_main_search') && $('#js_forum_search_wrapper') && $('#form_main_search').find('#js_forum_search_wrapper').length == 0) {
            $("#js_forum_search_wrapper").detach().appendTo('#form_main_search');
            if ($('#js_adv_search_value').val() == '1') {
                forumEnableAdvSearch('#js_forum_enable_adv_search_btn');
            }
            $('#form_main_search').find('div.hidden:first input[type="hidden"]:not(.not_remove)').remove();
        }
    }

    function forumEnableAdvSearch(obj) {
        if ($('#form_main_search').find('#js_forum_adv_search_wrapper').length == 0) {
            $('#js_adv_search_value').val(1);
            $("#js_forum_adv_search_wrapper").detach().insertAfter('#js_forum_search_result');
            $("#js_forum_adv_search_wrapper").slideDown();
            $(obj).find('i').removeClass('fa-angle-double-down').addClass('fa-angle-double-up');
        }
        else {
            $("#js_forum_adv_search_wrapper").slideUp();
            $('#js_adv_search_value').val(0);
            $("#js_forum_adv_search_wrapper").detach().insertAfter('#form_main_search');
            $(obj).find('i').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
        }
    }
</script>
{/literal}