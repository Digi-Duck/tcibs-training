const start = document.querySelector(".start")
const re = document.querySelector(".reload")
const group = document.querySelector(".row")

let i = 0;

start.onclick = function(){
    for(let i = 0; i < 3; i++){
        let dice = Math.floor(Math.random()*6 + 1)
        
        switch(dice){
            case 1:
                group.innerHTML += `<img src="./dice_image/1.png" class="dice pic">`
                break;
            case 2:
                group.innerHTML += `<img src="./dice_image/2.png" class="dice pic">`
                break;
            case 3:
                group.innerHTML += `<img src="./dice_image/3.png" class="dice pic">`
                break;
            case 4:
                group.innerHTML += `<img src="./dice_image/4.png" class="dice pic">`
                break;
            case 5:
                group.innerHTML += `<img src="./dice_image/5.png" class="dice pic">`
                break;
            case 6:
                group.innerHTML += `<img src="./dice_image/6.png" class="dice pic">`
                break;
        }
        console.log(dice)
    }   
}
re.onclick = function(){
    setTimeout(() => window.location.reload(),500)
}