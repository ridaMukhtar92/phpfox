<?php

$video_phrases = [
	'video' => _p('Videos'),
	'say' => _p('Say something about this video...'),
	'save' => _p('Save'),
	'share' => \Phpfox::getPhrase('feed.share')
];

$sData .= '<script>var v_phrases = ' . json_encode($video_phrases) . ';</script>';