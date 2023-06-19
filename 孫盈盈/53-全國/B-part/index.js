function openOb(){
    let card = document.querySelector('.window');
    card.style.display = 'flex';

    let first = document.querySelector('#first');
    first.style.position = 'unset';
}
function addOb(){
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

let canvas = document.querySelectorAll('canvas');
let isDrawing = false;
let [lastX, lastY] = [0, 0];

canvas.forEach((element, index) => {
    let w = document.getElementById('w');
    let h = document.getElementById('h');
    element.width = w.value;
    element.height = h.value;
    console.log(element);
    let ctx = element.getContext('2d');

    element.addEventListener('mousedown', (e) => {
        isDrawing = true;
        [lastX, lastY] = [e.offsetX, e.offsetY];
        element.addEventListener('mousemove', draw);
    });
    element.addEventListener('mouseup', () => {
        isDrawing = false;
        element.removeEventListener('mousemove', draw);
    });
    element.addEventListener('mouseleave', () => {
        isDrawing = false;
        element.removeEventListener('mousemove', draw);
    });

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
});