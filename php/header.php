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
        </div>
    </div>
</header>