const box = document.querySelectorAll(".box");
const audio = document.querySelectorAll(".audio");
let keyboard = [ 65, 83 , 68, 70, 71, 72, 74, 75, 76];

//監聽我按的鍵盤按鍵
window.addEventListener('keydown',function(e){
    console.log(e.keyCode);
    for(let i = 0; i < 9; i++){
        if(keyboard[i] == e.keyCode){
            box.forEach(function(){
                box[i].classList.add('effect');
                setTimeout(function(){
                    box[i].classList.remove('effect');
                },2000)
            });
            audio.forEach(function(){
                audio[i].currentTime = 0;
                audio[i].play();
            })
        }
    }
})