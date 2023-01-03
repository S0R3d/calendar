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
    <!-- import header -->
    <div class="main">
        <div class="calendar month january"
            style="display: grid; grid-template-columns: repeat(7, auto); text-align: center;">
            <?php
            $sunday = 0;
            for ($i = 1; $i < convertMonth(date('m')) + 1; $i++) {

                ?>
                <div class="day<?php echo ($i % 7 == 0) ? ' sunday' : ''; ?>">
                    <?php
                    // FIXME: rimuovere query da div.day perche non tutti i giorni hanno un evento
                    // aggiungere invece numero e nome del gioni in questione fino al 31th
                    foreach ($db->query('SELECT * FROM events WHERE id='.$i.'') as $row) {
                        ?>
                        <div class=" event">
                            <div class="title">
                                <?php echo $row['title']; ?>
                            </div>
                            <div class="start">
                                Start at: <?php echo $row['start']; ?>
                            </div>
                            <div class="finish">
                                Finish at: <?php echo $row['finish']; ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <hr>
        <!-- TODO: aggiungere all'interno del calendario 'sopra' gli eventi dei giorni giusti,
                    solo del mese selezionato -->
        <!-- TODO: calendario con mese di base (di default) in base al mese corrente, usare _today -->
        <div class="events" style="display: flex; margin: 10px;">
            <?php
            foreach ($db->query('SELECT * FROM events LIMIT 3') as $row) {
                ?>
                <div class="event">
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
                <?php
            } ?>
        </div>
    </div>
    <!-- import footer -->
    <script src="script/main.js"></script>
</body>

</html>