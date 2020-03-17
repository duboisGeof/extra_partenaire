<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * information
 *
 * @ORM\Table(name="information")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\informationRepository")
 */
class information
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;
	
	/**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModification", type="datetime")
     */
    private $dateModification;

    /**
     * @var string
     *
     * @ORM\Column(name="urlPath", type="string", length=255, nullable=true)
     */
    private $urlPath;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return information
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return information
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     *
     * @return information
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set urlPath
     *
     * @param string $urlPath
     *
     * @return information
     */
    public function setUrlPath($urlPath)
    {
        $this->urlPath = $urlPath;

        return $this;
    }

    /**
     * Get urlPath
     *
     * @return string
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }
}

