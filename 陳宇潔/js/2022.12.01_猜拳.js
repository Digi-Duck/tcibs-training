const start = document.querySelector(".start")
const end = document.querySelector(".end")

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
end.classList.add("disappear");
start.onclick = function(){
    all.classList.remove("disappear");
    start.classList.add("disappear");
}
end.onclick = function(){
    // all.classList.add("disappear");
    // end.classList.remove("disappear");
}
scissors.onclick = function(){
    left.classList.remove("disappear");
    right.classList.remove("disappear");   
    let enemy = Math.floor(Math.random()*3)
    //他出 石頭 他初步 他出剪刀
    left.innerHTML=`<img src="/./陳宇潔/image/scissors.png" class="img_scissors pic trans">`;
    if (enemy == 0){
        //他出 石頭 
        result = 1;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/rock.png" class="img_rock pic trans mirror">`;
        // blood.classList.remove("blood:nth(5)")
    }else if(enemy == 1){
        //他出 步
        result = 2;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/paper.png" class="img_paper pic trans mirror">`;
    }else{
        //他出剪刀
        result = 3;
        console.log(result)
        right.innerHTML=`<img src="/./陳宇潔/image/scissors.png" class="img_scissors pic trans mirror">`
    }
    heart();
}
rock.onclick = function(){
    left.classList.remove("disappear");
    right.classList.remove("disappear");  
    let enemy = Math.floor(Math.random()*3)
    //他出 石頭 他初步 他出剪刀
    left.innerHTML=`<img src="/./陳宇潔/image/rock.png" class="img_rock pic trans">`;
    if (enemy == 0){
        //他出 石頭
        result = 3;
        right.innerHTML=`<img src="/./陳宇潔/image/rock.png" class="img_rock pic trans mirror">`;
    }else if(enemy == 1){
        //他出 步
        result = 1;
        right.innerHTML=`<img src="/./陳宇潔/image/paper.png" class="img_paper pic trans mirror">`;
        b5.classList.add("disappear");
    }else{
        //他出剪刀
        result = 2;
        right.innerHTML=`<img src="/./陳宇潔/image/scissors.png" class="img_scissors pic trans mirror">`
    }
    heart();
}
paper.onclick = function(){
    left.classList.remove("disappear");
    right.classList.remove("disappear");  
    let enemy = Math.floor(Math.random()*3)
    //他出 石頭 他初步 他出剪刀
    left.innerHTML=`<img src="/./陳宇潔/image/paper.png" class="img_paper pic trans">`;
    if (enemy == 0){
        //他出 石頭
        result = 2;
        right.innerHTML=`<img src="/./陳宇潔/image/rock.png" class="img_rock pic trans mirror">`;
    }else if(enemy == 1){
        //他出 步
        result = 3;
        right.innerHTML=`<img src="/./陳宇潔/image/paper.png" class="img_paper pic trans mirror">`;
    }else{
        //他出剪刀
        result = 1;
        right.innerHTML=`<img src="/./陳宇潔/image/scissors.png" class="img_scissors pic trans mirror">`
    }
    heart();
}
function heart(){
    let player = document.querySelectorAll('.player_blood > .blood');
    let length_player = player.length;
    let computer = document.querySelectorAll('.computer_blood > .blood');
    let length_computer = computer.length;
    console.log(length_player);
    if(result == 1){
         console.log("輸");
            if(length_player == 5){
                b5.classList.add("blood_disappear")
                setTimeout(() => b5.remove(), 500)
            }else if(length_player == 4){
                b4.classList.add("blood_disappear")
                setTimeout(() => b4.remove(), 500)
            }else if(length_player == 3){
                b3.classList.add("blood_disappear")
                setTimeout(() => b3.remove(), 500)
            }else if(length_player == 2){
                b2.classList.add("blood_disappear")
                setTimeout(() => b2.remove(), 500)
            }else if(length_player == 1){
                b1.classList.add("blood_disappear")
                setTimeout(() => b1.remove(), 500)
            }
            // gameover();
    }else if(result == 2){
        console.log("贏");
            if(length_computer == 5){
                b15.classList.add("blood_disappear")
                setTimeout(() => b15.remove(), 500)
            }
             if(length_computer == 4){
                b14.classList.add("blood_disappear")
                setTimeout(() => b14.remove(), 500)
            }
             if(length_computer == 3){
                b13.classList.add("blood_disappear")
                setTimeout(() => b13.remove(), 500)
            }
             if(length_computer == 2){
                b12.classList.add("blood_disappear")
                setTimeout(() => b12.remove(), 500)
            }
            if(length_computer == 1){
                b11.classList.add("blood_disappear")
                setTimeout(() => b11.remove(), 500)
            }
            // gameover();
    }else{
        console.log("平手");
    }
}
// function gameover(){
//     if(length_player == 0){
//         innerHTML=`你輸了！`;
//     }else if(length_computer == 0){
//         innerHTML=`你贏了！`;
//     }
// }
