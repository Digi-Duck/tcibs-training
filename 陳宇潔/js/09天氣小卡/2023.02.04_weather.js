const content = document.querySelector('.content');
const district = document.querySelector('#district');
const date = document.querySelector('#date');
const times = document.querySelectorAll('#date option');

let locat;
let districtvalue;
let datevalue;
let area;
let comfortable;//CI
let weather;//Wx
let rain;//PoP
let maxt;//MaxT
let mint;//MinT
let w; //wheather
let ww; //wheather[i]

let north = [];
let middle = [];
let south = [];
let east = [];
let island = [];

fetch("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-71BFA974-BB32-477B-9B86-9D862699CEB5")
.then(function(response){
    return response.json();
})
.then(function(data){
    locat = data.records.location;

    datevalue = 0;
    districtvalue = 0;
    if(districtvalue == 0){
        north.push(locat[1], locat[5], locat[3], locat[4], locat[7], locat[13], locat[18]);
        value(north, datevalue);
        north = [];
    }

    times.forEach((option,index) => {
        option.innerHTML = locat[0].weatherElement[0].time[index].startTime;
    })
    date.addEventListener('change', function(){
        datevalue = date.value;
        datevalue = parseInt(date.value);
        value(island, datevalue);
        change(districtvalue, datevalue);
    })

    district.addEventListener('change', function(){
        districtvalue = parseInt(district.value);
        change(districtvalue, datevalue);
    })
})
function change(districtvalue, datevalue){
    content.innerHTML = '';
    switch(districtvalue){
        case 0:
            north.push(locat[1], locat[5], locat[3], locat[4], locat[7], locat[13], locat[18]);
            value(north, datevalue);
            north = [];
            break;
        case 1:
            middle.push( locat[8], locat[9], locat[11], locat[14], locat[20]);
            value(middle, datevalue);
            middle = [];
            break;
        case 2:
            south.push( locat[0], locat[2], locat[6], locat[15], locat[17], locat[19]);
            value(south, datevalue); 
            south = [];
            break;
        case 3:
            east.push(locat[10], locat[12]);
            value(east, datevalue);
            east = [];
            break;
        case 4:
            island.push(locat[16], locat[21]);
            value(island, datevalue); 
            island = [];
            break;
    }
}
function value(locat, datevalue){
    locat.forEach(function (element){
        area = element.locationName;
        weatherelement = element.weatherElement;

        comfortable = weatherelement[3].time[datevalue].parameter.parameterName;//CI
        weather = weatherelement[0].time[datevalue].parameter.parameterName;//Wx
        weathervalue = weatherelement[0].time[datevalue].parameter.parameterValue;
        rain = weatherelement[1].time[datevalue].parameter.parameterName;//PoP
        maxt = weatherelement[4].time[datevalue].parameter.parameterName;//MaxT
        mint = weatherelement[2].time[datevalue].parameter.parameterName;//MinT

        w = ['Sunny', 'Cloudy', 'Rainy', 'Thunder', 'snowy'];
        if(weathervalue <= 3){
            ww = 0;
        }else if(weathervalue > 3 && weathervalue <= 7 || weathervalue > 23 && weathervalue <= 29){
            ww = 1;
        }else if(weathervalue > 7 && weathervalue <= 14 || weathervalue > 29 && weathervalue <= 32 || weathervalue > 18 && weathervalue <= 20){
            ww = 2;
        }else if(weathervalue > 14 && weathervalue <= 18 || weathervalue > 20 && weathervalue <= 22 || weathervalue > 32 && weathervalue <= 36){
            ww = 3;
        }else{
            ww = 4;
        }
        card();
    });
}
function card(){
    content.innerHTML +=
    `<div class="card"> 
        <div class="in center">${area}</div> 
        <img src="./img/${w[ww]}.gif" class="img">
        <div class="feel center">${w[ww]}</div>
        <div class="flex">
            <div class="detail font">
                <div class="boxes">
                    <p>舒適度</p>
                    <p>${comfortable}</p>
                </div>
                <div class="boxes">
                    <p>天氣現象</p>
                    <p>${weather}</p>
                </div>
                <div class="boxes">
                    <p>降雨機率</p>
                    <p>${rain} %</p>
                </div>
            </div>
            <div class="detail">
                <div class="boxes">
                    <p>最高溫</p>
                    <p>${maxt} °C</p>
                </div>
                <div class="boxes">
                    <p>最低溫 </p>
                    <p>${mint} °C</p>
                </div>
            </div>
        </div>
    </div>`
}
