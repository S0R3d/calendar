<?php
require_once("conn.php");
$date = $_POST['y']."-".$_POST['m']."-".$_POST['d'];
$id = $_POST['id'];
$query = "DELETE FROM `event` WHERE `real_evt_id` = :id;
            DELETE FROM `event` WHERE `id` = :id;";
$state = $db->prepare($query);
$state->execute(['id' => $id]);
$res = $state->fetchAll();
?>