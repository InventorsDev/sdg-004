
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


    
     // LOGIN 
         $('#show-hide').click(function(){
        var password_field = document.getElementById("password");

        if(password_field.type === "password"){
          password_field.type = "text";
          document.getElementById("show-hide").innerHTML='<i class="fa fa-eye-slash"></i>';
        }else{
          password_field.type = "password";
           document.getElementById("show-hide").innerHTML='<i class="fa fa-eye"></i>';
        }
      });


         $("#login").click(function(){
                    var email = $("#email").val().trim();
                    var password = $("#password").val().trim();

                    if (email == '') {
                      document.getElementById("email").style.border='1px solid red';
                    } else{
                       document.getElementById("email").style.border='';
                    }

                    if (password == '') {
                       document.getElementById("password").style.border='1px solid red';
                       document.getElementById("password").style.borderRight='none';
                       document.getElementById("show-hide").style.border='1px solid red';
                       document.getElementById("show-hide").style.borderLeft='none';
                    }else{
                       document.getElementById("password").style.border='';
                       document.getElementById("password").style.borderRight='';
                       document.getElementById("show-hide").style.border='';
                       document.getElementById("show-hide").style.borderLeft='';


                    }

                    if( email != "" && password != "" ){
                         $.ajax({
                            url:'ajaxfile.php',
                            type:'post',
                            data:{request:1,email:email,password:password},
                            dataType: 'json',
                            beforeSend: function(){
                           document.getElementById("login").innerHTML='<img src="images/loading.gif" width="20px" height="20px"> Processing';
                        },
                            success:function(response){
                                if(response.status == 1){
                                    window.location = "./app";
                                }else{
                                  document.getElementById("alert_box").style.display="block";
                                  document.getElementById("alert").style.display=response.message;
                                }
                             },
                         complete: function(data){
                          document.getElementById("login").innerHTML='Login';
                        },
                        });
                    }

                  });




  });


 // MODAL POP-UP
function botFunction(){
  setTimeout(function(){
  $('#chatbot').modal('show');
},10000);
}