const refresh = document.querySelector('.refresh');
const img = document.querySelectorAll('.img');
const boxDrop = document.querySelectorAll('.box');
const clear = document.querySelector('.clear');
const input = document.querySelector('.input');
let array = [];

clear.addEventListener('click', function(){
    input.value = "";
    console.log(111);
})

refresh.addEventListener('click', function(){
    img.forEach(function(element, index){
        element.src=`verify${index}.php`;
    })
})

boxDrop.forEach(function(element) {
    element.addEventListener('dragover', function(e){
        e.stopPropagation(); 
        e.preventDefault();  
            //終止預設行為
    })
    element.addEventListener('dragenter', function(e){
        e.stopPropagation(); 
        e.preventDefault();  
            //終止預設行為     
    })
    element.addEventListener('drop', function(e){
        e.preventDefault();  
        e.target.appendChild(place);
        id = e.dataTransfer.getData('text/plain', element.id);
        array.push(id);
    })
})
img.forEach(function(element) {
    element.addEventListener('dragstart', function(e){
        place = e.target;
        e.dataTransfer.setData('text/plain', element.id);
    })
    element.addEventListener('drop', function(e){
        e.stopPropagation();
    })
})
// dragenter : 拖曳圖片 進入 區塊時觸發
// dragleave : 拖曳圖片 離開 區塊時觸發
// dragover : 拖曳圖片於區塊中 移動 時觸發
// drop : 於區塊中 放開 拖曳的圖片時觸發




