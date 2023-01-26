<?php
require_once("conn.php");
$date = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$firstOfAll = array(1 => $_POST);

$query1 = "SELECT count(`id`) FROM `events` WHERE `sDate` = :date";
$state1 = $db->prepare($query1);
$state1->execute(['date' => $date]);
$rtrn1 = $state1->fetch();
if (sizeof($rtrn1))
    array_unshift($firstOfAll, $rtrn1[0]);

echo json_encode($firstOfAll);
$query = "SELECT * FROM `events` WHERE `sDate` = :date LIMIT 3";
$state = $db->prepare($query);
$state->execute(['date' => $date]);
$rtrn = $state->fetchAll();
if (sizeof($rtrn)) {
    foreach ($rtrn as $i => $row) {
        $sD = $row['sDate'];
        $fD = $row['fDate'];
        $sT = substr($row['sTime'], 0, strlen($row['sTime']) - 3);
        $fT = substr($row['fTime'], 0, strlen($row['fTime']) - 3);

        if ($sD == $fD and ($sT == $fT and $fT == "00:00")) { // Fgg ?>
            <div class="event Fgg">
                <div class="title">
                    <?php echo $row["title"] ?>
                </div>
            </div>
        <?php
        } else if ($sD != $fD and ($sT == $fT and $fT == "00:00")) { // Fggs
            $diff = (substr($fD, 8) - substr($sD, 8));
            ?>
            <div class="event Fggs">
                <div class="title">
                    <?php echo $row["title"] ?>
                </div>
            </div>
        <?php
                for ($i = 0; $i < $diff; $i++) { ?>
               <div class="event Fggs end-evt">
                <div class="title">
                    <?php echo $row["title"] ?>
                </div>
               </div> 
            <?php
                }
        } else if ($sD == $fD and $sT != $fT) { // NFgg ?>
            <div class="event NFgg">
                <div class="icon"></div>
                <div class="title">
                    <?php echo $sT ?>
                    <?php echo $row["title"] ?>
                </div>
            </div>
        <?php
        } else if ($sD != $fD and $sT != $fT) { // NFggs 
            $diff = (substr($fD, 8) - substr($sD, 8));
            ?>
            <div class="event NFggs">
                <div class="title">
                    <?php echo $sT ?>
                    <?php echo $row["title"] ?>
                </div>
            </div>
        <?php
                for ($i = 0; $i < $diff; $i++) { ?>
                <div class="event NFggs end-evt">
                    <div class="title">
                        <?php echo $row["title"] ?>
                    </div>
                </div>
            <?php
                }
        }
        echo "---";
    }
} ?>