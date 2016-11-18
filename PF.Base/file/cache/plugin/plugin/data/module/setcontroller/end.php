<?php return 'if ($this->_sController == \'index-member\' && Phpfox::isAdmin() && request()->get(\'preview\')) {
	$this->_sController = \'index-visitor\';
	\\User_Service_Auth::instance()->reset();
} if ($oReq->get(\'req1\') == \'hashtag\')
{
	$this->_sModule = \'core\';
	$this->_sController = \'index-member\';
} ';