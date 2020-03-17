<?php
namespace AppBundle\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;
use CNAMTS\PHPK\CoreBundle\Form\Type\BoutonType;
use CNAMTS\PHPK\CoreBundle\Generator\Form\Bouton;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\File;


class FormPartenaireAbonnementNewsletter extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   $defaultData = array();
    	$btnModifier = new Bouton(array( 'text' => 'Enregistrer','id'=>'modifPar'));
      $btnRetour = new Bouton(array( 'text'=> 'Annuler','id'=>'retour'));
         //$form = $this->createFormBuilder($defaultData) 
       $builder

		   		->add('NomPrenom', 'Symfony\Component\Form\Extension\Core\Type\TextType', array(
                	                                       'label'=> 'Nom et prénom',
                                                          'required'=> true))

		   		->add('Email', 'Symfony\Component\Form\Extension\Core\Type\TextType', array(
                	                                       'label'=> 'E-mail',
                                                          'required'=> true))
		   		->add('ConfirmEmail', 'Symfony\Component\Form\Extension\Core\Type\TextType', array(
                	                                       'label'=> "Confirmation d'E-mail",
                                                          'required'=> true))
		   
                ->getForm();
  }
}