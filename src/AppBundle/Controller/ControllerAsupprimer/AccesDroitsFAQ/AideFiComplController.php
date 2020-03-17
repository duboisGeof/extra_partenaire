<?php

namespace AppBundle\Controller\AccesDroitsFAQ;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AideFiComplController extends Controller {

    public function indexAction() {
		
		//Aller chercher dans la table FAQ_QUESTIION les questions
		// pour la FAQ du theme CMUC
		$QuestionFAQRepository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:faq_question');
		//PUMA = theme1
        $liste_QuestionFAQRepository = $QuestionFAQRepository->getQuestionsFAQ('6');
		//die();
		
        return $this->render('@App/AccesDroitsFAQ/aideficompl.html.twig',array('Liste_FAQ'=>$liste_QuestionFAQRepository));
    }
}
