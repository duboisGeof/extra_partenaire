<?php

namespace AppBundle\Controller\Gestionnaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class EspaceGestionnaireController extends Controller
{
    public function indexAction()
    {
        return $this->render('@App/Gestionnaire/espaceGestionnaire.html.twig');
    }
}