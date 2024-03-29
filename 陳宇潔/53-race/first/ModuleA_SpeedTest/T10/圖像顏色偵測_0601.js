const magnifier = document.querySelector('.magnifier')
const img = document.querySelector('img')
const canvas = document.querySelector('#canvas');
const ctx = canvas.getContext('2d');

img.addEventListener('mousemove', function(e){
    const mouseX = e.offsetX
    const mouseY = e.offsetY
    // console.log(mouseX, mouseY)
    // 設置放大鏡的位置
    magnifier.style.left = mouseX + 10 + 'px';
    magnifier.style.top = mouseY + 10 + 'px';

    // 繪製放大圖像
    drawMagnifiedImage(mouseX, mouseY);
})

// 繪製放大圖像
function drawMagnifiedImage(mouseX, mouseY) {
    ctx.clearRect(0, 0, magnifier.clientWidth, magnifier.clientHeight); // 清除canvas內容
    
    let size = img.naturalHeight / img.height
    ctx.drawImage(img, (mouseX - 7) * size, (mouseY - 7) * size, 14 * size, 14 * size, 0, 0, 100, 100);
    
    // console.log(img.clientWidth, img.naturalWidth);
     // 繪製網格線
    ctx.fillStyle = 'rgba(255, 255, 255, 0.5)';// 網格線顏色

    // 繪製垂直網格線
    for (let x = 0; x < canvas.width; x += 9) {
        ctx.fillRect(x, 0, 1, canvas.height);
    }

    // 繪製水平網格線
    for (let y = 0; y < canvas.height; y += 9) {
        ctx.fillRect(0, y, canvas.width, 1);
    }

    // 繪製紅色空心四方形
    ctx.strokeStyle = 'rgba(255, 0, 0)'; // 紅色邊線顏色
    ctx.lineWidth = 2; // 邊線寬度
    ctx.strokeRect(46, 46, 9, 9); // 繪製紅色空心四方形

    const colorBox = document.querySelector('.color');
    const hexBox = document.querySelector('.hex');
    const imageData = ctx.getImageData(47, 47, 9, 9);
    const pixels = imageData.data;
    let r = pixels[0]
    let g = pixels[1]
    let b = pixels[2]
    colorBox.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
    let  rgb = [r, g, b];
    let hex = rgb.map(c => c.toString(16).padStart(2, '0')).join('');
    hexBox.innerHTML = `#${hex}`
}

// 取input[file]的照片
const files = document.querySelector('input');
files.addEventListener('change', function(e) {
    let file = e.target.files[0];
    let reader = new FileReader();

    reader.onload = function(e) {
        img.src = e.target.result;
        img.style.display = 'block'
        magnifier.style.display = 'block'  
    };
    reader.readAsDataURL(file);

});