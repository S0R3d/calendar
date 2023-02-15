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

const form = document.querySelector("form.fDB");

const fullDayBtn = document.querySelector("div.fullDay>input");

const title = document.querySelector("div.title>input");
const sDate = document.querySelector("div.sDate>input");
const fDate = document.querySelector("div.fDate>input");
const sTime = document.querySelector("div.sTime>input");
const fTime = document.querySelector("div.fTime>input");

// const submit = document.querySelector("input[type='submit']");

function resetInput() {
  title.value = "";
  sDate.value = "";
  fDate.value = "";
  sTime.value = "";
  fTime.value = "";
  fullDayBtn.checked = false;
  document.querySelector("div.fTime").classList.remove("hide");
  document.querySelector("div.sTime").classList.remove("hide");
  sTime.required = true;
  fTime.required = true;
  sTime.setCustomValidity("Inserire un tempo di inizio valido");
  fTime.setCustomValidity("Inserire un tempo di fine valido");
}

if (!nextBtn) console.error("Not Found Button 'Next Month'!");
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
  fillDays();
});

if (!prevBtn) console.error("Not Found Button 'Previous Month'!");
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
  fillDays();
});

if (!todayBtn) console.error("Not Found Button 'Today'");
todayBtn.addEventListener("click", () => {
  resetCurrentDate();
  changeHeader();
  resetMovingDate();
  formatDays();
  fillDays();
});

if (!addEventBtn) console.error("Not Found Button 'Add Event'");
addEventBtn.addEventListener("click", () => {
  document.querySelector("div.dropdown-content").classList.toggle("show");
});

window.onclick = (event) => {
  if (
    !(
      event.target.matches(".btn-add-event") ||
      event.target.matches("form, form>*") ||
      event.target.matches("label") ||
      event.target.matches("input")
    )
  ) {
    let openDD = document.querySelector("div.dropdown-content");
    if (openDD.classList.contains("show")) {
      openDD.classList.remove("show");
      resetInput();
    }
  }
};

title.setCustomValidity("Inserire un titolo per l'evento");
sDate.setCustomValidity("Inserire una data di inizio valida");
fDate.setCustomValidity("Inserire una data di fine valida");
sTime.setCustomValidity("Inserire un tempo di inizio valido");
fTime.setCustomValidity("Inserire un tempo di fine valido");

if (!fullDayBtn) console.error("Not Found Checkbox 'Full Day'");
fullDayBtn.addEventListener("change", () => {
  document.querySelector("div.sTime").classList.toggle("hide");
  document.querySelector("div.fTime").classList.toggle("hide");
  if (fullDayBtn.checked) {
    sTime.required = false;
    fTime.required = false;
    sTime.value = "";
    fTime.value = "";
    sTime.setCustomValidity("");
    fTime.setCustomValidity("");
  } else {
    sTime.required = true;
    fTime.required = true;
    sTime.setCustomValidity("Inserire un tempo di inizio valido");
    fTime.setCustomValidity("Inserire un tempo di fine valido");
  }
});

title.addEventListener("input", () => {
  if (title.validity.typeMismatch) {
    title.setCustomValidity("Inserire un titolo per l'evento");
  } else title.setCustomValidity("");
});

sDate.addEventListener("input", () => {
  if (sDate.validity.typeMismatch) {
    sDate.setCustomValidity("Inserire una data valida");
  } else sDate.setCustomValidity("");
});

fDate.addEventListener("input", () => {
  if (fDate.validity.typeMismatch) {
    fDate.setCustomValidity("Inserire una data valida");
  } else fDate.setCustomValidity("");
});

sTime.addEventListener("input", () => {
  if (sTime.validity.typeMismatch) {
    sTime.setCustomValidity("Inserire un tempo di inizio valido");
  } else sTime.setCustomValidity("");
  fTime.required = true;
});

fTime.addEventListener("input", () => {
  if (fTime.validity.typeMismatch) {
    fTime.setCustomValidity("Inserire un tempo di fine valido");
  } else fTime.setCustomValidity("");
  sTime.required = true;
});

function a(e) {
  let t = e.target[0].value;

  const MIN_DATE_VALUE = "1990-01-01";
  let sD = e.target[1].value,
    fD = e.target[2].value;
  if (sD < MIN_DATE_VALUE) return;
  if (fD < MIN_DATE_VALUE) return;
  if (fD < sD) return;

  const MIN_TIME_VALUE = "00:00:00";
  const MAX_TIME_VALUE = "00:00:00";
  let sT = e.target[4].value,
    fT = e.target[5].value;
  if (e.target[3].checked) {
    sT = MIN_TIME_VALUE;
    fT = MAX_TIME_VALUE;

    if (sD == fD && sT > fT) return;
  }

  $.ajax({
    type: "POST",
    url: "../calendar/php/insertData.php",
    data: {
      title: t,
      sDate: sD,
      fDate: fD,
      sTime: sT,
      fTime: fT,
    },
    success: (r) => {
      fillDays();
    },
    complete: () => {
      document.querySelector("div.dropdown-content").classList.remove("show");
      resetInput();
    },
  });
}

form.addEventListener("submit", (e) => {
  a(e);
  e.preventDefault();
});
