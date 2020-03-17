$(document).ready(function () {

    // tableau pour connaitre l'url
    var path = window.location.pathname.split('/').reverse();
	
    var button = '';

	$('#myModal').on('show.bs.modal', function() {
		$('#form_EditGestionnaire2').validate().resetForm(); //efface les erreurs à chaque fois que la modal est ouverte
		
	});
	
	$('#ModifModalDossier').on('show.bs.modal', function() {
		$('#form_modifModalDossier').validate().resetForm(); //efface les erreurs à chaque fois que la modal est ouverte
		
	});

    // Permet d'ouvrir un fenetre modal avec les données d'un dossier de transmission
    // Possibilité de modifier les données
    id = 0;
	$(".ouvrirModal").on("click",function() {
		recupId($(this));
		$.ajax({
            url: Routing.generate('DetailDossierPartenaireModalAjax', {
                'id': id
            }),
            type: 'POST',
            data: id,
            success: function(form) {
				//console.log(form);
		  var dateInstruction;
		  var naissance;
				if (form.dateInstruction!=null)
					{
						dateInstruction = form.dateInstruction.split("-").reverse().join("/"); //remettre en format dd/mm/YYYY
					} else {
						dateInstruction=null;
					}
				if (form.naissance!=null)
					{
						naissance = form.naissance.split("-").reverse().join("/");//remettre en format dd/mm/YYYY
					} else {
						naissance=null;
					}
				if (form.dateReception!=null)
					{
						dateReception = form.dateReception.split("-").reverse().join("/");//remettre en format dd/mm/YYYY
					} else {
						dateReception=null;
					}
				//Variable en Array contenant les infos de la response ajax qui est de la function getById
					var input_form=[form.observation,form.id,form.demande_id,naissance,form.tel,form.numDossier,form.agent,form.nom_patro,form.nom_mari,form.prenom,'',form.decision_id,dateInstruction,form.observationPart,form.ordreArchivage,form.agentCPAM,dateReception,form.observationInter];
				//Appel à la function Editform voir à la fin du script
  					Editform(input_form);

            }
        });

    });

	$(".btn-ModifDossier").on("click",function() {
		recupId($(this));
		$.ajax({
            url: Routing.generate('ModifierDossierPartenaire', {
                'id': id
            }),
            type: 'POST',
            data: id,
            success: function(form) {
				console.log(form);
			var dateInstruction;
			var naissance;
				if (form.naissance!=null)
					{
						naissance = form.naissance.split("-").reverse().join("/");
					} else {
						naissance=null;
					}
				//Variable en Array contenant les infos de la response ajax qui est de la function getById
				var input_form=[form.observation,form.id,form.demande_id,naissance,form.tel,form.numDossier,form.agent,form.nom_patro,form.nom_mari,form.prenom];
				//Appel à la function Editform voir à la fin du script
  				EditformModif(input_form);
            }
        });

    });
	

	
	$('.btn-modal').on('click', function(){
		recupId($(this)); 
		$.ajax({
            url: Routing.generate('DetailDate_ReceptionModal', {
                'id': id
            }),
            type: 'POST',
            data: id,
            success: function(response) {

				if (response!=false)
					{
							$('.contenu-dynamique').remove();
							$(response).insertAfter('.body-info');
							
							$('.datepicker').datepicker({
								format: 'dd/mm/yyyy',
								language: 'fr',
								todayHighlight: true,
								autoclose: true,
							});
							var input=$('input#Id').val(id);
							$("#Modal_Date_reception").modal();

					}
				else{
				//$("#Modal_Date_reception").modal('hide');
				window.location.assign(Routing.generate('PSAAffichageDossiersPartenairesEnCours', {
                'id': id
            }));
				}
			},
			error: function(errorMessage) { 
                    alert(errorMessage); 
                }
	 });
	});

	$(document).on('click','.btn-valider-date',function(event){
			// Validation du formulaire en ajax de date_reception 
			/*$('#form_date_reception').validate({
				onkeyup: false,
				onfocusout: false,
				rules: {
				  Date_reception: {
					required: true,
				  },
					Liste_Semaine: {
					required: true,
				  },
				},
				messages: {
				  Liste_Semaine: {
					minlength : "Merci de choisir la (ou les) semaines que vous désiriez"
				  },      
				},
			}).form();*///le '.form()' est important
			var select='';
			var input=$('input#Date_reception').val();
			//Par rapport auw infos sélectionnés du select 
			/*$('select#Liste_Semaine option:selected').each(function(){
				select=select+"'"+$(this).text()+"'";
			});*/
			//select=select.replace("''","' OR numeroSemaine='");// pour requête sql

		if(input!='' && select!=''){
			input = input.split("/").reverse().join("-");
			$.ajax({
					url: Routing.generate('InsertDate_ReceptionModal'),
					type: 'POST',
					data:  {input: input,
							select:	select,
						   },
					async: true,
					success: function(data)
					{
						//console.log(data);
						var id=$('input#Id').val();
						window.location.assign(Routing.generate('PSAAffichageDossiersPartenairesEnCours', {
                'id': id
            }));//redirection au submit 
					},

				});
		}
	});	

  
	//path[1] = la partie des '/' de l'url voir ligne 4
	if (path[1]=="partenaire"){
		//---------------- Table Récapitulatif Partenaire-------------------
/*         Date du Jour en string format d-m-Y      */
	var now=moment().format('l');	//Utile pour le titre du fichier excel
	var dateParts = now.split("/");
            now= dateParts[1]+'-'+dateParts[0]+'-'+dateParts[2];
/*******************************************/
	}
	    //Variable des numéros des colonnes cachées
    var ColsHide = [15];	

    /*Creation d'une table avec Datatable*/
    var table = $('#tablepanier').DataTable({
		"order": [ 1, "asc" ],
		"columnDefs": [
			{"orderable": false, "targets": 0 },
			{
            "width": "",
            "targets": 0
        	},
					  ],
	});
//---------------- Table Récapitulatif Partenaire-------------------
    var title_excel = "Dossier Partenaire";
    var table2 = $('#Recapitulatif').DataTable({
        "paging": false,
        "scrollY": 200,
        'scrollX': true,
        'scrollCollapse': true,
        'buttons': [
			{
                //button afficher tous les colonnes
                extend: 'colvisGroup',
                text: 'Voir tout',
                show: ColsHide, // montre tous les colonnes cachées
                className: 'btn btn-secondary',
				hide:[0], //cache la colonne '0' donc la loupe
            },
            {
                //button afficher les colonnes au départ
                extend: 'colvisRestore',
                text: 'Restaurer',
                className: 'btn btn-secondary',

            },
            {
                extend: 'excelHtml5',
                text: 'Export Excel',
                className: 'btn btn-secondary',
                filename: "Récap. dossiers partenaire "+now, //nom du fichier
                title: title_excel, //titre
				exportOptions:
				{
				 columns:":not(.no_export), :hidden:not(.no_export)" //Exclu ceux avec la classe 'no_export' et prendre en compte ceux cachées
				},
            }
        ],        
        //colonne invisible mais possibilité de rechercher
        "columnDefs": [{
                "targets": ColsHide,
                "visible": false,
                "searchable": true,       
		}
		],
    });
	/********************* Table Gestionnaire ****************************/
	    //Variables Tableaux pour connaître les lignes en couleur sur le fichier excel
    var row_rouge = [];
    var row_orange = [];
    var row_normal = [];
    var table3 = $('#Recapitulatif_Gestionnaire').DataTable({
        //"paging": false,
		"search": {
				"regex": true,
				"smart": false,
			  },
		"order": [[ 18, "desc" ]],
        "scrollY": '50vh',
        scrollX: true,
        scrollCollapse: true,
        buttons: [
			{
                //button afficher tous les colonnes
                extend: 'colvisGroup',
                text: 'Voir tout',
                show: ColsHide,
                className: 'btn btn-secondary',
				hide:[0],
            },
            {
                //button afficher les colonnes au départ
                extend: 'colvisRestore',
                text: 'Restaurer',
                className: 'btn btn-secondary',

            },
        ],        
        //colonne invisible mais possibilité de rechercher
        "columnDefs": [{
                "targets": ColsHide,
                "visible": false,
                "searchable": true,       
		},
					   {"orderable": false, "targets": 0 },
					   { "width": "100px", "targets": 19 },
		{
			type:'date-eu', targets:[18,17,10,5],
		}
		],
	  	"preDrawCallback": function( settings ) {	//function avant l'affichage du tableaux
			//Permet de vider les tableaux après la boucle
			row_normal.splice(0,row_normal.length);
			row_orange.splice(0,row_orange.length);
			row_rouge.splice(0,row_rouge.length);
          },

   //Affichage couleur sur les lignes 
        "rowCallback": function( row, data , displayNum , displayIndex, dataIndex ) {//function pendant l'affichage du tableaux

            var date=data[17]; //données de la colonne 17 "date de reception" 
			var decision=data[12]; //données de la colonne 12 "décision" 
			var date_instruction=data[10]; //données de la colonne 10 "date_instruction" 
            var re_date=date.replace("/","-");
            var dateParts = date.split("/");
            date= new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);
            var dateJour=new Date().getTime();	
            date=date.getTime();
            var difdate=Number(dateJour-date).toFixed(0);
            var intervall=30*24*3600*1000; //30j
            var intervall2=15*24*3600*1000; //15j
            if ( difdate > intervall && date_instruction=='') {
            $(row).addClass('table-danger');
            row_rouge.push(displayIndex);
            return row_rouge;
            } else if(difdate > intervall2 && date_instruction=='')
                {
                 $(row).addClass('table-warning');
                row_orange.push(displayIndex);
                return row_orange;
        		}
			}

    });

    //table triée grâce à la liste déroulante du formulaire support
    var weekpicker = $('.datepicker2').datepicker({
        language: 'fr',
       	todayHighlight: true,
		calendarWeeks: true,		//Affiche numero des semaines
	});
	weekpicker.on('changeDate', function(e,date) {

		var date=new Date(e.date);
		date=moment(date).isoWeek();//la semaine en iso
		/****Retourne entier à 2 chiffres***/
		date=date.toString().replace(/^(\d)$/,'0$1');
		//$('select#Semaine').val(date);
	
		/***********************************/
		//	Recherche la Semaine selectionnée sur datepicker
		table.column(8).search(date,true,false).draw();
		//	Sélectionne la semaine datepicker
		$('.day.active').closest('tr').find('td').addClass('active');
	});
	//		datepicker highlight row mouseover
	weekpicker.on( 'show', function(e){
		$('.table-condensed').addClass('table-hover');
	});
	/*$('select#Semaine').on('change', function(){
			table.column(8).search($('select#Semaine').val(),true,false).draw();
	});*/

/*********************Semaine pour la modal Modif***********************/
	
    //table triée grâce à la liste déroulante du formulaire support
   /* var weekpicker2 = $('.datepickerModif').datepicker({
        language: 'fr',
       	todayHighlight: true,
		calendarWeeks: true,		//Affiche numero des semaines
	});
	weekpicker2.on('changeDate', function(e,date) {

		var date=new Date(e.date);
		date=moment(date).week();
		/****Retourne entier à 2 chiffres***/
		//date=date.toString().replace(/^(\d)$/,'0$1');
		//$('select#modif_Semaine').val(date);
	
		//	Sélectionne la semaine datepicker
		//$('.day.active').closest('tr').find('td').addClass('active');
	//});
	//		datepicker highlight row mouseover
	//weekpicker.on( 'show', function(e){
		//$('.table-condensed').addClass('table-hover');
	//});
/*********************************************************************/
$(document).on("click", '.supprDossier', function(){

	button=$(this);

});
	
  $('#SupprimerDossierConf').on("click", function(){
	 
	  recupId(button);
        $.ajax({
            url: Routing.generate('SupprimerDossierPartenaire', {
                'id': id
            }),
            type: "POST",
            data: "",
            async: true,
            success: function(id) {
                table.row(button.parents('tr')).remove().draw();
                $("#ModalSuppr").modal("hide");
            }
        });
    })

//div avec le contenu des boutons
table2.buttons(0, null).containers().appendTo('.da'); 
table3.buttons(0, null).containers().appendTo('.da'); 

	 /* 		//modifie le tableau sans recharger	
				var modif=["<a class='btn ouvrirModal btn-link id"+response.id+"'><font color=#226B9B>&#128269;</a>",response.nom_patro,response.nom_mari,response.prenom,response.agent,response.naissance,response.demande,response.numDossier,response.tel,response.observation,dateInstruction,response.delai,response.decision,response.ordreArchivage,response.observationPart,"",response.agentCPAM,response.dateReception,response.dateTransmission,response.numeroSemaine];
				//console.log(response.dateInstruction.split("-"));
				table2.row(button.parents('tr')).data(modif).draw();
				$(' .myModal').load(window.location+' .myModal');
				
                $('.modal').modal("hide");
            }
        });
    });*/


});
/**************************************** Les fonctions**********************************************************/

