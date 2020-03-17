<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * faq_question
 *
 * @ORM\Table(name="faq_question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\faq_questionRepository")
 */
class faq_question
{
  	 /**
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",cascade={"persist"})
      * @ORM\JoinColumn(nullable=false)
      */
	private $questionpartenaire;

  	 /**
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\faq_theme",cascade={"persist"})
      * @ORM\JoinColumn(nullable=false)
      */
	
	private $faqtheme;

  	 /**
      * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Contact",cascade={"persist"})
      * @ORM\JoinColumn(nullable=true)
      */
	
	private $contact;
	
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
     * @ORM\Column(name="question", type="string", length=500)
     */
    private $question;


    /**
     * @var string
     *
     * @ORM\Column(name="reponse", type="string", length=500, nullable=true)
     */
    private $reponse;

    /**
     * @var string
     *
     * @ORM\Column(name="dans_faq", type="string", length=1)
     */
    private $dansFaq;

    /**
     * @var string
     *
     * @ORM\Column(name="question_reformule", type="string", length=500, nullable=true)
     */
    private $questionReformule;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse_reformule", type="string", length=500, nullable=true)
     */
    private $reponseReformule;

	/**
     * @var date
     *
     * @ORM\Column(name="date_question", type="date")
     */
    private $date_question;  
	
	/**
     * @var date
     *
     * @ORM\Column(name="date_reponse", type="date", nullable=true)
     */
    private $date_reponse; 
	
	/**
     * @var date
     *
     * @ORM\Column(name="date_faq", type="date", nullable=true)
     */
    private $date_faq;

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
     * Set question
     *
     * @param string $question
     *
     * @return faq_question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

   
    /**
     * Set reponse
     *
     * @param string $reponse
     *
     * @return faq_question
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return string
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set dansFaq
     *
     * @param string $dansFaq
     *
     * @return faq_question
     */
    public function setDansFaq($dansFaq)
    {
        $this->dansFaq = $dansFaq;

        return $this;
    }

    /**
     * Get dansFaq
     *
     * @return string
     */
    public function getDansFaq()
    {
        return $this->dansFaq;
    }

    /**
     * Set questionReformule
     *
     * @param string $questionReformule
     *
     * @return faq_question
     */
    public function setQuestionReformule($questionReformule)
    {
        $this->questionReformule = $questionReformule;

        return $this;
    }

    /**
     * Get questionReformule
     *
     * @return string
     */
    public function getQuestionReformule()
    {
        return $this->questionReformule;
    }

    /**
     * Set reponseReformule
     *
     * @param string $reponseReformule
     *
     * @return faq_question
     */
    public function setReponseReformule($reponseReformule)
    {
        $this->reponseReformule = $reponseReformule;

        return $this;
    }

    /**
     * Get reponseReformule
     *
     * @return string
     */
    public function getReponseReformule()
    {
        return $this->reponseReformule;
    }
	
	/**
     * Set faqtheme
     *
     * @param \AppBundle\Entity\faq_theme $faqtheme
     *
     * @return faq_theme
     */
	
	 public function setFaqtheme(\AppBundle\Entity\faq_theme $faqtheme)
    {
        $this->faqtheme = $faqtheme;

        return $this;
    }

    /**
     * Get faqtheme
     *
     * @return \AppBundle\Entity\faq_theme
     */
    public function getFaqtheme()
    {
        return $this->faqtheme;
    }

	/**
     * Set contact
     *
     * @param \AppBundle\Entity\Contact $contact
     *
     * @return contact
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
	
	/**
     * Set date_question
     *
     * @param date $date_question
     *
     * @return date_question
     */
    public function setDate_question($date_question)
    {
        $this->date_question = $date_question;

        return $this;
    }

    /**
     * Get date_question
     *
     * @return date
     */
    public function getDate_question()
    {
        return $this->date_question;
    }
	
	/**
     * Set date_reponse
     *
     * @param date $date_reponse
     *
     * @return date_reponse
     */
    public function setDate_reponse($date_reponse)
    {
        $this->date_reponse = $date_reponse;

        return $this;
    }

    /**
     * Get date_reponse
     *
     * @return date
     */
    public function getDate_reponse()
    {
        return $this->date_reponse;
    }
	
	/**
     * Set date_faq
     *
     * @param date $date_faq
     *
     * @return date_faq
     */
    public function setDate_faq($date_faq)
    {
        $this->date_faq = $date_faq;

        return $this;
    }

    /**
     * Get date_faq
     *
     * @return date
     */
    public function getDate_faq()
    {
        return $this->date_faq;
    }
	
	
	 public function setQuestionpartenaire(\AppBundle\Entity\User $questionpartenaire)
    {
        $this->questionpartenaire = $questionpartenaire;

        return $this;
    }

    public function getQuestionpartenaire()
    {
        return $this->questionpartenaire;
    }

}

