const now = new Date();
console.log(now.toDateString());
const MAX_EVENT = 3;
const MAX_CHILD_IN_DAY = 4;
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
  getYear: function () {
    return this.arr[0];
  },
  toString: function () {
    return `${this.getYear()}-${this.getMonth()}-${this.getDay()}`;
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

function removeTrash(day) {
  while (day.childElementCount != 1) {
    day.removeChild(day.lastElementChild);
  }
}

function fillDays() {
  const days = document.querySelectorAll("div.day");
  days.forEach((day, key, arr) => {
    removeTrash(day);
    if (day.classList.contains(monthShort[pageCurrentDate[1] - 1])) {
      let d = movingDate.getDay();
      let m = movingDate.getMonth();
      let y = movingDate.getYear();
      $.ajax({
        method: "POST",
        url: "../php/loadData.php",
        data: {
          year: y,
          month: m,
          day: d,
          // FIXME: change limit in base alla disponibilità del day
          // limit: 3 - (day.childElementCount - 1),
          limit: 3,
        },
        success: (r) => {
          if (!r) return;
          let w = r.split("---");
          w.pop();
          if (w.length > MAX_EVENT) {
            const r = w.length - (MAX_EVENT - 1);
            let other = '<div class="other-evt">Altri ' + r + "</div>";
            do {
              w.pop();
            } while (w.length > MAX_EVENT - 1);
            w.push(other);
          }
          // else if (w.length <= MAX_EVENT) {
          //   // Numero entro il limite non serve other-evt
          // }
          w.forEach((elW) => {
            let yInd = key;
            let thisDay = arr[key];
            let next = arr[++yInd];
            // FIXME: Sostituire SEMPRE gli eventi vuoti se possibile (magari con eventi NFgg o Fgg)
            // while (elW.includes("end-evt")) {
            //   let ind = elW.lastIndexOf("end-evt");
            //   while (ind >= 0) {
            //     if (elW[ind] == "<") break;
            //     --ind;
            //   } // index dell'ultimo end-evt

            //   /* WORK HERE */
            //   // bug: se ci sono inserimenti dal giorno prima non ha piu il giusto effetto
            //   // bug: se l'evento lungo è nell'ulitmo slot cioè il 3 evento, ma nella casella succesiva cè other-evt che si fa?, anche con il nuovo design non va bene
            //   let diff = Math.abs(
            //     thisDay.childElementCount - next.childElementCount
            //   );
            //   if (thisDay.childElementCount != next.childElementCount) {
            //     // FIXME: EVENTI VUOTI DISATTIVATI PER BUG
            //     // TODO: DA SOSTITUIRE il metodo di utilizzo degli eventi vuoti per 'abbassare eventi aggiunti a giorni succ.'
            //     // max eventi vuoti 2
            //     // if (diff > 2) diff = 1;
            //     // for (let i = 1; i < diff; i++)
            //     //   next.append($('<div class="event empty-evt"></div>')[0]);
            //     let adding = elW.substring(ind, elW.length);
            //     next.innerHTML += adding;
            //     elW = elW.replace(adding, "");
            //   } else {
            //     let adding = elW.substring(ind, elW.length);
            //     arr[yInd].innerHTML += adding;
            //     elW = elW.replace(adding, "");
            //   }
            //   thisDay = arr[yInd];
            //   next = arr[++yInd];
            //   /* WORK HERE */
            // }
            let dayArr = Array.from(day.children).find((e) => {
              return e.className == "event";
            });
            if (dayArr) dayArr.outerHTML = elW;
            else day.innerHTML += elW;
          });
        },
        complete: () => {
          let nChild = day.childElementCount;
          if (nChild <= 4) return;

          let dif = nChild - MAX_CHILD_IN_DAY;
          let oe = '<div class="other-evt">Altri ' + dif + "</div>";
          while (day.childElementCount > MAX_CHILD_IN_DAY - 1) {
            day.removeChild(day.children[day.childElementCount - 1]);
          }
          day.append($(oe)[0]);
        },
      });
      movingDate.nextDay();
    } else {
      removeTrash(day);
    }
  });
  resetMovingDate();
}

/**
 * Upgrade events in a specific day, with
 * @param {HTMLDivElement | Element | Node | object} day
 */
// TODO: aggiornamento del 'day' in cui si elimina il giorno ma senza rimuovere dalla pagina 'event-view-container' (con fillDays() si rimuove)
function refreshDay(day) {
  console.log(typeof day);
  console.log(day);
}

function pastDay(days) {
  let y = now.getFullYear();
  let yCurr = pageCurrentDate[0];
  let m = now.getMonth() + 1;
  let mCurr = pageCurrentDate[1];
  days.forEach((day) => {
    if (yCurr < y || mCurr < m) {
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
  $(document).on("click", (e) => {
    if (e.target.className == "other-evt") {
      if ($(".event-view-container")) {
        $(".event-view-container").remove();
      }
      let offset = $(e.target.parentElement).offset();
      let top = offset.top >= 50 ? Math.round(offset.top) - 50 : 0;
      let left = offset.left >= 25 ? Math.round(offset.left) - 25 : 0;

      const srcX = '<img src="../img/x.svg">';

      const $container = $('<div class="event-view-container"></div>');
      $container.css({
        top: top,
        left: left,
      });
      $container.html(
        '<div class="event-view"><div class="close-view-btn"><img src="../img/x.svg"></div></div>'
      );
      $container.appendTo(e.target.parentElement);

      const $viewer = $(".event-view");

      const $date = $('<div class="date"></div>');
      $date.append('<div class="date-name">Sun</div>');
      $date.append('<div class="date-numb">31</div>');
      $date.appendTo($viewer);

      let y = pageCurrentDate[0];
      let m = pageCurrentDate[1];
      // FIXME:  throw an error with new design idea
      let d = +e.target.parentElement.children[0].children[1].innerHTML;

      $date[0].children[0].innerHTML =
        daysName[new Date(y + "-" + m + "-" + d).getDay()];
      $date[0].children[1].innerHTML = d;

      $.when(
        $.ajax({
          method: "POST",
          url: "../php/loadData.php",
          data: {
            year: y,
            month: m,
            day: d,
            limit: 100,
          },
          success: function (r) {
            if (!r) return;
            let a = r.split("---");
            a.forEach((el) => {
              if (el.includes("end-evt")) {
                let indEndEvt = el.indexOf("end-evt");
                while (indEndEvt >= 0) {
                  if (el[indEndEvt] == "<") break;
                  --indEndEvt;
                }
                let sub = el.substring(indEndEvt, el.length);
                el = el.replace(sub, "");
              }
              let removeBtn = `</div><div class="remove-evt">${srcX}</div>`;
              let lastCloseDiv = el.lastIndexOf("</div>");
              if (lastCloseDiv !== -1) {
                let sub = el.substring(lastCloseDiv, el.length);
                // el = el.replace(/_([^_]*)$/, removeBtn + "$1");
                el = el.replace(sub, removeBtn);
                $viewer.append(el);
              }
            });
          },
        })
      ).done((rtn) => {
        $("div.remove-evt").on("click", (ee) => {
          const t = ee.currentTarget;
          let y = pageCurrentDate[0];
          let m = pageCurrentDate[1];
          let d =
            +t.parentElement.parentElement.children[1].children[1].innerHTML;
          let id = +t.parentElement.attributes["event-id"].value;
          $.ajax({
            method: "POST",
            url: "../php/removeData.php",
            data: {
              y: y,
              m: m,
              d: d,
              id: id,
            },
            success: function (r) {},
          });
          // remove all event with specific 'event-id' from doc
          $("div.event")
            .filter((i, el) => {
              return $(el).attr("event-id") == id;
            })
            .remove();
          // remove only event in 'event-view-container'
          // $(t.parentElement).remove();
          // RUN fillDays() per l'aggiornamento del calendario
          refreshDay(e.target.parentElement, $container[0]);
        });
      });

      $container.css("display", "block");

      $("div.close-view-btn").on("click", (e) => {
        $container.remove();
      });
    }
  });
});
