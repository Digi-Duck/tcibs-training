function openOb() {
    let card = document.querySelector('.window');
    card.style.display = 'flex';
  
    let first = document.querySelector('#first');
    first.style.position = 'unset';
  }
  
  function addOb() {
    let card = document.querySelector('.window');
    card.style.display = 'none';
  
    let w = document.getElementById('w');
    let h = document.getElementById('h');
    let first = document.querySelector('#first');
  
    first.style.position = 'relative';
    first.style.width = w.value + 'px';
    first.style.height = h.value + 'px';
  
    let layers = document.querySelector('.layers');
    layers.innerHTML = `<div class="layer">
                              <input type="text" value="layer1">
                              <input type="checkbox" name="layer" checked>
                          </div>`;
  }
  
  let canvasList = document.querySelectorAll('canvas');
  let isDrawing = false;
  let [lastX, lastY] = [0, 0];
  let undoStack = [];
  let redoStack = [];
  
  canvasList.forEach((element, index) => {
    let w = document.getElementById('w');
    let h = document.getElementById('h');
    element.width = w.value;
    element.height = h.value;
    element.classList.add('canvas_' + index);
    console.log(element);
    let ctx = element.getContext('2d');
  
    element.addEventListener('mousedown', (e) => {
      isDrawing = true;
      [lastX, lastY] = [e.offsetX, e.offsetY];
      element.addEventListener('mousemove', draw);
      saveDrawing(element);
    });
    element.addEventListener('mouseup', () => {
      isDrawing = false;
      element.removeEventListener('mousemove', draw);
    });
  
    let undoBtn = document.querySelector('.up');
    let redoBtn = document.querySelector('.down');
  
    undoBtn.addEventListener('click', undo);
    redoBtn.addEventListener('click', redo);
  
    function draw(e) {
      let color = document.getElementById('color');
      let paintWidth = document.getElementById('width');
  
      ctx.lineWidth = paintWidth.value;
      ctx.strokeStyle = color.value;
      ctx.beginPath();
      ctx.moveTo(lastX, lastY);
      ctx.lineTo(e.offsetX, e.offsetY);
      ctx.stroke();
  
      ctx.lineJoin = 'round';
      ctx.lineCap = 'round';
  
      [lastX, lastY] = [e.offsetX, e.offsetY];
    }
  
    function saveDrawing(canvas) {
      let drawingData = canvas.toDataURL();
      undoStack.push(drawingData);
      redoStack = [];
    }
  
    function undo() {
      if (undoStack.length > 0) {
        let drawing = undoStack.pop();
        redoStack.push(element.toDataURL());
        restoreDrawing(element, drawing);
      }
    }
  
    function redo() {
      if (redoStack.length > 0) {
        let drawing = redoStack.pop();
        undoStack.push(element.toDataURL());
        restoreDrawing(element, drawing);
      }
    }
  
    function restoreDrawing(canvas, drawingData) {
      let img = new Image();
      img.onload = function () {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(img, 0, 0);
      };
      img.src = drawingData;
    }
  });
  