<template>
    <div class="top">
        <button>新增專按</button>
        <button>還原</button>
        <button>重作</button>
        <button>儲存成圖片</button>
    </div>
    <div class="main">
        <div class="left">
            <button @click="button = 1">選取</button>
            <button @click="button = 2">畫筆</button>
            <input type="number" v-model="fontSize">
            <button @click="button = 3">油漆桶</button>
            <input type="color" v-model="color">
            <button @click="button = 4">樣章</button>
            <label for="seal">儲存樣章</label>
            <input type="file" id="seal" style="display: none;">
            <label for="upload">上傳圖片</label>
            <input type="file" id="upload" style="display: none;">
        </div>
        <div class="center" @mousedown="down" @mouseover="over" @mouseup="up">
            <div v-for="(value,index) in layer" class="a">
                <canvas width="1280" height="720">

                </canvas>
                <div v-for="(v,i) in img" class="imgBox">
                    <img :style="img['style']" :src="img['src']" alt="">
                </div>
            </div>
        </div>
        <div class="right">
            <button @click="insertLaryer">新增圖層</button>
            <button v-for="(value,index) in laButton">{{ value['text'] }}</button>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                button:0,
                color:'#000000',
                fontSize:10,
                layer:[],
                laButton:[],
                img:[],
                now:0,
                id:0,
                turn:false,
                startX:0,
                startY:0,
                endX:0,
                endY:0,
                ctx:[],
            }
        },methods:
        {
            insertLaryer(){
                let a = []
                a['type'] = 'layer';
                a['id'] = this.id;
                this.layer.push(a);
                console.log(this.layer);
                let b = [];
                b['text'] = '屠城'+this.id;
                b['id'] = this.id;
                this.laButton.push(b);
                this.id++
            },
            down(eve){
                if(this.button == 2 && this.layer.length > 0){
                    if(this.ctx[this.now] == undefined){
                        this.ctx[this.now] = eve.currentTarget.childNodes[this.now+1].childNodes[0].getContext('2d');
                    }
                    let canvas = eve.currentTarget.childNodes[this.now+1].childNodes[0];
                    let aaa = canvas.getBoundingClientRect();
                    this.ctx[this.now].strokeStyle = this.color;
                    this.ctx[this.now].lineWidth = this.fontSize;
                    this.ctx[this.now].lineJoin = 'round';
                    this.ctx[this.now].lineCap = 'round';
                    this.ctx[this.now].moveTo(eve.clientX - aaa.left,eve.clientY - aaa);
                    this.ctx[this.now].lineTo(eve.clientX - aaa.left,eve.clientY - aaa);
                    this.ctx[this.now].stroke();

                    this.turn = true;

                    this.startX = 10000;
                    this.startY = 10000;
                    this.endX = 0;
                    this.endY = 0;

                    if(this.startX > eve.clientX - aaa){

                    }
                }
            },
            move(eve){
                if(this.button == 2 && this.turn){

                }
            },
            up(eve){

            }
        }
    }
</script>
    
<style>
    body{
        width: 100%;
        height: 100%;
        margin: 0px;
        background-color: #565656;
    }
    html{
        width: 100%;
        height: 100%;
    }
    #app{
        width: 100%;
        height: 100%;
    }
    .top{
        width: 80%;
        padding: 20px;
        display: flex;
        justify-content: space-around;
        margin: auto;
    }
    .main{
        width: 100%;
        height: 80%;
        display: flex;
        justify-content: space-around;

    }
    .left,.right{
        width: 10%;
        height: 100%;
        background-color: white;
    }
    .center{
        width: 1280px;
        height: 720px;
        background-color: white;
        position: relative;
    }
    .a{
        position: absolute;
        top: 0px;
        left: 0px;
    }
    .left > button, .left>label , .right > button , .top > button{
        width: 170px;
        font-size: 30px;
        background-color: #a8a8a8;
        border: 0px;
        display: block;
        border-radius: 5px;
        margin: 30px auto;
        color: white;
    }
</style>