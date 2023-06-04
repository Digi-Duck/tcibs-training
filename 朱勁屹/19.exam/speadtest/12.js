let img = document.querySelectorAll('.img');
let back = document.querySelector('.back');
let turn = document.querySelector('.turn');
let backImg = document.querySelector('.backImg');
let left = document.querySelector('.left');
let right = document.querySelector('.right');
let num = 0;
img.forEach(function (value,index) {
    value.addEventListener('click',function () {
        back.style = 'display:flex';
        backImg.src = value.src;
        num = index;
        
    });

})
turn.addEventListener('click',function () {
    back.style = 'display:none';
});
back.addEventListener('click',function () {
    back.style = 'display:none';
});
left.addEventListener('click',function (ev) {
    ev.stopPropagation();
    num--;
    backImg.src = img[num].src;
});

right.addEventListener('click',function (ev) {
    ev.stopPropagation();
    num++;
    backImg.src = img[num].src;
});


