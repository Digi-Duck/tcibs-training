<template>
  <header>
        <div>
          <RouterLink to="/">
            <button class="add" style="margin-right: 20px;">新增專案</button>
          </RouterLink>
            <button class="undo no">復原</button>
            <button class="redo no">重做</button>
        </div>
        <button class="right save">儲存圖片</button>
    </header>
    <hr>
    <main class="update d-flex">
      <div class="function d d-flex blue btns">
        <label for="color">
          <input type="color" class="box" style="padding: 10px;" v-model="color">
        </label>
        <label for="range">
          <input type="range" min="1" max="51" step="5" v-model="size">
        </label>
          <button class="point" @click="state = 0">選取</button>
          <button class="draw" @click="state = 1">畫筆</button>
          <button class="fill" @click="state = 2" style="font-size: 20px;">油漆桶</button>
          <button class="paint" @click="state = 3">樣章</button>
          <div class="pattern d-flex center" :style="{ display: state == 3 ? 'flex' : 'none' }">
              <button class="add-pattern" id="add-pattern" @click="addPattern">+</button>
              <input type="file" accept="image/*" class="input-pattern none" ref="file">
              <div class="patterns d-flex" style="padding: 0;">
                <img v-for="pattern in patterns.list" :src="pattern" class="patternImg" :class="{ border: pattern === selectedPattern }" @click="selectPattern(pattern)">
              </div>
          </div>
      </div>
      <div class="canvas"
        :style="{ backgroundColor: c }"
        @mousemove="movingFather"
      >
          <canvas
            :width="w" :height="h"
            :style="{ zIndex: state == 0 ? 1 : 1000 }"
            @mousedown="start"
            @mousemove="moving"
            @mouseup="finish"
            @mouseout="finish"
          ></canvas>
          <img class="moveImg" :src="movePattern"  :style="moveImgStyle">
          <div class="imgFather" v-for="(object, index) in objects" :key="index"
          :style="{
            ...object.style,
            border: index === selectedObject ? '1px dashed #565656' : '',
            cursor: index === selectedObject ? 'move' : 'pointer'
            }"
            @click.capture="selectObject(index)"
            @mousedown.capture="startDrag(index)"
            @mouseup.capture="endDrag"
          >
            <img :src="object.src" draggable="false">
            <div  id="circle" :style="{ display: index === selectedObject ? 'block' : 'none', left: parseInt(object.style.width) / 2 - 15 + 'px', top: '-50px' }"></div>
            <div :style="{display: index === selectedObject ? 'block' : 'none', left: '-20px', top: '-20px', cursor: 'se-resize'}" @click="changeSize(1)"></div>
            <div :style="{display: index === selectedObject ? 'block' : 'none', right: '-20px', top: '-20px', cursor: 'sw-resize'}" @click="changeSize(2)"></div>
            <div :style="{display: index === selectedObject ? 'block' : 'none', left: '-20px', bottom: '-20px', cursor: 'sw-resize'}" @click="changeSize(3)"></div>
            <div :style="{display: index === selectedObject ? 'block' : 'none', right: '-20px', bottom: '-20px', cursor: 'se-resize'}" @click="changeSize(4)"></div>
          </div>
      </div>
      <div class="object layer blue">
          <div class="d-flex center">
              <p>圖層物件列表</p>
              <div class="btn-group d-flex">
                  <button class="smallBtn layerAdd">+</button>
                  <button class="smallBtn layerDel">-</button>
              </div>
          </div>
          <div class="layers">
              <button class="layerBtn" style="background-color: #565656;">Layer1</button>
          </div>
      </div>
  </main>
</template>

<script>
import { ref, onMounted, reactive, watch, computed } from 'vue';

