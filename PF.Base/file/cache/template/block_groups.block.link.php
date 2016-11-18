<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:24 pm */ ?>
<?php

?>
<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('groups.add', array('id' => $this->_aVars['aPage']['page_id'])); ?>"><?php echo _p('Manage'); ?></a></li>
<?php if (user ( 'pf_group_add_cover_photo' )): ?>
<li>
    <a href="#"
       onclick="$(this).closest('ul').find('.cover_section_menu_item').toggleClass('hidden'); event.cancelBubble = true; if (event.stopPropagation) event.stopPropagation();return false;">
<?php if (empty ( $this->_aVars['aPage']['cover_photo_id'] )): ?>
<?php echo Phpfox::getPhrase('user.add_a_cover'); ?>
<?php else: ?>
<?php echo Phpfox::getPhrase('user.change_cover'); ?>
<?php endif; ?>
    </a>
</li>
<li class="cover_section_menu_item hidden">
    <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('groups.'.$this->_aVars['aPage']['page_id']); ?>photo">
<?php echo Phpfox::getPhrase('user.choose_from_photos'); ?>
    </a>
</li>
<li class="cover_section_menu_item hidden">
    <a href="#"
       onclick="$(this).closest('ul').find('.cover_section_menu_item').addClass('hidden'); $Core.box('profile.logo', 500, 'groups_id=<?php echo $this->_aVars['aPage']['page_id']; ?>'); return false;">
<?php echo _p('Upload photo'); ?>
    </a>
</li>
<?php if (! empty ( $this->_aVars['aPage']['cover_photo_id'] )): ?>
<li class="cover_section_menu_item hidden visible-lg">
    <a role="button" onclick="repositionCoverPhoto('groups',<?php echo $this->_aVars['aPage']['page_id']; ?>)">
<?php echo _p('Reposition'); ?>
    </a>
</li>
<li class="cover_section_menu_item hidden">
    <a href="#"
       onclick="$(this).closest('ul').find('.cover_section_menu_item').addClass('hidden'); $.ajaxCall('groups.removeLogo', 'page_id=<?php echo $this->_aVars['aPage']['page_id']; ?>'); return false;">
<?php echo _p('user.remove'); ?>
    </a>
</li>
<?php endif; ?>
<?php endif; ?>
<?php if (user ( 'pf_group_moderate' , 0 ) || $this->_aVars['aPage']['user_id'] == Phpfox ::getUserId()): ?>
<li class="item_delete">
    <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('groups', array('delete' => $this->_aVars['aPage']['page_id'])); ?>" onclick="return confirm(\"<?php echo _p('Are you sure'); ?>\");"
       class="no_ajax_link">
<?php echo _p('Delete'); ?>
    </a>
</li>
<?php endif; ?>
