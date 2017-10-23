// caroussel
$(document).ready(function slider__pictureNumber() {
  var $elem = $('.carousel-inner');
  var $slider = $elem.closest(".carousel");
  var counter = $("div", $elem).length;
  var carouselIndicators = $slider.find('.carousel-indicators');
  var carouselControlPrev = $slider.find('.carousel-control-prev');
  var carouselControlNext = $slider.find('.carousel-control-next');


  if (counter < 2) {
    carouselIndicators.hide();
    carouselControlPrev.hide();
    carouselControlNext.hide();
  }
});
