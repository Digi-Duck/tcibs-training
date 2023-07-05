const img = document.querySelectorAll('img')
const x = document.querySelector('.x')
const btn = document.querySelectorAll('.btn')
const imgArea = document.querySelector('.imgArea')
const bg = document.querySelector('.bg')
let now = 0

img.forEach((element, index) => {
    element.addEventListener('click', function(){
        now = index
        imgArea.src = img[now].src
        bg.style.display = 'flex'
    })
});
btn.forEach((element, index) => {
    element.addEventListener('click', function(){
        if(index){
            now = (now !== 3) ? now + 1 : 0;
            imgArea.src = img[now].src
        }else{
            now = (now !== 0) ? now - 1 : 3;
            imgArea.src = img[now].src
        }
    })
});
x.addEventListener('click', close)
bg.addEventListener('click', close)
function close(e){
    if (e.target === x || e.target === bg) {
        bg.style.display = 'none'
    }
}
