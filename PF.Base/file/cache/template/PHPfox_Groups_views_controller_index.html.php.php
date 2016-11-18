<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:20 pm */ ?>
<?php

?>
<?php if (! empty ( $this->_aVars['bShowCategories'] )): ?>
<?php if (count ( $this->_aVars['aCategories'] )): ?>
<?php if (count((array)$this->_aVars['aCategories'])):  foreach ((array) $this->_aVars['aCategories'] as $this->_aVars['aCategory']): ?>
<?php if ($this->_aVars['aCategory']['pages']): ?>
<div class="block_clear">
    <div class="title"><a href="<?php echo $this->_aVars['aCategory']['link']; ?>">
<?php if (Phpfox ::isPhrase($this->_aVars['aCategory']['name'])): ?>
<?php echo Phpfox::getPhrase($this->_aVars['aCategory']['name']); ?>
<?php else: ?>
<?php echo Phpfox::getLib('phpfox.parse.output')->clean(Phpfox::getLib('locale')->convert($this->_aVars['aCategory']['name'])); ?>
<?php endif; ?>
        </a></div>
    <div class="content clearfix">
        <div class="collection-stage">
<?php if (count((array)$this->_aVars['aCategory']['pages'])):  foreach ((array) $this->_aVars['aCategory']['pages'] as $this->_aVars['aPage']): ?>
            <div class="collection-item-stage">
                <div class="pages_item">
                    <a class="pages_photo" href="<?php echo $this->_aVars['aPage']['link']; ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => $this->_aVars['aPage']['profile_server_id'],'title' => $this->_aVars['aPage']['title'],'path' => 'pages.url_image','file' => $this->_aVars['aPage']['image_path'],'suffix' => '_120','max_width' => '120','max_height' => '120','is_page_image' => true)); ?></a>
                    <div class="pages_info">
                        <div>
                            <a href="<?php echo $this->_aVars['aPage']['link']; ?>" class="link pages_title"><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPage']['title']); ?></a>
                            <div class="group_members">
                                <span><?php echo $this->_aVars['aPage']['total_like']; ?> <?php if ($this->_aVars['aPage']['total_like'] != 1): ?> <?php echo _p('Members'); ?> <?php else: ?> <?php echo _p('Member'); ?> <?php endif; ?></span>
                                <ul>
<?php if (count((array)$this->_aVars['aPage']['members'])):  foreach ((array) $this->_aVars['aPage']['members'] as $this->_aVars['aMember']): ?>
                                    <li><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aMember'],'suffix' => '_50','max_width' => '32','max_height' => '32')); ?></li>
<?php endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach; endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endforeach; endif; ?>
<?php endif; ?>
<?php if ($this->_aVars['iCountPage'] == 0): ?>
<div class="extra_info">
<?php echo _p('No groups found.'); ?>
</div>
<?php endif; ?>
<?php else: ?>

<?php if (count ( $this->_aVars['aPages'] )): ?>
<?php if ($this->_aVars['sView'] == 'my' && Phpfox ::getUserBy('profile_page_id')): ?>
<div class="message">
<?php echo _p('Note that Groups displayed here are groups created by the Group ({{ global_full_name }}) and not by the parent user ({{ profile_full_name }}).', array('global_full_name' => Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['sGlobalUserFullName']),'profile_full_name' => Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aGlobalProfilePageLogin']['full_name']))); ?>
</div>
<?php endif; ?>
<div class="collection-stage">
<?php if (count((array)$this->_aVars['aPages'])):  foreach ((array) $this->_aVars['aPages'] as $this->_aVars['aPage']): ?>
    <div class="collection-item-stage">
        <div class="pages_item">
            <a class="pages_photo" href="<?php echo $this->_aVars['aPage']['link']; ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => $this->_aVars['aPage']['profile_server_id'],'title' => $this->_aVars['aPage']['title'],'path' => 'pages.url_image','file' => $this->_aVars['aPage']['image_path'],'suffix' => '_120','max_width' => '120','max_height' => '120','is_page_image' => true)); ?></a>
            <div class="pages_info">
                <div>
                    <a href="<?php echo $this->_aVars['aPage']['link']; ?>" class="link pages_title"><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPage']['title']); ?></a>
                    <div class="group_members">
                        <span><?php echo $this->_aVars['aPage']['total_like']; ?> <?php if ($this->_aVars['aPage']['total_like'] >= 2): ?> <?php echo _p('Members'); ?> <?php else: ?> <?php echo _p('Member'); ?> <?php endif; ?></span>
<?php if (isset ( $this->_aVars['aPage']['members'] )): ?>
                        <ul>
<?php if (count((array)$this->_aVars['aPage']['members'])):  foreach ((array) $this->_aVars['aPage']['members'] as $this->_aVars['aMember']): ?>
                            <li><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aMember'],'suffix' => '_50','max_width' => '32','max_height' => '32')); ?></li>
<?php endforeach; endif; ?>
                        </ul>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; endif; ?>
</div>

<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager'); ?>

<?php if (user ( 'pf_group_moderate' , '0' ) == '1'): ?>
<?php Phpfox::getBlock('core.moderation'); ?>
<?php endif; ?>

<?php endif; ?>

<?php endif; ?>
