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
        box-shadow: 1px 1px 1px 2px rgb(165, 165, 165);
        border-radius: 5px;
        padding: 5px;
        margin: 5px;
        transition: 50ms;
    }
    button:hover{
        box-shadow: -1px -1px 1px 2px rgb(165, 165, 165);
    }
</style>