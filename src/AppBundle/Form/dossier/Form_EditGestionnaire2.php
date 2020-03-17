<?php
namespace AppBundle\Form\dossier;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormError;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;	// Utile pour la requête DQL
//use AppBundle\Entity\type_decision;


class Form_EditGestionnaire2 extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
		/******************Créer à partir de l'entité à l'aide du DQL********************/
		$builder
            ->add('decision', 'Symfony\Bridge\Doctrine\Form\Type\EntityType', array(
				'choice_label'=>'libelle',
				'class'=>'AppBundle:type_decision',
				'label'=>"Décision:* ",
				'multiple'=>false,
				'expanded'=>false,
				'required' => true,
				'attr' => array('style'=>'width:90%!important'),
                'query_builder' => function(EntityRepository $repo) {
					$libelle=$repo->createQueryBuilder('decision');	//select libelle from type_decision decision 
				return $libelle;

                }
            ))
			->add('Nature_demande', 'Symfony\Bridge\Doctrine\Form\Type\EntityType', array(
				'choice_label'=>'libelle',
				'class'=>'AppBundle:nature_dossier',
				'multiple'=>false,
				'expanded'=>false,
				'required' => true,
                'query_builder' => function(EntityRepository $repo) {
					$libelle=$repo->createQueryBuilder('demande');	//select libelle from nature_dossier demande 
				return $libelle;

                }
            ));
		
	 	$defaultData = array();


        $builder
            ->add( 'Nom_patronymique','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Nom patronymique: ",
                                                        'required' => true
))
			->add( 'Nom_marital','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Nom marital: ",
                                                        'required' => false
))
			->add( 'Prenom','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Prénom: ",
                                                        'required' => true
))
			->add( 'Naissance','Symfony\Component\Form\Extension\Core\Type\DateType',array(
                                                        'label'=>"Date de naissance: ",
														'widget' => 'single_text',
														'format' => ('dd/MM/yyyy'),
														'attr' => array('class'=>'datepicker','style'=>'width:60%','readonly'=>''),
                                                        'required' => true))
			->add( 'Telephone','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Téléphone: ",
                                                        'required' => false
))
			->add( 'Numero_dossier','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Numéro dossier: ",
                                                        'required' => false,
														'attr' => array('style'=>'width:35%')
))
				
			->add( 'Observations','Symfony\Component\Form\Extension\Core\Type\TextareaType',array(
                                                        'label'=>"Observations: ",
                                                        'required' => false
														))
			->add( 'Nom_agent','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Nom de l'agent instruteur:* ",
                                                        'required' => false,
														'attr' => array('style'=>'width:50%')))
			/********************************* Partie Gestionnaire *********************************/
			->add( 'DateInstruction','Symfony\Component\Form\Extension\Core\Type\DateType',array(
                                                        'label'=>"Date d'Instruction:* ",
														'widget' => 'single_text',
														'format' => ('dd/MM/yyyy'),
														'attr' => array('class'=>'datepicker','readonly'=>''),                       'required' => true))
			->add( 'DateReception','Symfony\Component\Form\Extension\Core\Type\DateType',array(
                                                        'label'=>"Date de Réception:* ",
														'widget' => 'single_text',
														'format' => ('dd/MM/yyyy'),
														'attr' => array('class'=>'datepicker','readonly'=>''), 'required' => true))

			->add( 'observationPart','Symfony\Component\Form\Extension\Core\Type\TextareaType',array(
                                                        'label'=>"Observations destinée au partenaire:* ",
                                                        'required' => true))
			->add( 'observationInter','Symfony\Component\Form\Extension\Core\Type\TextareaType',array(
                                                        'label'=>"Observations inter service:* ",
                                                        'required' => true))
			->add( 'Ordre_archivage','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"N°ordre AME ou archivage GED:* ",
														'attr' => array('style'=>'width:50%'),
                                                        'required' => true,
														))
			->add( 'agentCPAM','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Agent CPAM:* ",
                                                        'required' => true,
														'attr' => array('style'=>'width:50%')))
			 ->add( 'Id','Symfony\Component\Form\Extension\Core\Type\HiddenType',array(
                                                        'label'=>"Id* ",
                                                        'required' => true
))
			->getForm();

    }
	
	public function getBlockPrefix() {
        return null;
    }

}