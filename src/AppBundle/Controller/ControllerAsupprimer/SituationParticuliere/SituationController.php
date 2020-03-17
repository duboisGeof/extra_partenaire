<?php

namespace AppBundle\Controller\SituationParticuliere;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class SituationController extends Controller
{
    
	
    public function indexAction()
    {
        return $this->render('@App/SituationParticuliere/situation.html.twig');
    }
}
