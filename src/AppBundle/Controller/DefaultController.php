<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$securityContext = $this->container->get('security.authorization_checker');

    	$listeActualite = $em->getRepository("AppBundle:Actualite")->getAll();

		//Test si l'utilisateur est connecté
		//A changer en page du partenaire/gestionnaire
		//if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
			$authenticationUtils = $this->get('security.authentication_utils');
		    return $this->render('@App/Default/index.html.twig', array('listeActualite' => $listeActualite));
		//}

		//Page de connexion/inscription
		/*else{
			return $this->redirectToRoute('inscription');
		}  */
    }

}
