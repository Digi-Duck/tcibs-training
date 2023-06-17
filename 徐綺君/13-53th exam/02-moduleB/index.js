var black = document.getElementById("black");
var blue = document.getElementById("blue");
var green = document.getElementById("green");
var red = document.getElementById("red");


var body = document.getElementById("body");
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
ctx.fillStyle='#fff';
ctx.fillRect(0,0,canvas.width,canvas.height);
var rect = canvas.getBoundingClientRect();
var x = 0, y = 0, dib = false, bucket = false, beforecolor;
var colorpen="#000"
var range = 8;
var capline = 'round';
movs = new Array();

console.log(0xFF0000FF);


canvas.addEventListener('mousedown', function(e){

        x = Math.floor(e.pageX - rect.left);
        y = Math.floor(e.pageY - rect.top);
        

    if(bucket === true){

        floodFill(ctx, Math.floor(x), Math.floor(y), 0xFF008000);
    }
    else{
       movs.push("STOP");
        dib = true; 
    }
    
});

canvas.addEventListener('mousemove', function(e){

    detectcolorfill(e);

    if(dib === true){
             dibujar(x, y, Math.floor(e.pageX - rect.left), Math.floor(e.pageY - rect.top), colorpen, range);
             movs.push([x, y, Math.floor(e.pageX - rect.left), Math.floor(e.pageY - rect.top), colorpen, range]);
             x = Math.floor(e.pageX - rect.left);
             y = Math.floor(e.pageY - rect.top);

    }
});

canvas.addEventListener('mouseup', function(e){
    if(dib === true){
        dibujar(x, y, Math.floor(e.pageX - rect.left), Math.floor(e.pageY - rect.top), colorpen, range);
        
        async function mandar(){
            
           await movs.push([x, y, Math.floor(e.pageX - rect.left), Math.floor(e.pageY - rect.top), colorpen, range]);
           await movs.push("STOP");

        }

        mandar();

        
        x=0;
        y=0;
        dib = false;


    }
    

});



blue.addEventListener('click', detectcolor);
black.addEventListener('click', detectcolor);
green.addEventListener('click', detectcolor);
red.addEventListener('click', detectcolor);

    



function detectcolor(e){

    switch(e.target.dataset.color){
        case 'black': 
            colorpen = 'black'; 
            beforecolor = 'black'; 
            break;
        case 'blue': 
            colorpen = 'blue'; 
            beforecolor = 'blue'; 
            break;
        case 'green': 
            colorpen = 'green'; 
            beforecolor = 'green'; 
            break;
        case 'red': 
            colorpen = 'red'; 
            beforecolor = 'red'; 
            break;

    }

}

function othercolor(value){
    colorpen = value;
    beforecolor = value;
}

function linerange(value){
    range = value;
}

function keypress(value){
    switch(value.code){
        case 'NumpadAdd': range++; break;
        case 'NumpadSubtract': range > 1 ? range-- : 0; break;
    }
}

function borrador(){
    colorpen = 'white';
}

function pincel(){
    capline = 'round';
    colorpen = beforecolor;
    bucket = false;
}

function rgbToHex(r, g, b) {
    
     if (r > 255 || g > 255 || b > 255)
        throw "Invalid color component";
    return ((r << 16) | (g << 8) | b).toString(16);   

    
}

function cubeta(){
    
    bucket = true;
    
}

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
    
    // make a Uint32Array view on the pixels so we can manipulate pixels
    // one 32bit value at a time instead of as 4 bytes per pixel
    const pixelData = {
      width: imageData.width,
      height: imageData.height,
      data: new Uint32Array(imageData.data.buffer),
    };
    
    // get the color we're filling
    const targetColor = getPixel(pixelData, x, y);
    console.log(targetColor + '-' + fillColor);
    
    // check we are actually filling a different color
    if (androidToRgba(targetColor) !== androidToRgba(fillColor)) {
    
      const pixelsToCheck = [x, y];
      while (pixelsToCheck.length > 0) {
        const y = pixelsToCheck.pop();
        const x = pixelsToCheck.pop();
        
        const currentColor = getPixel(pixelData, x, y);
        if (currentColor === targetColor) {
          pixelData.data[y * pixelData.width + x] = fillColor;
          pixelsToCheck.push(x + 1, y);
          pixelsToCheck.push(x - 1, y);
          pixelsToCheck.push(x, y + 1);
          pixelsToCheck.push(x, y - 1);
        }
      }
      
      // put the data back
      ctx.putImageData(imageData, 0, 0);
    }
  }

  function androidToRgba(color){
    const colorArray = []
    for(let i=0; i<4; i++){
      colorArray.push(color % 256)
      color>>>=8
    }
    colorArray.pop()
    const alpha = 1;
    return `rgba(${colorArray.reverse()},${alpha})`
  }



function detectcolorfill(e){
    var point = ctx.getImageData(e.pageX - rect.left, e.pageY - rect.top, 1, 1).data;
    var hex = "#" + ("000000" + rgbToHex(point[0], point[1], point[2])).slice(-6);
    color = hex;
    console.log(hex);
}


function dibujar(x1, y1, x2, y2, color, rango){
    ctx.beginPath();
    ctx.strokeStyle = color;
    ctx.lineWidth = rango;
    ctx.lineCap = capline;
    ctx.moveTo(x1, y1);
    ctx.lineTo(x2, y2);
    ctx.stroke();
    ctx.closePath();
}

function borrarcanva(){

    ctx.fillStyle='#fff';
    ctx.fillRect(0,0,canvas.width,canvas.height);
    movs = [];

}

function deshacer(){
    if(movs.length === 1){
        movs = [];
    }

    for(j=0;j<2;j++){
        ctx.fillStyle='#fff';
        ctx.fillRect(0,0,canvas.width,canvas.height);

    if(movs.length !== 0){
        movs.pop();
        while(movs[movs.length-1] !== "STOP"){
            movs.pop();
        }
       
         for(i=0;i<movs.length;i++){
            if(movs[i] === "STOP"){
                i++;
            }
                dibujar(movs[i][0], movs[i][1], movs[i][2], movs[i][3], movs[i][4], movs[i][5]);
        }   
 
    }

    else{
        movs = [];
        return 0;
    }
    }

}