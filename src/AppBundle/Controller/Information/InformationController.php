<?php

namespace AppBundle\Controller\Information;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class InformationController extends Controller
{

    public function indexAction(Request $request, $url){

		$QuestionFAQRepository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:faq_question');
		//PUMA = theme1
        $liste_QuestionFAQRepository = $QuestionFAQRepository->getQuestionsFAQ($url);
		
        //return $this->render('@App/AccesDroitsFAQ/puma.html.twig',array('Liste_FAQ'=>$liste_QuestionFAQRepository));
		
		$information_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:information');
		$information = $information_repository->findOneByUrlPath($url);
		
		$form = $this->get('form.factory')->create('AppBundle\Form\FormInformation', $information);
		
        return $this->render('@App/Information/information.html.twig', array(
			
			'information' => $information,
			'form' => $form->createView(),
			'Liste_FAQ'=>$liste_QuestionFAQRepository));
    }
	
	public function modifierAction(Request $request){
		$id = $request->get("id");
		$titre = $request->get("titre");
		$content = $request->get("content");
		
		$information_repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:information');
		$informationModifier = $information_repository->find($id);
		
		$informationModifier->setTitre($titre);
		$informationModifier->setText($content);
		
		$em = $this->getDoctrine()->getManager();
		$em->persist($informationModifier);
		$em->flush();
				
		return new JsonResponse ($id);
		
	}
}
