<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 7:45 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright        [PHPFOX_COPYRIGHT]
 * @author           Raymond_Benc
 * @package          Phpfox
 * @version          $Id: template-notification.html.php 2838 2011-08-16 19:09:21Z Raymond_Benc $
 */



?>
<?php if (Phpfox ::isUser()): ?>
<nav class="pull-right">
    <ul class="list-inline header-right-menu">
        <li class="pl-5" id="hd-request">
            <a role="button"
               data-toggle="dropdown"
               class="btn-abr"
               data-panel="#request-panel-body-sm"
               data-url="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('friend.panel'); ?>">
                <i class="fa fa-user-plus"></i>
                <span id="js_total_new_friend_requests"></span>
            </a>
            <div class="dropdown-panel">
                <div class="dropdown-panel-body" id="request-panel-body-sm"></div>
            </div>
        </li>
        <li class="pl-5" id="hd-notification">
            <a role="button"
               class="btn-abr"
               data-panel="#notification-panel-body-sm"
               data-toggle="dropdown"
               data-url="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('notification.panel'); ?>">
                <i class="fa fa-bell"></i>
                <span id="js_total_new_notifications"></span>
            </a>
            <div class="dropdown-panel">
                <div class="dropdown-panel-body" id="notification-panel-body-sm"></div>
            </div>
        </li>
        <li class="pl-5" id="hd-message">
            <a role="button"
               class="btn-abr"
               data-toggle="dropdown"
               data-panel="#message-panel-body-sm"
               data-url="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('mail.panel'); ?>">
                <i class="fa fa-comment"></i>
                <span id="js_total_new_messages"></span>
            </a>
            <div class="dropdown-panel">
                <div class="dropdown-panel-body" id="message-panel-body-sm"></div>
            </div>
        </li>
        <li class="pl-0" id="hd-cof">
            <a href="#"
               class="btn-abr"
               data-toggle="dropdown"
               type="button"
               aria-haspopup="true"
               aria-expanded="false">
                <i class="fa fa-cog"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right dont-unbind">
                <li role="presentation">
                    <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.setting'); ?>" class="no_ajax">
                        <i class="fa fa-cog"></i>
<?php echo Phpfox::getPhrase('user.account_settings'); ?>
                    </a>
                </li>
                <li role="presentation">
                    <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.profile'); ?>" class="no_ajax">
                        <i class="fa fa-edit"></i>
<?php echo Phpfox::getPhrase('core.edit_profile'); ?>
                    </a>
                </li>
                <li role="presentation">
                    <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('friend'); ?>" class="no_ajax">
                        <i class="fa fa-group"></i>
<?php echo Phpfox::getPhrase('core.manage_friends'); ?>
                    </a>
                </li>
                <li role="presentation">
                    <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.privacy'); ?>" class="no_ajax">
                        <i class="fa fa-shield"></i>
<?php echo Phpfox::getPhrase('user.privacy_settings'); ?>
                    </a>
                </li>
<?php if (Phpfox ::isAdmin()): ?>
                <li class="divider"></li>
                <li role="presentation">
                    <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp'); ?>" class="no_ajax">
                        <i class="fa fa-diamond"></i>
<?php echo Phpfox::getPhrase('core.menu_admincp'); ?>
                    </a>
                </li>
<?php endif; ?>
                <li class="divider"></li>
                <li role="presentation">
                    <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.logout'); ?>" class="no_ajax logout">
                        <i class="fa fa-toggle-off"></i>
<?php echo Phpfox::getPhrase('user.logout'); ?>
                    </a>
                </li>
            </ul>
        </li>
        <li class="pl-5" id="hd-user">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aGlobalUser'],'suffix' => '_50_square')); ?>
        </li>
    </ul>
</nav>
<?php else: ?>
<div class="guest_login_small pull-right">
    <a class="btn btn01 btn-success text-uppercase popup" rel="hide_box_title" role="link" href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('login'); ?>">
        <i class="fa fa-sign-in"></i> <?php echo Phpfox::getPhrase('user.login_singular'); ?>
    </a>
<?php if (Phpfox ::getParam('user.allow_user_registration')): ?>
    <a class="btn btn02 btn-warning text-uppercase popup" rel="hide_box_title" role="link" href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.register'); ?>">
<?php echo Phpfox::getPhrase('core.register'); ?>
    </a>
<?php endif; ?>
</div>
<?php endif; ?>

