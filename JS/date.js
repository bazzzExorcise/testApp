
var date = new Date();

var days = ["minggu", "senin", "selasa", "rabu", "kamis", "jumat", "sabtu"];
var months = [
  "januari",
  "februari",
  "maret",
  "april",
  "mei",
  "juni",
  "juli",
  "agustus",
  "september",
  "oktober",
  "november",
  "desember"
];

var dayName = days[date.getDay()];
var day = date.getDate();
var monthName = months[date.getMonth()];
var year = date.getFullYear();

var formattedDate = dayName + ", " + day + " " + monthName + " " + year;

$("#tanggal").html(formattedDate);
