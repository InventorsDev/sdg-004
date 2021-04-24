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
				document.getElementById("get-help").disable='true';
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
				document.getElementById("get-help").disable='false';
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

		fd.append('request', 3);
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
                    		document.getElementById("report").innerHTML='<img src="images/loading.gif" width="20px" height="20px"> Processing';
                    		document.getElementById("report").disable='true';
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
                    		document.getElementById("report").disable='false';
                    	},

                    });
                }

                });

});



var Interval_message = window.setInterval(update_message, 1000);
function update_message(){
         // alert("jkj");
                // AJAX request
                $.ajax({
                	url: 'ajaxfile.php',
                	type: 'post',
                	data: {request:2},
                	success: function(response){
                		document.getElementById("unread_message").innerHTML= response;
                		document.getElementById("unread_message2").innerHTML= response;
                	},
                });
            }