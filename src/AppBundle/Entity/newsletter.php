<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * newsletter
 *
 * @ORM\Table(name="newsletter")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\newsletterRepository")
 */
class newsletter
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
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",cascade={"persist"})
      * @ORM\JoinColumn(nullable=false)
      */
	
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
	 * 
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "Merci de saisir un titre plus long",
     * )
     */
   
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;
	
	/**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModification", type="datetime", nullable=true)
     */
    private $dateModification;


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
     * @return newsletter
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return newsletter
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return offre
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }
	
	/**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }
    
    
	/**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return user
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get faqtheme
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}

