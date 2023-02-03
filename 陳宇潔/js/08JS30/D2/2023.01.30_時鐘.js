const year = document.querySelector(".year");
const month = document.querySelector(".month");
const day = document.querySelector(".day");

const hour = document.querySelector(".hour");
const minute = document.querySelector(".minute");
const second = document.querySelector(".second");

setInterval(function main(){
    let time = new Date();
    let h,m,s;

    year.innerHTML = `${time.getFullYear()} 年`;
    month.innerHTML = `${time.getMonth() + 1} 月`;
    day.innerHTML = `${time.getDate()} 日`;

    h = time.getHours() * 30 + time.getMinutes() / 2;
    m = time.getMinutes() * 6 + time.getSeconds() / 10;
    s = time.getSeconds() * 6;

    hour.style.transform = `rotate(${h}deg)`;
    minute.style.transform = `rotate(${m}deg)`;
    second.style.transform = `rotate(${s}deg)`;

    console.log(time.getHours(), time.getMinutes(), time.getSeconds())
},1000)
