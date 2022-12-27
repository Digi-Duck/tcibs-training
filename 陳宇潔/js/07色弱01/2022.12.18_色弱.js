const start = document.querySelector(".btn")
const game = document.querySelector(".game")

let num = 2;
//增加box
function addbox() {
    for(let i = 0; i < num * num; i++){
    console.log(num);
    game.innerHTML += `<div class="box"></div>`;
    }   
}
let box = document.querySelectorAll(".box")

//新增變數
function getrandom(){
    r = Math.floor(Math.random() * 256);
    g = Math.floor(Math.random() * 256);
    b = Math.floor(Math.random() * 256);
    x = Math.floor(Math.random() * 4);
    return r,g,b,x;
}

function main(){ //產生變數 每個方塊加顏色 按下答案 增加方塊 
    //增加方塊
    addbox();

    // 產生變數
    getrandom();

    box.forEach(function(element, index){
        element.style.backgroundColor = "rgb("+ r + "," + g + "," + b + ")"; 
        element.addEventListener('click',function(){
            // 答案被按下
            if(index == x){
                //增加box
                num++;
                box[x].classList.remove('ans');  
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
    main(); 
})