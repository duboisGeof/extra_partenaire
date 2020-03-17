<?php

namespace AppBundle\Controller\InfosPartenaires;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class InfosPartenaireController extends Controller
{
    
	/**
     * @Route("/infosPartenaire", name="infoPartenaire")
     */
    public function indexAction()
    {
        return $this->render('@App/InfosPartenaires/infosPartenaire.html.twig');
    }
}
