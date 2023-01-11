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
// parte dal mese e anno corrente si puo muovere in base alle freccie della pagina
let pageCurrentDate = [now.getFullYear(), now.getMonth() + 1];
// parte dal primo del mese corrente, si muove per lavorare
const movingDate = {
  arr: [...pageCurrentDate, 1],
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

function resetCurrentDate() {
  pageCurrentDate = [now.getFullYear(), now.getMonth() + 1];
}
function resetMovingDate() {
  movingDate.arr = [...pageCurrentDate, 1];
}

function changeHeader() {
  const monthYear = document.querySelector("div.header-month.header-year");
  monthYear.innerHTML =
    `${months[pageCurrentDate[1] - 1]}` + " " + `${pageCurrentDate[0]}`;
}
changeHeader();

// TODO: eseguire questa funzione insieme agli script php per gli eventi
function daysGenerator() {
  const days = document.querySelectorAll("div.day");
  days.forEach((day) => {
    const dayName = day.id;
    let inner = day.firstElementChild.children[0].innerHTML;
    if (inner == "") day.firstElementChild.children[0].innerHTML = dayName;
  });

  const format = movingDate;
  let isCurrentMonth = true;
  let thisDay = new Date(format.arr);
  while (thisDay.getDay() != 1) {
    isCurrentMonth = false;
    format.prev();
    thisDay = new Date(format.arr);
  }

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
      if (thisDay.getMonth() == pageCurrentDate[1] - 1) isCurrentMonth = true;
      else isCurrentMonth = false;
    }
  });
  resetCurrentDate();
  resetMovingDate();
}

function bodyOnLoad() {
  daysGenerator();
}

// FIXME: rimuovere ridondanze
// TODO: cambio mese in griglia al click
const nextMonth = document.querySelector("div.right-arrow");
if (nextMonth) {
  nextMonth.addEventListener("click", () => {
    if (pageCurrentDate[1] == 12) {
      pageCurrentDate[1] = 1;
      pageCurrentDate[0] += 1;
    } else {
      pageCurrentDate[1] += 1;
      pageCurrentDate[0];
    }
    changeHeader();
  });
} else console.error("Not Found Button 'Next Month'!");

const previousMonth = document.querySelector("div.left-arrow");
if (previousMonth) {
  previousMonth.addEventListener("click", () => {
    if (pageCurrentDate[1] == 1) {
      pageCurrentDate[1] = 12;
      pageCurrentDate[0] -= 1;
    } else {
      pageCurrentDate[1] -= 1;
      pageCurrentDate[0];
    }
    changeHeader();
  });
} else console.error("Not Found Button 'Previous Month'!");

const today = document.querySelector("div.today-button");
if (today) {
  today.addEventListener("click", () => {
    resetCurrentDate();
    changeHeader();
  });
} else console.error("Not Found Button 'Today'");

/**
 * TODO: usare AJAX con jquery
 * modificare il calendario cambiano i giorni in base al mese selezionato in 'pageCurrentDate[0]'
 * modificare gli eventi all'interno del calendario in base ai nuovi giorni e al nuovo mese
 * scrivere script query per prendere gli eventi dal db
 */
$(document).ready(function () {
  const days = Object.values(document.querySelectorAll("div.day"));
  days.forEach((day) => {
    if (!day.classList.contains("transparency")) {
      let d = movingDate.arr[2];
      let m = movingDate.arr[1];
      let y = movingDate.arr[0];
      $.ajax({
        type: "POST",
        url: "php/loadData.php",
        data: {
          day: d,
          month: m,
          year: y,
        },
        success: function (response) {
          day.innerHTML += response;
        },
      });
      movingDate.next();
    }
  });
  resetCurrentDate();
  resetMovingDate();
});
