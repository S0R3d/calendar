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
const monthShort = [
  "Jan",
  "Feb",
  "Mar",
  "Apr",
  "May",
  "Jun",
  "Jul",
  "Aug",
  "Sep",
  "Oct",
  "Nov",
  "Dec",
];
const monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
/**
 * [0]: return current page year
 *
 * [1]: return current page month
 */
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
    if (this.arr[2] == 01 && [2, 4, 6, 8, 9, 11, 1].includes(this.arr[1])) {
      this.arr[2] = 31;
      this.arr[1] -= 1;
      if (this.arr[1] < 1) {
        this.arr[1] = 12;
        this.arr[0] -= 1;
      }
    } else if (this.arr[2] == 01 && [5, 7, 10, 12].includes(this.arr[1])) {
      this.arr[2] = 30;
      this.arr[1] -= 1;
      if (this.arr[1] < 1) {
        this.arr[1] = 12;
        this.arr[0] -= 1;
      }
    } else if (this.arr[2] == 01 && this.arr[1] == 3) {
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
  getDay: function () {
    return this.arr[2];
  },
  getMonth: function () {
    return this.arr[1];
  },
};

function resetCurrentDate() {
  pageCurrentDate = [now.getFullYear(), now.getMonth() + 1];
}
function resetMovingDate() {
  movingDate.arr = [...pageCurrentDate, 1];
}

function formatDays() {
  const days = document.querySelectorAll("div.day");
  days.forEach((day) => {
    const dayName = day.id;
    let inner = day.firstElementChild.children[0].innerHTML;
    if (inner == "") day.firstElementChild.children[0].innerHTML = dayName;
  });

  // FIXME: con una copia in questo modo alla modifica di 'first' di modifica anche 'movingDate'
  const first = movingDate;
  let isCurrentMonth = true;
  let thisDay = new Date(first.arr);
  while (thisDay.getDay() != 1) {
    isCurrentMonth = false;
    first.prevDay();
    thisDay = new Date(first.arr);
  }

  days.forEach((day) => {
    fillMonth(day, first.getMonth());
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
      first.nextDay();
      thisDay = new Date(first.arr);
      if (thisDay.getMonth() == pageCurrentDate[1] - 1) isCurrentMonth = true;
      else isCurrentMonth = false;
    }
  });
  pastDay(days);
  resetMovingDate();
}

function fillMonth(day, month) {
  const arr = day.className.split(" ");
  if (monthShort.some((el) => arr.includes(el))) {
    let index = arr.findIndex((el) => monthShort.includes(el));
    day.classList.replace(day.classList[index], monthShort[month - 1]);
  } else day.classList.add(monthShort[month - 1]);
}

function bodyOnLoad() {
  formatDays();
}

function fillDays() {
  const days = document.querySelectorAll("div.day");
  days.forEach((day, key, arr) => {
    // if (day.classList.contains("transparency")) {
    //   while (day.childElementCount != 1)
    //     day.removeChild(day.lastElementChild);
    // }
    if (day.classList.contains(monthShort[now.getMonth()])) {
      let d = movingDate.arr[2];
      let m = movingDate.arr[1];
      let y = movingDate.arr[0];
      $.ajax({
        type: "POST",
        url: "../php/loadData.php",
        data: {
          year: y,
          month: m,
          day: d,
          // TODO: aggiungere il limite di chiamata della SELECT in base a quanti posti liberi rimangano del rigquadro (max 3 eventi)
        },
        success: function (r) {
          // for (let i = 0; i < day.children.length; i++) {
          //   const node = day.children[i];
          //   if (node.classList.contains("event")) {
          //     node.parentNode.removeChild(node);
          //     --i;
          //   }
          // }
          let a = r.split(" ").filter((e) => {
            return e;
          });
          let b = a;
          while (b.includes("---")) {
            let y = key;
            let index_end_event = b.indexOf("---");
            let evt = b.splice(0, index_end_event + 1);
            evt.splice(-1, 1);
            let $thisDay = arr[key];
            let next = arr[++y];
            while (evt.includes('end-evt">\n')) {
              if (
                $thisDay.childElementCount - 1 != next.childElementCount - 1 &&
                Math.abs($thisDay.childElementCount - next.childElementCount) >
                  1
              ) {
                next.append($('<div class="event"></div>')[0]);
                next.innerHTML += evt
                  .splice(evt.lastIndexOf('end-evt">\n') - 3)
                  .join(" ");
              } else {
                arr[y].innerHTML += evt
                  .splice(evt.lastIndexOf('end-evt">\n') - 3)
                  .join(" ");
              }
              $thisDay = arr[y];
              next = arr[++y];
            }
            let childArr = Array.from($thisDay.children).find((child) => {
              return child.classList.contains("end-evt");
            });
            if (childArr) childArr.classList.add("last-evt");
            let dayArr = Array.from(day.children).find((e) => {
              return e.className == "event";
            });
            if (dayArr) {
              dayArr.outerHTML = evt.join(" ");
            } else day.innerHTML += evt.join(" ");
          }
        },
      });
      movingDate.nextDay();
    } else {
      while (day.childElementCount != 1) {
        day.removeChild(day.lastElementChild);
      }
    }
  });
  resetMovingDate();
}

function pastDay(days) {
  let y = now.getFullYear();
  let yCurr = pageCurrentDate[0];
  days.forEach((day) => {
    if (yCurr < y) {
      if (!day.classList.contains("transparency"))
        day.classList.add("transparency");
    } else if (yCurr == y) {
      if (day.classList.contains(monthShort[now.getMonth()]))
        if (day.children[0].lastElementChild.innerHTML < now.getDate())
          if (!day.classList.contains("transparency"))
            day.classList.add("transparency");
    } else console.error("Years check error (pastDay)");
  });
}

$(document).ready(function () {
  fillDays();
});
