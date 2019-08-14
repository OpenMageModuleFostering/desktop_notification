<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('desktopnotification')};
CREATE TABLE {$this->getTable('desktopnotification')} (
  `desktopnotification_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `increment_id` varchar(10) NOT NULL,
  `notify_flag` tinyint(5) NOT NULL DEFAULT '0',
  `order_datetime` datetime NOT NULL,
  PRIMARY KEY (`desktopnotification_id`),
  UNIQUE KEY `increment_id` (`increment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup();