$(document).ready(function() {
	$(".modalbox").fancybox();

	$("#send").on("click", function(){
		var nameval  = $("#name").val();
		var telval    = $("#tel").val();
		var tellen    = telval.length;
		var namevalid = validateName(nameval);

		if(mailvalid == false) {
			$("#name").addClass("error");
		}
		else if(mailvalid == true){
			$("#name").removeClass("error");
		}

		if(msglen < 4) {
			$("#tel").addClass("error");
		}
		else if(msglen >= 4){
			$("#tel").removeClass("error");
		}

		if(mailvalid == true && msglen >= 4) {

			$("#send").replaceWith("<em>sending...</em>");

			$.ajax({
				type: 'POST',
				url: 'footer.php',
				data: $("#contact").serialize(),
				success: function(data) {
					if(data == "true") {
						$("#contact").fadeOut("fast", function(){
							$(this).before("<p><strong>Success! Your feedback has been sent, thanks :)</strong></p>");
							setTimeout("$.fancybox.close()", 1000);
						});
					}
				}
			});
		}
	});
});