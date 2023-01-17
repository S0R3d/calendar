<?php
require_once("conn.php");
require_once("table.php");

$title = $_POST["title"];
$sDate = $_POST["sDate"];
$sTime = $_POST["sTime"];
$fDate = $_POST["fDate"];
$fTime = $_POST["fTime"];

// ordinati secondo lo schema sql
$c = array(
    $title, $sDate, $sTime, $fDate, $fTime,
);

var_dump($c);

?>