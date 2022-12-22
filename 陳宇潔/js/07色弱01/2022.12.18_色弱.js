const start = document.querySelector(".btn")
const box = document.querySelectorAll(".box")

function getrandom(){
    r = Math.floor(Math.random() * 256);
    g = Math.floor(Math.random() * 256);
    b = Math.floor(Math.random() * 256);
    x = Math.floor(Math.random() * 4);
    return r,g,b,x;
}

function trans(){ //改變
    // 產生變數
    getrandom();
    console.log(x);
    // 所有的方塊跑回圈
    box.forEach(function(element){
        element.style.backgroundColor = "rgb("+ r + "," + g + "," + b + ")";      
    })
    // 改變透明度
    box[x].style.opacity = "0.1";

    // 綁定監聽事件
    box[x].addEventListener("click", function(){
        box[x].style.opacity = "1";
        trans();
    })
}

function a(){ //迴圈

}


start.addEventListener("click", function (){
    start.classList.add("disappear")
    trans();
    // console.log(111);
    // console.log(x);
    
})
