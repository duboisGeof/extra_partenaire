<?php

namespace AppBundle\Controller\Gestionnaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use \Datetime;
use AppBundle\Entity\faq_question;
use AppBundle\Entity\faq_theme;

class GestionFaqController extends Controller
{  
    public function indexAction(){
		
		$QuestionPartenaireRepository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:faq_question');
        $liste_Questions_Sans_Reponse = $QuestionPartenaireRepository->getQuestions();
		/*$user=$this->getUser('');

		$userName=$user->getStructure();
		
		$structureName=$userName
		dump($userName);
		die();	*/			
		return  $this->render('@App/Gestionnaire/FAQ/ConsultFaqQuestion.html.twig',array('Liste_Question_Sans_Reponse'=>$liste_Questions_Sans_Reponse));  
	}
	
	 public function ReponseQuestionAction($qid){
		 
		 //rappel des informations
		 $QuestionPartenaireRepository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:faq_question');
		 $result = $QuestionPartenaireRepository->findBy(array('id' => $qid));
		 $recup_contact=$result[0]->getcontact()->getnom().' '.$result[0]->getcontact()->getprenom().' Tel : '.$result[0]->getcontact()->gettel();
		 
		 $question=$result[0]->getQuestion();
		 $datequestion=$result[0]->getDate_question()->format('d/m/Y');
		 $theme=$result[0]->getFaqtheme();
		 
		 $QuestionPartenaireRepository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:faq_theme');
		 $result = $QuestionPartenaireRepository->findBy(array('id' => $theme));
		 $theme=$result[0]->getTheme(); 
		 
		 $tableauQuestion=array('qid'=>$qid, 'question'=>$question, 'dateQuestion'=>$datequestion, 'themeQuestion'=>$theme, 'contact'=>$recup_contact);
		 
		 //formulaire		
        $defaultData = array();
        $form = $this->createFormBuilder($defaultData)
			
			->add('reponse1', 'Symfony\Component\Form\Extension\Core\Type\TextareaType',array(
				'label' => 'Rédiger ici votre réponse pour le partenaire : ',

				'attr' => array('rows' => '4', 'cols' => '100'),
				))
			->add('case_cocher_faq', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', 
				  array('label' => 'Mettre la question/réponse dans la FAQ', 'required'=>false))
			->add('question_reformule', 'Symfony\Component\Form\Extension\Core\Type\TextareaType',array(
				'label' => 'Rédiger ici votre question reformulée pour la FAQ : ', 'required'=>false,

				'attr' => array('rows' => '4', 'cols' => '100', 'style'=>'display:none;'),
				))

			->add('reponse_reformule', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array(
				'label' => 'Rédiger ici votre réponse reformulée pour la FAQ : ', 'required'=>false,

				'attr' => array('rows' => '4', 'cols' => '100', 'style'=>'display:none'),
				))
			->getForm();
		 
		 	$request = $this->get('request');

            $form->handleRequest($request);

            if($form->isValid() && $form->isSubmitted()){			
				
				$data = $form->getData();

				//faire un update dans la table faq_question
				$em = $this->getDoctrine()->getManager();
				$repositoryQuestion = $em->getRepository('AppBundle\Entity\faq_question');
				$faqReponse= $repositoryQuestion->find($qid);
				$today = new DateTime();

				$faqReponse->setReponse($data['reponse1']);
				//dans FAQ coché
				if ($data['case_cocher_faq']=='true') {
					$faqReponse->setDansFaq('O');
					$faqReponse->setDate_faq($today);
				}
				$faqReponse->setDate_reponse($today);
				
				if ($data['question_reformule'] <> 'null') {
					$faqReponse->setQuestionReformule($data['question_reformule']);
				}
				if ($data['reponse_reformule'] <> 'null') {
					$faqReponse->setReponseReformule($data['reponse_reformule']);
				}
				$em->persist($faqReponse);
				$em->flush();
				
				//envoi mail au partenaire
				$message = \Swift_Message::newInstance(null)
				// hop, on défini le sujet du mail
				->setSubject('FAQ - Réponse à votre question')
				->setFrom(['noreply@assurance-maladie.fr' => 'Extranet Partenaire'])
				->setTo([
					'sylvie.vidal@assurance-maladie.fr','geoffrey.dubois@assurance-maladie.fr','ahmed-mouadh.cheraki@assurance-maladie.fr','STEPHANE.AZEROT@assurance-maladie.fr'
					])
				->setBody(
					$this->renderView(
						// app/Resources/views/Emails/registration.html.twig
						'AppBundle:Gestionnaire/FAQ:FaqCorpsmail.html.twig'
					),
					'text/html'
				)
				;
				
            	$this->get('mailer')->send($message);
				//FIN : envoi mail au partenaire
				
				
				return $this->redirectToRoute('FAQConsultQuestion');
			}
		 		 
		 return  $this->render('@App/Gestionnaire/FAQ/RepondreQuestionFAQ.html.twig', array(
                    'form' => $form->createView(), 'TableauQuestion' => $tableauQuestion));
		 
	 }
	public function NouvQuestionReponseAction(){
	
		$repositoryTheme=$this->getDoctrine()->getManager()->getRepository('AppBundle:faq_theme')->getTheme();
		
		$recup_Themes=array();
		foreach ($repositoryTheme as $value) 
		{
			$recup_Themes=$recup_Themes+array($value['id'] =>$value['theme']);
		}
				
			
		$form = $this->get('form.factory')->create('AppBundle\Form\Form_FAQ_Gestionnaire_QR',$recup_Themes);
			
		
		$request = $this->get('request');

		$form->handleRequest($request);

		if($form->isValid() && $form->isSubmitted()){

			$data = $form->getData();
			$today = new DateTime();
			$repositoryTheme=$this->getDoctrine()->getRepository('AppBundle\Entity\faq_theme');
			$faqT= $repositoryTheme->find($data['theme']);
						
			$repositoryPartenaire=$this->getDoctrine()->getRepository('AppBundle\Entity\User');
			$faqP= $repositoryPartenaire->find(14); //question qui ne vient pas d'un partenaire à revoir
			$repositoryContact=$this->getDoctrine()->getRepository('AppBundle\Entity\Contact');
			$faqC= $repositoryContact->find(3); //question qui ne vient pas d'un partenaire à revoir
			
			$faqQ = new faq_question();
			$faqQ->setQuestion($data['question_FAQ']);
			$faqQ->setReponse($data['reponse_FAQ']);
			$faqQ->setDansFaq('O');
			$faqQ->setQuestionReformule($data['question_FAQ']);
			$faqQ->setReponseReformule($data['reponse_FAQ']);
			$faqQ->setFaqtheme($faqT);
			$faqQ->setDate_question($today);
			$faqQ->setDate_reponse($today);
			$faqQ->setDate_faq($today);		
			$faqQ->setQuestionpartenaire($faqP);
			$faqQ->setContact($faqC);

			$em = $this->getDoctrine()->getEntityManager();
			$em->persist($faqQ);
			$em->flush();
			$request->getSession()->getFlashBag()->add('success', 'Votre question/réponse a bien été mise dans la FAQ.');
				//return $this->redirectToRoute('envoi_question');
		}
		
		return  $this->render('@App/Gestionnaire/FAQ/QuestionReponseFAQ.html.twig', array(
                    'form' => $form->createView()));
		
	}
	
