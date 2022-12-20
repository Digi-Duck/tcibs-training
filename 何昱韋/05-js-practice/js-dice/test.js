const diceTemplate = {
    1: document.querySelector("div.dice1").cloneNode(true),
    2: document.querySelector("div.dice2").cloneNode(true),
    3: document.querySelector("div.dice3").cloneNode(true),
    4: document.querySelector("div.dice4").cloneNode(true),
    5: document.querySelector("div.dice5").cloneNode(true),
    6: document.querySelector("div.dice6").cloneNode(true),
}
function gameResult() {
    let ADGameRegion = document.querySelector(".AD_dice_region_part");
    let MYGameRegion = document.querySelector(".MY_dice_region_part");
    let data = [];
    let dataLen = 10;
    let ADTotalIndex = 0;
    for (let rowIndex = 0; rowIndex < dataLen; rowIndex += 1) {
        let row = [];
        for (let _ = 0; _ < 3; _ += 1){
            let num = Math.floor(Math.random() * 6) + 1;
            row.push(num);
            ADGameRegion.innerHTML += String(diceTemplate[num].outerHTML);
            ADTotalIndex = ADTotalIndex + num;
        }
        data[rowIndex] = row;
    }
}

let throw_btn = document.querySelector(".throw_btn");
throw_btn.addEventListener("click", gameResult);


