<template>
    <!-- <div class="back" v-show="back">
        <input type="text" v-model="canWidth">
        <input type="text" v-model="canHeight">
        <button v-on:click="back = false">送出</button>
    </div> -->
    <div class="top">
        <button>新增專案{{ button }}</button>
        <button @click="ba">還原</button>
        <button @click="re">重作</button>
        <button @click="storeImg">儲存圖片</button>
    </div>
    <div class="main">
        <div class="left">
            <button @click="button = 1">選取</button>
            <button @click="button = 2">筆刷</button>
            <input type="number" v-model="fontWidth">
            <button @click="button = 3" >油漆桶</button>
            <input type="color" v-model="color">
            <button @click="button = 4">樣章</button>
            <img width="30" height="30" v-for="(value,index) in imgSrc" :src="value" alt="" @click="useSeal = index">
            <label class="button" for="fi">儲存樣章</label>
            <input id="fi" type="file" @change="file" style="display: none;">

            <label class="button" for="update">上傳圖片</label>
            <input type="file" @change="updateFile" id="update" style="display: none;">
        </div>
        <div class="center" :style="{width: canWidth+'px',height: canHeight+'px',}"  @mousedown.capture="down" @mousemove.capture="move" @mouseup.capture="up">
            <div class="a" v-for="(vv,ii) in la" :style="{zIndex:vv['z']}">
                <canvas :style="{width: canWidth+'px',height: canHeight+'px'}" ></canvas>
                <div class="imgBox" v-for="(value,index) in img" v-show="value['in'] == vv['id']">
                    <img draggable="false" :src="value.src" alt="" :style="value.style" @mousedown.capture="imgDown($event,index)" @mouseup="imgUp($event,index)" >
                </div>
            </div>
        </div>
        <div class="right">
            <button @click="newLa">新增圖層</button>
            <button v-for="(value,index) in layer" @click="laButt(index)">{{ value.text }}</button>
        </div>

    </div>
