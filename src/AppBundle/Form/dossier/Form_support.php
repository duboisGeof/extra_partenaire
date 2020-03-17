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

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File;

class Form_support extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   		
		//remplir la liste des natures de dossier
		$tab_nature=array();
		foreach ($options['data'] as $value) 
		{
			$tab_nature=$tab_nature+array($value['id']=>$value['libelle']);
		}

		/*$tab_semaine=array();
		$tab_semaine=$tab_semaine+array(''=>'');
		for ($i = 1; $i<=53; $i++)
		{
			if (strlen($i)==1) {$i='0'.$i;}
			$tab_semaine=$tab_semaine+array($i=>$i);
		}*/
		
	 	$defaultData = array();
		
    	  $builder
			/*->add( 'Semaine','Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
														'label'=>"Semaine N°",
														'choices' => $tab_semaine,
														'required' => true,
														))*/
            ->add( 'Nom_patronymique','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Nom patronymique:* ",
                                                        'required' => true,
                ))

            ->add( 'Nom_marital','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Nom marital: ",
                                                        'required' => false))
            ->add( 'Prenom','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Prénom:* ",
                                                        'required' => true))
            ->add( 'Naissance','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Date de naissance (jj/mm/aaaa): ",
                                                        'required' => true))
            ->add( 'Telephone','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Téléphone (max 14 caract): ",
                                                        'required' => false))
            ->add( 'Numero_dossier','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Numéro de dossier:",
                                                        'required' => false))
            ->add( 'Nature_demande','Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
														'label'=>"Nature de la demande: ",
                                                        'choices' => $tab_nature,
														'required' => true,					
															))			  
            ->add( 'Observations','Symfony\Component\Form\Extension\Core\Type\TextareaType',array(
                                                        'label'=>"Observations: ",
                                                        'required' => false,
					  									'attr' => array('rows' => '3','cols' => '10')))
            ->add( 'Nom_agent','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                                                        'label'=>"Nom de l'agent instruteur: ",
                                                        'required' => false))
			  
			->add('Urgence', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(	'required' => false, 'label' =>' '
					)) 
			->add('PJ', 'Symfony\Component\Form\Extension\Core\Type\FileType', array(
				'label' => 'Pièce à joindre :',
				'required' => false,
				/*'constraints' => [
					new File([
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
					],*/
																					 
				'attr'=>array('style'=>'width:30vw')))

            ->getForm();
    }

		public function getBlockPrefix() {
        return null;
    }
}