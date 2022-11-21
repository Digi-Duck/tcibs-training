var gradevalue;
let btn = document.querySelector(".submit-button");
let content = document.querySelector(".comment-content");
function Gradecommenter (gradevalue){
    if (gradevalue >= 90){
        content.innerHTML = "perfect";
    }else if(gradevalue >= 80){
        content.innerHTML = "great";
    }else if(gradevalue >= 70){
        content.innerHTML = "soso";
    }else if(gradevalue >= 60){
        content.innerHTML = "oh no";
    }else{
        content.innerHTML = "you suck";
    }
}

btn.onclick = function(){
    let ipgradevalue = document.getElementById("grade-input").value;
    console.log(parseInt(ipgradevalue));
    if(isNaN(parseInt(ipgradevalue)) == true){
        alert("error, it number idiot");
    }else{
        if(ipgradevalue > 100 | ipgradevalue < 0){
            alert("error,the number is 100 to 0");
        }else{
            Gradecommenter(ipgradevalue);
        }
    }

}
