<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeCompte")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Structure")
      * @ORM\JoinColumn(nullable=true)
      */
    private $structure;

    /**
      * @ORM\OneToOne(targetEntity="AppBundle\Entity\Contact")
      * @ORM\JoinColumn(nullable=false)
      */
    private $contact;


    public function __construct()
    {
        parent::__construct();
    }

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
     * Set type
     *
     * @param \AppBundle\Entity\TypeCompte $type
     *
     * @return User
     */
    public function setType(\AppBundle\Entity\TypeCompte $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\TypeCompte
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set structure
     *
     * @param \AppBundle\Entity\Structure $structure
     *
     * @return User
     */
    public function setStructure(\AppBundle\Entity\Structure $structure)
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * Get structure
     *
     * @return \AppBundle\Entity\Structure
     */
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * Set contact
     *
     * @param \AppBundle\Entity\Contact $contact
     *
     * @return User
     */
    public function setContact(\AppBundle\Entity\Contact $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \AppBundle\Entity\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

}
