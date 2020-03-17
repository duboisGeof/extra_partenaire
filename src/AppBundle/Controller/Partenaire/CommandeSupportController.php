<?php

namespace AppBundle\Controller\Partenaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \Date;


class CommandeSupportController extends Controller
{ 
 /*public function commandeImprimePrAction(Request $request){
    $request = $this->get('request');
        $form = $this->get('form.factory')->create('AppBundle\Form\FormCommandeImprimePr');
        if ($form->handleRequest($request)->isValid()) {
            if ($form->getClickedButton() && "commande" === $form->getClickedButton()->getName()){
                 return $this->redirectToRoute('voirCommande');
            }
        }
           return $this->render('@App/PartenairePage/commandeImprimerPr.html.twig',array('form' => $form->createView()));
    }
	*/
 public function indexAction(Request $request){ 
    $request = $this->get('request');
    $form = $this->get('form.factory')->create('AppBundle\Form\FormCommande');
     if ($form->handleRequest($request)->isValid()) {
        if ($form->getClickedButton() && "commande" === $form->getClickedButton()->getName()){
                    return $this->redirectToRoute('panierCommandeSupport');
         }
            /*if($form->get('commande')->isClicked()){
              return $this->redirectToRoute('voirCommande');
                }*/
      }
           return $this->render('@App/PartenairePage/commandeSupports.html.twig',array('form' => $form->createView()));
   }
 
      public function panierAction(Request $request)
       { $request = $this->get('request');
         $djour = date('d-m-Y');
         $form = $this->get('form.factory')->create('AppBundle\Form\FormPanierCommandeSupport');
            if ($form->handleRequest($request)->isValid()) {
               if ($form->getClickedButton() && "valide" === $form->getClickedButton()->getName()){
                 $this->sendMail();
                 return $this->redirectToRoute('recapitulatif');
                 }
            }
                return $this->render('@App/PartenairePage/panierCommandeSupport.html.twig',array('djour'=>$djour,'form' => $form->createView()));
        }
		

      /*public function commandeImprimeEAction(Request $request){  
      	$request = $this->get('request');
        $form = $this->get('form.factory')->create('AppBundle\Form\FormCommandeImprimeE');
           if ($form->handleRequest($request)->isValid()){
               if ($form->getClickedButton() && "commande" === $form->getClickedButton()->getName()){
                return $this->redirectToRoute('voirCommande');
               }
            }
          return $this->render('@App/PartenairePage/commandeImprimerE.html.twig',array('form' => $form->createView())); 
        }
		*/

     /* public function recapitulatifAction(Request $request)
        {  $request = $this->get('request');
          //$form = $this->get('form.factory')->create('AppBundle\Form\FormRecapitulatif.html.twig');
          return $this->render('@App/PartenairePage/recapitulatif.html.twig'); 
        }
		*/

     private function envoiSupport(){
     	
        $mail = \Swift_Message::newInstance()
            ->setSubject('Une nouvelle commande')
            ->setFrom('qchp@hotmail.fr')
            ->setTo ('thiquynhly.chapon@cpam-bobigny.cnamts.fr')
            ->setBody($this->renderView('@App/PartenairePage/recapitulatif.html.twig'),'text/html');
            $this->get('mailer')->send($mail);
       }
  	
       
}
 