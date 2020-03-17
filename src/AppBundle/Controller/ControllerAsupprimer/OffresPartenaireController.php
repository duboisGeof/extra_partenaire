<?php

namespace AppBundle\Controller\Gestionnaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\offre;
use \DateTime;

class OffresPartenaireController extends Controller
{  
    public function ajoutAction(Request $request){
        
        $request = $this->get('request');
        $form = $this->get('form.factory')->create('AppBundle\Form\FormCreationOffre');
        if ($form->handleRequest($request)->isValid()) {
            $date = date('Y-m-d H:i:s');
            $date = new DateTime($date);
            $offre = new offre();
            $offre->setNomOffre($form['titre']->getData());
            $offre->setDescription($form['designation']->getData());
            $offre->setDateCreation($date);
            $offre->setDateFin($form['date_fin']->getData());
            $offre->setEffacer(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('success', "Offre ajoutée");
            
        }
        return $this->render('@App/Gestionnaire/Offres/CreationOffres.html.twig',array(
            'form' => $form->createView(),
            'title' => 'Création d\'une nouvelle offre partenaire'
        ));
	}
    
    public function listeAction(Request $request){
        
        $offre_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:offre');
        $liste_offre = $offre_repository->getListe();
        
        return $this->render('@App/Gestionnaire/Offres/ListeOffres.html.twig', array('offres'=>$liste_offre));
    }
    
    public function modifierAction(Request $request, $id){
        
        $offre_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:offre');
        $offre = $offre_repository->getById($request->get('id'));
        $form = $this->get('form.factory')->create('AppBundle\Form\FormModifOffre', $offre);
        
        if ($form->handleRequest($request)->isValid()) {
            $date = date('Y-m-d H:i:s');
            $date = new DateTime($date);
            $offreModifier = new offre();
            $offreModifier = $offre_repository->findOneBy(array('id' => $offre['id']));
            $offreModifier->setNomOffre($form['titre']->getData());
            $offreModifier->setDescription($form['designation']->getData());
            $offreModifier->setDateCreation($date);
            $offreModifier->setDateFin($form['date_fin']->getData());
			$offreModifier->setEffacer(0);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($offreModifier);
            $em->flush();
            
        }
        
        return $this->render('@App/Gestionnaire/Offres/CreationOffres.html.twig', array(
            'form' => $form->createView(), 
            'offre'=> $offre,
            'title' => "Modifier une offre partenaire"
        ));
    }
    
    public function supprimerAction($id){
        
            $offre_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:offre');
            /*$em = $this->getDoctrine()->getManager();
            $obj = $em->getRepository('AppBundle:offre')->find($id);*/

            $offre_repository->updateByEffacer($id,1);

            $liste_offre = $offre_repository->getListe();

            return $this->render('@App/Gestionnaire/Offres/ListeOffres.html.twig', array('offres'=>$liste_offre));
       
    }

}
