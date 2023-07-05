let img = document.querySelectorAll('img');
let body = document.querySelector('body');
let html = document.querySelector('html');
body.style = `
            width: 100%;
            height: 100%;
            margin: 0px;
`;
html.style = `
            width: 100%;
            height: 100%;
`;

img.forEach(function (value,index) {
    value.addEventListener('click',function (eve) {
        body.innerHTML += `
        <div class="back">
            <div class="left"><</div>
            <img class="img" src="" alt="">
            <div class="right">></div>
    </div>
        `;
        let back = document.querySelector('.back');
        back.style = `
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.11);
            position:fixed;
            top:0px;
            left:0px;
            display:flex;
            justify-content: space-around;
            align-items: center;
        `;
        let a = index;
        let sImg = document.querySelector('.img');
        let left = document.querySelector('.left');
        let right = document.querySelector('.right');
        sImg.src = img[a].src;

        left.style = `
            font-size: 300px
        `;
        sImg.style = `
            width:500px;
            height:500px;
        `;
        right.style = `
            font-size: 300px
        `;
        left.addEventListener('click',function () {
            a--;
            sImg.src = img[a].src;

        })
        right.addEventListener('click',function () {
            a++;
            sImg.src = img[a].src;

        })
    })
})