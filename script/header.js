// document.addEventListener("click", (e) => {
//   console.log(e);
// });

function changeHeader() {
  const monthYear = document.querySelector("div.header-month.header-year");
  monthYear.firstElementChild.innerHTML =
    `${months[pageCurrentDate[1] - 1]}` + " " + `${pageCurrentDate[0]}`;
}
changeHeader();

const todayBtn = document.querySelector("button.btn-today");
const nextBtn = document.querySelector("button.btn-arrow-right");
const prevBtn = document.querySelector("button.btn-arrow-left");
const addEventBtn = document.querySelector("button.btn-add-event");

if (nextBtn) {
  nextBtn.addEventListener("click", () => {
    if (pageCurrentDate[1] == 12) {
      pageCurrentDate[1] = 1;
      pageCurrentDate[0] += 1;
    } else {
      pageCurrentDate[1] += 1;
      pageCurrentDate[0];
    }
    movingDate.nextMonth();
    changeHeader();
    formatDays();
    popolate();
  });
} else console.error("Not Found Button 'Next Month'!");

if (prevBtn) {
  prevBtn.addEventListener("click", () => {
    if (pageCurrentDate[1] == 1) {
      pageCurrentDate[1] = 12;
      pageCurrentDate[0] -= 1;
    } else {
      pageCurrentDate[1] -= 1;
      pageCurrentDate[0];
    }
    movingDate.prevMonth();
    changeHeader();
    formatDays();
    popolate();
  });
} else console.error("Not Found Button 'Previous Month'!");

if (todayBtn) {
  todayBtn.addEventListener("click", () => {
    resetCurrentDate();
    changeHeader();
    resetMovingDate();
    formatDays();
    popolate();
  });
} else console.error("Not Found Button 'Today'");

if (addEventBtn) {
  addEventBtn.addEventListener("click", () => {
    // setup dropdown
    document.querySelector("div.dropdown-content").classList.toggle("show");
  });
} else console.error("Not Found Button 'Add Event'");

// to close dropdown clicking out of it
window.onclick = function (event) {
  if (!event.target.matches(".btn-add-event")) {
    let openDD = document.querySelector("div.dropdown-content");
    if (openDD.classList.contains("show")) {
      openDD.classList.remove("show");
    }
  }
};
