<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Structure
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StructureRepository")
 * @ORM\Table(name="structure")
 */
class Structure
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $commune;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mailDiffusion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeStructure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $partenariat;
    
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Structure
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Structure
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }


    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }


    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return User
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }


    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }


    /**
     * Set commune
     *
     * @param string $commune
     *
     * @return User
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;

        return $this;
    }


    /**
     * Get commune
     *
     * @return string
     */
    public function getCommune()
    {
        return $this->commune;
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

    /**
     * Set partenariat
     *
     * @param string $partenariat
     *
     * @return User
     */
    public function setPartenariat($partenariat)
    {
        $this->partenariat = $partenariat;

        return $this;
    }

    /**
     * Get partenariat
     *
     * @return boolean
     */
    public function getPartenariat()
    {
        return $this->partenariat;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\TypeStructure $type
     *
     * @return Structure
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

}
