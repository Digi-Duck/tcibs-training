const btn = document.querySelectorAll(".btn")
const page = document.querySelectorAll(".page")

//#a5a3a0
btn.forEach(function(element,index) {
    element.addEventListener('click', function () {
        page.forEach(function(element,index) {
            page[index].classList.add("disappear");
            console.log(element);
        });
        btn.forEach(function(element,index) {
            btn[index].classList.remove("color");
            console.log(element);
        });
        btn[index].classList.add("color");
        page[index].classList.remove("disappear");
    });
});