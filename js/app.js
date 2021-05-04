$(document).ready(function(){

	$('#get-help').click(function(){
		var help = $("#help").val();

		if (help == "") {
      $("#help").addClass("is-invalid");
    }else{
      $("#help").removeClass("is-invalid");
    }

    if(help != ""){
      $.ajax({
       url:'ajaxfile.php',
       type:'post',
       data:{request:1, help:help},
       dataType: 'json',
       beforeSend: function(){
        document.getElementById("get-help").innerHTML='Sending...';
        document.getElementById("get-help").disabled=true;
      },
      success:function(response){
        if(response.status == 1){
         $("#help").val("");
         $('#success').modal('show');
       }else{
					// $('fail').modal('show');
				}
			},
			complete: function(data){
				document.getElementById("get-help").innerHTML='Get Help';
				document.getElementById("get-help").disabled=false;
			},
		});
    }
  });


//PROFILE
$("#edit-profile").click(function(){
  $(this).hide();
  $("#update-profile").show();
  var x = document.getElementsByClassName("editable");
  $(this).addClass("update-profile");

  var i;
  for (var i = 0; i < x.length; i++) {

    x[i].disabled = false;
  }
});


//UPDATE USER PROFILE
$("#update-profile").click(function(){
  $(this).hide();
  $("#edit-profile").show();
  var x = document.getElementsByClassName("editable");
  $(this).removeClass("update-profile");

  var i;
  for (var i = 0; i < x.length; i++) {

    x[i].disabled = true;
  }
});


     //HELP DISCUSS
     $("#reply-message").click(function(){
      var msg = $("#help-message").val();

      if (msg != "") {
       $.ajax({
        url:'ajaxfile.php',
        type:'post',
        data:{request:7, msg:msg},
        dataType: 'json',
        beforeSend: function(){
         document.getElementById("reply-message").innerHTML='Sending...';
         document.getElementById("reply-message").disabled=true;
       },
       success:function(response){
        if(response.status == 1){
          $("#help-message").val("");
          $(".help-row:last").after(response.message).show().fadeIn("slow");
          $(".card .card-body").animate({ scrollTop: $('.card .card-body').height() + 50000}, 1000);
        }
      },
      complete: function(data){
       document.getElementById("reply-message").innerHTML='Send <i class="fa fa-send"></i>';
       document.getElementById("reply-message").disabled=false;
     },
   });
     }
   });

	//TOGGLE REPORT BOX
	$("#make-new").click(function(){
		$(".new-report").show();
		$(".track-report").hide();
	});


	$("#close-new").click(function(){
		$(".new-report").hide();
		$(".track-report").show();
	});

	//TOGGLE ANONYMOUS CHECKBOX
	$("#anonymous").click(function(){
		var checked = $(this).val();
		if (checked == 'no') {
			$(this).val('yes');	
		}else{			
			$(this).val('no');	
		}
	});

		//Get File name
   $("#files").on('change', function() {
    var files = [];
    for (var i = 0; i < $(this)[0].files.length; i++) {
     files.push($(this)[0].files[i].name)
   }
   $(this).next('.custom-file-label').html(files.join(', '));
 });

	//SUBMIT REPORT
	$("#report").click(function(){
		var title = $("#report-title").val();
		var description = $("#description").val();
		var totalfiles = document.getElementById('files').files.length;
		var anonymous = $("#anonymous").val();

		if (title == "") {
      $("#report-title").addClass("is-invalid");
    }else{
      $("#report-title").removeClass("is-invalid");
    }
    if (description == "") {
      $("#description").addClass("is-invalid");
    }else{
      $("#description").removeClass("is-invalid");
    }

    if(title != "" && description != ""){

      var fd = new FormData();
      var file_status = 0;
      if (totalfiles > 0) {
       var file_status = 1;
       for (var index = 0; index < totalfiles; index++) {
        fd.append("files[]", document.getElementById('files').files[index]);
      }}

      fd.append('request', 6);
      fd.append('title',title);
      fd.append('description',description);
      fd.append('anonymous',anonymous);
      fd.append('file_status',file_status);

                    // AJAX request
                    $.ajax({
                    	url: 'ajaxfile.php',
                    	type: 'post',
                    	data:fd,
                    	contentType: false,
                    	processData: false,
                    	dataType: 'json',
                    	beforeSend: function(){
                    		document.getElementById("report").innerHTML='<img src=".../images/loading.gif" width="20px" height="20px"> Processing';
                    		document.getElementById("report").disabled=true;
                    	},
                    	success:function(response){
                    		if(response.status == 1){
                          $('#success').modal('show');
                          document.getElementById("report-form").reset();
                          $(".new-report").hide();
                          $(".track-report").show();
                          $(".report:last").after(response.message).show().fadeIn("slow");
                          $(".no-report").hide();

                        }else{                    			
                          $('#fail').modal('show');
                          document.getElementById("fail_text").innerHTML=response.message;
                        }

                      },
                      complete: function(data){
                        document.getElementById("report").innerHTML='Submit report';
                        document.getElementById("report").disabled=false;
                      },

                    });
                  }

                });

});

//SCROLL MESSAGE BOX
function scroll_message(){
  $(".card .card-body").animate({ scrollTop: $('.card .card-body').height() + 50000}, 1000);
}

//AUTO REFRESH MESSAGE
var Interval_message = window.setInterval(update_message, 1000);
function update_message(){

                // AJAX request
                $.ajax({
                	url: 'ajaxfile.php',
                	type: 'post',
                	data: {request:2},
                	success: function(response){
                		document.getElementById("unread_message").innerHTML= response;
                	},
                });
              }

              var Interval_message_box = window.setInterval(update_message_box, 1000);
              function update_message_box(){

                // AJAX request
                $.ajax({
                	url: 'ajaxfile.php',
                	type: 'post',
                	data: {request:3},
                	success: function(response){
                		document.getElementById("message-row").innerHTML= response;
                	},
                });
              }


//AUTO REFRESH NOTIFICATION
var Interval_notification = window.setInterval(update_notification, 1000);
function update_notification(){

                // AJAX request
                $.ajax({
                	url: 'ajaxfile.php',
                	type: 'post',
                	data: {request:4},
                	success: function(response){
                		document.getElementById("unread_notification").innerHTML= response;
                	},
                });
              }

              var Interval_notification_box = window.setInterval(update_notification_box, 1000);
              function update_notification_box(){

                // AJAX request
                $.ajax({
                	url: 'ajaxfile.php',
                	type: 'post',
                	data: {request:5},
                	success: function(response){
                		document.getElementById("notification-row").innerHTML= response;
                	},
                });
              }


            //AUTO REFRESH CAHATS
            var Interval_chat = window.setInterval(update_chat, 1500);
            function update_chat(){

                // AJAX request
                $.ajax({
                  url: 'ajaxfile.php',
                  type: 'post',
                  data: {request:8},
                  success: function(response){
                    document.getElementById("chats").innerHTML = response;
                  },
                });
              }

            //REPORT STATISTIC CHART
            function showGraph(){
              {

                var d = new Date();

                $.post("data.php",
                  function (data)
                  {
                    console.log(data);
                    var months = [];
                    var reports = [];

                    for (var i in data) {
                      months.push(data[i].months);
                      reports.push(data[i].reports);
                    }

                    var chartdata = {
                      labels: months,
                      datasets: [
                      {
                        label: d.getFullYear() + ' Submitted Report Statistics',
                        backgroundColor: '#49e2ff',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: reports
                      }
                      ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                      type: 'line',
                      data: chartdata
                    });
                  });
              }
            }

