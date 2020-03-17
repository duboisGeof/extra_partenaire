<?php

namespace AppBundle\Controller\Partenaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\transmission_dossier;
use AppBundle\Entity\User;

class PartenaireDossierController extends Controller
{

    public function indexAction(Request $request)
    {
        $request = $this->get('request');
		$defaultData = array();          
        $form = $this->get('form.factory')->create('AppBundle\Form\Form_support');
		$repository=$this->getDoctrine()->getRepository('AppBundle\Entity\User');
		
		$id_partenaire=$this->getUser('id')->getId();  //10


		$now= new \DateTime('NOW');
		$now->format('Y-m-d');
		$partenaire= $repository->getUserFromId($id_partenaire)[0];

		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');

		$Semaines = $transmission_repository->getNumeroSemaine($id_partenaire);

		foreach($Semaines as $semaine)
		{
			$liste_semaine[]=$semaine['numeroSemaine'];
			
		}
		
		        if ($form->handleRequest($request)->isValid())
			{
				if(array_search($form['Semaine']->getData(),$liste_semaine,true)==false)
				{
					$support=new transmission_dossier();
					$repository=$this->getDoctrine()->getRepository('AppBundle\Entity\User');
					$partenaire= $repository->find($id_partenaire);
					$support->setNomPatro($form['Nom_patronymique']->getData());
					$support->setNumeroSemaine($form['Semaine']->getData());
					$support->setNomMari($form['Nom_marital']->getData());
					$support->setPrenom($form['Prenom']->getData()); 
					$support->setDateTransmission($now); 		
					$support->setObservation($form['Observations']->getData()); 
					$support->setNaissance($form['Naissance']->getData()); 
					$support->setAgent($form['Nom_agent']->getData());
					$support->setNumDossier($form['Numero_dossier']->getData()); 
					$support->setDemande($form['Nature_demande']->getData()); 
					$support->setTel($form['Telephone']->getData());
					$support->setPartenaire($partenaire); 
					$em = $this->getDoctrine()->getManager();
					$em->persist($support);
					$em->flush();

				}
				
			}

        $liste_dossier = $transmission_repository->getTransmission($id_partenaire);
				
        return $this->render('@App/PartenairePage/offrePartenaireSupport.html.twig', array ('transmissions'=>$liste_dossier,'form' => $form->createView(),'partenaire'=>$partenaire));
    }
	
	public function consultPanierAction()
    {
        return $this->render('@App/PartenairePage/PartenaireDossierPanier.html.twig');
    }
	
