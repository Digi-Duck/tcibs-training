const canvas = document.querySelector("#mycanvas")

//接著指定繪圖方式
const ctx = canvas.getContext("2d");

//讓canvas的高度和寬度等於整個畫面，讓整個視窗都是你的畫布
canvas.height = window.innerHeight-10;
canvas.width = window.innerWidth-10;

ctx.strokeStyle = '#BADA55';
//定義兩線相交時的拐角練習 round為圓弧。
ctx.lineJoin = "round"; 
//定義結束端點樣式 round為圓弧。
ctx.lineCap = "round"; 
//定義寬度
ctx.lineWidth = 200; 

let isDrawing = false;
let x = 0;
let y = 0;
let hue = 0;
let direction = true;

function draw(e){
    if (!isDrawing) return; //設定停止
    ctx.strokeStyle = `hsl(${hue},100%,80%)`; //定義繪畫的顏色

    // hsl是一個色彩表示的方式hsl(hue, Saturation, Lightness)。

    // hue代表顏色的度數0-360，0是紅色 ，120是綠色，240是藍色；
    // Saturation代表灰階程度，0%為灰黑，100%為彩色，一般設置為100%。
    // Lightness為亮度，0%代表黑，100%代表白，一般設置為50%。
    //產生一個新路徑，產生後再使用繪圖指令來設定路徑。
    ctx.beginPath();
    //我們用moveTo(x,y)來指定線的起點座標
    ctx.moveTo(x,y);
    //之後使用lineTo(x,y)來指定與前一個座標相連的點
    ctx.lineTo(e.offsetX,e.offsetY);
    //用stroke()來繪製相連點的線
    ctx.stroke();

    [x, y] = [e.offsetX, e.offsetY];

    hue++;
    if(hue == 360){
        hue = 0;
    }

    if(ctx.lineWidth >= 200 || ctx.lineWidth <= 1){
        direction = !direction;
    }

    if(direction){
        ctx.lineWidth++;
    }else{
        ctx.lineWidth--;
    }
  }

//開始繪圖
canvas.addEventListener('mousedown', (e)=> {
    isDrawing = true;
    [x, y] = [e.offsetX, e.offsetY];
});

canvas.addEventListener('mousemove', draw);//繪製圖片中
canvas.addEventListener('mouseup', ()=> isDrawing = false);//完成繪圖
canvas.addEventListener('mouseout', ()=> isDrawing = false);//取消繪圖
