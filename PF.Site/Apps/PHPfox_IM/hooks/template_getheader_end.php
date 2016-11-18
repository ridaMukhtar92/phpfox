<?php

if (auth()->isAdmin() && request()->segment(2) == 'app' && request()->get('id') == 'PHPfox_IM') {
	$sData .= '<style>.app_grouping { display:none; }</style>';
}