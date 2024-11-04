let color = document.querySelector('.box');
let btns = document.querySelectorAll('.btn');
let main = document.querySelector('.content');

naturePhoto = [1, 2, 3, 4, 5]
cityPhoto = [1, 2, 3]
function All(){
    main.innerHTML = naturePhoto.map((b) => {
        return `<img src="./picture/nature${b}.jpg" alt="">`
    }).join("");
    main.innerHTML += cityPhoto.map((b) => {
        return `<img src="./picture/city${b}.jpg" alt="">`
    }).join("");
}
function Nature(){
    main.innerHTML = naturePhoto.map((b) => {
        return `<img src="./picture/nature${b}.jpg" alt="">`
    }).join("");
}
function City(){
    main.innerHTML = cityPhoto.map((b) => {
        return `<img src="./picture/city${b}.jpg" alt="">`
    }).join("");
}
All()
btns.forEach((c, index)=>{
    c.addEventListener('click', ()=>{
        main.innerHTML = ``;
        btns.forEach((btn)=>{
            btn.classList.remove('box')
        })
        if (index == 0){
            All()
        }
        else if(index == 1){
            Nature()
        }
        else{
            City()
        }
        c.classList.add('box')
    })
})