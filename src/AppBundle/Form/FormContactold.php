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


class FormContact extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   $defaultData = array();
    	$btnEnvoyer = new Bouton(array('predefined' => Bouton::PREDEFINED_VALIDER, 'text' => 'Envoyer',id = 'envoyer'));
         $form = $this->createFormBuilder($defaultData)  
                ->add('destinataire','choice', array(  'multiple' => true,
                                                       'required' => false,

                                                        'label'=>'Service destinataire',
                                                        'choice' => array ('1'=> 'service 1',
                                                                           '2' => 'service 2',
                                                                           '3'=> 'service 3'),
                                                        'choice_as_values' => true))
                ->add('emetteur','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                	                                    'label'=> 'Nom prenom',
                                                        'required'=> true))
                ->add('email','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                	                                    'label'=> 'Adress email',
                                                        'required'=> true))
                ->add('message','Symfony\Component\Form\Extension\Core\Type\TextareaType',array(
                                                          'label'=>' Objet'
                	                                     'required'=>false))
                ->add('file', 'file', array('label' => 'Joindre un fichier','required'=>false))
                ->add('boutons','CNAMTS\PHPK\CoreBundle\Form\Type\BoutonsType', array('attr' => array('boutons' => array($btnEnvoyer))))
                ->getForm();
  }
}

                                                       

                
                
                