<?php
namespace AppBundle\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Length;


class FormNewsletter extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        
        $defaultData = array();
		if (isset($options['data'])){
			$content = $options['data']->getContent();
		}else{
			$content = "";
		}
        $builder	   
            ->add('titre','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                'label'=> 'Titre de la newsletter',
                'required'=> true,
				//'constraints' => array(new Length(array('min' => 3)))
            ))
            ->add('content','ckeditor', array(  
                'label' => 'Contenue de la newsletter',
				'data' => $content,
                'config_name' => 'newsletter', 
                'config' => array(
                    'filebrowserBrowseRoute' => 'elfinder',
                    'filebrowserBrowseRouteParameters' => array(
                        'instance' => 'default',
                        'homeFolder' => ''
                    )
                ),
            ))
            ->add('enregistrer','Symfony\Component\Form\Extension\Core\Type\SubmitType', array(  
                'label'=>"Enregistrer",
                'attr' => array('class'=>'btn-primary fleft mr10')
            ))
            ->add('apercu','Symfony\Component\Form\Extension\Core\Type\ButtonType', array(  
                'label'=>"Apercu",
                'attr' => array('class'=>'btn-success ouvrirModalApercu fleft mr10')
            ))
            ->add('mailTest','Symfony\Component\Form\Extension\Core\Type\ButtonType', array(  
                'label'=>"S'envoyer un mail",
                'attr' => array('class'=>'btn-success fleft mr10')
            ))
        ->getForm();
    }
	
	public function configureOptions(OptionsResolver $resolver){
		$resolver->setDefaults([
			'data_class' => 'AppBundle\Entity\newsletter'
		]);
	}
	
	public function getBlockPrefix() {
        return null;
    }
}