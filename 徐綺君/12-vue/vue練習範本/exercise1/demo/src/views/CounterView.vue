<template>
    <div class="counter">
        <h1>計數器</h1>
        set Number <input type="number" v-model.number="num">
        <div class="btns">
            <btn @click="add" btnText="+1" />
            <btn @click="reduce" btnText="-1" />
            <btn @click="clear" btnText="歸零" />
        </div>
    </div>
</template>

<script>
    import Btn from '@/components/Btn'

    export default {
        data(){
            return{
                num: 0,
            }
        },
        methods:{
            add(){
                this.num = this.num + 1;
            },
            reduce(){
                this.num = this.num - 1;
            },
            clear(){
                this.num = 0;
            }
        },
        mounted(){

        },
        components: {
            Btn
        }
    }
</script>
<style scoped>
    .btns{
        display: flex;
        justify-content: center;
    }
</style>