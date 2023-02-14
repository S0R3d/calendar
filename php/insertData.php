<?php
require_once("conn.php");
global $db;
// non fidarsi dei dati passati attraverso $_POST

$query_last_id = "SELECT MAX(`id`) as max FROM `event`;";
$s = $db->prepare($query_last_id);
$s->execute();
$last = $s->fetch();

$next = $last['max']+1;

$real = array(
    'id' => $next,
    'title' => $_POST["title"],
    'sDate' => $_POST["sDate"],
    'fDate' => $_POST["fDate"],
    'sTime' => $_POST["sTime"],
    'fTime' => $_POST["fTime"],
    'real_evt_id' => NULL,
    'real_sDate' => NULL,
    'real_fDate' => NULL,
);

$query_insert_real = "INSERT INTO `event`(`id`,`title`,`sDate`,`fDate`,`sTime`,`fTime`,`real_evt_id`,`real_sDate`,`real_fDate`)
            VALUES ( :next_id_r , :title_r, :sdate_r, :fdate_r, :stime_r, :ftime_r, :r_evt_id_r, :r_sdate_r, :r_fdate_r);";
$sr = $db->prepare($query_insert_real);
$sr->execute([
    'next_id_r' => $real['id'],
    'title_r' => $real['title'],
    'sdate_r' => $real['sDate'],
    'fdate_r' => $real['fDate'],
    'stime_r' => $real['sTime'],
    'ftime_r' => $real['fTime'],
    'r_evt_id_r' => $real['real_evt_id'],
    'r_sdate_r' => $real['real_sDate'],
    'r_fdate_r' => $real['real_fDate'],
]);

$fD = DateTime::createFromFormat('Y-m-d', $real['fDate']);
$sD = DateTime::createFromFormat('Y-m-d', $real['sDate']);

for ($i = 1, $one = $sD; $fD->diff($one)->d > 0; ++$i) {
    $one->modify('+1 day');

    $this_day = $one->format('Y-m-d');
    $end = array(
        'id' => $next+$i,
        'title' => 'end_event_'.$real['id'].'_'.$i,
        'sDate' => $this_day,
        'fDate' => $this_day,
        'sTime' => '00:00:00',
        'fTime' => '00:00:00',
        'real_evt_id' => $real['id'],
        'real_sDate' => $real['sDate'],
        'real_fDate' => $real['fDate'],
    );

    $query_inser_end = "INSERT INTO `event`(`id`,`title`,`sDate`,`fDate`,`sTime`,`fTime`,`real_evt_id`,`real_sDate`,`real_fDate`)
                VALUES ( :next_id_e, :title_e, :sdate_e, :fdate_e, :stime_e, :ftime_e, :r_evt_id_e, :r_sdate_e, :r_fdate_e);";
    $se = $db->prepare($query_inser_end);
    $se->execute([
        'next_id_e' => $end['id'],
        'title_e' => $end['title'],
        'sdate_e' => $end['sDate'],
        'fdate_e' => $end['fDate'],
        'stime_e' => $end['sTime'],
        'ftime_e' => $end['fTime'],
        'r_evt_id_e' => $end['real_evt_id'],
        'r_sdate_e' => $end['real_sDate'],
        'r_fdate_e' => $end['real_fDate'],
    ]);
}



