<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * nature_dossier
 *
 * @ORM\Table(name="nature_dossier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\nature_dossierRepository")
 */
class nature_dossier
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
     * @ORM\Column(name="libelle", type="string", length=100, unique=true)
     */
    private $libelle;
    /**
     * @var string
     *
     * @ORM\Column(name="mail_cpam", type="string", length=70, unique=false)
     */
    private $mail_cpam;	

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return nature_dossier
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
	
    /**
     * Set mail_cpam
     *
     * @param string $mail_cpam
     *
     * @return nature_dossier
     */
    public function setMail_cpam($mail_cpam)
    {
        $this->mail = $mail_cpam;

        return $this;
    }

    /**
     * Get mail_cpam
     *
     * @return string
     */
    public function getMail_cpam()
    {
        return $this->mail_cpam;
    }	
}

