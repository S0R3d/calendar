<header>
    <div class="logo">
        <?php include("./img/calendar.svg") ?>
        <span>Calendar</span>
    </div>
    <div class="btn">
        <div class="today-btn">
            <button class="btn-today">today</button>
        </div>
        <div class="left-ar">
            <button class="btn-arrow-left">
                < </button>
        </div>
        <div class="right-ar">
            <button class="btn-arrow-right">
                > </button>
        </div>
    </div>
    <div class="header-month header-year">
        <span>
            <?php echo Date('M-Y'); ?>
        </span>
    </div>
    <div class="add-event dropdown">
        <button class="btn-add-event">+</button>
        <div class="dropdown-content">
            <form action="/" method="post" class="fDB" target="_blank">

                <div class="title">
                    <label class="title" for="fname">Titolo dell' evento:</label><br>
                    <input class="title" type="text" id="fname" name="title" value="" required><br>
                </div>

                <div class="sDate">
                    <label for="fsdate">Data di inizio: </label><br>
                    <input type="date" id="fsdate" name="sDate" value="" required><br>
                </div>

                <div class="fDate">
                    <label for=" ffdate">Data di fine: </label><br>
                    <input type="date" id="ffdate" name="fDate" value="" required><br>
                </div>

                <div class="fullDay">
                    <input type="checkbox" name="allDay" id="allDay">
                    <label for="allDay">Tutto il giorno</label><br>
                </div>

                <div class="sTime">
                    <label for="fstime">Orario di inizio: </label><br>
                    <input type="time" id="fstime" name="sTime" value=""><br>
                </div>

                <div class="fTime">
                    <label for="fftime">Orario di fine: </label><br>
                    <input type="time" id="fftime" name="fTime" value=""><br>
                </div>

                <input type="submit" value="Add Event">
            </form>
        </div>
    </div>
</header>