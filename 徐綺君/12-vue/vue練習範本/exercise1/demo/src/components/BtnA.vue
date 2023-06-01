<template>
    <button class="btn"><img :src="btnImg" alt="">{{ btnText }}</button>
</template>

<script>
export default {
  name: 'btnA',
  props: {
    btnImg: String,
    btnText: String,
  }
}
</script>

<style scoped>
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
    button:hover{
        background-color: rgb(93, 180, 151);
    }
</style>