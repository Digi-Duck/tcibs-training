const start = document.querySelector(".btn")
const room = document.querySelector(".top")
const game = document.querySelector(".game")
const score = document.querySelector(".score")
const timer = document.querySelector(".timer")
const over = document.querySelector(".over")
const bg = document.querySelector(".bg")

let i,r,g,b,x;
let w = 200;
let h = 200;
let t = 60;
let s = 0;
let o = 0.1;
let num = 2;

//倒數計時
function myTime(){
    const clock = setInterval(function(){
        t--;
        timer.innerHTML = `時間：${t}`;
        if (t <= 0) {
            //停止計時
            clearInterval(clock);
            score.innerHTML = ``;
            bg.style.opacity = "0";
            setTimeout(() => window.location.reload(),1000)
            over.innerHTML = `Time up！`
          } 
    },1000)
}

//增加box
function addbox() {  
    if(num > 6){
        num = 7;
        i = 49;
    }
    game.innerHTML = ` `; 
    for(i = 0; i < num * num; i++){
        game.innerHTML += `<div class="box"></div>`;
    }   
}

//新增變數
function getrandom(){
    r = Math.floor(Math.random() * 256);
    g = Math.floor(Math.random() * 256);
    b = Math.floor(Math.random() * 256);
    x = Math.floor(Math.random() * i);
    return r,g,b,x;
}

function main(){ //產生變數 每個方塊加顏色 按下答案 增加方塊 
    //增加方塊長寬
    game.style.width = w + "px";
    game.style.height = h + "px";
    if(num < 7){
        w = w + 100;
        h = h + 100;   
    }
    //增加方塊
    addbox();
    const box = document.querySelectorAll(".box") 
    // 產生變數
    getrandom();
    box.forEach(function(element, index){
        // 改變透明度
        box[x].style.opacity = o;
        element.style.width = "calc((100% - 10 * 2px *" + num + ") /" + num + ") ";
        element.style.height = "calc((100% - 10 * 2px *" + num + ") /" + num + ") ";
        element.style.backgroundColor = "rgb("+ r + "," + g + "," + b + ")"; 
        element.addEventListener('click',function(){
            // 答案被按下
            if(num < 7 && index == x){
                o = o * 1.4;
                score_();
            }else if(index == x && num <= 10){
                //改變答案透明度
                o = o * 1.02;
                score_();
            }
        })
    })
}

function score_(){
    const box = document.querySelectorAll(".box")
    //增加box
    num++;
    //增加分數
    s++;
    score.innerHTML = `分數：${s}`
    box[x].classList.remove('ans')
    //再跑一次
    main(); 
}
//開始
start.addEventListener("click", function (){
    game.style.backgroundColor = "white";
    start.classList.add("disappear")
    room.classList.add("room")
    score.innerHTML = `分數：${s}`
    timer.innerHTML = `時間：${t}`;
    myTime();
    main(); 
})
