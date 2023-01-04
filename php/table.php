<?php
require_once 'conn.php';
$table = 'test';
try {
    $db->exec('CREATE TABLE IF NOT EXISTS test(
            id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            name VARCHAR(255),
            PRIMARY KEY(id)
            )');
} catch (PDOException $th) {
    echo 'Error massage: '.$th;
    die();
}
?>