const bigBox = document.querySelector('.bigBox');
const colorBox = document.querySelector('.color');
let color = '';

for (let x = 0; x < 16; x++) {
    for (let y = 0; y < 16; y++) {
        bigBox.innerHTML += `<div class="box"></div>`;
    } 
}

for (let x = 0; x < 12; x++) {
    colorBox.innerHTML += `<div class="circle" style="background-color: ${ getRGB() }"></div>`;
} 

function getRGB() {
    const rgb = Array.from({ length: 3 }, () => Math.floor(Math.random() * 256));
    return `rgb(${rgb.join(', ')})`;
}

const circle = document.querySelectorAll('.circle');
circle[0].style.borderColor = 'yellow';
color = circle[0].style.backgroundColor;

circle.forEach(element => {
    element.addEventListener('click', function () {
        circle.forEach(circle => {
            circle.style.borderColor = '';
        });
        element.style.borderColor = 'yellow';
        color = element.style.backgroundColor;
    });
});

const box = document.querySelectorAll('.box');
let isMouseDown = false; // 追蹤滑鼠按鍵是否按下

box.forEach(element => {
    element.addEventListener('mousedown', function () {
        isMouseDown = true; // 設置滑鼠按鍵狀態為按下
        element.style.backgroundColor = color;
    });

    element.addEventListener('mousemove', function () {
        if (isMouseDown) {
            element.style.backgroundColor = color;
        }
    });
});

// 監聽滑鼠按鍵釋放事件
document.addEventListener('mouseup', function () {
    isMouseDown = false; // 設置滑鼠按鍵狀態為釋放
});
