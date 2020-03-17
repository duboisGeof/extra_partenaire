<?php

namespace AppBundle\Controller\EspaceGDP;

use AppBundle\Form\DemandeCompteType as DemandeCompteType;
use AppBundle\Entity\DemandeCompte;
use AppBundle\Entity\DemandeStatus;
use AppBundle\Entity\User;
use AppBundle\Entity\Structure;
use AppBundle\Entity\Contact;
use AppBundle\Entity\TypeContact;
use AppBundle\Entity\TypeStructure;
use AppBundle\Entity\TypeCompte as TypeCompte;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DemandeCompteController extends Controller
{   

    const MAIL_SENDER = "noreply@assurance-maladie.fr";
    //var MAIL_RECIPIENT = array("ahmed-mouadh.cheraki@assurance-maladie.com", "geoffrey.dubois@assurance-maladie.com", "sylvie.vidal@assurance-maladie.com", "stephane.azerot@assurance-maladie.com");

    public function sendNotificationMail(DemandeCompte $demande) {
        $mail = \Swift_Message::newInstance()
			      ->setSubject("Demande d'acces extranet CPAM")
			      ->setFrom(self::MAIL_SENDER)
			      ->setTo([
                  'geoffrey.dubois@assurance-maladie.fr',
                  //'ahmed-mouadh.cheraki@assurance-maladie.fr',
                  //'sylvie.vidal@assurance-maladie.fr',
                  //'STEPHANE.AZEROT@assurance-maladie.fr'
                  ])
			      ->setBody(
				  $this->renderView(
				      '@App/EspaceGDP/Mail/notification.html.twig', 
				      array("demande" => $demande)
				  ),
				  "text/html"
			      );
        $this->get('mailer')->send($mail);
    }

    public function newAction(Request $request)
    {
        $csrf = $this->get('security.csrf.token_manager');

        $csrfToken = $this->container->has('form.csrf_provider') ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate') : null;

        $em = $this->getDoctrine()->getManager();

        $demandeCompte = new DemandeCompte();
        $type2 = new TypeStructure();
        $form = $this->createForm(get_class(new DemandeCompteType), $demandeCompte);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $typeid = $em->getRepository("AppBundle:TypeCompte")->getIdGestionnaire();
            $repository=$this->getDoctrine()->getRepository('AppBundle\Entity\TypeCompte');
            $repositoryComtpe=$this->getDoctrine()->getRepository('AppBundle\Entity\TypeStructure');

            $type2= $repositoryComtpe->find(4);
            $type = $repository->find($typeid['id']);

            $demandeCompte->setType($type2);
            $gestionnaireData = $this->createGestionnaire($demandeCompte);

            if ($gestionnaireData === false) {
                $this->get('session')->getFlashBag()->add('error', "Impossible de créer un compte et un code d'accès, le gestionnaire ".$demandeCompte->getMail()." existe déjà dans la base.");        
                return $this->redirectToRoute('demande_compte_list', array('max' => 10));
            }

            //méthode interne
            $this->sendValidationmail($gestionnaireData);

            
            $this->get('session')->getFlashBag()->add('success', 'La demande a bien été acceptée. Un mail contenant le code d\'accès a été envoyé à '.$demandeCompte->getMail().'.');

            return $this->redirectToRoute('demande_compte_list', array('max' => 10));
        }

        return $this->render('@App/DemandeCompte/new.html.twig', array(
            "csrf_token" => $csrfToken,
            'form' => $form->createView()
        ));
    }
    
    public function confirmAction() {
        return $this->render('@App/DemandeCompte/confirm.html.twig') ;
    }


    public function listAction() {

        $em = $this->getDoctrine()->getManager();

        $demandes = $em->getRepository("AppBundle:DemandeCompte")->listeDemande();
        $Part = $em->getRepository("AppBundle:User")->listePartenaire();
        $Gest = $em->getRepository("AppBundle:User")->listeGestionnaire();
        $demandesAttente = $em->getRepository("AppBundle:DemandeCompte")->listeDemandeEnAttente();
        $types = $em->getRepository("AppBundle:TypeCompte")->listeType();
        $typesStructure = $em->getRepository("AppBundle:TypeStructure")->listeType();
        $status = $em->getRepository("AppBundle:DemandeStatus")->listeStatus();
        $structures = $em->getRepository("AppBundle:Structure")->listeStructure();
        $contacts = $em->getRepository("AppBundle:Contact")->listeContact();



        return $this->render('@App/EspaceGDP/DemandeCompte/list.html.twig', array("demandes" => $demandes, "demandesPart" => $Part, "demandesGest" => $Gest, "demandesAttente" => $demandesAttente, "types" => $types, "status" => $status, "structures" => $structures, "contacts" => $contacts, "typesStructure" => $typesStructure));
    }

    //appel modal
    public function showDemandeAction($id) {

        $em = $this->getDoctrine()->getManager();

        $demande = $em->getRepository("AppBundle:DemandeCompte")->getDemandeFromId($id);
        $types = $em->getRepository("AppBundle:TypeCompte")->listeType();
        $typesStructure = $em->getRepository("AppBundle:TypeStructure")->listeType();
        $status = $em->getRepository("AppBundle:DemandeStatus")->listeStatus();
        $structures = $em->getRepository("AppBundle:Structure")->listeStructure();
        $contacts = $em->getRepository("AppBundle:Contact")->listeContact();
        return $this->render('@App/EspaceGDP/DemandeCompte/show.html.twig', array("demande" => $demande[0], "types" => $types, "status" => $status, "structures" => $structures, "contacts" => $contacts, "typesStructure" => $typesStructure));
    }
	
	
    //appel modal
    public function showUserAction($id) {

        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository("AppBundle:User")->getUserFromId($id);
        $types = $em->getRepository("AppBundle:TypeCompte")->listeType();
        $structures = $em->getRepository("AppBundle:Structure")->listeStructure();
        $contacts = $em->getRepository("AppBundle:Contact")->listeContact();
        return $this->render('@App/EspaceGDP/DemandeCompte/showUser.html.twig', array("user" => $user[0], "types" => $types, "structures" => $structures, "contacts" => $contacts));
    }

    public function showAction($id) {

        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository("AppBundle:User")->getUserFromId($id);
        $types = $em->getRepository("AppBundle:TypeCompte")->listeType();
        $structures = $em->getRepository("AppBundle:Structure")->listeStructure();
        return $this->render('@App/EspaceGDP/DemandeCompte/showUser.html.twig', array("user" => $user[0], "types" => $types, "structures" => $structures));
    }

    public function refuseAction(DemandeCompte $demande)
    {
        $em = $this->getDoctrine()->getManager();

        $demande->setStatus($em->getRepository('AppBundle:DemandeStatus')->findOneById(DemandeCompte::STATUS_REFUSEE));

        $em->persist($demande);
        $em->flush();

        $this->deleteDemande($demande);

        $this->get('session')->getFlashBag()->add('info', 'La demande a bien été refusée');

        return $this->redirectToRoute('demande_compte_list', array('max' => 10));
    }

    public function createUser(DemandeCompte $demande)
    {

        //Ajouter Structure en temps que parametres de la fonction
        $userManager = $this->get('fos_user.user_manager');
        
        $email_exist = $userManager->findUserByEmail($demande->getMail());
        
        if($email_exist)return false;
        
        $contact = new Contact();
        $responsable = new Contact();
        $type2 = new TypeCompte();

        $repository=$this->getDoctrine()->getRepository('AppBundle\Entity\TypeContact');
        $repositoryComtpe=$this->getDoctrine()->getRepository('AppBundle\Entity\TypeCompte');
        $type= $repository->find(1);
        $type2= $repositoryComtpe->find($demande->getType()->getId());

        $contact->setType($type);
        $contact->setNom($demande->getNom());
        $contact->setPrenom($demande->getPrenom());
        $contact->setTel($demande->getTel());
        //$contact->setNewsletter($demande->getNewsletter());
        $contact->setRefOp(false);

        $type= $repository->find(2);

        $responsable->setType($type);
        $responsable->setNom($demande->getNomResponsable());
        $responsable->setPrenom($demande->getPrenomResponsable());
        $responsable->setTel($demande->getTelResponsable());
        //$responsable->setNewsletter($demande->getNewsletter());
        $responsable->setRefOp(false);

        //Remplacer dynamiquement ( dans gestionnaire aussi )
        $repository=$this->getDoctrine()->getRepository('AppBundle\Entity\Structure');
        $structure= $repository->find(1);

        $em = $this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->persist($responsable);
        $em->flush();

        
        //Utilisateur de la demande
        $user = $userManager->createUser();
        $user->setUsername($demande->getMail());
        $user->setEmail($demande->getMail());
        $user->setEmailCanonical($demande->getMail());
        $user->setLocked(0);
        $user->setEnabled(1);

        $user->setType($type2);
        $user->setContact($contact);
        $user->setStructure($structure);
        $user->addRole("ROLE_PARTENAIRE");
        $tokenGenerator = $this->get('fos_user.util.token_generator');
        $password = substr($tokenGenerator->generateToken(), 0, 8);
        $user->setPlainPassword($password);
        $userManager->updateUser($user);


        //Responsable de la demande
        $userResp = $userManager->createUser();
        $userResp->setUsername($demande->getMailResponsable());
        $userResp->setEmail($demande->getMailResponsable());
        $userResp->setEmailCanonical($demande->getMailResponsable());
        $userResp->setLocked(0);
        $userResp->setEnabled(1);
        $userResp->setType($type2);
        $userResp->setContact($responsable);
        $userResp->setStructure($structure);
        $userResp->addRole("ROLE_PARTENAIRE");
        $tokenGenerator = $this->get('fos_user.util.token_generator');
        $passwordResp = substr($tokenGenerator->generateToken(), 0, 8);
        $userResp->setPlainPassword($passwordResp);

        //$userResp->setStructure($responsable);
        //$userResp->setMailDiffusion($demande->getMailDiffusion());
        //$userResp->setNewsletter($demande->getNewsletter());
        /*$user->setNomStructure($demande->getNomStructure());
        $user->setNomResponsable($demande->getNomResponsable());
        $user->setPrenomResponsable($demande->getPrenomResponsable());
        $user->setTelResponsable($demande->getTelResponsable());
        $user->setMailResponsable($demande->getMailResponsable());

        $user->setNom($demande->getNom());
        $user->setPrenom($demande->getPrenom());
        $user->setTel($demande->getTel());
        $user->setMail($demande->getMail());*/
        $userManager->updateUser($userResp);


        //A laisser en bas de fonction
        //$this->deleteDemande($demande);

        return array("mail" => $user->getEmail(), "mailResponsable" => $userResp->getEmail(),"login" => $user->getEmail(), "password" => $password, "passwordResp" => $passwordResp);
                 
    }

    public function deleteDemande(DemandeCompte $demande)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($demande);
        $em->flush();
    }

    public function createGestionnaire(DemandeCompte $demande)
    {
        $userManager = $this->get('fos_user.user_manager');

        $email_exist = $userManager->findUserByEmail($demande->getMail());

        if($email_exist)return false;

        $contact = new Contact();

        $repository=$this->getDoctrine()->getRepository('AppBundle\Entity\TypeContact');
        $type= $repository->find(1);

        $repositoryComtpe=$this->getDoctrine()->getRepository('AppBundle\Entity\TypeCompte');
        $type2= $repositoryComtpe->find($demande->getType()->getId());

        $contact->setType($type);
        $contact->setNom($demande->getNom());
        $contact->setPrenom($demande->getPrenom());
        $contact->setTel($demande->getTel());
        //$contact->setNewsletter(false);
        $contact->setRefOp(false);

        $em = $this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->flush();

        $repository=$this->getDoctrine()->getRepository('AppBundle\Entity\Structure');
        $structure= $repository->find(1);
        dump($demande->getType()->getId());

        //Gestionnaire
        $user = $userManager->createUser();
        $user->setUsername($demande->getMail());
        $user->setEmail($demande->getMail());
        $user->setEmailCanonical($demande->getMail());
        $user->setLocked(0);
        $user->setEnabled(1);
        $user->setType($type2);
        $user->setContact($contact);
        //$user->setStructure($structure);


        $user->addRole("ROLE_GESTIONNAIRE");

        $tokenGenerator = $this->get('fos_user.util.token_generator');
        $password = substr($tokenGenerator->generateToken(), 0, 8);

        $user->setPlainPassword($password);
        $userManager->updateUser($user);

        return array("mail" => $demande->getMail(), "login" => $demande->getMail(), "password" => $password);
             
    }


    public function sendValidationMail($idents) {
        $mail = \Swift_Message::newInstance()
                  ->setSubject("Demande de code d'accès acceptée")
                  ->setFrom(self::MAIL_SENDER)
                  ->setTo($idents["mail"])
                  ->setBody(
                  $this->renderView(
                      '@App/EspaceGDP/Mail/validation.html.twig',
                      $idents
                  )
                  ,
                  "text/html"
                  );
        $this->get('mailer')->send($mail);

        if(isset($idents["mailResponsable"])){
            unset($idents["mail"]);
            $mailResp = \Swift_Message::newInstance()
                      ->setSubject("Demande de code d'accès acceptée")
                      ->setFrom(self::MAIL_SENDER)
                      ->setTo($idents["mailResponsable"])
                      ->setBody(
                      $this->renderView(
                          '@App/EspaceGDP/Mail/validation.html.twig',
                          $idents
                      )
                      ,
                      "text/html"
                      );
            $this->get('mailer')->send($mailResp);
        }

        
    }

    public function validateAction(DemandeCompte $demande)
    {   
        $em = $this->getDoctrine()->getManager();

        $demande->setStatus($em->getRepository('AppBundle:DemandeStatus')->findOneById(DemandeCompte::STATUS_ACCEPTEE));

        $em->persist($demande);
        $em->flush();

        $userData = $this->createUser($demande);
        if ($userData === false) {
            $this->get('session')->getFlashBag()->add('error', "Impossible de créer un compte et un code d'accès, l'utilisateur ".$demande->getMail()." existe déjà dans la base.");        
            return $this->redirectToRoute('demande_compte_list', array('max' => 10));
        }
        //méthode interne
        $this->sendValidationmail($userData);
        
        $this->get('session')->getFlashBag()->add('success', 'La demande a bien été acceptée. Un mail contenant le code d\'accès à été envoyé à '.$demande->getMail().' et à '.$demande->getMailResponsable().'.');

        return $this->redirectToRoute('demande_compte_list', array('max' => 10));

    }

    public function lockAction(User $user)
    {   
        $userManager = $this->get('fos_user.user_manager');

        $user->setLocked(1);

        $userManager->updateUser($user);

        $this->get('session')->getFlashBag()->add('success', 'Le compte '.$user->getMail().' a bien été désactivé');

        return $this->redirectToRoute('demande_compte_list', array('max' => 10));
    }

    public function unlockAction(User $user)
    {   
        $userManager = $this->get('fos_user.user_manager');

        $user->setLocked(0);

        $userManager->updateUser($user);

        $this->get('session')->getFlashBag()->add('success', 'Le compte '.$user->getMail().' a bien été activé');

        return $this->redirectToRoute('demande_compte_list', array('max' => 10));
    }
	
	//Geoffrey
	
	// Compte Partenaire
	public function showComptePartenaireModalAjaxAction(Request $request, $id){
		$request = $this->get('request');
		$id = $request->get("id");
		
        $user_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:user');
        $contact_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Contact');
        $structure_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Structure');
		//$typeCompte_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:TypeCompte');
		
		$user = $user_repository->findOneById($id);

        $contact = $contact_repository->findOneById($user->getContact()->getId());

        $structure = $structure_repository->findOneById($user->getStructure()->getId());
		//$typeCompte = $typeCompte_repository->find(1);
	 	$form = $this->get('form.factory')->create('AppBundle\Form\FormModifComptePartenaire', $user);

        $formContact = $this->get('form.factory')->create('AppBundle\Form\FormModifContactPartenaire', $contact);

        $formStructure = $this->get('form.factory')->create('AppBundle\Form\FormModifStructurePartenaire', $structure);

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $formContact->handleRequest($request);
            $formStructure->handleRequest($request);

            if ($form->isSubmitted()) {

            }
            else if ($formContact->isSubmitted()) {

            }
            else if ($formStructure->isSubmitted()) {

            }

        }

        return $this->render('@App/EspaceGDP/DemandeCompte/modal.html.twig', array(
            'form' => $form->createView(), 'formContact' => $formContact->createView(), 'formStructure' => $formStructure->createView()
        ));
    }

	public function modifierComptePartenaireModalAjaxAction(Request $request, $id){
		
	 	$user_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:user');
		$typeCompte_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:TypeCompte');
		
        $userModifier = $user_repository->find($request->get('id'));
		$typeCompte = $typeCompte_repository->find($request->get('type'));
		
		$id = $request->get("id");
		$nomStructure = $request->get("nomStructure");
		$nomDemandeur = $request->get("nom");
		$prenomDemandeur = $request->get("prenom");
		$telDemandeur = $request->get("tel");
		$mailDemandeur = $request->get("mail");
		//$typeCompte = $request->get("type");
		$nomResponsable = $request->get("nomResponsable");
		$prenomResponsable = $request->get("prenomResponsable");
		$telResponsable = $request->get("telResponsable");
		$mailResponsable = $request->get("mailResponsable");
		
		$userModifier->setNomStructure($nomStructure);
		$userModifier->setNom($nomDemandeur);
		$userModifier->setPrenom($prenomDemandeur);
		$userModifier->setTel($telDemandeur);
		$userModifier->setMail($mailDemandeur);
		$userModifier->setType($typeCompte);
		$userModifier->setNomResponsable($nomResponsable);
		$userModifier->setPrenomResponsable($prenomResponsable);
		$userModifier->setTelResponsable($telResponsable);
		$userModifier->setMailResponsable($mailDemandeur);
		
		$em = $this->getDoctrine()->getManager();
		$em->persist($userModifier);
		$em->flush();
		
		
        //$newsletter_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:newsletter');
		//$newsletter = $newsletter_repository->find($id);
        return new JsonResponse ($typeCompte->getName());
	}
	
	
	
	// Compte en attente
	public function showCompteAttenteModalAjaxAction(Request $request, $id){
		$request = $this->get('request');
        $id = $request->get("id");
        
        $demande_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:DemandeCompte');
        
        $demande = $demande_repository->findOneById($id);
        $form = $this->get('form.factory')->create('AppBundle\Form\FormModifDemandePartenaire', $demande);

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);

            if ($form->isSubmitted()) {

            }
        }

        return $this->render('@App/EspaceGDP/DemandeCompte/modalDemande.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
}
