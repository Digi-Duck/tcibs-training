const start = document.querySelector(".start")
const all = document.querySelector(".bg")
const scissors = document.querySelector(".scissors")
const rock = document.querySelector(".rock")
const paper = document.querySelector(".paper")
const right = document.querySelector(".right")
const left = document.querySelector(".left")
const blood = document.querySelector(".blood")

const b1 = document.querySelector(".b1")
const b2 = document.querySelector(".b2")
const b3 = document.querySelector(".b3")
const b4 = document.querySelector(".b4")
const b5 = document.querySelector(".b5")
const b11 = document.querySelector(".b11")
const b12 = document.querySelector(".b12")
const b13 = document.querySelector(".b13")
const b14 = document.querySelector(".b14")
const b15 = document.querySelector(".b15")

var result;

left.classList.add("disappear");
right.classList.add("disappear");
all.classList.add("disappear");
start.onclick = function(){
    all.classList.remove("disappear");
    start.classList.add("disappear");
}
scissors.onclick = function(){
    left.classList.remove("disappear");
    right.classList.remove("disappear");   
    let enemy = Math.floor(Math.random()*3)
    //他出 石頭 他初步 他出剪刀
    left.innerHTML=`<img src="/./陳宇潔/image/scissors.png" class="img_scissors pic trans">`;
    if (enemy == 0){
        //他出 石頭 
        console.log("輸")
        result = 1;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/rock.png" class="img_rock pic trans mirror">`;
        // blood.classList.remove("blood:nth(5)")
    }else if(enemy == 1){
        //他出 步
        console.log("贏")
        result = 2;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/paper.png" class="img_paper pic trans mirror">`;
    }else{
        //他出剪刀
        console.log("平手")
        result = 3;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/scissors.png" class="img_scissors pic trans mirror">`
    }
}
rock.onclick = function(){
    left.classList.remove("disappear");
    right.classList.remove("disappear");  
    let enemy = Math.floor(Math.random()*3)
    //他出 石頭 他初步 他出剪刀
    left.innerHTML=`<img src="/./陳宇潔/image/rock.png" class="img_rock pic trans">`;
    if (enemy == 0){
        //他出 石頭
        console.log("平手")
        result = 3;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/rock.png" class="img_rock pic trans mirror">`;
    }else if(enemy == 1){
        //他出 步
        console.log("輸")
        result = 1;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/paper.png" class="img_paper pic trans mirror">`;
    }else{
        //他出剪刀
        console.log("贏")
        result = 2;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/scissors.png" class="img_scissors pic trans mirror">`
    }
}
paper.onclick = function(){
    left.classList.remove("disappear");
    right.classList.remove("disappear");  
    let enemy = Math.floor(Math.random()*3)
    //他出 石頭 他初步 他出剪刀
    left.innerHTML=`<img src="/./陳宇潔/image/paper.png" class="img_paper pic trans">`;
    if (enemy == 0){
        //他出 石頭
        console.log("贏")
        result = 2;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/rock.png" class="img_rock pic trans mirror">`;
    }else if(enemy == 1){
        //他出 步
        console.log("平手")
        result = 3;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/paper.png" class="img_paper pic trans mirror">`;
    }else{
        //他出剪刀
        console.log("輸")
        result = 1;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/scissors.png" class="img_scissors pic trans mirror">`
    }
}

function heart(){
    switch(result){
    case 1:
        console.log("輸");
        b5.classList.add("disappear")
    break;
    case 2:
        console.log("贏");
    break;
    case 3:
        console.log("平手");
    break;
    default: 
        console.log("else");
    break;
    }
}
