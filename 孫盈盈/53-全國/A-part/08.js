const Alla = document.querySelectorAll('a');
const main = document.querySelector('h1');

Alla.forEach(a=>{
    a.addEventListener('click', (e)=>{
        e.preventDefault();
        fetch(a.href)
        .then(response => response.text())
        .then(data =>{
            console.log(data);
            const DOM = new DOMParser();
            const doc = DOM.parseFromString(data, 'text/html');
            console.log(doc);
            main.innerHTML = doc.querySelector('h1').innerHTML;

        })
        history.pushState(null, null, a.href)
    })
})