<?php return '$controller_name = \\Phpfox_Module::instance()->getFullControllerName();
if (isset(flavor()->active->blocks) && isset(flavor()->active->blocks->{$controller_name})) {
	foreach (flavor()->active->blocks->{$controller_name} as $location => $html) {
		foreach ($html as $file) {
			if (substr($file, 0, 1) == \'@\') {
				new Core\\Block($controller_name, $location, function () use ($file) {
					list($namespace, $module, $block) = explode(\'/\', $file);

					\\Phpfox::getBlock($module . \'.\' . $block);

					return @ob_get_clean();
				});

				continue;
			}

			new Core\\Block($controller_name, $location, function () use ($file) {
				return view(\'@Flavor/\' . $file);
			});
		}
	}
} if (!empty($_POST) && isset($_POST[\'id\']) && Phpfox::isModule(\'feed\') && Phpfox::getParam(\'feed.cache_each_feed_entry\') && !PHPFOX_IS_AJAX)
{
	$oReq = Phpfox_Request::instance();
	$oDb = Phpfox_Database::instance();
	
		$sCustomCurrentUrl = Phpfox_Module::instance()->getFullControllerName();
		$aVals = $oReq->getArray(\'val\');		
		if (!empty($aVals))
		{
			switch ($sCustomCurrentUrl)
			{
				case \'blog.add\':
					Phpfox::getService(\'feed.process\')->clearCache(\'blog\', $_POST[\'id\']);
					break;
				case \'pages.add\':
					Phpfox::getService(\'feed.process\')->clearCache(\'pages_itemLiked\', $_POST[\'id\']);
					break;					
				case \'blog.delete\':
					Phpfox::getService(\'feed.process\')->clearCache(\'blog\', $oReq->get(\'id\'));
					break;
			}
		}
	
} $sHttp = (isset($_SERVER[\'HTTPS\']) && $_SERVER[\'HTTPS\'] == \'on\' ? \'https\' : \'http\');

$sFacebookAsync = "
(function(d){
     var js, id = \'facebook-jssdk\'; if (d.getElementById(id)) {return;}
     js = d.createElement(\'script\'); js.id = id; js.async = true;
     js.src = \\"//connect.facebook.net/en_US/all.js\\";
     d.getElementsByTagName(\'head\')[0].appendChild(js);
   }(document));		
		";

if ((defined(\'PHPFOX_IS_AJAX\') && PHPFOX_IS_AJAX) || (defined(\'PHPFOX_IS_AJAX_PAGE\') && PHPFOX_IS_AJAX_PAGE))
{
	
}
else
{
	if (!Phpfox::getParam(\'user.force_user_to_upload_on_sign_up\') && Phpfox::getParam(\'facebook.enable_facebook_connect\') && !Phpfox::isAdminPanel())
	{
		if (Phpfox::isUser())
		{
			if (Phpfox_Request::instance()->get(\'req1\') == \'facebook\' && Phpfox_Request::instance()->get(\'req2\') == \'unlink\')
			{
					
			}			
			else
			{
				if (Phpfox::getUserBy(\'fb_user_id\') && !Phpfox::getUserBy(\'fb_is_unlinked\'))
				{
					$oTpl->setHeader(array(
							\'<script type="text/javascript">
								window.onload = function()
								{
									FB.init(
									{
										appId  : \\\'\' . Phpfox::getParam(\'facebook.facebook_app_id\') . \'\\\',
										status : true,
										cookie : true,
										oauth  : true,
										xfbml  : true
									});

									FB.getLoginStatus(function(response)
									{
										if (!response.authResponse)
										{
											window.location.href = \\\'\' . Phpfox_Url::instance()->makeUrl(\'facebook.unlink\', array(\'noapp\' => \'1\')) . \'\\\';
										}
									});
								};

								\' . $sFacebookAsync . \'
							</script>\')
					);
				}
				else
				{
					$oTpl->setHeader(array(
							\'<script type="text/javascript">
								window.onload = function()
								{
									FB.init(
									{
										appId  : \\\'\' . Phpfox::getParam(\'facebook.facebook_app_id\') . \'\\\',
										status : true,
										cookie : true,
										oauth  : true,
										xfbml  : true 
									});		
								};
								
								\' . $sFacebookAsync . \'
							</script>\')
					);
				}
			}
		}
		else 
		{
			if (Phpfox_Request::instance()->get(\'req1\') == \'facebook\' && Phpfox_Request::instance()->get(\'req2\') == \'frame\')
			{

			}
			elseif (Phpfox_Request::instance()->get(\'req1\') == \'facebook\' && Phpfox_Request::instance()->get(\'req2\') == \'logout\')
			{

			}		
			elseif (Phpfox_Request::instance()->get(\'req1\') == \'facebook\' && Phpfox_Request::instance()->get(\'req2\') == \'account\')
			{

			}
			elseif (!empty($_REQUEST[\'facebook-process-login\']))
			{

			}
			else 
			{
				$oTpl->setHeader(array(													
						\'<script type="text/javascript">
							window.onload = function()
							{
								FB.init(
								{
									appId  : \\\'\' . Phpfox::getParam(\'facebook.facebook_app_id\') . \'\\\',
									status : true,
									cookie : true,
									oauth  : true,
									xfbml  : true 
								});
								
								FB.getLoginStatus(function(response){
									if (response.authResponse)
                                    {
										$(\\\'body\\\').html(\\\'<div id="fb-root"></div><div id="facebook_connection">\' . Phpfox::getPhrase(\'facebook.connecting_to_facebook_please_hold\') . \'</div>\\\');
										window.location.href = \\\'\' . Phpfox_Url::instance()->makeUrl(\'facebook.frame\') . \'\\\';
									}
								});
						
								FB.Event.subscribe(\\\'auth.login\\\', function(response) 
								{
									if (response.authResponse) 
									{
										$(\\\'body\\\').html(\\\'<div id="fb-root"></div><div id="facebook_connection">\' . Phpfox::getPhrase(\'facebook.connecting_to_facebook_please_hold\') . \'</div>\\\');
										window.location.href = \\\'\' . Phpfox_Url::instance()->makeUrl(\'facebook.frame\') . \'\\\';
									}
								});
							};	
													
							\' . $sFacebookAsync . \'
						</script>\')
					);
			}
		}
	}
	else
	{
		if (Phpfox::isUser() && !Phpfox::isAdminPanel() && Phpfox::getParam(\'facebook.facebook_app_id\'))
		{
			$oTpl->setHeader(array(					
					\'<script type="text/javascript">
						window.onload = function()
						{
							FB.init(
							{
								appId  : \\\'\' . Phpfox::getParam(\'facebook.facebook_app_id\') . \'\\\',
								status : true,
								cookie : true,			
								oauth  : true,
								xfbml  : true 
							});
						};
					
					\' . $sFacebookAsync . \'
					</script>\'
				)
			);
		}
	}
} ';