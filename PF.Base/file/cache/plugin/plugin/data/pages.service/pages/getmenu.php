<?php return 'if (setting(\'pf_video_enabled\')) {
	if (\\Phpfox::getService(\'pages\')->hasPerm($aPage[\'page_id\'], \'pf_video.view_browse_videos\')) {
		$aMenus[] = [
			\'phrase\'  => _p(\'Videos\'),
			\'icon\'    => \'\',
			\'url\'     => Phpfox::getService(\'pages\')->getUrl($aPage[\'page_id\'], $aPage[\'title\'], $aPage[\'vanity_url\']) . \'v/\',
			\'landing\' => \'v\'
		];
	}
} ';