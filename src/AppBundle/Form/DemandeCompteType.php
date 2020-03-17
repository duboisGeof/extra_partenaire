<?php 
// src/AppBundle/Form/UserType.php
namespace AppBundle\Form;

use AppBundle\Entity\DemandeCompte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;



class DemandeCompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomStructure', 'text', array("label" => "Nom de la structure"))
            ->add('adresseStructure', 'text', array("label" => "Adresse de la structure"))
            ->add('cpStructure', 'text', array("label" => "Code postal de la structure"))
            ->add('communeStructure', 'text', array("label" => "Commune de la structure"))
            ->add('nomResponsable', "text", array("label" => "Nom du responsable de la structure"))
            ->add('prenomResponsable', "text", array("label" => "Prenom du responsable de la structure"))
            ->add('telResponsable', "text", array("label" => "Téléphone du responsable de la structure"))
            ->add('mailResponsable', "text", array("label" => "Mail du responsable de la structure"))
            ->add('nom', "text", array("label" => "Nom"))
            ->add('prenom', "text", array("label" => "Prénom"))
            ->add('tel', "text", array("label" => "Teléphone"))
            ->add('mail', "text", array("label" => "Mail"))
            ->add('mailDiffusion', "text", array("label" => "Mail de Diffusion"))
            //->add('newsletter', "checkbox", array("label" => "S'inscrire à la newletter"))
            ->add( 'type','Symfony\Bridge\Doctrine\Form\Type\EntityType',array(
                'label'=>'Type de Structure: ',
                'class'=>'AppBundle:TypeStructure',
                'query_builder' => function (EntityRepository $er) {
                    $typeStructure=$er->createQueryBuilder('u');
                        //->groupBy('u.name');
                        return $typeStructure;
                },
                'choice_label'=>"name",
                'multiple'=>false,
                'expanded'=>false
            ));
	    /*->add('typeStructure',  'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
		"mapped" => false,
		"label" => "Type de structure",
		"choices"  => array(
		    '1' => "Hôpital",
		    '2' => "Mission locale Jeunes",
		    '3' => "Centre de formation et d'apprentissage"
		)));*/
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => get_class(new DemandeCompte)
        ));
    }
}
