const add = document.querySelector('.add')
add.addEventListener('click', function() {
    if(window.confirm('確定離開編輯頁面?')){
        location.href =  `./add.html`
    }
})

let w = localStorage.getItem('w');
let h = localStorage.getItem('h')
const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d');
if (w && h) {
    canvas.width = w;
    canvas.height = h;
}
const color = document.querySelector('.color')
const line = document.querySelector('.line')

let lastX = 0
let lastY = 0;
let isDrawing = isFilling = isPainting = isPointing = false;
let state = 0
const pointBtn = document.querySelector('.point');
pointBtn.addEventListener('click', function() {
    state = 0
});
const drawBtn = document.querySelector('.draw')
drawBtn.addEventListener('click', function(){
    state = 1
})
const fillBtn = document.querySelector('.fill');
fillBtn.addEventListener('click', function() {
    state = 2
});
const paintBtn = document.querySelector('.paint');
const patternBox = document.querySelector('.pattern');
paintBtn.addEventListener('click', function() {
    state = 3
    patternBox.classList.toggle('none')
    // canvas.addEventListener('mousemove', function(e){
    //     moveImg.style.diplay = 'block';
    //     const mouseX = e.offsetX
    //     const mouseY = e.offsetY
    //     moveImg.style.left = mouseX + 10 + 'px';
    //     moveImg.style.top = mouseY + 10 + 'px';
    // });
});
const addPattern = document.querySelector('.add-pattern')
const inputattern = document.querySelector('.input-pattern')
addPattern.addEventListener('click', function(){
    inputattern.click()
})
const moveImg = document.querySelector('.moveImg');
            
const patterns = document.querySelector('.patterns');
let image = new Image()
inputattern.addEventListener('change', function(event){
    const file = event.target.files[0]
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            patterns.innerHTML += `<img src="${e.target.result}" class="patternImg">` 
            const pattern = document.querySelectorAll('.patternImg')
            pattern.forEach(element => {
                element.addEventListener('click', function(){
                    pattern.forEach(element => element.classList.remove('border'))
                    element.classList.add('border')
                    image.src = element.src;
                    moveImg.src = element.src;
                })
            })
        }
        reader.readAsDataURL(file);
    }
})
// let layer = {
//     object: []
// }
let object = []
let maxX, minX, maxY, minY
canvas.addEventListener('mousedown', start); // 開始繪製
function start(e) {
    minX = e.offsetX
    maxX = e.offsetX
    minY = e.offsetY
    maxY = e.offsetY
    if(state == 1){
        isDrawing = true
        draw(e);
        canvas.addEventListener('mousemove', draw); // 繪製路徑
        canvas.addEventListener('mouseup', drawEnd); //完成繪圖
        canvas.addEventListener('mouseleave', drawEnd); //取消繪圖
    }
    // switch (state) {
    //     case 1:
    //         isPainting = isFilling = isPainting = false;
    //         isDrawing = true
    //         draw(e);
    //         canvas.addEventListener('mousemove', draw); // 繪製路徑
    //         canvas.addEventListener('mouseup', drawEnd); //完成繪圖
    //         canvas.addEventListener('mouseleave', drawEnd); //取消繪圖
    //         break;
    //     case 2:
    //         isPainting = isDrawing = isPainting = false;
    //         isFilling = true
    //         fillColor = '0xff' + color.value.substr(5, 2) + color.value.substr(3, 2) + color.value.substr(1, 2) 
    //         floodFill(ctx, e.offsetX, e.offsetY, fillColor);
    //         break;
    //     case 3:
    //         isDrawing = isFilling = isPainting = false
    //         isPainting = true
    //         paint(e)
    //         canvas.addEventListener('mousemove', paint); // 繪製路徑
    //         canvas.addEventListener('mouseup', paintEnd); //完成繪圖
    //         canvas.addEventListener('mouseleave', paintEnd); //取消繪圖
    //         break;
    //     default:
    //         break;
    // }
}

