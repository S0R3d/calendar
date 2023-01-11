<?php
require_once("../php/conn.php");
$start = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$query = "SELECT * FROM events WHERE sDate = :start ";
$state = $db->prepare($query);
$state->execute(['start' => $start]);
$data = $state->fetchAll();
if (sizeof($data)) {
    for ($i = 0; $i < count($data); $i++) {
        ?>
        <div class="event">
            <div class="title">
                <?php echo $data[0]['title']; ?>
            </div>
        </div>
    <?php
    }
} else {
    ?>
    <div class="event"></div>
<?php
}
?>