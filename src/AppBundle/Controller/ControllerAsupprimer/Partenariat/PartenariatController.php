<?php

namespace AppBundle\Controller\Partenariat;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \Datetime;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Repository\faq_themeRepository;
use AppBundle\Entity\faq_theme;

class PartenariatController extends Controller {

	public function demandeAction(Request $request) {
      $em = $this->getDoctrine()->getManager();
      return $this->render('@App/PartenairePage/espacePartenaire.html.twig');
    }

    public function infoAction(Request $request) {
      $em = $this->getDoctrine()->getManager();
      return $this->render('@App/PartenairePage/espacePartenaire.html.twig');
    }

    public function presentationAction(Request $request) {
      $em = $this->getDoctrine()->getManager();
      return $this->render('@App/PartenairePage/espacePartenaire.html.twig');
    }

    
	
}