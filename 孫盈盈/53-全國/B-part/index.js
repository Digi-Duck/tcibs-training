function openOb(){
    let card = document.querySelector('.window');
    card.style.display = 'flex';
}
function addOb(){
    let card = document.querySelector('.window');
    card.style.display = 'none';

    let w = document.getElementById('w');
    let h = document.getElementById('h');
    let first = document.querySelector('#first');

    console.log(first);
    first.style.width = w.value + 'px';
    first.style.height = h.value + 'px';
}