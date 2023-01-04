const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];

// CANNOT CHANGE
const now = new Date();
console.log(now.toString());

// can change based of corrent month and year in calendar
let pageCurrentMonthYear = months[new Date().getMonth()]+" "+ now.getFullYear();
console.log(pageCurrentMonthYear);

// inner month and year in header
const monthYear = document.querySelector("div.month.year");
monthYear.innerHTML = `${pageCurrentMonthYear}`;

// la pagina carica SEMPRE di base il mese corrente completo
const calendar = document.querySelector("div.calendar");
const month = document.createElement("div");
month.className = "month";
month.style = "display: grid; grid-template-columns: repeat(7,auto); text-align: center;";
// n° di volte del ciclo dipende dal mese corrente
for(let i = 1; i < 31 +1; ++i) {
    const day = document.createElement("div");
    day.className = (i % 7 == 0) ? "day sunday" : "day";
    day.innerHTML = `${i}`;
    month.appendChild(day);
}
calendar.appendChild(month);
