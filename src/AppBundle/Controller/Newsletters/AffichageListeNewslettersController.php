<?php

namespace AppBundle\Controller\Newsletters;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\newsletter;
use \DateTime;
use Spipu\Html2Pdf\HTML2PDF;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;



class AffichageListeNewslettersController extends Controller
{
        
    public function creationAction(){
        $request = $this->get('request');
        $form = $this->get('form.factory')->create('AppBundle\Form\FormNewsletter');       
        $dali = $this->getUser();
		
        if ($form->handleRequest($request)->isValid()) {
            /**if ($form->getClickedButton() && 'pdf' === $form->getClickedButton()->getName()) {
                    try
                    {
                        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
                        ob_start();
                        $content = ob_get_clean();
                        $html2pdf->setModeDebug();
                        $html2pdf->setDefaultFont('Arial');
                        $html2pdf->writeHTML($content, $form['content']->getData());
                        $html2pdf->output('exemple00.pdf');
                    } catch(HTML2PDF_exception $e) {
                        echo $e;
                        exit;
                    }

                //return $html2pdf->generatePdf($template, 'test');
            }**/
       
            if ($form->getClickedButton() && 'enregistrer' === $form->getClickedButton()->getName()) {
                
                
                $date = date('Y-m-d H:i:s');
                $date = new DateTime($date);
                $id_user =  $dali->getId();
                $newsletter = new newsletter();
                $lol = $form['content']->getData();
                $newsletter->setTitre($form['titre']->getData());
                $newsletter->setContent($form['content']->getData());
                $newsletter->setDateCreation($date);
                $newsletter->setDateCreation($date);
                $newsletter->setUser($this->getUser());
                $em = $this->getDoctrine()->getManager();
                $em->persist($newsletter);
                $em->flush();
                
                $request->getSession()->getFlashBag()->add('success', "Offre ajoutée");
            }
            
        }
         
        return $this->render('@App/Newsletters/AffichageForm.html.twig', array (
            'form' => $form->createView(),
        ));
    }
	
	public function modifierAction(Request $request, $id){
		$id = $request->get('id');
		$newsletter_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:newsletter');
		$newsletter = $newsletter_repository->find($id);
		
		$form = $this->get('form.factory')->create('AppBundle\Form\FormNewsletter', $newsletter);
		
		 if ($form->handleRequest($request)->isValid()) {
		 	$newsletterModifier = $newsletter_repository->findOneBy(array('id'=>$id));
            $newsletterModifier->setTitre($form['titre']->getData());
            $newsletterModifier->setContent($form['content']->getData());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($newsletterModifier);
            $em->flush();
            
        }
		
		return $this->render('@App/Newsletters/AffichageForm.html.twig', array (
            'form' => $form->createView(),
        ));
		
	}
    
    public function listeAction(){
        $newsletter_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:newsletter');
        $liste_newsletter = $newsletter_repository->getListe();
		
        return $this->render('@App/Newsletters/liste.html.twig', array (
            'listes' => $liste_newsletter,
        ));
    }
    
    public function apercuNewsletterModalAjaxAction(Request $request){
        $form = $this->get('form.factory')->create('AppBundle\Form\FormNewsletter');
        $titre = $request->get("titre");
        $content = $request->get("content");
        return $this->render('@App/Newsletters/modal.html.twig', array(
            'form' => $form->createView(),
            'titre' => $titre,
            'content' => $content,
        ));
    }
    
