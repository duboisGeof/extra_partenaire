<?php

namespace AppBundle\Controller\Footer;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProprieteIntellectuelleController extends Controller {

    public function indexAction() {
        return $this->render('@App/Footer/proprieteIntellectuelle.html.twig');
    }
}
