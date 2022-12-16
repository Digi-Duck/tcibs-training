const btn = document.querySelectorAll(".btn")
const page = document.querySelectorAll(".page")

// p1.style.backgroundColor = "#a5a3a0";
btn[0].classList.add("color");
btn.forEach(function(element,index) {
    console.log(index,element);
    element.addEventListener('click', function () {
        console.log(index);
        console.log(page[index]);
        page[index].style = "display: block";
        element.classList.toggle("color");
        // if(index == 0){
        //     btn[2].classList.remove("color");
        //     btn[1].classList.remove("color");
        //     page[2].style = "display: none";
        //     page[1].style = "display: none";
        // }else if(index == 1){
        //     btn[0].classList.remove("color");
        //     btn[2].classList.remove("color");
        //     page[0].style = "display: none";
        //     page[2].style = "display: none";
        // }else if(index == 2){
        //     btn[0].classList.remove("color");
        //     btn[1].classList.remove("color");
        //     page[0].style = "display: none";
        //     page[1].style = "display: none";
        // }
    });
});

page.forEach(function(element,index) {
    console.log(index,element);
});
