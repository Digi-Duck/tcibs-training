<template>
  <router-view/>
</template>
<style>
body{
    background-color: #565656;
    padding: 20px 50px;
}
input{
    cursor: pointer;
}
*{
    font-size: 25px;
    font-weight: 600;
    color: #565656;
    text-align: center;
    font-weight: bold;
    font-size: 25px;
}
header{
    display: flex;
    justify-content: space-between;
}
button{
    background-color: lightgray;
    padding: 10px 20px;
    border-radius: 10px;
    border: 2.5px solid #565656;
    cursor: pointer;
}
button:hover{
    border: 2.5px solid lightgray;
    color: lightgray;
    background-color: #565656;
}
main{
    justify-content: space-between;
    padding: 20px 0;
}
p{
  color: lightgray;
}
input{
    height: 75px;
    border-radius: 10px;
    border: 5px solid lightgray
}
.d-flex{
    display: flex;
}
.center{
    justify-content: center;
    align-items: center;
}
.d{
    flex-direction: column;
    align-items: center;
}
.none{
    display: none;
}
</style>
