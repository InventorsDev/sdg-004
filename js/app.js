$(document).ready(function(){

	$('#get-help').click(function(){
		var help = $("#help").val();

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
                     $('#success').modal('show');
                     alert(response.status);
				}else{
					// $('fail').modal('show');
				}
			},
			complete: function(data){
				document.getElementById("get-help").innerHTML='Get Help';
				document.getElementById("get-help").disable='false';
			},
		});
	});



	$("#make-new").click(function(){
		$(".new-report").show();
		$(".track-report").hide();
	});


	$("#close-new").click(function(){
		$(".new-report").hide();
		$(".track-report").show();
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