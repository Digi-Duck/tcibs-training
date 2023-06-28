const textarea = document.querySelector('textarea');
const result = document.querySelector('pre');

textarea.addEventListener('keyup', function() {
    const values = textarea.value.split('\n'); 
    
    const lines = values.map(line => {
        const strong = line.match(/(\*\*(.+)\*\*)/);
        if (strong) {
            line = `<strong>${strong[2]}</strong>`;
        }
        const title = line.match(/(#+)(.+)/);
        if (title) {
            const level = title[1].length;
            line = `<h${level}>${title[2]}</h${level}>`;
        }
        const hr = line.match(/\-{3}/);
        if (hr) {
            line = `<hr></hr>`;
        }
        const li = line.match(/\-\s(.+)/);
        if (li) {
            line = `<li>${li[0]}</li>`;
        }
        const a = line.match(/\[(.+)\]\s\((.+)\)/);
        if (a) {
            console.log(a);
            line = `<a href="${a[2]}">${a[1].trim()}</a>`;
        }
        const img = line.match(/\!\[(.+)\]\s\((.+)\)/g);
        if (img) {
            line = `<img src="${img[2]}" alt="${img[1]}"></img>`;
        }
        return line;
    });
    
    const text = lines.join('\n'); 
    result.innerHTML = text;
});