// draw
function draw(e) {
    if (isDrawing) {
        x = e.offsetX;
        y = e.offsetY;
        if (x < minX) {
            minX = x
        }
        if (x > maxX) {
            maxX = x
        }
        if (y < minY) {
            minY = y
        }
        if (y > maxY) {
            maxY = y
        }
        ctx.lineJoin = "round";
        ctx.lineCap = 'round';
        ctx.strokeStyle = color.value
        ctx.lineWidth = line.value
        ctx.lineTo(e.offsetX, e.offsetY);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(e.offsetX, e.offsetY);
    }
}
function drawEnd(e){
    console.log(maxX, minX, maxY, minY );
    if (isDrawing) {
        isDrawing = false;
        ctx.beginPath();
        // push();
        newImg(minX - 30, minY - 30, maxX - minX + 60, maxY - minY + 60)
    }
}
// const undoBtn = document.querySelector('.undo');
// const redoBtn = document.querySelector('.redo');
// undoBtn.addEventListener('click', undo);
// redoBtn.addEventListener('click', redo);
let step = 0
// let pushArray = [canvas.toDataURL()]
const fatherCanvas = document.querySelector('.canvas')
// function newImg(startX, startY, endX, endY){
//     ctx.drawImage(canvas, startX, startY, endX - startX, endY - startY);
//     const img = new Image();
//     img.src = canvas.toDataURL();
//     img.onload = (e) => {
//         e.preventDefault()
//     }
//     fatherCanvas.appendChild(img);
//     img.style = `
//         position: absolute; 
//         z-index: 1;
//         left: ${0}px; 
//         top: ${0}px;"
//     `
//     ctx.clearRect(0, 0, w, h);
// }

