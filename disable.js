$(function() {
	
	$("#disable").change(function(){
		if($(this).attr('id') == 'disable') {

			$("#option input [value='ext']").attr("disabled", "disabled");
			$("#option input [value='int']").attr("selected", "selected");
		}
		else {
			$("#option input [value='int']").attr("disabled", "disabled");
			$("#option input [value='ext']").attr("selected", "selected");
		}

	})
})