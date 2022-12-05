let win_index=0,lose_index=0,round=0;
let roundDisplay = document.querySelector(".round");
function scissorBtn(){
    var selector = Math.floor(Math.random()*3);
    if(selector == 0){
        console.log("lose");
    }else if(selector == 1){
        console.log("win");
    }else if(selector == 2){
        console.log("equal");
    }
    round++;
    roundDisplay.innerHTML ="回合" + round;
}
function stoneBtn(){
    var selector = Math.floor(Math.random()*3);
    if(selector == 0){
        console.log("lose");
    }else if(selector == 1){
        console.log("win");
    }else if(selector == 2){
        console.log("equal");
    }
    round++;
    roundDisplay.innerHTML ="回合" + round;
}
function clothBtn(){
    var selector = Math.floor(Math.random()*3);
    if(selector == 0){
        console.log("lose");
    }else if(selector == 1){
        console.log("win");
    }else if(selector == 2){
        console.log("equal");
    }
    round++;
    roundDisplay.innerHTML ="回合" + round;
}


let scissor_btn = document.querySelector(".scissor_btn");
let stone_btn = document.querySelector(".stone_btn");
let cloth_btn = document.querySelector(".cloth_btn");
scissor_btn.addEventListener("click",scissorBtn);
stone_btn.addEventListener("click",stoneBtn);
cloth_btn.addEventListener("click",clothBtn);
