<?php
defined('PHPFOX') or exit('NO DICE!');

if (Phpfox_Module::instance()->getFullControllerName() == 'event.index')
{
	Phpfox::getBlock('event.rsvp-entry');
}
?>