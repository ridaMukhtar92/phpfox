<?php
if ((Phpfox_Module::instance()->getFullControllerName() == 'forum.thread' || (PHPFOX_IS_AJAX && isset($_POST['core']) && $_POST['core']['call'] == 'forum.addReply')) && Phpfox::isUser())
{
	$aPost = $this->getVar('aPost');
	$aThread = (array) $this->getVar('aThread');	
	$iTotalPosts = (int) $this->getVar('iTotalPosts');	

	if ((Phpfox::getUserParam('forum.can_edit_own_post') && $aPost['user_id'] == Phpfox::getUserId()) || Phpfox::getUserParam('forum.can_edit_other_posts') || Phpfox::getService('forum.moderate')->hasAccess($aPost['forum_id'], 'edit_post'))
	{
		echo '<li><a href="#" onclick="$Core.box(\'forum.reply\', 800, \'id=' . $aPost['thread_id'] . '&amp;edit=' . $aPost['post_id'] . '\'); return false;">' . Phpfox::getPhrase('forum.edit') . '</a></li>';
		
	}

	if ((Phpfox::getUserParam('forum.can_delete_own_post') && $aPost['user_id'] == Phpfox::getUserId()) 
		|| Phpfox::getUserParam('forum.can_delete_other_posts') 
		|| Phpfox::getService('forum.moderate')->hasAccess($aPost['forum_id'], 'delete_post') 
		|| (!empty($aThread['group_id']) && Phpfox::getService('pages')->isAdmin($aThread['group_id']))
		)
	{
		echo '<li><a href="#" onclick="return $Core.forum.deletePost(\'' . $aPost['post_id'] . '\');" title="' . Phpfox::getPhrase('forum.delete_this_post') . '">' . Phpfox::getPhrase('forum.delete') . '</a></li>';
		
	}
}
?>