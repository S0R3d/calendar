<?php
require_once("../php/conn.php");
$_currentDate = array(
    'Y' => $_POST['year'],
    'm' => $_POST['month'],
    'd' => $_POST['day'],
);
$start = $_currentDate['Y']."-".$_currentDate['m']."-".$_currentDate['d'];
$query = "SELECT * FROM events WHERE sDate = :start LIMIT 1";
$state = $db->prepare($query);
$state->execute(['start' => $start]);
$data = $state->fetchAll();
if (sizeof($data)) {
    ?>
    <div class="event">
        <div class="title">
            <?php echo $data[0]['title']; ?>
        </div>
    </div>
<?php
} else {
    ?>
    <div class="event"></div>
<?php
}
?>