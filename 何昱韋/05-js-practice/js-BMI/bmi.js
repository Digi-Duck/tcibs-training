var wValue,hValue;
let comment = document.querySelector(".comment-text");
let commentpart = document.querySelector(".comment-part");


function BMIcalc(wValue,hValue){
    let hsquare = hValue*hValue;
    let BMIindex = wValue/hsquare;
    if(BMIindex > 0){
        if(BMIindex < 18.5){
            comment.innerHTML = "BMI:too light";
        }else if(BMIindex < 24){
            comment.innerHTML = "BMI:standard";
        }else if(BMIindex < 27){
            comment.innerHTML = "BMI:overweight";
        }else if(BMIindex < 30){
            comment.innerHTML ="BMI:mildly obese";
        }else if(BMIindex < 35){
            comment.innerHTML = "BMI:Moderate obesity";
        }else if(BMIindex > 35){
            comment.innerHTML = "BMI:severe obesity";
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