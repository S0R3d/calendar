<?php
require_once("../php/conn.php");
$start = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
// LIMIT 3 da implementare correttamente
$query = "SELECT * FROM `events` WHERE `sDate` = :start LIMIT 3";
$state = $db->prepare($query);
$state->execute(['start' => $start]);
$data = $state->fetchAll();
if (sizeof($data)) {
    foreach($data as $i => $row) {
        $sD = $row['sDate'];
        $fD = $row['fDate'];
        $sT = substr($row['sTime'], 0, strlen($row['sTime']) - 3);
        $fT = substr($row['fTime'], 0, strlen($row['fTime']) - 3);

        if ($sD == $fD and ($sT == $fT and $fT == "00:00")) { // Fgg ?>
            <div class="event Fgg">
                <div class="title">
                    <?php echo $row['title'] ?>
                </div>
            </div>
        <?php
        } else if ($sD != $fD and ($sT == $fT and $fT == "00:00")) { // Fggs
            $diff = (substr($fD, 8) - substr($sD, 8));
        ?>
            <div class="event Fggs">
                <div class="title">
                    <?php echo $row['title'] ?>
                </div>
            </div>
        <?php
            for ($i=0; $i < $diff; $i++) { ?>
               <div class="event Fggs end-evt">
                <div class="title">
                    <?php echo $row['title'] ?>
                </div>
               </div> 
            <?php
            }
        } else if ($sD == $fD and $sT != $fT) { // NFgg ?>
            <div class="event NFgg">
                <div class="icon"></div>
                <div class="title">
                    <?php echo $sT ?>
                    <?php echo $row['title'] ?>
                </div>
            </div>
        <?php
        } else if ($sD != $fD and $sT != $fT) { // NFggs 
            $diff = (substr($fD,8) - substr($sD,8));
        ?>
            <div class="event NFggs">
                <div class="title">
                    <?php echo $sT ?>
                    <?php echo $row['title'] ?>
                </div>
            </div>
        <?php
            for ($i=0; $i < $diff; $i++) { ?>
                <div class="event NFggs end-evt">
                    <div class="title">
                        <?php echo $row['title'] ?>
                    </div>
                </div>
            <?php
            }
        }
        echo "---";
    }
} ?>