const diceTemplate = document.querySelectorAll(".dice");

function advarsary(){
    let gameDisplay = document.querySelector(".adversary-game-display");
    let gameScore = document.querySelector(".adversary-game-score");
    let data = [];
    let dataLenth = 10;
    let adversaryPoint = 0;
    for(let rowIndex = 0;rowIndex < dataLenth;rowIndex++){
        let row =[];
        for(let _ = 0;_ < 3;_++){
            let randomNum = Math.floor(Math.random()*6);
            row.push(randomNum);
            gameDisplay.innerHTML += diceTemplate[randomNum].outerHTML;
            adversaryPoint = adversaryPoint + randomNum;
            gameScore.innerHTML = adversaryPoint;
        }
        data[rowIndex] = row;
    }
    return adversaryPoint;
}
function mygame(){
    let gameDisplay = document.querySelector(".My-game-display");
    let gameScore = document.querySelector(".My-game-score");
    let data = [];
    let dataLenth = 10;
    let myPoint = 0;
    for(let rowIndex = 0;rowIndex < dataLenth;rowIndex++){
        let row =[];
        for(let _ = 0;_ < 3;_++){
            let randomNum = Math.floor(Math.random()*6);
            row.push(randomNum);
            gameDisplay.innerHTML += diceTemplate[randomNum].outerHTML;
            myPoint = myPoint + randomNum;
            gameScore.innerHTML = myPoint;
        }
        data[rowIndex] = row;
    }
    return myPoint;
}
function gameResult(){
    let adPoint = advarsary();
    let myPoint = mygame();
    let gameResultRegion = document.querySelector(".game_result");
    if(adPoint > myPoint){
        gameResultRegion.innerHTML = "u lose";
    }else if(adPoint < myPoint){
        gameResultRegion.innerHTML = "u win";
    }else if(adPoint == myPoint){
        gameResultRegion.innerHTML = "eqaul";
    }
    let throwBtn = document.querySelector(".throw_btn");
    throwBtn.classList.add("display-none");
    let gameContainer = document.querySelector(".game_container");
    let end = document.querySelector(".game-end");
    setTimeout(() => {
        gameContainer.classList.add("display-none");
        end.classList.remove("display-none");
    }, 3000);
}

let tpToStart = document.querySelector(".game_start_btn");
tpToStart.addEventListener("click",function(){
    let startPastRegion = document.querySelector(".game_start_region");
    let startAfterRegion = document.querySelector(".game_container");
    startPastRegion.classList.add("display-none");
    startAfterRegion.classList.remove("display-none");
})

let gameStartBtn = document.querySelector(".throw_btn");
gameStartBtn.addEventListener("click",gameResult);