var win_index=0,lose_index=0,equal_index=0,round=0;
let roundDisplay = document.querySelector(".round-display");
let game_region = document.querySelector(".game_region");
let finish_win = document.querySelector(".finish_win");
let finish_lose = document.querySelector(".finish_lose");
let container = document.querySelector(".container");
let ADGP = document.querySelector(".ADgameProcess");
let MYGP = document.querySelector(".MYgameProcess");
let tranbox = document.querySelector(".transition-box");

let ADhp1 = document.querySelector(".ADhp1");
let ADhp2 = document.querySelector(".ADhp2");
let ADhp3 = document.querySelector(".ADhp3");
let MYhp1 = document.querySelector(".MYhp1");
let MYhp2 = document.querySelector(".MYhp2");
let MYhp3 = document.querySelector(".MYhp3");

function scissorBtn(){
    var selector = Math.floor(Math.random()*3);
    MYGP.innerHTML = "你出 剪刀";
    if(selector == 0){
        console.log("lose");
        lose_index++;
        ADGP.innerHTML = "出 石頭";
    }else if(selector == 1){
        console.log("win");
        win_index++;
        ADGP.innerHTML = "出 布";
    }else if(selector == 2){
        console.log("equal");
        equal_index++;
        ADGP.innerHTML = "出 剪刀";
    }

    if(win_index == 1){
        ADhp3.style.width = 0;
    }else if(win_index == 2){
        ADhp2.style.width = 0;
    }
    if(lose_index == 1){
        MYhp3.style.width = 0;
    }else if(lose_index == 2){
        MYhp2.style.width = 0;
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
    MYGP.innerHTML = "你出 石頭";
    if(selector == 0){
        console.log("lose");
        lose_index++;
        ADGP.innerHTML = "出 布";
    }else if(selector == 1){
        console.log("win");
        win_index++;
        ADGP.innerHTML = "出 剪刀";
    }else if(selector == 2){
        console.log("equal");
        equal_index++;
        ADGP.innerHTML = "出 石頭";
    }

    if(win_index == 1){
        ADhp3.style.width = 0;
    }else if(win_index == 2){
        ADhp2.style.width = 0;
    }
    if(lose_index == 1){
        MYhp3.style.width = 0;
    }else if(lose_index == 2){
        MYhp2.style.width = 0;
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
    MYGP.innerHTML = "你出 布";
    if(selector == 0){
        console.log("lose");
        lose_index++;
        ADGP.innerHTML = "出 剪刀";
    }else if(selector == 1){
        console.log("win");
        win_index++;
        ADGP.innerHTML = "出 石頭";
    }else if(selector == 2){
        console.log("equal");
        equal_index++;
        ADGP.innerHTML = "出 布";
    }

    if(win_index == 1){
        ADhp3.style.width = 0;
    }else if(win_index == 2){
        ADhp2.style.width = 0;
    }
    if(lose_index == 1){
        MYhp3.style.width = 0;
    }else if(lose_index == 2){
        MYhp2.style.width = 0;
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

// start
let start_btn = document.querySelector(".game_start_button");
let start_part = document.querySelector(".game_start");

function start(){
    start_part.classList.add("display-none");
    container.classList.remove("display-none");
}
start_btn.addEventListener("click",start,);