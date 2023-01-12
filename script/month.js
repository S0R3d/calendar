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
let pageCurrentDate = [now.getFullYear(), now.getMonth() + 1];
const movingDate = {
  arr: [...pageCurrentDate, 1],
  nextDay: function () {
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
  prevDay: function () {
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
  nextMonth: function () {
    if (this.arr[1] == 12) {
      this.arr[1] = 01;
      this.arr[0] += 1;
    } else this.arr[1] += 1;
  },
  prevMonth: function () {
    if (this.arr[1] == 01) {
      this.arr[1] = 12;
      this.arr[0] -= 1;
    } else this.arr[1] -= 1;
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

function formatDays() {
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
    format.prevDay();
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
        if (!day.classList.contains("transparency"))
          day.classList.add("transparency");
      } else {
        if (day.classList.contains("transparency"))
          day.classList.remove("transparency");
        day.firstElementChild.children[1].innerHTML = dayNumb;
      }
      format.nextDay();
      thisDay = new Date(format.arr);
      if (thisDay.getMonth() == pageCurrentDate[1] - 1) isCurrentMonth = true;
      else isCurrentMonth = false;
    }
  });
  resetCurrentDate();
  resetMovingDate();
}

function bodyOnLoad() {
  formatDays();
}

// TODO: modifica al calendario in base al mese
// FIXME: non scorrono bene i mesi
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
    movingDate.nextDay();
    changeHeader();
    formatDays();
    popolate();
  });
} else console.error("Not Found Button 'Next Month'!");

// DISABLE working on rigth arrow

// const previousMonth = document.querySelector("div.left-arrow");
// if (previousMonth) {
//   previousMonth.addEventListener("click", () => {
//     if (pageCurrentDate[1] == 1) {
//       pageCurrentDate[1] = 12;
//       pageCurrentDate[0] -= 1;
//     } else {
//       pageCurrentDate[1] -= 1;
//       pageCurrentDate[0];
//     }
//     changeHeader();
//   });
// } else console.error("Not Found Button 'Previous Month'!");

// const today = document.querySelector("div.today-button");
// if (today) {
//   today.addEventListener("click", () => {
//     resetCurrentDate();
//     changeHeader();
//   });
// } else console.error("Not Found Button 'Today'");

function popolate() {
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
      movingDate.nextDay();
    }
  });
  resetCurrentDate();
  resetMovingDate();
}

/**
 * TODO: aggiungere modifiche degli eventi quando si cambia mese con i bottoni
 */
$(document).ready(function () {
  popolate();
});
