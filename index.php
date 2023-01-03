<?php
require_once 'php/conn.php';
require_once 'php/table.php';
?>
<?php
date_default_timezone_set('Europe/Rome');
define('_today', date('l\ Y-m-d H:i:s'));
$TYPE_SETS = [
    'completo',
    'non completo',
    'non completo piu giorni',
    'completo piu giorni'
];
function convertMonth($month): int {
    switch ($month) {
        case 'Gennaio' || '1' || '01':
            return 31;
        case 'Febbrario' || '2' || '02':
            return 28;
        case 'Marzo' || '3' || '03':
            return 31;
        case 'Aprile' || '4' || '04':
            return 30;
        case 'Maggio' || '5' || '05':
            return 31;
        case 'Giugno' || '6' || '06':
            return 30;
        case 'Luglio' || '7' || '07':
            return 31;
        case 'Agosto' || '8' || '08':
            return 31;
        case 'Settembre' || '9' || '09':
            return 30;
        case 'Ottobre' || '10':
            return 31;
        case 'Novembre' || '11':
            return 30;
        case 'Dicembre' || '12':
            return 31;
        default:
            return 1;
    }
}
function translateDay($day): string {
    switch ($day):
        case 'Monday' or 'monday':
            return 'Lunedi';
        case 'Tuesday' or 'tuesday':
            return 'Martedi';
        case 'Wensday' or 'wensday':
            return 'Mercoledi';
        case 'Thusday' or 'thusday':
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
</head>

<body>
    <div class="main">
        <div class="calendar month january"
            style="display: grid; grid-template-columns: repeat(7, auto); text-align: center;">
            <?php
            $sunday = 1;
            for ($i = 0; $i < convertMonth(date('m')); $i++) {
                if ($sunday == 7) {
                    ?>
                    <div class="day sunday" style="color: red;">ciao</div>
                    <?php
                    $sunday = 1;
                } else {
                    ++$sunday;
                    ?>
                    <div class="day">ciao</div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="events" style="display: flex; margin: 10px;">
            <?php
            foreach ($db->query('SELECT * FROM events LIMIT 3') as $row) {
                ?>
                <div class="event" style="margin: 5px;">
                    <div class="title">
                        <?php echo $row['title']; ?>
                    </div>
                    <div class="start">
                        Start time: <?php echo $row['start']; ?>
                    </div>
                    <div class="finish">
                        Finish time: <?php echo $row['finish']; ?>
                    </div>
                </div>
                <!-- <hr> -->
                <?php
            } ?>
        </div>
    </div>
    <script src="script/main.js"></script>
</body>

</html>