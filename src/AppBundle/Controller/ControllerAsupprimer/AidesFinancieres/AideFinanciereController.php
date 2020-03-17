<?php

namespace AppBundle\Controller\AidesFinancieres;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AideFinanciereController extends Controller
{
    
	/**
     * @Route("/aideFinanciere", name="aideFinanciere")
     */
    public function indexAction()
    {
        return $this->render('@App/AidesFinancieres/aideFinanciere.html.twig');
    }
	
	public function ModalGestionAction()
    {
        return $this->render('@App/AidesFinancieres/aideFiGestion.html.twig');
    }
	
}
