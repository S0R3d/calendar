<header>
    <div class="logo">
        <?php include("./img/calendar.svg") ?>
        <span>Calendar</span>
    </div>
    <div class="btn">
        <div class="today-btn">
            <button>
                <span>today</span>
            </button>
        </div>
        <div class="left-ar">
            <button>
                <span>
                    < </span>
            </button>
        </div>
        <div class="right-ar">
            <button>
                <span> > </span>
            </button>
        </div>
    </div>
    <div class="header-month header-year">
        <span>
            <?php echo Date('M-Y'); ?>
        </span>
    </div>
    <div class="add-event">
        <button class="b-event">+</button>
    </div>
</header>