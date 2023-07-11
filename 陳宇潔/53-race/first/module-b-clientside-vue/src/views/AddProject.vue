<template>
  <div class="bg">
      <h1>新增專案</h1>
      <main class="d d-flex">
          <div class="group">
            <label for="height">
              <p>畫布高度</p>
              <input type="number" v-model="canvasHeight" id="height">
            </label>
            <label for="width">
              <p>畫布寬度</p>
              <input type="number" v-model="canvasWidth" id="width">
            </label>
          </div>
          <label for="backgroundColor">
            <p>畫布底色</p>
            <input type="color" v-model="canvasColor" id="backgroundColor">
          </label>
          <RouterLink to="/canvas">
            <button class="add">確定</button>
          </RouterLink>
      </main>
  </div>
  <RouterView />
</template>
<script setup>
import { RouterLink, RouterView } from 'vue-router';
import { onMounted, ref, watch } from 'vue';

const canvasWidth = ref(1280);
const canvasHeight = ref(720);
const canvasColor = ref('#ffffff');

const save = () => {
  localStorage.setItem('w', canvasWidth.value);
  localStorage.setItem('h', canvasHeight.value);
  localStorage.setItem('c', canvasColor.value);
};
watch([canvasWidth, canvasHeight, canvasColor], save);
onMounted(() => {
  save();
});
</script>
<style>
.bg{
    width: 75%;
    height: 75vh;
    margin: 10px auto;
    border-radius: 25px;
    border: 10px solid lightgray;
}
h1{
    background-color: lightgray;
    margin: 0;
    padding: 20px;
    font-size: 50px;
}
input[type="number"]{
  width: 200px;
}
#backgroundColor{
  width: 480px;
  margin-bottom: 50px;
}
.group{
    width: 50%;
    display: flex;
    justify-content: space-around;
}
</style>
