<?php
require_once 'php/conn.php';
require_once 'php/table.php';
?>
<?php
$TYPE_SETS = [
    'completo',
    'non completo',
    'non completo piu giorni',
    'completo piu giorni'
];
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
            <hr>
            <?php
        } ?>

    </div>
    <script src="script/main.js"></script>
</body>

</html>