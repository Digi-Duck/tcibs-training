<template>
    <button>a</button>
    <button>s</button>
    <button>d</button>
    <button>f</button>
    
        <label for="input" @click="nmsl =!nmsl" class="w-[200px] h-[100px] flex m-auto">
            <div :class="{a:nmsl}" class="box1 bg-red-100 w-[100px] h-[100px]">46</div>
            <div :class="{a:!nmsl}" class="box2 bg-yellow-100/25 w-[100px] h-[100px]">4654</div>
        </label>
        {{nmsl}}
    </template>
<script>
    import { ref } from 'vue';

    export default {
        setup() {

            const nmsl = ref(true);

            return {
                nmsl
            };
        }
    }
</script>
<style>
    .a{
        opacity: 0.5;
    }
</style>