    public function EnvoyerMailTestAjaxAction(Request $request){
        $form = $this->get('form.factory')->create('AppBundle\Form\FormNewsletter');
        $titre = $request->get("titre");
        $content = $request->get("content");
        $transport = \Swift_MailTransport::newInstance();
        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance();
        $header = $message->embed(\Swift_Image::fromPath('bundles/app/img/header2.png'));
        $footer = $message->embed(\Swift_Image::fromPath('bundles/app/img/footer.png'));
        $message->setSubject('Nouvelle newsletter')
        ->setFrom(['geoffrey.dubois@assurance-maladie.fr' => 'Extranet Partenaire'])
        ->setTo([
            'geoffrey.dubois@assurance-maladie.fr',
            //'ahmed-mouadh.cheraki@assurance-maladie.fr',
            //'sylvie.vidal@assurance-maladie.fr',
            //'STEPHANE.AZEROT@assurance-maladie.fr',
        ])
        ->setBody(
            $this->renderView(
            'AppBundle:Newsletters:CorpMail.html.twig',
                array(
                    'content' => $content,
                    'header' => $header,
                    'footer' => $footer,
                )
            ),
            'text/html'
        );
        $this->get('mailer')->send($message);
        return new JsonResponse($request->get("content"));
    }
	
	public function apercuNewsletterIdModalAjaxAction(Request $request, $id){
		$id = $request->get("id");
        $newsletter_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:newsletter');
		$newsletter = $newsletter_repository->find($id);
        return $this->render('@App/Newsletters/modal.html.twig', array(
            'titre' => $newsletter->getTitre(),
            'content' => $newsletter->getContent(),
        ));
    }
	
	public function suppressionNewsletterAjaxAction(Request $request, $id){
		$newsletter_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:newsletter');
		$em = $this->getDoctrine()->getEntityManager();
		$newsletter = $newsletter_repository->find($id);
		$em->remove($newsletter);
		$em->flush();
		$test = new Response($id);
		return $test;
    }
	
	public function listeAbonneAction(Request $request){
	 	$user_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:User');
		$liste_abonnes = $user_repository->getAllAbonne();
		
		return $this->render('@App/Newsletters/envoi.html.twig', array(
            'listes' => $liste_abonnes,
        ));
	}
	
	public function EnvoyerMailNewsletterAjaxAction(Request $request){
		$newsletter_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:newsletter');
		$derniereNewsletter = $newsletter_repository->getLastNewsletter();
		
		$user_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:User');
		$liste_abonnes = $user_repository->getAllAbonne();
        dump($liste_abonnes);
		
		//$email_abonnes = rtrim($email_abonnes,",");
		$to = array('stephane.azerot@assurance-maladie.fr', 'pascal.balissat@assurance-maladie.fr');
		
		
		$content = $derniereNewsletter['content'];
        $transport = \Swift_MailTransport::newInstance();
        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance();
        $header = $message->embed(\Swift_Image::fromPath('bundles/app/img/header2.png'));
        $footer = $message->embed(\Swift_Image::fromPath('bundles/app/img/footer.png'));
        $message->setSubject('Nouvelle newsletter')
        ->setFrom(['geoffrey.dubois@assurance-maladie.fr' => 'Extranet Partenaire'])
		->setBody(
            $this->renderView(
            'AppBundle:Newsletters:CorpMail.html.twig',
                array(
                    'content' => $content,
                    'header' => $header,
                    'footer' => $footer,
                )
            ),
            'text/html'
        );
		foreach($liste_abonnes as $abonnes){
			$message->setTo($abonnes['email']);
			$this->get('mailer')->send($message);
			dump($abonnes['email']);
		}
        
        return new JsonResponse($request->get("content"));
	}
	
	public function partenaireAction(Request $request){
		$user = $this->getUser();
		$id = $user->getcontact()->getid();
		$isNewsletter = $user->getcontact()->getnewsletter();
		dump($id);
		return $this->render('@App/Newsletters/abonnement.html.twig',array(
			'id' => $id,
			'isNewsletter' => $isNewsletter,
		));
	}
	
	public function partenaireAjaxAction(Request $request){
		$id = $request->request->get('id');
		$isNewsletter = $request->request->get('isNewsletter');
		$contact_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Contact');
		$contact = $contact_repository->find($id);	
	
		if($isNewsletter == 'abonnement'){
			$contact->setNewsletter(true);
		}
		else if($isNewsletter == 'desabonnement'){
			$contact->setNewsletter(false);
		}
		
	 	$em = $this->getDoctrine()->getManager();
		$em->persist($contact);
		$em->flush();
		
		return new JsonResponse($request->get('parameters'));
	}
}
