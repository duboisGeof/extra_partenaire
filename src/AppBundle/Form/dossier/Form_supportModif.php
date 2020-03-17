<?php
namespace AppBundle\Form\dossier;


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
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;	// Utile pour la requête DQL
use AppBundle\Entity\nature_dossier;

class Form_supportModif extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   

		
		/*$tab_semaine=array();
		$tab_semaine=$tab_semaine+array(''=>'');
		for ($i = 1; $i<=52; $i++)
		{
			if (strlen($i)==1) {$i='0'.$i;}
			$tab_semaine=$tab_semaine+array($i=>$i);
		}*/
		/******************Créer à partir de l'entité à l'aide du DQL********************/
		//remplir la liste des natures de dossier
		$builder->add('modif_Nature_demande', 'Symfony\Bridge\Doctrine\Form\Type\EntityType', array(
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
			/*->add( 'modif_Semaine','Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
														'label'=>"Semaine N°",
														'choices' => $tab_semaine,
														'required' => true,
														
														))*/
            ->add( 'modif_Nom_patronymique','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Nom patronymique:* ",
                                                        'required' => true,
														
                ))

            ->add( 'modif_Nom_marital','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Nom marital:* ",
                                                        'required' => false,
														
				))
            ->add( 'modif_Prenom','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Prénom:* ",
                                                        'required' => true,
														))
            /*->add( 'modif_Naissance','Symfony\Component\Form\Extension\Core\Type\DateType',array(
                                                        'label'=>"Date de naissance: ",
														'widget' => 'single_text',
														'format' => ('dd/MM/yyyy'),
														'attr' => array('class'=>'datepicker','readonly'=>''),
                                                        'required' => true,
														))*/
			  ->add( 'modif_Naissance','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Date de naissance: ",
														
                                                        'required' => true,
														))
            ->add( 'modif_Telephone','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Téléphone: ",
                                                        'required' => false,
														))
            ->add( 'modif_Numero_dossier','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Numéro de dossier:",
                                                        'required' => false,
														))		  
            ->add( 'modif_Observations','Symfony\Component\Form\Extension\Core\Type\TextareaType',array(
                                                        'label'=>"Observations: ",
                                                        'required' => false,
														
					  									'attr' => array('rows' => '3','cols' => '10')))
            ->add( 'modif_Nom_agent','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Nom de l'agent instruteur: ",
                                                        'required' => false,
														
			))
			  ->add( 'modif_Id','Symfony\Component\Form\Extension\Core\Type\HiddenType',array(
                                                        'label'=>"Id* ",
                                                        'required' => true,
			))
			->add('modif_Urgence', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(	'required' => false, 'label' =>' '
					)) 
			->add('modif_PJ', 'Symfony\Component\Form\Extension\Core\Type\FileType', array('label' => 'Pièce à joindre :', 'required' => false, 'attr'=>array('style'=>'width:30vw')))			  

            ->getForm();
    }
			public function getBlockPrefix() {
        return null;
    }
}