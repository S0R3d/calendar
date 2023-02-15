<?php
try {
    global $db;
    $db = new PDO('mysql:host=localhost;dbname=calendar', 'root', 'root');
} catch (PDOException $th) {
    echo 'Error message: '.$th;
    die();
}
