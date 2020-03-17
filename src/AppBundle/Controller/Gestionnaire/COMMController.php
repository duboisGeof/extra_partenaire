<?php

namespace AppBundle\Controller\Gestionnaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class COMMController extends Controller
{
	 public function COMMAffichageCommandesSupportsAction()
    {
        return $this->render('@App/Gestionnaire/COMM/AffichageSupport.html.twig');
	}
	
	 public function COMMGestionCommandesSupportsAction()
    {
        return $this->render('@App/Gestionnaire/COMM/GestionSupport.html.twig');
	}	
}