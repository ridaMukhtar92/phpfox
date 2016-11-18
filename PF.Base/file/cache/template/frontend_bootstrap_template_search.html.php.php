<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: November 18, 2016, 7:45 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: search.html.php 7102 2014-02-11 14:28:49Z Fern $
 */



?>
<?php if (! defined ( 'PHPFOX_IS_FORCED_404' ) && ! empty ( $this->_aVars['aSearchTool'] ) && is_array ( $this->_aVars['aSearchTool'] )): ?>
	<div class="header_bar_menu">
		<div class="row">
		<div class="col-md-12 clearfix">

<?php if (isset ( $this->_aVars['aSearchTool']['search'] )): ?>
			<div class="header_bar_search">
				<form id="form_main_search" class="" method="GET" action="<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aSearchTool']['search']['action']); ?>" onbeforesubmit="$Core.Search.checkDefaultValue(this,'<?php echo $this->_aVars['aSearchTool']['search']['default_value']; ?>');">
					<div class="hidden">
<?php if (( isset ( $this->_aVars['aSearchTool']['search']['hidden'] ) )): ?>
<?php echo $this->_aVars['aSearchTool']['search']['hidden']; ?>
<?php endif; ?>
					</div>
					<div class="header_bar_search_holder form-group has-feedback">
						<div class="header_bar_search_inner">
							<div class="input-group" style="width: 100%">

								<input type="search" class="form-control" name="search[<?php echo $this->_aVars['aSearchTool']['search']['name']; ?>]" value="<?php if (isset ( $this->_aVars['aSearchTool']['search']['actual_value'] )):  echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aSearchTool']['search']['actual_value']);  endif; ?>" placeholder="<?php echo $this->_aVars['aSearchTool']['search']['default_value']; ?>" />
								<a class="form-control-feedback">
									<i class="fa fa-search"></i>
								</a>
								<div class="input-group-btn visible-xs">
									<button type="button" class="btn btn-default" data-expand="expander" data-target="#mobile_search_expander">
										<i class="fa fa-ellipsis-h"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div id="js_search_input_holder">
						<div id="js_search_input_content pull-right">
<?php if (isset ( $this->_aVars['sModuleForInput'] )): ?>
<?php Phpfox::getBlock('input.add', array('module' => $this->_aVars['sModuleForInput'],'bAjaxSearch' => true)); ?>
<?php endif; ?>
						</div>
					</div>
				
</form>

			</div>
<?php endif; ?>

<?php if (isset ( $this->_aVars['aSearchTool']['filters'] ) && count ( $this->_aVars['aSearchTool']['filters'] )): ?>
			<div class="header_filter_holder header_filter_holder_md hidden-xs pull-left">
<?php if (count((array)$this->_aVars['aSearchTool']['filters'])):  $this->_aPhpfoxVars['iteration']['fkey'] = 0;  foreach ((array) $this->_aVars['aSearchTool']['filters'] as $this->_aVars['sSearchFilterName'] => $this->_aVars['aSearchFilters']):  $this->_aPhpfoxVars['iteration']['fkey']++; ?>

<?php if (! isset ( $this->_aVars['aSearchFilters']['is_input'] )): ?>
				<div class="inline-block">
					<a class="btn  btn-default dropdown-toggle" data-toggle="dropdown">
						<span class=""><?php echo $this->_aVars['sSearchFilterName']; ?>:</span>
							<span><?php if (isset ( $this->_aVars['aSearchFilters']['active_phrase'] )):  echo $this->_aVars['aSearchFilters']['active_phrase'];  else:  echo $this->_aVars['aSearchFilters']['default_phrase'];  endif; ?><span>
							<span class="caret"></span>
					</a>
					<ul class="dropdown-menu <?php if ($this->_aPhpfoxVars['iteration']['fkey'] < 2):  else: ?>dropdown-menu-left<?php endif; ?> dropdown-menu-limit">
<?php if (count((array)$this->_aVars['aSearchFilters']['data'])):  foreach ((array) $this->_aVars['aSearchFilters']['data'] as $this->_aVars['aSearchFilter']): ?>
						<li>
							<a href="<?php echo $this->_aVars['aSearchFilter']['link']; ?>" class="ajax_link <?php if (isset ( $this->_aVars['aSearchFilter']['is_active'] )): ?>active<?php endif; ?>" <?php if (isset ( $this->_aVars['aSearchFilter']['nofollow'] )): ?>rel="nofollow"<?php endif; ?>>
