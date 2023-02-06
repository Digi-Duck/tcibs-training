const checkboxes = document.querySelectorAll('.row input[type="checkbox"]');
const line = document.querySelectorAll('.row');
let a;

checkboxes.forEach(function(checkboxi,i){
    checkboxi.addEventListener('change', function (){
        checkboxes[i].classList.toggle(`img${i}`);
        line[i].classList.toggle(`line`);
        console.log(`ii-${i}`);
    }) 
    checkboxi.addEventListener('keydown', function(e){
        if(e.key == "Shift"){ 
            checkboxes.forEach(function(checkboxj,j){
                checkboxj.addEventListener('click', function(){
                    for(a = i; a < j; a++){
                        checkboxes[a].classList.add(`img${a}`);
                        line[a].classList.add(`line`);
                        console.log(`a-${a}`);
                        console.log(`i-${i}`);
                    }
                })
            })
        }
    })
})


   
    

