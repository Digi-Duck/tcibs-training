<template>
    <div class="top">
        <button>新增專案</button>
        <button class="restore">復原</button>
        <button class="redo">重做</button>
        <button>儲存圖片</button>
        <button class="newLayer" @click="setcanvas">新增圖層</button>
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
            <!-- <canvas ref="" v-for="canvas in layers" :width="canvas.w" :height="canvas.h" @click="clcik_darg"></canvas> -->
            <div class="layers_img" v-for="(i,n) in layers">
                <div class="img_box" v-for="(img,index) in i.imgs" :class="{border: img.isdrag && drag && !zoom,mouse_pointer: drag && !zoom}" :style="{ left: img.x-(img.w/2)+'px', top: img.y-(img.h/2)+'px',transform: 'rotate('+img.deg+'deg)'}" :key="index" @mousedown="down_darg(index,n)">
                    <img draggable="false" :src="img.src" alt="" :style="{width: img.w+'px', height: img.h+'px'}">
                    <div class="dot dot1" @mousedown.stop="dot_down(index,3)" @mousemove="move" @mouseup="up" :class="{ block: img.isdrag && drag }" style="left: -5px; top: -5px"></div>
                    <div class="dot dot2" @mousedown.stop="dot_down(index,2)" @mousemove="move" @mouseup="up" :class="{ block: img.isdrag && drag }" style="left: -5px; bottom: -5px"></div>
                    <div class="dot dot3" @mousedown.stop="dot_down(index,4)" @mousemove="move" @mouseup="up" :class="{ block: img.isdrag && drag }" style="right: -5px; top: -5px"></div>
                    <div class="dot dot4" @mousedown.stop="dot_down(index,1)" @mousemove="move" @mouseup="up" :class="{ block: img.isdrag && drag }" style="right: -5px; bottom: -5px"></div>
                    <div class="dot dot5" @mousedown.stop="spin_down(index)" @mousemove="move" @mouseup="up" :style="{ left: (img.w/2)+'px', top: -30+'px'}" :class="{ block: img.isdrag && drag }" style="right: -5px; bottom: -5px"></div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="layer_box" v-for="(i,n) in layers">
                <input class="layers_radio" type="radio" name="layers" :id="'layers'+i.id" checked @click="now_id = n;console.log(now_id);">
                <label class="layers_label" :for="'layers'+i.id">圖層{{ i.id }}</label>
            </div>
        </div>
    </main>
</template>

