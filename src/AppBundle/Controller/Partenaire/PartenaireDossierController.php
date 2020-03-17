<?php

namespace AppBundle\Controller\Partenaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\transmission_dossier;
use AppBundle\Entity\User;
use AppBundle\Entity\nature_dossier;

class PartenaireDossierController extends Controller
{

    public function indexAction(Request $request)
    {		
		
		$repository_nature = $this->getDoctrine()->getManager()->getRepository('AppBundle:nature_dossier');
		$tab_liste=$repository_nature->getListeNatureDossier();
		
        $request = $this->get('request');
		$defaultData = array();          
        $form = $this->get('form.factory')->create('AppBundle\Form\dossier\Form_support',$tab_liste);
		$form2 = $this->get('form.factory')->create('AppBundle\Form\dossier\Form_supportModif',$tab_liste);	
		$id_partenaire=$this->getUser('id')->getstructure()->getId();  //récupère le partenaire connecté

		$now= new \DateTime('NOW');
		$now->format('Y-m-d');
		//$partenaire= $repository->getUserFromId($id_partenaire);
		$partenaire_nom= $this->getUser('id')->getstructure()->getNom();

		dump($partenaire_nom);

		
		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
		/*$decision_repository=$this->getDoctrine()->getRepository('AppBundle\Entity\type_decision');
		$defaut_decision=$decision_repository->getId(1);	*/
		$request = $this->get('request');

			//Ajout d'un dossier
		    if ($form->handleRequest($request)->isValid() && $form->isSubmitted())
			{
				//controler d'abord la date de naissance !!!!!!!!!!!!!!
				
				$support=new transmission_dossier();
				$repository=$this->getDoctrine()->getRepository('AppBundle\Entity\Structure');
				$partenaire= $repository->find($id_partenaire);
				
				$repository=$this->getDoctrine()->getRepository('AppBundle\Entity\nature_dossier');
				$nature_dossier= $repository->find($form['Nature_demande']->getData());
				
				$repository=$this->getDoctrine()->getRepository('AppBundle\Entity\type_decision');
				$decision= $repository->find(1); //Par défaut est à 1 donc "En cours"
			
				//si PJ, renommer pour insérer en BD
				if ($form['PJ']->getData() != "") {
					
					$extension = $form['PJ']->getData()->guessExtension();
					$date_heure = $now->format('dmY_His');

					$fichier_name="dossier_".$date_heure.".".$extension;
					
					$chemin_piece="files/Dossiers";
					$form['PJ']->getData()->move($chemin_piece, $fichier_name);
				   	$support->setPJ($fichier_name);
					
				}		

				$support->setNomPatro($form['Nom_patronymique']->getData());
				//$support->setNumeroSemaine($form['Semaine']->getData());
				$support->setNomMari($form['Nom_marital']->getData());
				$support->setPrenom($form['Prenom']->getData()); 
				$support->setDateTransmission($now); 		
				$support->setObservation($form['Observations']->getData()); 
				
				//$support->setNaissance('12/01/2000'); 

				$support->setAgent($form['Nom_agent']->getData());
				$support->setNumDossier($form['Numero_dossier']->getData()); 
				$support->setDemande($nature_dossier); 
				$support->setTel($form['Telephone']->getData());
				$support->setDecision($decision); 
				$support->setPartenaire($partenaire); 
				$support->setUrgence($form['Urgence']->getData());
				
				$em = $this->getDoctrine()->getManager();
				$em->persist($support);
				$em->flush();
								
				// Permet d'effacer les éléments du formulaire
				if($em){ // j'ouvre l accolade 
					
					 	unset($form); // détruire la variable form
					 $form = $this->get('form.factory')->create('AppBundle\Form\dossier\Form_support',$tab_liste); //Et recréer la variable form
				}// je ferme l accolade !!!

			}
		
				//Modifier d'un dossier
	
		
		    if ($form2->handleRequest($request)->isValid() && $form2->isSubmitted())
			{
				
				$repository=$this->getDoctrine()->getRepository('AppBundle\Entity\Structure');
				$partenaire= $repository->find($id_partenaire);
				$supportModif = $transmission_repository->find($form2['modif_Id']->getData());
				$repository=$this->getDoctrine()->getRepository('AppBundle\Entity\type_decision');
				$decision= $repository->find(1); //Par défaut est à 1 donc "En cours"
				$supportModif->setNomPatro($form2['modif_Nom_patronymique']->getData());
				//$supportModif->setNumeroSemaine($form2['modif_Semaine']->getData());
				$supportModif->setNomMari($form2['modif_Nom_marital']->getData());
				$supportModif->setPrenom($form2['modif_Prenom']->getData()); 
				$supportModif->setDateTransmission($now); 		
				$supportModif->setObservation($form2['modif_Observations']->getData()); 
				$supportModif->setNaissance($form2['modif_Naissance']->getData()); 
				$supportModif->setAgent($form2['modif_Nom_agent']->getData());
				$supportModif->setNumDossier($form2['modif_Numero_dossier']->getData()); 
				$supportModif->setDemande($form2['modif_Nature_demande']->getData()); 
				$supportModif->setTel($form2['modif_Telephone']->getData());
				$supportModif->setDecision($decision); 
				$supportModif->setPartenaire($partenaire); 
				$em = $this->getDoctrine()->getManager();
				$em->persist($supportModif);
				$em->flush();
			 
			  	
			}
		//afficher les dossiers du partenaire en cours => qui n'ont pas de date de réception
        $liste_dossier_cours = $transmission_repository->getDossierCoursPartenaire($id_partenaire);
				
        return $this->render('@App/PartenairePage/Dossier/PartenaireDossierSupport.html.twig', array ('transmissions'=>$liste_dossier_cours,'form' => $form->createView(),'form2' => $form2->createView(),'partenaire'=>$partenaire_nom));
    }
		
