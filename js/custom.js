
  $(function () {

    // MENU
    $('.nav-link').on('click',function(){
      $(".navbar-collapse").collapse('hide');
    });


    // AOS ANIMATION
    AOS.init({
      disable: 'mobile',
      duration: 800,
      anchorPlacement: 'center-bottom'
    });


    // SMOOTH SCROLL
    $(function() {
      $('.nav-link').on('click', function(event) {
        var $anchor = $(this);
          $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 0
          }, 1000);
            event.preventDefault();
      });
    });  
    
    // FEATURED SLIDE
    $('.owl-carousel').owlCarousel({
      loop: true,
      autoplayHoverPause: false,
      autoplay: true,
      margin: 30,
      responsiveClass:true,
      responsive:{
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    });


 // CHATBOT
    $("#message").keyup(function(){
          var message = $(this).val();
         if (message != '') {
          $("#reply-bot").show();
         }else{
          $("#reply-bot").hide();
        }
  });



  });


 // MODAL POP-UP
function botFunction(){
  setTimeout(function(){
  $('#chatbot').modal('show');
},10000);
}