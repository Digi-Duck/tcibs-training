const box = document.querySelectorAll(".box");
const color = document.querySelector(".color");

let r,g,b;
r = Math.floor(Math.random() * 255);
g = Math.floor(Math.random() * 255);
b = Math.floor(Math.random() * 255);

box.forEach(function(element){
    element.style.backgroundColor = `rgb( 255, 255, 255)`;
    element.addEventListener('click', function(){
        element.style.backgroundColor = `rgb(${r},${g},${b})`;
    })
})
