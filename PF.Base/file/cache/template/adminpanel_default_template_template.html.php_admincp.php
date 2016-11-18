<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 9:09 pm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $this->_aVars['sLocaleDirection']; ?>" lang="<?php echo $this->_aVars['sLocaleCode']; ?>">
	<head>
		<title><?php echo $this->getTitle(); ?></title>
<?php echo $this->getHeader(); ?>
	</head>
	<body id="page_<?php echo Phpfox::getLib('module')->getPageId(); ?>">
		<div id="admincp_base"></div>
		<div id="global_ajax_message"></div>

		<div id="header">
			<a href="#" class="header_logo"><?php echo Phpfox::getPhrase('admincp.module_admincp'); ?></a>
		</div>

		<div id="top">
			<div class="nano">
				<div class="main_menu_holder nano-content">

					<div class="admincp_user">
						<div class="admincp_user_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aUserDetails'],'suffix' => '_50_square')); ?>
						</div>
						<div class="admincp_user_content">
<?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aUserDetails']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aUserDetails']['user_name'], ((empty($this->_aVars['aUserDetails']['user_name']) && isset($this->_aVars['aUserDetails']['profile_page_id'])) ? $this->_aVars['aUserDetails']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aUserDetails']['user_id'], $this->_aVars['aUserDetails']['full_name']), Phpfox::getParam('user.maximum_length_for_full_name')) . '</a></span>'; ?>
							<div>
								<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl(''); ?>"><?php echo Phpfox::getPhrase('admincp.view_site'); ?></a>
							</div>
						</div>
					</div>

					<ul class="main_menu">
<?php if (count((array)$this->_aVars['aAdminMenus'])):  foreach ((array) $this->_aVars['aAdminMenus'] as $this->_aVars['sPhrase'] => $this->_aVars['sLink']): ?>
<?php if (is_array ( $this->_aVars['sLink'] )): ?>
<?php if (count ( $this->_aVars['sLink'] )): ?>
						<li class="main_menu_link_li"><a class="main_menu_link" href="#"><?php echo $this->_aVars['sPhrase']; ?></a>
							<div class="main_sub_menu">
<?php if (strpos ( $this->_aVars['sPhrase'] , 'fa-cog' )): ?>
								<div class="admincp_search_settings">
									<span class="remove"><i class="fa fa-remove"></i></span>
									<input type="text" name="setting" placeholder="<?php echo Phpfox::getPhrase('admincp.search_settings_dot'); ?>" autocomplete="off">
									<div class="admincp_search_settings_results"></div>
								</div>
<?php endif; ?>
								<ul>
<?php if (count((array)$this->_aVars['sLink'])):  foreach ((array) $this->_aVars['sLink'] as $this->_aVars['sPhrase2'] => $this->_aVars['sLink2']): ?>
<?php if (is_array ( $this->_aVars['sLink2'] )): ?>
									<li class="<?php if (isset ( $this->_aVars['sLink2']['highlight'] ) && $this->_aVars['sLink2']['highlight']): ?> focus<?php endif; ?>">
										<a href="<?php echo $this->_aVars['sLink2']['url']; ?>" class="popup">
<?php echo $this->_aVars['sPhrase2'];  if (isset ( $this->_aVars['sLink2']['message'] )): ?><span><?php echo $this->_aVars['sLink2']['message']; ?></span><?php endif; ?>
										</a>
									</li>
<?php elseif (is_numeric ( $this->_aVars['sPhrase2'] )): ?>
									<li class="separator"><?php echo $this->_aVars['sLink2']; ?></li>
<?php else: ?>
									<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['sLink2']); ?>"><?php echo $this->_aVars['sPhrase2']; ?></a></li>
<?php endif; ?>
<?php endforeach; endif; ?>
								</ul>
							</div>
						</li>
<?php endif; ?>
<?php elseif (is_numeric ( $this->_aVars['sPhrase'] )): ?>
						<li class="separator"><?php echo $this->_aVars['sLink']; ?></li>
<?php else: ?>
						<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl(''.$this->_aVars['sLink'].''); ?>" class="main_menu_link"><?php echo $this->_aVars['sPhrase']; ?></a></li>
<?php endif; ?>
<?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

			<div class="main_title_holder">
<?php if (isset ( $this->_aVars['aAdmincpBreadCrumb'] ) && is_array ( $this->_aVars['aAdmincpBreadCrumb'] )): ?>
                <div class="btn-group">
<?php if (count((array)$this->_aVars['aAdmincpBreadCrumb'])):  foreach ((array) $this->_aVars['aAdmincpBreadCrumb'] as $this->_aVars['sUrl'] => $this->_aVars['sPhrase']): ?>
                        <a class="" href="<?php echo $this->_aVars['sUrl']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a>