<?php echo $this->_aVars['aSearchFilter']['phrase']; ?>
							</a>
						</li>
<?php endforeach; endif; ?>
<?php if (( isset ( $this->_aVars['aSearchFilters']['default'] ) )): ?>
						<li class="divider"></li>
						<li><a href="<?php echo $this->_aVars['aSearchFilters']['default']['url']; ?>" class="is_default"><?php echo $this->_aVars['aSearchFilters']['default']['phrase']; ?></a></li>
<?php endif; ?>
					</ul>
				</div>
<?php endif; ?>
<?php endforeach; endif; ?>
<?php if (Phpfox ::isModule('input') && isset ( $this->_aVars['bHasInputs'] ) && $this->_aVars['bHasInputs'] == true): ?>
				<div class="header_bar_float">
					<div class="header_bar_drop_holder">
						<ul class="header_bar_drop">
							<li>
								<a href="#" class="header_bar_drop" onclick="$('#js_search_input_holder').show(); return false;">
<?php echo Phpfox::getPhrase('input.advanced_filters'); ?>
								</a>
							</li>
						</ul>
					</div>
				</div>
<?php endif; ?>
			</div>
<?php endif; ?>
		</div>
<?php if (isset ( $this->_aVars['aSearchTool']['filters'] ) && count ( $this->_aVars['aSearchTool']['filters'] )): ?>
		<div class="header_filter_holder header_filter_holder_xs visible-xs col-lg-8 col-md-9 col-sm-9 close" id="mobile_search_expander">
			<div class="clearfix">
<?php if (count((array)$this->_aVars['aSearchTool']['filters'])):  $this->_aPhpfoxVars['iteration']['fkey'] = 0;  foreach ((array) $this->_aVars['aSearchTool']['filters'] as $this->_aVars['sSearchFilterName'] => $this->_aVars['aSearchFilters']):  $this->_aPhpfoxVars['iteration']['fkey']++; ?>

<?php if (! isset ( $this->_aVars['aSearchFilters']['is_input'] )): ?>
				<div class="form-group">
					<a class="btn btn-default btn-block" data-toggle="dropdown">
						<span class=""><?php echo $this->_aVars['sSearchFilterName']; ?>:</span>
							<span><?php if (isset ( $this->_aVars['aSearchFilters']['active_phrase'] )):  echo $this->_aVars['aSearchFilters']['active_phrase'];  else:  echo $this->_aVars['aSearchFilters']['default_phrase'];  endif; ?><span>
							<span class="caret"></span>
					</a>
					<ul class="dropdown-menu dropdown-menu-left dropdown-menu-limit">
<?php if (count((array)$this->_aVars['aSearchFilters']['data'])):  foreach ((array) $this->_aVars['aSearchFilters']['data'] as $this->_aVars['aSearchFilter']): ?>
						<li>
							<a href="<?php echo $this->_aVars['aSearchFilter']['link']; ?>" class="ajax_link <?php if (isset ( $this->_aVars['aSearchFilter']['is_active'] )): ?>active<?php endif; ?>" <?php if (isset ( $this->_aVars['aSearchFilter']['nofollow'] )): ?>rel="nofollow"<?php endif; ?>>
<?php echo $this->_aVars['aSearchFilter']['phrase']; ?>
							</a>
						</li>
<?php endforeach; endif; ?>
<?php if (( isset ( $this->_aVars['aSearchFilters']['default'] ) )): ?>
						<li class="divider"></li>
						<li><a href="<?php echo $this->_aVars['aSearchFilters']['default']['url']; ?>" class="is_default"><?php echo $this->_aVars['aSearchFilters']['default']['phrase']; ?></a></li>
<?php endif; ?>
					</ul>
				</div>
<?php endif; ?>
<?php endforeach; endif; ?>
<?php if (Phpfox ::isModule('input') && isset ( $this->_aVars['bHasInputs'] ) && $this->_aVars['bHasInputs'] == true): ?>
				<div class="form-group">
					<div class="header_bar_drop_holder">
						<ul class="header_bar_drop">
							<li>
								<a href="#" class="header_bar_drop" onclick="$('#js_search_input_holder').show(); return false;">
<?php echo Phpfox::getPhrase('input.advanced_filters'); ?>
								</a>
							</li>
						</ul>
					</div>
				</div>
<?php endif; ?>
			</div>
		</div>
<?php endif; ?>
		</div>

	</div>
<?php endif; ?>


