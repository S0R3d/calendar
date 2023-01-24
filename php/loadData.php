<?php
require_once("../php/conn.php");
$start = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$query = "SELECT * FROM `events` WHERE `sDate` = :start ";
$state = $db->prepare($query);
$state->execute(['start' => $start]);
$data = $state->fetchAll();
// var_dump($data);
if (sizeof($data)) {
    // limit 3: 3 eventi vanno inseriti ora
    for ($i = 0; $i < count($data); $i++) {
        $sD = $data[$i]['sDate'];
        $fD = $data[$i]['fDate'];
        $sT = substr($data[$i]['sTime'], 0, strlen($data[$i]['sTime']) - 3);
        $fT = substr($data[$i]['fTime'], 0, strlen($data[$i]['fTime']) - 3);

        if ($sD == $fD and ($sT == $fT and $fT == "00:00")) { // Fgg ?>
            <div class="event Fgg">
                <div class="icon"></div>
                <div class="title">
                    <?php echo $data[$i]['title'] ?>
                </div>
            </div>
        <?php
        } else if ($sD != $fD and ($sT == $fT and $fT == "00:00")) { // Fggs
            $diff = (substr($fD, 8) - substr($sD, 8));
        ?>
            <div class="event Fggs">
                <div class="icon"></div>
                <div class="title">
                    <?php echo $data[$i]['title'] ?>
                </div>
            </div>
        <?php
            for ($i=0; $i < $diff; $i++) { ?>
               <div class="event Fggs end-evt">
                <div class="icon"></div>
                <div class="title"></div>
               </div> 
            <?php
            }
        } else if ($sD == $fD and $sT != $fT) { // NFgg ?>
            <div class="event NFgg">
                <div class="icon"></div>
                <div class="title">
                    <?php echo $sT ?>
                    <?php echo $data[$i]['title'] ?>
                </div>
            </div>
        <?php
        } else if ($sD != $fD and $sT != $fT) { // NFggs 
        // FIXME: i giorni multipli NON funzionano, carica solo nel primo giorni(sDate) ?>
            <div class="event NFggs">
                <div class="icon"></div>
                <div class="title">
                    <?php echo $sT ?>
                    <?php echo $data[$i]['title'] ?>
                </div>
            </div>
        <?php
        }
    }
} ?>