function newImg(startX , startY, imgW, imgH){
    // console.log(startX , startY, imgW, imgH);
    newData = ctx.getImageData(startX, startY, imgW, imgH);
    const newCan = document.createElement('canvas');
    const newCtx = newCan.getContext('2d');
    newCan.width = imgW;
    newCan.height = imgH;
    newCtx.putImageData(newData, 0, 0); 
    const img = new Image();
    img.src = newCan.toDataURL();
    // img.onload = (e) => {
    //     e.preventDefault()
    // }    
    fatherCanvas.appendChild(img);
    img.style = `
        position: absolute; 
        z-index: 2;
        left: ${startX}px; 
        top: ${startY}px;"
    `
    ctx.clearRect(0, 0, w, h);
}
// function newImg(){
//     let objectpic = new Image(); //建立新的 Image
//     objectpic.src = pushArray[step]; //載入剛剛存放的影像
//     objectpic.onload = function() {
//         ctx.drawImage(objectpic, 0, 0) //匯出影像並從座標 x:0 y:0 開始
//     }
// }
function push() {
    // step++;
    newImg()
}
// function undo() {
//     if (step > 0) {
//         step--;
//         newImg(step)
//     }
// }
// function redo() {
//     if (step < pushArray.length - 1) {
//         step++;
//         newImg(step)
//     }
// }
// fill
function getPixel(pixelData, x, y) {
    if (x < 0 || y < 0 || x >= pixelData.width || y >= pixelData.height) {
        return -1;  // impossible color
    } else {
        return pixelData.data[y * pixelData.width + x];
    }
}
function floodFill(ctx, x, y, fillColor) {
    // read the pixels in the canvas
    const imageData = ctx.getImageData(0, 0, ctx.canvas.width, ctx.canvas.height);
    const pixelData = {
        width: imageData.width,
        height: imageData.height,
        data: new Uint32Array(imageData.data.buffer),
    };

    // get the color we're filling
    const targetColor = getPixel(pixelData, x, y);
    
    // check we are actually filling a different color
    if (targetColor !== fillColor) {
        const spansToCheck = [];
        function addSpan(left, right, y, direction) {
            spansToCheck.push({left, right, y, direction});
        }
        
        function checkSpan(left, right, y, direction) {
        let inSpan = false;
        let start;
        let x;
        for (x = left; x < right; ++x) {
            const color = getPixel(pixelData, x, y);
            if (color === targetColor) {
                if (!inSpan) {
                inSpan = true;
                start = x;
                }
            } else {
                if (inSpan) {
                inSpan = false;
                addSpan(start, x - 1, y, direction);
                }
            }
            }
            if (inSpan) {
            inSpan = false;
            addSpan(start, x - 1, y, direction);
            }
        }
        
        addSpan(x, x, y, 0);
        
        while (spansToCheck.length > 0) {
            const {left, right, y, direction} = spansToCheck.pop();
            
            // do left until we hit something, while we do this check above and below and add
            let l = left;
            for (;;) {
            --l;
            const color = getPixel(pixelData, l, y);
            if (color !== targetColor) {
                break;
            }
            }
            ++l
            
            let r = right;
            for (;;) {
            ++r;
            const color = getPixel(pixelData, r, y);
            if (color !== targetColor) {
                break;
            }
            }
    
            const lineOffset = y * pixelData.width;
            pixelData.data.fill(fillColor, lineOffset + l, lineOffset + r);
            
            if (direction <= 0) {
            checkSpan(l, r, y - 1, -1);
            } else {
            checkSpan(l, left, y - 1, -1);
            checkSpan(right, r, y - 1, -1);
            }
            
            if (direction >= 0) {
            checkSpan(l, r, y + 1, +1);
            } else {
            checkSpan(l, left, y + 1, +1);
            checkSpan(right, r, y + 1, +1);
            }     
        }
        // put the data back
        ctx.putImageData(imageData, 0, 0);
        // push();
    }
}
// paint
function paint(e){
    if (isPainting) {
        const mouseX = e.offsetX
        const mouseY = e.offsetY
        moveImg.style.left = mouseX + 10 + 'px';
        moveImg.style.top = mouseY + 10 + 'px';

        ctx.save();
        ctx.translate(e.offsetX - line.value * 2.5, e.offsetY - line.value * 2.5);
        ctx.beginPath();
        ctx.drawImage(image, 0, 0, line.value * 5, line.value * 5);
        ctx.closePath();
        ctx.stroke();
        ctx.restore();
    }
}
function paintEnd(){
    if (isPainting) {
        isPainting = false;
        // push()
    }
}
// // // point
// layer
const layerAdd = document.querySelector('.layerAdd');
const layerDel = document.querySelector('.layerDel');
const layers = document.querySelector('.layers');
let layer_count = 1;
function AllLayer() {
    const layerBtns = document.querySelectorAll('.layerBtn');
    layerBtns.forEach((element) => {
        element.addEventListener('click', function() {
        console.log(1);
        layerBtns.forEach((btn) => (btn.style.backgroundColor = '#fff'));
        element.style.backgroundColor = '#565656';
        });
    });
}
layerAdd.addEventListener('click', function() {
    layer_count++;
    layers.innerHTML += `<button class="layerBtn">Layer${layer_count}</button>`;
    AllLayer();
});
AllLayer();
// // save
// const date = new Date().toLocaleString();
// const newStr = date.replace(/\D/g, ".");
// const arr = newStr.split(/\D+/);
// const newArr = arr.map(item => item.length % 2 !== 0 ? "0" + item : item);
// newArr.splice(3, 0, "_");
// const finalStr = newArr.join("");

// const saveBtn = document.querySelector('.save');// 儲存圖片
// saveBtn.addEventListener('click', save);
// function save() {
//     const canvasDataURL = canvas.toDataURL('image/png'); // jpg
//     const a = document.createElement('a');
//     a.href = canvasDataURL;
//     a.download = finalStr;
//     a.click();
// }