<?php

namespace AppBundle\Controller\ServiceSocial;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ServiceSocialController extends Controller
{
    
	/**
     * @Route("/serviceSocial", name="serviceSocial")
     */
    public function indexAction()
    {
        return $this->render('@App/ServiceSocial/serviceSocial.html.twig');
    }
}
