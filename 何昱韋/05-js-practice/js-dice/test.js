let MY_dice_region1 = document.querySelector(".MY_dice_region_box1");
let MY_dice_region2 = document.querySelector(".MY_dice_region_box2");
let MY_dice_region3 = document.querySelector(".MY_dice_region_box3");
let MY_dice_region4 = document.querySelector(".MY_dice_region_box4");
let MY_dice_region5 = document.querySelector(".MY_dice_region_box5");
let MY_dice_region6 = document.querySelector(".MY_dice_region_box6");
let MY_dice_region7 = document.querySelector(".MY_dice_region_box7");
let MY_dice_region8 = document.querySelector(".MY_dice_region_box8");
let MY_dice_region9 = document.querySelector(".MY_dice_region_box9");
let MY_dice_region10 = document.querySelector(".MY_dice_region_box10");

let game_result = document.querySelector(".game_result");

let dice_css = {
}

function gameResult(){
    var test = [ , , ];
    for (var i=0;i<3;i++){
        let num = Math.floor(Math.random()*6);
        // math.ramdom --> 0,1,2,3,4,5;
        test[i] = num;
    }    

}

let throw_btn = document.querySelector(".throw_btn");
throw_btn.addEventListener("click",gameResult);


