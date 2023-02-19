const click = document.querySelectorAll(".rectangle");
const t = document.querySelectorAll(".top")
const c = document.querySelectorAll(".center")
const b = document.querySelectorAll(".bottom")
const secret = document.querySelector(".secret")


click.forEach(function(element,index) {
    element.addEventListener('click',function(){
        element.classList.toggle('flex')
        t[index].classList.toggle('transt');
        c[index].classList.toggle('big');
        b[index].classList.toggle('transb');
    })
});
