<?php

return function(Phpfox_Installer $Installer) {
    $Installer->db->query('ALTER TABLE `' . Phpfox::getT('forum_access') . '` ADD `access_id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`access_id`)');
};