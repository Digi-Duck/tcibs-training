<template>
    <button class="btn">{{ btnText }}</button>
</template>

<script>
export default {
  name: 'btn',
  props: {
    btnText: String
  }
}
</script>

<style scoped>
    button{
        background-color: rgb(255, 255, 255);
        border: none;
        border: 1px solid rgb(165, 165, 165);
        box-shadow: 2px 2px 1px 2px rgb(165, 165, 165);
        border-radius: 5px;
        padding: 5px;
        margin: 5px;
        transition: 50ms;
        color: black;
    }
    button:hover{
        box-shadow: -1px -1px 1px 2px rgb(165, 165, 165);
    }
</style>