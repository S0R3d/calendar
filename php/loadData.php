<?php
require_once("conn.php");
global $db;
$RESULT = '';
$date = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$limit = (int) $_POST['limit'];

$query1 = "SELECT count(`id`) FROM `event` WHERE `sDate` = :date;";
$state1 = $db->prepare($query1);
$state1->execute(['date' => $date]);
$res = $state1->fetch();
$count = $res[0];

if ($count > $limit) {
    --$limit;
}

$query = "SELECT *
FROM `event`
WHERE `event`.`sDate` = :date
ORDER BY
CASE WHEN `event`.`real_sDate` IS NULL THEN 1 ELSE 0 END, `event`.`real_sDate`, `event`.`fDate` DESC, `event`.`real_fDate`DESC;";
// aggiunto real_fDate
$state = $db->prepare($query);
$state->bindParam('date', $date, PDO::PARAM_STR);
// $state->bindParam('limit', $limit, PDO::PARAM_INT);
$state->execute();
$rtrn = $state->fetchAll();
if (sizeof($rtrn)) {
    foreach ($rtrn as $i => $event) {
        $real_id = $event['real_evt_id'];
        $sD = $event['sDate'];
        $fD = $event['fDate'];
        $sT = substr($event['sTime'], 0, strlen($event['sTime']) - 3);
        $fT = substr($event['fTime'], 0, strlen($event['fTime']) - 3);

        if (!$real_id) { // REAL EVENT
            if ($sD == $fD and ($sT == $fT and $fT == "00:00")) { // Fgg
                $RESULT .= '<div class="event Fgg" event-id="'.$event["id"].'" style="order: '.($i+1).';"><div class="title">'.$event["title"].'</div></div>';
            } else if ($sD != $fD and ($sT == $fT and $fT == "00:00")) { // Fggs
                // $target = strtotime($fD);
                // $current = strtotime($sD);
                // $diff = ((abs($target-$current)/60)/60)/24;
                $RESULT .= '<div class="event Fggs" event-id="'.$event["id"].'" style="order: '.($i+1).';"><div class="title">'.$event["title"].'</div></div>';
                // for ($i = 0; $i < $diff; $i++) {
                //     $last = $i==0 ? 'last-evt' : '';
                //     $RESULT .= '<div class="event Fggs end-evt '.$last.'"><div class="title">'.$event["title"].'</div></div>';
                // }
            } else if ($sD == $fD and $sT != $fT) { // NFgg
                $RESULT .= '<div class="event NFgg" event-id="'.$event["id"].'"><div class="icon"></div><div class="title">'.$sT.' '.$event["title"].'</div></div>';
            } else if ($sD != $fD and $sT != $fT) { // NFggs 
                // $diff = (substr($fD, 8) - substr($sD, 8));
                $RESULT .= '<div class="event NFggs" event-id="'.$event["id"].'"><div class="title">'.$sT.' '.$event["title"].'</div></div>';
                // for ($i = 0; $i < $diff; $i++) {
                //     $last = $i==0 ? 'last-evt' : '';
                //     $RESULT .= '<div class="event NFggs end-evt '.$last.'"><div class="title">'.$event["title"].'</div></div>';
                // }
            }
        } else { // END EVENT
            // ricerca del real event associato all' end event 
            $q = "SELECT * FROM `event` WHERE `event`.`real_evt_id` IS NULL and `event`.`id`= ".$event['real_evt_id'].";";
            $s = $db->prepare($q);
            $s->execute();
            $real = $s->fetchAll();

            if ($real) {
                $real_sD = $real[0]['sDate'];
                $real_fD = $real[0]['fDate'];
                $real_sT = substr($real[0]['sTime'], 0, strlen($real[0]['sTime']) - 3);
                $real_fT = substr($real[0]['fTime'], 0, strlen($real[0]['fTime']) - 3);

                if ($event['fDate'] == $real_fD) $last = 'last-evt';
                else $last = '';
                if ($real_sD != $real_fD and ($real_sT == $real_fT and $real_fT == "00:00")) { // Fggs
                    $RESULT .= '<div class="event Fggs end-evt '.$last.'" event-id="'.$event['id'].'" real-evt-id="'.$event['real_evt_id'].'" style="order: '.($i+1).';"><div class="title">'.$real[0]["title"].'</div></div>';
                } else if ($real_sD != $real_fD and $real_sT != $real_fT) { //NFggs
                    $RESULT .= '<div class="event NFggs end-evt '.$last.'" event-id="'.$event['id'].'" real-evt-id="'.$event['real_evt_id'].'" style="order: '.($i+1).';"><div class="title">'.$real[0]["title"].'</div></div>';
                }
            }
        }
        $RESULT .= "---";
    }
    // if ($limit == 2 && $count > 3) {
    //     $RESULT .= '<div class="other-evt">Altri '.$count-$limit.'</div>';
    //     $RESULT .= "---";
    // }
    echo $RESULT;
}