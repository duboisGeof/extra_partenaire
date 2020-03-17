<?php

namespace AppBundle\Controller;


use AppBundle\Form\DemandeCompteType as DemandeCompteType;
use AppBundle\Entity\DemandeCompte;
use AppBundle\Entity\DemandeStatus;
use AppBundle\Entity\TypeCompte as TypeCompte;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class InscriptionController extends Controller
{

    const MAIL_SENDER = "no-reply@assurance-maladie.com";
    //const MAIL_RECIPIENT = array("ahmed-mouadh.cheraki@assurance-maladie.com", "geoffrey.dubois@assurance-maladie.com", "sylvie.vidal@assurance-maladie.com", "stephane.azerot@assurance-maladie.com");

    public function sendNotificationMail(DemandeCompte $demande) {
        $mail = \Swift_Message::newInstance()
                  ->setSubject("Demande de code d'accès")
                  ->setFrom(self::MAIL_SENDER)
                 ->setTo([
                  'geoffrey.dubois@assurance-maladie.fr',
                  'ahmed-mouadh.cheraki@assurance-maladie.fr',
                  'sylvie.vidal@assurance-maladie.fr'
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

    
	   /**
     * @Route("/inscription", name="inscription")
     */
    public function indexAction(Request $request)
    {
    	$csrf = $this->get('security.csrf.token_manager');

		  $csrfToken = $this->container->has('form.csrf_provider') ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate') : null;
        $em = $this->getDoctrine()->getManager();

        $demandeCompte = new DemandeCompte();
        $form = $this->createForm(get_class(new DemandeCompteType), $demandeCompte);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            //$typeStructure = $form['typeStructure']->getData();
		        $typeStructure = $form['type']->getData();

            $type = $em->getRepository("AppBundle:TypeStructure")->findOneById($typeStructure);
           
            if (!$type) {
                $form->get('typeStructures')->addError(new FormError("Ce type de structure n'existe pas"));
                return $this->render('@App/Default/inscription.html.twig', array(
                    "csrf_token" => $csrfToken,
                    'form' => $form->createView()
                ));
            }

            $demandeCompte->setType($type);

            $demandeCompte->setStatus($em->getRepository("AppBundle:DemandeStatus")->findOneById(DemandeCompte::STATUS_EN_ATTENTE));

            $em->persist($demandeCompte);
            $em->flush();

            $this->sendNotificationMail($demandeCompte);

 
            return $this->redirectToRoute('demande_compte_confirm');
        }

        return $this->render('@App/Default/inscription.html.twig', array(
            "csrf_token" => $csrfToken,
            'form' => $form->createView()
        ));
    }

    public function forgotMDPAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      return $this->render('@App/Default/forgotmdp.html.twig');
    }

    public function connectionAction(){
      $csrfToken = $this->container->has('form.csrf_provider') ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate') : null;
      return $this->render('@App/Templates/connect.html.twig', array("csrf_token" => $csrfToken));
    }

    public function verifReinitMdpAction()
    {
      $em = $this->getDoctrine()->getManager();
      $user = $em->getRepository("AppBundle:User")->isUser($_GET['mail']);

      $reponse = new JsonResponse($user);

      return $reponse;
    }

}
