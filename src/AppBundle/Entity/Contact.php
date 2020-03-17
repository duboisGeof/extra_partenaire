<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 * @ORM\Table(name="contact")
 */
class Contact
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
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $refOp;

    /**
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeContact")
      * @ORM\JoinColumn(nullable=false)
      */
    private $type;
	
    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $newsletter;	
	
    
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Structure
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
     * @return Structure
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
     * Set refOp
     *
     * @param string $refOp
     *
     * @return User
     */
    public function setRefOp($refOp)
    {
        $this->refOp = $refOp;

        return $this;
    }

    /**
     * Get refOp
     *
     * @return boolean
     */
    public function getRefOp()
    {
        return $this->refOp;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\TypeContact $type
     *
     * @return User
     */
    public function setType(\AppBundle\Entity\TypeContact $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\TypeContact
     */
    public function getType()
    {
        return $this->type;
    }

	
	/**
     * Set newsletter
     *
     * @param string $newsletter
     *
     * @return User
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $rnewsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return boolean
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }


}
