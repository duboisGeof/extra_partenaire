<?php

namespace AppBundle\Controller\Mediation;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class MediationController extends Controller
{
    
	/**
     * @Route("/aide", name="aide")
     */
    public function indexAction()
    {
        return $this->render('@App/Mediation/mediation.html.twig');
    }
}
