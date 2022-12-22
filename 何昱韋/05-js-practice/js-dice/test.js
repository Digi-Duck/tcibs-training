function advarsary(){
    let gameDisplay = document.querySelector(".adversary-game-display");
    let data = [];
    let dataLenth = 10;
    let adversaryPoint = 0;
    for(let rowIndex = 0;rowIndex < dataLenth;rowIndex++){
        let row =[];
        for(let _ = 0;_ < 3;_++){
            let randomNum = Math.floor(Math.random()*6) + 1;
            row.push(randomNum);
            adversaryPoint = adversaryPoint + randomNum;
        }
        data[rowIndex] = row;
    }
    console.log(adversaryPoint);
}
function mygame(){
    let data = [];
    let dataLenth = 10;
    let myPoint = 0;
    for(let rowIndex = 0;rowIndex < dataLenth;rowIndex++){
        let row =[];
        for(let _ = 0;_ < 3;_++){
            let randomNum = Math.floor(Math.random()*6) + 1;
            row.push(randomNum);
            myPoint = myPoint + randomNum;
        }
        data[rowIndex] = row;
    }
    console.log(myPoint);
}
function gameResult(){
    advarsary();
    mygame();
    // alert("I am handsome");
}

let startBtn = document.querySelector(".throw_btn");
startBtn.addEventListener("click",gameResult);