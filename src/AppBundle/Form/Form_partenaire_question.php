<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class Form_partenaire_question extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
			
	$defaultData = array();
	$builder
		
			/*->add('contact','Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
					'label'=>'Contact partenaire :',
					'choices' => $options['data']['liste_contact'],
				'required' => true,		
				))*/
		
			->add('theme','Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
					'label'=>'Thème :',
					'choices' => $options['data']['recup_Themes'],
					'data' => $options['data']['defaut'],
				))

			->add('question', 'Symfony\Component\Form\Extension\Core\Type\TextareaType',array(
				'label' => 'Rédiger ici votre question : ',
				'data' => $options['data']['DonneesRecup'],
				'attr' => array('rows' => '5', 'cols' => '100')
			))
			->getForm();
	}
}
?>