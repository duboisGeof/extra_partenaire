<?php

namespace AppBundle\Controller\Gestionnaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\transmission_dossier;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class PSAController extends Controller
{  
    public function PSAAffichageDossiersPartenairesAction(Request $request, $id){
		$request = $this->get('request');
		$defaultData = array(); 
        $repository=$this->getDoctrine()->getRepository('AppBundle\Entity\Structure');
        $contact_repository=$this->getDoctrine()->getRepository('AppBundle\Entity\Contact');
		$id_partenaire=$id;
		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
		$partenaire= $repository->getStructure($id_partenaire);
		$RefOp= $contact_repository->getContactRefOp($id_partenaire);
		$NbJoursRecup=$this->container->getParameter('Transmission_dossier_Recapitulatif_NbMois');
		$form2 = $this->get('form.factory')->create('AppBundle\Form\dossier\Form_EditGestionnaire2');

		if ($form2->handleRequest($request)->isValid()) {
            $transmission_dossier = $transmission_repository->find($form2['Id']->getData());
            $transmission_dossier->setNomPatro($form2['Nom_patronymique']->getData());
			$transmission_dossier->setDateInstruction($form2['DateInstruction']->getData());
            $transmission_dossier->setNomMari($form2['Nom_marital']->getData());
            $transmission_dossier->setPrenom($form2['Prenom']->getData()); 
			$transmission_dossier->setObservation($form2['Observations']->getData()); 
            $transmission_dossier->setNaissance($form2['Naissance']->getData());
			$transmission_dossier->setNumDossier($form2['Numero_dossier']->getData()); 
			$transmission_dossier->setAgent($form2['Nom_agent']->getData()); 
			$transmission_dossier->setDemande($form2['Nature_demande']->getData());  
			$transmission_dossier->setTel($form2['Telephone']->getData()); 	
			//------ Partie Gestionnaire ------//
			$transmission_dossier->setDecision($form2['decision']->getData()); 
			$transmission_dossier->setAgentCPAM($form2['agentCPAM']->getData()); 
            $transmission_dossier->setOrdreArchivage($form2['Ordre_archivage']->getData());
			$transmission_dossier->setObservationPart($form2['observationPart']->getData());
			$transmission_dossier->setObservationInter($form2['observationInter']->getData()); 
			$em = $this->getDoctrine()->getManager();
            $em->persist($transmission_dossier);
            $em->flush();
			
		}
		$liste_dossier = $transmission_repository->getTransmission($id_partenaire,$NbJoursRecup);

        return $this->render('@App/Gestionnaire/PSA/AffichageDossier.html.twig', array (
            'transmissions'=>$liste_dossier, 
			'form2' => $form2->createView(),
			'partenaire' => $partenaire,
			'liste_referents' => $RefOp
        ));
	}
    
	public function ConsultationDossiersAction(Request $request){
		$request = $this->get('request');
		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
        $liste_dossier = $transmission_repository->getTransmissionAll();

		 return $this->render('@App/Gestionnaire/PSA/ConsultationDossiers.html.twig', array (
            'transmissions'=>$liste_dossier
        ));	
	}
		public function ReceptionDossiersAction(Request $request){
		$request = $this->get('request');
		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
        $liste_dossier = $transmission_repository->getNewsTransmission();	//récupère les dossiers nouveaux qui n'ont pas encore de date de reception
		 return $this->render('@App/Gestionnaire/PSA/ReceptionDossiers.html.twig', array (
            'transmissions'=>$liste_dossier
        ));
	}
	
