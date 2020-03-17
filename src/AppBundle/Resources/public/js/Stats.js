$(document).ready(function () {

    // tableau pour connaitre l'url
    var path = window.location.pathname.split('/');
    var button = '';
    var url=path.pop();
	$('.blockMenu').css({
    'min-height': '157vh',
});

/**********************Partie stats pour le gestionnaire******************************/	
	if(url=='StatsDossiers'){
		var id=$('#Stats_partenaire option:selected').val();
		Stats(id);
		//console.log($('span').text());
		if($('#del_negatif').text()>'0'){$('#del_negatif').addClass('badge-danger')}	
		
			/********** Test stats*************/
		$('#Stats_partenaire').on('change', function(){
		id=$('#Stats_partenaire option:selected').val();
		Stats(id);
		
		});
	
	} else if(url=='Partenaire_Statistiques'){
		var id=recupId('.content_stats')[0];
		Stats(id);
	}

});
/**************************************** Les fonctions**********************************************************/

//Fonction pour voir les Stats
function Stats(id){
	/*******************************Principalement cette fonction est en ajax*************************************/
			$.ajax({
                url: Routing.generate('DetailStats'),
                type: 'POST',
                data:
                {
					id :id
                },
                //dataType: 'json',
				success: function(reponse) {		
						var data=[]; //tableau qui va correspond aux données pour le graph1 donc les nombres de demandes
						var data2=[]; //tableau qui va correspond aux données pour le graph2 donc les nombres de délai
						var total_demande=[]; 
						var td_value=[];
						var partComplet_sans_MAJ=Math.round(reponse[10]*100)/100;
						$('.content_stats').empty(); //div qui se vide pour se re-remplir
						$('.content_stats').append(reponse[0]); //div qui va se remplir avec les infos en ajax
					/************Si il y a un délai négatif le td sera en rouge **************/
						
						if($('.negatif').text()!='0'){
							$('.negatif').css('background','rgba(255, 99, 132, 1)')
						}
					/***********************/
						
						td_value=$('.taux').text().replace(/\t/gi, '').replace(/\n/gi,'').split('%');
						//console.log(td_value);
						var p=0;
						td_value.forEach(function(element){
							
							if (element>=25 && element<=50)
								{
									
								$('.taux:eq('+p+')').css('background','rgba(255, 206, 86, 0.4)');
									//console.log($('.taux:eq('+p+')'));
								}else if( element<25) {
									$('.taux:eq('+p+')').css('background','rgba(255, 99, 132, 0.4)');
								}
							
							p=p+1;
						})
						
					/*************** Jeu de click pour les h2 et l'affichage des tableaux ****************/
						$('[id^="list_"]').slideUp();
						$('[id^="H2"]').click(function() {
							
							if ($(this).next().is(':hidden')) 
								{
									$(this).next().slideDown();	//tableau s'affiche
								}
							else {
									$(this).next().slideUp();	//tableau s'affiche pas
								 }
						});
					/*************boucle pour remplir la variable data*************/
						for(var p=0;p<reponse[1].length;p++){
							if (p<3){			//p<3 car concerne que AME PUMA et CMUC ACS
							for(var i=0;i<3;i++)	//boucle pour avoir les données accord, refus et incomplet
							{
								data.push(reponse[1][p].Nb_decision[i]['nb']);//Remplis dans l'ordre spéciale (AME) accord, etc...
							}
							}else{
								data.push(reponse[1][p].Nb_demande);	//Autre que AME PUMA CMUC 
							};
						};
					/*************boucle pour remplir la variable data2*************/
						for(var p=0;p<reponse[2].length;p++){
							
								data2.push(Math.round((reponse[2][p].val)*100)/100); //Math.round() arrondi au 1/100e
							
						};
						
						for(var p=0;p<3;p++){
							
								total_demande.push(reponse[8][p].nb); // total des demandes AME, PUMA et CMUC ACS pour pourcentage des décisions
							
						};
						data2.push(Math.round((reponse[4].val)*100)/100); //délai moyen total
				/************************Les graphs (diagramme) à l'aide de Chart.js *********************************/
						var ctx = document.getElementById("graph_demande").getContext('2d');	//l'id graph_demande sera l'endroit où se trouvera le graph
				/**************Création du graph*************************/
						var myChart= new Chart(ctx,{type: 'pie',	//type pie pour diagramme en camembert
							/**********Paramètre pour ce diagramme *********/
							data: {
								labels: ["AME accord","AME refus","AME incomplet", "PUMA accord","PUMA refus","PUMA incomplet","CMUC ACS accord","CMUC ACS refus","CMUC ACS incomplet", "MAJ AME","MAJ GDB/CMUC","Aide Fi", "IJ", 'Activités Diverses', "Décisions autres"], //le nom de chaque élément du diagramme dans l'ordre
								datasets: [{
									data: data, //les données (les chiffres) correspondant à chaque élément
									backgroundColor: [ //les couleurs pour différencier
										//jeu de nuances de couleurs
										'rgba(255, 99, 132, 0.8)', //rouge plus foncé
										'rgba(255, 99, 132, 0.6)', //rouge moyen
										'rgba(255, 99, 132, 0.4)', //rouge plus clair
										'rgba(54, 162, 235, 0.8)', //bleu plus foncé
										'rgba(54, 162, 235, 0.6)', //bleu moyen
										'rgba(54, 162, 235, 0.4)', //bleu plus clair
										'rgba(255, 206, 86, 0.8)', //jaune plus foncé
										'rgba(255, 206, 86, 0.6)', //jaune moyen
										'rgba(255, 206, 86, 0.4)', //jaune plus clair
										'rgba(153, 102, 255, 0.8)', //violet plus foncé
										'rgba(153, 102, 255, 0.6)', //violet plus clair
										'rgba(0, 128, 0, 0.6)', //vert plus foncé
										'rgba(75, 192, 75, 0.6)', //vert plus clair
										'rgba(0, 0, 255, 0.6)', //indigo
										'rgba(128, 128, 0, 0.6)', //vert olive
									],
									borderColor: [ // la bordure
										'rgba(255,99,132,1)','rgba(255,99,132,1)','rgba(255,99,132,1)', //rouge
										'rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)', //bleu
										'rgba(255, 206, 86, 1)','rgba(255, 206, 86, 1)','rgba(255, 206, 86, 1)', //jaune
										'rgba(153, 102, 255, 1)','rgba(153, 102, 255, 1)',//violet
										'rgba(0, 128, 0, 1)',//vert
										'rgba(75, 192, 75, 1)',///vert clair
										'rgba(0, 0, 255, 1)',//indigo
										'rgba(128, 128, 0, 1)',//vert olive
									],
									
								}]
							},
							options: 
								
								{	plugins: {
												  labels: {
												render: 'percentage',
												fontColor:'white',
												precision: 2
											  }
								},
									title: {	//Le titre
												display: true,
												text: 'Demandes'
											},
									legend:{	
											position: 'right', // position de la légende
											onClick:false,

											},
									tooltips: 		//tooltips est une infobulle qui apparaît lorsque la souris est sur l'élément 
									{
											mode: 'index',
											callbacks: {	//Paramettrer l'infobulle comme l'on veut 

												//Utilise une fonction pour le footer du tooltips  
												footer: function(tooltipItems, data) {	//tooltipItems array
													//console.log(tooltipItems);
													var indice_Part=tooltipItems[0].index;	//variable indice_Part (par ex:1 veut dire le deuxieme élément)
													var nbTotal=reponse[3];
													//console.log(nbTotal);
													var donnee=data.datasets[0].data[indice_Part]; //la donnée de l'élément ciblé
													var percen_donnee=donnee*100/nbTotal; //% du data
													
													var sum=Math.round(percen_donnee*100)/100; //arrondi au 1/100e
													sum=sum+'%';// affichage au footer du tooltips
													//Au cas pour les accords, refus et incomplets
													if(indice_Part<=8)	//le '8' signifie AME, PUMA et CMUC, il y a 9 données
													{
														switch(true){
															case (indice_Part<3):	//AME
																percen_donnee=donnee*100/total_demande[0];
																sum=sum+'\n% par rapport à AME:'+Math.round(percen_donnee*100)/100+'%';//% par rapport à AME
															break;
															case (indice_Part<6): //PUMA
																percen_donnee=donnee*100/total_demande[1];
																sum=sum+'\n% par rapport à PUMA:'+Math.round(percen_donnee*100)/100+'%';//% par rapport à PUMA
															break;
															case (indice_Part<9): //CMUC ACS
																percen_donnee=donnee*100/total_demande[2];
																sum=sum+'\n% par rapport à CMUC ACS:'+Math.round(percen_donnee*100)/100+'%';//% par rapport à CMUC ACS
															break;	
														}
													
													}
													//var sum=donnee.toFixed(2);
													return 'Sur les '+nbTotal+' demandes \nPourcentage: ' + sum;
																		
												},
											},
										
											footerFontStyle: 'normal'	//style du footer
										},
								}
						});	

						/********************************Fin parametre graph 1 'demandes' *****************************/
				/********************************graph 2 'demandes' *****************************/
					var ctx2 = document.getElementById("graph_delai").getContext('2d');
					var myChart2= new Chart(ctx2,{type:  'horizontalBar',	//horizontalBar diagramme horizontal
					data: {		
								labels: ["AME", "PUMA","CMUC ACS", "MAJ AME","MAJ GDB/CMUC","Aide Fi", "IJ", "Décisions autres","Délai total"],
								datasets: [{
									data: data2,	//les données
									backgroundColor: 
									[
										'red',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(153, 102, 255, 1)',
										'green',
										'RGB(0, 128, 128)',
										'rgba(128, 128, 0, 1)',//vert olive
										'rgba(153, 0, 255, 1)',
										'RGB(243, 156, 18,1)'
									],
								}]
							},
					options:  
					 {
						 plugins: {		/**************** Mettre la valeur dans le diagramme **************/
										labels: {
									render: 'value',
									fontStyle:'bold'

									}
								},

						title: {
									display: true,
									text: 'Nombre de délais'
								},
						legend:{
									display: false, //pas de legende
								},
						tooltips: 
								{
									callbacks: {
										label: function(tooltipItem) { //body du tooltip, tooltipItem est seulement une variable
											return "Délai moyen: " + Number(tooltipItem.xLabel)+" jours";	//Affichera "Délai moyen: 25 jours" par ex
											}
										}
								 },
						},
						
					});
					/********************************Fin parametre graph 2 'délais' *****************************/
					/********************************graph 3 synthese *****************************/
						var ctx3 = document.getElementById("graph_synthese").getContext('2d');
						var myChart3= new Chart(ctx3,{type: 'horizontalBar',
							data: {
								labels: ["Dossiers avec délai<=30j","Total(AME+PUMA+ACS) sans MAJ ","Total complet(AME+PUMA+ACS) sans MAJ ", "Dossiers avec délai Négatif"],
								datasets: [{
									data: [reponse[5].nb,reponse[7].NbHorsMAJ,Math.round(reponse[7].NbHorsMAJ*partComplet_sans_MAJ*100)/100,reponse[6].NbDelaiNegatif],
									backgroundColor: [
										
										'rgba(255, 206, 86, 1)',//jaune
										'rgba(54, 162, 235, 1)',//bleu
										'rgba(54, 162, 235, 0.6)',//bleu
										'red',
									],
								}]
							},
							options: {
									plugins: {	/**************** Mettre la valeur dans le diagramme **************/
										labels: {
									render: 'value',
									fontStyle:'bold'
									}
								},
									title: {
												display: true,
												text: 'Synthèse',
												
											},
									legend:{
										display: false, //pas de légende
									},
									tooltips: 
									{
										callbacks: {
											label: function(tooltipItem) {// body tooltipItem
												return "Nombre: " + Number(tooltipItem.xLabel)+" dossiers\nSur "+reponse[9].nbDossier+" dossiers";
												},
											footer: function(tooltipItems) {//footer
												var donnee=(Number(tooltipItems[0].xLabel)*100/reponse[9].nbDossier);
												return "% sur les dossiers: " + Math.round(donnee*100)/100+"%";
												}
											}
									 },
								barPercentage:0.9,
								}
						});	

            	}
				
				
            });

}