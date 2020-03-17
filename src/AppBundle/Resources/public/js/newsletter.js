$(document).ready(function() {
	$('.alert').hide();
	// Configuration du listing
	var liste_newsletter = $('#listeNewsletter').DataTable({
		"order": [ 2, "desc" ],
        "columnDefs": [{
				"orderable": false, "targets": 3
			},{
				"width": "25%",
				"targets": 3,
			},{
				type:'date-eu', targets:[2],
			}
		],
    });
	
	// Configuration du listing
	$('#listeAbonne').DataTable();

	// Ouvre une modal pour avoir un apercu de la newsletter que l'on est en train de créer dans la page de création 
	$("#apercu").click(function() {
        titre = $("#titre").val();
        content = CKEDITOR.instances.content.getData();
        // Pour l'affichage dans la modal, le symbol & bloque le reste de l affichage. On le remplace donc par du vide
        content = content.replace(/&nbsp;/g, "<br>");
        $.ajax({
            url: Routing.generate('ApercuNewsletterModalAjax'),
            type: "POST",
            data: "titre=" + titre + '&content=' + content,
            async: true,
            success: function(response) {
                $(response).modal('toggle');
            }
        });
    });
	
	// Apercu de la newsletter dans une modal dans la liste des newsletter
	$(".detailNewsletterId").click(function() {
       	recupId(this);
        $.ajax({
            url: Routing.generate('ApercuNewsletterIdModalAjax', {
                'id': id
            }),
            type: "POST",
            data: "",
            async: true,
            success: function(response) {
                $(response).modal('toggle');
            }
        });
    });
	
	// Récupère le bouton de suppression
	$(document).on("click", '.suppressionNewsletterId', function(){
		button=$(this);
	});
	
	// Suppression d'une newsletter dans la liste
	$('#confirmSuppressionNewsletter').on("click", function() {
		recupId(button);
        $.ajax({
            url: Routing.generate('SuppressionNewsletterAjax', {
                'id': id
            }),
            type: "POST",
            data: "",
            async: true,
            success: function(response) {
                //$("#listeNewsletter").load(window.location+' #listeNewsletter');
                liste_newsletter.row(button.parents('tr')).remove().draw();
                $("#modalSuppressionNewsletter").modal("hide");
            }
        });
    });
	
	$('.creationPdfId').on("click", function() {
        var button = $(this);
       	recupId(this);
        $.ajax({
            url: Routing.generate('CreationPdf'),
            type: "POST",
            data: "",
            async: true,
            success: function(response) {
				
            }
        });
    });
	
	$(".envoiNewsletter").on("click", function() {
        $('#myModal').modal("show");
    });
	
	
	// Envoi des emails aux abonnées.
	// Activation du loader pendant l'envoi dans le beforeSend
	$(".envoieEmail").click(function() {
        // Pour l'affichage dans la modal, le symbol & bloque le reste de l affichage. On le remplace donc par du vide
        $.ajax({
            url: Routing.generate('EnvoyerMailNewsletterAjax'),
            type: "POST",
            data: "",
            async: true,
			beforeSend: function(){
				$('#ModalLoader').modal("show");
				$('body').css('overflow','hidden');
			},
            success: function(response) {
				$('#ModalLoader').modal("hide");
				$('body').css('overflow','auto');
				messageFlash();
            }
        });
    });
	
	// Envoyer un mail avec la newsletter pour voir le rendu
	$("#mailTest").click(function() {
		titre = $("#form_creation_newsletter_titre").val();
		content = CKEDITOR.instances.content.getData();
		content = content.replace(/&nbsp;/g, "<br>");
		// Pour l'affichage dans la modal, le symbol & bloque le reste de l affichage. On le remplace donc par du vide
		$.ajax({
			url: Routing.generate('EnvoyerMailNewsletterTestAjax'),
			type: "POST",
			data: "content=" + content,
			async: true,
			success: function(response) {
				messageFlash();
			}
		});
    });
	
	// Gestion de l'abonnement/desabonnement dans la partie partenaire
	$(".actionNewsletter").click(function() {
		recupId(this);
		isNewsletter = this.id
		$.ajax({
            url: Routing.generate('PartenaireNewsletterAjax'),
            type: "POST",
            data: "isNewsletter="+isNewsletter+"&id="+id,
            async: true,
            success: function(response) {
				// Affiche un message d'alert qui ce ferme automatiquement + rechargement du texte
				messageFlash();
				$("#textNewsletter").load(window.location+' #textNewsletter');
            }
        });
  	});
});