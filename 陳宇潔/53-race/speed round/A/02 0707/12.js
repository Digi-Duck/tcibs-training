const img = document.querySelectorAll('img')
const btn = document.querySelectorAll('button')
const target = document.querySelector('.bg img')
const bg = document.querySelector('.bg')
let now = 0
img.forEach((element, index) => {
    element.addEventListener('click', function(){
        now = index
        target.src = img[now].src
        bg.style.display = 'flex'
    })
    btn[0].addEventListener('click', close)
    bg.addEventListener('click', close)
    function close(e){
        if(e.target == btn[0] || e.target == bg){
            bg.style.display = 'none'
        }
    }
    btn[1].addEventListener('click', function(){
        now = (now != 0) ? now - 1 : img.length - 2
        target.src = img[now].src
    })
    btn[2].addEventListener('click', function(){
        now = (now != img.length - 2) ? now + 1 : 0
        target.src = img[now].src
    })
})