	 /*public function envMailAction(Request $request) {
        $message = \Swift_Message::newInstance(null)
                // hop, on défini le sujet du mail
                ->setSubject('Transmission de dossier partenaire à la CPAM')
                ->setFrom(['noreply@assurance-maladie.fr' => 'Extranet Partenaire'])
                ->setTo([
                    'sylvie.vidal@assurance-maladie.fr'
                ])
                ->setBody(
                $this->renderView(
                        // app/Resources/views/Emails/registration.html.twig
                        'AppBundle:PartenairePage:Dossier:Dossiercorpsmail.html.twig'
                ), 'text/html'
                )
        ;
        $this->get('mailer')->send($message);

        return $this->render('AppBundle:PartenairePage:transmissionPartenaireSupport.html.twig');
    }*/

	
	public function consultRecapitulatifAction(Request $request)
    {
		$request = $this->get('request');
		$defaultData = array();
		$id_partenaire=$this->getUser('id')->getstructure()->getId();
		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
		$NbJoursRecup=$this->container->getParameter('Transmission_dossier_Recapitulatif_NbMois');
        $liste_dossier = $transmission_repository->getTransmission($id_partenaire,$NbJoursRecup);

        return $this->render('@App/PartenairePage/Dossier/PartenaireDossierRecapitulatif.html.twig', array ('transmissions'=>$liste_dossier));
    }
	
		public function StatistiquesAction()
    {	
		$id_partenaire=$this->getUser('id')->getstructure()->getId();
		
        return $this->render('@App/PartenairePage/Dossier/PartenaireDossierStatistiques.html.twig',array(
			"partenaire" => $id_partenaire
		));
    }
	
