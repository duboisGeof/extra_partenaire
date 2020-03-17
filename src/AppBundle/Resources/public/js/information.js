$(document).ready(function() {
	// Permet de mettre le focus sur la modal de ckeditor qui se trouve elle même dans une modal
	$(document).on("click", "#cke_1_top span a", function(event) {
		$(".modal").css("overflow-y", "hidden");
	});
	// Remets les valeurs par defaut
	$(document).on("click", ".cke_dialog_ui_button_cancel", function(event) {
		$(".modal").css("overflow-y", "auto");
	});
	
	$(document).on("click", ".cke_dialog_ui_button_ok", function(event) {
		$(".modal").css("overflow-y", "auto");
	});
	
	$(".modifierTexte").on("click", function() {
       button = $(this);
		
    });
	
	// Enregistrement en ajax du texte
	$(document).on("click", ".save", function(event) {
		button2 = button.context.className;
		console.log(button2);
        recup_class = button2.split(' ').pop();
        id = recup_class.slice(2);
        titre = $("#titre").val();
	 	content = CKEDITOR.instances.text.getData()
		img = button.context;
        $.ajax({
            url: Routing.generate('ModifierInformationModalAjax', {
                'id': id
            }),
            type: "POST",
            data: {
                id: id,
                titre: titre,
                content: content,
            },
            async: true,
            success: function(response) {
				
				// Récupération de l'image de modification
				link = img.parentElement;
				
				// Suppression et remplissage avec les nouvelles données
				$( ".block" ).empty();
				$( ".block" ).html(content);
				
				$( "#titreInformation" ).empty();
				$( "#titreInformation" ).html(titre + link.outerHTML );
				$('.modal').modal("hide");	
            }
        });
    });
});