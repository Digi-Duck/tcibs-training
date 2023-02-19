const spacing = document.getElementById('spacing');
const blur = document.getElementById('blur');
const color = document.getElementById('color');

spacing.addEventListener('change',function(){
    document.documentElement.style.setProperty(`--${spacing.name}`,spacing.value * 10 + spacing.dataset.sizing);
    console.log(spacing.value * 10 + spacing.dataset.sizing);
})
blur.addEventListener('change',function(){
    document.documentElement.style.setProperty(`--${blur.name}`,blur.value + blur.dataset.sizing);
    console.log(blur.value + blur.dataset.sizing);
})
color.addEventListener('change',function(){
    document.documentElement.style.setProperty(`--${color.name}`,color.value);
    console.log(color.value);
})