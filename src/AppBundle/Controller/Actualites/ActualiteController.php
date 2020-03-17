<?php

namespace AppBundle\Controller\Actualites;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \DateTime;
use AppBundle\Entity\Actualite;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ActualiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('@App/Actualites/actualite.html.twig');
    }
	
	public function AffichageListeActualitesAction(){
		$em = $this->getDoctrine()->getManager();
		$listeActualite = $em->getRepository("AppBundle:Actualite")->getAll();
        return $this->render('@App/Actualites/HistoriqueActualite.html.twig', array('listeActualite' => $listeActualite));
    }

    public function creationAction(){
        $request = $this->get('request');
        $form = $this->get('form.factory')->create('AppBundle\Form\FormActualites');       
        $dali = $this->getUser();
		
        if ($form->handleRequest($request)->isValid()) {       
            if ($form->getClickedButton() && 'enregistrer' === $form->getClickedButton()->getName()) {
            	
         		$actualite_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Actualite');
                $nextIdActualite=$actualite_repository->getNextId();
                
               	$date = date('Y-m-d H:i:s');
                $date = new DateTime($date);
                $actualite = new Actualite();
                $actualite->setTitle(utf8_decode($form['title']->getData()));
                $actualite->setContent(utf8_decode($form['content']->getData()));
                $actualite->setDateCreate($date);
                if ($form['url_img']->getData() != "") {
					
					$extension = $form['url_img']->getData()->guessExtension();
					$fichier_name="actualite_".$nextIdActualite['AUTO_INCREMENT'].".".$extension;
					
					$chemin_piece="files/Actualite";
					$form['url_img']->getData()->move($chemin_piece, $fichier_name);
					$path=$request->server->get('HTTP_ORIGIN').$this->getRequest()->getBasePath()."/".$chemin_piece."/".$fichier_name;
				   	$actualite->setUrlImg($path);
					
				}
                //$actualite->setUser($this->getUser());
                $em = $this->getDoctrine()->getManager();
               	$em->persist($actualite);
                $em->flush();

                $request->getSession()->getFlashBag()->add('success', "Actualites ajoutée");
                return $this->redirect($request->getUri());
            }
            
        }
         
        return $this->render('@App/Actualites/AffichageForm.html.twig', array (
            'form' => $form->createView(),
        ));
    }
}
