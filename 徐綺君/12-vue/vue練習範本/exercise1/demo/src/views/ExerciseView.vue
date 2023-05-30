<template>
    <div class="exercise">
        <h1>
            Hello World
        </h1>
        <div class="btns">
            <button @click="record" class="btn"><img src="../assets/button-record.svg" alt="">紀錄</button>
            <button @click="remit" class="btn"><img src="../assets/button-export.svg" alt="">匯出</button>
            <button @click="start" class="btn"><img src="../assets/button-next.svg" alt="">開始填寫</button>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                value:{
                    name: 1234,
                    aa: 5555,
                },
                v: '',
            }
        },
        methods:{
            record(){
                this.v = JSON.stringify(this.value);
                alert(this.v);
                sessionStorage.setItem("data", this.v);
            },
            remit(){
                console.log(this.v);
                const link = document.createElement("a");
                const file = new Blob([this.v], { type: 'text/plain' });
                link.href = URL.createObjectURL(file);
                link.download = "sample.txt";
                link.click();
                URL.revokeObjectURL(link.href);
                console.log(1);
            },
            start(){
                
            },
        },
        mounted(){

        },
    }
</script>

<style scoped>
    .btns{
        display: flex;
        justify-content: center;
    }
    .btn:hover{
        background-color: rgb(93, 180, 151);
    }
</style>