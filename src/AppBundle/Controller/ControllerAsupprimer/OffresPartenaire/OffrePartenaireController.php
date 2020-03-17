<?php

namespace AppBundle\Controller\OffresPartenaire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\offre;

class OffrePartenaireController extends Controller {

    /**
     * @Route("/offrePartenaire", name="offrePartenaire")
     */
    public function indexAction(Request $request) {
		$offre= new offre();
		$repository=$this->getDoctrine()->getManager()->getRepository('AppBundle:offre')->getListe();

        return $this->render('@App/OffresPartenaire/offrePartenaire.html.twig', array ('offres' => $repository));
    }

    public function envMailAction(Request $request) {
        $message = \Swift_Message::newInstance(null)
                // hop, on défini le sujet du mail
                ->setSubject('Demande offre de service')
                ->setFrom(['noreply@assurance-maladie.fr' => 'Extranet Partenaire'])
                ->setTo([
                    'sylvie.vidal@assurance-maladie.fr'
                ])
                ->setBody(
                $this->renderView(
                        // app/Resources/views/Emails/registration.html.twig
                        'AppBundle:OffresPartenaire:corpsmail.html.twig'
                ), 'text/plain'
                )
        ;
        $this->get('mailer')->send($message);

        return $this->render('AppBundle:OffresPartenaire:offrePartenaire.html.twig');
    }

    public function AfficheOffreCoursAction() {
        return $this->render('@App/PartenairePage/AfficheOffreCours.html.twig');
    }

    public function OffreServiceSupprAction() {
        return $this->render('@App/PartenairePage/OffreServiceSupp.html.twig');
    }

}
