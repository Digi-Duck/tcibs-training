var selector = Math.floor(Math.random()*2);
// if selector = 0 --> lose
// if selector = 1 --> win
// if selector = 2 --> equal
if(selector == 0){
    
}else if(selector == 1){

}else if(selector == 2){

}
function test(){
    alert("asdf");
}

function scissorBtn(){
    var selector = Math.floor(Math.random()*3);
    if(selector == 0){
        console.log("lose");
    }else if(selector == 1){
        console.log("win");
    }else if(selector == 2){
        console.log("equal");
    }
}
function stoneBtn(){
    var selector = Math.floor(Math.random()*3);
    if(selector == 0){
        console.log("lose");
    }else if(selector == 1){
        console.log("win");
    }else if(selector == 2){
        console.log("equal");
    }
}
function clothBtn(){
    var selector = Math.floor(Math.random()*3);
    if(selector == 0){
        console.log("lose");
    }else if(selector == 1){
        console.log("win");
    }else if(selector == 2){
        console.log("equal");
    }
}


let scissor_btn = document.querySelector(".scissor_btn");
let stone_btn = document.querySelector(".stone_btn");
let cloth_btn = document.querySelector(".cloth_btn");
scissor_btn.addEventListener("click",scissorBtn);
stone_btn.addEventListener("click",stoneBtn);
cloth_btn.addEventListener("click",clothBtn);