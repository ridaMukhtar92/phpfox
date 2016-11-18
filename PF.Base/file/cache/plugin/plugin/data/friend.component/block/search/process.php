<?php return 'defined(\'PHPFOX\') or exit(\'NO DICE!\');

if ($sFriendModuleId == \'event\')
{
	$aInviteCache = Event_Service_Event::instance()->isAlreadyInvited($this->getParam(\'friend_item_id\', \'0\'), $aFriends);
	if (is_array($aInviteCache))
	{
		foreach ($aFriends as $iKey => $aFriend)
		{
			if (isset($aInviteCache[$aFriend[\'user_id\']]))
			{
				$aFriends[$iKey][\'is_active\'] = $aInviteCache[$aFriend[\'user_id\']];
			}
		}
	
		$this->template()->assign(array(
				\'aFriends\' => $aFriends
			)
		);	
	}
} defined(\'PHPFOX\') or exit(\'NO DICE!\');

if ($sFriendModuleId == \'marketplace\')
{
	$aInviteCache = Phpfox::getService(\'marketplace\')->isAlreadyInvited($this->getParam(\'friend_item_id\', \'0\'), $aFriends);
	if (is_array($aInviteCache))
	{
		foreach ($aFriends as $iKey => $aFriend)
		{
			if (isset($aInviteCache[$aFriend[\'user_id\']]))
			{
				$aFriends[$iKey][\'is_active\'] = $aInviteCache[$aFriend[\'user_id\']];
			}
		}
	
		$this->template()->assign(array(
				\'aFriends\' => $aFriends
			)
		);	
	}
} ';