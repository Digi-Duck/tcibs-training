<template>
  <header>
        <div>
          <RouterLink to="/">
            <button class="add" style="margin-right: 20px;" @click.prevent="back">新增專案</button>
          </RouterLink>
            <button @click="undo" class="undo no">&larr;</button>
            <button @click="redo" class="redo no">&rarr;</button>
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
                <img v-for="(pattern, index) in patterns.list" :key="index" :src="pattern" class="patternImg" :class="{ border: pattern === selectedPattern }" @click="selectPattern(pattern)">
              </div>
          </div>
      </div>
      <div class="canvas" :style="{ backgroundColor: c }">
        <canvas v-for="(layer, index) in layers" :key="index"
          :width="w" :height="h" 
          :style="{ zIndex: index === selectedLayer ? (!state ? 1000 : 1002) : layer.zIndex }"
          @mousedown="start"
          @mousemove="moving"
          @mouseup="finish"
          @mouseout="finish"
        ></canvas>
        <img class="moveImg" :src="movePattern"  :style="{...moveImgStyle}">
        <div class="imgFather" v-for="(object, index) in layers[selectedLayer].objects" :key="index"
        :style="{
          ...object.style,
          border: index === selectedObject ? '1px dashed #565656' : '',
          cursor: index === selectedObject ? 'move' : 'pointer',
          zIndex: index === selectedObject ? 1003 : 'auto'
          }"
          @click="selectObject(index)"
          @mousedown="startDrag(index, $event)"
        >
          <img :src="object.src" draggable="false" @click.stop :style="{width: object.style.width, height: object.style.height}">
          <div  id="circle" :style="{ display: index === selectedObject ? 'block' : 'none', left: parseInt(object.style.width) / 2 - 15 + 'px', top: '-50px', cursor: 'grab' }" @mousedown.stop="startRotate(index, $event)"></div>
          <div :style="{display: index === selectedObject ? 'block' : 'none', left: '-16px', top: '-16px', cursor: 'se-resize'}" @mousedown.stop="startResize(index, 1, $event)"></div>
          <div :style="{display: index === selectedObject ? 'block' : 'none', right: '-16px', top: '-16px', cursor: 'sw-resize'}" @mousedown.stop="startResize(index, 2, $event)"></div>
          <div :style="{display: index === selectedObject ? 'block' : 'none', left: '-16px', bottom: '-16px', cursor: 'sw-resize'}" @mousedown.stop="startResize(index, 3, $event)"></div>
          <div :style="{display: index === selectedObject ? 'block' : 'none', right: '-16px', bottom: '-16px', cursor: 'se-resize'}" @mousedown.stop="startResize(index, 4, $event)"></div>
        </div>
        <div class="imgFather" v-for="(object, index) in getAllObjects" :key="index"
        :style="{...object.style, 
        border: index === selectedObject ? '1px dashed #565656' : '', cursor: index === selectedObject ? 'move' : 'pointer'
        }">
          <img :src="object.src" draggable="false" @click.stop :style="{ width: object.style.width, height: object.style.height }">
        </div>
      </div>
      <div class="object layer blue">
          <div class="d-flex center">
              <p>圖層物件列表</p>
              <div class="btn-group d-flex">
                  <button @click="addLayer" class="smallBtn">+</button>
                  <button @click="delLayer" class="smallBtn">-</button>
              </div>
          </div>
          <div class="layers">
            <button 
            v-for="(layer, index) in layers" :key="index" class="layerBtn" @click="selectLayer(index)"
            :class="{ selected: index == selectedButton }"
            :style="{backgroundColor: index == selectedLayer ? '#565656' : '#ffffff' }"
            >
              <button :style="{backgroundColor: index == selectedLayer ? '#565656' : '#ffffff' }" @click="moveLayerUp(index)">&uarr;</button>
              {{ layer.name }}
              <button :style="{backgroundColor: index == selectedLayer ? '#565656' : '#ffffff' }" @click="moveLayerUp(index)">&darr;</button>
          </button>
          </div>
      </div>
  </main>
</template>

