<?php
  defined('PHPFOX') or exit('NO DICE!');
?>
<div class="collection-stage">
  {foreach from=$aPagesList item=aPage}
  <div class="collection-item-stage">
    <div class="pages_item">
      <a class="pages_photo" href="{$aPage.url}">{img server_id=$aPage.server_id title=$aPage.title path='pages.url_image' file=$aPage.image_path suffix='_120' max_width='120' max_height='120' is_page_image=true}</a>
      <div class="pages_info">
        <div>
          <a href="{$aPage.url}" class="link pages_title">{$aPage.title|clean}</a>
          <div>{$aPage.total_like} {if $aPage.total_like != 1} {phrase var='pages.followers'}{else}{phrase var='pages.follower'}{/if}</div>
        </div>
      </div>
    </div>
  </div>
  {/foreach}
</div>