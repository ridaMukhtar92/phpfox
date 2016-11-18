<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 7:45 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-menu.html.php 6937 2013-11-24 18:11:09Z Miguel_Espinoza $
 */
 
 

?>

<?php if ($this->_aVars['bOnlyMobileLogin']): ?>
	<ul class="nav navbar-nav visible-xs visible-sm site_menu">
		<li>
			<div class="login-menu-btns-xs clearfix">
				<div class="div01">
					<a class="btn btn01 btn-success text-uppercase popup" rel="hide_box_title" role="link" href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('login'); ?>">
						<i class="fa fa-sign-in"></i> <?php echo Phpfox::getPhrase('user.login_singular'); ?>
					</a>
				</div>
<?php if (Phpfox ::getParam('user.allow_user_registration')): ?>
				<div class="div02">
					<a class="btn btn02 btn-warning text-uppercase popup" rel="hide_box_title" role="link" href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.register'); ?>">
<?php echo Phpfox::getPhrase('core.register'); ?>
					</a>
				</div>
<?php endif; ?>
			</div>
		</li>
	</ul>
<?php else: ?>
<?php (($sPlugin = Phpfox_Plugin::get('core.template_block_template_menu_1')) ? eval($sPlugin) : false); ?>

	<ul class="nav navbar-nav visible-xs visible-sm site_menu">
<?php if (Phpfox ::isUser() && Phpfox ::getUserParam('search.can_use_global_search')): ?>
		<li class="">
			<div id="search-panel2">
				<div class="js_temp_friend_search_form"></div>
				<form method="get" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('search'); ?>" class="header_search_form_sm" id="header_search_form_sm">
					<div class="form-group has-feedback">
						<input type="text" name="q" placeholder="<?php echo _p('Search...'); ?>" autocomplete="off" class="form-control js_temp_friend_search_input in_focus" id="header_sub_menu_search_input" />
						<span class="fa fa-search form-control-feedback" aria-hidden="true"></span>
					</div>
				
</form>

			</div>
		</li>
		<li class="visible-xs">
			<div class="user-menu-item">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aGlobalUser'],'suffix' => '_50_square')); ?>
				<span><?php echo $this->_aVars['aGlobalUser']['full_name']; ?></span>
			</div>
		</li>
<?php endif; ?>
<?php if (! Phpfox ::isUser()): ?>
		<li>
			<div class="login-menu-btns-xs clearfix">
				<div class="<?php if (Phpfox ::getParam('user.allow_user_registration')): ?>div01<?php endif; ?>">
					<a class="btn btn01 btn-success text-uppercase popup" rel="hide_box_title" role="link" href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('login'); ?>">
						<i class="fa fa-sign-in"></i> <?php echo Phpfox::getPhrase('user.login_singular'); ?>
					</a>
				</div>
<?php if (Phpfox ::getParam('user.allow_user_registration')): ?>
				<div class="div02">
					<a class="btn btn02 btn-warning text-uppercase popup" rel="hide_box_title" role="link" href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.register'); ?>">
<?php echo Phpfox::getPhrase('core.register'); ?>
					</a>
				</div>
<?php endif; ?>
			</div>
		</li>
<?php endif; ?>
<?php if (Phpfox ::getUserBy('profile_page_id') <= 0 && isset ( $this->_aVars['aMainMenus'] )): ?>
<?php (($sPlugin = Phpfox_Plugin::get('theme_template_core_menu_list')) ? eval($sPlugin) : false); ?>
<?php if (( $this->_aVars['iMenuCnt'] = 0 )):  endif; ?>
<?php if (count((array)$this->_aVars['aMainMenus'])):  $this->_aPhpfoxVars['iteration']['menu'] = 0;  foreach ((array) $this->_aVars['aMainMenus'] as $this->_aVars['iKey'] => $this->_aVars['aMainMenu']):  $this->_aPhpfoxVars['iteration']['menu']++; ?>

