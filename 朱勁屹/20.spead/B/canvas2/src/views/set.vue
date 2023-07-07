<template>
    <div class="top">
        <button>新專案</button>
        <button @click="ba">還原</button>
        <button @click="re">重作</button>
        <button>儲存圖片{{ button }}</button>
    </div>
    <div class="main">
        <div class="left">
            <button @click="button = 1">選取</button>
            <button @click="button = 2">畫筆</button>
            <input type="number" v-model="fontWidth">
            <button @click="button = 3">油漆桶</button>
            <input type="color" v-model="color">
            <button @click="button = 4">樣章</button>
            <img v-for="(v,i) in seals" @click="nowSeal(i)" width="30" height="30" :src="v" alt="">
            <label for="seal">儲存樣章</label>
            <input type="file" @change="file" id="seal" style="display: none;">
            <label for="update">上傳圖片</label>
            <input type="file" @change="update" id="update" style="display: none;">
            
        </div>
        <div class="center" @mousedown="down" @mousemove="move" @mouseup="up">
            <div class="a"  v-for="(v,i) in layer" :style={zIndex:v.z} width="1280" height="720">
                <canvas width="1280" height="720">

                </canvas>
                <div class="imgBox" v-for="(value,index) in img">
                    <img draggable="false" v-show="value['in'] == i" :src="value['src']" :style="value['style']" alt="" @mousedown="imgDown($event,index)">
                </div>
            </div>
        </div>
        <div class="right">
            <button @click="newLa">新增圖層</button>
            <button v-for="(value,index) in imgButton" @click="layerZ(index)">{{ value['text'] }}</button>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            
            return{
                canWidth:1280,
                canheight:720,
                button:0,
                now:0,
                turn:false,
                img:[],
                ctx:0,
                startX:10000,
                startY:10000,
                endX:0,
                endY:0,
                fontWidth:10,
                color:'#000000',
                nowImg:-1,
                downX:0,
                downY:0,
                imgButton:[],
                layer:[],
                order:[],
                his:[],
                his2:[],
                id:0,
                seals:[],
                nowSeal:0,
            }
        },
        methods:{
            update(eve){
                let self = this;
                let reader = new FileReader();
                reader.readAsDataURL(eve.target.files[0]);
                reader.onload = function () {
                    let a = [];
                    a['src'] = reader.result;
                    a['type'] = 'img';
                    a['style'] = {
                        'position':'absolute',
                        'left' : '0px',
                        'top' :'0px',
                    }
                    a['in'] = self.now;
                    self.img.push(a);
                    
                }
                self.order.push(0);
            },
            nowSeal(i){
                this.nowSeal = i;
            },
            file(eve){
                let reader = new FileReader();
                let self = this;
                reader.readAsDataURL(eve.target.files[0]);
                console.log(1);
                reader.onload = function () {
                    self.seals.push(reader.result);
                }
            },
            ba(){
                let a = this.order.pop();
                if(a == 0){
                    this.his.push(this.img.pop());
                }else if(a == 1){
                    this.his.push(this.layer.pop());
                    this.his2.push(this.imgButton.pop());
                }
            },  
            re(){
                let b = this.his.pop();

                if(b['type'] == 'img'){
                    this.img.push(b);
                    this.order.push(0);
                }else{
                    this.layer.push(b);
                    this.order.push(1);
                    this.imgButton.push(this.his2.pop())
                }
            },
            layerZ(i){
                console.log(this.now);
                this.layer.forEach(function (value,index) {
                    if(i == index){
                        value['z'] = 10000;
                        
                    }else{
                        value['z'] = value['id'];
                    }
                })
                this.now = i;
            },
            newLa(){
                let a = [];
                a['type'] = 'layer';
                a['id'] = this.id;
                a['z'] = this.id;
                this.layer.push(a);
                let b = [];
                b['text'] = "屠城"+this.id;
                b['id'] = this.id;
                this.imgButton.push(b);
                this.order.push(1);
                this.now = this.id;
                this.id++;
            },
            imgDown(eve,i){
                if(this.button == 1){
                    this.turn = true;
                    this.nowImg = i;
                    this.downX = eve.offsetX;
                    this.downY = eve.offsetY;
                }
                
            },
            down(eve){
                if(this.button == 4 && this.layer.length>0){
                    this.turn = true;
                    let canvas = eve.currentTarget.childNodes[this.now+1].childNodes[0];
                    canvas.width = this.canWidth;
                    canvas.height = this.canheight;
                    let aaa = canvas.getBoundingClientRect();
                    this.ctx = canvas.getContext('2d');
                    
                    let img = new Image();
                    console.log(this.fontWidth);
                    img.src = this.seals[this.nowSeal];
                    let self = this;
                    img.onload = function () {
                        self.ctx.drawImage(img,eve.clientX - aaa.left - self.fontWidth/2,eve.clientY - aaa.top - self.fontWidth/2 ,self.fontWidth,self.fontWidth);
                        self.startX = 10000;
                        self.startY = 10000;
                        self.endX = 0;
                        self.endY = 0;
                        if(self.startX > eve.clientX - aaa.left){
                            self.startX = eve.clientX - aaa.left;
                        }
                        if(self.startY > eve.clientY - aaa.top){
                            self.startY = eve.clientY - aaa.top;
                        }
                        if(self.endX < eve.clientX - aaa.left){
                            self.endX = eve.clientX - aaa.left;
                        }
                        if(self.endY < eve.clientY - aaa.top){
                            self.endY = eve.clientY - aaa.top;
                        }
                        
                        
                    }
                    // this.ctx.moveTo(eve.clientX - aaa.left , eve.clientY - aaa.top);

                    // this.ctx.lineTo(eve.clientX - aaa.left , eve.clientY - aaa.top);
                    // this.ctx.stroke();
                }else if(this.button == 2 && this.layer.length>0){
                    this.turn = true;
                    let canvas = eve.currentTarget.childNodes[this.now+1].childNodes[0];
                    canvas.width = this.canWidth;
                    canvas.height = this.canheight;
                    let aaa = canvas.getBoundingClientRect();
                    this.ctx = canvas.getContext('2d');
                    this.ctx.lineJoin = 'round';
                    this.ctx.lineCap = 'round';
                    this.ctx.lineWidth = this.fontWidth;
                    this.ctx.strokeStyle = this.color;
                    this.ctx.beginPath();
                    this.ctx.moveTo(eve.clientX - aaa.left , eve.clientY - aaa.top);

                    this.ctx.lineTo(eve.clientX - aaa.left , eve.clientY - aaa.top);
                    this.ctx.stroke();
                    this.startX = 10000;
                    this.startY = 10000;
                    this.endX = 0;
                    this.endY = 0;
                    if(this.startX > eve.clientX - aaa.left){
                        this.startX = eve.clientX - aaa.left;
                    }
                    if(this.startY > eve.clientY - aaa.top){
                        this.startY = eve.clientY - aaa.top;
                    }
                    if(this.endX < eve.clientX - aaa.left){
                        this.endX = eve.clientX - aaa.left;
                    }
                    if(this.endY < eve.clientY - aaa.top){
                        this.endY = eve.clientY - aaa.top;
                    }
                    
                }
            },
            move(eve){
                if(this.button == 1 && this.turn){
                    let canvas = eve.currentTarget.childNodes[this.now + 1].childNodes[0];
                    let aaa = canvas.getBoundingClientRect();
                    this.img[this.nowImg]['style'] = {
                        'position':'absolute',
                        'left' : eve.clientX - aaa.left - this.downX+'px',
                        'top' :eve.clientY - aaa.top -this.downY +'px',
                    }
                }else if(this.button == 2 && this.turn){
                    let canvas = eve.currentTarget.childNodes[this.now + 1].childNodes[0];
                    let aaa = canvas.getBoundingClientRect();
                    console.log(this.endX,this.startX);   
                    this.ctx.lineTo(eve.clientX - aaa.left , eve.clientY - aaa.top);
                    this.ctx.stroke();
                    if(this.startX > eve.clientX - aaa.left){
                        this.startX = eve.clientX - aaa.left;
                    }
                    if(this.startY > eve.clientY - aaa.top){
                        this.startY = eve.clientY - aaa.top;
                    }
                    if(this.endX < eve.clientX - aaa.left){
                        this.endX = eve.clientX - aaa.left;
                    }
                    if(this.endY < eve.clientY - aaa.top){
                        this.endY = eve.clientY - aaa.top;
                    }
                }else if(this.button == 4 && this.turn){
                    let canvas = eve.currentTarget.childNodes[this.now + 1].childNodes[0];
                    let aaa = canvas.getBoundingClientRect();  
                    let img = new Image();
                    console.log(this.fontWidth);
                    img.src = this.seals[this.nowSeal];
                    let self = this;
                    img.onload = function () {
                        self.ctx.drawImage(img,eve.clientX - aaa.left - self.fontWidth/2,eve.clientY - aaa.top - self.fontWidth/2 ,self.fontWidth,self.fontWidth);
                        if(self.startX > eve.clientX - aaa.left){
                            self.startX = eve.clientX - aaa.left;
                        }
                        if(self.startY > eve.clientY - aaa.top){
                            self.startY = eve.clientY - aaa.top;
                        }
                        if(self.endX < eve.clientX - aaa.left){
                            self.endX = eve.clientX - aaa.left;
                        }
                        if(self.endY < eve.clientY - aaa.top){
                            self.endY = eve.clientY - aaa.top;
                        }
                        
                }
            }
            },
            up(eve){
                if(this.button == 1 && this.turn){
                    this.turn = false;
                }else if(this.button == 2 && this.turn){
                    this.turn = false;
                    this.startX -= this.fontWidth/2;
                    this.startY -= this.fontWidth/2;
                    this.endX += this.fontWidth/2;
                    this.endY += this.fontWidth/2;
                    let idata = this.ctx.getImageData(this.startX,this.startY,this.endX - this.startX , this.endY - this.startY);
                    let can = document.createElement('canvas');
                    can.width = this.endX - this.startX;
                    can.height = this.endY - this.startY;
                    let ctx2 = can.getContext('2d');
                    ctx2.putImageData(idata,0,0);
                    let a = [];
                    a['src'] = can.toDataURL('image/jpg');
                    a['type'] = 'img';
                    a['style'] = {
                        'position':'absolute',
                        'left' : this.startX+'px',
                        'top' : this.startY+'px',
                    }
                    a['in'] = this.now;
                    this.order.push(0);
                    this.img.push(a);
                    this.ctx.clearRect(this.startX,this.startY,this.endX - this.startX , this.endY - this.startY);
                }else if(this.button == 4 && this.turn){
                    this.turn = false;
                    this.startX -= this.fontWidth/2;
                    this.startY -= this.fontWidth/2;
                    this.endX += this.fontWidth/2;
                    this.endY += this.fontWidth/2;
                    let idata = this.ctx.getImageData(this.startX,this.startY,this.endX - this.startX , this.endY - this.startY);
                    let can = document.createElement('canvas');
                    can.width = this.endX - this.startX;
                    can.height = this.endY - this.startY;
                    let ctx2 = can.getContext('2d');
                    ctx2.putImageData(idata,0,0);
                    let a = [];
                    a['src'] = can.toDataURL('image/jpg');
                    a['type'] = 'img';
                    a['style'] = {
                        'position':'absolute',
                        'left' : this.startX+'px',
                        'top' : this.startY+'px',
                    }
                    a['in'] = this.now;
                    this.order.push(0);
                    this.img.push(a);
                    this.ctx.clearRect(this.startX,this.startY,this.endX - this.startX , this.endY - this.startY);
                }
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
    img{
        user-select: none;
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
        height: 160px;
        padding: 10px;
        margin: auto;
        display: flex;
        justify-content: space-around;
    }
    .main{
        width: 100%;
        height: 75%;
        display: flex;
        justify-content: space-around;
    }
    .left , .right{
        width: 15%;
        height: 100%;
        background-color: white;
    }
    .center{
        width: 1280px;
        height: 720px;
        background-color: white;
        position: relative;
    }
    
    .left>button,.right>button,.top>button,.left>label{
        width: 150px;
        font-size: 30px;
        margin: 40px auto ;
        display: block;
        background-color: rgb(156, 156, 156);
        border: 0px;
        color: white;
        border-radius: 5px;
        
    }
    canvas{
        position: absolute;
        top: 0px;
        left: 0px;
    }
    .a{
        position: absolute;
        top: 0px;
        left: 0px;
    }
</style>
