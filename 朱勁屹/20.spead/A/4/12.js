let body = document.querySelector('body');
let html = document.querySelector('html');
body.style.cssText = `
width: 100%;
            height: 100%;
            margin: 0px;
`; 
html.style.cssText = `
width: 100%;
            height: 100%;
            margin: 0px;
`;
body.innerHTML += `
<div class="back">
    <div class="top">
        X
    </div>
    <div class="main">
        <div class="left"><</div>
        <img class="sImg" src="" alt="">
        <div class="right">></div>
    </div>
</div>
`;
let img = document.querySelectorAll('body>img');
let back = document.querySelector('.back');
back.style.cssText = 'display:none';
let top1 = document.querySelector('.top');
top1.style.cssText = `
width: 80%;
            margin: auto;
            text-align: right;
`;
let main = document.querySelector('.main');
main.style.cssText = `
height: 80%;
            display: flex;
            justify-content: space-around;
            align-items: center;
`;
let sImg = document.querySelector('.sImg');
let left = document.querySelector('.left');
let right = document.querySelector('.right');


console.log(img);
let a = 0;
img.forEach(function (value,index) {
    value.addEventListener('click',function (e) {
        a = index;
        back.style.cssText = `
            width: 100%;
            height: 100%;
            background-color: rgba(182, 182, 182, 0.171);
            position: absolute;
            top: 0px;
            left: 0px;
            font-size: 100px;
        `;
        sImg.src = img[a].src;

    })
    
});
left.addEventListener('click',function () {
    a--;
    sImg.src = img[a].src;
})
right.addEventListener('click',function () {
    a++;
    sImg.src = img[a].src;
})
top1.addEventListener('click',function (value,index) {
    back.style = 'display:none';
})
