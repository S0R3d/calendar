<?php
require_once("conn.php");
global $db;
$RESULT = '';
$date = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$limit = (int) $_POST['limit'];

$query1 = "SELECT count(`id`) FROM `events` WHERE `sDate` = :date";
$state1 = $db->prepare($query1);
$state1->execute(['date' => $date]);
$res = $state1->fetch();
$count = $res[0];

if ($count > $limit) {
    --$limit;
}

// $query = "SELECT * FROM `events` WHERE `sDate` = :date ORDER BY `fDate` DESC LIMIT :limit";
$query = "SELECT * FROM `events` WHERE `sDate` = :date ORDER BY `fDate` DESC";
// $query = "SELECT *
// FROM `event`
// WHERE `event`.`start_date` = :date
// ORDER BY
// CASE WHEN `event`.`real_event` IS NULL THEN 1 ELSE 0 END, `event`.`real_event`";
$state = $db->prepare($query);
$state->bindParam('date', $date, PDO::PARAM_STR);
// $state->bindParam('limit', $limit, PDO::PARAM_INT);
$state->execute();
$rtrn = $state->fetchAll();
if (sizeof($rtrn)) {
    foreach ($rtrn as $i => $row) {
        $sD = $row['sDate'];
        $fD = $row['fDate'];
        $sT = substr($row['sTime'], 0, strlen($row['sTime']) - 3);
        $fT = substr($row['fTime'], 0, strlen($row['fTime']) - 3);

        if ($sD == $fD and ($sT == $fT and $fT == "00:00")) { // Fgg
            $RESULT .= '<div class="event Fgg" event-id="'.$row["id"].'" style="order: '.($i+1).';"><div class="title">'.$row["title"].'</div></div>';
        } else if ($sD != $fD and ($sT == $fT and $fT == "00:00")) { // Fggs
            $target = strtotime($fD);
            $current = strtotime($sD);
            $diff = ((abs($target-$current)/60)/60)/24;
            $RESULT .= '<div class="event Fggs" event-id="'.$row["id"].'" style="order: '.($i+1).';"><div class="title">'.$row["title"].'</div></div>';
            for ($i = 0; $i < $diff; $i++) {
                $last = $i==0 ? 'last-evt' : '';
                $RESULT .= '<div class="event Fggs end-evt '.$last.'"><div class="title">'.$row["title"].'</div></div>';
            }
        } else if ($sD == $fD and $sT != $fT) { // NFgg
            $RESULT .= '<div class="event NFgg" event-id="'.$row["id"].'"><div class="icon"></div><div class="title">'.$sT.' '.$row["title"].'</div></div>';
        } else if ($sD != $fD and $sT != $fT) { // NFggs 
            $diff = (substr($fD, 8) - substr($sD, 8));
            $RESULT .= '<div class="event NFggs" event-id="'.$row["id"].'"><div class="title">'.$sT.' '.$row["title"].'</div></div>';
            for ($i = 0; $i < $diff; $i++) {
                $last = $i==0 ? 'last-evt' : '';
                $RESULT .= '<div class="event NFggs end-evt '.$last.'"><div class="title">'.$row["title"].'</div></div>';
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