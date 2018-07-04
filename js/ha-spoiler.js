(function($) {

	$(document).ready(function() {
		$("#spoiler_link").click(function(){
            console.log("It works");
			if ($("#spoiler_content").css("display") == "none") {
				$("#spoiler_content").show();
			}
		    else {
				$("#spoiler_content").hide();
		    }
		});
	});

})(jQuery);





