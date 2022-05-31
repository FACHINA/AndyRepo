// Add slideDown animation to Bootstrap dropdown when expanding.

// Add slideDown animation to Bootstrap dropdown when expanding.


/*
  // makes sure the whole site is loaded
  $('body').append('  <div id="preloader"><div id="status"></div></div>');
$(window).on('load', function(){
  setTimeout(removeLoader, 100); //wait for page load PLUS two seconds.
});
function removeLoader(){
    $( "#preloader" ).fadeOut(500, function() {
      // fadeOut complete. Remove the loading div
      $( "#preloader" ).remove(); //makes page more lightweight 
  });  
}*/

$('.dropdown').on('show.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).fadeIn(300);
});

$('.dropdown').on('hide.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).fadeOut(200);
});
$('.dropdown').on('show.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).fadeIn(300);
});

$('.dropdown').on('hide.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).fadeOut(200);
});
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


//card slider event
$(document).ready(function () {
  $('.infos').slick({
    infinite: true,
    speed: 600,
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true,
    prevArrow: '<a class="btn position-absolute start-0 top-50 translate-middle" style="z-index:1000;"><i class="fa-solid fa-chevron-left fa-2xl text-dark"></i></a>',
    nextArrow: '<a class="btn position-absolute start-100 top-50 translate-middle"><i class="fa-solid fa-chevron-right fa-2xl text-dark"></i></a>',
    
  });
});



/* global bootstrap: false */
(function () {
  'use strict'
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(function (tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()

/*Offcanvas script*/
(function () {
  'use strict'

  document.querySelector('#navbarSideCollapse').addEventListener('click', function () {
    document.querySelector('.offcanvas-collapse').classList.toggle('open')
  })
})






/*other script*/

/* 
$(document).ready(function(){
  $("#offcanvas-btn").click(function(){
      if ($("#offcanvas-btn").hasClass('fas fa-bars')==true) 
        {
           $("#offcanvas-btn").removeClass("fas fa-bars");
           $("#offcanvas-btn").addClass("fas fa-rectangle-xmark");
          
        }
 else if($("#offcanvas-btn").hasClass('fas fa-rectangle-xmark')==true)
        {
           $("#offcanvas-btn").removeClass("fas fa-rectangle-xmark");
           $("#offcanvas-btn").addClass("fas fa-bars");
        }
  }                      
  )


  
});
 
     $(document).ready(function(){
  $("#btndrop").click(function(){
      $("#dropping").addClass("swing-in-top-bck");
      
     
  })
});


 
     $("#btndrop").click(function () {
    if ($("#dropping").hasClass('swing-in-top-fwd')==true) 
        {
           $("#dropping").addClass("swing-out-top-bck");
           $("#dropping").removeClass("swing-in-top-fwd");
        }
    else 
        $("#dropping").addClass("swing-in-top-fwd")
})



  jQuery(function($) {
$('.dropdown').hover(function() {
$(this).find('.dropdown-menu').first().stop(true, true).delay(40).fadeIn();
}, function() {
$(this).find('.dropdown-menu').first().stop(true, true).delay(40).fadeOut();
});});



$(document).ready(function () {
      $("#btndrvnop").click(function () {
          var $this = $("#drochpping");
          //see where we are currently at
          if ($this.hasClass("swing-out-top-bck")) {
            //then we are on a third click 
            $this.addClass("swing-in-top-fwd");
            $this.removeClass("swing-out-top-bck");
          } else if ($this.hasClass("swing-in-top-fwd")) {
            //we are on second click so add class
            $this.addClass("swing-out-top-bck d-block");
            $this.removeClass("swing-in-top-fwd");
          } else //we are on initital click
          {
            $this.addClass("swing-in-top-fwd");
          }
          
        }
        
)})



*/


