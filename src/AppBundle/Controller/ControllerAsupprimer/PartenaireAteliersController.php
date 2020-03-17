<?php

namespace AppBundle\Controller\Partenaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class PartenaireAteliersController extends Controller {

    public function indexAction() {
        return $this->render('@App/PartenairePage/PartenaireHistoAteliers.html.twig');
    }
}
