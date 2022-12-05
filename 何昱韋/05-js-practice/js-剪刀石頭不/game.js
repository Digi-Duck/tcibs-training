let win_index=0,lose_index=0,round=0;
let roundDisplay = document.querySelector(".round");
let winDisplay = document.querySelector(".win_score");
let loseDisplay = document.querySelector(".lose_score");
function scissorBtn(){
    var selector = Math.floor(Math.random()*3);
    if(selector == 0){
        console.log("lose");
        lose_index++;
    }else if(selector == 1){
        console.log("win");
        win_index++
    }else if(selector == 2){
        console.log("equal");
    }
    round++;
    roundDisplay.innerHTML ="回合" + round;
    winDisplay.innerHTML = "贏:" + win_index +"場";
    loseDisplay.innerHTML = "輸:" + lose_index +"場";
}
function stoneBtn(){
    var selector = Math.floor(Math.random()*3);
    if(selector == 0){
        console.log("lose");
        lose_index++;
    }else if(selector == 1){
        console.log("win");
        win_index++;
    }else if(selector == 2){
        console.log("equal");
    }
    round++;
    roundDisplay.innerHTML ="回合" + round;
    winDisplay.innerHTML = "贏:" + win_index +"場";
    loseDisplay.innerHTML = "輸:" + lose_index +"場";
}
function clothBtn(){
    var selector = Math.floor(Math.random()*3);
    if(selector == 0){
        console.log("lose");
        lose_index++;
    }else if(selector == 1){
        console.log("win");
        win_index++;
    }else if(selector == 2){
        console.log("equal");
    }
    round++;
    roundDisplay.innerHTML ="回合" + round;
    winDisplay.innerHTML = "贏:" + win_index +"場";
    loseDisplay.innerHTML = "輸:" + lose_index +"場";
}


let scissor_btn = document.querySelector(".scissor_btn");
let stone_btn = document.querySelector(".stone_btn");
let cloth_btn = document.querySelector(".cloth_btn");
scissor_btn.addEventListener("click",scissorBtn);
stone_btn.addEventListener("click",stoneBtn);
cloth_btn.addEventListener("click",clothBtn);