</template>
<script>
    export default{
        data(){
            let canWidth = '1280';
            let canHeight = '720';
            let back = true;
            let button = 0;
            let layer = [];
            let la = [];
            let img = [];
            let turn = false;
            let fontWidth = 10;
            let ctx = '';
            let color = '#ff0000';
            let startX = 10000;
            let startY = 10000;
            let endX = 0;
            let endY = 0;
            let now = 0;
            
            return{
                canWidth,
                canHeight,
                back,
                button,
                layer,
                img,
                turn,
                fontWidth,
                ctx,
                color,
                startX,
                startY,
                endX,
                endY,
                now:0,
                cenWidth:0,
                cenheight:0,
                mouseX:0,
                mouseY:0,
                mou:0,
                iii:0,
                laId:0,
                la,
                imgSrc:[],
                useSeal:0,
                order:[],
                his:[],
                his2:[],
                seals:[],
            }
        },methods:{
            
            storeImg() {
            let canvas = document.createElement('canvas');
            let ctx = canvas.getContext('2d');
            let self = this;
            canvas.width = 1280;
            canvas.height = 720;

            let loadImagePromises = []; // 用于存储图像加载的 Promise

            this.la.forEach(function (value, index) {
                let canvas2 = document.createElement('canvas');
                canvas2.width = 1280;
                canvas2.height = 720;
                let ctx2 = canvas2.getContext('2d');

                self.img.forEach(function (v, i) {
                if (v['in'] == value['id']) {
                    let im = new Image();
                    im.src = v['src'];

                    // 创建一个 Promise，用于表示图像加载完成
                    let loadImagePromise = new Promise(function (resolve, reject) {
                    im.onload = function () {
                        let left = parseInt(v['style'].left.slice(0, -2));
                        let top = parseInt(v['style'].top.slice(0, -2));
                        ctx2.drawImage(im, left, top);
                        resolve(); // 图像加载完成，将 Promise 标记为成功
                    }
                    im.onerror = reject; // 图像加载出错，将 Promise 标记为失败
                    });

                    loadImagePromises.push(loadImagePromise); // 将图像加载的 Promise 添加到数组中
                }
                })
            })

            // 等待所有图像加载完成
            Promise.all(loadImagePromises).then(function () {
                // 所有图像加载完成后，将画布添加到适当的位置
                document.body.appendChild(canvas);

                // 在这里进行绘制操作
                self.la.forEach(function (value, index) {
                let canvas2 = document.createElement('canvas');
                canvas2.width = 1280;
                canvas2.height = 720;
                let ctx2 = canvas2.getContext('2d');

                self.img.forEach(function (v, i) {
                    if (v['in'] == value['id']) {
                    let im = new Image();
                    im.src = v['src'];
                    let left = parseInt(v['style'].left.slice(0, -2));
                    let top = parseInt(v['style'].top.slice(0, -2));
                    ctx2.drawImage(im, left, top);
                    }
                })

                ctx.drawImage(canvas2, 0, 0);
                });

                let dataURL = canvas.toDataURL("image/jpg");
                console.log(dataURL);
                let URL = document.createElement('a');
                URL.href = dataURL;
                URL.download = 'amongus.jpg';
                URL.click();

                // 可选：在导出后从页面中删除 canvas 元素
            }).catch(function (error) {
                // 图像加载出错
                console.error('图像加载出错:', error);
            });
            },
            updateFile(eve){
                let self = this;
                let reader = new FileReader();
                reader.readAsDataURL(eve.target.files[0]);
                reader.onload = function () {
                    let a = [];
                    a['src'] = reader.result;
                    a['style'] = {
                        'position': 'absolute',
                        'top': '0px',
                        'left': '0px',
                        
                    }
                    a['in'] = self.now;
                    a['type'] = 'img';
                    console.log(self.now);
                    self.img.push(a);
                }
                this.order.push(0);
            },
            ba(){
                let a = this.order.pop();
                if(a != undefined){
                    if(a == 0){
                        this.his.push(this.img.pop());
                    }else{
                        this.his.push(this.la.pop());
                        this.his2.push(this.layer.pop());
    
                    }

                }
            },
            re(){
                if(this.his.length > 0){
                    let a = this.his.pop();
                    if(a['type'] == 'img'){
                        this.img.push(a);
                    }else{
                        this.la.push(a);
                        this.layer.push(this.his2.pop());
                    }
                }
            },
            file(eve){
                let self = this;
                const reader = new FileReader();
                reader.readAsDataURL(eve.target.files[0]);
                reader.onload = function () {
                    self.imgSrc.push(reader.result);
                }
            },
            laButt(i){
                this.la.forEach(function (value,index) {
                    if(index == i){
                        value['z'] = 100;
                        
                    }else{
                        value['z'] = value['id'];
                        
                    }
                    
                })
                this.now = i;
            },
            newLa(){
                let a = [];
                a['text'] = '屠城'+this.laId;
                a['style'] = this.laId;
                this.layer.push(a);
                let b = [];
                b['type'] = 'layer'
                b['z'] = this.laId,
                b['id'] = this.laId,
                this.la.push(b);
                this.now = this.laId;
                this.laId++;
                this.order.push(1);
            },
            imgDown(eve,i){
                if(this.button == 1){
                    this.turn = true;
                    this.mouseX = eve.offsetX;
                    this.mouseY = eve.offsetY;
                    this.iii = i;
                }
            },
            imgMove(eve){
                if(this.button == 1 && this.turn){
                    // console.log(eve.clientY);
                    // console.log(eve.target.getBoundingClientRect().top);
                    // console.log(eve.target);
                    // console.log(eve.offsetY);
                    // this.img[this.iii]['style'] = {
                    //     'position': 'absolute',
                    //     'top':  eve.clientY - this.cenheight - this.mouseY +'px',
                    //     'left':  eve.clientX - this.cenWidth -this.mouseX +'px',
                    // }
                }
            },
            imgUp(eve,i){
                if(this.button == 1 && this.turn){
                    this.turn = false;
                }
            },
            down(eve){
                console.log(eve);
                if(this.button == 2 && this.layer.length > 0){
                    this.startX = 10000;
                    this.startY = 10000;
                    this.endX = 0;
                    this.endY = 0;
                    this.turn = true;
                    eve.currentTarget.childNodes[this.now + 1].childNodes[0].width = this.canWidth;
                    eve.currentTarget.childNodes[this.now + 1].childNodes[0].height = this.canHeight;
                    // console.log(eve.target);
                    this.cenWidth = eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left;
                    this.cenheight = eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top;
                    this.ctx = eve.currentTarget.childNodes[this.now + 1].childNodes[0].getContext('2d');
                    

                    this.ctx.lineJoin = 'round';
                    this.ctx.lineCap = 'round';
                    this.ctx.lineWidth = this.fontWidth;
                    this.ctx.strokeStyle = this.color;

                    this.ctx.beginPath();
                    this.ctx.moveTo( eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left,eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top);

                    this.ctx.lineTo( eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left,eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top);
                    this.ctx.stroke();

                    

                    if(this.startX >  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left){
                        this.startX =  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left;
                    }
                    if(this.startY > eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top){
                        this.startY = eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top;
                    }
                    if(this.endX <  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left){
                        this.endX =  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left;
                    }
                    if(this.endY < eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top){
                        this.endY = eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top;
                    }
                }else if(this.button == 3){
                    console.log(eve.currentTarget.childNodes[this.now + 1].childNodes[0]);
                    if(eve.currentTarget.childNodes[this.now + 1].childNodes[0] != undefined){
                        let canvas = eve.currentTarget.childNodes[this.now + 1].childNodes[0];
                        let ctx = canvas.getContext('2d');
                        ctx.fillStyle = this.color;
                        ctx.fillRect(0,0,this.canWidth,this.canHeight);

                    }
                }else if(this.button == 4 && this.layer.length > 0 && this.imgSrc.length > 0){
                    this.startX = 10000;
                    this.startY = 10000;
                    this.endX = 0;
                    this.endY = 0;
                    this.turn = true;
                    eve.currentTarget.childNodes[this.now + 1].childNodes[0].width = this.canWidth;
                    eve.currentTarget.childNodes[this.now + 1].childNodes[0].height = this.canHeight;
                    // console.log(eve.target);
                    this.cenWidth = eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left;
                    this.cenheight = eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top;
                    this.ctx = eve.currentTarget.childNodes[this.now + 1].childNodes[0].getContext('2d');
                    
                    let img = new Image();
                    img.src = this.imgSrc[this.useSeal];
                
                        this.ctx.drawImage(img,eve.clientX - eve.currentTarget.childNodes[this.now + 1] .childNodes[0].getBoundingClientRect().left - this.fontWidth/2,eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top - this.fontWidth/2,this.fontWidth,this.fontWidth);
    
                        // this.ctx.beginPath();
                        // this.ctx.moveTo( eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left,eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top);
    
                        // this.ctx.lineTo( eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left,eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top);
                        // this.ctx.stroke();
    
                        
    
                        if(this.startX >  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left){
                            this.startX =  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left;
                        }
                        if(this.startY > eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top){
                            this.startY = eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top;
                        }
                        if(this.endX <  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left){
                            this.endX =  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left;
                        }
                        if(this.endY < eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top){
                            this.endY = eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top;
                        }
                        
                    
                }
            },
            move(eve){
                // console.log(eve.currentTarget);
                if(this.button == 2 && this.turn){
                    this.ctx.lineTo( eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left,eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top);
                    this.ctx.stroke();

                    if(this.startX >  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left){
                        this.startX =  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left;
                    }
                    if(this.startY > eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top){
                        this.startY = eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top;
                    }
                    if(this.endX <  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left){
                        this.endX =  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left;
                    }
                    if(this.endY < eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top){
                        this.endY = eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top;
                    }
                }
                if(this.button == 1 && this.turn){
                    // console.log(eve.clientY);
                    // console.log(eve.target.getBoundingClientRect().top);
                    // console.log(eve.target);
                    // console.log(eve.offsetY);
                    this.img[this.iii]['style'] = {
                        'position': 'absolute',
                        'top':  eve.clientY - this.cenheight - this.mouseY +'px',
                        'left':  eve.clientX - this.cenWidth -this.mouseX +'px',
                    }
                }else if(this.button == 4 && this.turn){
                    let img = new Image();
                    img.src = this.imgSrc[this.useSeal];
                    
                        this.ctx.drawImage(img,eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left,eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top,this.fontWidth,this.fontWidth);
    
                        // this.ctx.beginPath();
                        // this.ctx.moveTo( eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left,eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top);
    
                        // this.ctx.lineTo( eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left,eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top);
                        // this.ctx.stroke();
    
                        
    
                        if(this.startX >  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left){
                            this.startX =  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left;
                        }
                        if(this.startY > eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top){
                            this.startY = eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top;
                        }
                        if(this.endX <  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left){
                            this.endX =  eve.clientX - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().left;
                        }
                        if(this.endY < eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top){
                            this.endY = eve.clientY - eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect().top;
                        }
                        
                    
                }
            },
            up(eve){
                if(this.button == 2 && this.turn){
                    this.turn = false;
                    this.startX -= this.fontWidth/2;
                    this.startY -= this.fontWidth/2;
                    this.endX += this.fontWidth/2;
                    this.endY += this.fontWidth/2;
                    console.log(this.startX);
                    console.log(this.endX);
                    let can = document.createElement('canvas');
                    can.width = this.endX - this.startX;
                    can.height = this.endY - this.startY;

                    // console.log(this.endX - this.startX,this.endY - this.startY);

                    let idata = this.ctx.getImageData(this.startX ,this.startY ,can.width ,can.height);

                    let canctx = can.getContext('2d');
                    canctx.putImageData(idata,0,0);

                    let a = [];
                    a['src'] = can.toDataURL("image/png");
                    a['style'] = {
                        'position': 'absolute',
                        'top': this.startY+'px',
                        'left': this.startX+'px',
                        
                    }
                    a['in'] = this.now;
                    a['type'] = 'img';
                    this.order.push(0);
                    this.img.push(a);
                    this.ctx.clearRect(this.startX,this.startY,this.endX - this.startX , this.endY - this.startY);
                }else if(this.button == 4 && this.turn){
                    this.turn = false;
                    this.startX -= this.fontWidth;
                    this.startY -= this.fontWidth;
                    this.endX += this.fontWidth;
                    this.endY += this.fontWidth;
                    console.log(this.endX - this.startX);
                    console.log(this.startX);
                    console.log(this.endX);
                    let can = document.createElement('canvas');
                    can.width = this.endX - this.startX;
                    can.height = this.endY - this.startY;

                    // console.log(this.endX - this.startX,this.endY - this.startY);

                    let idata = this.ctx.getImageData(this.startX ,this.startY ,can.width ,can.height);

                    let canctx = can.getContext('2d');
                    canctx.putImageData(idata,0,0);

                    let a = [];
                    a['src'] = can.toDataURL("image/png");
                    a['style'] = {
                        'position': 'absolute',
                        'top': this.startY+'px',
                        'left': this.startX+'px',
                        
                    }
                    a['in'] = this.now;
                    a['type'] = 'img';
                    this.order.push(0);
                    this.img.push(a);
                    this.ctx.clearRect(this.startX,this.startY,this.endX - this.startX , this.endY - this.startY);
                }
            }
            
        }
    }
</script>
<style>
    .a{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0px;
        left: 0px;

    }
    img{
        user-select: none;
    }
    .aaa{
        width: 100px;
        height: 100px;
        background-color: red;
        position: absolute;
        top: 100px;
    }
    .top{
        width: 50%;
        height: 10%;
        /* background-color: white; */
        padding: 20px 0px;
        display: flex;
        justify-content: center;
        margin: auto;
        
    }
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
    .back{
        background-color: #565656;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: space-around;
    }
    .main{
        width: 100%;
        height: 80%;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .left,.right{
        width: 10%;
        height: 90%;
        background-color: white;
    }

    .left>button,.left>input , .button , .right>button , .top>button{
        display: block;
        margin: auto;
        margin-top: 30px;
        font-size: 30px;
        width: 150px;
        background-color: #b3b3b3;
        border: 2px solid rgb(116, 115, 115);
        border-radius: 5px;
        color: white;
        cursor: pointer;
    }
    .center{
        width: 1280px;
        height: 720px;
        background-color: white;
        position: relative;

    }
    canvas{
        position: absolute;
        top: 0px;
        left: 0px;
    }
</style>