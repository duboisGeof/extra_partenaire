<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeCompte
 *
 * @ORM\Table(name="demande_compte")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DemandeCompteRepository")
 */
class DemandeCompte
{


    const STATUS_EN_ATTENTE = 1;
    const STATUS_ACCEPTEE = 2;
    const STATUS_REFUSEE = 3;


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomStructure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseStructure;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cpStructure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $communeStructure;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mailDiffusion;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomResponsable;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenomResponsable;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telResponsable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mailResponsable;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DemandeStatus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeStructure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;




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
     * Set nomStructure
     *
     * @param string $nomStructure
     *
     * @return DemandeCompte
     */
    public function setNomStructure($nomStructure)
    {
        $this->nomStructure = $nomStructure;

        return $this;
    }

    /**
     * Get nomStructure
     *
     * @return string
     */
    public function getNomStructure()
    {
        return $this->nomStructure;
    }

    /**
     * Set adresseStructure
     *
     * @param string $adresseStructure
     *
     * @return DemandeCompte
     */
    public function setAdresseStructure($adresseStructure)
    {
        $this->adresseStructure = $adresseStructure;

        return $this;
    }

    /**
     * Get adresseStructure
     *
     * @return string
     */
    public function getAdresseStructure()
    {
        return $this->adresseStructure;
    }

    /**
     * Set cpStructure
     *
     * @param string $cpStructure
     *
     * @return DemandeCompte
     */
    public function setCpStructure($cpStructure)
    {
        $this->cpStructure = $cpStructure;

        return $this;
    }

    /**
     * Get cpStructure
     *
     * @return string
     */
    public function getCpStructure()
    {
        return $this->cpStructure;
    }

    /**
     * Set communeStructure
     *
     * @param string $communeStructure
     *
     * @return DemandeCompte
     */
    public function setCommuneStructure($communeStructure)
    {
        $this->communeStructure = $communeStructure;

        return $this;
    }

    /**
     * Get communeStructure
     *
     * @return string
     */
    public function getCommuneStructure()
    {
        return $this->communeStructure;
    }

    /**
     * Set nomResponsable
     *
     * @param string $nomResponsable
     *
     * @return DemandeCompte
     */
    public function setNomResponsable($nomResponsable)
    {
        $this->nomResponsable = $nomResponsable;

        return $this;
    }

    /**
     * Get nomResponsable
     *
     * @return string
     */
    public function getNomResponsable()
    {
        return $this->nomResponsable;
    }

    /**
     * Set prenomResponsable
     *
     * @param string $prenomResponsable
     *
     * @return DemandeCompte
     */
    public function setPrenomResponsable($prenomResponsable)
    {
        $this->prenomResponsable = $prenomResponsable;

        return $this;
    }

    /**
     * Get prenomResponsable
     *
     * @return string
     */
    public function getPrenomResponsable()
    {
        return $this->prenomResponsable;
    }

    /**
     * Set telResponsable
     *
     * @param string $telResponsable
     *
     * @return DemandeCompte
     */
    public function setTelResponsable($telResponsable)
    {
        $this->telResponsable = $telResponsable;

        return $this;
    }

    /**
     * Get telResponsable
     *
     * @return string
     */
    public function getTelResponsable()
    {
        return $this->telResponsable;
    }

    /**
     * Set mailResponsable
     *
     * @param string $mailResponsable
     *
     * @return DemandeCompte
     */
    public function setMailResponsable($mailResponsable)
    {
        $this->mailResponsable = $mailResponsable;

        return $this;
    }

    /**
     * Get mailResponsable
     *
     * @return string
     */
    public function getMailResponsable()
    {
        return $this->mailResponsable;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return DemandeCompte
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return DemandeCompte
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
     * Set tel
     *
     * @param string $tel
     *
     * @return DemandeCompte
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
     * Set mail
     *
     * @param string $mail
     *
     * @return DemandeCompte
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return DemandeCompte
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\TypeStructure $type
     *
     * @return DemandeCompte
     */
    public function setType(\AppBundle\Entity\TypeStructure $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\TypeStructure
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set mailDiffusion
     *
     * @param string $maildiffusion
     *
     * @return User
     */
    public function setMailDiffusion($mailDiffusion)
    {
        $this->mailDiffusion = $mailDiffusion;

        return $this;
    }

    /**
     * Get mailDiffusion
     *
     * @return string
     */
    public function getMailDiffusion()
    {
        return $this->mailDiffusion;
    }



}