export default {
  setup() {
    const w = ref(localStorage.getItem('w') || '1280');
    const h = ref(localStorage.getItem('h') || '720');
    const c = ref(localStorage.getItem('c') || '#ffffff');
    const state = ref(4);
    const canvas = ref(null);
    const ctx = ref(null);
    const color = ref('#000000');
    const size = ref(21);
    const isPointing = ref(false);
    const isDrawing = ref(false);
    const isFilling = ref(false);
    const isPainting = ref(false);
    const isFinished = ref(false);
    const maxX = ref(0);
    const minX = ref(0);
    const maxY = ref(0);
    const minY = ref(0);
    const fatherCanvas = ref(null);
    const file = ref(null)
    const patterns = reactive({
      list: []
    });
    const moveImgStyle = reactive({
      left: '0px',
      top: '0px',
      display: 'none',
      width: '0px',
      height: '0px'
    });
    const selectedPattern = ref(null);
    const movePattern = ref(null);
    const image = ref(new Image());
    const objects = reactive([]);
    const selectedObject = ref(null);
    const draggedObject = ref(null);
    const isDragging = ref(false)
    const objectW = reactive([]);
    const objectH = reactive([]);
    watch(size, (newSize) => {
      moveImgStyle.width = newSize * 5 + 'px';
      moveImgStyle.height = newSize * 5 + 'px';
    });

    onMounted(() => {
      fatherCanvas.value = document.querySelector('.canvas')
      fatherCanvas.value.style.height = `${h.value}px`
      canvas.value = document.querySelector('canvas');
      ctx.value = canvas.value.getContext('2d');
      moveImgStyle.width = size.value * 5 + 'px';
      moveImgStyle.height = size.value * 5 + 'px';

      file.value.addEventListener('change', addPatternFile);
    });

    function newImg (startX, startY, imgW, imgH){
      const newData = ctx.value.getImageData(startX, startY, imgW, imgH);
      const newCan = document.createElement('canvas');
      const newCtx = newCan.getContext('2d');
      newCan.width = imgW;
      newCan.height = imgH;
      newCtx.putImageData(newData, 0, 0);
      objectW.push(imgW)
      objectH.push(imgH)
      objects.push({
        src: newCan.toDataURL(),
        style: {
          left: `${startX}px`,
          top: `${startY}px`,
          width: `${imgW}px`,
          height: `${imgH}px`
        }
      });
      ctx.value.clearRect(0, 0, w.value, h.value);
    };
    function addPattern(){
      file.value.click()
    }
    const addPatternFile = (e) => {
      const file = e.target.files[0]
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          patterns.list.push(e.target.result);
        }
        reader.readAsDataURL(file);
      }
    }
    const selectPattern = (pattern) => {
      selectedPattern.value = pattern;
      movePattern.value = pattern;
      image.value.src = pattern;
      moveImgStyle.display = 'block';
    };
    const start = (e) => {
      isFinished.value = false;
      if(state != 3){
        moveImgStyle.display = 'none';
      }
      if(state != 0){
        selectedObject.value = null
      }
      switch (state.value) {
        case 0:
          isPointing.value = true;
          break;
        case 1:
          isDrawing.value = true;
          moving(e);
          break;
        case 2:
          isFilling.value = true;
          break;
        case 3:
          isPainting.value = true;
          moving(e);
          break;
        default:
          isDrawing.value = false;
          isPainting.value = false;
          isFilling.value = false;
          isPointing.value = false;
          break;
      }
      minX.value = e.offsetX;
      maxX.value = e.offsetX;
      minY.value = e.offsetY;
      maxY.value = e.offsetY;
    };

    const moving = (e) => {
      ctx.value.strokeStyle = color.value;
      ctx.value.lineWidth = size.value;
      const x = e.offsetX;
      const y = e.offsetY;
      if (x < minX.value) {
        minX.value = x;
      }
      if (x > maxX.value) {
        maxX.value = x;
      }
      if (y < minY.value) {
        minY.value = y;
      }
      if (y > maxY.value) {
        maxY.value = y;
      }
      if (isDrawing.value) {
        ctx.value.lineJoin = 'round';
        ctx.value.lineCap = 'round';
        ctx.value.lineTo(e.offsetX, e.offsetY);
        ctx.value.stroke();
        ctx.value.beginPath();
        ctx.value.moveTo(e.offsetX, e.offsetY);
      }
      moveImgStyle.left = `${e.offsetX - size.value * 2.5}px`;
      moveImgStyle.top = `${e.offsetY - size.value * 2.5}px`;
      if(isPainting.value){
        ctx.value.save();
        ctx.value.translate(e.offsetX - size.value * 2.5, e.offsetY - size.value * 2.5);
        ctx.value.beginPath();
        ctx.value.drawImage(image.value, 0, 0, size.value * 5, size.value * 5);
        ctx.value.closePath();
        ctx.value.stroke();
        ctx.value.restore();
      }
    };
    const selectObject = (index) => {
      selectedObject.value = index
      draggedObject.value = index;

    }
    const startDrag = (index) => {
      isDragging.value = true;
      selectedObject.value = index
      draggedObject.value = index;
    }
    const endDrag = () => {
      isDragging.value = false;
      draggedObject.value = null;
    };
    const movingFather = (e) => {
      if(isDragging.value && draggedObject.value !== null){
        let i = draggedObject.value
        const object = objects[i];
        const rect = fatherCanvas.value.getBoundingClientRect();
        const left = e.clientX - rect.left - objectW[i] / 2;
        const top = e.clientY - rect.top - objectH[i] / 2;
        object.style.left = `${left}px`;
        object.style.top = `${top}px`;
      }
    }
    const changeSize = (direction) => {
      let i = selectedObject.value
      switch (direction) {
        case 1:
            // objects[i].width =
          break;
        case 2:

          break;
        case 3:
          
          break;
        case 4:
          
          break;
        default:
          break;
      }
    }
    const finish = () => {
      if (isFinished.value) return;
      isFinished.value = true;
      if(isDrawing.value){
        ctx.value.beginPath();
        newImg(minX.value - 30, minY.value - 30, maxX.value - minX.value + 60, maxY.value - minY.value + 60);
        isDrawing.value = false;
      }
      if (isPainting.value) {
        newImg(minX.value - size.value * 3, minY.value - size.value * 3, maxX.value - minX.value + size.value * 6, maxY.value - minY.value + size.value * 6);
        isPainting.value = false;
      }
    };
    return {
      w,
      h,
      c,
      state,
      canvas,
      ctx,
      color,
      size,
      isPointing,
      isDrawing,
      isFilling,
      isPainting,
      start,
      moving,
      finish,
      addPattern,
      file,
      patterns,
      addPatternFile,
      selectedPattern,
      selectPattern,
      movePattern,
      moveImgStyle,
      objects,
      selectObject,
      selectedObject,
      startDrag,
      endDrag,
      isDragging,
      draggedObject,
      movingFather,
      changeSize,
    };
  },
};
</script>

