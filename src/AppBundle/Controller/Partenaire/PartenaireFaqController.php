<?php

namespace AppBundle\Controller\Partenaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \Datetime;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Repository\faq_themeRepository;
use AppBundle\Entity\faq_question;
use AppBundle\Entity\faq_theme;

class PartenaireFaqController extends Controller {

   	public function NouvQuestionAction($id) {
        

		$dataParDefaut='';
		$DonneesRecup='';
		if ($id<>0) //la question vient de la page transmissions de dossier
		{
			//besoin de récupérer les quelques informations concernant le dossier assuré
			$dataParDefaut=8;
			$DossierPartenaireRepository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:transmission_dossier');
		 	$resultDossier = $DossierPartenaireRepository->findBy(array('id' => $id));

			$DonneesRecup="N° de dossier : ".$resultDossier[0]->getNumDossier();
			$DonneesRecup=$DonneesRecup." - Nom assuré : ".$resultDossier[0]->getNomPatro()." ".$resultDossier[0]->getPrenom()." - Date de naissance : ".$resultDossier[0]->getNaissance()->format('d/m/Y')." - Date de réception : ".$resultDossier[0]->getDateReception()->format('d/m/Y');
		}

		$repositoryTheme=$this->getDoctrine()->getManager()->getRepository('AppBundle:faq_theme')->getTheme();
		
		//récupération de la liste de thèmes pour la FAQ
		$recup_Themes=array();
		foreach ($repositoryTheme as $value) 
		{
			$recup_Themes=$recup_Themes+array($value['id'] =>$value['theme']);

		}
			
		$tab=array();
		$tab['defaut']=$dataParDefaut;
		$tab['DonneesRecup']=$DonneesRecup;
		$tab['recup_Themes']=$recup_Themes;

		$form = $this->get('form.factory')->create('AppBundle\Form\Form_partenaire_question',$tab);
	
		 	$request = $this->get('request');

            $form->handleRequest($request);
			//A la validation du formulaire
            if($form->isValid() && $form->isSubmitted()){

				$data = $form->getData();
				
				//insertion dans la table 'faq_question'
				$today = new DateTime();
				$repositoryTheme=$this->getDoctrine()->getRepository('AppBundle\Entity\faq_theme');
				$faqT= $repositoryTheme->find($data['theme']);
				
				$id_partenaire=$this->getUser('id')->getId(); //récupére le partenaire connecté
				
				//pour récuperer le contact
				$repositoryContact=$this->getDoctrine()->getRepository('AppBundle\Entity\User');
				$recupContact= $repositoryContact->getContact($id_partenaire);
								
				$repositoryPartenaire=$this->getDoctrine()->getRepository('AppBundle\Entity\Contact');
				$faqC= $repositoryPartenaire->find($recupContact['contact_id']); 
				
				$repositoryPartenaire=$this->getDoctrine()->getRepository('AppBundle\Entity\User');
				$faqP= $repositoryPartenaire->find($id_partenaire); 
				//$test->getNom($recupContact);

				$faqQ = new faq_question();
				$faqQ->setQuestion($data['question']);
				$faqQ->setFaqtheme($faqT);
				$faqQ->setDansFaq('N');
				$faqQ->setQuestionpartenaire($faqP);
				$faqQ->setDate_question($today);
				$faqQ->setContact($faqC); //A parametrer le compte dali est le contact 4
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($faqQ);
				$em->flush();
				//afficher 
				$request->getSession()
					->getFlashBag()
					->add('success', 'Votre question a bien été prise en compte.');

				return $this->redirectToRoute('envoi_question');
			}

        return $this->render('@App/PartenairePage/FAQ/FaqQuestion.html.twig', array(
                    'form' => $form->createView()));	
		
    }

    public function envMailAction() {
		
		//enregistrement dans la base de données
		//dans la table faq_question : question, numero_theme
		
		//envoi d'un mail
        $message = \Swift_Message::newInstance(null)
            // hop, on défini le sujet du mail
            ->setSubject('FAQ - Nouvelle question partenaire')
            ->setFrom(['noreply@assurance-maladie.fr' => 'Extranet Partenaire'])
            ->setTo([
				'sylvie.vidal@assurance-maladie.fr','geoffrey.dubois@assurance-maladie.fr','ahmed-mouadh.cheraki@assurance-maladie.fr','STEPHANE.AZEROT@assurance-maladie.fr'
                ])
            ->setBody(
                $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                    //'AppBundle:PartenairePage:FAQ:FaqCorpsmail.html.twig'
					'@App/PartenairePage/FAQ/FaqCorpsmail.html.twig'
                ),
                'text/html'
            )
            ;
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('RedigerQuestion', array('id'=>0));
    }
	
	public function RepQuestionAction() {
		
		$ReponsePartenaireRepository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:faq_question');
		$id_partenaire=$this->getUser('id')->getId(); //récupére le partenaire connecté

        $liste_Reponses_questions = $ReponsePartenaireRepository->getReponsePourPartenaire($id_partenaire);
		
		return  $this->render('@App/PartenairePage/FAQ/FaqReponsePourPartenaire.html.twig',array('liste_Reponses_questions'=>$liste_Reponses_questions)); 
	}
	
}