<?php if (! isset ( $this->_aVars['aMainMenu']['is_force_hidden'] )): ?>
<?php $this->_aVars['iMenuCnt']++; ?>
<?php endif; ?>
		<li rel="menu<?php echo $this->_aVars['aMainMenu']['menu_id']; ?>" <?php if (( isset ( $this->_aVars['iTotalHide'] ) && isset ( $this->_aVars['iMenuCnt'] ) && $this->_aVars['iMenuCnt'] > $this->_aVars['iTotalHide'] )): ?> style="display:none;" <?php endif; ?> <?php if (( ( $this->_aVars['aMainMenu']['url'] == 'apps' && count ( $this->_aVars['aInstalledApps'] ) ) || ( isset ( $this->_aVars['aMainMenu']['children'] ) && count ( $this->_aVars['aMainMenu']['children'] ) ) ) || ( isset ( $this->_aVars['aMainMenu']['is_force_hidden'] ) )): ?>class="<?php if (isset ( $this->_aVars['aMainMenu']['is_force_hidden'] ) && isset ( $this->_aVars['iTotalHide'] )): ?>is_force_hidden<?php else: ?>explore<?php endif;  if (( $this->_aVars['aMainMenu']['url'] == 'apps' && count ( $this->_aVars['aInstalledApps'] ) )): ?> explore_apps<?php endif; ?>"<?php endif; ?>>
			<a <?php if (! isset ( $this->_aVars['aMainMenu']['no_link'] ) || $this->_aVars['aMainMenu']['no_link'] != true): ?>href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aMainMenu']['url']); ?>" <?php else: ?> href="#" onclick="return false;" <?php endif; ?> class="<?php if (isset ( $this->_aVars['aMainMenu']['is_selected'] ) && $this->_aVars['aMainMenu']['is_selected']): ?> menu_is_selected <?php endif;  if (isset ( $this->_aVars['aMainMenu']['external'] ) && $this->_aVars['aMainMenu']['external'] == true): ?>no_ajax_link <?php endif; ?>ajax_link">
<?php if (isset ( $this->_aVars['aMainMenu']['mobile_icon'] ) && $this->_aVars['aMainMenu']['mobile_icon']): ?>
			<i class="fa fa-<?php echo $this->_aVars['aMainMenu']['mobile_icon']; ?>"></i>
<?php else: ?>
			<i class="fa fa-list"></i>
<?php endif; ?>
<?php echo Phpfox::getPhrase($this->_aVars['aMainMenu']['module'].'.'.$this->_aVars['aMainMenu']['var_name']);  if (isset ( $this->_aVars['aMainMenu']['suffix'] )):  echo $this->_aVars['aMainMenu']['suffix'];  endif; ?>
			</a>
		</li>
<?php endforeach; endif; ?>
<?php endif; ?>
	</ul>

	<ul class="nav navbar-nav visible-md visible-lg site_menu">
<?php if (Phpfox ::getUserBy('profile_page_id') <= 0 && isset ( $this->_aVars['aMainMenus'] )): ?>
<?php (($sPlugin = Phpfox_Plugin::get('theme_template_core_menu_list')) ? eval($sPlugin) : false); ?>
<?php if (( $this->_aVars['iMenuCnt'] = 0 )):  endif; ?>
<?php if (count((array)$this->_aVars['aMainMenus'])):  $this->_aPhpfoxVars['iteration']['menu'] = 0;  foreach ((array) $this->_aVars['aMainMenus'] as $this->_aVars['iKey'] => $this->_aVars['aMainMenu']):  $this->_aPhpfoxVars['iteration']['menu']++; ?>

<?php if (! isset ( $this->_aVars['aMainMenu']['is_force_hidden'] )): ?>
<?php $this->_aVars['iMenuCnt']++; ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['iItemsNumber'] ) && $this->_aPhpfoxVars['iteration']['menu'] == $this->_aVars['iItemsNumber']): ?>
		<li>
			<a data-toggle="dropdown" role="button">
