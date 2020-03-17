<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\offreRepository")
 */
class offre
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_offre", type="string", length=255)
     */
    private $nomOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime")
     */
    private $dateFin;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="effacer", type="boolean", nullable=true)
     */
    private $effacer;


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
     * Set nomOffre
     *
     * @param string $nomOffre
     *
     * @return offre
     */
    public function setNomOffre($nomOffre)
    {
        $this->nomOffre = $nomOffre;

        return $this;
    }

    /**
     * Get nomOffre
     *
     * @return string
     */
    public function getNomOffre()
    {
        return $this->nomOffre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return offre
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
	
/**
     * Set effacer
     *
     * @param boolean $effacer
     *
     * @return offre
     */
    public function setEffacer($effacer)
    {
        $this->effacer = $effacer;

        return $this;
    }

    /**
     * Get effacer
     *
     * @return boolean
     */
    public function getEffacer()
    {
        return $this->effacer;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return offre
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return offre
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

}

