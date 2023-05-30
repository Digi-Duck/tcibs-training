<template>
    <div class="counter">
        <h1>練習一</h1>
        <h2>A</h2>
        <div class="allA">
            <button class="btnA"><img src="../assets/button-record.svg" alt="">修改紀錄</button>
            <button class="btnA"><img src="../assets/button-save.svg" alt="">儲存</button>
            <button class="btnA"><img src="../assets/button-add.svg" alt="">新增</button>
            <button class="btnA"><img src="../assets/button-export.svg" alt="">匯出</button>
            <button class="btnA"><img src="../assets/button-prev.svg" alt="">上一步</button>
            <button class="btnA"><img src="../assets/button-next.svg" alt="">下一步</button>
        </div>
        <h2>B</h2>
        <div class="allB">
            <div class="groupBtn">
                <button class="btnB" @click="checked = !checked" :class="{gray: checked}">中止</button>
                <button class="btnB" @click="checked = !checked" :class="{color: !checked}">服務</button>
            </div>
            <div class="groupBtn">
                <button class="btnB" @click="checked1 = !checked1" :class="{color: checked1}">市話</button>
                <button class="btnB" @click="checked1 = !checked1" :class="{color: !checked1}">手機</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                checked: true,
                checked1: true,
            }
        },
        methods:{
            click(){
                
            },
        },
        mounted(){

        },
    }
</script>

<style>
    button{
        font-weight: 600;
        width: 150px;
        height: 50px;
        margin: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgb(62, 139, 123);
        transition: 0.5s;
        border-radius: 5px;
        border: none;
        color: white;
        font-size: 20px;
        box-shadow: 2px 2px 0px 2px rgb(21, 75, 64)
    }
    .btnA:hover{
        background-color: rgb(93, 180, 151);
    }
    img{
        margin-right: 5px;
    }
    .allA{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .allB{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .groupBtn{
        display: flex;
        background-color: rgb(105, 105, 105);
        border-radius: 100px;
        margin: 5px;
        padding: 5px;
    }
    .btnB{
        margin: 0px;
        box-shadow: none;
        border-radius: 100px;
        background-color: rgb(105, 105, 105);
        color: gainsboro;
    }
    .btnB.gray{
        background-color: gray;
        color: white;
    }
    .btnB.color{
        background-color: rgb(93, 180, 151);
        color: white;
    }
</style>