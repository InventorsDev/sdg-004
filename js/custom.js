
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


 $("#reply-bot").click(function(){
  var msg = $("#message").val();
  
  $.ajax({
    url:'ajaxfile.php',
    type:'post',
    data:{request:4, msg:msg},
    dataType: 'json',
    beforeSend: function(){
     document.getElementById("reply-bot").innerHTML='Sending...';
     document.getElementById("reply-bot").disabled=true;
   },
   success:function(response){
    $("#message").val("");
    
    var d = new Date();
    var html = '<li class="by-other msg"><div class="chat-content"><div class="chat-meta">'+ d.toLocaleTimeString('en-US', {hour12: true }) + '<span class="pull-right">You</span></div>' + msg + '<div class="clearfix"></div></div></li>';
    $(".msg:last").after(html).show().fadeIn("slow");
    $(".modal .modal-body").animate({ scrollTop: $('.modal .modal-body').offset().top }, 'slow');
       
    if(response.status == 1){
      $(".msg:last").after(response.message).show().fadeIn("slow");
      $(".modal .modal-body").animate({ scrollTop: $('.modal .modal-body').height() + 10000}, 1000);
    }else{
      var html = '<li class="by-me msg"><div class="avatar pull-left"><img class="bot-img" src="images/avatar.jpg" alt="" /> </div><div class="chat-content"><div class="chat-meta">SpeakUp <span class="pull-right">'+ d.toLocaleTimeString('en-US', {hour12: true }) + '</span></div>I\'m sorry but I am not exactly clear how to help you<br><a href="login">LOGIN</a> to speak with a professional responder<div class="clearfix"></div> </div> </li>';
      $(".msg:last").after(html).show().fadeIn("slow");
      $(".modal .modal-body").animate({ scrollTop: $('.modal .modal-body').height() + 10000}, 1000);
    }
  },
  complete: function(data){
   document.getElementById("reply-bot").innerHTML='Send <i class="fa fa-send"></i>';
   document.getElementById("reply-bot").disabled=false;
 },
});
});


     // SIGNUP 
     $('#reporter').click(function(){
      $('#signup-as').hide();
      $('#signup-as-reporter').show().fadeIn("slow");
      document.getElementById("signup").style.paddingTop='23px';
      $('#as').html('Signing up as a <strong id="as">Reporter</strong>');
    });

     $('#responder').click(function(){
      $('#signup-as').hide();
      $('#signup-as-responder1').show().fadeIn("slow");;
      document.getElementById("signup").style.paddingTop='23px';
      $('#as').html('Signing up as a <strong id="as">Responder</strong>');
    });



     
                  // REPORTER SIGNUP
                  $("#reporter-signup").click(function(){
                    var lastname = $("#lastname").val().trim();
                    var firstname = $("#firstname").val().trim();
                    var email = $("#email").val().trim();
                    var occupation = $("#occupation").val().trim();
                    var state = $("#state").val().trim();
                    var address = $("#address").val().trim();
                    var password = $("#password").val().trim();
                    var cpassword = $("#cpassword").val().trim();
                    var number = /([0-9])/;
                    var uppercase = /([A-Z])/;
                    var lowercase = /([a-z])/;
                    var atposition = email.indexOf("@");
                    var dotposition = email.lastIndexOf(".");
                    var valEmail = '';

                    if (lastname == '') {
                      $("#lastname").addClass("is-invalid");
                    } else{
                      $("#lastname").removeClass("is-invalid");
                    }
                    if (firstname == '') {
                      $("#firstname").addClass("is-invalid");
                    } else{
                      $("#firstname").removeClass("is-invalid");
                    }

                    if (email == '') {
                      $("#email").addClass("is-invalid");
                      document.getElementById("email_alert").innerHTML='Please enter your email address';
                    }else if(atposition < 1 || dotposition < atposition+2 || dotposition+2 >= email.length) {
                      $("#email").addClass("is-invalid");
                      document.getElementById("email_alert").innerHTML='Please enter a valid email address';
                    }else{
                      var valEmail = 'true'; 
                      $("#email").removeClass("is-invalid");
                    }

                    if (occupation == '') {
                      $("#occupation").addClass("is-invalid");
                    } else{
                      $("#occupation").removeClass("is-invalid");
                    }

                    if (state == '') {
                      $("#state").addClass("is-invalid");
                    } else{
                      $("#state").removeClass("is-invalid");
                    }

                    if (address == '') {
                      $("#address").addClass("is-invalid");
                    } else{
                      $("#address").removeClass("is-invalid");
                    }

                    if (password == '') {
                      $("#password").addClass("is-invalid");
                      document.getElementById("password_alert").innerHTML='Please enter your password';
                    }else if(password.length < 8 ){
                      $("#password").addClass("is-invalid");
                      document.getElementById("password_alert").innerHTML='password must be at least 8 characters long!';
                    }else if(password.match(number) && password.match(lowercase) && password.match(uppercase) ){ 
                      $("#password").removeClass("is-invalid");
                    }else{
                      $("#password").addClass("is-invalid");
                      document.getElementById("password_alert").innerHTML='password must have at least 1 numeric, 1 lowercase and 1 uppercase character';                      
                    }

                    if (cpassword == '') {
                      $("#cpassword").addClass("is-invalid");
                      document.getElementById("cpassword_alert").innerHTML='Please confirm your password';
                    } else{
                      $("#cpassword").removeClass("is-invalid");                    
                    }

                    if (password != cpassword) {
                      $("#cpassword").addClass("is-invalid");
                      document.getElementById("cpassword_alert").innerHTML='Passwords do not match';
                    } else{
                      $("#cpassword").removeClass("is-invalid");  
                    }


                    if(lastname != "" && firstname != "" && email != "" && occupation != "" && state != "" && address != "" && password != "" && password == cpassword && valEmail != '' && password.length >= 8 && password.match(number) && password.match(lowercase) && password.match(uppercase)){
                     $.ajax({
                      url:'ajaxfile.php',
                      type:'post',
                      data:{request:1,firstname:firstname, lastname:lastname, email:email, occupation:occupation, state:state, address:address, password:password},
                      dataType: 'json',
                      beforeSend: function(){
                       document.getElementById("reporter-signup").innerHTML='<img src="images/loading.gif" width="20px" height="20px"> Processing';
                       document.getElementById("reporter-signup").disabled=true;
                     },
                     success:function(response){

                      if(response.status == 1){

                        document.getElementById("signup-form1").reset();

                        document.getElementById("alert_box").style.display="none";
                        document.getElementById("alert").innerHTML='';
                        
                        $('#success').modal('show');   
                        document.getElementById("success_text").innerHTML=response.message;

                        setTimeout(function(){
                          window.location = './app/reporter';
                        },1500); 

                      }else{
                        document.getElementById("alert_box").style.display="block";
                        document.getElementById("alert").innerHTML=response.message;
                      }
                    },
                    complete: function(data){
                      document.getElementById("reporter-signup").innerHTML='Signup <i class="fa fa-sign-in"></i>';
                      document.getElementById("reporter-signup").disabled=false;
                    },
                  });
                   }

                 });




       // RESPONDER SIGNUP PAGE 1
       $('#responder-next').click(function(){
        var lastname = $("#lastname1").val().trim();
        var firstname = $("#firstname1").val().trim();
        var email = $("#email1").val().trim();
        var phone = $("#phone").val().trim();
        var state = $("#state1").val().trim();
        var address = $("#address1").val().trim();
        var password = $("#password1").val().trim();
        var cpassword = $("#cpassword1").val().trim();
        var number = /([0-9])/;
        var uppercase = /([A-Z])/;
        var lowercase = /([a-z])/; 
        var atposition = email.indexOf("@");
        var dotposition = email.lastIndexOf(".");
        var valEmail = '';

        if (lastname == '') {
          $("#lastname1").addClass("is-invalid");
        } else{
          $("#lastname1").removeClass("is-invalid");
        }
        if (firstname == '') {
          $("#firstname1").addClass("is-invalid");
        } else{
          $("#firstname1").removeClass("is-invalid");
        }

        if (email == '') {
          $("#email1").addClass("is-invalid");
          document.getElementById("email1_alert").innerHTML='Please enter your email address';
        }else if(atposition < 1 || dotposition < atposition+2 || dotposition+2 >= email.length) {
          $("#email1").addClass("is-invalid");
          document.getElementById("email1_alert").innerHTML='Please enter a valid email address';
        }else{
          var valEmail = 'true'; 
          $("#email1").removeClass("is-invalid");
        }

        if (phone == '') {
          $("#phone").addClass("is-invalid");
          document.getElementById("phone_alert").innerHTML='Please enter your phone number';
        }else if(isNaN(phone)){
          $("#phone").addClass("is-invalid");
          document.getElementById("phone_alert").innerHTML='Please enter numeric value phone number only!';
        }else{      
          $("#phone").removeClass("is-invalid");
        }

        if (state == '') {
          $("#state1").addClass("is-invalid");
        } else{
          $("#state1").removeClass("is-invalid");
        }

        if (address == '') {
          $("#address1").addClass("is-invalid");
        } else{
          $("#address1").removeClass("is-invalid");
        }
        
        if (password == '') {
          $("#password1").addClass("is-invalid");
          document.getElementById("password1_alert").innerHTML='Please enter your password';
        }else if(password.length < 8 ){
          $("#password1").addClass("is-invalid");
          document.getElementById("password1_alert").innerHTML='password must be at least 8 characters long!';
        }else if(password.match(number) && password.match(lowercase) && password.match(uppercase) ){ 
          $("#password1").removeClass("is-invalid");
        }else{
          $("#password1").addClass("is-invalid");
          document.getElementById("password1_alert").innerHTML='password must have at least 1 numeric, 1 lowercase and 1 uppercase character';                      
        }

        if (cpassword == '') {
          $("#cpassword1").addClass("is-invalid");
          document.getElementById("cpassword1_alert").innerHTML='Please confirm your password';
        } else{
          $("#cpassword1").removeClass("is-invalid");                    }

          if (password != cpassword) {
            $("#cpassword1").addClass("is-invalid");
            document.getElementById("cpassword1_alert").innerHTML='Passwords do not match';
          } else{
            $("#cpassword1").removeClass("is-invalid");  
          }

          if(lastname != "" && firstname != "" && email != "" && phone != "" && state != "" && address != "" && password != "" && cpassword != ""  && password == cpassword && !isNaN(phone) &&  valEmail != '' && password.length >= 8 && password.match(number) && password.match(lowercase) && password.match(uppercase)){
            document.getElementById("responder-next").innerHTML='<img src="images/loading.gif" width="15px" height="15px"> Processing';
            document.getElementById("responder-pre").innerHTML='<i class="fa fa-long-arrow-left"></i> Previous';
            document.getElementById("responder-next").disabled=true;
            document.getElementById("responder-pre").disabled=false;
            setTimeout(function(){
              $('#signup-as').hide();
              $('#signup-as-responder1').hide();
              $('#signup-as-responder2').show();
              document.getElementById("responder-next").innerHTML='Next <i class="fa fa-long-arrow-right"></i>';
              document.getElementById("responder-next").disabled=false;
            },500);
          }

        });



                 //SIGNUP AS RESPONDER gO tO PAGE
                 $('#responder-pre').click(function(){
                  document.getElementById("responder-pre").innerHTML='<img src="images/loading.gif" width="15px" height="15px"> Processing';
                  document.getElementById("responder-pre").disabled=true;
                  document.getElementById("responder-next").disabled=false;
                  setTimeout(function(){
                    $('#signup-as').hide();
                    $('#signup-as-responder2').hide();
                    $('#signup-as-responder1').show();
                    document.getElementById("responder-next").innerHTML='Next <i class="fa fa-long-arrow-right"></i>';
                    document.getElementById("responder-next").disabled=false;
                  },500);
                });


                 //uPLOAD CV
                 $("#cv").on('change', function() {
                  var imgPath = $(this)[0].value;
                  var split_imgPath = imgPath.split("\\");
                  var name = split_imgPath[2];
                  document.getElementById("cv1").innerHTML=name;
                });

                 //SIGNUP AS RESPONDER PAGE 2
                 $("#responder-signup").click(function(){
                  var lastname = $("#lastname1").val().trim();
                  var firstname = $("#firstname1").val().trim();
                  var email = $("#email1").val().trim();
                  var phone = $("#phone").val().trim();
                  var state = $("#state1").val().trim();
                  var address = $("#address1").val().trim();
                  var password = $("#password1").val().trim();
                  var cpassword = $("#cpassword1").val().trim();
                  var gender = $("#gender").val().trim();
                  var dob = $("#dob").val().trim();
                  var occupation = $("#occupation1").val().trim();
                  var organization = $("#organization").val().trim();
                  var position = $("#position").val().trim();
                  var cv = $("#cv").val().trim();
                  var motive = $("#motive").val().trim();

                  if (gender == '') {
                    $("#gender").addClass("is-invalid");
                  } else{
                    $("#gender").removeClass("is-invalid");
                  }
                  if (dob == '') {
                    $("#dob").addClass("is-invalid");
                  } else{
                    $("#dob").removeClass("is-invalid");
                  }
                  if (occupation == '') {
                    $("#occupation1").addClass("is-invalid");
                  } else{
                    $("#occupation1").removeClass("is-invalid");
                  }
                  if (organization == '') {
                    $("#organization").addClass("is-invalid");
                  } else{
                    $("#organization").removeClass("is-invalid");
                  }
                  if (position == '') {
                    $("#position").addClass("is-invalid");
                  } else{
                    $("#position").removeClass("is-invalid");
                  }
                  if (cv == '') {
                    $("#cv").addClass("is-invalid");
                  } else{
                    $("#cv").removeClass("is-invalid");
                  }
                  if (motive == '') {
                    $("#motive").addClass("is-invalid");
                  } else{
                    $("#motive").removeClass("is-invalid");
                  }


                  if(gender != "" && dob != "" && occupation != "" && organization != "" && position != "" && cv != "" && motive != "" ){
                    
                   var fd = new FormData();
                   var cv = $('#cv')[0].files[0];
                   
                //alert(file);
                
                fd.append('request', 2);
                fd.append('firstname',firstname);
                fd.append('lastname',lastname);
                fd.append('email',email);
                fd.append('phone',phone);
                fd.append('password',password);
                fd.append('gender',gender);
                fd.append('dob',dob);
                fd.append('state',state);
                fd.append('address',address);
                fd.append('occupation',occupation);
                fd.append('organization',organization);
                fd.append('position',position);
                fd.append('cv',cv);
                fd.append('motive',motive);

                    // AJAX request
                    $.ajax({
                      url: 'ajaxfile.php',
                      type: 'post',
                      data:fd,
                      contentType: false,
                      processData: false,
                      dataType: 'json',
                      beforeSend: function(){
                       document.getElementById("responder-signup").innerHTML='<img src="images/loading.gif" width="20px" height="20px"> Processing';
                       document.getElementById("responder-signup").disabled=true;
                     },
                     success:function(response){
                      if(response.status == 1){

                        document.getElementById("signup-form2").reset();
                        document.getElementById("signup-form3").reset();
                        $('#signup-as').show();
                        $('#signup-as-responder2').hide();
                        $('#signup-as-responder1').hide();
                        document.getElementById("alert1_box").style.display="none";
                        document.getElementById("alert1").innerHTML='';
                        
                        $('#success1').modal('show');   
                        document.getElementById("success_text").innerHTML=response.message;

                      }else{
                        document.getElementById("alert1_box").style.display="block";
                        document.getElementById("alert1").innerHTML=response.message;
                      }
                    },
                    complete: function(data){
                      document.getElementById("responder-signup").innerHTML='Signup <i class="fa fa-sign-in"></i>';
                      document.getElementById("responder-signup").disabled=false;
                    },
                  });
                  }

                });







     // PASSWORD SHOW/HIDE
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


     // LOGIN 
     $("#login").click(function(){
      var email = $("#email").val().trim();
      var password = $("#password").val().trim();
      var atposition = email.indexOf("@");
      var dotposition = email.lastIndexOf(".");
      var valEmail = '';

      if (email == '') {
        $("#email").addClass("is-invalid");
        document.getElementById("email_alert").innerHTML='Please enter your email address';
      }else if(atposition < 1 || dotposition < atposition+2 || dotposition+2 >= email.length) {
        $("#email").addClass("is-invalid");
        document.getElementById("email_alert").innerHTML='Please enter a valid email address';
      }else{
        var valEmail = 'true'; 
        $("#email").removeClass("is-invalid");
      }

      if (password == '') {
        $("#password").addClass("is-invalid");
        document.getElementById("show-hide").style.border='1px solid red';
        document.getElementById("show-hide").style.borderLeft='none';
        document.getElementById("password_alert").innerHTML='Please enter your password';
      }else{
        $("#password").removeClass("is-invalid");
        document.getElementById("password").style.borderRight='';
        document.getElementById("show-hide").style.border='';
        document.getElementById("show-hide").style.borderLeft='';
        document.getElementById("password_alert").innerHTML='';

      }

      if( email != "" && password != "" &&  valEmail != ''){
       $.ajax({
        url:'ajaxfile.php',
        type:'post',
        data:{request:3,email:email,password:password},
        dataType: 'json',
        beforeSend: function(){
         document.getElementById("login").innerHTML='<img src="images/loading.gif" width="20px" height="20px"> Processing';
         document.getElementById("login").disabled=true;
       },
       success:function(response){
        if(response.status == 1){
          document.getElementById("alert_box").style.display="none";
          document.getElementById("alert").innerHTML="";

          setTimeout(function(){
            window.location = "./app/"+response.user_type;
          },1000);
        }else{
          document.getElementById("alert_box").style.display="block";
          document.getElementById("alert").innerHTML=response.message;

          document.getElementById("login").innerHTML='Login';
          document.getElementById("login").disabled=false;
        }
      },
    });
     }

   });




   });


 // MODAL POP-UP
 window.onload = function(){
  setTimeout(function(){
    $('#chatbot').modal('show');
  },10000);
}

//CLOSE ALERT BOX
function close_alert(id){
  $("#"+id).hide();
}
