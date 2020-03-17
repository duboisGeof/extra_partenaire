<?php

namespace AppBundle\Controller\Partenaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContext;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\File;

class EspacePartenaireController extends Controller {

    public function indexAction() {
        return $this->render('@App/PartenairePage/espacePartenaire.html.twig');
    }

    /*public function envoiAction() {
        return $this->render('@App/PartenairePage/espacePartenaire.html.twig');
    }

    public function consulServiceAction() {
        return $this->render('@App/PartenairePage/espacePartenaire.html.twig');
    }*/

    public function infoCompteAction(Request $request) {
        $request = $this->get('request');
        $defaultData = array();
        $form = $this->get('form.factory')->create('AppBundle\Form\FormPartenaire');
        //$form2 = $this->get('form.factory')->create('AppBundle\Form\FormDemandeur');
        //return $this->render('@App/PartenairePage/infoCompte.html.twig', array('form' => $form->createView(), 'form2' => $form2->createView()));
		return $this->render('@App/PartenairePage/infoCompte.html.twig', array('form' => $form->createView()));
    }
    
    public function contactServiceAction(Request $request)
         { 
        return $this->render('@App/PartenairePage/contactService.html.twig');
   
    }

}
