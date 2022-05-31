
//card slider event
$(document).ready(function () {
  $('.custumer-slide').slick({
    dots: false,
    infinite: true,
    speed: 600,
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true,
    arrows:false,    
  });
});
//card slider event
$(document).ready(function () {
  $('.items').slick({
    dots: false,
    infinite: true,
    speed: 600,
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true,
    prevArrow: '<a class="btn position-absolute start-0 top-50 translate-middle" style="z-index:1000;"><i class="fa-solid fa-chevron-left "></i></a>',
    nextArrow: '<a class="btn position-absolute end-0 start-100 top-50 translate-middle"><i class="fa-solid fa-chevron-right "></i></a>',
    
  });
});

//card slider event
$(document).ready(function () {
  $('.infos').slick({
    infinite: true,
    speed: 600,
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true,
    prevArrow: '<a class="btn position-absolute start-0 top-50 translate-middle" style="z-index:1000;"><i class="fa-solid fa-chevron-circle-left fa-2xl text-dark"></i></a>',
    nextArrow: '<a class="btn position-absolute start-100 top-50 translate-middle"><i class="fa-solid fa-chevron-circle-right fa-2xl text-dark"></i></a>',
    
  });
});