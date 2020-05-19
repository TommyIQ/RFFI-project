const startSlider = (sliderSel) => {
  new Glide(sliderSel, {
    type: 'slider',
    rewindDuration: 2000,
    autoplay: 5000,
    hoverpause: false,
    gap: 0,
    animationDuration: 1300
  })
    .mount();
}


startSlider('.glide');
