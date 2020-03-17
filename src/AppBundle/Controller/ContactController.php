<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends Controller
{
    
	/**
     * @Route("/aide", name="aide")
     */
    public function indexAction()
    {
        return $this->render('@App/Default/Contact.html.twig');
    }
}