<style>
.active{
  display: block;
}
.btns button, .box{
    width: 75px;
    height: 75px;
    padding: 0;
    margin: 10px;
}
.function{
    position: relative;
    justify-content: space-between;
}
.object{
    width: 270px;
    max-height: 75vh;
    overflow-y: scroll;
}
.blue{
  padding: 10px;
  background-color: lightgray;
  border-radius: 10px;
}
/* .disable{
    color: #a5a4a4;
}
.no{
    cursor: not-allowed;
}
.no:hover{
    background-color: lightgray;
}
.no:hover .disable{
    color: #a5a4a4;
} */
.object p{
    color: #565656;
    margin: 20px 0;
    line-height: 50px;
}
#add-pattern{
    width: 30px;
    height: 30px;
    padding: 0;
    margin: 5px;
}
.smallBtn{
    width: 30px;
    height: 30px;
    padding: 0;
    margin-left: 5px;
}
.canvas *{
  text-align: left;
}
canvas{
  position: relative;
}
.layerBtn{
    width: 80%;
    height: 50px;
    background-color: #fff;
    border: 2.5px solid lightgray;
    color: lightgray;
    margin: 10px 0;
    height: 75px;
}
.pattern{
    position: absolute;
    background-color: lightgray;
    left: 85%;
    bottom: 0;
    border-radius: 10px;
    height: 100px;
    z-index: 1001;
    padding: 10px;
}
.patternImg{
    width: 100px;
    height: 100px;
    object-fit: cover;
    border: 5px solid lightgray;
    margin: 5px;
    border-radius: 10px;
    cursor: pointer;
    box-sizing: border-box;
}
input[type="range"]{
    -webkit-appearance: none;
    width: 75px;
    background: none;
    overflow:hidden;
}
input[type="range"]::-webkit-slider-runnable-track {
    -webkit-appearance: none;
    height: 5px;
    border-radius: 4px;
    background: #565656;
}
input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    position: relative;
    height: 20px;
    width: 20px;
    margin-top: -8px;
    background-color: #fff;
    border-radius: 50%;
}
.canvas{
    position: relative;
    background-color: #fff;
    overflow: hidden;
}
.moveImg{
    position: absolute;
    pointer-events: none;
}
.imgFather img{
    user-select: none;
    position: absolute;
    z-index: 5;
}
.pointed{
    border: 2px dashed #565656;
    box-sizing: border-box;
}
.imgFather div{
    position: absolute;
    width: 20px;
    height: 20px;
    background-color: lightgray;
}
.imgFather{
  position: absolute;
  z-index: 2;
  box-sizing: border-box;
}
.imgFather #circle{
    width: 30px;
    height: 30px;
    border-radius: 50%;
}
.border{
  border: 3px solid #565656;
}
.moveImg{
  z-index: 1001;
}
/* img{
  object-fit: cover;
} */
</style>
