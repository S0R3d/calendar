<?php
require_once("conn.php");
require_once("table.php");

// non fidarsi dei dati passati attraverso $_POST
$title = $_POST["title"];
$sDate = $_POST["sDate"];
$sTime = $_POST["sTime"];
$fDate = $_POST["fDate"];
$fTime = $_POST["fTime"];

$stmt = $db->prepare("INSERT INTO `events`(`title`,`sDate`,`sTime`,`fDate`,`fTime`) VALUES (:title, :sDate, :sTime, :fDate, :fTime)");
$stmt->bindParam(':title', $title);
$stmt->bindParam(':sDate', $sDate);
$stmt->bindParam(':sTime', $sTime);
$stmt->bindParam(':fDate', $fDate);
$stmt->bindParam(':fTime', $fTime);
$stmt->execute();

?>