<?php
require_once("conn.php");
global $db;

$date = $_POST['y']."-".$_POST['m']."-".$_POST['d'];
$id = $_POST['id'];

$q = "SELECT * FROM `event` WHERE `id` = :id;";
$s = $db->prepare($q);
$s->execute([ 'id' => $id ]);
$r = $s->fetchAll();

if ($r[0]['sDate'] == $date and $r[0]['fDate'] == $date and $r[0]['real_evt_id'] == NULL and $r[0]['real_sDate'] == NULL and $r[0]['real_fDate'] == NULL) {
    // delete real_evt
    // $q1 = "DELETE FROM `event` WHERE `event`.`id` = :id;";
    // $s1 = $db->prepare($q1);
    // $s1->execute([ 'id' => $id ]);
} else if ($r[0]['sDate'] == $date and $r[0]['fDate'] != $date and $r[0]['real_evt_id'] == NULL and $r[0]['real_sDate'] == NULL and $r[0]['real_fDate'] == NULL) {
    // delete end_evt
    $q1 = "DELETE FROM `event` WHERE `event`.`real_evt_id` = :id;";
    $s1 = $db->prepare($q1);
    $s1->execute([ 'id' => $id ]);
    // delete real_evt
    // $q2 = "DELETE FROM `event` WHERE `event`.`id` = :id;";
    // $s2 = $db->prepare($q2);
    // $s2->execute([ 'id' => $id ]);
} else if ($r[0]['sDate'] == $date and $r[0]['fDate'] == $date and $r[0]['real_evt_id'] != NULL and $r[0]['real_sDate'] != NULL and $r[0]['real_fDate'] != NULL) {
    $sD = DateTime::createFromFormat('Y-m-d', $r[0]['sDate']);
    $r_sD = DateTime::createFromFormat('Y-m-d', $r[0]['real_sDate']);
    $new_fD = DateTime::createFromFormat('Y-m-d', $r[0]['fDate']);
    $diff = $sD->diff($r_sD)->d;
    if ($diff === 1) {
        // check n end_evt
        $q0 = "SELECT COUNT(`id`) FROM `event` WHERE `event`.`real_evt_id` = :r_id;";
        $s0 = $db->prepare($q0);
        $s0->execute([
            'r_id' => $r[0]['real_evt_id'],
        ]);
        $r0 = $s0->fetchAll();
        if ($r0[0][0] === 1) {
            // update real_evt
            $q1 = "UPDATE `event` SET `fDate` = :new_date WHERE `event`.`id` = :r_id;";
            $s1 = $db->prepare($q1);
            $s1->execute([
                'new_date' => $r[0]['real_sDate'],
                'r_id' => $r[0]['real_evt_id'],
            ]);
        } else {
            // update real_evt
            $q1 = "UPDATE `event` SET `sDate` = :new_date WHERE `event`.`id` = :r_id;";
            $s1 = $db->prepare($q1);
            $s1->execute([
                'new_date' => $r[0]['sDate'],
                'r_id' => $r[0]['real_evt_id'],
            ]);
            // update other end-evt
            $q2 = "UPDATE `event` SET `real_sDate` = :new_date WHERE `event`.`real_evt_id` = :r_id and `event`.`real_sDate` IS NOT NULL;";
            $s2 = $db->prepare($q2);
            $s2->execute([
                'new_date' => $r[0]['sDate'],
                'r_id' => $r[0]['real_evt_id'],
            ]);
            // delete end-evt selected outside of IF
        }
    } else if ($diff >= 2) {
        $new_fDate = $new_fD->modify('-1 day');
        $str_fDate = $new_fDate->format('Y-m-d');
        // update real_evt
        $q1 = "UPDATE `event` SET `fDate` = :new_date WHERE `event`.`id` = :r_id;";
        $s1 = $db->prepare($q1);
        $s1->execute([
            'new_date' => $str_fDate,
            'r_id' => $r[0]['real_evt_id'],
        ]);
        // delete end-evts successivi
        $q2 = "DELETE FROM `event` WHERE `event`.`real_evt_id` = :r_id and `event`.`sDate` > :limit_date OR `event`.`fDate` > :limit_date;";
        $s2 = $db->prepare($q2);
        $s2->execute([
            'r_id' => $r[0]['real_evt_id'],
            'limit_date' => $str_fDate,
        ]);
        // update end-evts rimasti
        $q3 = "UPDATE `event` SET `real_fDate` = :new_date WHERE `event`.`real_evt_id` = :r_id;";
        $s3 = $db->prepare($q3);
        $s3->execute([
            'new_date' => $str_fDate,
            'r_id' => $r[0]['real_evt_id'],
        ]);
        // delete end-evt selected outside of ELSE-IF
    }
    // delete end_evt
    // $q3 = "DELETE FROM `event` WHERE `event`.`id` = :id;";
    // $s3 = $db->prepare($q3);
    // $s3->execute([ 'id' => $id ]);
}

$q1 = "DELETE FROM `event` WHERE `event`.`id` = :id;";
$s1 = $db->prepare($q1);
$s1->execute([ 'id' => $id ]);
