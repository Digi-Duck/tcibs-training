const search = document.querySelector('input[type="search"]');
const btn = document.querySelector('button');
const span = document.querySelector('span');

btn.addEventListener('click', () => {
    const value = search.value.trim();
    if (value) {
        const regex = new RegExp(value, 'g');
        const highlightedColor = getRGB();
        const original = span.innerHTML
        // const original = span.innerHTML.replace(/(<([^>]+)>)/ig, "")
        const highlighted = original.replace(regex, `<span class="highlight" style="background-color: ${highlightedColor};">$&</span>`);
        span.innerHTML = highlighted;
    } 
});

function getRGB() {
    const rgb = Array.from({ length: 3 }, () => Math.floor(Math.random() * 256));
    return `rgba(${rgb.join(', ')}, 0.7)`;
}