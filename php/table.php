<?php
require_once 'conn.php';
global $db;
try {
    $db->exec("CREATE TABLE IF NOT EXISTS `event` (
      `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
      `title` varchar(255) NOT NULL,
      `sDate` date NOT NULL,
      `fDate` date NOT NULL,
      `sTime` time DEFAULT '00:00:00',
      `fTime` time DEFAULT '00:00:00',
      `real_evt_id` int(10) UNSIGNED DEFAULT NULL,
      `real_sDate` date DEFAULT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `id` (`id`),
      FOREIGN KEY (`real_evt_id`) REFERENCES `event`(`real_evt_id`)
    );");
} catch (PDOException $th) {
    echo 'Error massage: '.$th;
    die();
}
?>