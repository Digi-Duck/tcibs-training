const start = document.querySelector(".btn")
const box = document.querySelectorAll(".box")

function getrandom(){
     r = Math.floor(Math.random() * 256);
     g = Math.floor(Math.random() * 256);
     b = Math.floor(Math.random() * 256);
     x = Math.floor(Math.random() * 4)
    return r,g,b,x;
}

start.addEventListener('click', function() {
    start.removeEventListener('click', () => {})
    again();
})


function again(){
    getrandom();
    box.forEach(element => {
        element.style.backgroundColor = "rgb(" + r + "," + g + "," + b + ")"; 
        element.classList.remove("opacity") ;
        element.removeEventListener("click", () => {})
    });
    let opacity = box[x]
    opacity.classList.add("opacity");
    
    opacity.addEventListener('click', function() {
        opacity.removeEventListener('click', () => {})
        again();
    })
    
}