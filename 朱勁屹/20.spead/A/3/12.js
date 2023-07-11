
let body = document.querySelector('body');
let html = document.querySelector('html');
let img = document.querySelectorAll('img');

body.innerHTML = `
<div class="back">
<div class="top">X</div>

<div class="main">
    <div class="left"><</div>
    <img class="img" src="" alt="">
    <div class="right">></div>

</div>
</div>
`;

let back = document.querySelector('.back');
let main = document.querySelector('.main');
let top = document.querySelector('.top');
let left = document.querySelector('.left');
let simg = document.querySelector('.img');
let right = document.querySelector('.right');
back.style = `
width: 100%;
height: 100%;
position: absolute;
top: 0px;
left: 0px;
background-color: rgba(202, 202, 202, 0.233);
font-size: 100px;
display: none;
`;
simg.style = `
width: 200px;
            height: 200px;
`;
top.style = `
width: 80%;
            margin: auto;
            height: 20%;
            text-align: right;
`;
main.style = `
width: 100%;
            height: 80%;
            display: flex;
            justify-content: space-around;
            align-items: center;
`;
html.style = `
width: 100%;
            height: 100%;

`;
body.style = `
width: 100%;
            height: 100%;
            margin: 0px;
`;
img.forEach(function (value,index) {
    value.addEventListener('click',function () {
        console.log(435);
        back.style = `
        width: 100%;
height: 100%;
position: absolute;
top: 0px;
left: 0px;
background-color: rgba(202, 202, 202, 0.233);
font-size: 100px;

        `;
    })
})