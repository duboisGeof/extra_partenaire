<?php

namespace AppBundle\Controller\Structure;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \Datetime;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Repository\faq_themeRepository;
use AppBundle\Entity\faq_theme;

class StructureController extends Controller {

	public function newAction(Request $request)
    {
        $csrf = $this->get('security.csrf.token_manager');

        $csrfToken = $this->container->has('form.csrf_provider') ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate') : null;

        $em = $this->getDoctrine()->getManager();

        $demandeCompte = new DemandeCompte();
        $form = $this->createForm(get_class(new DemandeCompteType), $demandeCompte);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $typeid = $em->getRepository("AppBundle:TypeCompte")->getIdGestionnaire();
            $repository=$this->getDoctrine()->getRepository('AppBundle\Entity\TypeCompte');
            $type = $repository->find($typeid['id']);
            $demandeCompte->setType($type);
            $gestionnaireData = $this->createGestionnaire($demandeCompte);

            if ($gestionnaireData === false) {
                $this->get('session')->getFlashBag()->add('error', "Impossible de créer un compte et un code d'accès, le gestionnaire ".$demandeCompte->getMail()." existe déjà dans la base.");        
                return $this->redirectToRoute('demande_compte_list', array('max' => 10));
            }

            //méthode interne
            $this->sendValidationmail($gestionnaireData);

            
            $this->get('session')->getFlashBag()->add('success', 'La demande a bien été acceptée. Un mail contenant le code d\'accès à été envoyé à '.$demandeCompte->getMail().'.');

            return $this->redirectToRoute('demande_compte_list', array('max' => 10));
        }

        return $this->render('@App/DemandeCompte/new.html.twig', array(
            "csrf_token" => $csrfToken,
            'form' => $form->createView()
        ));
    }

	public function listeAction() {

        $em = $this->getDoctrine()->getManager();
        $demandes = $em->getRepository("AppBundle:DemandeCompte")->listeDemande();
        $Part = $em->getRepository("AppBundle:User")->listePartenaire();
        $Gest = $em->getRepository("AppBundle:User")->listeGestionnaire();
        $demandesAttente = $em->getRepository("AppBundle:DemandeCompte")->listeDemandeEnAttente();
        $types = $em->getRepository("AppBundle:TypeCompte")->listeType();
        $status = $em->getRepository("AppBundle:DemandeStatus")->listeStatus();
        $structures = $em->getRepository("AppBundle:Structure")->listeStructure();
        $contacts = $em->getRepository("AppBundle:Contact")->listeContact();



        return $this->render('@App/Structure/list.html.twig', array("demandes" => $demandes, "demandesPart" => $Part, "demandesGest" => $Gest, "demandesAttente" => $demandesAttente, "types" => $types, "status" => $status, "structures" => $structures, "contacts" => $contacts));
    }

    
	
}