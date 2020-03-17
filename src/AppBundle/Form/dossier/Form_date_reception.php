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
//use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
//use Doctrine\ORM\EntityRepository;	// Utile pour la requête DQL
//use AppBundle\Entity\transmission_dossier;	//l'entité pour la requête DQL

class Form_date_reception extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
	 	
	 	$defaultData = array();
    	  $builder
			->add( 'Date_reception','Symfony\Component\Form\Extension\Core\Type\DateType',array(
                                                        'label'=>"Date de reception:*",
														'widget' => 'single_text',
														'format' => ('dd/MM/yyyy'),
														'attr' => array('class'=>'datepicker','readonly'=>''),
                                                        'required' => true))
			/*->add( 'Liste_Semaine','Symfony\Bridge\Doctrine\Form\Type\EntityType',array(
                                  'class'=>'AppBundle:transmission_dossier',
								'choice_label'=>"numeroSemaine",
								'multiple'=>true,
								'expanded'=>false,
				**********************************Requête DQL********************
			 'query_builder' => function (EntityRepository $er) use ($options){
						if (isset($options['data']['id']))
						{
							//dump($options);

						$partenaire_id='u.partenaire='.$options['data']['id'];
						}else{
							$partenaire_id='u.partenaire=10';
						}

				$Num_Semaine=$er->createQueryBuilder('u')	//Select numeroSemaine as u from 
					->where('u.dateReception is NULL')	// where dateReception is Null
					->andWhere($partenaire_id)

					->groupBy('u.numeroSemaine')	// group by numeroSemaine
					;

				 return $Num_Semaine;


					},

			))*/
			  ->add( 'Id','Symfony\Component\Form\Extension\Core\Type\HiddenType',array(
                                                        'label'=>"Id* ",
                                                        
			  ))

            ->getForm();
    }
		public function getBlockPrefix() {
        return null;
    }

}