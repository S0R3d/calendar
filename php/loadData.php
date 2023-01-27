<?php
require_once("conn.php");
$date = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$limit = (int) $_POST['limit'];

// $firstOfAll = array(1 => $_POST);

$query1 = "SELECT count(`id`) FROM `events` WHERE `sDate` = :date";
$state1 = $db->prepare($query1);
$state1->execute(['date' => $date]);
$res = $state1->fetch();
$count = $res[0];
// if (sizeof($res))
//     array_unshift($firstOfAll, $count);
// echo json_encode($firstOfAll);

if ($count > $limit) {
    // mandare solo 2 elementi piu il blocco other
    --$limit;
}

$query = "SELECT * FROM `events` WHERE `sDate` = :date LIMIT :limit";
$state = $db->prepare($query);
$state->bindParam('date', $date, PDO::PARAM_STR);
$state->bindParam('limit', $limit, PDO::PARAM_INT);
$state->execute();
$rtrn = $state->fetchAll();
if (sizeof($rtrn)) {
    foreach ($rtrn as $i => $row) {
        $sD = $row['sDate'];
        $fD = $row['fDate'];
        $sT = substr($row['sTime'], 0, strlen($row['sTime']) - 3);
        $fT = substr($row['fTime'], 0, strlen($row['fTime']) - 3);

        if ($sD == $fD and ($sT == $fT and $fT == "00:00")) { // Fgg ?>
            <div class="event Fgg" event-id="<?php echo $row["id"]?>">
                <div class="title">
                    <?php echo $row["title"] ?>
                </div>
            </div>
        <?php
        } else if ($sD != $fD and ($sT == $fT and $fT == "00:00")) { // Fggs
            $diff = (substr($fD, 8) - substr($sD, 8));
            ?>
            <div class="event Fggs" event-id="<?php echo $row["id"]?>">
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
            <div class="event NFgg" event-id="<?php echo $row["id"]?>">
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
            <div class="event NFggs" event-id="<?php echo $row["id"]?>">
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
    if ($limit == 2 && $count > 3) { ?>
        <div class="other-evt">Altri <?php echo $count-$limit?></div>
    <?php
        echo "---";
    }
} ?>