<?php echo Phpfox::getPhrase('core.explorer'); ?>
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li rel="menu<?php echo $this->_aVars['aMainMenu']['menu_id']; ?>" <?php if (( isset ( $this->_aVars['iTotalHide'] ) && isset ( $this->_aVars['iMenuCnt'] ) && $this->_aVars['iMenuCnt'] > $this->_aVars['iTotalHide'] )): ?> style="display:none;" <?php endif; ?> <?php if (( ( $this->_aVars['aMainMenu']['url'] == 'apps' && count ( $this->_aVars['aInstalledApps'] ) ) || ( isset ( $this->_aVars['aMainMenu']['children'] ) && count ( $this->_aVars['aMainMenu']['children'] ) ) ) || ( isset ( $this->_aVars['aMainMenu']['is_force_hidden'] ) )): ?>class="<?php if (isset ( $this->_aVars['aMainMenu']['is_force_hidden'] ) && isset ( $this->_aVars['iTotalHide'] )): ?>is_force_hidden<?php else: ?>explore<?php endif;  if (( $this->_aVars['aMainMenu']['url'] == 'apps' && count ( $this->_aVars['aInstalledApps'] ) )): ?> explore_apps<?php endif; ?>"<?php endif; ?>>
					<a <?php if (! isset ( $this->_aVars['aMainMenu']['no_link'] ) || $this->_aVars['aMainMenu']['no_link'] != true): ?>href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aMainMenu']['url']); ?>" <?php else: ?> href="#" onclick="return false;" <?php endif; ?> class="<?php if (isset ( $this->_aVars['aMainMenu']['is_selected'] ) && $this->_aVars['aMainMenu']['is_selected']): ?> menu_is_selected <?php endif;  if (isset ( $this->_aVars['aMainMenu']['external'] ) && $this->_aVars['aMainMenu']['external'] == true): ?>no_ajax_link <?php endif; ?>ajax_link">
<?php echo Phpfox::getPhrase($this->_aVars['aMainMenu']['module'].'.'.$this->_aVars['aMainMenu']['var_name']);  if (isset ( $this->_aVars['aMainMenu']['suffix'] )):  echo $this->_aVars['aMainMenu']['suffix'];  endif; ?>
					</a>
				</li>
<?php else: ?>
				<li rel="menu<?php echo $this->_aVars['aMainMenu']['menu_id']; ?>" <?php if (( isset ( $this->_aVars['iTotalHide'] ) && isset ( $this->_aVars['iMenuCnt'] ) && $this->_aVars['iMenuCnt'] > $this->_aVars['iTotalHide'] )): ?> style="display:none;" <?php endif; ?> <?php if (( ( $this->_aVars['aMainMenu']['url'] == 'apps' && count ( $this->_aVars['aInstalledApps'] ) ) || ( isset ( $this->_aVars['aMainMenu']['children'] ) && count ( $this->_aVars['aMainMenu']['children'] ) ) ) || ( isset ( $this->_aVars['aMainMenu']['is_force_hidden'] ) )): ?>class="<?php if (isset ( $this->_aVars['aMainMenu']['is_force_hidden'] ) && isset ( $this->_aVars['iTotalHide'] )): ?>is_force_hidden<?php else: ?>explore<?php endif;  if (( $this->_aVars['aMainMenu']['url'] == 'apps' && count ( $this->_aVars['aInstalledApps'] ) )): ?> explore_apps<?php endif; ?>"<?php endif; ?>>
					<a <?php if (! isset ( $this->_aVars['aMainMenu']['no_link'] ) || $this->_aVars['aMainMenu']['no_link'] != true): ?>href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aMainMenu']['url']); ?>" <?php else: ?> href="#" onclick="return false;" <?php endif; ?> class="<?php if (isset ( $this->_aVars['aMainMenu']['is_selected'] ) && $this->_aVars['aMainMenu']['is_selected']): ?> menu_is_selected <?php endif;  if (isset ( $this->_aVars['aMainMenu']['external'] ) && $this->_aVars['aMainMenu']['external'] == true): ?>no_ajax_link <?php endif; ?>ajax_link">
<?php echo Phpfox::getPhrase($this->_aVars['aMainMenu']['module'].'.'.$this->_aVars['aMainMenu']['var_name']);  if (isset ( $this->_aVars['aMainMenu']['suffix'] )):  echo $this->_aVars['aMainMenu']['suffix'];  endif; ?>
					</a>
				</li>
<?php endif; ?>
<?php endforeach; endif; ?>
<?php if ($this->_aPhpfoxVars['iteration']['menu'] >= 13): ?>
			</ul></li>
<?php endif; ?>
<?php endif; ?>
	</ul>
<?php endif; ?>
