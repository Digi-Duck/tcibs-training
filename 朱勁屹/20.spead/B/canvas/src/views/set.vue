<template>
    
    <div class="grayBox">
        <div class="inputBox">
            <div class="box">
                <div class="text">畫布寬度</div>
                <input type="text" v-model="canvasWidth">
            </div>
            <div class="box">
                <div class="text">畫布高度</div>
                <input type="text" v-model="canvasHeight">
            </div>
            <div class="box">
                <button v-on:click="go">確認</button>
            </div>
            
        </div>

    </div>
    
</template>
<script>
    import {ref} from 'vue';

    export default{
        setup(){
                const canvasWidth = ref(1280);
                const canvasHeight = ref(720);

            return {
                canvasWidth,
                canvasHeight,
                
            }
        },methods:{
            go(){
                
            }
        }
    }
</script>
<style>
        *{
            font-size: 30px;
        }
        html{
            width: 100%;
            height: 100%;

        }
        body{
            width: 100%;
            height: 100%;
            margin: 0px;
        }
        .inputBox{
            width: 700px;
            height: 500px;
            margin: 150px auto;
            border-radius: 5px;
        }
        .text{
            padding: 10px;
            color: white;
        }
        input{
            padding: 10px;
        }
        button{
            padding: 5px 50px;

        }
        .box{
            width: 80%;
            display: flex;
            justify-content: space-around;
            padding-top: 100px;
            margin: auto;
            /* padding: 50px; */
        }
        .grayBox{
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0px;
            left: 0px;
            background-color: #565656;
        }
</style>
