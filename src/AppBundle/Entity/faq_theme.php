<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * faq_theme
 *
 * @ORM\Table(name="faq_theme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\faq_themeRepository")
 */
class faq_theme
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
     * @ORM\Column(name="theme", type="string", length=100)
     */
    private $theme;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_trait", type="string", length=70)
     */
    private $mailTrait;
	
    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=15)
     */
    private $path;	


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
     * Set theme
     *
     * @param string $theme
     *
     * @return faq_theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set mailTrait
     *
     * @param string $mailTrait
     *
     * @return faq_theme
     */
    public function setMailTrait($mailTrait)
    {
        $this->mailTrait = $mailTrait;

        return $this;
    }

    /**
     * Get mailTrait
     *
     * @return string
     */
    public function getMailTrait()
    {
        return $this->mailTrait;
    }
	
		   /**
     * Set path
     *
     * @param string $path
     *
     * @return faq_theme
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }
    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }	
}