	public function Suppression_FAQAction($id) {
		
		$repositoryFAQ_Question = $this->getDoctrine()->getManager()->getRepository('AppBundle:faq_question');
		$repositoryRecup = $repositoryFAQ_Question->find($id);
		
		$em = $this->getDoctrine()->getManager();
		$em->remove($repositoryRecup);
        $em->flush();
		
        return $this->redirectToRoute('FAQGestionnaireGestion');
		
	}
	
	public function Tableau_consult_FAQAction() {
		
		$ThemeRepository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:faq_theme');
        $liste_Theme = $ThemeRepository->getTheme();
		
		$TableauFAQRepository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:faq_question');
        $liste_FAQ = $TableauFAQRepository->getTouteLaFAQ();
				
		return  $this->render('@App/Gestionnaire/FAQ/FaqGestion.html.twig',array('liste_FAQ'=>$liste_FAQ,'liste_Theme'=>$liste_Theme)); 
	}
	
	public function Modifier_FAQAction($id) {
		//recuperer l(Id)
		$repositoryFAQ_Question = $this->getDoctrine()->getManager()->getRepository('AppBundle:faq_question');
		$repositoryRecup = $repositoryFAQ_Question->findBy(array('id' =>$id));

		foreach ($repositoryRecup as $value)
		{
			$recup_questionReformule=$value->getQuestionReformule();
			$recup_reponseReformule=$value->getReponseReformule();
			$recup_idTheme=$value->getFaqtheme()->getId();
		}
		$repositoryFAQ_Theme = $this->getDoctrine()->getManager()->getRepository('AppBundle:faq_theme');
		$repositoryThemeRecup = $repositoryFAQ_Theme->findBy(array('id' =>$recup_idTheme));
		
		$libelle_theme=$repositoryThemeRecup[0]->getTheme();
		
		$tab=array();
		$tab['recup_questionReformule']=$recup_questionReformule;
		$tab['recup_reponseReformule']=$recup_reponseReformule;		

		$form = $this->get('form.factory')->create('AppBundle\Form\Form_FAQ_Gestionnaire_modif_question',$tab);
		
		
			$request = $this->get('request');

			$form->handleRequest($request);

			if($form->isValid() && $form->isSubmitted()){
				$today = new DateTime();
				$data = $form->getData();
				$em = $this->getDoctrine()->getManager();
				$repository = $em->getRepository('AppBundle:faq_question');
				$tab = $repository->findOneBy(array('id'=>$id));
				$tab->setQuestionReformule($data['question_FAQ']);
				$tab->setReponseReformule($data['reponse_FAQ']);
				$tab->setDate_faq($today);
                $em->persist($tab);
				$em->flush();
				
				return $this->redirectToRoute('FAQGestionnaireGestion');
			}
			
		
		return  $this->render('@App/Gestionnaire/FAQ/FAQGestionModif.html.twig', array(
                    'form' => $form->createView(),'Theme'=>$libelle_theme));
		
	}
}