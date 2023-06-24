<template>
     <div class="top">
        <button>新增專案</button>
        <button>復原</button>
        <button>重作</button>
        <button>儲存圖片</button>
    </div>
    <div class="box">
        <div class="left">
            <button>選取</button>
            <button>筆刷</button>
            <input type="text">
            <button>油漆桶</button>
            <input type="color">
            <button>樣章</button>
            <button>儲存樣章</button>
            <button>上傳圖片</button>
        </div>
        <div class="center">
            <canvas>

            </canvas>
        </div>
        <div class="right">
            <button>新增屠城</button>
        </div>

    </div>
</template>
<script>


let canvas = document.querySelector("canvas");
canvas.addEventListener('mousedown',function () {
    console.log(1);
});

export default{
    setup(){
        return{
            
        }
    },methods:{
        }
    }
</script>
<style>
        
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

        }
        canvas{
            width: 500px;
            height: 500px;
            background-color: white;
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