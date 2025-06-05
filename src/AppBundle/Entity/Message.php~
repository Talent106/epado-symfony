<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity()
 */
class Message
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Message", mappedBy="parent")
     */
    protected $messages;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Message", inversedBy="messages", cascade={"persist"})
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    protected $parent;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="updated_messages", cascade={"persist"})
     * @ORM\JoinColumn(name="updater_id", referencedColumnName="id", nullable=true)
     */
    protected $updater;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="created_messages", cascade={"persist"})
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=true)
     */
    protected $creator;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="recived_messages", cascade={"persist"})
     * @ORM\JoinColumn(name="recipient_id", referencedColumnName="id", nullable=true)
     */
    protected $recipient;
    
    
    /**
     * @ORM\Column(name="subject", type="string", length=255, nullable=true)
     * @Assert\NotBlank(groups={"registration"})
     * @Assert\Length(min=3, groups={"registration"})
     */
    protected $subject;
 
    
    /**
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    protected $message;
    
    /**
     * @ORM\Column(name="read_at", type="datetime", nullable=true)
     */
    protected $read;
    
    /**
     * @ORM\Column(name="count_messages", type="integer", nullable=true)
     */
    protected $count;
    
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return Message
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
     * Set message
     *
     * @param string $message
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Message
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
     * @return Message
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
     * Set parent
     *
     * @param \AppBundle\Entity\Message $parent
     * @return Message
     */
    public function setParent(\AppBundle\Entity\Message $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \AppBundle\Entity\Message 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     * @return Message
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

    /**
     * Set recipient
     *
     * @param \AppBundle\Entity\User $recipient
     * @return Message
     */
    public function setRecipient(\AppBundle\Entity\User $recipient = null)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * Get recipient
     *
     * @return \AppBundle\Entity\User 
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Set read
     *
     * @param \DateTime $read
     * @return Message
     */
    public function setRead($read)
    {
        $this->read = $read;

        return $this;
    }

    /**
     * Get read
     *
     * @return \DateTime 
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return Message
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set updater
     *
     * @param \AppBundle\Entity\User $updater
     * @return Message
     */
    public function setUpdater(\AppBundle\Entity\User $updater = null)
    {
        $this->updater = $updater;

        return $this;
    }

    /**
     * Get updater
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUpdater()
    {
        return $this->updater;
    }

    /**
     * Set deleted
     *
     * @param \DateTime $deleted
     *
     * @return Message
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
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add message
     *
     * @param \AppBundle\Entity\Message $message
     *
     * @return Message
     */
    public function addMessage(\AppBundle\Entity\Message $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \AppBundle\Entity\Message $message
     */
    public function removeMessage(\AppBundle\Entity\Message $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
