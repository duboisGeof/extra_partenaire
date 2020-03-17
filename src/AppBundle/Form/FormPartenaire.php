<?php
namespace AppBundle\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;
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


class FormPartenaire extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options){

         //$form = $this->createFormBuilder($defaultData) 
       $builder
                ->add('designation','Symfony\Component\Form\Extension\Core\Type\TextType', array(  
                                                       'required' => true,
                                                       'label'=>"Désignation du partenaire",

                                                        ))
                ->add('adresse','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                	                                        'label'=> 'Adresse',
                                                          'required'=> true))
                ->add('CP','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                	                                       'label'=> 'Code postal',
                                                          'required'=> true))
                ->add('commune','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                	                                       'label'=> 'Commune',
                                                          'required'=> true))		   
		   		->add('NomInterloc', 'Symfony\Component\Form\Extension\Core\Type\TextType', array(
                	                                       'label'=> 'Nom et prénom',
                                                          'required'=> true))
		   		->add('TelInterloc', 'Symfony\Component\Form\Extension\Core\Type\TextType', array(
                	                                       'label'=> 'Téléphone',
                                                          'required'=> true))
		   		->add('EmailInterloc', 'Symfony\Component\Form\Extension\Core\Type\TextType', array(
                	                                       'label'=> 'E-mail',
                                                          'required'=> true))
		   
		   	->add ('interlocuteur','choice', array( 'label'=>"Interlocuteurs", 'required' => false,
			 'choices'=> array('1'=>"Mr DUPONT Pierre",
							   '2'=>" Mme DURANT JACQUELINE",
							   '3'=>"Mme DUBOIS",
							   '4'=>"Mr DUVAL",),))
		   
                ->getForm();
  }
}