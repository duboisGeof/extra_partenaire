$(document).ready(function() {
    
	$("#form_question_reformule").hide();
	$("#form_question_reformule").val('');
	$("#form_reponse_reformule").hide();
	$("#form_reponse_reformule").val('');

	$("label[for='form_question_reformule']").css({
		visibility: 'hidden',
	});
	
	$("label[for='form_reponse_reformule']").css({
		visibility: 'hidden', 
	});
		
   
	$("#form_case_cocher_faq").click(function() {
		if(this.checked){
			//coché donc rendre visibles champs de saisie
			$("#form_question_reformule").show();
			$("#form_reponse_reformule").show();
			
			$("label[for='form_question_reformule']").css({
				visibility: 'visible',
			});
			$("label[for='form_reponse_reformule']").css({
				visibility: 'visible',
			});		
		}
		else
		{
			$("#form_question_reformule").hide();
			$("#form_question_reformule").val('');
			$("#form_reponse_reformule").hide();
			$("#form_reponse_reformule").val('');
			
			$("label[for='form_question_reformule']").css({
				visibility: 'hidden',
			});
			$("label[for='form_reponse_reformule']").css({
				visibility: 'hidden',
			});
		}
	});
	

	$('.FAQGestion').DataTable({
			
       "paging" : true,
        "fixedHeader": true,
        scrollCollapse: true,
        "searching" : true,
		"columnDefs": [
            { "width": "8%", "targets": 0 },			
            { "width": "38%", "targets": 1 },
            { "width": "38%", "targets": 2 },
            { "width": "8%", "targets": 3 },
			{ "width": "8%", "targets": 4 }
        ],
		"aoColumns": [
            { "orderSequence": [ "asc" ] },
            { "orderSequence": [ "desc", "asc", "asc" ] },
            null,
            null
        ],
		
        "language": {
            search: "Rechercher : ", 
             paginate: {
                first: "Premier",
                previous: "Pr&eacute;c&eacute;dent",
                next: "Suivant",
                last: "Dernier"
            }, 
            info: "Affichage de la question _START_ &agrave; _END_ sur _TOTAL_ questions",
            lengthMenu: "Afficher _MENU_ questions",
			emptyTable: "Aucune question FAQ pour ce thème",
			zeroRecords: "Aucune question &agrave; afficher",
			infoEmpty: "",
			infoFiltered: "(filtr&eacute; de _MAX_ questions au total)",
        }
    });
	
	
	//Modale pour confirmation suppression question FAQ
	var theHREF;
	$(".confirmModalLink").click(function(e) {
        e.preventDefault();
        theHREF = $(this).attr("href");
        $("#confirmModal").modal("show");
    });

    $("#confirmModalNo").click(function(e) {
        $("#confirmModal").modal("hide");
    });

    $("#confirmModalYes").click(function(e) {
        window.location.href = theHREF;
    });
	

	 $('.FAQ_Questions_sans_reponse').DataTable({

       "paging" : true,
		"fixedHeader": true,
        "ordering" : true,
		 "order": [[ 3, "desc" ]], 
        "fixedHeader": true,
        "searching" : true,
        "columnDefs": [
            { "width": "5%", "targets": 0 },
            { "width": "30%", "targets": 1 },
            { "width": "55%", "targets": 2 },
			{ "width": "10%", "targets": 3 },
			{ "type":'date-eu', targets:[3]},
        ],

        "language": {
			 search: "Rechercher : ", 
             paginate: {
                first: "Premier",
                previous: "Pr&eacute;c&eacute;dent",
                next: "Suivant",
                last: "Dernier"
            },
            info: "Affichage de la question _START_ &agrave; _END_ sur _TOTAL_ questions",
            lengthMenu: "Afficher _MENU_ questions",
			emptyTable: "Aucune question partenaire",
			zeroRecords: "Aucune question &agrave; afficher",
			infoEmpty: "",
			infoFiltered: "(filtr&eacute; de _MAX_ questions au total)",
        }
    });

});	