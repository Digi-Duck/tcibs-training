<template>
    <div class="top">
        <button>新增專案</button>
        <button class="restore">復原</button>
        <button class="redo">重做</button>
        <button>儲存圖片</button>
        <button class="newLayer">新增圖層</button>
    </div>
    <main>
        <div class="left">
            <button @click="draw = false; drag = true;">選取</button>
            <button @click="draw = true; drag = false;">筆刷</button>
            <button>油漆桶</button>
            <input v-model="size" type="number">
            <input type="color" name="">
            <input type="range" min="0" max="255">
            <button class="stamp">樣章
                <div class="stampBox display"></div>
            </button>
            <button>儲存為樣章</button>
            <button>上傳圖片</button>

        </div>
        <div ref="center" class="center" @mousedown="down" @mousemove="move" @mouseup="up" @mouseleave="up">
            <canvas ref="canvas"></canvas>
            <img draggable="false" :src="img" alt="" v-for="img in imgs" @drag="img_darg">
        </div>
        <div class="right">
            <input class="layers_radio" type="radio" name="layers" id="layers0" checked>
            <label class="layers_label" for="layers0">圖層0</label>
        </div>
    </main>
</template>

<script>
    import { ref,onMounted, createElementBlock } from 'vue';
    export default{
        setup() {
            let canvas = ref(null);
            let center = ref(null);
            let ctx;
            let drawing = false;
            let draw = ref(true);
            let drag = ref(false);
            let startX;
            let startY;
            let endX;
            let endY;
            let size = ref(20);

            let imgs = ref([]);

            function setcanvas() {
                canvas.value.width = center.value.clientWidth;
                canvas.value.height = center.value.clientHeight;
                ctx = canvas.value.getContext('2d');
                ctx.lineCap = "round";
                ctx.lineJoin = "round";
            }
            function down(e) {
                if (draw.value) {                
                    ctx.lineWidth = size.value;
                    ctx.beginPath(); 
                    ctx.moveTo(e.offsetX, e.offsetY);
                    ctx.lineTo(e.offsetX, e.offsetY);
                    startX = endX = e.offsetX;
                    startY = endY = e.offsetY;
                    ctx.stroke();
                    drawing = true;
                }
            }
            function move(e) {
                if (drawing) {                    
                    ctx.lineTo(e.offsetX, e.offsetY);
                    ctx.stroke();
                    if (startX > e.offsetX) {
                        startX = e.offsetX
                    }
                    if (startY > e.offsetY) {
                        startY = e.offsetY
                    }
                    if (endX < e.offsetX) {
                        endX = e.offsetX
                    }
                    if (endY < e.offsetY) {
                        endY = e.offsetY
                    }
                }
            }
            function up() {
                if (drawing) {                    
                    startX -= size.value/2;
                    startY -= size.value/2;
                    endX += size.value/2;
                    endY += size.value/2;

                    if (startX <= 0) {
                        startX = 0;
                    }
                    if (startY <= 0) {
                        startY = 0;
                    }
                    if (endX >= canvas.value.width) {
                        endX = canvas.value.width;
                    }
                    if (endY >= canvas.value.height) {
                        endY = canvas.value.height;
                    }
                    
                    let img_width = endX - startX;
                    let img_heigth = endY - startY;

                    let img_data = ctx.getImageData(startX,startY,img_width,img_heigth);
                    let canvas_img = document.createElement('canvas');
                    canvas_img.width = img_width;
                    canvas_img.height = img_heigth;
                    console.log(img_width);
                    console.log(canvas_img.width);
                    ctx.clearRect(0, 0, canvas.value.width, canvas.value.height);

                    canvas_img.getContext('2d').putImageData(img_data,0,0);
                    imgs.value.push(canvas_img.toDataURL("image/png"));

                    drawing = false;
                }
            }

            function img_darg(e){
                if (drag.value) {
                    
                }else{
                    // e.target.draggable = false;
                }
            }

            onMounted(() => {
                setcanvas();
            });


            return {
                canvas,
                center,
                startX,
                startY,
                endX,
                endY,
                imgs,
                size,
                draw,
                drag,

                setcanvas,
                down,
                move,
                up,
                img_darg,
            }
        }
    }
</script>

<style >
    *{
        /* margin: 5px; */
        font-size: 25px;
        font-weight: 600;
        user-select: none;
    }
    input{
        width: 100px;
    }
    button{
        margin: 5px;
    }
    body{
        margin: 0px;
    }
    #app{
        width: 100%;
        height: 100vh;
        background-color: #565656;
        margin: 0px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    label{
        color: #ffffff;
    }  
    .top{
        width: 90%;
        display: flex;
    }
    main{
        width: 90%;
        height: 80vh;
        /* background-color: #ffffff; */
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 10px;
    }
    .left{
        width: 15%;
        height: 100%;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: space-around;
        align-content: center;
        background-color: #ffffff;
    }
    .left > *{
        width: 200px;
        text-align: center;
    }
    .right{
        width: calc(15% - 20px);
        height: calc(100% - 20px);
        display: flex;
        flex-direction: column-reverse;
        flex-wrap: wrap;
        align-content: center;
        background-color: #ffffff;
        padding: 10px;
    }
    .center{
        display: flex;
        position: relative;
        /* width: 67%;
        height: 100%; */
        width: 1100px;
        height: 750px;
        background-color: #ffffff;
    }
    .center > *{
        position: absolute;
        top: 0px;
        left: 0px;
    }
    .stamp{
        position: relative;
    }
    .stampBox{
        position: absolute;
        width: 200px;
        height: 200px;
        background-color: #888888;
        left: 140px;
        top: 0px;
        display: flex;
        justify-content: space-around;
        align-content: space-around;
    }
    .layers_label{
        width: 80%;
        text-align: center;
        background-color: #888888;
        margin: 5px;
        border: 2px solid #888888;
    }
    .layers_radio{
        display: none;
    }
    .layers_radio:checked + label{
        border-color: black;
    }
    .display{
        display: none;
    }
</style>
