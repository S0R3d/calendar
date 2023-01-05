const now = new Date();
const months = [
  "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December",
];
const monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

Array.prototype.toString = function () {
  if (this.length == 2 && typeof this[0] == "number" && typeof this[1] == "number")
    return months[this[0]] + " " + this[1];
  else return this.join();
}
let pageCurrentMonthYear = [now.getMonth(), now.getFullYear()];

// insert month and year in header section
function changeHeaderMonthYear() {
  const monthYear = document.querySelector("div.month.year");
  monthYear.innerHTML = `${pageCurrentMonthYear}`;
}
changeHeaderMonthYear();

// loading page with corrent month
function loadCalendar() {
  const calendar = document.querySelector("div.calendar");
  const month = document.createElement("div");
  month.className = "month " + months[pageCurrentMonthYear[0]];
  month.style = "display: grid; grid-template-columns: repeat(7,auto); text-align: center;";
  for (let i = 1; i < monthDays[pageCurrentMonthYear[0]] + 1; ++i) {
    const day = document.createElement("div");
    day.className = i % 7 == 0 ? "day sunday" : "day";
    day.innerHTML = `${i}`;
    month.appendChild(day);
  }
  calendar.appendChild(month);
}

// FIXME: rimuovere ridondanze 
const nextMonth = document.querySelector("div.right-arrow");
if (nextMonth) {
  nextMonth.addEventListener("click", () => {
    if (pageCurrentMonthYear[0] == 11) {
      pageCurrentMonthYear[0] = 0;
      pageCurrentMonthYear[1] += 1;
    } else {
      pageCurrentMonthYear[0] += 1;
      pageCurrentMonthYear[1];
    }
    changeHeaderMonthYear();
  });
} else console.error("Not Found Button 'Next Month'!");

const previousMonth = document.querySelector("div.left-arrow");
if (previousMonth) {
  previousMonth.addEventListener("click", () => {
    if (pageCurrentMonthYear[0] == 0) {
      pageCurrentMonthYear[0] = 11;
      pageCurrentMonthYear[1] -= 1;
    } else {
      pageCurrentMonthYear[0] -= 1;
      pageCurrentMonthYear[1];
    }
    changeHeaderMonthYear();
  });
} else console.error("Not Found Button 'Previous Month'!");

const today = document.querySelector("div.today-button");
if (today) {
  today.addEventListener("click", () => {
    pageCurrentMonthYear = [now.getMonth(), now.getFullYear()];
    changeHeaderMonthYear();
  })
} else console.error("Not Found Button 'Today'");

/**
 * TODO: usare AJAX con jquery
 * modificare il calendario cambiano i giorni in base al mese selezionato in 'pageCurrentMonthYear[0]'
 * modificare gli eventi all'interno del calendario in base ai nuovi giorni e al nuovo mese
 * scrivere script query per prendere gli eventi dal db
 */
$(document).ready(function () {

});