<template>
    <div class="counter">
        <h1>計數器</h1>
        set Number <input type="number" v-model.number="num">
        <button @click="add">+1</button>
        <button @click="reduce">-1</button>
        <button @click="clear">歸零</button>
        <btn />
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