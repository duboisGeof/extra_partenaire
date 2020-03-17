<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class UserController extends Controller
{   	
     
    public function listAction()
    {
        return $this->render('@App/Default/CommandeSupport.html.twig');
    }
}
