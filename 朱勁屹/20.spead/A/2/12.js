let img = document.querySelectorAll('img');
let body = document.querySelector('body');
let html = document.querySelector('html');
body.style = `
height: 100%;
    width: 100%;
    margin: 0px;
`;
html.style = `
height: 100%;
    width: 100%;

`;
body.innerHTML += `
    <div class="back">
    <div class="left"><</div>
    <img class="img" src="\" alt="">
    <div class="right">></div>
    <div class="X">X</div>

</div>
`;
let left = document.querySelector('.left');
let simg = document.querySelector('.img');
let right = document.querySelector('.right');
let back = document.querySelector('.back');


img.forEach(function (value,index) {
    back.style = 'display:none';
    value.addEventListener('click',function (eve) {
        
        a = index;
        simg.src = img[a].src;
        back.style = `
        position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            z-index: 99;
            background-color: rgba(196, 196, 196, 0.103);
            display: flex;
            justify-content: space-around;
            align-items: center;
            font-size: 300px;
        `;
        simg.style = `
            width: 200px;
            height: 200px;
        `;
        left.addEventListener('click',function () {
            a--;
            simg.src = img[a].src;
        })
        right.addEventListener('click',function () {
            a++;
            simg.src = img[a].src;
        })
    })
})