    public function detailModalAjaxAction(Request $request, $id){
        if($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
			  {
				$request = $this->get('request');

				$id = $request->get('id');
				$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
				$detail = $transmission_repository->getById($id);
			
					  return new JsonResponse($detail); //retourne les données de l'id pour remplir
				  }
  		return new Response("Nonnn ....");       
    }
    public function DetailDate_ReceptionModalAction(Request $request, $id){

				$id_partenaire = $id;
				

				$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
				$repository=$this->getDoctrine()->getRepository('AppBundle\Entity\User');
				$detail = $repository->getUserFromId($id);
				 //la function SidateReceptionNULL renvoie le nombre de lignes qu'il y a si dateReception est nul
				$date_instruction=$transmission_repository->SidateReceptionNULL($id_partenaire);

				$count = $date_instruction['nbdate_reception'];
				$i=0;

				if($count > 0){
						//il y a des dates de reception pas encore saisie 
					//$form = $this->get('form.factory')->create('AppBundle\Form\dossier\Form_date_reception',$detail);
					$form = $this->get('form.factory')->create('AppBundle\Form\dossier\Form_date_reception');
					//return $this->render('@App/Gestionnaire/PSA/modalDate_reception.html.twig',array('form'=>$form->createView(),'id'=>$id));
					return new JsonResponse($this->renderView('@App/Gestionnaire/PSA/modalDate_reception.html.twig', array('form'=>$form->createView(),'id'=>$id, 'nouvDossier'=>$count)));
				}else
				{
					$detail=false;
					return new JsonResponse($detail);
				}
		
	}
	public function PSAAffichageDossiersPartenairesEnCoursAction(Request $request, $id){

		$request = $this->get('request');
		$defaultData = array(); 
        $repository=$this->getDoctrine()->getRepository('AppBundle\Entity\Structure');
		$contact_repository=$this->getDoctrine()->getRepository('AppBundle\Entity\Contact');
		$id_partenaire=$id;

		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
		$partenaire= $repository->getStructure($id_partenaire);
		$RefOp= $contact_repository->getContactRefOp($id_partenaire);
		$NbJoursRecup=$this->container->getParameter('Transmission_dossier_Recapitulatif_NbMois');
		$form2 = $this->get('form.factory')->create('AppBundle\Form\dossier\Form_EditGestionnaire2');

		if ($form2->handleRequest($request)->isValid()) {
            $transmission_dossier = $transmission_repository->find($form2['Id']->getData());
            $transmission_dossier->setNomPatro($form2['Nom_patronymique']->getData());
			$transmission_dossier->setDateInstruction($form2['DateInstruction']->getData());
            $transmission_dossier->setNomMari($form2['Nom_marital']->getData());
            $transmission_dossier->setPrenom($form2['Prenom']->getData()); 
			$transmission_dossier->setObservation($form2['Observations']->getData()); 
            $transmission_dossier->setNaissance($form2['Naissance']->getData());
			$transmission_dossier->setNumDossier($form2['Numero_dossier']->getData()); 
			$transmission_dossier->setAgent($form2['Nom_agent']->getData()); 
			$transmission_dossier->setDemande($form2['Nature_demande']->getData());  
			$transmission_dossier->setTel($form2['Telephone']->getData()); 	
			//------ Partie Gestionnaire ------//
			$transmission_dossier->setDecision($form2['decision']->getData()); 
			$transmission_dossier->setAgentCPAM($form2['agentCPAM']->getData()); 
            $transmission_dossier->setOrdreArchivage($form2['Ordre_archivage']->getData());
			$transmission_dossier->setObservationPart($form2['observationPart']->getData()); 
			$em = $this->getDoctrine()->getManager();
            $em->persist($transmission_dossier);
            $em->flush();
			
		}
		$liste_dossier = $transmission_repository->getTransmissionEnCours($id_partenaire,$NbJoursRecup);
        return $this->render('@App/Gestionnaire/PSA/AffichageDossier.html.twig', array (
            'transmissions'=>$liste_dossier, 
			'form2' => $form2->createView(),
			'partenaire' => $partenaire,
			'liste_referents' => $RefOp
        ));
	}
	public function InsertDate_ReceptionModalAction(Request $request){
        if($request->isXmlHttpRequest()) {
			$DateReception = $request->get('input');
			//$Semaine = $request->get('select');
			$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
			//$date_reception=$transmission_repository->updateDateReception($DateReception,$Semaine);
			$date_reception=$transmission_repository->updateDateReception($DateReception);
            return new JsonResponse('OK');

        }
        return new JsonResponse($request->get("parameter"));
        
    }
	public function StatsDossiersAction(Request $request){

		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
		$liste_partenaire = $transmission_repository->getTransmissionAll();
		array_unshift($liste_partenaire,'');
		$partenaire=$liste_partenaire[0];
		$NbJoursRecup=$this->container->getParameter('Transmission_dossier_Recapitulatif_NbMois');
		$NbPartenaireDelaiNegatif=$transmission_repository->StatsNbPartenaireDelaiNegatif($NbJoursRecup,$partenaire);


        return $this->render('@App/Gestionnaire/PSA/GestionnaireDossierStatistiques.html.twig',array(
			'partenaires'=>$liste_partenaire,
			'PartenaireDelaiNegatif'=>$NbPartenaireDelaiNegatif

));
        
    }

    /*public function modifModalAjaxAction(Request $request){
        if($request->isXmlHttpRequest()) {
            $transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
            $id = $request->get('id');
            $transmission_dossier = $transmission_repository->find($id);
            $observation = $request->get('observation');
			$transmission_dossier->setObservation($observation);
			$demande = $request->get('demande');
			$naissance = $request->get('naissance');
			$naissance= new \DateTime($naissance);
			$naissance->format('Y-m-d');
			$nom_patro = $request->get('nom_patro');
			$nom_mari = $request->get('nom_mari');
			$prenom = $request->get('prenom');
			$tel = $request->get('tel');
			$agent = $request->get('agent');
			$numDossier = $request->get('numDossier');
			$agentCPAM = $request->get('agentCPAM');
			$Ordre_archivage = $request->get('Ordre_archivage');
			$dateInstruction = $request->get('dateInstruction');
			$dateInstruction= new \DateTime($dateInstruction);
			$dateInstruction->format('Y-m-d');
			$Delai_traitement = $request->get('Delai_traitement');
			$observationPart = $request->get('observationPart');
			$decision = $request->get('decision');
            $transmission_dossier->setNomPatro($nom_patro);
			$transmission_dossier->setNumDossier($numDossier);
            $transmission_dossier->setNomMari($nom_mari);
			$transmission_dossier->setTel($tel);
            $transmission_dossier->setPrenom($prenom);
            $transmission_dossier->setNaissance($naissance);
   			$transmission_dossier->setDemande($demande);
			$transmission_dossier->setDecision($decision);
			$transmission_dossier->setAgent($agent);
			$transmission_dossier->setDateInstruction($dateInstruction);
            $transmission_dossier->setAgentCPAM($agentCPAM);
            $transmission_dossier->setOrdreArchivage($Ordre_archivage);
   			$transmission_dossier->setObservationPart($observationPart);
            $em = $this->getDoctrine()->getManager();
            $em->persist($transmission_dossier);
            $em->flush();
			$detail = $transmission_repository->getById($id);
			dump($detail);
            return new JsonResponse($detail);

        }
        return new JsonResponse($request->get("parameter"));
        
    }*/
}
