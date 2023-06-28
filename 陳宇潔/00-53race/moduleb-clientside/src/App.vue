<template>
    <header>
        <div class="left">
            <button class="add" style="margin-right: 20px;">
                新增專案
            </button>
            <button class="undo no">&lt;</button>
            <button class="redo no">&gt;</button>
        </div>
        <button class="right save">儲存圖片</button>
    </header>
    <hr>
    <main class="update">
        <div class="function d d-flex blue btns">
            <button class="point" @click="pointClick">選取</button>
            <!-- 0 -->
            <button class="color draw" @click="drawClick">畫筆</button>
            <input type="color" class="box none">
            <div class="line none"></div>
            <!-- 1 -->
            <button class="color fill" @click="fillClick">油漆桶</button>
            <input type="color" class="box none">
            <!-- 2 -->
            <button class="color" @click="colorClick">調色盤</button>
            <input type="color" class="box none">
            <!-- 3 -->
            <button class="paint" @click="paintClick">樣章</button>
            <div class="pattern none d-flex center">
                <button id="smallBtn" class="add-pattern">+</button>
                <input type="file" accept="image/*" class="input-pattern none">
                <div class="patterns d-flex" style="padding: 0;"></div>
            </div>
        </div>
        <canvas class="canvas" ref="canvas">
            畫布
        </canvas>
        <div class="object blue">
            <div class="d-flex center">
                <p>圖層物件列表</p>
                <div class="btn-group d-flex">
                    <button id="smallBtn">+</button>
                    <button id="smallBtn">-</button>
                </div>
            </div>
            <input type="text" value="Layer1">
        </div>
    </main>
    <!-- <div class="add">
        <h1>新增專案</h1>
        <main class="d d-flex">
            <div class="group">
                <p>畫布高度</p>
                <input type="number" value="720" class="small height">
                <p>畫布寬度</p>
                <input type="number" value="1280" class="small width">
            </div>
            <div class="group">
                <p>畫布底色</p>
                <input type="color" class="big color" value="#ffffff">
            </div>
            <button class="add">確定</button>
        </main>
    </div> -->
</template>

<script>
    export default {
        data() {
            return {
                width: 1280,
                height: 720,
            }
        },
        methods: {
        pointClick(){

        },
        drawClick(){

        },
        fillClick(){

        },
        colorClick(){

        },
        paintClick(){

        }
        },
        mounted() {
            const canvas = this.$refs['canvas'];
            const ctx = canvas.getContext('2d');
            
            // 設定 Canvas 的寬度和高度
            canvas.width = 1280;
            canvas.height = 720;

        }
    }
</script>

<style>
body{
    background-color: #565656;
    padding: 20px 50px;
}
input{
    cursor: pointer;
}
*{
    font-size: 25px;
    font-weight: 600;
    color: #565656;
    text-align: center;
    font-weight: bold;
}
.bg{
    width: 75%;
    height: 75vh;
    margin: 10px auto;
    border-radius: 25px;
    border: 10px solid lightgray;
}
.left{
    margin-right: 70%;
}
h1{
    background-color: lightgray;
    margin: 0;
    padding: 20px 10px;
    font-size: 50px;
}
header{
    display: flex;
    justify-content: space-between;
}
button{
    background-color: lightgray;
    padding: 10px 20px;
    border-radius: 10px;
    border: 2.5px solid #565656;
    cursor: pointer;
}
button:hover{
    border: 2.5px solid lightgray;
    color: lightgray;
    background-color: #565656;
}
button:hover i{
    color: lightgray;
}
main{
    padding-top: 20px;
}
.update div{
    text-align: center;
    padding: 10px;
}

p{
    color: lightgray;
    margin: 30px;
}
.group{
    width: 50%;
    display: flex;
    justify-content: space-between;
    margin: auto;
}
input{
    height: 75px;
    border-radius: 10px;
    border: 5px solid lightgray
}
.d-flex{
    display: flex;
}
.center{
    justify-content: center;
    align-items: center;
}
.none{
    display: none;
}
.big{
    width: 72%;
}
.small{
    width: 20%;
}
.d{
    height: 75%;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
}
.box, .line{
    width: 75px;
    height: 75px;
    padding: 20px;
    margin: 10px;
}
.btns button{
  font-size: 20px;
  padding: 0;
  width: 75px;
  height: 75px;
  margin: 10px;
}
.line{
    background-color: #fff;
    border-radius: 10px;
    width: 50px;
}
span{
    display: block;
    background: #565656;
    margin-bottom: 7.5px;
    border-radius: 5px;
    padding: 0.5px;
}
span:hover{
    background: lightgray;
}
.function{
    width: 100px;
    float: left;
    position: relative;
}
.object{
    width: 250px;
    float: right;
}
.blue{
    background-color: lightgray;
    border-radius: 10px;
}
.none{
    display: none;
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
    margin: 0;
    line-height: 50px;
    font-size: 24px;
}
#smallBtn{
    width: 30px;
    height: 30px;
    padding: 0;
    margin: 1px;
}
.object input{
    width: 80%;
    height: 50px;
}
.pattern{
    position: absolute;
    background-color: lightgray;
    left: 85%;
    bottom: 0;
    border-radius: 10px;
    height: 100px;
    z-index: 2;
}
.patternImg{
    width: 100px;
    height: 100px;
    object-fit: fill;
    border: 5px solid lightgray;
    margin: 5px;
    border-radius: 10px;
    cursor: pointer;
    box-sizing: border-box;
}
.border{
    border: 5px solid #565656;
}
.add{
  
}
</style>
