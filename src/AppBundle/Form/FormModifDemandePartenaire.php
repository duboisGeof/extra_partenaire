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

class FormModifDemandePartenaire extends AbstractType {
	
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
			->add( 'mail','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Adresse Mail: ",
				'data' => $options['data']->getMail(),
				'required' => true
			))
			->add( 'nomResponsable','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Nom: ",
				'data' => $options['data']->getNomResponsable(),
				'required' => true
			))
			->add( 'prenomResponsable','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Prenom: ",
				'data' => $options['data']->getPrenomResponsable(),
				'required' => true
			))
			->add( 'telResponsable','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Téléphone: ",
				'data' => $options['data']->getTelResponsable(),
				'required' => true
			))
			->add( 'mailResponsable','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Adresse Mail: ",
				'data' => $options['data']->getMailResponsable(),
				'required' => true
			))
			->add( 'nomStructure','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Libellé: ",
				'data' => $options['data']->getNomStructure(),
				'required' => true
			))
			->add( 'mailDiffusion','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Adresse Mail Générale: ",
				'data' => $options['data']->getMailDiffusion(),
				'required' => true
			))
			->add( 'adresseStructure','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Adresse: ",
				'data' => $options['data']->getAdresseStructure(),
				'required' => true
			))
			->add( 'cpStructure','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Code Postal: ",
				'data' => $options['data']->getCpStructure(),
				'required' => true
			))
			->add( 'communeStructure','Symfony\Component\Form\Extension\Core\Type\TextType',array(
				'label'=>"Commune: ",
				'data' => $options['data']->getCommuneStructure(),
				'required' => true
			))
			->add( 'type','Symfony\Bridge\Doctrine\Form\Type\EntityType',array(
				'class'=>'AppBundle:TypeStructure',
				'query_builder' => function (EntityRepository $er) {
					$typeCompte=$er->createQueryBuilder('u');
						//->groupBy('u.name');
					 	return $typeCompte;
				},
				'choice_label'=>"name",
				'multiple'=>false,
				'expanded'=>false,
			))
            ->getForm();
	}
	
}