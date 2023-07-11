const oldImg = document.querySelector('#old');
const newImg = document.querySelector('#new');

const image = new Image();
image.src = oldImg.src;

image.onload = () => {
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');

    canvas.width = image.width;
    canvas.height = image.height;

    ctx.drawImage(image, 0, 0);

    const imageData = ctx.getImageData(0, 0, image.width, image.height);
    const data = imageData.data;

    for (let i = 0; i < data.length; i += 10) {
        // 生成隨機的顏色值
        const noise = Math.random() * 255;

        // 將像素的 RGB 值設置為隨機顏色值
        data[i] = noise; // 紅色
        data[i + 1] = noise; // 綠色
        data[i + 2] = noise; // 藍色
    }

  // 將修改後的像素數據重新放回 canvas
    ctx.putImageData(imageData, 0, 0);

    // ctx.font = "100px serif"; // 字級 字體
    // ctx.fillStyle = "gray";

    // // 在圖片上重複顯示 "SAMPLE" 文字
    // const xSpacing = 500; // 文字間的水平間距
    // const ySpacing = 200; // 文字間的垂直間距

    // for (let x = 0; x < canvas.width; x += xSpacing) {
    //     for (let y = 0; y < canvas.height; y += ySpacing) {
    //     ctx.fillText("SAMPLE", x, y + 100);
    //     }
    // }
    
    // 將處理後的圖片顯示在網頁上
    newImg.src = canvas.toDataURL();
    // download(canvas.toDataURL(), "result.png");
};
function download(base64Data, fileName) {
        const link = document.createElement('a');
        link.href = base64Data;
        link.download = fileName;
        link.click();
}
image.src = url;
