<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * OrderStatus
 *
 * @ORM\Table(name="order_status")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Entity\OrderStatusRepository")
 */
class OrderStatus
{
    use ORMBehaviors\Translatable\Translatable;
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Order", mappedBy="status")
     */
    protected $orders;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrderStatusHistory", mappedBy="status")
     */
    protected $status_history;
    
    

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="created_order_statuses", cascade={"persist"})
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $contractor_confirmation; //Wykonawca potwierdził wykonanie usługi
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $customer_confirmation; //Klient potwierdził wykonanie usługi
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $payment_manual; //Opłacono
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $payment_success; //Opłacono online
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $payment_fail; //Nieudana płatność online
    
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $confirmed; //Zamówienie dodane 
      
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $done; //Zamówienie zakończone
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $canceled; //Anulowano zamówienie
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $first;  //Utworzono koszyk
    
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
     * Add orders
     *
     * @param \AppBundle\Entity\Order $orders
     * @return OrderStatus
     */
    public function addOrder(\AppBundle\Entity\Order $orders)
    {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \AppBundle\Entity\Order $orders
     */
    public function removeOrder(\AppBundle\Entity\Order $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     * @return OrderStatus
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
     * Set created
     *
     * @param \DateTime $created
     * @return OrderStatus
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
     * @return OrderStatus
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
     * Set paid
     *
     * @param boolean $paid
     * @return OrderStatus
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get paid
     *
     * @return boolean 
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set sent
     *
     * @param boolean $sent
     * @return OrderStatus
     */
    public function setSent($sent)
    {
        $this->sent = $sent;

        return $this;
    }

    /**
     * Get sent
     *
     * @return boolean 
     */
    public function getSent()
    {
        return $this->sent;
    }

    /**
     * Set delivered
     *
     * @param boolean $delivered
     * @return OrderStatus
     */
    public function setDelivered($delivered)
    {
        $this->delivered = $delivered;

        return $this;
    }

    /**
     * Get delivered
     *
     * @return boolean 
     */
    public function getDelivered()
    {
        return $this->delivered;
    }

    /**
     * Set confirmed
     *
     * @param boolean $confirmed
     * @return OrderStatus
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * Get confirmed
     *
     * @return boolean 
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Set done
     *
     * @param boolean $done
     * @return OrderStatus
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return boolean 
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Add status_history
     *
     * @param \AppBundle\Entity\OrderStatusHistory $statusHistory
     * @return OrderStatus
     */
    public function addStatusHistory(\AppBundle\Entity\OrderStatusHistory $statusHistory)
    {
        $this->status_history[] = $statusHistory;

        return $this;
    }

    /**
     * Remove status_history
     *
     * @param \AppBundle\Entity\OrderStatusHistory $statusHistory
     */
    public function removeStatusHistory(\AppBundle\Entity\OrderStatusHistory $statusHistory)
    {
        $this->status_history->removeElement($statusHistory);
    }

    /**
     * Get status_history
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStatusHistory()
    {
        return $this->status_history;
    }

    /**
     * Set sendMail
     *
     * @param boolean $sendMail
     *
     * @return OrderStatus
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
     * Set canceled
     *
     * @param boolean $canceled
     *
     * @return OrderStatus
     */
    public function setCanceled($canceled)
    {
        $this->canceled = $canceled;

        return $this;
    }

    /**
     * Get canceled
     *
     * @return boolean
     */
    public function getCanceled()
    {
        return $this->canceled;
    }

    /**
     * Set first
     *
     * @param boolean $first
     *
     * @return OrderStatus
     */
    public function setFirst($first)
    {
        $this->first = $first;

        return $this;
    }

    /**
     * Get first
     *
     * @return boolean
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * Set deleted
     *
     * @param \DateTime $deleted
     *
     * @return OrderStatus
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
     * Set contractorConfirmation
     *
     * @param boolean $contractorConfirmation
     *
     * @return OrderStatus
     */
    public function setContractorConfirmation($contractorConfirmation)
    {
        $this->contractor_confirmation = $contractorConfirmation;

        return $this;
    }

    /**
     * Get contractorConfirmation
     *
     * @return boolean
     */
    public function getContractorConfirmation()
    {
        return $this->contractor_confirmation;
    }

    /**
     * Set customerConfirmation
     *
     * @param boolean $customerConfirmation
     *
     * @return OrderStatus
     */
    public function setCustomerConfirmation($customerConfirmation)
    {
        $this->customer_confirmation = $customerConfirmation;

        return $this;
    }

    /**
     * Get customerConfirmation
     *
     * @return boolean
     */
    public function getCustomerConfirmation()
    {
        return $this->customer_confirmation;
    }

    /**
     * Set paymentManual
     *
     * @param boolean $paymentManual
     *
     * @return OrderStatus
     */
    public function setPaymentManual($paymentManual)
    {
        $this->payment_manual = $paymentManual;

        return $this;
    }

    /**
     * Get paymentManual
     *
     * @return boolean
     */
    public function getPaymentManual()
    {
        return $this->payment_manual;
    }

    /**
     * Set paymentSuccess
     *
     * @param boolean $paymentSuccess
     *
     * @return OrderStatus
     */
    public function setPaymentSuccess($paymentSuccess)
    {
        $this->payment_success = $paymentSuccess;

        return $this;
    }

    /**
     * Get paymentSuccess
     *
     * @return boolean
     */
    public function getPaymentSuccess()
    {
        return $this->payment_success;
    }

    /**
     * Set paymentFail
     *
     * @param boolean $paymentFail
     *
     * @return OrderStatus
     */
    public function setPaymentFail($paymentFail)
    {
        $this->payment_fail = $paymentFail;

        return $this;
    }

    /**
     * Get paymentFail
     *
     * @return boolean
     */
    public function getPaymentFail()
    {
        return $this->payment_fail;
    }

    /**
     * Set sendSms
     *
     * @param boolean $sendSms
     *
     * @return OrderStatus
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
}
