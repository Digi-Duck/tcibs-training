const start = document.querySelector(".btn")
const box = document.querySelectorAll(".box")

function getrandom(){
    r = Math.floor(Math.random() * 256);
    g = Math.floor(Math.random() * 256);
    b = Math.floor(Math.random() * 256);
    x = Math.floor(Math.random() * 4)
    return r,g,b,x;
}

// function trans(){
//     getrandom(); //變數重新整理
//     box.forEach(function(index,element){
//         box[element].style.backgroundColor = "rgb("+ r + "," + g + "," + b + ")" ;      
//     }) //所有方塊隨機顏色
//     box[x].style.opacity = "0.1"; //隨機方塊透明度為0.1
    
//     start.addEventListener("click", function(){
//         trans();
//         box[x].addEventListener("click", function(){
//             box[x].style.opacity = "1";
//             trans();
//         })
//     })
// }

start.addEventListener("click", 
    function trans(){
        getrandom()
        box.forEach(function(index,element){
            box[element].style.backgroundColor = "rgb("+ r + "," + g + "," + b + ")" ;      
            box[x].style.opacity = "0.1";
            
            box[x].addEventListener("click", function(){
                box[x].style.opacity = "1";
                trans();
            })
        })
    }
)
