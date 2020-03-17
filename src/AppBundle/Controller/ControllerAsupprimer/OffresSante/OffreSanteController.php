<?php

namespace AppBundle\Controller\OffresSante;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class OffreSanteController extends Controller
{
    
	/**
     * @Route("/offreSante", name="offreSante")
     */    
    public function indexAction()
    {
        return $this->render('@App/OffresSante/index.html.twig');
    }
	
	public function BilanSanteAction()
    {
        return $this->render('@App/OffresSante/BilanSante.html.twig');
    }
	
}
