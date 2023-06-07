const imgGroup = document.querySelectorAll('.img');
const back = document.querySelector('.back');
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');
const lightImg = document.querySelector('.lightImg');
const lightBox = document.querySelector('.lightBox');

imgGroup.forEach((img,i) => {
    img.addEventListener('click',()=>{
        lightBox.classList.remove('display')
        lightImg.src = img.src
        prev.addEventListener('click',(e)=>{
            e.stopPropagation();
            i = i - 1
            if (i < 0) {
                i = imgGroup.length - 1;
            }
            lightImg.src = imgGroup[i].src
        })
        next.addEventListener('click',(e)=>{
            e.stopPropagation();
            i = i + 1
            if (i > imgGroup.length - 1) {
                i = 0;
            }
            lightImg.src = imgGroup[i].src
        })
    })
});
back.addEventListener('click',(e)=>{
    e.stopPropagation();
    lightBox.classList.add('display')
})
lightBox.addEventListener('click',()=>{
    lightBox.classList.add('display')
})