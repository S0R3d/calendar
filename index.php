<?php
require_once 'php/conn.php';
require_once 'php/table.php';

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
    "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December",
);
function convMonthinDays(string $month): int {
    switch ($month) {
        case 'Gennaio' || 'January' || 'Jen' || '1' || '01':
            return 31;
        case 'Febbrario' || 'February' || 'Feb' || '2' || '02':
            return 28;
        case 'Marzo' || 'March' || 'Mar' || '3' || '03':
            return 31;
        case 'Aprile' || 'April' || 'Apr' || '4' || '04':
            return 30;
        case 'Maggio' || 'May' || '5' || '05':
            return 31;
        case 'Giugno' || 'June' || 'Jun' || '6' || '06':
            return 30;
        case 'Luglio' || 'July' || 'Jul' || '7' || '07':
            return 31;
        case 'Agosto' || 'August' || 'Aug' || '8' || '08':
            return 31;
        case 'Settembre' || 'September' || 'Sep' || '9' || '09':
            return 30;
        case 'Ottobre' || 'October' || 'Oct' || '10':
            return 31;
        case 'Novembre' || 'November' || 'Nov' || '11':
            return 30;
        case 'Dicembre' || 'December' || 'Dec' || '12':
            return 31;
        default:
            return 1;
    }
}
function translateDays($day): string {
    switch ($day):
        case 'Monday' or 'monday':
            return 'Lunedi';
        case 'Tuesday' or 'tuesday':
            return 'Martedi';
        case 'Wednsday' or 'wensday':
            return 'Mercoledi';
        case 'Thursday' or 'thursday':
            return 'Giovedi';
        case 'Friday' or 'friday':
            return 'Venerdi';
        case 'Saturday' or 'saturday':
            return 'Sabato';
        case 'Sunday' or 'sunday':
            return 'Domenica';
        default:
            throw new ErrorException('Transaltion error!');
    endswitch;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tommi's Calendar</title>

    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <!-- <script src="script/jquery-3.6.3.js"></script> -->
    <link rel="stylesheet" href="style/main.css">
</head>
<body onload="bodyOnLoad()">
    <div class="main">
        <?php include('php/header.php'); ?>

        <div class="calendar month">
            <!-- TODO: rimuovere il nome dei giorni dai riquadri e fare una riga in alto solo per loro -->
            <!-- <div class="dayNames"></div> -->

            <!-- FIXME: modificare gli eventi in base al mese/anno selezionato-->
            <!-- TODO: aggiungere script per gli eventi -->
            <!-- <div class="month"> -->
            <!-- IMPORTANTE IN QUESTA SEZIONE SI EGEUONO SCRIPT JS  -->
            <?php
            for ($i = 1; $i < 42 + 1; $i++) {
                include('php/day.php');
            }
            ?>
            <!-- </div> -->
        </div>

        <?php include('php/footer.php'); ?>
    </div>

    <script src="script/month.js"></script>
</body>
</html>