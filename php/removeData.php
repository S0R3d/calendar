<?php
require_once("conn.php");
$date = $_POST['y']."-".$_POST['m']."-".$_POST['d'];
$id = $_POST['id'];

echo $date;
echo " ";
echo $id;

$query = "DELETE FROM `events` WHERE `id` = :id";

?>