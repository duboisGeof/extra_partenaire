<?php
namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;
use CNAMTS\PHPK\CoreBundle\Form\Type\BoutonType;
use CNAMTS\PHPK\CoreBundle\Generator\Form\Bouton;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FormCommande extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   $defaultData = array();
    	  $builder
            ->add ('depliant','choice', array( 'label'=>"Intitulé du support", 'required' => false,
			 'choices'=>array (
				'Dépliants' => array('1'=>"Apprenti vos relations avec l'Assurance maladie",
							   '2'=>" Avec mon compte ameli, mes démarches sont simplifiées, je n'ai plus à me déplacer",
							   '3'=>"Ayez le reflexe vitale ",
							   '4'=>"Bien gérer ma santé avec l'ACS",
							   '5'=>"En cas de difficultés je suis accompagné pour préparer ma retraite",
							   '6'=>"J'ai eu un accident sur mon lieu de travail ou sur le trajet",	 
							   '7'=>"Je déclare mon médecin traitant simplement avec ma carte vitale",
							   '8'=>"Je demande une aide pour mes dépenses de santé",
							   '9'=>"Je prépare mon retour au travail avec mon médecin traitant",
							   '10'=>"Je suis accompagné en cas d'invalidité",	 
							   '11'=>"Je suis atteint d'une maladie professionnelle",
							   '12'=>"Je suis blessé par un tiers",
							   '13'=>"Je suis en arrêt de travail pour maladie",
							   '14'=>"Je suis accompagné après mon accouchement",
							   '15'=>"Je suis travailleur saisonnier",
							   '16'=>"J'entre dans la vie active",
							   '17'=>"L'Aide au paiement d'une Complémentaire Santé",
							   '18'=>"Le compte ameli : Votre espace personnel qui vous rend bien des services",
								'19'=>"Mes rendez vous grossesse (format 10 x 15 cm)",
								'20'=>"M't dents : 1er Rendez vous gratuit",
								'21'=>"M'T dents 'Des rendez-vous gratuits chez le dentiste' (format : 10cm x 15cm)",
							    '22'=>"M't dents : 132 poses et autant de bonnes raisons de profiter des rendez-vous gratuits",
								'23'=>"On m'a blessé",	
								'24'=>"Votre santé vous intéresse ? (faites le point avec nous,au centre d'examens de santé)",	
								'25'=>"Vous attendez un enfant (8 clés pour vous guider dans votre parcours maternité)",	
								'26'=>"L'AFCS : une aide pour financer votre mutuelle",
									),
					'Intitulé marque page (format=7*17 cm)'=> array('27'=>'Vous allez bientôt partir en Europe',
							   '28'=>"Vous attendez le paiement de vos I J",
							   '29'=>"Vous attendez votre prise en charge ALD",
							   '30'=>"Vous entrez dans la vie active",
							  '31'=>"Vous êtes en arrêt de travail",
								'32'=>"Vous reprenez une activité professionnelle",
								'33'=>"Vous venez d'avoir un enfant",
								'34'=>"Vous venez de déclarer la perte ou le vol de votre carte vitale",
								'35'=>"Vous venez de déclarer votre premier emploi",
								'36'=>"Vous venez de déposer un dossier d'A.T ou de trajet",
								'37'=>"Vous venez de déposer une demande de CMU-C",),
					'Intitulé Carte (format=8,5*5,5 cm)'=> array('38'=>'Mon code ameli',
							   '39'=>"Pour joindre ma Cpam",),
					'Intitulé Affiche format A2'=> array('40'=>'Affiche "promotion du compte ameli"',),
				
				)))
         
            ->add( 'quantiteD','Symfony\Component\Form\Extension\Core\Type\NumberType',array(
                                                        'label'=>"Quantité souhaitée (Maxi = 200 ex)",
                                                        'required' => false))
			  
			  
            /*->add('ajouteD','Symfony\Component\Form\Extension\Core\Type\SubmitType',array(
                                                        'label'=>"Ajouter",
                                                           ))
			 ->add('ajouteD','Symfony\Component\Form\Extension\Core\Type\SubmitType',array(
                                                        'label'=>"Ajouter",
                                                           ))
			  

            ->add ('commande','Symfony\Component\Form\Extension\Core\Type\SubmitType',array( 
                                                        'label'=>"Visualiser la commande",
                                                           ))*/
         
            ->getForm();
    }
}