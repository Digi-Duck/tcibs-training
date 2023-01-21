const box = document.querySelectorAll(".box")
let keyboard = [ 65, 83 , 68, 70, 71, 72, 74, 75, 76]

//監聽我按的鍵盤按鍵
window.addEventListener('keydown',function(e){
    console.log(e.keyCode);
    for(let i = 0; i < 9; i++){
        if(keyboard[i] == e.keyCode){
            box.forEach(function(element,index){
                index = i;
                box[index].classList.toggle('effect')
            });
        }
    }
})