<?php if ($this->_aVars['sPhrase'] != end ( $this->_aVars['aAdmincpBreadCrumb'] )): ?>
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
<?php endif; ?>
<?php endforeach; endif; ?>
                </div>
<?php else: ?>
<?php echo $this->_aVars['sSectionTitle']; ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aActionMenu'] )): ?>
				<div class="admin_action_menu">
					<ul>
<?php if (count((array)$this->_aVars['aActionMenu'])):  foreach ((array) $this->_aVars['aActionMenu'] as $this->_aVars['sPhrase'] => $this->_aVars['sUrl']): ?>
						<li>
<?php if (is_array ( $this->_aVars['sUrl'] )): ?>
							<a href="<?php echo $this->_aVars['sUrl']['url']; ?>" class="<?php if (isset ( $this->_aVars['sUrl']['class'] )):  echo $this->_aVars['sUrl']['class'];  endif; ?>"<?php if (isset ( $this->_aVars['sUrl']['custom'] )): ?> <?php echo $this->_aVars['sUrl']['custom'];  endif; ?>><?php echo $this->_aVars['sPhrase']; ?></a>
<?php else: ?>
							<a href="<?php echo $this->_aVars['sUrl']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a>
<?php endif; ?>
						</li>
<?php endforeach; endif; ?>
					</ul>
				</div>
<?php endif; ?>
			</div>

			<div class="main_holder">					
				<div id="js_content_container">					
					<div id="main">

<?php if (isset ( $this->_aVars['aSectionAppMenus'] )): ?>
						<div class="apps_menu">
<?php if (! $this->_aVars['ActiveApp']['is_module']): ?>
							<div class="active_app" data-app-id="<?php echo $this->_aVars['ActiveApp']['id']; ?>"></div>
<?php endif; ?>
<?php echo $this->_aVars['ActiveApp']['icon']; ?>

							<ul>
<?php if (count((array)$this->_aVars['aSectionAppMenus'])):  foreach ((array) $this->_aVars['aSectionAppMenus'] as $this->_aVars['sPhrase'] => $this->_aVars['aMenu']): ?>
								<li><a href="<?php if (( substr ( $this->_aVars['aMenu']['url'] , 0 , 1 ) == '#' )):  echo $this->_aVars['aMenu']['url'];  else:  echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aMenu']['url']);  endif; ?>" <?php if (isset ( $this->_aVars['aMenu']['is_active'] ) && $this->_aVars['aMenu']['is_active']): ?> class="active"<?php endif; ?>><?php echo $this->_aVars['sPhrase']; ?></a></li>
<?php endforeach; endif; ?>
							</ul>

<?php if (( isset ( $this->_aVars['has_upgrade'] ) && $this->_aVars['has_upgrade'] )): ?>
							<div class="upgrade_product_holder">
								<p>There is an update available for this product.</p>
								<a href="<?php echo $this->_aVars['store']['install_url']; ?>">Update Now</a>
							</div>
<?php endif; ?>

							<div class="apps_version">
								v<?php echo $this->_aVars['ActiveApp']['version']; ?>
							</div>
						</div>
						<div class="apps_content">
<?php endif; ?>

<?php if (!$this->bIsSample):  $this->getLayout('error');  endif; ?>
							<div class="_block_content">
<?php if (!$this->bIsSample): ?><div id="site_content"><?php if (isset($this->_aVars['bSearchFailed'])): ?><div class="message">Unable to find anything with your search criteria.</div><?php else:  $sController = "admincp.index";  if ( Phpfox::getLib("template")->shouldLoadDelayed("admincp.index") == true ): ?>
<div id="delayed_block_image" style="text-align:center; padding-top:20px;"><img src="http://localhost/phpfox2/PF.Base/theme/frontend/default/style/default/image/ajax/add.gif" alt="" /></div>
<div id="delayed_block" style="display:none;"><?php echo Phpfox::getLib('phpfox.module')->getFullControllerName(); ?></div>
<?php else:  Phpfox::getLib('phpfox.module')->getControllerTemplate();  endif;  endif; ?></div><?php endif; ?>
							</div>

<?php if (isset ( $this->_aVars['aSectionAppMenus'] )): ?>
						</div>
<?php endif; ?>

					</div>
				</div>		
				
				<div id="copyright">
<?php echo Phpfox::getParam('core.site_copyright'); ?> <?php echo ' &middot; ' . PhpFox::link(); ?>
				</div>		
						
			</div>		
<?php (($sPlugin = Phpfox_Plugin::get('theme_template_body__end')) ? eval($sPlugin) : false); ?>
<?php echo $this->_sFooter; ?>
	</body>
</html>
