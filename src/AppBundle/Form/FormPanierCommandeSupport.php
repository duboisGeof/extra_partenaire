<?php
namespace AppBundle\Form;


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
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class FormPanierCommandeSupport extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   $defaultData = array();
    	$builder
         ->add( 'nom','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Nom prenom",
                                                         
                                                         ))
        ->add('adress','Symfony\Component\Form\Extension\Core\Type\TextType')
        ->add('num','Symfony\Component\Form\Extension\Core\Type\TextType')
        ->add( 'mail','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Adresse email",
                                                        
                                                         )) 
		//LY
    	 /*->add( 'P1','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Prduit 1",
                                                        'data' => '100',
                                                         ))
    	 ->add('modif1','Symfony\Component\Form\Extension\Core\Type\ResetType',array(
                                                        'label'=>"Modifier",
                                                        
                                                         ))
    	 ->add( 'P2','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Prduit 2",
                                                        'data' => '150'
                                                         )) 
    	 ->add('modif2','Symfony\Component\Form\Extension\Core\Type\ResetType',array(
                                                        'label'=>"Modifier",
                                                        
                                                         ))
    	 ->add( 'P3','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Prduit 3",
                                                        'data' => '120'
                                                         ))
    	 ->add('modif3','Symfony\Component\Form\Extension\Core\Type\ResetType',array(
                                                        'label'=>"Modifier",
                                                        
                                                         ))
    	 ->add( 'P4','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Prduit 4",
                                                        'data' => '80'
                                                         ))
    	 ->add('modif4','Symfony\Component\Form\Extension\Core\Type\ResetType',array(
                                                        'label'=>"Modifier",
                                                        
                                                         ))
    	 ->add( 'P5','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Prduit 5",
                                                        'data' => '120'
                                                         ))
    	 ->add('modif5','Symfony\Component\Form\Extension\Core\Type\ResetType',array(
                                                        'label'=>"Modifier"
                                                        
                                                         ))
         ->add ('valide','Symfony\Component\Form\Extension\Core\Type\SubmitType',array( 
                                                        'label'=>"Valider",
                                                           ))*/
         ->getForm();
    	}
    }