<script>
import { ref, onMounted, reactive, watch, computed  } from 'vue';
import { useRouter, RouterLink } from 'vue-router';
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
      width: '0px',
      height: '0px',
      display: 'none'
    });
    const selectedPattern = ref(null);
    const movePattern = ref(null);
    const image = ref(new Image());
    const selectedObject = ref(null);
    const draggedObject = ref(null);
    const rotatedObject = ref(null);
    const selectedLayer = ref(0);
    const selectedButton = ref(0);
    const layers = reactive([
      {
        name: 'Layer1',
        zIndex: 10,
        objects: reactive([])
      }
    ]);
    const undoObjects = reactive([])
    const redoObjects = reactive([])
    const historyIndex = ref(0);
    watch(size, (newSize) => {
      moveImgStyle.width = newSize * 5 + 'px';
      moveImgStyle.height = newSize * 5 + 'px';
    });
    watch(state, (newState) => {
      console.log(newState);
      if(newState != 3){
        moveImgStyle.display = 'none';
      }
      if(newState != 0){
        selectedObject.value = null;
      }
    });
    onMounted(() => {
      selectedLayer.value = 0;
      fatherCanvas.value = document.querySelector('.canvas')
      fatherCanvas.value.style.width = `${w.value}px`
      fatherCanvas.value.style.height = `${h.value}px`
      canvas.value = document.querySelectorAll('canvas');
      ctx.value = canvas.value[selectedLayer.value].getContext('2d');
      moveImgStyle.width = size.value * 5 + 'px';
      moveImgStyle.height = size.value * 5 + 'px';

      file.value.addEventListener('change', addPatternFile);
    });
    const moveLayerUp = (index) => {
      if (index > 0) {
        const layer = layers[index];
        layers.splice(index, 1);
        layers.splice(index - 1, 0, layer);
      }
    };

    const moveLayerDown = (index) => {
      if (index < layers.length - 1) {
        const layer = layers[index];
        layers.splice(index, 1);
        layers.splice(index + 1, 0, layer);
      }
};
    const getAllObjects = computed(() => {
      const objects = [];
      for (const layer of layers.slice().reverse()) {
        objects.push(...layer.objects);
      }
      return objects;
    });
    const addLayer = () => {
      const newLayer = {
        name: `Layer${layers.length + 1}`,
        zIndex: layers.length + 10,
        objects: reactive([])
      };
      layers.push(newLayer);
    };
    const delLayer = () => {
      if (layers.length > 1) {
        layers.splice(selectedLayer.value, 1);
        selectedLayer.value = Math.max(0, selectedLayer.value - 1);
      }
    };
    const selectLayer = (index) => {
      selectedLayer.value = index;
    };
    const back = () => {
      const confirmed = window.confirm('是否離開編輯頁面?');
      if (confirmed) {
        useRouter().push('/');
      }
    }
    function newImg (startX, startY, imgW, imgH){
      const newData = ctx.value.getImageData(startX, startY, imgW, imgH);
      const newCan = document.createElement('canvas');
      const newCtx = newCan.getContext('2d');
      newCan.width = imgW;
      newCan.height = imgH;
      newCtx.putImageData(newData, 0, 0);
      const newObject = {
        src: newCan.toDataURL(),
        style: {
          left: `${startX}px`,
          top: `${startY}px`,
          width: `${imgW}px`,
          height: `${imgH}px`,
          rotation: 0
        }
      };
      historyIndex.value += 1;
      layers[selectedLayer.value].objects.push(newObject);
      undoObjects.push({
        layerIndex: selectedLayer.value,
        objectIndex: layers[selectedLayer.value].objects.length - 1,
        object: newObject
      });
      ctx.value.clearRect(0, 0, w.value, h.value);
    };
    function undo() {
      if (historyIndex.value > 0) {
        const removedObject = layers[selectedLayer.value].objects.pop();
        if (removedObject) {
          const removedObjectIndex = layers[selectedLayer.value].objects.indexOf(removedObject);
          if (removedObjectIndex !== -1) {
            layers[selectedLayer.value].objects.splice(removedObjectIndex, 1);
          }
        }
        redoObjects.push({
          layerIndex: selectedLayer.value,
          objectIndex: layers[selectedLayer.value].objects.length,
          object: layers[selectedLayer.value].objects
        });
        historyIndex.value--;
        ctx.value.clearRect(0, 0, w.value, h.value);
      }
    }

    function redo() {
      if (redoObjects.length > 0 && historyIndex.value < redoObjects.length) {
        const { layerIndex, objectIndex } = redoObjects[historyIndex.value];
        const object = redoObjects[historyIndex.value];
        layers[layerIndex].objects.splice(objectIndex, 0, object);
        historyIndex.value++;
        ctx.value.clearRect(0, 0, w.value, h.value);
      }
    }
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
        moveImgStyle.display = 'block'
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
    const startDrag = (index, event) => {
      draggedObject.value = index;
      selectedObject.value = index;
      const startX = event.clientX;
      const startY = event.clientY;
      const object = layers[selectedLayer.value].objects[index];
      const left = parseInt(object.style.left);
      const top = parseInt(object.style.top);

      const handleMouseMove = (e) => {
          const offsetX = e.clientX - startX;
          const offsetY = e.clientY - startY;
          object.style.left = `${left + offsetX}px`;
          object.style.top = `${top + offsetY}px`;
      };
      const handleMouseUp = () => {
        draggedObject.value = null;
        fatherCanvas.value.removeEventListener('mousemove', handleMouseMove);
        fatherCanvas.value.removeEventListener('mouseup', handleMouseUp);
      };

      fatherCanvas.value.addEventListener('mousemove', handleMouseMove);
      fatherCanvas.value.addEventListener('mouseup', handleMouseUp);
    };

    const startResize = (index, direction, event) => {
      selectedObject.value = index;
      const object = layers[selectedLayer.value].objects[index];
      const startX = event.clientX;
      const startY = event.clientY;
      const width = parseFloat(object.style.width);
      const height = parseFloat(object.style.height);
      const top = parseInt(object.style.top)
      const left = parseInt(object.style.left)
      const handleMouseMove = (e) => {
        const offsetX = e.clientX - startX;
        const offsetY = e.clientY - startY;

        let newWidth, newHeight, newTop, newLeft;
        switch (direction) {
          case 1:
            newTop = top + offsetY;
            newLeft = left + offsetX;
            newWidth = width - offsetX;
            newHeight = height - offsetY;
            break;
          case 2:
            newTop = top + offsetY;
            newWidth = width + offsetX;
            newHeight = height - offsetY;
            break;
          case 3:
            newLeft = left + offsetX;
            newWidth = width - offsetX;
            newHeight = height + offsetY;
            break;
          case 4:
            newWidth = width + offsetX;
            newHeight = height + offsetY;
            break;
          default:
            break;
        }

        object.style.width = `${newWidth}px`;
        object.style.height = `${newHeight}px`;
        if(newTop){
          object.style.top = `${newTop}px`;
        }
        if(newLeft){
          object.style.left = `${newLeft}px`;
        }
      };

      const handleMouseUp = () => {
        fatherCanvas.value.removeEventListener('mousemove', handleMouseMove);
        fatherCanvas.value.removeEventListener('mouseup', handleMouseUp);
      };

      fatherCanvas.value.addEventListener('mousemove', handleMouseMove);
      fatherCanvas.value.addEventListener('mouseup', handleMouseUp);
    };
    const startRotate = (index, event) => {
      rotatedObject.value = index;
      const object = layers[selectedLayer.value].objects[index];
      const rect = fatherCanvas.value.getBoundingClientRect()
      const x = parseFloat(object.style.left) + parseFloat(object.style.width) / 2 + rect.left
      const y = parseFloat(object.style.top) + parseFloat(object.style.height) / 2 + rect.top
      const x1 = event.clientX;
      const y1 = event.clientY;
      const currentRotation = parseFloat(object.style.rotation) || 0;
      const handleMouseMove = (e) => {
        const x2 = e.clientX;
        const y2 = e.clientY;

        if (rotatedObject.value !== null) {
          let start = Math.atan2(y1 - y, x1 - x)
          let end = Math.atan2(y2 - y, x2 - x)
          let angle = (end - start) * (180 / Math.PI);
          object.style.transform = `rotate(${angle + currentRotation}deg)`;
          object.style.rotation = angle + currentRotation;
        }
      };

      const handleMouseUp = () => {
        rotatedObject.value = null;
        fatherCanvas.value.removeEventListener('mousemove', handleMouseMove);
        fatherCanvas.value.removeEventListener('mouseup', handleMouseUp);
      };

      fatherCanvas.value.addEventListener('mousemove', handleMouseMove);
      fatherCanvas.value.addEventListener('mouseup', handleMouseUp);
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
      selectObject,
      selectedObject,
      startDrag,
      draggedObject,
      startResize,
      startRotate,
      layers,
      addLayer,
      back,
      selectLayer,
      selectedLayer,
      selectedButton,
      delLayer,
      getAllObjects,
      moveLayerUp,
      moveLayerDown,
      undo,
      redo
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
  position: absolute;
  top: 0;
  left: 0;
}
.layerBtn{
    width: 80%;
    background-color: #fff;
    border: 2.5px solid lightgray;
    color: lightgray;
    margin: 10px auto;
    height: 75px;
    padding: 5px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.layerBtn button{
    padding: 5px 12px;
    color: lightgray;
    background-color: #565656;
    border: none;
}
.pattern{
    position: absolute;
    background-color: lightgray;
    left: 85%;
    bottom: 0;
    border-radius: 10px;
    height: 100px;
    z-index: 1004;
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
    width: 16px;
    height: 16px;
    background-color: lightgray;
}
.imgFather{
  position: absolute;
  z-index: 1001;
  box-sizing: border-box;
}
.imgFather #circle{
    width: 30px;
    height: 30px;
    border-radius: 50%;
}
.imgFather div:hover{
    background-color: #565656;
}
.border{
  border: 3px solid #565656;
}
.moveImg{
  z-index: 1005;
}
.imgFather img{
  user-select: none !important;
  pointer-events: none !important;
}
/* img{
  object-fit: cover;
} */
</style>
