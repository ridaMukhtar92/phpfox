<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:24 pm */ ?>
<?php
    
?>
<?php if (! Phpfox ::getUserBy('profile_page_id') && Phpfox ::isUser() && isset ( $this->_aVars['aPage'] )): ?>
<?php if (isset ( $this->_aVars['aPage'] ) && isset ( $this->_aVars['aPage']['is_reg'] ) && $this->_aVars['aPage']['is_reg']): ?>
<?php else: ?>
<?php if (isset ( $this->_aVars['aPage'] ) && $this->_aVars['aPage']['is_liked']): ?>
<a href="#" class="pages_like_join pages_unlike_unjoin"
   onclick="$(this).remove(); $.ajaxCall('like.delete', 'type_id=groups&amp;item_id=<?php echo $this->_aVars['aPage']['page_id']; ?>&amp;reload=1'); return false;">
<?php echo _p('Unjoin'); ?>
</a>
<?php else: ?>

<a href="#" class="pages_like_join"
   onclick="$(this).remove(); <?php if ($this->_aVars['aPage']['reg_method'] == '1' && ! isset ( $this->_aVars['aPage']['is_invited'] )): ?> $.ajaxCall('groups.signup', 'page_id=<?php echo $this->_aVars['aPage']['page_id']; ?>'); <?php else: ?>$.ajaxCall('like.add', 'type_id=groups&amp;item_id=<?php echo $this->_aVars['aPage']['page_id']; ?>&amp;reload=1');<?php endif; ?> return false;">
<?php echo _p('Join'); ?>
</a>

<?php endif; ?>
<?php endif; ?>
<?php endif; ?>

