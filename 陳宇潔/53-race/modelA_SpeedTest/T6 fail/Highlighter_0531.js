const search = document.querySelector('input[type="search"]');
const btn = document.querySelector('button');
const p = document.querySelectorAll('p');

btn.addEventListener('click', () => {
    const value = search.value.trim();
    if (value) {
        const regex = new RegExp(value, 'g');
        const highlightedColor = getRGB();

        p.forEach((p) => {
            const original = p.innerHTML;
            const highlighted = original.replace(regex, `<span class="highlight" style="background-color: ${highlightedColor};">$&</span>`);
            p.innerHTML = highlighted;
        });
    } else {
        p.forEach((p) => p.innerHTML);
    }
});

function getRGB() {
    const rgb = Array.from({ length: 3 }, () => Math.floor(Math.random() * 256));
    return `rgb(${rgb.join(', ')}, 0.7)`;
}
