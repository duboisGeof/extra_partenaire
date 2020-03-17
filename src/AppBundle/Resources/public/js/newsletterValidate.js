$(document).ready(function() {
	// Validation du formulaire
 	$('#formNewsletter').validate({
		onkeyup: false,
		onfocusout: false,
		onsubmit: true,
		rules: {
		  titre: {
			required: true,
			minlength: 10
		  }
		},
		messages: {
		  titre: {
			minlength : "Merci de saisir un titre plus long"
		  },      
		},
	});
});