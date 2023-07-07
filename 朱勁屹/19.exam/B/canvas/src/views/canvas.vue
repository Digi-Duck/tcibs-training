<template>
     <div class="top">
        <button>新增專案</button>
        <button @click="back">復原</button>
        <button @click="re">重作</button>
        <button>儲存圖片</button>
    </div>
    <div class="box">
        <div class="left">
            <button @click="button = 1">選取</button>
            <button @click="button = 2">筆刷</button>
            <input type="text" v-model="fontSize">
            <button @click="button = 3">油漆桶</button>
            <input type="color" v-model="color">
            <button @click="button = 4">樣章</button>
            <input type="file" @change="file">
            <button @click="button = 6">上傳圖片</button>
        </div>
        <div class="a">
            <div class="aaa" v-for="(item,index) in centerLayer" :style="item.style">
                <div class="center" @mousedown.capture="mousedown" @mousemove.capture="mousemove" @mouseup.capture="mouseup">
                    <canvas :width="caWid" :height="cahei" @click="bucket">
                    </canvas>
                    <div class="imgBox" v-for="(v,i) in img">
                        <img class='border2' :src="v['src']" v-show="v['in'] == index" :style="v.style" alt="" draggable="false" @mousedown="imgdown($event,i)" @mousemove="imgmove($event,i)" @mouseup="imgup" @mouseover="imgOver" @mouseout="imgOut">
                        <div class="imgSmallBox imgSmallBox1"></div>
                        <div class="imgSmallBox imgSmallBox2"></div>
                        <div class="imgSmallBox imgSmallBox3"></div>
                        <div class="imgSmallBox imgSmallBox4"></div>
                    </div>
                </div>
            </div>
            <!-- <div class="aaa">
                <div class="center" @mousedown.capture="mousedown" @mousemove.capture="mousemove" @mouseup.capture="mouseup">
                    <canvas :width="caWid" :height="cahei">
                        
                    </canvas>
                </div>

            </div> -->

        </div>
        <div class="right">
            <button @click="insertLayer">新增圖層</button>
            <button @click="lZindex(index)" v-for="(item,index) in layer">{{ item.text }}</button>
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
        let layers = 0;
        let layer = ref([]);
        let centerLayer = ref([]);
        let img = ref([]);        
        let now = ref(0);
        let imgSrc = ref('');
        let back = [];
        let f1 = ref([]);
        let f2 = ref([]);
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
            centerLayer,
            layers,
            img,
            now,
            imgSrc,
            back,
            f1,
            f2,
        }
    },methods:{
        back(){
            let f = this.f1.pop();
            this.f2.push(f);
            if(f == 1){
                this.back.push(this.layer.pop());
                console.log(1);
            }else if(f == 0){
                this.back.push(this.img.pop());
                console.log(0);
            }
        },
        re(){
            console.log();
            let sh = this.back.pop(0);
            this.f1.push(this.f2.pop());
            if(sh['type'] == 'layers'){
                this.layer.push(sh);
            }else{
                this.img.push(sh);
            }
        },
        bucket(eve){
            if(this.button == 3){
                let ctx = eve.target.getContext('2d');
                console.log(this.color);
                ctx.fillStyle = this.color;
                ctx.fillRect(0,0,eve.target.width,eve.target.height);
            }
        }, 
        file(eve){
            let self = this;
            const reader = new FileReader();
            reader.readAsDataURL(eve.target.files[0]);
            reader.onload = function () {
                self.imgSrc = reader.result;
                
            }
            // console.log(this.imgSrc);
        },
        lZindex(eve){
            for (let index = 0; index < this.centerLayer.length; index++) {

                this.centerLayer[index] = {
                    style:{
                    'z-index': `${index}`
                }
                
            }
        }
            this.centerLayer[eve] = {
                style:{
                    'z-index': `10000`
                }
            }
            this.now = eve;
        },
        insertLayer(eve){
            let array = [];
            let a = {
                style:{
                    'z-index': `${this.layers}`
                }
            };
            array['text'] = `圖層${this.layers}`;
            array['type'] = 'layers';
            this.f1.push(1);
            this.layer.push(array);
            this.centerLayer.push(a);
            this.now = this.layers;
            // console.log(this.now);
            this.layers++;
        },
        imgOver(eve){
            if (this.button == 1) {
                eve.target.classList.add('border');
                
            }
        },
        imgOut(eve){
            if (this.button == 1) {
                eve.target.classList.remove('border');
                
            }
        },
        imgdown(eve,i){
            // console.log(eve);
            if(this.button == 1){
                    // console.log(eve.target);
                    let X = eve.clientX - 270.5;
                    let Y = eve.clientY - 150;
                    
                    this.img[i]['style'] = {
                        'position': 'absolute',
                        'left': `${X - eve.offsetX}px`,
                        'top': `${Y - eve.offsetY}px`,

                    }
                    // eve.target.style = `
                    //         position: absolute;
                    //         left: ${X - eve.offsetX}px;
                    //         top: ${Y - eve.offsetY}px;
                    // `;
                    this.drag = eve;

                }
        },
        imgmove(e,i){
            
            if(this.button == 1 && this.drag != undefined){
                        let X = e.clientX - 270.5;
                        let Y = e.clientY - 150;
                    //     this.drag.target.style = `
                    //     position: absolute;
                    //     left: ${X - this.drag.offsetX}px;
                    //     top: ${Y - this.drag.offsetY}px;
                    // `;
                    this.img[i]['style'] = {
                        'position': 'absolute',
                        'left': `${X - this.drag.offsetX}px`,
                        'top': `${Y - this.drag.offsetY}px`,

                    }
                            
            }
        },
        imgup(eve){
            if(this.button == 1 && this.drag != undefined){
                this.drag = undefined;
            }
        },
        mousedown(eve){
            // console.log(this.imgSrc);
                if(this.button == 2){
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
                    }else if(this.button == 4 && this.imgSrc != ''){
                        
                        this.turn = true;
                        this.ctx = eve.currentTarget.childNodes[0].getContext('2d');
                        // this.ctx.lineJoin = 'round';
                        // this.ctx.lineCap = 'round';
                        // this.ctx.lineWidth = this.fontSize;
                        // this.ctx.strokeStyle = this.color;
                        // this.ctx.beginPath();
                        let X = eve.clientX - 270.5;
                        let Y = eve.clientY - 150;
                        
                        // this.ctx.moveTo(X,Y);
                        let img = new Image();
                        // img.width = this.fontSize;
                        // img.height = this.fontSize;
                        img.src = this.imgSrc;
                        this.ctx.drawImage(img,X - (this.fontSize/2),Y - (this.fontSize/2),this.fontSize,this.fontSize);
                        
            
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
                        
                        
                    }
                    
                },
                mouseup(eve) {
                    if(this.turn && this.button == 2){
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
    
                            this.startX -= this.fontSize/2;
                            this.startY -= this.fontSize/2;
                            this.endX += this.fontSize/2;
                            this.endY += this.fontSize/2;
                            let idata = this.ctx.getImageData(this.startX,this.startY,this.endX,this.endY);
                            let can = document.createElement('canvas');
                            
                            can.width = this.endX - this.startX;
                            can.height = this.endY - this.startY;
                            let catctx = can.getContext('2d');
                            
                            catctx.putImageData(idata,0,0); 
                            // img.src = can.toDataURL("image/png");
                            // img.style = 'z-index: 99;';
                            // img.onload = function (e) {
                            // }
                            let a = [];
                            a['src'] = can.toDataURL("image/png");
                            a['style'] = {
                                'position': 'absolute',
                                'left': `${this.startX}px`,
                                'top': `${this.startY}px`
                            };
                            a['in'] = this.now;
                            a['type'] = 'img';
                            this.f1.push(0);
                            this.img.push(a);
                            
                            

                            
                            this.ctx.clearRect(this.startX,this.startY,this.endX,this.endY);
                    }else if(this.turn && this.button == 4 && this.imgSrc != ''){
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
    
                            this.startX -= this.fontSize/2;
                            this.startY -= this.fontSize/2;
                            this.endX += this.fontSize/2;
                            this.endY += this.fontSize/2;
                            let idata = this.ctx.getImageData(this.startX,this.startY,this.endX,this.endY);
                            let can = document.createElement('canvas');
                            
                            can.width = this.endX - this.startX;
                            can.height = this.endY - this.startY;
                            let catctx = can.getContext('2d');
                            
                            catctx.putImageData(idata,0,0); 
                            // img.src = can.toDataURL("image/png");
                            // img.style = 'z-index: 99;';
                            // img.onload = function (e) {
                            // }
                            let a = [];
                            a['src'] = can.toDataURL("image/png");
                            a['style'] = {
                                'position': 'absolute',
                                'left': `${this.startX}px`,
                                'top': `${this.startY}px`
                            };
                            a['in'] = this.now;
                            this.f1.push(0);
                            
                            this.img.push(a);
                            
                            

                            
                            this.ctx.clearRect(this.startX,this.startY,this.endX,this.endY);
                    }
                    
                    
                    },
                    mousemove(e) {
                        if(this.turn && this.button == 2){
                            
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
                        }else if(this.turn && this.button == 4 && this.imgSrc != ''){
                            
                            let X = e.clientX - 270.5;
                            let Y = e.clientY - 150;
                            
                            let img = new Image();
                            img.width = this.fontSize;
                            img.height = this.fontSize;
                            img.src = this.imgSrc;
                            this.ctx.drawImage(img,X - (this.fontSize/2),Y - (this.fontSize/2),this.fontSize,this.fontSize);
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

        .border2{
            border: 2px solid rgba(255, 255, 255, 0);
        }
        .border{
            border: dashed 2px black;
        }
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
            /* background-color: white; */
            position: relative;
            overflow: hidden;
            
            
        }
        .a{
            width: 1280px;
            height: 720px;
            position: relative;
            background-color: white;
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