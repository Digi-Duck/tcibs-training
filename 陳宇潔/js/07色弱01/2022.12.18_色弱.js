const start = document.querySelector(".btn")
const room = document.querySelector(".button")
const game = document.querySelector(".game")
const ans = document.querySelector(".ans")

let i;
let score = 0
let num = 2;

//增加box
function addbox() {  
    // a = 0.15;
    // ans.style.opacity = a;
    if(num > 6){
        num = 7;
        i = 49;
    }
    game.innerHTML = ` `; 
    for(i = 0; i < num * num; i++){
        // a = a * 1.5;
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
    //增加方塊
    addbox();
    const box = document.querySelectorAll(".box")
    // 產生變數
    getrandom();

    box.forEach(function(element, index){
        element.style.width = "calc((100% - 10 * 2px *" + num + ") /" + num + ") ";
        element.style.height = "calc((100% - 10 * 2px *" + num + ") /" + num + ") ";
        element.style.backgroundColor = "rgb("+ r + "," + g + "," + b + ")"; 
        element.addEventListener('click',function(){
            // 答案被按下
            if(index == x){
                //增加box
                num++;
                score++;
                box[x].classList.remove('ans')
                //再跑一次
                main(); 
            }
        })
    })
    // 改變透明度
    box[x].classList.add('ans');
}

//開始
start.addEventListener("click", function (){
    start.classList.add("disappear")
    room.classList.add("room")
    main(); 

})