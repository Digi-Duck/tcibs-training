const start = document.querySelector(".btn")
const box = document.querySelectorAll(".box")

let r = Math.floor(Math.random() * 256);
let g = Math.floor(Math.random() * 256);
let b = Math.floor(Math.random() * 256);

start.addEventListener("click", function(){
    let x = Math.floor(Math.random() * 4);
    box.forEach(function(index,element){
        box[element].style.backgroundColor = "rgb("+ r + "," + g + "," + b + ")" ;      
        box[x].style.opacity = "0.1";
    })
})

