<template>
    <!-- <div class="back" v-show="back">
        <input type="text" v-model="canWidth">
        <input type="text" v-model="canHeight">
        <button v-on:click="back == false">送出</button>
    </div> -->
    <div class="top">
        <button>新增專案{{ button }}</button>
        <button>還原</button>
        <button>重作</button>
        <button>儲存圖片</button>
    </div>
    <div class="main">
        <div class="left">
            <button @click="button = 1">選取</button>
            <button @click="button = 2">筆刷</button>
            <input type="number">
            <button @click="button = 3">油漆桶</button>
            <input type="color">
            <button @click="button = 4">樣章</button>
            <label class="button" for="fi">儲存樣章</label>
            <input id="fi" type="file" style="display: none;">

            <button>上傳圖片</button>
        </div>
        <div class="center" :style="{width: canWidth,height: canHeight}">
            <div class="a">
                <canvas :style="{width: canWidth,height: canHeight}"></canvas>
            </div>
        </div>
        <div class="right">
            <button>新增圖層</button>
            <button v-for="(value,index) in layer">{{ value.text }}</button>
        </div>

    </div>
</template>
<script>
    import { ref } from 'vue';
    export default{
        setup(){
            let canWidth = ref('1280px');
            let canHeight = ref('720px');
            let back = ref(true);
            let button = ref(0);
            let layer = ref([]);
            return{
                canWidth,
                canHeight,
                back,
                button,
                layer,
            }
        },methods:{
            
            
        }
    }
</script>
<style>
    
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
</style>