<?php return 'defined(\'PHPFOX\') or exit(\'NO DICE!\');

if (Phpfox_Request::instance()->get(\'module\') == \'event\')
{
	$aEvent = Event_Service_Event::instance()->getForEdit($aFeed[\'parent_user_id\'], true);
	if (isset($aEvent[\'event_id\']) && $aEvent[\'user_id\'] == Phpfox::getUserId())
	{
		define(\'PHPFOX_FEED_CAN_DELETE\', true);
	}
} defined(\'PHPFOX\') or exit(\'NO DICE!\');

if (Phpfox_Request::instance()->get(\'module\') == \'pages\')
{
	$aPage = Phpfox::getService(\'pages\')->getPage($aFeed[\'parent_user_id\']);
	if (isset($aPage[\'page_id\']) && Phpfox::getService(\'pages\')->isAdmin($aPage))
	{
		define(\'PHPFOX_FEED_CAN_DELETE\', true);
	}
} defined(\'PHPFOX\') or exit(\'NO DICE!\');

if (Phpfox::isUser() && Phpfox_Request::instance()->get(\'module\') == \'\' && $aFeed[\'parent_user_id\'] == Phpfox::getUserId() && Phpfox::getUserParam(\'feed.can_remove_feeds_from_profile\'))
{
	define(\'PHPFOX_FEED_CAN_DELETE\', true);
} ';