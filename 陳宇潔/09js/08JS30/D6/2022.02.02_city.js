const city = "https://api.nlsc.gov.tw/other/ListTown1";
let cityList = [];

fetch(city)
  .then((res) => res.json())
  .then((data) => {cityList.push(...data)})