(function($) {

	$(document).ready(function() {
		$("#header_icon").click(function(){
			if ($("#spoiler_content").css("display") == "none") {
				$("#spoiler_content").show();
			}
		    else {
				$("#spoiler_content").hide();
		    }
		});
	});

})(jQuery);





