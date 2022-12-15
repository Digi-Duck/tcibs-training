const start = document.querySelector(".start")
const re = document.querySelector(".reload")
const me = document.querySelector(".me")
const enermy = document.querySelector(".enermy")
const me_score = document.querySelector(".me_score")
const enermy_score = document.querySelector(".enermy_score")
const bg = document.querySelector(".bg")
const final = document.querySelector(".compare")

me_score.classList.remove("score")
enermy_score.classList.remove("score")
re.classList.add("disappear")
let total = 0;

start.onclick = function(){
    let me_result = 0;

    for(let j = 0; j < 10; j++){
        vs(me);
        me_result = me_result + total;
        // console.log(total);
    } 
    me_score.innerHTML = ` ${me_result} <br>`;
    me_score.classList.add("score")
    console.log(me_score.innerHTML);
    let enermy_result = 0;

    for(let j = 0; j < 10; j++){
        vs(enermy);
        enermy_result = enermy_result + total;
    } 
    enermy_score.innerHTML =  ` ${enermy_result} <br>`;
    enermy_score.classList.add("score")
    // console.log(me_result);
    // console.log(enermy_result);
    start.classList.add("disappear")
    re.classList.remove("disappear")
}
function vs(chracter){
    total = 0;
    for(let i = 0; i < 3; i++){
        let dice = Math.floor(Math.random()*6 + 1)        
        switch(dice){
            case 1:
                chracter.innerHTML += `<img src="./dice_image/1.png" class="dice pic">`
                break;
            case 2:
                chracter.innerHTML += `<img src="./dice_image/2.png" class="dice pic">`
                break;
            case 3:
                chracter.innerHTML += `<img src="./dice_image/3.png" class="dice pic">`
                break;
            case 4:
                chracter.innerHTML += `<img src="./dice_image/4.png" class="dice pic">`
                break;
            case 5:
                chracter.innerHTML += `<img src="./dice_image/5.png" class="dice pic">`
                break;
            case 6:
                chracter.innerHTML += `<img src="./dice_image/6.png" class="dice pic">`
                break;   
        }
        // console.log(dice)
        total = total + dice;
        // console.log(total);
    }  
    chracter.innerHTML +=  ` ${total} <br>`;
}
function compare(me_result,enermy_result){
    me_score.classList.add("score")
    enermy_score.classList.add("score")
    if(me_result > enermy_result){
        setTimeout(()=>final.innerHTML = `WIN`,300)      
    }else if(me_result == enermy_result){
        setTimeout(()=>final.innerHTML = `TIE`,300) 
    }else if(me_result < enermy_result){
        setTimeout(()=>final.innerHTML = `LOSE`,300) 
    }
}

re.onclick = function(){
    bg.style.opacity = "0";
    setTimeout(() => window.location.reload(),1000)
}

