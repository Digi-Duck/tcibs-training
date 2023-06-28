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
        <div class="a">
            <div class="aaa">
                <div class="center" @mousedown.capture="mousedown" @mousemove.capture="mousemove" @mouseup.capture="mouseup">
                    <canvas :width="caWid" :height="cahei">
                        
                    </canvas>
                </div>

            </div>
            <div class="aaa">
                <div class="center" @mousedown.capture="mousedown" @mousemove.capture="mousemove" @mouseup.capture="mouseup">
                    <canvas :width="caWid" :height="cahei">
                        
                    </canvas>
                </div>

            </div>

        </div>
        <div class="right">
            <button @click="insertLayer">新增屠城</button>
            
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
        let ctx = '';
        let startX = 0;
        let startY = 0;
        let endX = 0;
        let endY = 0;
        let drag;
        let layer = 1;
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
            drag,
            layer,
        }
    },methods:{
        insertLayer(eve){
            let button =document.createElement('button');
            button.innerHTML = `新增圖層${this.layer}`;
            eve.target.after(button);
            this.layer++;
        },
        mousedown(eve){

                if(this.button == 1){
                    let X = eve.clientX - 270.5;
                    let Y = eve.clientY - 150;
                    console.log(eve.target.width);
                    eve.target.style = `
                    position: absolute;
                            left: ${X - eve.offsetX}px;
                            top: ${Y - eve.offsetY}px;
                    `;
                    this.drag = eve;

                }else if(this.button == 2){
                this.turn = true;
                this.ctx = eve.currentTarget.childNodes[0].getContext('2d');
                this.ctx.lineJoin = 'round';
                this.ctx.lineCap = 'round';
                this.ctx.lineWidth = this.fontSize;
                this.ctx.strokeStyle = this.color;
                this.ctx.beginPath();
                let X = eve.clientX - 270.5;
                let Y = eve.clientY - 150;
                
                this.ctx.moveTo(X,Y);
                
    
                this.startX = 10000;
                this.startY = 10000;
                this.endX = 0;
                this.endY = 0;
    
                        this.ctx.stroke();
                        if(this.startX > X){
                            this.startX = X;
                        }
                        if(this.startY > Y){
                            this.startY = Y;
                        }
                        if(this.endX < X){
                            this.endX = X;
                        }
                        if(this.endY < Y){
                            this.endY = Y;
                        }
                        
                        this.ctx.lineTo(X,Y);
                        this.ctx.stroke();
                    }
                    
                },
                mouseup(eve) {
                    if(this.button == 1 && this.drag != undefined){
                        this.drag = undefined;
                    }else if(this.turn){
                        let img = new Image();
                        // console.log(this.ctx);
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
    
                            this.startX += this.fontSize/2;
                            this.startY += this.fontSize/2;
                            this.endX += this.fontSize/2;
                            this.endY += this.fontSize/2;
                            let idata = this.ctx.getImageData(this.startX,this.startY,this.endX,this.endY);
                            let can = document.createElement('canvas');
                            
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
                            img.addEventListener('dragstart',function (event) {
                                event.preventDefault();
                            })
                            this.ctx.clearRect(this.startX,this.startY,this.endX,this.endY);
                    }
                    
                    
                    },
                    mousemove(e) {
                        if(this.button == 1 && this.drag != undefined){
                            let X = e.clientX - 270.5;
                            let Y = e.clientY - 150;
                            this.drag.target.style = `
                            position: absolute;
                            left: ${X - this.drag.offsetX}px;
                            top: ${Y - this.drag.offsetY}px;
                    `;
                            
                        }else if(this.turn){
                            
                            let X = e.clientX - 270.5;
                            let Y = e.clientY - 150;
                            
                            this.ctx.lineTo(X,Y);
                            this.ctx.stroke();
                            if(this.startX > X){
                                this.startX = X;
                            }
                            if(this.startY > Y){
                                this.startY = Y;
                            }
                            if(this.endX < X){
                                this.endX = X;
                            }
                            if(this.endY < Y){
                                this.endY = Y;
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
            
            
        }
        .a{
            width: 1280px;
            height: 720px;
            position: relative;
        }
        .aaa{
            width: 1280px;
            height: 720px;
            position: absolute;
            top: 0px;
            left: 0px;
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
            width: 170px;
            display: block;
            margin: 30px auto;
        }
</style>