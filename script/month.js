const now = new Date();
console.log(now.toDateString());
const daysName = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];
const monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

/**
 *
 */
Array.prototype.toString = function () {
  if (
    this.length == 2 &&
    typeof this[0] == "number" &&
    typeof this[1] == "number"
  )
    return months[this[1] - 1] + " " + this[0];
  else return this.join();
};
let pageCurrentMonthYear = [now.getFullYear(), now.getMonth() + 1];

function changeHeaderMonthYear() {
  const monthYear = document.querySelector("div.header-month.header-year");
  monthYear.innerHTML = `${pageCurrentMonthYear}`;
}
changeHeaderMonthYear();

// Non utilizzata
function loadCalendar() {
  const calendar = document.querySelector("div.calendar");
  const month = document.createElement("div");
  month.className = "month " + months[pageCurrentMonthYear[0]];
  month.style =
    "display: grid; grid-template-columns: repeat(7,auto); text-align: center;";
  for (let i = 1; i < monthDays[pageCurrentMonthYear[0]] + 1; ++i) {
    const day = document.createElement("div");
    day.className = i % 7 == 0 ? "day sunday" : "day";
    day.innerHTML = `${i}`;
    month.appendChild(day);
  }
  calendar.appendChild(month);
}

// TODO: riempire le caselle della grid con il nome e il numero del giorno
//        nella posizione corretta (casella identificata con numero in 'id')
function dayNameGenerator() {
  const days = document.querySelectorAll("div.day");
  days.forEach((day) => {
    const dayName = day.id;
    let inner = day.firstElementChild.children[0].innerHTML;
    if (inner == "") day.firstElementChild.children[0].innerHTML = dayName;
  });

  const format = {
    arr: [...pageCurrentMonthYear, 1],

    /**
     * Move to the next day of the month
     */
    next: function () {
      if (
        (this.arr[2] == 31 && [1, 3, 5, 7, 8, 10, 12].includes(this.arr[1])) ||
        (this.arr[2] == 30 && [4, 6, 9, 11].includes(this.arr[1])) ||
        (this.arr[2] == 28 && this.arr[1] == 2)
      ) {
        this.arr[2] = 1;
        this.arr[1] += 1;
        if (this.arr[1] > 12) {
          this.arr[1] = 1;
          this.arr[0] += 1;
        }
      } else this.arr[2] += 1;
    },
    /**
     * Move to the previous day of the month
     */
    prev: function () {
      if (this.arr[2] == 01 && [1, 3, 5, 7, 8, 10, 12].includes(this.arr[1])) {
        this.arr[2] = 31;
        this.arr[1] -= 1;
        if (this.arr[1] < 1) {
          this.arr[1] = 12;
          this.arr[0] -= 1;
        }
      } else if (this.arr[2] == 01 && [4, 6, 9, 11].includes(this.arr[1])) {
        this.arr[2] = 30;
        this.arr[1] -= 1;
        if (this.arr[1] < 1) {
          this.arr[1] = 12;
          this.arr[0] -= 1;
        }
      } else if (this.arr[2] == 28 && this.arr[1] == 2) {
        this.arr[2] = 28;
        this.arr[1] -= 1;
        if (this.arr[1] < 1) {
          this.arr[1] = 12;
          this.arr[0] -= 1;
        }
      } else this.arr[2] -= 1;
    },
  };

  let isCurrentMonth = true;

  let thisDay = new Date(format.arr);
  while (thisDay.getDay() != 1) {
    isCurrentMonth = false;
    format.prev();
    thisDay = new Date(format.arr);
  }

  // here
  days.forEach((day) => {
    let numberOfWeek = thisDay.getDay();
    let dayNumb = thisDay.getDate();
    const dayName = day.id;
    if (dayName == daysName[numberOfWeek]) {
      if (!isCurrentMonth) {
        day.firstElementChild.children[1].innerHTML =
          dayNumb + " " + thisDay.toDateString().substring(4, 7);
        day.className += " transparency";
      } else day.firstElementChild.children[1].innerHTML = dayNumb;
      format.next();
      thisDay = new Date(format.arr);
      if (thisDay.getMonth() == pageCurrentMonthYear[1] - 1)
        isCurrentMonth = true;
      else isCurrentMonth = false;
    }
  });
}

/**
 * This function running on 'onLoad' attribute inside body HTML tag
 */
function bodyOnLoad() {
  dayNameGenerator();
}

// FIXME: rimuovere ridondanze
// TODO: cambio mese in griglia al click
const nextMonth = document.querySelector("div.right-arrow");
if (nextMonth) {
  nextMonth.addEventListener("click", () => {
    if (pageCurrentMonthYear[1] == 12) {
      pageCurrentMonthYear[1] = 1;
      pageCurrentMonthYear[0] += 1;
    } else {
      pageCurrentMonthYear[1] += 1;
      pageCurrentMonthYear[0];
    }
    changeHeaderMonthYear();
  });
} else console.error("Not Found Button 'Next Month'!");

const previousMonth = document.querySelector("div.left-arrow");
if (previousMonth) {
  previousMonth.addEventListener("click", () => {
    if (pageCurrentMonthYear[1] == 1) {
      pageCurrentMonthYear[1] = 12;
      pageCurrentMonthYear[0] -= 1;
    } else {
      pageCurrentMonthYear[1] -= 1;
      pageCurrentMonthYear[0];
    }
    changeHeaderMonthYear();
  });
} else console.error("Not Found Button 'Previous Month'!");

const today = document.querySelector("div.today-button");
if (today) {
  today.addEventListener("click", () => {
    pageCurrentMonthYear = [now.getFullYear(), now.getMonth() + 1];
    changeHeaderMonthYear();
  });
} else console.error("Not Found Button 'Today'");

/**
 * TODO: usare AJAX con jquery
 * modificare il calendario cambiano i giorni in base al mese selezionato in 'pageCurrentMonthYear[0]'
 * modificare gli eventi all'interno del calendario in base ai nuovi giorni e al nuovo mese
 * scrivere script query per prendere gli eventi dal db
 */
// Run after load
$(document).ready(function () {});
