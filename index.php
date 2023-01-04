<?php
require_once 'php/conn.php';
require_once 'php/table.php';
?>
<?php
date_default_timezone_set('Europe/Rome');
define('_today', date('l\ Y-M-d H:i:s'));
$TYPE_SETS = [
    'completo',
    'non completo',
    'non completo piu giorni',
    'completo piu giorni'
];
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
</head>
<body>
    <!-- import header -->
    <?php include('php/header.php'); ?>

    <div class="main">
        <div class="calendar">
            <!-- TODO: creare una funzione php che generi i mesi con i giorni e all interno gli eventi, 
                        seguire le specifiche corrette per la manipolazione tramite js-->
            <!-- TODO: gli eventi gia presenti nel db comè che sono inseriti dei giorni? -->

            <!-- <div class="month january"
                style="display: grid; grid-template-columns: repeat(7,auto); text-align: center;">
                <div class="day 01">
                    <div class="day-name">Mon</div>
                    <div class="day-numb">01</div>
                </div>
                <div class="day 02">
                    <div class="day-name">Tue</div>
                    <div class="day-numb">02</div>
                </div>
                <div class="day">Wed 03</div>
                <div class="day">Thu 04</div>
                <div class="day">Fri 05</div>
                <div class="day">Sat 06</div>
                <div class="day sunday">Sun 07</div>
                <div class="day 08">
                    <div class="day-name">Mon</div>
                    <div class="day-numb">08</div>
                </div>
                <div class="day">Tue 09</div>
                <div class="day">Wed 10</div>
                <div class="day">Thu 11</div>
                <div class="day">Fri 12</div>
                <div class="day">Sat 13</div>
                <div class="day sunday">Sun 14</div>
                <div class="day 15">
                    <div class="day-name">Mon</div>
                    <div class="day-numb">15</div>
                </div>
                <div class="day">Tue</div>
                <div class="day">Wed</div>
                <div class="day">Thu</div>
                <div class="day">Fri</div>
                <div class="day">Sat</div>
                <div class="day sunday">Sun</div>
                <div class="day 22">
                    <div class="day-name">Mon</div>
                    <div class="day-numb">22</div>
                </div>
                <div class="day">Tue</div>
                <div class="day">Wed</div>
                <div class="day">Thu</div>
                <div class="day">Fri</div>
                <div class="day">Sat 27</div>
                <div class="day sunday">Sun 28</div>
                <div class="day 29">
                    <div class="day-name">Mon</div>
                    <div class="day-numb">29</div>
                </div>
                <div class="day">Tue 30</div>
                <div class="day">Wed 31</div>
            </div> -->
        </div>
        <hr>


        <!-- <div class="calendar month <?php ?>"
            style="display: grid; grid-template-columns: repeat(7, auto); text-align: center;">
            <?php
            // for ($i = 1; $i < convMonthinDays(date('m')) + 1; ++$i) {
            ?>
                <div class="day<?php //echo ($i % 7 == 0) ? ' sunday' : ''; ?>">Day
                    <?php //echo $i; ?>
                </div>
            <?php
            // }
            ?>
        </div> -->
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
    <?php include('php/footer.php'); ?>
    <script src="script/main.js"></script>
    <script src="script/month.js"></script>
</body>
</html>