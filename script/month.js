const months = [
  "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December",
];
const monthDays = [
  31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
];

const now = new Date();
console.log("Today is: " + now.toString());

// re-write toString method for array (there are only 2 element, number) to print month and year correctlly
Array.prototype.toString = function () {
  // run this for specific Array of number
  if (this.length == 2 && typeof this[0] == "number" && typeof this[1] == "number")
    return months[this[0]] + " " + this[1];
  // run this for otherelse Array
  else return this.join();
}
// can change based of corrent month and year in calendar
let pageCurrentMonthYear = [now.getMonth(), now.getFullYear()];
console.log("Page current date: " + pageCurrentMonthYear.toString());

// insert month and year in header section
const monthYear = document.querySelector("div.month.year");
monthYear.innerHTML = `${pageCurrentMonthYear}`;

// loading page with corrent month
// TODO: create funtion to loding month
const calendar = document.querySelector("div.calendar");
const month = document.createElement("div");
month.className = "month";
month.style =
  "display: grid; grid-template-columns: repeat(7,auto); text-align: center;";
for (let i = 1; i < monthDays[pageCurrentMonthYear[0]] + 1; ++i) {
  const day = document.createElement("div");
  day.className = i % 7 == 0 ? "day sunday" : "day";
  day.innerHTML = `${i}`;
  month.appendChild(day);
}
calendar.appendChild(month);

const nextMonth = document.querySelector("div.right-arrow");
if (nextMonth) {
  nextMonth.addEventListener("click", (e) => {
    if (pageCurrentMonthYear[0] == 11) {
      pageCurrentMonthYear[0] = 0;
      pageCurrentMonthYear[1] += 1;
    } else {
      pageCurrentMonthYear[0] += 1;
      pageCurrentMonthYear[1];
    }
  });
} else console.error("Not Found Button Next Month!");
const previousMonth = document.querySelector("div.left-arrow");
if (previousMonth) {
  previousMonth.addEventListener("click", (e) => {
    if (pageCurrentMonthYear[0] == 0) {
      pageCurrentMonthYear[0] = 11;
      pageCurrentMonthYear[1] -= 1;
    } else {
      pageCurrentMonthYear[0] -= 1;
      pageCurrentMonthYear[1];
    }
  });
} else console.error("Not Found Button Previous Month!");