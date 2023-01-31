<?php
require_once("conn.php");
$date = $_POST['y']."-".$_POST['m']."-".$_POST['d'];
$id = $_POST['id'];
$query = "DELETE FROM `events` WHERE `id` = :id";
$state = $db->prepare($query);
$state->execute(['id' => $id]);
$res = $state->fetchAll();
?>