<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class Form_FAQ_Gestionnaire_modif_question extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 

	$builder
			
	->add('question_FAQ', 'Symfony\Component\Form\Extension\Core\Type\TextareaType',array(
		'label' => 'Modifier ici la question FAQ : ', 'required'=>false,
		'data' => $options['data']['recup_questionReformule'],
		'attr' => array('rows' => '4', 'cols' => '100'),
		))

	->add('reponse_FAQ', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array(
		'label' => 'Modifier ici la réponse FAQ : ', 'required'=>false,
		'data' => $options['data']['recup_reponseReformule'],
		'attr' => array('rows' => '4', 'cols' => '100'),
		))
	->getForm();
	}
}
?>