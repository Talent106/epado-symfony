<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * OrderStatus
 *
 * @ORM\Table(name="mail")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Entity\OrderStatusRepository")
 */
class Mail
{
    use ORMBehaviors\Translatable\Translatable;
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="created_mails", cascade={"persist"})
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=true)
     */
    protected $creator;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $send_mail;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $send_sms;
    
    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(name="updated", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;
    
    /**
     * @ORM\Column(name="deleted", type="datetime", nullable=true)
     */
    private $deleted;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * @param $method
     * @param $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        if (!method_exists(self::getTranslationEntityClass(), $method)) {
            $method = 'get' . ucfirst($method);
        }

        return $this->proxyCurrentLocaleTranslation($method, $args);
    }
    
    public function getName()
    {
        return $this->proxyCurrentLocaleTranslation('getName', array());
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sendMail
     *
     * @param boolean $sendMail
     *
     * @return Mail
     */
    public function setSendMail($sendMail)
    {
        $this->send_mail = $sendMail;

        return $this;
    }

    /**
     * Get sendMail
     *
     * @return boolean
     */
    public function getSendMail()
    {
        return $this->send_mail;
    }

    /**
     * Set sendSms
     *
     * @param boolean $sendSms
     *
     * @return Mail
     */
    public function setSendSms($sendSms)
    {
        $this->send_sms = $sendSms;

        return $this;
    }

    /**
     * Get sendSms
     *
     * @return boolean
     */
    public function getSendSms()
    {
        return $this->send_sms;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Mail
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Mail
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set deleted
     *
     * @param \DateTime $deleted
     *
     * @return Mail
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return \DateTime
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     *
     * @return Mail
     */
    public function setCreator(\AppBundle\Entity\User $creator = null)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Get creator
     *
     * @return \AppBundle\Entity\User
     */
    public function getCreator()
    {
        return $this->creator;
    }
}
