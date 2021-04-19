
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


       // RESPONDER SIGNUP 
      $('#responder-next').click(function(){
                    var lastname = $("#lastname1").val().trim();
                    var firstname = $("#firstname1").val().trim();
                    var email = $("#email1").val().trim();
                    var phone = $("#phone").val().trim();
                    var password = $("#password1").val().trim();
                    var cpassword = $("#cpassword1").val().trim();
                    var number = /([0-9])/;
                     var uppercase = /([A-Z])/;
                     var lowercase = /([a-z])/; 
                     var atposition = email.indexOf("@");
                    var dotposition = email.lastIndexOf(".");
                    var valEmail = '';

                     if (lastname == '') {
                      document.getElementById("lastname1").style.border='1px solid red';
                      document.getElementById("lastname1_alert").innerHTML='Please enter your lastname';
                    } else{
                       document.getElementById("lastname1").style.border='';
                      document.getElementById("lastname1_alert").innerHTML='';
                    }
                     if (firstname == '') {
                      document.getElementById("firstname1").style.border='1px solid red';
                      document.getElementById("firstname1_alert").innerHTML='Please enter your firstname';
                    } else{
                       document.getElementById("firstname1").style.border='';
                      document.getElementById("firstname1_alert").innerHTML='';
                    }
                   
                    if (email == '') {
                      document.getElementById("email1").style.border='1px solid red';
                      document.getElementById("email1_alert").innerHTML='Please enter your email address';
                    }else if(atposition < 1 || dotposition < atposition+2 || dotposition+2 >= email.length) {
                      document.getElementById("email1").style.border='1px solid red';
                      document.getElementById("email1_alert").innerHTML='Please enter a valid email address';
                    }else{
                      var valEmail = 'true'; 
                      document.getElementById("email1").style.border='';
                      document.getElementById("email1_alert").innerHTML='';
                    }

                     if (phone == '') {
                      document.getElementById("phone").style.border='1px solid red';
                      document.getElementById("phone_alert").innerHTML='Please enter your phone number';
                   }else if(isNaN(phone)){
                      document.getElementById("phone").style.border='1px solid red';
                      document.getElementById("phone_alert").innerHTML='Please enter numeric value phone number only!';
                    }else{      
                       document.getElementById("phone").style.border='';
                      document.getElementById("phone_alert").innerHTML='';
                    }
                     
                     if (password == '') {
                      document.getElementById("password1").style.border='1px solid red';
                      document.getElementById("password1_alert").innerHTML='Please enter your password';
                    }else if(password.length < 8 ){
                      document.getElementById("password1").style.border='1px solid red';
                      document.getElementById("password1_alert").innerHTML='password must be at least 8 characters long!';
                    }else if(password.match(number) && password.match(lowercase) && password.match(uppercase) ){ 
                       document.getElementById("password1").style.border='';
                      document.getElementById("password1_alert").innerHTML='';
                    }else{
                      document.getElementById("password1").style.border='1px solid red';
                      document.getElementById("password1_alert").innerHTML='password must have at least 1 numeric, 1 lowercase and 1 uppercase character';                      
                    }

                     if (cpassword == '') {
                      document.getElementById("cpassword1").style.border='1px solid red';
                      document.getElementById("cpassword1_alert").innerHTML='Please confirm your password';
                    } else if (password != cpassword) {
                      document.getElementById("cpassword1").style.border='1px solid red';
                      document.getElementById("cpassword1_alert").innerHTML='Passwords do not match';
                    } else{
                       document.getElementById("cpassword1").style.border='';
                      document.getElementById("cpassword1_alert").innerHTML='';
                    }

                  if(lastname != "" && firstname != "" && email != "" && phone != "" && password != "" && cpassword != ""  && password == cpassword && !isNaN(phone) &&  valEmail != '' && password.length >= 8 && password.match(number) && password.match(lowercase) && password.match(uppercase)){
                    document.getElementById("responder-next").innerHTML='<img src="images/loading.gif" width="15px" height="15px"> Processing';
                    document.getElementById("responder-pre").innerHTML='<i class="fa fa-long-arrow-left"></i> Previous';
                    document.getElementById("responder-next").disable='true';
                    document.getElementById("responder-pre").disable='false';
                     setTimeout(function(){
                    $('#signup-as').hide();
                    $('#signup-as-responder1').hide();
                    $('#signup-as-responder2').show();
                    document.getElementById("responder-next").innerHTML='Next <i class="fa fa-long-arrow-right"></i>';
                    document.getElementById("responder-next").disable='false';
                   },500);
                   }

                });

  

                  $('#responder-pre').click(function(){
                    document.getElementById("responder-pre").innerHTML='<img src="images/loading.gif" width="15px" height="15px"> Processing';
                    document.getElementById("responder-pre").disable='true';
                    document.getElementById("responder-next").disable='false';
                     setTimeout(function(){
                    $('#signup-as').hide();
                    $('#signup-as-responder2').hide();
                    $('#signup-as-responder1').show();
                    document.getElementById("responder-next").innerHTML='Next <i class="fa fa-long-arrow-right"></i>';
                    document.getElementById("responder-next").disable='false';
                   },500);
                    });

 
                      $("#responder-signup").click(function(){
                    var lastname = $("#lastname1").val().trim();
                    var firstname = $("#firstname1").val().trim();
                    var email = $("#email1").val().trim();
                    var phone = $("#phone").val().trim();
                    var password = $("#password1").val().trim();
                    var cpassword = $("#cpassword1").val().trim();
                    var gender = $("#gender").val().trim();
                    var dob = $("#dob").val().trim();
                    var state = $("#state").val().trim();
                    var address = $("#address").val().trim();
                    var occupation = $("#occupation1").val().trim();
                    var organization = $("#organization").val().trim();
                    var position = $("#position").val().trim();
                    var cv = $("#cv").val().trim();
                    var motive = $("#motive").val().trim();

                     if (gender == '') {
                      document.getElementById("gender").style.border='1px solid red';
                      document.getElementById("gender_alert").innerHTML='Please select your gender';
                    } else{
                       document.getElementById("gender").style.border='';
                      document.getElementById("gender_alert").innerHTML='';
                    }
                     if (dob == '') {
                      document.getElementById("dob").style.border='1px solid red';
                      document.getElementById("dob_alert").innerHTML='Please select your date of birth';
                    } else{
                       document.getElementById("dob").style.border='';
                      document.getElementById("dob_alert").innerHTML='';
                    }
                     if (address == '') {
                      document.getElementById("address").style.border='1px solid red';
                      document.getElementById("address_alert").innerHTML='Please enter your address';
                    } else{
                       document.getElementById("address").style.border='';
                      document.getElementById("address_alert").innerHTML='';
                    }
                     if (state == '') {
                      document.getElementById("state").style.border='1px solid red';
                      document.getElementById("state_alert").innerHTML='Please enter your state of residence';
                    } else{
                       document.getElementById("state").style.border='';
                      document.getElementById("state_alert").innerHTML='';
                    }
                    if (occupation == '') {
                      document.getElementById("occupation1").style.border='1px solid red';
                      document.getElementById("occupation1_alert").innerHTML='Please enter your occupation';
                    } else{
                       document.getElementById("occupation1").style.border='';
                      document.getElementById("occupation1_alert").innerHTML='';
                    }
                     if (organization == '') {
                      document.getElementById("organization").style.border='1px solid red';
                      document.getElementById("organization_alert").innerHTML='Please enter your organization';
                    } else{
                       document.getElementById("organization").style.border='';
                      document.getElementById("organization_alert").innerHTML='';
                    }
                     if (organization == '') {
                      document.getElementById("position").style.border='1px solid red';
                      document.getElementById("position_alert").innerHTML='Please enter your position in your organization';
                    } else{
                       document.getElementById("position").style.border='';
                      document.getElementById("position_alert").innerHTML='';
                    }
                     if (cv == '') {
                      document.getElementById("cv1").style.border='1px solid red';
                      document.getElementById("cv_alert").innerHTML='Please upload your curriculum vitae';
                    } else{
                       document.getElementById("cv").style.border='';
                      document.getElementById("cv_alert").innerHTML='';
                    }
                     if (motive == '') {
                      document.getElementById("motive").style.border='1px solid red';
                      document.getElementById("motive_alert").innerHTML='Please enter your motive';
                    } else{
                       document.getElementById("motive").style.border='';
                      document.getElementById("motive_alert").innerHTML='';
                    }


                    if(gender != "" && dob != "" && state != "" && address != "" && occupation != "" && organization != "" && position != "" && cv != "" && motive != "" ){
                    
                     var fd = new FormData();
                     var cv = $('#cv')[0].files[0];
    
                //alert(file);
    
                fd.append('request', 3);
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
                           document.getElementById("reporter-signup").innerHTML='<img src="images/loading.gif" width="20px" height="20px"> Processing';
                          document.getElementById("reporter-signup").disable='true';
                        },
                            success:function(response){
                              alert(response.status);
                                if(response.status == 1){
                                }else{
                                  document.getElementById("alert_box").style.display="block";
                                  document.getElementById("alert").style.display=response.message;
                                }
                             },
                         complete: function(data){
                          document.getElementById("reporter-signup").innerHTML='Signup <i class="fa fa-sign-in"></i>';
                    document.getElementById("reporter-signup").disable='false';
                        },
                        });
                    }

                  });


                  

                       
                  // REPORTER SIGNUP
                     $("#reporter-signup").click(function(){
                    var lastname = $("#lastname").val().trim();
                    var firstname = $("#firstname").val().trim();
                    var email = $("#email").val().trim();
                    var occupation = $("#occupation").val().trim();
                    var password = $("#password").val().trim();
                    var cpassword = $("#cpassword").val().trim();
                    var number = /([0-9])/;
                     var uppercase = /([A-Z])/;
                     var lowercase = /([a-z])/;
                     var atposition = email.indexOf("@");
                    var dotposition = email.lastIndexOf(".");
                    var valEmail = '';

                     if (lastname == '') {
                      document.getElementById("lastname").style.border='1px solid red';
                      document.getElementById("lastname_alert").innerHTML='Please enter your lastname';
                    } else{
                       document.getElementById("lastname").style.border='';
                      document.getElementById("lastname_alert").innerHTML='';
                    }
                     if (firstname == '') {
                      document.getElementById("firstname").style.border='1px solid red';
                      document.getElementById("firstname_alert").innerHTML='Please enter your firstname';
                    } else{
                       document.getElementById("firstname").style.border='';
                      document.getElementById("firstname_alert").innerHTML='';
                    }

                    if (email == '') {
                      document.getElementById("email").style.border='1px solid red';
                      document.getElementById("email_alert").innerHTML='Please enter your email address';
                    }else if(atposition < 1 || dotposition < atposition+2 || dotposition+2 >= email.length) {
                      document.getElementById("email").style.border='1px solid red';
                      document.getElementById("email_alert").innerHTML='Please enter a valid email address';
                    }else{
                      var valEmail = 'true'; 
                      document.getElementById("email").style.border='';
                      document.getElementById("email_alert").innerHTML='';
                    }

                     if (occupation == '') {
                      document.getElementById("occupation").style.border='1px solid red';
                      document.getElementById("occupation_alert").innerHTML='Please select your occupation';
                    } else{
                       document.getElementById("occupation").style.border='';
                      document.getElementById("occupation_alert").innerHTML='';
                    }

                     if (password == '') {
                      document.getElementById("password").style.border='1px solid red';
                      document.getElementById("password_alert").innerHTML='Please enter your password';
                    }else if(password.length < 8 ){
                      document.getElementById("password").style.border='1px solid red';
                      document.getElementById("password_alert").innerHTML='password must be at least 8 characters long!';
                    }else if(password.match(number) && password.match(lowercase) && password.match(uppercase) ){ 
                       document.getElementById("password").style.border='';
                      document.getElementById("password_alert").innerHTML='';
                    }else{
                      document.getElementById("password").style.border='1px solid red';
                      document.getElementById("password_alert").innerHTML='password must have at least 1 numeric, 1 lowercase and 1 uppercase character';                      
                    }

                     if (cpassword == '') {
                      document.getElementById("cpassword").style.border='1px solid red';
                      document.getElementById("cpassword_alert").innerHTML='Please confirm your password';
                    } else{
                       document.getElementById("cpassword").style.border='';
                      document.getElementById("cpassword_alert").innerHTML='';
                    }

                     if (password != cpassword) {
                      document.getElementById("cpassword").style.border='1px solid red';
                      document.getElementById("cpassword_alert").innerHTML='Passwords do not match';
                    } else{
                       document.getElementById("cpassword").style.border='';
                      document.getElementById("cpassword_alert").innerHTML='';
                    }

                      if(lastname != "" && firstname != "" && email != "" && occupation != "" && password != "" && password == cpassword && valEmail != '' && password.length >= 8 && password.match(number) && password.match(lowercase) && password.match(uppercase)){
                         $.ajax({
                            url:'ajaxfile.php',
                            type:'post',
                            data:{request:2,firstname:firstname, lastname:lastname, email:email, occupation:occupation, password:password},
                            dataType: 'json',
                            beforeSend: function(){
                           document.getElementById("reporter-signup").innerHTML='<img src="images/loading.gif" width="20px" height="20px"> Processing';
                          document.getElementById("reporter-signup").disable='true';
                        },
                            success:function(response){

                                if(response.status == 1){

                            document.getElementById("signup-form2").reset();
                            document.getElementById("signup-form3").reset();
                                
                            $('#success').modal('show');   
                           document.getElementById("success_text").innerHTML=response.message;

                             setTimeout(function(){
                                   location.replace('./app/reporter');
                            },1500); 

                                }else{
                                  document.getElementById("alert_box").style.display="block";
                                  document.getElementById("alert").style.display=response.message;
                                }
                             },
                         complete: function(data){
                          document.getElementById("reporter-signup").innerHTML='Signup <i class="fa fa-sign-in"></i>';
                    document.getElementById("reporter-signup").disable='false';
                        },
                        });
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
                          document.getElementById("login").disable='true';
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
                    document.getElementById("login").disable='false';
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