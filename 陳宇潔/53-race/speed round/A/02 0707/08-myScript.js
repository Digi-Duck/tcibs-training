const a = document.querySelectorAll('a')
const main = document.querySelector('main')

a.forEach(a => {
    a.addEventListener('click', function(e){
        e.preventDefault()
        fetch(a.href)
        .then(response => response.text())
        .then(data => {
            const dom = new DOMParser()
            const doc = dom.parseFromString(data, 'text/html')
            main.innerHTML = doc.querySelector('main').innerHTML
        })
        history.pushState(null, null, a.href)
    })
})