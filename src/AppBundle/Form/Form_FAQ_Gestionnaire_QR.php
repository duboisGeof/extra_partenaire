<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class Form_FAQ_Gestionnaire_QR extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 

	$builder
		->add('theme','choice', array(
					'label'=>'Thème :',
					'choices' => $options['data'],				
					))
		
			->add('question_FAQ', 'Symfony\Component\Form\Extension\Core\Type\TextareaType',array(
				'label' => 'Rédiger ici votre question pour la FAQ (max: 500 caract.): ', 'required'=>false,

				'attr' => array('rows' => '4', 'cols' => '100'),
				))

			->add('reponse_FAQ', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array(
				'label' => 'Rédiger ici votre réponse pour la FAQ (max: 500 caract.): ', 'required'=>false,

				'attr' => array('rows' => '4', 'cols' => '100'),
				))
			->getForm();
	}
}
?>