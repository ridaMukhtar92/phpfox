<?php return 'if (!Phpfox::isAdminPanel()) {
	$url = $sBaseUrl . \'PF.Site/flavors/\' . flavor()->active->id . \'/assets/\';
	$sData .= \'<link href="\' . $url . \'autoload.css?v=\' . Phpfox::internalVersion() . \'" rel="stylesheet">\';
} if (auth()->isAdmin() && request()->segment(2) == \'app\' && request()->get(\'id\') == \'PHPfox_IM\') {
	$sData .= \'<style>.app_grouping { display:none; }</style>\';
} $video_phrases = [
	\'video\' => _p(\'Videos\'),
	\'say\' => _p(\'Say something about this video...\'),
	\'save\' => _p(\'Save\'),
	\'share\' => \\Phpfox::getPhrase(\'feed.share\')
];

$sData .= \'<script>var v_phrases = \' . json_encode($video_phrases) . \';</script>\'; ';