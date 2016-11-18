<?php return 'defined(\'PHPFOX\') or exit(\'NO DICE!\');

if ((Phpfox_Module::instance()->getFullControllerName() == \'forum.thread\') && Phpfox::getUserParam(\'forum.can_thank_on_forum_posts\') && Phpfox::getParam(\'forum.enable_thanks_on_posts\'))
{
$aPost = $this->getVar(\'aPost\');
$aThread = (array) $this->getVar(\'aThread\');
$iTotalPosts = (int) $this->getVar(\'iTotalPosts\');
$sCountPhrase = Phpfox::getPhrase(\'forum.thanks_count\', array(\'count\' => $aPost[\'thanks_count\']));

echo \'<div class="js_thank_post" \' . (($aPost[\'thanks_count\'] == 0) ? \'style="display:none;" \' : \'\') . \'id="js_thank_\' . $aPost[\'post_id\'] . \'"><a href="#" onclick="return $Core.box(\\\'forum.thanksBrowse\\\', 400, \\\'post_id=\' . $aPost[\'post_id\'] . \'\\\');">\' . $sCountPhrase .\'</a></div>\';
} ';