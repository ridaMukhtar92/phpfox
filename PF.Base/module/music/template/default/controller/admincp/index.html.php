<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 4702 2012-09-20 11:39:57Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="table_header">
    {phrase var='music.genres'}
</div>
<table id="js_drag_drop" cellpadding="0" cellspacing="0">
    <tr>
        <th style="width:20px;"></th>
        <th>{phrase var='music.name'}</th>
    </tr>
    {foreach from=$aGenres key=iKey item=aGenre}
    <tr class="checkRow{if is_int($iKey/2)} tr{else}{/if}">
        <td class="t_center">
            <a href="#" class="js_drop_down_link" title="{_p var='Manage'}">{img theme='misc/bullet_arrow_down.png' alt=''}</a>
            <div class="link_menu">
                <ul>
                    <li><a href="{url link='admincp.music.add' id=$aGenre.genre_id}">{phrase var='music.edit'}</a></li>
                    <li><a href="{url link='admincp.music.add' delete=$aGenre.genre_id}" onclick="return confirm('{phrase var='core.are_you_sure'}');">{phrase var='music.delete'}</a></li>
                </ul>
            </div>
        </td>
        <td>
            {softPhrase var=$aGenre.name}
        </td>
    </tr>
    {/foreach}
</table>