		public function SupprimerAction(Request $request, $id)
    {
		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
		$em = $this->getDoctrine()->getEntityManager();
		$transmission = $transmission_repository->find($id);
		$em->remove($transmission);
		$em->flush();
		 
		return new Response($id);	
    }
		public function DetailStatsAction(Request $request)		//Va remplir une div en ajax
    {
		 if($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
			  {
				$id = $request->get('id');
				$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
			 	//Tableau configure pour les requêtes
			 	$decision=['accord ', 'refus ', 'demande de pièces complémentaires% '];	
				$demande=['AME', 'PUMA', 'CMUC ACS','Mise à jour AME','Mise à jour GDB/CMUC', 'Aide Fi', 'IJ','Activités Diverses','Décisions autres (classement sans suite, déjà traité, …)'];	
			 	$indicateur=['Somme des délais de traitement des dossiers avec une date d’instruc. dans le mois M et décision accord/refus CMUC ou ACS','Nb de dossiers avec une date d’instruc. dans le mois M et décision accord/refus CMUC ou ACS','Nb de dossiers avec une date de récept. dans le mois M et une nature de demande'];
			 	$Liste_Mois=["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."];

			 	/*********************/
				$NbJoursRecup=$this->container->getParameter('Transmission_dossier_Recapitulatif_NbMois');	//Les mois récupérés 15mois
		/***********Selon la valeur du select voir route dans le js ************/
			 	if ($id==''){
					$partenaire='';	//par défaut null pour globale
				}
			 	else{
					$partenaire='and partenaire_id='.$id; 
				}/*****************************************************/
		/***************** Requetes pour tableau synthèse ****************************/
				$NbDelaiMoinsMois=$transmission_repository->StatsNbDelaiMoinsMois($NbJoursRecup,$partenaire); /**Nombre dossiers avec délai =<30j ***/
				$NbTotalDossiers=$transmission_repository->StatsNbTotal($NbJoursRecup,$partenaire); /**Nombre dossiers avec délai =<30j ***/
				$NbDelaiNegatif=$transmission_repository->StatsNbDelaiNegatif($NbJoursRecup,$partenaire); /**Nombre dossiers avec délai <0 ***/
			 	$NbDelaiMoyenTotal=$transmission_repository->StatsDelaiMoyenTotal($NbJoursRecup,$partenaire); /**Delai moyen total des dossiers ***/
			 	$NbTotal=0;
				$NbhorsMAJ=$transmission_repository->StatsNbHorsMAJ($NbJoursRecup,$partenaire); /**Nombre dossiers hors MAJ (AME+CMUC ACS+PUMA)*/

				$NbPartenaireDelaiNegatif=$transmission_repository->StatsNbPartenaireDelaiNegatif($NbJoursRecup,$partenaire);/**Nombre partenaire ayant au moins un delai négatif*/
		/****************** Boucle pour effectuer les requetes selon les demandes *****************************/
					for($i=0;$i<count($demande);$i++)
					{	
						
						$Demande=$demande[$i];	//Important pour après (L'autre boucle)

						switch ($i){ 	//Comprendre les informations dans la base de données
							case 3:
								$requete='like "%AME mise à jour%" or n.libelle like "%AME recours gracieux%"';//change la chaine de caractère pour la requete 'Mise à jour AME'
								$Nb_demande[$i]=$transmission_repository->StatsNbMAJAME($NbJoursRecup,$requete,$partenaire);
								$NbDelai_demande[$i]=$transmission_repository->StatsDelaiMoyen($NbJoursRecup,$requete,$partenaire);
								break;
							case 4:
								$requete='like "%taires MUTATION%" or n.libelle like "%taires divers%" or n.libelle like "%mise à jour%"';//change la chaine de caractère pour la requete 'Mise à jour GDB/CMUC'
								$total=$transmission_repository->StatsNbDecision($NbJoursRecup,$requete,$partenaire)['nb']-$Nb_demande[$i-1]['nb'];
								if ($total<0){
									$Nb_demande[$i]['nb']=0;
								} else{$Nb_demande[$i]['nb']=$total;}
								
								$NbDelai_demande[$i]=$transmission_repository->StatsDelaiMoyenMAJCMUC($NbJoursRecup,$partenaire);
								break;
							case 5:
								$demande[$i]='Aide Financière';//change le nom pour l'affichage
								break;
							case 6:
								$demande[$i]='Indemnités journalières';
								break;
							case 7:
								$requete="in(select libelle from nature_dossier where id between 28 and 32)";//change la chaine de caractère pour la requete, elle correspond à "ACTIVITÉS DIVERSES"
								$Nb_demande[$i]=$transmission_repository->StatsNbDemande($NbJoursRecup,$requete,$partenaire);
								break;
							case 8:
								$requete=' in(select libelle from type_decision where id between 18 and 26 or id=1)';//Décisions autres
								$NbDelai_demande[$i]=$transmission_repository->StatsDelaiMoyenCasParticulier($NbJoursRecup,$requete,$partenaire);//change la chaine de caractère pour la requete, elle correspond à "DÉCISIONS AUTRES" c'est un cas particulier
								$Nb_demande[$i]=$transmission_repository->StatsNbDecision($NbJoursRecup,$requete,$partenaire);//Par rapport aux autres, l'activité se situe dans les décisions
								break;
						}
	/************Comme j'ai fait les requetes en haut pas la peine de le refaire ce qui va fausser les données*****************/
						if ($i==5 || $i==6){

							$NbDelai_demande[$i]=$transmission_repository->StatsDelaiMoyen($NbJoursRecup,"like '%".$demande[$i]."%'",$partenaire);
							$Nb_demande[$i]=$transmission_repository->StatsNbDemande($NbJoursRecup,"like '%".$demande[$i]."%'",$partenaire);

						}
	/**************************************************************************************/
	/**********************************Boucle selon les décisions ****************************************************/
						for($p=0;$p<count($decision);$p++)
							{
								if($i<3)	// Se baser sur le tableau 'demande', le 3 signifie que l'on a besoin les 3 premiers AME PUMA CMUC pour la décision
								{
									$Decision=$decision[$p].$Demande;
									$Nb_decision[$p]=$transmission_repository->StatsNbDecision($NbJoursRecup,"like '%".$Decision."%'",$partenaire);
								}
							}
					
	//***************************************************************************************************************/
		/*************Ce "if" signifie qu'il lui faut que des requetes décisions pour AME, PUMA et CMUC *********************/
						if($i<3)
						{
							$Tab_decision[$i]=$Nb_decision;	
							$Donnees_decision[$i]=$Tab_decision[$i];
							$Nb_demande[$i]['nb']=$Tab_decision[$i][0]['nb']+$Tab_decision[$i][1]['nb']+$Tab_decision[$i][2]['nb'];
							$NbDelai_demande[$i]=$transmission_repository->StatsDelaiMoyen($NbJoursRecup,"like '%".$demande[$i]."%'",$partenaire);
						}else{$Donnees_decision[$i]=null;};
						
	$Donnees_Par_Ligne[$i]=array('Nb_demande'=>$Nb_demande[$i]['nb'],'Nb_decision'=>$Donnees_decision[$i]);//stats pour le graphs, se baser sur la demande

					$NbTotal=$NbTotal+$Nb_demande[$i]['nb'];/**Nombre demandes total*/
						//dump($NbTotal);
			 
					};
	/************************Fin de la boucle demande *********************/
			 $i=0;
			 foreach($NbDelai_demande as $delai_demande)
			 {
				 
				$liste_delai[$i]=$delai_demande;	//stats pour le graphs, se baser sur la demande
				$i++;
			 }
			 				$PartHorsMAJ=1-($Tab_decision[0][2]['nb']+$Tab_decision[1][2]['nb']+$Tab_decision[2][2]['nb'])/$NbhorsMAJ['NbHorsMAJ']; /**Part complet hors MAJ (AME+CMUC ACS+PUMA)*/

		/**********************Indicateurs SPPR****************************/
			for($i=0;$i<count($indicateur);$i++)	//Boucle de n fois, n ligne tableau
			{	
				for($p=1;$p<count($Liste_Mois)+1;$p++)	//boucle des mois
				{
					$Somme_delai_Indicateur[$p]=$transmission_repository->Somme_delai_dateInstruc_M($NbJoursRecup,$p,$partenaire);//Somme des délais de traitement des dossiers avec une date d'instruction dans le mois et une décision "accord/refus CMUC ou ACS" pour chaque mois
					$NbDossier_dateInstruc_Indicateur[$p]=$transmission_repository->Nb_dossier_dateInstruc_M($NbJoursRecup,$p,$partenaire);//Nombre de dossiers avec une date d'instruction dans le mois et une décision "accord/refus CMUC ou ACS" pour chaque mois
					$NbDossier_dateRecep_Indicateur[$p]=$transmission_repository->Nb_dossier_dateRecep_M($NbJoursRecup,$p,$partenaire);//Nombre de dossiers avec une date de réception dans le mois et une décision "accord/refus CMUC ou ACS" pour chaque mois					
				}
					//Tableaux classés dans l'ordre des mois
				$Liste_Somme_delai_Indicateur[$i]=$Somme_delai_Indicateur;
				$Liste_NbDossier_dateIns_Indicateur[$i]=$NbDossier_dateInstruc_Indicateur;
				$Liste_NbDossier_dateRecep_Indicateur[$i]=$NbDossier_dateRecep_Indicateur;
			};
			//dump($Liste_Somme_delai_Indicateur);
/****************Réponse en JSON en forme de tableau pour avoir d'autres variables que la page détails_stats**************/
				return new JsonResponse(array($this->renderView('@App/Gestionnaire/PSA/Details_stats.html.twig',array(
					'NbDelaiMoinsMois' =>$NbDelaiMoinsMois,
					'NbDelaiNegatif' =>$NbDelaiNegatif,
					'NbDelaiMoyenTotal' =>$NbDelaiMoyenTotal,
					'NbTotal' =>$NbTotal,
					'NbTotalDossiers' =>$NbTotalDossiers,
					'NbhorsMAJ' =>$NbhorsMAJ,
					'PartHorsMAJ' =>$PartHorsMAJ,
					'NbPartenaireDelaiNegatif' =>$NbPartenaireDelaiNegatif,
					'NbDelai_demande' =>$NbDelai_demande,
					'Nb_demande' =>$Nb_demande,
					'Nb_decision' =>$Tab_decision,
					'type_demande'=>$demande,
					"calendrier"=>$Liste_Mois,
					'indicateurs'=>$indicateur,
					'Liste_Somme_delai_Indicateur'=>$Liste_Somme_delai_Indicateur,
					'Liste_NbDossier_dateIns_Indicateur'=>$Liste_NbDossier_dateIns_Indicateur,
					'Liste_NbDossier_dateRecep_Indicateur'=>$Liste_NbDossier_dateRecep_Indicateur,
		)),$Donnees_Par_Ligne,$liste_delai,$NbTotal,$NbDelaiMoyenTotal,$NbDelaiMoinsMois,$NbDelaiNegatif,$NbhorsMAJ,$Nb_demande,$NbTotalDossiers,$PartHorsMAJ));

				  }
  		return new Response("Nonnn ....");  //Si echec ajax	
    }
	
		public function ModifierAjaxAction(Request $request, $id)
    {
		 if($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
			  {
				$request = $this->get('request');
				$id = $request->get('id');
				$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
				$detail = $transmission_repository->getById($id);
			 	//$form = $this->get('form.factory')->create('AppBundle\Form\Form_supportModif',$detail);
			
					  return new JsonResponse($detail);
				  }
  		return new Response("Nonnn ....");       
    	
    }

	    public function LireXMLAjaxAction(Request $request){
			//$pathexcel=$this->container->getParameter("kernel.root_dir");
			$response = file_get_contents("../src/AppBundle/Resources/public/xml/ref_styleExcel.xml");
			
			$TrueRes = new Response($response);
			$TrueRes->headers->set('Content-Type', 'xml');
			return $TrueRes;
		}

}