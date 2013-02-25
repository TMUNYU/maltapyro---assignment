$(document).ready(function(e) {
	$('.lightbox').hide();

	$('#_add').click(function() {
		sessionStorage.invoke_for = "add";
		openLightBox();
	});	
	
	$('#_edit').click(function() {
		sessionStorage.invoke_for = "edit";
		openLightBox();
	});

	$('#cancle').click(function() {
		closeLightBox();
	});

	$('#lightbox_back').click(function() {
		closeLightBox();
	});

	$('#save').click(function() {
		addPointToMap("add");
	});


});
