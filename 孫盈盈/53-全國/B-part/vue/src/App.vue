<template>
  <HelloWorld />
  <div class="all">
      <div class="window">
          <table class="card">
              <th>
                  <p style="background-color: rgb(51, 141, 220); color: aliceblue; margin: 0; padding: 5px; font-size: 20px; border-radius: 10px 10px 0 0;">
                      新增專案
                  </p>
                  <p style="margin: 20px 30px;">
                      寬度:
                      <input id="w" type="number" value="1280" required>
                      px
                  </p>
                  <p>
                      高度:
                      <input id="h" type="number" value="720" required>
                      px
                  </p>
                  <p>
                      <button class="true-btn" onclick="addOb()">確認</button>
                  </p>
              </th>
          </table>
      </div>
      <header>
          <div class="add">
              <button class="add head-btn">新增專案</button>
              <button class="store head-btn">儲存圖片</button>
          </div>
          <div class="function">
              <button class="up head-btn">復原</button>
              <button class="down head-btn">重做</button>
          </div>
      </header>
      <div class="content">
          <div class="left">
              <div class="paint" style="color: rgb(220, 245, 244);">
                  <div class="width">
                      <p>寬度</p>
                      <select style="width: 100%; font-size: 15px;" name="" id="width">
                          <option class="option one" value="1" selected>1px</option>
                          <option class="option three" value="3">3px</option>
                          <option class="option five" value="5">5px</option>
                          <option class="option seven" value="7">7px</option>
                      </select>
                  </div>
                  <div class="color">
                      <p>顏色</p>
                      <input id="color" style="width: 100%; height: 50px;" type="color">
                  </div>
              </div>
          </div>
          <div id="center">
              <canvas id="first" style="width: 0;"></canvas>
          </div>
          <div class="right">
              <div class="layers">
              </div>
              <div class="layer-btn">
                  <button>新增圖層</button>
                  <button>刪除圖層</button>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import { ref } from "vue";
export default{
  setup(){

  },methods:{

  }
}
</script>

<style>
body, html{
    margin: 0;
    background-color: #565656;

    width: 100%;
    height: 100%;
}
#app{
  height: 100%;
}
.all{
    position: relative;

    width: 100%;
    height: 100%;
}
.window{
    position: absolute;
    
    display: none;
    align-items: center;
    justify-content: center;

    width: 100%;
    height: 100%;
    background-color: #565656a8;
}
.card{
    border-spacing: 0;
    background-color: rgb(220, 245, 244);

    border-radius: 10px;
}
header{
    display: flex;
    align-items: center;
    
    height: 5%;

    padding: 10px;

    background-color: rgb(202, 244, 255);
    box-sizing: border-box;
}
.head-btn{
    height: 100%;

    padding: 5px;

    font-size: 20px;
    border-radius: 10px;
    border: 0;
    background-color: rgb(202, 244, 255);
}
.head-btn:hover{
    background-color: rgb(116, 183, 200);
}
.content{
    display: flex;

    width: 100%;
    height: 95%;
}
.left{
    width: 15%;
    height: 100%;

    padding: 10px;

    box-sizing: border-box;
    /* background-color: aqua; */
}
.paint{
    display: flex;
    flex-direction: column;

    width: 100%;
    height: 100%;

    border-radius: 10px;
    background-color: #565656;
    border: 2px solid rgb(197, 255, 255);
}
#center{
    overflow: auto;

    width: 70%;
    height: 100%;

    padding: 10px;
    box-sizing: border-box;
}
canvas{
    background-color: #ffffff00;
}
#first{
    position: relative;
	margin: 0 auto;
    background-color: #ffffff;

    margin: auto;
}
.right{
    width: 15%;
    height: 100%;

    padding: 10px;

    box-sizing: border-box;
}
.layers{
    display: flex;
    flex-wrap: wrap;

    width: 100%;
    height: 95%;

    border-radius: 10px;
    background-color: #565656;
    border: 2px solid rgb(202, 255, 255);
}
.layer{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 50px;

    padding: 3px;
    margin: 20px;

    background-color: rgb(202, 255, 255);
    box-sizing: border-box;
}
.layer-btn{
    display: flex;
    justify-content: space-around;
    align-items: center;

    width: 100%;
    height: 5%;
}
</style>
