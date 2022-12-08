var win_index=0,lose_index=0,equal_index=0,round=0;
let roundDisplay = document.querySelector(".round-display");
let game_region = document.querySelector(".game_region");
let finish_win = document.querySelector(".finish_win");
let finish_lose = document.querySelector(".finish_lose");
let container = document.querySelector(".container");

function scissorBtn(){
    var selector = Math.floor(Math.random()*3);
    if(selector == 0){
        console.log("lose");
        lose_index++;
    }else if(selector == 1){
        console.log("win");
        win_index++;
    }else if(selector == 2){
        console.log("equal");
        equal_index++;
    }
    round++;
    roundDisplay.innerHTML = "round" + round;
    if(win_index == 3){
        game_region.classList.add("display-none");
        finish_win.classList.remove("display-none");
        container.classList.add("finish_type");
        container.classList.remove("container-decoration");
    }else if(lose_index == 3){
        game_region.classList.add("display-none");
        finish_lose.classList.remove("display-none");
        container.classList.add("finish_type");
        container.classList.remove("container-decoration");
    }
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
        equal_index++;
    }
    round++;
    roundDisplay.innerHTML = "round" + round;
    if(win_index == 3){
        game_region.classList.add("display-none");
        finish_win.classList.remove("display-none");
        container.classList.add("finish_type");
        container.classList.remove("container-decoration");
    }else if(lose_index == 3){
        game_region.classList.add("display-none");
        finish_lose.classList.remove("display-none");
        container.classList.add("finish_type");
        container.classList.remove("container-decoration");
    }
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
        equal_index++;
    }
    round++;
    roundDisplay.innerHTML = "round" + round;
    if(win_index == 3){
        game_region.classList.add("display-none");
        finish_win.classList.remove("display-none");
        container.classList.add("finish_type");
        container.classList.remove("container-decoration");
    }else if(lose_index == 3){
        game_region.classList.add("display-none");
        finish_lose.classList.remove("display-none");
        container.classList.add("finish_type");
        container.classList.remove("container-decoration");
    }
}

let scissor_btn = document.querySelector(".scissor-button");
let stone_btn = document.querySelector(".stone-button");
let cloth_btn = document.querySelector(".cloth-button")
scissor_btn.addEventListener("click",scissorBtn);
stone_btn.addEventListener("click",stoneBtn);
cloth_btn.addEventListener("click",clothBtn);


