<?php
defined('PHPFOX') or exit('NO DICE!');

if (Phpfox_Request::instance()->get('module') == 'pages')
{
	$aPage = Phpfox::getService('pages')->getPage($aFeed['parent_user_id']);
	if (isset($aPage['page_id']) && Phpfox::getService('pages')->isAdmin($aPage))
	{
		define('PHPFOX_FEED_CAN_DELETE', true);
	}
}
?>