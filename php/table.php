<?php
require_once 'conn.php';
$table = 'events';
try {
    $db->exec('CREATE TABLE IF NOT EXISTS `events` (
      `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
      `title` varchar(255) NOT NULL,
      `sDate` date NOT NULL,
      `sTime` time DEFAULT NULL,
      `fDate` date NOT NULL,
      `fTime` time DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;');
} catch (PDOException $th) {
    echo 'Error massage: '.$th;
    die();
}
?>