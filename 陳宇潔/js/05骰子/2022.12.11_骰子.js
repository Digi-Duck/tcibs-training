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

// start.onclick = function(){
//     let me_result = 0;
//     for(let j = 0; j < 10; j++){
//         vs(me);
//         me_result = me_result + total;
//     } 
//     me_score.innerHTML = ` ${me_result} <br>`;

//     let enermy_result = 0;

//     for(let j = 0; j < 10; j++){
//         vs(enermy);
//         enermy_result = enermy_result + total;
//     } 
//     enermy_score.innerHTML =  ` ${enermy_result} <br>`;
//     console.log(me_result);
//     console.log(enermy_result);
//     start.classList.add("disappear")
//     re.classList.remove("disappear")
// }
// function vs(chracter){
//     let total = 0;
//     for(let i = 0; i < 3; i++){
//         let dice = Math.floor(Math.random()*6 + 1)        
//         switch(dice){
//             case 1:
//                 chracter.innerHTML += `<img src="./dice_image/1.png" class="dice pic">`
//                 break;
//             case 2:
//                 chracter.innerHTML += `<img src="./dice_image/2.png" class="dice pic">`
//                 break;
//             case 3:
//                 chracter.innerHTML += `<img src="./dice_image/3.png" class="dice pic">`
//                 break;
//             case 4:
//                 chracter.innerHTML += `<img src="./dice_image/4.png" class="dice pic">`
//                 break;
//             case 5:
//                 chracter.innerHTML += `<img src="./dice_image/5.png" class="dice pic">`
//                 break;
//             case 6:
//                 chracter.innerHTML += `<img src="./dice_image/6.png" class="dice pic">`
//                 break;   
//         }
//         console.log(dice)
//         total = total + dice;
//     }  
//     chracter.innerHTML +=  ` ${total} <br>`;
// }
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

start.onclick = function(){
    let me_result = 0;
    for(let j = 0; j < 10; j++){
        let total = 0;
        for(let i = 0; i < 3; i++){
            let dice = Math.floor(Math.random()*6 + 1)        
            switch(dice){
                case 1:
                    me.innerHTML += `<img src="./dice_image/1.png" class="dice pic">`
                    break;
                case 2:
                    me.innerHTML += `<img src="./dice_image/2.png" class="dice pic">`
                    break;
                case 3:
                    me.innerHTML += `<img src="./dice_image/3.png" class="dice pic">`
                    break;
                case 4:
                    me.innerHTML += `<img src="./dice_image/4.png" class="dice pic">`
                    break;
                case 5:
                    me.innerHTML += `<img src="./dice_image/5.png" class="dice pic">`
                    break;
                case 6:
                    me.innerHTML += `<img src="./dice_image/6.png" class="dice pic">`
                    break;   
            }
            console.log(dice)
            total = total + dice;
        }  
        me.innerHTML +=  ` ${total} <br>`;
        me_result = me_result + total;
    } 
    me_score.innerHTML = ` ${me_result} <br>`;

    let enermy_result = 0;

        for(let j = 0; j < 10; j++){
            let total = 0;
            for(let i = 0; i < 3; i++){
                let dice = Math.floor(Math.random()*6 + 1)        
                switch(dice){
                    case 1:
                        enermy.innerHTML += `<img src="./dice_image/1.png" class="dice pic">`
                        break;
                    case 2:
                        enermy.innerHTML += `<img src="./dice_image/2.png" class="dice pic">`
                        break;
                    case 3:
                        enermy.innerHTML += `<img src="./dice_image/3.png" class="dice pic">`
                        break;
                    case 4:
                        enermy.innerHTML += `<img src="./dice_image/4.png" class="dice pic">`
                        break;
                    case 5:
                        enermy.innerHTML += `<img src="./dice_image/5.png" class="dice pic">`
                        break;
                    case 6:
                        enermy.innerHTML += `<img src="./dice_image/6.png" class="dice pic">`
                        break;   
                }
                console.log(dice)
                total = total + dice;
            }  
            enermy.innerHTML +=  ` ${total} <br>`;
            enermy_result = enermy_result + total;
        } 
        enermy_score.innerHTML =  ` ${enermy_result} <br>`;
        console.log(me_result);
        console.log(enermy_result);
        start.classList.add("disappear")
        re.classList.remove("disappear")
        compare(me_result,enermy_result);
}