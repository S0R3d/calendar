<?php
require_once 'php/conn.php';
require_once 'php/table.php';

date_default_timezone_set('Europe/Rome');
define('_today', date('l\ Y-M-d H:i:s'));
$_currentDate = array(
    'Y' => date('Y'),
    'm' => date('m')
);
$months = array(
    "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December",
);
$TYPE_SETS = array(
    'completo',
    'non completo',
    'non completo piu giorni',
    'completo piu giorni'
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
    <link rel="stylesheet" href="style/main.css">
    <!-- <script src="script/jquery-3.6.3.slim.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
</head>
<body>
    <!-- import header -->
    <?php include('php/header.php'); ?>

    <div class="main">
        <div class="calendar">
            <!-- TODO: modificare gli eventi in base al mese/anno selezionato-->
            <div class="month <?php echo $months[$_currentDate['m'] - 1] ?>"
                style="display: grid; grid-template-columns: repeat(7, auto); text-align: center;">
                <?php
                for ($i = 1; $i < convMonthinDays(date('m')) + 1; ++$i) {
                    ?>
                    <div class="day<?php echo ($i % 7 == 0) ? ' sunday' : ''; ?>">
                        <?php
                        $start = $_currentDate['Y']."-".$_currentDate['m']."-".$i;
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
                            day <?php echo $i; ?>
                            <div class="event"></div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <hr>
        <!-- TODO: calendario con mese di base (di default) in base al mese corrente, usare _today -->
        <div class="events" style="display: flex; margin: 10px;">
            <?php
            foreach ($db->query('SELECT * FROM events LIMIT 3') as $row) {
                ?>
                <div class="event" style="text-align: center;">
                    <div class="title">
                        <?php echo $row['title']; ?>
                    </div>
                    <div class="start-at">
                        Start at:
                        <div class="date">
                            <?php echo $row['sDate']; ?>
                        </div>
                        <div class="time">
                            <?php echo $row['sDate']; ?>
                        </div>
                    </div>
                    <div class="finish-at">
                        Finish at:
                        <div class="date">
                            <?php echo $row['fDate']; ?>
                        </div>
                        <div class="time">
                            <?php echo $row['fDate']; ?>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
    <!-- import footer -->
    <?php include('php/footer.php'); ?>

    <script src="script/main.js"></script>
    <script src="script/month.js"></script>
</body>
</html>