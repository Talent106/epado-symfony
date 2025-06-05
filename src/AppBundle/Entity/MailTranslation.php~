<?php
namespace AppBundle\Entity;

use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class OrderStatusTranslation
 *
 * @ORM\Entity
 * @ORM\Table(name="mail_translation")
 */
class MailTranslation{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\Column(name="subject", type="text", nullable=true)
     */
    protected $subject;
    
    /**
     * @ORM\Column(name="mail", type="text", nullable=true)
     */
    protected $mail;
    
    /**
     * @ORM\Column(name="sms", type="text", nullable=true)
     */
    protected $sms;
    

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OrderStatusTranslation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return OrderStatusTranslation
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
     * Set subject
     *
     * @param string $subject
     *
     * @return OrderStatusTranslation
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set sms
     *
     * @param string $sms
     *
     * @return OrderStatusTranslation
     */
    public function setSms($sms)
    {
        $this->sms = $sms;

        return $this;
    }

    /**
     * Get sms
     *
     * @return string
     */
    public function getSms()
    {
        return $this->sms;
    }
}
