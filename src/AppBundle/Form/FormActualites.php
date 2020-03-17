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
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FormActualites extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        
        $defaultData = array();
		if (isset($options['data'])){
			$content = $options['data']->getContent();
		}else{
			$content = "";
		}
        $builder	   
            ->add('title','Symfony\Component\Form\Extension\Core\Type\TextType',array(
                'label'=> 'Titre de l\'actualité',
                'required'=> true,
				//'constraints' => array(new Length(array('min' => 3)))
            ))
            ->add('url_img', 'Symfony\Component\Form\Extension\Core\Type\FileType', array(
                'label' => 'Insérer la miniature :',
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

            ->add('content','ckeditor', array(  
                'label' => 'Contenue de l\'actualité',
				'data' => "",
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
        ->getForm();
    }
	
	public function configureOptions(OptionsResolver $resolver){
		$resolver->setDefaults([
			'data_class' => 'AppBundle\Entity\Actualite'
		]);
	}
	
	public function getBlockPrefix() {
        return null;
    }
}