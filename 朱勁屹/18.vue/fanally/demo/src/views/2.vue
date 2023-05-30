<template>
{{ array['a']['a'] }}
<form action="">
    <div class="box w-[500px] h-[500px] border-8 rounded m-[auto]">
        <div class="text w-[20%] h-[25%] border-2 float-left"></div> 
        <input type="text" class="">

        <div class="text w-[20%] h-[25%] border-2 float-left"></div> 
        <input type="text">

        <div class="text w-[20%] h-[25%] border-2 float-left"></div> 
        <input type="text">

        <div class="text w-[20%] h-[25%] border-2 float-left"></div> 
        <input type="text">
        
        <button class="">送出</button>
    </div>

</form>
</template>
<script>
    import {ref} from 'vue';
    
    export default{
        setup(){
            const array = ref(
                {
                    'a':{
                        'birth' : '',
                        'bodyId' : '4521532485',
                        'address' : '鳳梨市鳳梨區鳳梨巷鳳梨樓',
                        'time':[],
                    }
                }
            );

            
            return{
                array,
            }
        }
    }
</script>
<style>
    
</style>