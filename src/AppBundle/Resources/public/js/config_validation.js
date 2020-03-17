$(document).ready(function() {
		// Configuration du validator qui rajoute des classes pour avoir un style bootstrap sur les erreurs
		$.validator.setDefaults({
		highlight: function(element) {
			if($(element).closest('.form-group'))
			{
				$(element).closest('.form-group').addClass('has-error'); //S'il y a une erreur la saisie est en rouge
			}
			if($(element).closest('td'))
			{
				$(element).closest('td').addClass('has-error'); //S'il y a une erreur la saisie est en rouge
			}
			if($(element).closest('div'))
			{
				$(element).closest('div').addClass('has-error');
			}
		},
		unhighlight: function(element) {
			if($(element).closest('.form-group'))
			{
				$(element).closest('.form-group').removeClass('has-error');
			} 
			if($(element).closest('td')){
				$(element).closest('td').removeClass('has-error');
			}
			if($(element).closest('div'))
			{
				$(element).closest('div').removeClass('has-error');
			}
		},
		errorElement: 'div',
		errorClass: 'invalid-feedback',
		errorPlacement: function(error, element) {
			//console.log(element.closest('td').find('font'));
				if(element.parent('.input-group').length) {
					error.insertAfter(element.parent());
				} else if(element.closest('td').find('font').length)	/**********Pour le calendrier de la modal dossier**********/
					{
						error.insertAfter(element.closest('td').find('font'));
					} 	else
						{
							error.insertAfter(element);
						}
			}
		});
		$.extend($.validator.messages, {
			required: "Ce champ est obligatoire",
			email: "Vérifier votre mail",
			number: "Votre message",
			nom: "Merci de saisir correctement",
			minlength : "Merci de saisir un texte plus long",
			maxlength: "Votre saisie est trop long",
			rangelength: $.validator.format("Votre message doit être entre {0} et {1} caractéres."),
			range: $.validator.format("Votre message doit être entre {0} et {1}."),
			max: $.validator.format("Votre message doit être inférieur ou égal à {0}."),
			min: $.validator.format("Votre message doit être supérieur ou égal à {0}.")
		  });
  
		$.validator.methods.nom = function( value, element ) {
		return this.optional( element ) || /^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/.test( value );
		}
		
		// Validation du formulaire support 
 	var validator = $('#formModalDossier').validate({
		onkeyup: false,
		onfocusout: false,
		onsubmit: true,
		rules: {
		  	Nom_patronymique: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/"
		  },  	modif_Nom_patronymique: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/"
		  },
			 Nom_marital: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/"
		  },
			Prenom: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/"
		  },

			Numero_dossier: {
			  minlength:5
		  },
			
			Telephone: {
			  minlength:10
		  },			
			Nature_demande: {
			  range:[01,32],
		  },
			 Observations: {

			  minlength:10
		  },
			/*Semaine: {
			range:[01,53],
		  },*/
			Nom_agent: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/",
		  },
		},
	});
		// Validation du formulaire support modif 
 	var dat=$('#form_modifModalDossier').validate({
		onkeyup: false,
		onfocusout: false,
		onsubmit: true,
		rules: {
		  	modif_Nom_patronymique: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/"
		  },
			 modif_Nom_marital: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/"
		  },
			modif_Prenom: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/"
		  },

			modif_Numero_dossier: {
			  minlength:5
		  },
			
			modif_Telephone: {
			  minlength:10
		  },			
			modif_Nature_demande: {
			  range:[01,32],
		  },
			 modif_Observations: {

			  minlength:10
		  },
			/*modif_Semaine: {
			range:[01,53],
		  },*/
			modif_Nom_agent: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/",
		  },
		},
	});
	
				// Validation du formulaire support gestionnaire 
 	var validate = $('#form_EditGestionnaire2').validate({
		onkeyup: false,
		onfocusout: false,
		onsubmit: true,
		rules: {
		  	Nom_patronymique: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/"
		  },
			 Nom_marital: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/"
		  },
			Prenom: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/"
		  },

			Numero_dossier: {
			  maxlength:15
		  },
			
			Telephone: {
			  minlength:10
		  },			
			Nature_demande: {
			  range:[01,32],
		  },
			 Observations: {

			  minlength:10
		  },
			/*Semaine: {
			range:[01,53],
		  },*/
			Nom_agent: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/",
		  },
			agentCPAM: {
			  nom: "/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/",
		  },
			 Ordre_archivage: {

			  maxlength:50
		  },
			decision: {
			range:[01,26],
			
		  },
			observationPart: {

			minlength:10
		  },
		},
	});

	// Validation du formulaire date_reception
 	$('#form_date_reception').validate({

		rules: {
		  Date_reception: {
			required: true,
		  },
			/*Liste_Semaine: {
			required: true,
		  },*/
		},
		/*messages: {
		  Liste_Semaine: {
			minlength : "Merci de choisir la (ou les) semaines que vous désiriez"
		  },      
		},*/
	});
	
		
});