<script>
    import { ref,onMounted } from 'vue';
    export default{
        setup() {
            let layers = ref([]);
            let canvas;
            let center = ref(null);
            let draw = ref(true);
            let drag = ref(false);
            let fill = ref(false);
            let zoom = ref(false);
            let spin = ref(false);
            let img_id = ref(0);
            let layers_id = 0;
            let now_id = ref(0);
            let dot_id = 0;
            let ctx;
            let drawing = false;
            let draging = false;
            let startX;
            let startY;
            let endX;
            let endY;
            let centerX;
            let centerY;
            let mouseX;
            let mouseY;
            let canvas_top;
            let canvas_left;
            let size = ref(20);

            let imgs = ref([]);

            function setcanvas() {
                canvas = document.createElement('canvas');
                center.value.appendChild(canvas);
                canvas.width = center.value.clientWidth;
                canvas.height = center.value.clientHeight;
                ctx = canvas.getContext('2d');
                ctx.lineCap = "round";
                ctx.lineJoin = "round";
                canvas_top = canvas.getBoundingClientRect().top;
                canvas_left = canvas.getBoundingClientRect().left;

                layers.value[layers_id] = {
                    'id': layers_id,
                    'ctx': ctx,
                    'top': canvas_top,
                    'left': canvas_left,
                    'imgs': [],
                }
                now_id.value = layers_id;
                layers_id = layers_id + 1;
            }

            function down(e) {
                if (draw.value) {                
                    layers.value[now_id.value].ctx.lineWidth = size.value;
                    layers.value[now_id.value].ctx.beginPath(); 
                    layers.value[now_id.value].ctx.moveTo(e.clientX - layers.value[now_id.value].left, e.clientY - layers.value[now_id.value].top);
                    layers.value[now_id.value].ctx.lineTo(e.clientX - layers.value[now_id.value].left, e.clientY - layers.value[now_id.value].top);

                    startX = endX = e.clientX - layers.value[now_id.value].left;
                    startY = endY = e.clientY - layers.value[now_id.value].top;
                    layers.value[now_id.value].ctx.stroke();
                    drawing = true;
                }
            }
            function move(e) {
                if (drawing) {                    
                    layers.value[now_id.value].ctx.lineTo(e.clientX - layers.value[now_id.value].left, e.clientY - layers.value[now_id.value].top);
                    layers.value[now_id.value].ctx.stroke();

                    if (startX > e.clientX - layers.value[now_id.value].left) {
                        startX = e.clientX - layers.value[now_id.value].left
                    }
                    if (startY > e.clientY - layers.value[now_id.value].top) {
                        startY = e.clientY - layers.value[now_id.value].top
                    }
                    if (endX < e.clientX - layers.value[now_id.value].left) {
                        endX = e.clientX - layers.value[now_id.value].left
                    }
                    if (endY < e.clientY - layers.value[now_id.value].top) {
                        endY = e.clientY - layers.value[now_id.value].top
                    }
                }
                if (draging) {
                    layers.value[now_id.value].imgs[img_id.value].x = e.clientX - layers.value[now_id.value].left;
                    layers.value[now_id.value].imgs[img_id.value].y = e.clientY - layers.value[now_id.value].top;
                }
                if (zoom.value) {
                    endX = event.clientX - layers.value[now_id.value].left;
                    endY = event.clientY - layers.value[now_id.value].top;

                    let deg = Math.atan2(endY - startY, endX - startX);

                    let length = Math.sqrt(Math.pow(startX - endX, 2) + Math.pow(startY - endY, 2));
                    let x_direction = 1;
                    let y_direction = 1;
                    let img_deg = layers.value[now_id.value].imgs[img_id.value].deg*Math.PI/180;
                    let img_deg2 = layers.value[now_id.value].imgs[img_id.value].deg;

                    if (Math.cos(((dot_id*90 + img_deg2*2) - 45)*Math.PI/180) < 0){
                        x_direction = -1;
                    }                    
                    if (Math.sin(((dot_id*90 + img_deg2*2) - 45)*Math.PI/180) < 0){
                        y_direction = -1;
                    }

                    let x = length*Math.cos(deg);
                    let y = length*Math.sin(deg);

                    layers.value[now_id.value].imgs[img_id.value].x += x/2;
                    layers.value[now_id.value].imgs[img_id.value].y += y/2;
                    
                    layers.value[now_id.value].imgs[img_id.value].w += length*Math.cos(img_deg + deg) * x_direction;
                    layers.value[now_id.value].imgs[img_id.value].h += length*Math.sin(img_deg + deg) * y_direction;

                    startX = event.clientX - layers.value[now_id.value].left;
                    startY = event.clientY - layers.value[now_id.value].top;
                }
                if (spin.value) {
                    endX = event.clientX - layers.value[now_id.value].left;
                    endY = event.clientY - layers.value[now_id.value].top;

                    let direct = ((startX - centerX) * (endY - centerY)) - ((startY - centerY) * (endX - centerX));
                    let a =  Math.sqrt(Math.pow(startX - endX, 2) + Math.pow(startY - endY, 2));
                    let b =  Math.sqrt(Math.pow(startX - centerX, 2) + Math.pow(startY - centerY, 2));
                    let c =  Math.sqrt(Math.pow(centerX - endX, 2) + Math.pow(centerY - endY, 2));
                    let cosA = (Math.pow(b, 2) + Math.pow(c, 2) - Math.pow(a, 2)) / (2 * b * c);
                    let degA = Math.round(Math.acos(cosA) * 180 / Math.PI);

                    if (direct > 0) {
                        layers.value[now_id.value].imgs[img_id.value].deg += degA;
                    }else{
                        layers.value[now_id.value].imgs[img_id.value].deg -= degA;
                    }

                    startX = event.clientX - layers.value[now_id.value].left;
                    startY = event.clientY - layers.value[now_id.value].top;
                }
            }
            function up() {
                if (drawing) {            
                    if (size.value > 1) {                        
                        startX -= size.value/2;
                        startY -= size.value/2;
                        endX += size.value/2;
                        endY += size.value/2;
                    }else{
                        startX -= 1;
                        startY -= 1;
                        endX += 1;
                        endY += 1;
                    }

                    if (startX <= 0) {
                        startX = 0;
                    }
                    if (startY <= 0) {
                        startY = 0;
                    }
                    if (endX >= canvas.width) {
                        endX = canvas.width;
                    }
                    if (endY >= canvas.height) {
                        endY = canvas.height;
                    }
                    
                    let img_width = endX - startX;
                    let img_height = endY - startY;

                    let img_data = layers.value[now_id.value].ctx.getImageData(startX,startY,img_width,img_height);
                    let canvas_img = document.createElement('canvas');
                    canvas_img.width = img_width;
                    canvas_img.height = img_height;
                    layers.value[now_id.value].ctx.clearRect(0, 0, canvas.width, canvas.height);

                    canvas_img.getContext('2d').putImageData(img_data,0,0);
                    let img = {
                        'src': canvas_img.toDataURL("image/png"),
                        'x': startX + (img_width/2) - 3,
                        'y': startY + (img_height/2) - 3,
                        'w': img_width,
                        'h': img_height,
                        'deg': 0,
                    }
                    layers.value[now_id.value].imgs.unshift(img);
                    console.log(layers.value);
                    drawing = false;
                }
                if (draging) {
                    draging = false;
                }
                if (zoom.value) {
                    zoom.value = false;
                }
                if (spin.value) {
                    spin.value = false;
                }
            }

            function down_darg(i,id){
                console.log(id);
                if (drag.value && id == now_id.value) {
                    draging = true;
                    img_id.value = i;
                    layers.value.forEach(layer => {
                        layer.imgs.forEach(e=>{
                            e.isdrag = false;
                        })
                    });
                    layers.value[now_id.value].imgs[i].isdrag = true;
                    
                    mouseX = event.offsetX - layers.value[now_id.value].left;
                    mouseY = event.offsetY - layers.value[now_id.value].top;

                    let deg = (Math.atan2(layers.value[now_id.value].imgs[img_id.value].y - mouseY, layers.value[now_id.value].imgs[img_id.value].x - mouseX));
                    if (deg<0) {
                        deg = deg + (Math.PI*2);
                    }
                    let x_direction = 1;
                    let y_direction = 1;
                    if (Math.cos(deg) < 0) {
                        x_direction = -1;
                    }
                    if (Math.sin(deg) < 0) {
                        y_direction = -1;
                    }
                    mouseX = (mouseX * x_direction)/2;
                    mouseY = mouseY * y_direction;
                }
            }
            function clcik_darg(e) {
                if (drag) {
                    layers.value[now_id.value].imgs.forEach(e=>{
                        e.isdrag = false;
                    })
                }
            }

            function dot_down(i,n) {
                if (drag.value) {
                    zoom.value = true;
                    startX = centerX = event.clientX - layers.value[now_id.value].left;
                    startY = centerY = event.clientY - layers.value[now_id.value].top;
                    img_id.value = i;
                    dot_id = n;
                }
            }

            function spin_down(i) {
                spin.value = true;
                centerX = layers.value[now_id.value].imgs[i].x;
                centerY = layers.value[now_id.value].imgs[i].y;
                startX = event.clientX - layers.value[now_id.value].left;
                startY = event.clientY - layers.value[now_id.value].top;
                img_id.value = i;
            }

            onMounted(() => {
                setcanvas(layers_id);
            });

            return {
                layers,
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
                fill,
                zoom,
                spin,
                draging,
                img_id,
                now_id,

                setcanvas,
                down,
                move,
                up,
                down_darg,
                clcik_darg,
                dot_down,
                spin_down,
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
    img{
        display: block;
    }
    .img_box{
        position: absolute;
        padding: 2px;
        border: 1px dashed #56565600;
    }
    .dot{
        width: 10px;
        height: 10px;
        background-color: #565656;
        border-radius: 50%;
        position: absolute;
        display: none;
    }
    .dot:hover{
        background-color: #888888;
    }
    .dot3:hover,.dot2:hover{
        cursor: ne-resize;
    }
    .dot1:hover,.dot4:hover{
        cursor: nw-resize;
    }
    .dot5{
        cursor: pointer;
    }
    .block{
        display: block;
    }
    .mouse_pointer{
        cursor: pointer;
    }
    .border{
        border: 1px dashed #565656;
        cursor: move;
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
        width: 80%;
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
        width: 67%;
        height: 100%;
        /* width: 1100px;
        height: 750px; */
        background-color: #ffffff;
        overflow: hidden;
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
    .layer_box{
        width: 80%;
        display: flex;
    }
    .layers_label{
        flex-grow: 1;
        text-align: center;
        background-color: #888888;
        margin: 5px;
        border: 2px solid #888888;
        border-radius: 5px;
    }
    .layers_radio{
        display: none;
    }
    .layers_radio:checked + label{
        border-color: rgb(41, 41, 41);
    }
    .display{
        display: none;
    }
</style>