	 public function envMailAction(Request $request) {
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
                        'AppBundle:PartenairePage:Dossiercorpsmail.html.twig'
                ), 'text/html'
                )
        ;
        $this->get('mailer')->send($message);

        return $this->render('AppBundle:PartenairePage:transmissionPartenaireSupport.html.twig');
    }

	
	public function consultRecapitulatifAction(Request $request)
    {
		$request = $this->get('request');
		$defaultData = array();
		$id_partenaire=$this->getUser('id')->getId();;
		$transmission= new transmission_dossier();
		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
        $liste_dossier = $transmission_repository->getTransmission($id_partenaire);

        return $this->render('@App/PartenairePage/PartenaireDossierRecapitulatif.html.twig', array ('transmissions'=>$liste_dossier));
    }
	
		public function StatistiquesAction()
    {
		$id_partenaire=$this->getUser('id')->getId();;
		$semaine=8;
		$mois=32;
		$an=366;
		$decision=['"%accord%" and not decision like "%refus%"', '"%refus%" and not decision like "%accord%"', '"%demande de pièces complémentaires%" and not decision like "%accord%"','"%attente%"','"%traitée%"'];			
		$delai=["avg(DATEDIFF(dateReception,dateInstruction))", "min(DATEDIFF(dateReception,dateInstruction))", "max(DATEDIFF(dateReception,dateInstruction))"];	
		$transmission= new transmission_dossier();
		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
        $liste_dossier = $transmission_repository->getTransmission($id_partenaire);
		$demande_hebdo=$transmission_repository->StatsDemande($semaine,$id_partenaire);
		$demande_mois=$transmission_repository->StatsDemande($mois,$id_partenaire);
		$demande_an=$transmission_repository->StatsDemande($an,$id_partenaire);
		$NbDossier_hebdo=$transmission_repository->StatsTransmission($semaine,$id_partenaire);
		$NbDossier_mois=$transmission_repository->StatsTransmission($mois,$id_partenaire);
		$NbDossier_an=$transmission_repository->StatsTransmission($an,$id_partenaire);
			for($i=0;$i<count($decision);$i++)
			{
				$Nb_decision_hebdo[$i]=$transmission_repository->StatsDecision($decision[$i],$semaine,$id_partenaire);
				$Nb_decision_mois[$i]=$transmission_repository->StatsDecision($decision[$i],$mois,$id_partenaire);
				$Nb_decision_an[$i]=$transmission_repository->StatsDecision($decision[$i],$an,$id_partenaire);	
				
			}
			for($i=0;$i<count($delai);$i++)
			{	
				
				$Nb_delai_hebdo[$i]=$transmission_repository->StatsDelaiTraitement($delai[$i],$semaine,$id_partenaire);
				$Nb_delai_mois[$i]=$transmission_repository->StatsDelaiTraitement($delai[$i],$mois,$id_partenaire);
				$Nb_delai_an[$i]=$transmission_repository->StatsDelaiTraitement($delai[$i],$an,$id_partenaire);
			}
			/*dump($demande_mois);*/
        return $this->render('@App/PartenairePage/PartenaireDossierStatistiques.html.twig',array(
		"Liste_decision_an"=>$Nb_decision_an,
		"Liste_decision_mois"=>$Nb_decision_mois,
		"Liste_decision_hebdo"=>$Nb_decision_hebdo,
		"NbDossier_an"=>$NbDossier_an,
		"NbDossier_mois"=>$NbDossier_mois,
		"NbDossier_hebdo"=>$NbDossier_hebdo,
		"Nb_delai_an"=>$Nb_delai_an,
		"Nb_delai_mois"=>$Nb_delai_mois,
		"Nb_delai_hebdo"=>$Nb_delai_hebdo,
		"demande_hebdo"=>$demande_hebdo,
		"demande_mois"=>$demande_mois,
		"demande_an"=>$demande_an,
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
	
		public function ModifierAction(Request $request, $id)
    {
		$transmission_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
        $transmission = $transmission_repository->getById($request->get('id'));
		$id_partenaire=$this->getUser('id')->getId();;
		$now= new \DateTime('NOW');
		$now->format('Y-m-d');
        $form = $this->get('form.factory')->create('AppBundle\Form\Form_supportModif', $transmission);
			$repository=$this->getDoctrine()->getRepository('AppBundle\Entity\User');
			$partenaire= $repository->getUserFromId($id_partenaire)[0];
        if ($form->handleRequest($request)->isValid()) {
            $transmissionModifier = new transmission_dossier();
			$repository=$this->getDoctrine()->getRepository('AppBundle\Entity\User');
			$partenaire= $repository->find($id_partenaire);
            $transmissionModifier = $transmission_repository->findOneBy(array('id' => $transmission['id']));
            $transmissionModifier->setNomPatro($form['Nom_patronymique']->getData());
			$transmissionModifier->setNumeroSemaine($form['Semaine']->getData());
            $transmissionModifier->setNomMari($form['Nom_marital']->getData());
            $transmissionModifier->setPrenom($form['Prenom']->getData()); 
			$transmissionModifier->setObservation($form['Observations']->getData()); 
            $transmissionModifier->setNaissance($form['Naissance']->getData());
			$transmissionModifier->setDateTransmission($now);
			$transmissionModifier->setNumDossier($form['Numero_dossier']->getData()); 
			$transmissionModifier->setAgent($form['Nom_agent']->getData()); 
			$transmissionModifier->setDemande($form['Nature_demande']->getData());  
			$transmissionModifier->setTel($form['Telephone']->getData()); 			
			$transmissionModifier->setPartenaire($partenaire); 
			$em = $this->getDoctrine()->getManager();
            $em->persist($transmissionModifier);
            $em->flush();
            
        }
        
        return $this->render('@App/PartenairePage/offrePartenaireModifSupport.html.twig', array(
            'form' => $form->createView(), 
            'transmission'=> $transmission
        ));
    }

	    public function LireXMLAjaxAction(Request $request){

			$response = file_get_contents("http://55.166.4.14/Stephane/extra_partenaire/src/AppBundle/Resources/public/xml/ref_styleExcel.xml");
			
			$TrueRes = new Response($response);
			$TrueRes->headers->set('Content-Type', 'xml');
			return $TrueRes;
		}

}