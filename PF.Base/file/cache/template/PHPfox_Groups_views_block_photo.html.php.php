<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:24 pm */ ?>
<?php

?>

<div class="profiles_banner <?php if ($this->_aVars['aCoverPhoto'] !== false): ?>has_cover<?php endif; ?>" <?php if ($this->_aVars['sCoverDefaultUrl']): ?>style="background-image:url(<?php echo $this->_aVars['sCoverDefaultUrl']; ?>)" <?php endif; ?>>
<div class="breadcrumbs_menu"></div>
<div class="profiles_banner_bg">
<?php if ($this->_aVars['aCoverPhoto'] !== false): ?>
    <div class="cover_bg"></div>
    <div class="cover">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => $this->_aVars['aCoverPhoto']['server_id'],'path' => 'photo.url_photo','file' => $this->_aVars['aCoverPhoto']['destination'],'suffix' => '_1024','title' => $this->_aVars['aCoverPhoto']['title'],'class' => "hidden-xs cover_photo")); ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => $this->_aVars['aCoverPhoto']['server_id'],'path' => 'photo.url_photo','file' => $this->_aVars['aCoverPhoto']['destination'],'suffix' => '_1024','title' => $this->_aVars['aCoverPhoto']['title'],'class' => "visible-xs")); ?>
    </div>
<?php endif; ?>
    <div class="cover_shadown"></div>
    <div class="profiles_info groups_profile">
        <h1 title="<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPage']['title']); ?>"><a><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPage']['title']); ?></a></h1>
        <div class="profiles_extra_info">
            <span>
<?php if ($this->_aVars['aPage']['reg_method'] == 0): ?>
                <i class="fa fa-privacy fa-privacy-0"></i>&nbsp;<?php echo _p('Public Group'); ?>
<?php elseif ($this->_aVars['aPage']['reg_method'] == 1): ?>
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>&nbsp;<?php echo _p('Closed Group'); ?>
<?php elseif ($this->_aVars['aPage']['reg_method'] == 2): ?>
                <i class="fa fa-lock" aria-hidden="true"></i>&nbsp;<?php echo _p('Secret Group'); ?>
<?php endif; ?>
            </span>
            <span>&middot;</span>
            <span>
<?php if (Phpfox ::isPhrase($this->_aVars['aPage']['category_name'])): ?>
<?php echo Phpfox::getPhrase($this->_aVars['aPage']['category_name']); ?>
<?php else: ?>
<?php echo Phpfox::getLib('locale')->convert($this->_aVars['aPage']['category_name']); ?>
<?php endif; ?>
            </span>
            <span>&middot;</span>
				<span>
<?php echo $this->_aVars['aPage']['total_like']; ?> <?php if ($this->_aVars['aPage']['total_like'] != 1): ?> <?php echo _p('Members');  else:  echo _p('Member');  endif; ?>
                </span>
        </div>
    </div>
<?php if (( user ( 'pf_group_moderate' , 0 ) || $this->_aVars['aPage']['is_admin'] )): ?>
<?php if ($this->_aVars['aPage']['view_id'] == '1' && user ( 'pf_group_moderate' , 0 )): ?>
    <div class="profiles_admin_actions">
        <div>
            <a href="#" class="button btn-primary btn-approved btn-lg"
               onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('groups.approve', 'page_id=<?php echo $this->_aVars['aPage']['page_id']; ?>'); return false;">
<?php echo _p('Approve'); ?>
            </a>
        </div>
    </div>
<?php endif; ?>
    <div class="profiles_owner_actions">
        <div class="dropdown">
            <a class="icon_btn" role="button" data-toggle="dropdown">
                <i class="fa fa-cog"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <?php
						Phpfox::getLib('template')->getBuiltFile('groups.block.link');
						?>
            </ul>
        </div>

<?php if (isset ( $this->_aVars['aSubPagesMenus'] ) && count ( $this->_aVars['aSubPagesMenus'] )): ?>
<?php if (count((array)$this->_aVars['aSubPagesMenus'])):  $this->_aPhpfoxVars['iteration']['submenu'] = 0;  foreach ((array) $this->_aVars['aSubPagesMenus'] as $this->_aVars['iKey'] => $this->_aVars['aSubMenu']):  $this->_aPhpfoxVars['iteration']['submenu']++; ?>

        <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aSubMenu']['url']); ?>" class="btn btn-success">
<?php if (( isset ( $this->_aVars['aSubMenu']['title'] ) )): ?>
<?php echo $this->_aVars['aSubMenu']['title']; ?>
<?php else: ?>
<?php echo Phpfox::getPhrase($this->_aVars['aSubMenu']['module'].'.'.$this->_aVars['aSubMenu']['var_name']); ?>
<?php endif; ?>
        </a>
<?php endforeach; endif; ?>
<?php endif; ?>

    </div>
<?php endif; ?>
    <div class="profile_viewer_actions">
        <?php
						Phpfox::getLib('template')->getBuiltFile('groups.block.joinpage');
						?>
    </div>
</div>
</div>
<div class="profiles_menu hidden-xs">
    <ul class="container-fluid">
<?php if (count((array)$this->_aVars['aPageMenus'])):  $this->_aPhpfoxVars['iteration']['link'] = 0;  foreach ((array) $this->_aVars['aPageMenus'] as $this->_aVars['aPageMenu']):  $this->_aPhpfoxVars['iteration']['link']++; ?>

<?php if ($this->_aPhpfoxVars['iteration']['link'] == 8): ?>
        <li class="dropdown">
            <a role="button" data-toggle="dropdown" class="explore"><i class="fa fa-ellipsis-h"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a href="<?php echo $this->_aVars['aPageMenu']['url']; ?>"><?php echo $this->_aVars['aPageMenu']['phrase']; ?></a>
                </li>
<?php else: ?>
                <li><a href="<?php echo $this->_aVars['aPageMenu']['url']; ?>"><?php echo $this->_aVars['aPageMenu']['phrase']; ?></a></li>
<?php endif; ?>
<?php endforeach; endif; ?>
            </ul>
        </li>
    </ul>
</div>
<div class="profiles_menu visible-xs">
    <ul class="container-fluid">
<?php if (count((array)$this->_aVars['aPageMenus'])):  $this->_aPhpfoxVars['iteration']['link'] = 0;  foreach ((array) $this->_aVars['aPageMenus'] as $this->_aVars['aPageMenu']):  $this->_aPhpfoxVars['iteration']['link']++; ?>

<?php if ($this->_aPhpfoxVars['iteration']['link'] == 4): ?>
        <li class="pull-right dropdown">
            <a role="button" data-toggle="dropdown"><i class="fa fa-chevron-down"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a href="<?php echo $this->_aVars['aPageMenu']['url']; ?>"><?php echo $this->_aVars['aPageMenu']['phrase']; ?></a>

                </li>
<?php else: ?>
                <li>
                    <a href="<?php echo $this->_aVars['aPageMenu']['url']; ?>"><?php echo $this->_aVars['aPageMenu']['phrase']; ?></a>

                </li>
<?php endif; ?>
<?php endforeach; endif; ?>
            </ul>
        </li>
    </ul>
</div>

<style type="text/css">
    .profiles_banner_bg .cover img.cover_photo {
    position: relative;
    left:0;
    top: <?php echo $this->_aVars['iConverPhotoPosition']; ?>px;}
</style>
