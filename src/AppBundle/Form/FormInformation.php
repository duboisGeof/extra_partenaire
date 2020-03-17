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
use AppBundle\Entity\information;

class FormInformation extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options){   
	 	
		$defaultData = array();
	  	$builder
		  	->add('titre','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                'label'=> 'Titre de l offre',
                'required'=> true,
            ))
			->add('text','ckeditor', array(  
                'label' => 'Contenue de la newsletter',
                'config_name' => 'information', 
                'config' => array(
                    'filebrowserBrowseRoute' => 'elfinder',
                    'filebrowserBrowseRouteParameters' => array(
                        'instance' => 'default',
                        'homeFolder' => ''
                    )
                ),
            ))
            ->getForm();
    }
	
	public function configureOptions(OptionsResolver $resolver){
		$resolver->setDefaults([
			'data_class' => 'AppBundle\Entity\information'
		]);
	}
	
	public function getBlockPrefix() {
        return null;
    }
}