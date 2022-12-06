var wValue,hValue;
let BMInum = document.querySelector(".comment-BMI");
let comment = document.querySelector(".comment-suggest");
let commentpart = document.querySelector(".comment-part");


function BMIcalc(wValue,hValue){
    let hsquare = hValue*hValue;
    let num = wValue/hsquare;
    BMIindex = Math.round(num*10)/10;
    if(BMIindex > 0){
        if(BMIindex < 18.5){
            BMInum.innerHTML ="BMI:" + BMIindex;
            comment.innerHTML = "situation:too light";
        }else if(BMIindex < 24){
            BMInum.innerHTML ="BMI:" + BMIindex;
            comment.innerHTML = "situation:standard";
        }else if(BMIindex < 27){
            BMInum.innerHTML ="BMI:" + BMIindex;
            comment.innerHTML = "situation:overweight";
        }else if(BMIindex < 30){
            BMInum.innerHTML ="BMI:" + BMIindex;
            comment.innerHTML =" situation:mildly obese";
        }else if(BMIindex < 35){
            BMInum.innerHTML ="BMI:" + BMIindex;
            comment.innerHTML = "situation:Moderate obesity";
        }else if(BMIindex > 35){
            BMInum.innerHTML ="BMI:" + BMIindex;
            comment.innerHTML = "situation:severe obesity";
        }
    }else{
        comment.innerHTML = "error!";
    }
}

let btn = document.querySelector(".submit-text");

btn.onclick = function(){
    var iptweight = document.getElementById("weight").value;
    var iptheight = document.getElementById("height").value;
    if(isNaN(parseInt(iptweight)) == true | isNaN(parseInt(iptheight)) == true){
        alert("error, it number idiot");
    }else{
        if(iptheight > 3){
            alert("it meter!");
        }else{
            commentpart.classList.remove("display-none");
            BMIcalc(iptweight,iptheight);
        }
    }
}

let reset = document.querySelector(".clear-text");
reset.onclick = function(){
    commentpart.classList.add("display-none");
}