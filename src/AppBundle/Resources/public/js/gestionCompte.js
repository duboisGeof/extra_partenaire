$(document).ready(function() {

    // tableau pour connaitre l'url
    var path = window.location.pathname.split('/');
    var button = '';
	
	$('#listDemandeAtt').slideUp();
    $('#listDemandePart').slideUp();
    $('#listDemandeGest').slideUp();
	
	$("#DemandeAtt").click(function() {
        if ($('#listDemandeAtt').is(':hidden')) $('#listDemandeAtt').slideDown();
        else $('#listDemandeAtt').slideUp();

    });

    $("#DemandePart").click(function() {
        if ($('#listDemandePart').is(':hidden')) $('#listDemandePart').slideDown();
        else $('#listDemandePart').slideUp();

    });

    $("#DemandeGest").click(function() {
        if ($('#listDemandeGest').is(':hidden')) $('#listDemandeGest').slideDown();
        else $('#listDemandeGest').slideUp();

    });
	
	var tableComptePartenaire = $('#demandesPart').DataTable({
		"order": [[ 1, "asc" ]],
		"columnDefs": [
			{"orderable": false, "targets": 0 },
  		]
	});
	
	var tableCompteAttente = $('#demandesAttente').DataTable({
		"order": [[ 1, "asc" ]],
		"columnDefs": [
			{"orderable": false, "targets": 0 },
  		]
	});
	
	var tableCompteGestionnaire = $('#demandesGest').DataTable({
		"order": [[ 1, "asc" ]],
		"columnDefs": [
			{"orderable": false, "targets": 0 },
  		]
	});


	$(document).on("click", ".detailCompteId", function(event) {
		button=$(this);
        // Récupère la dernier class de la loupe qui contient l'id => "id1"
        recup_class = $(this).attr('class').split(' ').pop();
        // Récupère l'id sans le mot "id" avant le chiffre
        recup_id = recup_class.split("id");
        // Supprime la virgule avant l'id
        id = recup_id.slice(1);
        //alert($(this).attr('class'));
        $.ajax({
            url: Routing.generate('showComptePartenaireModalAjax', {
                'id': id
            }),
            type: "POST",
            data: "",
            async: false,
            success: function(form2) {
                $(form2).modal('toggle');
            }
        });
    });

    $(document).on("click", ".detailDemandeId", function(event) {
        button=$(this);
        // Récupère la dernier class de la loupe qui contient l'id => "id1"
        recup_class = $(this).attr('class').split(' ').pop();
        // Récupère l'id sans le mot "id" avant le chiffre
        recup_id = recup_class.split("id");
        // Supprime la virgule avant l'id
        id = recup_id.slice(1);
        //alert($(this).attr('class'));
        $.ajax({
            url: Routing.generate('showCompteAttenteModalAjax', {
                'id': id
            }),
            type: "POST",
            data: "",
            async: false,
            success: function(form2) {
                $(form2).modal('toggle');
            }
        });
    });
	
	
	
	$(document).on("click", ".save", function(event) {
      	nomStructure = $("#form_modif_compte_partenaire_nomStructure").val();
		//if(observation.validity.valueMissing==true){alert('ok')}
        nom = $("#form_modif_compte_partenaire_nom").val();
	 	prenom = $("#form_modif_compte_partenaire_prenom").val();
        tel = $("#form_modif_compte_partenaire_tel").val();
        mail = $("#form_modif_compte_partenaire_mail").val();
        type = $("#form_modif_compte_partenaire_type").val();
        nomResponsable = $("#form_modif_compte_partenaire_nomResponsable").val();
	 	prenomResponsable = $("#form_modif_compte_partenaire_prenomResponsable").val();
        telResponsable = $("#form_modif_compte_partenaire_telResponsable").val();
        mailResponsable = $("#form_modif_compte_partenaire_mailResponsable").val();
        $.ajax({
            url: Routing.generate('modifierComptePartenaireModalAjax', {
                'id': id
            }),
            type: "POST",
            data: {
                id: id,
                nomStructure: nomStructure,
                nom: nom,
			 	prenom: prenom,
                tel: tel,
                mail: mail,
                type: type,
                nomResponsable: nomResponsable,
				prenomResponsable: prenomResponsable,
                telResponsable: telResponsable,
                mailResponsable: mailResponsable,
            },
            async: true,
            success: function(response) {
				nomPrenomResponsable = nomResponsable+" "+prenomResponsable
				nomPrenomDemandeur = nom+" "+prenom
				
				// Permet de récuperer la valeur du bouton 'Activer/Désactiver'. Utilisez Pour mettre a jour le bouton après la requete ajax
				statuCompte = button.parents('tr').find(".statuCompte").text();
				// Permet de récupérer le type de compte 'Partenaire/Gestionnaire'. Utilisez pour mettre a jour le tableau de l'un ou de l'autre
				typeCompte = button.parents('table');
				
				if(statuCompte == "Désactiver"){
					currentCompte ="<center><a class='btn btn-sm btn-danger white_text statuCompte ' href='/Geoffrey/extra_partenaire/web/app_dev.php/gestionnaire/demande-compte/"+id+"/desactiver'>Désactiver</a></center";
				}if(statuCompte == "Activer"){
					currentCompte ="<center><a class='btn btn-sm btn-success white_text statuCompte' href='/Geoffrey/extra_partenaire/web/app_dev.php/gestionnaire/demande-compte/"+id+"/activer'>Activer</a></center";
				}
				
				var modif=["<a class='detailCompteId id"+id+"' data-toggle='modal' data-target='#myModal' role='button' ><font color=#226B9B><center>&#128269;</center></a>",nomStructure,nomPrenomResponsable, nomPrenomDemandeur,response, currentCompte];
				
				if(typeCompte.attr('id') == 'demandesPart'){
					console.log("partenaire")
					tableComptePartenaire.row(button.parents('tr')).data(modif).draw();
				}
				if(typeCompte.attr('id') == 'demandesGest'){
					tableCompteGestionnaire.row(button.parents('tr')).data(modif).draw();
				}
				
				
				$('.modal').load(window.location+' .modal');
				$('.modal').modal("hide");				
            }
        });
    });
	
	//Ajax pour vérifier si le mail saisi lors de l'oubli de mot de passe existe bien en base
	$("#trouver_mail").click(function() {
		//button=$(this);
        $("#trouver_mail").prop("disabled",true);

        var mail = $('#username').val();
        //alert(mail);
        $.ajax({
            url: Routing.generate('verifReinitMdpAjax', {
                'mail': mail
            }),
            type: "POST",
            data: "",
            async: false,
            success: function(response) {
                if(response == 0) {
                    alert("Adresse inconnue.\nVeuillez entrer une adresse valide.");
                    $("#connexioncompte_2connexionCompteForm").submit(function () { return false; });
                    window.location.reload(true);
                }
            }
        });


		
    });
	
});
