<template>
     <div class="top">
        <button>新增專案</button>
        <button>復原</button>
        <button>重作</button>
        <button>儲存圖片</button>
    </div>
    <div class="box">
        <div class="left">
            <button @click="button = 1">選取</button>
            <button @click="button = 2">筆刷{{ button }}</button>
            <input type="text" v-model="fontSize">
            <button @click="button = 3">油漆桶</button>
            <input type="color" v-model="color">
            <button @click="button = 4">樣章</button>
            <button @click="button = 5">儲存樣章</button>
            <button @click="button = 6">上傳圖片</button>
        </div>
            <div class="center" @mousedown.capture="mousedown" @mousemove.capture="mousemove" @mouseup.capture="mouseup">
                <canvas :width="caWid" :height="cahei">
                    
                </canvas>
            </div>
        <div class="right">
            <button>新增屠城</button>
        </div>

    </div>
</template>
<script>
import { ref } from "vue";

export default{
    setup(){
        const caWid = 1280;
        const cahei = 720;
        const button = ref(0);
        const fontSize = ref(10);
        const color = ref("#000000");
        let turn = false;
        let ctx = {};
        let startX = 0;
        let startY = 0;
        let endX = 0;
        let endY = 0;
        return{
            caWid,
            cahei,
            button,
            fontSize,
            turn,
            ctx,
            color,
            startX,
            startY,
            endX,
            endY,
        }
    },methods:{
        mousedown(eve){
                if(this.button == 2){
                this.turn = true;
                this.ctx = eve.target.getContext('2d');
                this.ctx.lineJoin = 'round';
                this.ctx.lineCap = 'round';
                this.ctx.lineWidth = this.fontSize;
                this.ctx.strokeStyle = 'black';
                this.ctx.beginPath();
                this.ctx.moveTo(eve.offsetX,eve.offsetY);
    
                this.startX = 10000;
                this.startY = 10000;
                this.endX = 0;
                this.endY = 0;
    
                if(this.startX > eve.offsetX){
                            this.startX = eve.offsetX;
                        }
                        if(this.startY > eve.offsetY){
                            this.startY = eve.offsetY;
                        }
                        if(this.endX < eve.offsetX){
                            this.endX = eve.offsetX;
                        }
                        if(this.endY < eve.offsetY){
                            this.endY = eve.offsetY;
                        }
                        
                        this.ctx.lineTo(eve.offsetX,eve.offsetY);
                        this.ctx.stroke();
                    }
                    
                },
                mouseup(eve) {
                    if(this.turn){
                        let img = new Image();
                        console.log(this.ctx);
                        this.startX -= 50;
                        this.startY -= 50;
                        this.endX += 60;
                        this.endY += 60;
                        this.turn = false;
                        // console.log(this.startX);
                        
                        // if(this.endX - this.startX == 0 || this.endY - this.startY == 0){
                            //     this.endX++;
                            //     this.endY++;
                            // }
    
                            
                            let idata = this.ctx.getImageData(this.startX,this.startY,this.endX,this.endY);
                            let can = document.createElement('canvas');
                            console.log(this.endX - this.startX);
                            can.width = this.endX - this.startX;
                            can.height = this.endY - this.startY;
                            let catctx = can.getContext('2d');
                            
                            catctx.putImageData(idata,0,0); 
                            img.src = can.toDataURL("image/png");
                            img.style = 'z-index: 99;';
                            img.onload = function (e) {
                                e.preventDefault();
                                eve.target.after(img);
                            }
                            img.style=`
                            position: absolute;
                            left: ${this.startX}px;
                            top: ${this.startY}px;
                            `;
                            this.ctx.clearRect(this.startX,this.startY,this.endX,this.endY);
                    }
                    
                    
                    },
                    mousemove(e) {
                        
                        if(this.turn){
                            let X = e.$parent;
                            console.log(X); 
                            
                            this.ctx.lineTo(e.offsetX,e.offsetY);
                            this.ctx.stroke();
                            if(this.startX > e.offsetX){
                                this.startX = e.offsetX;
                            }
                            if(this.startY > e.offsetY){
                                this.startY = e.offsetY;
                            }
                            if(this.endX < e.offsetX){
                                this.endX = e.offsetX;
                            }
                            if(this.endY < e.offsetY){
                                this.endY = e.offsetY;
                            }
                        }
                    }
                }
            }
</script>
<style>
        input{
            text-align: center;
        }
        img{
            user-select: none;
        }
        .po{
            position: absolute;
        }
        html{
            width: 100%;
            height: 100%;
        }
        body{
            padding-top: 50px;
            height: calc(100% - 50px);
            width: 100%;
            margin: 0px;
            background-color: #565656;
        }
        .box{
            width: calc(100% - 100px);
            height: calc(100% - 250px);
            display: flex;
            padding: 50px;
            justify-content: space-between;
        }
        .left{
            width: 10%;
            
            background-color: white;
            
        }
        .center{
            width: 1280px;
            height: 720px;
            background-color: white;
            position: relative;
            overflow: hidden;
            z-index: 0;
        }
        
        canvas{
            position: absolute;
            top: 0px;
            left: 0px;
            /* background-color: white; */
            border: 1px solid black;
            
        }
        .right{
            width: 15%;
            background-color: white;
        }
        .top{
            width: calc(100% - 100px);
            height: 50px;
            margin: auto;
            margin-top: 0px;
        }
        .left > *{
            width: 150px;
            font-size: 30px;
            margin: 30px auto;
            display: block;
        }
        .top > button{
            width: 150px;
            font-size: 30px;
            margin: 10px;
        }
        .right > button{
            font-size: 30px;
            width: 150px;
            display: block;
            margin: 30px auto;
        }
</style>