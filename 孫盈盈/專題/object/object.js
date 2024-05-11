// String formatter
if (!String.prototype.format) {
  String.prototype.format = function() {
    var args = arguments;
    return this.replace(/{(\d+)}/g, function(match, number) {
      return typeof args[number] != 'undefined' ? args[number] : match;
    });
  };
}
let r = document.querySelector('.red');
let b = document.querySelector('.blue');
let g = document.querySelector('.green');
let submit = document.querySelector('.button');

let app = (() => {
  const sliderThumbSize = 20;
  const sliderHeight = 300;

  let ranges = {
    range1: null,
    range2: null,
    range3: null,
    range4: null,
    range5: null,
    range6: null,
    range7: null
  };
  function updateSlider($element) {
    if ($element) {

      let rangeIndex = $element.getAttribute('data-slider-index'),
        range = ranges[rangeIndex],
        value = $element.value;

      if (range === value) {
        return; // No value change, no need to update then
      }
      // Update state
      ranges[rangeIndex] = value;

      let parent = $element.parentElement,
        $thumb = parent.querySelector('.range-slider__thumb'),
        $bar = parent.querySelector('.range-slider__bar'),
        pct = value * ((sliderHeight - sliderThumbSize) / sliderHeight)

      $thumb.style.bottom = `${pct}%`;
      $bar.style.height = `calc(${pct}% + ${sliderThumbSize/2}px)`;
      //$thumb.textContent = `${value}%`;
    }
  }

  

  function selectPreset(type) {
    // Generate random graph
    const inputs = app.inputs;
    inputs.forEach(input => input.value = 0);
    inputs.forEach(input => app.updateSlider(input));
  }

  return {
    inputs: [].slice.call(document.querySelectorAll('.sliders input')),
    updateSlider,
    selectPreset,
  };

})();

(function initAndSetupTheSliders() {
  const inputs = app.inputs;
  let index = 1;
  inputs.forEach(input => input.setAttribute('data-slider-index', 'range' + index++));
  inputs.forEach(input => input.value = 50);
  inputs.forEach(input => app.updateSlider(input));
  // Cross-browser support where value changes instantly as you drag the handle, therefore two event types.
  inputs.forEach(input => input.addEventListener('input', element => app.updateSlider(input)));
  inputs.forEach(input =>{ input.addEventListener('change', function(){
    app.updateSlider(input);
    input.name = Math.ceil(input.value * 40.945)
    console.log(input.name);
    })
  })
  app.selectPreset('custom');
})();