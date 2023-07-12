<template>
    <div class="top">
        <button>新增專安</button>
        <button>復原</button>
        <button>重作</button>
        <button>儲存成圖片{{ button }}</button>
    </div>
    <div class="main">
        <div class="left">
            <button @click="button = 1">選取</button>
            <button @click="button = 2">畫筆</button>
            <input type="text" v-model="fontSize">
            <button @click="button = 3">油漆桶</button>
            <input type="color" v-model="color">
            <button @click="button = 4">樣章</button>
            <label for="seal">上傳樣章</label>
            <input type="file" id="seal" style="display: none;">
            <label for="update">上傳圖片</label>
            <input type="file" id="update" style="display: none;">
            {{ now }}
        </div>
        <div class="center" @mousedown="down" @mousemove="move" @mouseup="up">
            <div class="a" v-for="(value,index) in layer">
                <canvas :width="canWidth" :height="canHeight">
                </canvas>
                <div class="imageBox" v-for="(v,i) in img">
                    <img draggable="false" v-show="v['in'] == i" :src="v['src']" alt="" :style="v['style']" @mousedown="imgDown($event,i)">
                </div>
                <div class="imageBox" v-for="(v,i) in img">
                    {{ v['in'] }} 
                    <img draggable="false" :src="v['src']" v-show="now == v['in']" alt="" :style="v['style']" @mousedown="imgDown($event,i)" style="opacity:0">
                </div>
            </div>
        </div>
        <div class="right">
            <button @click="insertLaryer">新增圖層</button>
            <button @click="laCha(index)" v-for="(value,index) in laButton">{{ value.text }}</button>
        </div>
    </div>
</template>
<script>
    export default{
        data(){

            return{
                canWidth:1280,
                canHeight:720,
                button:0,
                color:'#000000',
                layer:[],
                layerCtx:[],
                laButton:[],
                now:0,
                id:0,
                fontSize:10,
                startX:10000,
                startY:10000,
                endX:0,
                endY:0,
                turn:false,
                img:[],
                nowImg:0,
                downX:0,
                downY:0,
            }
        },
        methods:{
            laCha(i){
                this.now = i;
            },
            insertLaryer(){
                let a = [];
                a['type'] = 'laryer';
                a['id'] = this.id;
                a['z'] = this.id;
                a['ctx'] = '';
                this.layer.push(a);
                let b = [];
                b['text'] = '圖層'+this.id;
                b['id'] = this.id;
                this.now = this.id;
                this.id++;
                this.laButton.push(b);
            },
            imgDown(eve,i){
                this.turn = true;
                this.nowImg = i;
                this.downX = eve.offsetX;
                this.downY = eve.offsetY;
            },
            down(eve){
                if(this.button == 2 && eve.currentTarget.childNodes[this.now + 1].childNodes[0]){
                    this.turn = true;
                    if(this.layer[this.now]['ctx'] == ''){
                        this.layer[this.now]['ctx'] = eve.currentTarget.childNodes[this.now + 1].childNodes[0].getContext('2d');
                    }
                    let aaa = eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect();
                    this.layer[this.now]['ctx'].lineJoin = 'round';
                    this.layer[this.now]['ctx'].lineCap = 'round';
                    this.layer[this.now]['ctx'].strokeStyle = this.color;
                    this.layer[this.now]['ctx'].lineWidth = this.fontSize;

                    this.layer[this.now]['ctx'].beginPath();
                    this.layer[this.now]['ctx'].moveTo(eve.clientX - aaa.left,eve.clientY - aaa.top);
                    this.layer[this.now]['ctx'].lineTo(eve.clientX - aaa.left,eve.clientY - aaa.top);
                    this.layer[this.now]['ctx'].stroke();
                    
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
                }else if(this.button == 3){
                    if(this.layer[this.now]['ctx'] == ''){
                        this.layer[this.now]['ctx'] = eve.currentTarget.childNodes[this.now + 1].childNodes[0].getContext('2d');
                    }
                    console.log(this.layer[this.now]['ctx']);
                    this.layer[this.now]['ctx'].fillStyle = this.color;
                    this.layer[this.now]['ctx'].fillRect(0,0,this.canWidth,this.canHeight);
                }

            },
            move(eve){
                if(this.button == 1 && this.turn){
                    let aaa = eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect();
                    this.img[this.nowImg]['style'] = {
                        'position': 'absolute',
                        'top': eve.clientY - aaa.top - this.downY+'px',
                        'left': eve.clientX - aaa.left - this.downX+'px',
                    };
                }else if(this.button == 2 && this.turn){
                    console.log(54);
                    let aaa = eve.currentTarget.childNodes[this.now + 1].childNodes[0].getBoundingClientRect();
                    this.layer[this.now]['ctx'].lineTo(eve.clientX - aaa.left,eve.clientY - aaa.top);
                    this.layer[this.now]['ctx'].stroke();
    
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
            up(eve){
                if(this.button == 1 && this.turn){
                    this.turn = false;
                }else if(this.button == 2 && this.turn){
                    this.turn = false;
                    this.startX -= this.fontSize/2;
                    this.startY -= this.fontSize/2;
                    this.endX += this.fontSize/2;
                    this.endY += this.fontSize/2;

                    let idata = this.layer[this.now]['ctx'].getImageData(this.startX,this.startY,this.endX - this.startX,this.endY - this.startY);
                    let canvas = document.createElement('canvas');
                    canvas.width =  this.endX - this.startX;
                    canvas.height =  this.endY - this.startY;
                    let ctx2 = canvas.getContext('2d');
                    ctx2.putImageData(idata,0,0)
                    let a = [];
                    a['src'] = canvas.toDataURL('image/jpg');
                    a['type'] = 'image';
                    a['style'] = {
                        'position': 'absolute',
                        'top': this.startY+'px',
                        'left': this.startX+'px',
                    }
                    a['in'] = this.now;
                    this.img.push(a);
                    this.layer[this.now]['ctx'].clearRect(this.startX,this.startY,this.endX - this.startX,this.endY - this.startY);
                }
            }
        }
    }
</script>
<style>
    img{
        user-select: none;
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
    .top{
        width: 80%;
        margin: auto;
        display: flex;
        justify-content: space-around;
        height: 50px;
        padding: 40px;
        /* background-color: white; */
        
    }
    .main{
        width: 100%;
        height: 80%;
        display: flex;
        justify-content: space-around;
        margin-top: 50px;
    }
    .left,.right{
        width: 10%;
        height: 90%;
        background-color: white;
    }
    .center{
        width: 1280px;
        height: 720px;
        background-color: white;
        position: relative;
    }
    .left>button,.left>input, .left>label , .right>button ,.top>button{
        width: 170px;
        display: block;
        background-color: #a3a3a3;
        margin: auto;
        font-size: 30px;
        border: 2px solid black;
        margin-top: 30px;
        color: white;
    }
    .a{
        position: absolute;
        top: 0px;
        left: 0px;
    }
</style>