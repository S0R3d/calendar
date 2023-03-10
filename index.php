<?php
require_once '../calendar/php/conn.php';
require_once '../calendar/php/table.php';

date_default_timezone_set('Europe/Rome');
define('_today', date('l\ Y-M-d H:i:s'));
$_currentDate = array(
    'l' => date('l'),
    'd' => date('d'),
    'm' => date('m'),
    'Y' => date('Y'),
);
$daysName = array(
    0 => "Sun", 1 => "Mon", 2 => "Tue", 3 => "Wed", 4 => "Thu", 5 => "Fri", 6 => "Sat",
);
$months = array(
    '01' => "Jan", '02' => "Feb", '03' => "Mar", '04' => "Apr", '05' => "May", '06' => "Jun", '07' => "Jul", '08' => "Aug", '09' => "Sep", '10' => "Oct", '11' => "Nov", '12' => "Dec",
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../calendar/img/calendar.svg" type="image/x-icon">
    <title>Tommi's Calendar</title>
    <link rel="stylesheet" href="../calendar/style/main.css">
</head>
<body onload="bodyOnLoad()">
    <div class="main">
        <?php include('../calendar/php/header.php'); ?>

        <div class="calendar month">
            <!-- IMPORTANTE IN QUESTA SEZIONE SI ESEGUONO SCRIPT JS  -->
            <?php
            for ($i = 1; $i < 42 + 1; $i++) {
                include('../calendar/php/day.php');
            }
            ?>
        </div>
        <?php include('../calendar/php/footer.php'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../calendar/script/jquery-3.6.3.js"><\/script>');
    </script>
    <script src="../calendar/script/month.js"></script>
    <script src="../calendar/script/header.js"></script>
</body>
</html>