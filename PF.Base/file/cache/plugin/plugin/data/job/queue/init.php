<?php return '\\Core\\Queue\\Manager::instance()
    ->addHandler(\'groups_member_notifications\', \'\\Apps\\PHPfox_Groups\\Job\\SendMemberNotification\');

\\Core\\Queue\\Manager::instance()->addHandler(\'groups_convert_old_group\', \'\\Apps\\PHPfox_Groups\\Job\\ConvertOldGroups\'); \\Core\\Queue\\Manager::instance()->addHandler(\'item_liked\', \'Like_Job_ItemLiked\'); ';