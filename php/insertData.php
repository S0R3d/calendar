<?php
require_once("conn.php");
require_once("table.php");
// non fidarsi dei dati passati attraverso $_POST

$query_last_id = "SELECT MAX(`id`) as max FROM `event`";
$s = $db->prepare($query_last_id);
$s->execute();
$last = $s->fetch();

$next = $last['max']+1;

$real = array(
    'id' => $next,
    'title' => $_POST["title"],
    'sDate' => $_POST["sDate"],
    'sTime' => $_POST["sTime"],
    'fDate' => $_POST["fDate"],
    'fTime' => $_POST["fTime"],
    'real_evt_id' => NULL,
    'real_sDate' => NULL,
);

$query_insert_real = "INSERT INTO `event`(`id`,`title`,`sDate`,`fDate`,`sTime`,`fTime`,`real_evt_id`,`real_sDate`)
            VALUES ( :next_id , :title_r, :sdate_r, :fdate_r, :stime_r, :ftime_r, :r_evt_id_r, :r_sdate_r)";
$sr = $db->prepare($query_insert_real);
$sr->execute([
    'next_id' => $real['id'],
    'title_r' => $real['title'],
    'sdate_r' => $real['sDate'],
    'fdate_r' => $real['fDate'],
    'stime_r' => $real['sTime'],
    'ftime_r' => $real['fTime'],
    'r_evt_id_r' => $real['real_evt_id'],
    'r_sdate_r' => $real['real_sDate']
]);

// find n-days between sDate and fDate
$fD = strtotime($real['fDate']);
$sD = strtotime($real['sDate']);

// loop for end-evt
for ($i = 1, $one = strtotime('+ 1 day', $sD);
    ((abs($fD-$one)/60)/60)/24 < 0;
    ++$i, $one = strtotime('+ 1 day', $one)) {

    // $one_more = strtotime('+ 1 day', $sD);
    $this_day = date('Y-m-d', $one);
    $end = array(
        'id' => NULL, // auto_increment, with NULL auto_added
        'title' => 'end_event_'.$real['id'].'_'.$i,
        'sDate' => $this_day,
        'sTime' => $this_day,
        'fDate' => '00:00:00',
        'fTime' => '00:00:00',
        'real_evt_id' => $real['id'], // $real['id']
        'real_sDate' => $real['sDate'], // $real['sDate]
    );

    $query_inser_end = "INSERT INTO `event`(`id`,`title`,`sDate`,`fDate`,`sTime`,`fTime`,`real_evt_id`,`real_sDate`)
                VALUE ( :next_id, :title_e, :sdate_e, :fdate_e, :stime_e, :ftime_e, :r_evt_id_e, :r_sdate_e)";
    $se = $db->prepare($query_inser_end);
    $se->execute([
        'next_id' => $end['id'],
        'title_e' => $end['title'],
        'sdate_e' => $end['sDate'],
        'fdate_e' => $end['fDate'],
        'stime_e' => $end['sTime'],
        'r_evt_id_e' => $end['real_evt_id'],
        'r_sdate_e' => $end['real_sDate'],
    ]);
}