/********** Fonction pour remplir le formulaire **************/
function Editform(ArrayInput){
		  $("#Observations").val(ArrayInput[0]);
		  $("#Id").val(ArrayInput[1]);
          $("#Nature_demande").val(ArrayInput[2]);
          $("#Naissance").val(ArrayInput[3]);
          $("#Telephone").val(ArrayInput[4]);
          $("#Numero_dossier").val(ArrayInput[5]);
          $("#Nom_agent").val(ArrayInput[6]);
          $("#Nom_patronymique").val(ArrayInput[7]);
          $("#Nom_marital").val(ArrayInput[8]);
          $("#Prenom").val(ArrayInput[9]);
		  //$("#Semaine").val(ArrayInput[10]);
		  //Partie Gestionnaire
          $("#decision").val(ArrayInput[11]);
          $("#DateInstruction").val(ArrayInput[12]);
          $("#observationPart").val(ArrayInput[13]);
          $("#Ordre_archivage").val(ArrayInput[14]);
          $("#agentCPAM").val(ArrayInput[15]);
		  $("#DateReception").val(ArrayInput[16]);
		  $("#observationInter").val(ArrayInput[17]);
		
}
function EditformModif(ArrayInput){	//function pour le formulaire support_modif 
		  $("#modif_Observations").val(ArrayInput[0]);
		  $("#modif_Id").val(ArrayInput[1]);
          $("#modif_Nature_demande").val(ArrayInput[2]);
          $("#modif_Naissance").val(ArrayInput[3]);
          $("#modif_Telephone").val(ArrayInput[4]);
          $("#modif_Numero_dossier").val(ArrayInput[5]);
          $("#modif_Nom_agent").val(ArrayInput[6]);
          $("#modif_Nom_patronymique").val(ArrayInput[7]);
          $("#modif_Nom_marital").val(ArrayInput[8]);
          $("#modif_Prenom").val(ArrayInput[9]);
		  //$("#modif_Semaine").val(ArrayInput[10]);
}

