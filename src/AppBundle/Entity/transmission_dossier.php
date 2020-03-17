<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * transmission_dossier
 *
 * @ORM\Table(name="transmission_dossier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\transmission_dossierRepository")
 */
class transmission_dossier
{
    /**
   * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Structure",cascade={"persist"})
   * @ORM\JoinColumn(nullable=true)
   */
    private $partenaire;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
   * @ORM\ManyToOne(targetEntity="AppBundle\Entity\nature_dossier",cascade={"persist"})
   * @ORM\JoinColumn(nullable=false)
   */
    private $demande;
	
	/**
   * @ORM\ManyToOne(targetEntity="AppBundle\Entity\type_decision",cascade={"persist"})
   * @ORM\JoinColumn(nullable=false)
   */
    private $decision;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_patro", type="string", length=100)
	 	 * @Assert\Regex(
     *     pattern="/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/",
     *     match=false,
     *     message="Le nom ne peut pas contenir de chiffre"
     * )
     */
    private $nomPatro;
    
    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=255, nullable=true)
     */
    private $observation;

     /**
     * @var date
     *
     * @ORM\Column(name="naissance", type="date", nullable=true)
     */
    private $naissance;   

    /**
     * @var string
     *
     * @ORM\Column(name="agent", type="string", length=50, nullable=true)
     */
    private $agent;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=15, nullable=true)
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "Merci de saisir un numéro téléphone plus long",
     * )
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_mari", type="string", length=50, nullable=true)
	 * @Assert\Regex(
     *     pattern="/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/",
     *     match=false,
     *     message="Le nom ne peut pas contenir de chiffre"
     * )
     */
    private $nomMari;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100)
	 * @Assert\Regex(
     *     pattern="/^[[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+[ \-']?]*[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü]+$/",
     *     match=false,
     *     message="Le prénom ne peut pas contenir de chiffre"
     * )
     */
    private $prenom;
	
	 /**
     * @var date
     *
     * @ORM\Column(name="dateInstruction", type="date", nullable=true)
     */
    private $dateInstruction;
		
	 /**
     * @var date
     *
     * @ORM\Column(name="dateReception", type="date", nullable=true)
     */
    private $dateReception;
	
	 /**
     * @var string
     *
     * @ORM\Column(name="ordreArchivage", type="string", length=50, nullable=true)
     */
    private $ordreArchivage;
	
	 /**
     * @var text
     *
     * @ORM\Column(name="observationPart", type="text", nullable=true)
     */
    private $observationPart;
	
		 /**
     * @var text
     *
     * @ORM\Column(name="observationInter", type="text", nullable=true)
     */
    private $observationInter;
	
	 /**
     * @var string
     *
     * @ORM\Column(name="agentCPAM", type="string", length=100, nullable=true)
     */
    private $agentCPAM;

	/**
     * @var int
     *
     * @ORM\Column(name="numDossier", type="integer", length=10, nullable=true)
     */
    private $numDossier;
	
	/**
     * @var date
     *
     * @ORM\Column(name="dateTransmission", type="date", nullable=true)
     */
    private $dateTransmission;
	
	    /**
     * @var boolean
     *
     * @ORM\Column(name="urgence", type="boolean")
     */
    private $urgence;
    /**
     * @var string
     *
     * @ORM\Column(name="pj", type="string", length=100, nullable=true)
     */
    private $pj;	
	
	/**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

	 /**
     * Set numDossier
     *
     * @param int $numDossier
     *
     * @return transmission_dossier
     */
    public function setNumDossier($numDossier)
    {
        $this->numDossier = $numDossier;

        return $this;
    }

    /**
     * Get numDossier
     *
     * @return int
     */
    public function getNumDossier()
    {
        return $this->numDossier;
    }
	
		 /**
     * Set dateInstruction
     *
     * @param string $dateInstruction
     *
     * @return transmission_dossier
     */
    public function setDateInstruction($dateInstruction)
    {
        $this->dateInstruction = $dateInstruction;

        return $this;
    }

    /**
     * Get dateInstruction
     *
     * @return string
     */
    public function getDateInstruction()
    {
        return $this->dateInstruction;
    }
		
		 /**
     * Set dateReception
     *
     * @param string $dateReception
     *
     * @return transmission_dossier
     */
    public function setDateReception($dateReception)
    {
        $this->dateReception = $dateReception;

        return $this;
    }

    /**
     * Get dateReception
     *
     * @return string
     */
    public function getDateReception()
    {
        return $this->dateReception;
    }
	
	
			/**
     * Set ordreArchivage
     *
     * @param string $ordreArchivage
     *
     * @return transmission_dossier
     */
    public function setOrdreArchivage($ordreArchivage)
    {
        $this->ordreArchivage = $ordreArchivage;

        return $this;
    }

    /**
     * Get ordreArchivage
     *
     * @return string
     */
    public function getOrdreArchivage()
    {
        return $this->ordreArchivage;
    }
	
	/**
     * Set agentCPAM
     *
     * @param string $agentCPAM
     *
     * @return transmission_dossier
     */
    public function setAgentCPAM($agentCPAM)
    {
        $this->agentCPAM = $agentCPAM;

        return $this;
    }

    /**
     * Get agentCPAM
     *
     * @return string
     */
    public function getAgentCPAM()
    {
        return $this->agentCPAM;
    }
	
		/**
     * Set observationPart
     *
     * @param string $observationPart
     *
     * @return transmission_dossier
     */
    public function setObservationPart($observationPart)
    {
        $this->observationPart = $observationPart;

        return $this;
    }

    /**
     * Get observationPart
     *
     * @return string
     */
    public function getObservationPart()
    {
        return $this->observationPart;
    }
	
			/**
     * Set observationInter
     *
     * @param string $observationInter
     *
     * @return transmission_dossier
     */
    public function setObservationInter($observationInter)
    {
        $this->observationInter = $observationInter;

        return $this;
    }

    /**
     * Get observationInter
     *
     * @return string
     */
    public function getObservationInter()
    {
        return $this->observationInter;
    }
	
    /**
     * Set demande
     *
     * @param string $demande
     *
     * @return transmission_dossier
     */
    public function setDemande(\AppBundle\Entity\nature_dossier $demande)
    {
        $this->demande = $demande;

        return $this;
    }

    /**
     * Get demande
     *
     * @return string
     */
    public function getDemande()
    {
        return $this->demande;
    }

        /**
     * Set observation
     *
     * @param string $observation
     *
     * @return transmission_dossier
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set naissance
     *
     * @param date $naissance
     *
     * @return transmission_dossier
     */
    public function setNaissance($naissance)
    {
        $this->naissance = $naissance;

        return $this;
    }

    /**
     * Get naissance
     *
     * @return date
     */
    public function getNaissance()
    {
        return $this->naissance;
    }

    /**
     * Set agent
     *
     * @param string $agent
     *
     * @return transmission_dossier
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get agent
     *
     * @return string
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return transmission_dossier
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set nomPatro
     *
     * @param string $nomPatro
     *
     * @return transmission_dossier
     */
    public function setNomPatro($nomPatro)
    {
        $this->nomPatro = $nomPatro;

        return $this;
    }

    /**
     * Get nomPatro
     *
     * @return string
     */
    public function getNomPatro()
    {
        return $this->nomPatro;
    }

    /**
     * Set nomMari
     *
     * @param string $nomMari
     *
     * @return transmission_dossier
     */
    public function setNomMari($nomMari)
    {
        $this->nomMari = $nomMari;

        return $this;
    }

    /**
     * Get nomMari
     *
     * @return string
     */
    public function getNomMari()
    {
        return $this->nomMari;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return transmission_dossier
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set Partenaire
     *
     * @param \AppBundle\Entity\Structure $partenaire
     *
     * @return transmission_dossier
     */
    public function setPartenaire(\AppBundle\Entity\Structure $partenaire)
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    /**
     * Get partenaire
     *
     * @return \AppBundle\Entity\Structure
     */
    public function getPartenaire()
    {
        return $this->partenaire;
    }
	
    /**
     * Set dateTransmission
     *
     * @param date $dateTransmission
     *
     * @return transmission_dossier
     */
    public function setDateTransmission($dateTransmission)
    {
        $this->dateTransmission = $dateTransmission;

        return $this;
    }

    /**
     * Get dateTransmission
     *
     * @return date
     */
    public function getdateTransmission()
    {
        return $this->dateTransmission;
    }
	/**
     * Set decision
     *
     * @param string $decision
     *
     * @return transmission_dossier
     */
    public function setDecision(\AppBundle\Entity\type_decision $decision)
    {
        $this->decision = $decision;

        return $this;
    }

    /**
     * Get decision
     *
     * @return string
     */
    public function getDecision()
    {
        return $this->decision;
    }

/**
     * Set urgence
     *
     * @param boolean $urgence
     *
     * @return transmission_dossier
     */
    public function setUrgence($urgence)
    {
        $this->urgence = $urgence;

        return $this;
    }

    /**
     * Get urgence
     *
     * @return boolean
     */
    public function getUrgence()
    {
        return $this->urgence;
    }	
	 /**
     * Set pj
     *
     * @param string $pj
     *
     * @return string
     */
    public function setPJ($pj)
    {
        $this->pj = $pj;

        return $this;
    }
	
	 /**
     * Get pj
     *
     * @return string
     */
    public function getPJ()
    {
        return $this->pj;
    }	
}
