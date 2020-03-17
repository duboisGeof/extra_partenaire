<?php
namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContext;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;	// Utile pour la requête DQL
use AppBundle\Entity\TypeCompte;	//l'entité pour la requête DQL
use AppBundle\Entity\TypeStructure;	//l'entité pour la requête DQL
use AppBundle\Entity\TypeContact;	//l'entité pour la requête DQL
use AppBundle\Entity\Contact;	//l'entité pour la requête DQL
use AppBundle\Entity\Structure;	//l'entité pour la requête DQL
use AppBundle\Repository\User;	//l'entité pour la requête DQL
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class FormModifContactPartenaire extends AbstractType {
	
    public function buildForm(FormBuilderInterface $builder, array $options){
	 	$defaultData = array();	
	  	$builder
			->add( 'nom','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Nom: ",
				'data' => $options['data']->getNom(),
				'required' => true
			))
			->add( 'prenom','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Prenom: ",
				'data' => $options['data']->getPrenom(),
				'required' => true
			))
			->add( 'tel','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Téléphone: ",
				'data' => $options['data']->getTel(),
				'required' => true
			))
			->add( 'type','Symfony\Bridge\Doctrine\Form\Type\EntityType',array(
				'class'=>'AppBundle:TypeContact',
				'query_builder' => function (EntityRepository $er) {
					$typeCompte=$er->createQueryBuilder('u');
						//->groupBy('u.name');
					 	return $typeCompte;
				},
				'choice_label'=>"libelle",
				'multiple'=>false,
				'expanded'=>false,
			))
            ->getForm();
	}
	
}