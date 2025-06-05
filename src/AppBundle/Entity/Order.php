<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * Order
 *
 * @ORM\Table(name="orders")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Entity\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
 
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrderProduct", mappedBy="order")
     */
    protected $order_products;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrderStatusHistory", mappedBy="order")
     */
    protected $status_history;

    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Payment", mappedBy="order")
     */
    protected $payments;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User", mappedBy="cart")
     */
    protected $cart_owners;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\OrderStatus", inversedBy="orders", cascade={"persist"})
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id", nullable=true)
     */
    protected $status;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="orders", cascade={"persist"})
     * @ORM\JoinColumn(name="buyer_id", referencedColumnName="id", nullable=true)
     */
    protected $buyer;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="parent_partner_orders", cascade={"persist"})
     * @ORM\JoinColumn(name="parent_partner_id", referencedColumnName="id", nullable=true)
     */
    protected $parent_partner;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="partner_orders", cascade={"persist"})
     * @ORM\JoinColumn(name="partner_id", referencedColumnName="id", nullable=true)
     */
    protected $partner;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="created_orders", cascade={"persist"})
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=true)
     */
    protected $creator;

    /**
     * @ORM\Column(name="note", type="string", length=1200, nullable=true)
     */
    protected $note;
   
    /**
     * @ORM\Column(type="string", length=1200, nullable=true)
     */
    protected $delivery;
    
    /**
     * @ORM\Column(type="string", length=1200, nullable=true)
     */
    protected $billing;
    
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Address", inversedBy="billing_orders", cascade={"persist"})
     * @ORM\JoinColumn(name="billing_address_id", referencedColumnName="id", nullable=true)
     */
    protected $billing_address;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Address", inversedBy="delivery_orders", cascade={"persist"})
     * @ORM\JoinColumn(name="delivery_address_id", referencedColumnName="id", nullable=true)
     */
    protected $delivery_address;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $invoice_id;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $contractor_id;
    
    
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $invoice_type;
    
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $invoice_number; 
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $paid;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $confirmed;   
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $done;   
    

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $canceled;   
    
    /**
     * @ORM\Column(name="deleted", type="datetime", nullable=true)
     */
    private $deleted;
    
    
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
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    protected $discount;  
    
    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    protected $provision;
    
    
    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    protected $discount_price;  
    
    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    protected $provision_price;
    
    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    protected $price;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=255, nullable=true)
     */
    private $currency;

    /**
     * @ORM\Column(name="locale", type="string", length=255, nullable=true)
     */
    private $locale;
    
    /**
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     */
    protected $products_count;
    
    /**
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     */
    protected $items_count; 
    

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $invoice=false;
    
    
    public function onlinePayment()
    {
        foreach($this->getOrderProducts() as $op){
            
            $product=$op->getProduct();
            $times=$op->getAmount();
            
            if($product->getMonths() && $product->getType()->getId()==1 && $times>0){
               for ($i = 0; $i < $times; $i++) { 
                 $op->getPage()->expiredFromProduct($product);
               } 
            }
            
        } 
        
        return true;
    } 
    
    
    
    /**
     * Set note
     *
     * @param string $note
     * @return Order
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     * @return Order
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
     * Set status
     *
     * @param \AppBundle\Entity\OrderStatus $status
     * @return Order
     */
    public function setStatus(\AppBundle\Entity\OrderStatus $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\OrderStatus 
     */
    public function getStatus()
    {
        return $this->status;
    }
    

    public function getCurrentStatus()
    {
        if($this->status)
        return $this->status->getName();
        else
        return 'Brak';
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
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add products
     *
     * @param \AppBundle\Entity\OrderProduct $products
     * @return Order
     */
    public function addProduct(\AppBundle\Entity\OrderProduct $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \AppBundle\Entity\OrderProduct $products
     */
    public function removeProduct(\AppBundle\Entity\OrderProduct $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Order
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
     * Add order_products
     *
     * @param \AppBundle\Entity\OrderProduct $orderProducts
     * @return Order
     */
    public function addOrderProduct(\AppBundle\Entity\OrderProduct $orderProducts)
    {
        $this->order_products[] = $orderProducts;

        return $this;
    }

    /**
     * Remove order_products
     *
     * @param \AppBundle\Entity\OrderProduct $orderProducts
     */
    public function removeOrderProduct(\AppBundle\Entity\OrderProduct $orderProducts)
    {
        $this->order_products->removeElement($orderProducts);
    }

    /**
     * Get order_products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderProducts()
    {
        return $this->order_products;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Order
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
     * @return Order
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
     * Set sent
     *
     * @param boolean $sent
     * @return Order
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
     * @return Order
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
     * @return Order
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
     * Set deleted
     *
     * @param \DateTime $deleted
     * @return Order
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
     * Add status_history
     *
     * @param \AppBundle\Entity\OrderStatusHistory $statusHistory
     * @return Order
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
     * Set price
     *
     * @param string $price
     * @return Order
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set products_count
     *
     * @param integer $productsCount
     * @return Order
     */
    public function setProductsCount($productsCount)
    {
        $this->products_count = $productsCount;

        return $this;
    }

    /**
     * Get products_count
     *
     * @return integer 
     */
    public function getProductsCount()
    {
        return $this->products_count;
    }

    /**
     * Set items_count
     *
     * @param integer $itemsCount
     * @return Order
     */
    public function setItemsCount($itemsCount)
    {
        $this->items_count = $itemsCount;

        return $this;
    }

    /**
     * Get items_count
     *
     * @return integer 
     */
    public function getItemsCount()
    {
        return $this->items_count;
    }

    /**
     * Set canceled
     *
     * @param \DateTime $canceled
     * @return Order
     */
    public function setCanceled($canceled)
    {
        $this->canceled = $canceled;

        return $this;
    }

    /**
     * Get canceled
     *
     * @return \DateTime 
     */
    public function getCanceled()
    {
        return $this->canceled;
    }

    /**
     * Set done
     *
     * @param \DateTime $done
     * @return Order
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return \DateTime 
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set paid
     *
     * @param \DateTime $paid
     * @return Order
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get paid
     *
     * @return \DateTime 
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set manager
     *
     * @param \AppBundle\Entity\User $manager
     * @return Order
     */
    public function setManager(\AppBundle\Entity\User $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return \AppBundle\Entity\User 
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Set price_work
     *
     * @param string $priceWork
     * @return Order
     */
    public function setPriceWork($priceWork)
    {
        $this->price_work = $priceWork;
    
        return $this;
    }

    /**
     * Get price_work
     *
     * @return string 
     */
    public function getPriceWork()
    {
        return $this->price_work;
    }

    /**
     * Set buyer
     *
     * @param \AppBundle\Entity\User $buyer
     *
     * @return Order
     */
    public function setBuyer(\AppBundle\Entity\User $buyer = null)
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * Get buyer
     *
     * @return \AppBundle\Entity\User
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Order
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set locale
     *
     * @param string $locale
     *
     * @return Order
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Add payment
     *
     * @param \AppBundle\Entity\Payment $payment
     *
     * @return Order
     */
    public function addPayment(\AppBundle\Entity\Payment $payment)
    {
        $this->payments[] = $payment;

        return $this;
    }

    /**
     * Remove payment
     *
     * @param \AppBundle\Entity\Payment $payment
     */
    public function removePayment(\AppBundle\Entity\Payment $payment)
    {
        $this->payments->removeElement($payment);
    }

    /**
     * Get payments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Set delivery
     *
     * @param string $delivery
     *
     * @return Order
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * Get delivery
     *
     * @return string
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Set billing
     *
     * @param string $billing
     *
     * @return Order
     */
    public function setBilling($billing)
    {
        $this->billing = $billing;

        return $this;
    }

    /**
     * Get billing
     *
     * @return string
     */
    public function getBilling()
    {
        return $this->billing;
    }

    /**
     * Set invoice
     *
     * @param boolean $invoice
     *
     * @return Order
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return boolean
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set invoiceId
     *
     * @param integer $invoiceId
     *
     * @return Order
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoice_id = $invoiceId;

        return $this;
    }

    /**
     * Get invoiceId
     *
     * @return integer
     */
    public function getInvoiceId()
    {
        return $this->invoice_id;
    }

    /**
     * Set contractorId
     *
     * @param integer $contractorId
     *
     * @return Order
     */
    public function setContractorId($contractorId)
    {
        $this->contractor_id = $contractorId;

        return $this;
    }

    /**
     * Get contractorId
     *
     * @return integer
     */
    public function getContractorId()
    {
        return $this->contractor_id;
    }

    /**
     * Set invoiceType
     *
     * @param string $invoiceType
     *
     * @return Order
     */
    public function setInvoiceType($invoiceType)
    {
        $this->invoice_type = $invoiceType;

        return $this;
    }

    /**
     * Get invoiceType
     *
     * @return string
     */
    public function getInvoiceType()
    {
        return $this->invoice_type;
    }

    /**
     * Set billingAddress
     *
     * @param \AppBundle\Entity\Address $billingAddress
     *
     * @return Order
     */
    public function setBillingAddress(\AppBundle\Entity\Address $billingAddress = null)
    {
        $this->billing_address = $billingAddress;

        return $this;
    }

    /**
     * Get billingAddress
     *
     * @return \AppBundle\Entity\Address
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * Set deliveryAddress
     *
     * @param \AppBundle\Entity\Address $deliveryAddress
     *
     * @return Order
     */
    public function setDeliveryAddress(\AppBundle\Entity\Address $deliveryAddress = null)
    {
        $this->delivery_address = $deliveryAddress;

        return $this;
    }

    /**
     * Get deliveryAddress
     *
     * @return \AppBundle\Entity\Address
     */
    public function getDeliveryAddress()
    {
        return $this->delivery_address;
    }

    /**
     * Set invoiceNumber
     *
     * @param string $invoiceNumber
     *
     * @return Order
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoice_number = $invoiceNumber;

        return $this;
    }

    /**
     * Get invoiceNumber
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoice_number;
    }

    /**
     * Add cartOwner
     *
     * @param \AppBundle\Entity\User $cartOwner
     *
     * @return Order
     */
    public function addCartOwner(\AppBundle\Entity\User $cartOwner)
    {
        $this->cart_owners[] = $cartOwner;

        return $this;
    }

    /**
     * Remove cartOwner
     *
     * @param \AppBundle\Entity\User $cartOwner
     */
    public function removeCartOwner(\AppBundle\Entity\User $cartOwner)
    {
        $this->cart_owners->removeElement($cartOwner);
    }

    /**
     * Get cartOwners
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCartOwners()
    {
        return $this->cart_owners;
    }

    /**
     * Set discount
     *
     * @param string $discount
     *
     * @return Order
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return string
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set provision
     *
     * @param string $provision
     *
     * @return Order
     */
    public function setProvision($provision)
    {
        $this->provision = $provision;

        return $this;
    }

    /**
     * Get provision
     *
     * @return string
     */
    public function getProvision()
    {
        return $this->provision;
    }

    /**
     * Set discountPrice
     *
     * @param string $discountPrice
     *
     * @return Order
     */
    public function setDiscountPrice($discountPrice)
    {
        $this->discount_price = $discountPrice;

        return $this;
    }

    /**
     * Get discountPrice
     *
     * @return string
     */
    public function getDiscountPrice()
    {
        return $this->discount_price;
    }

    /**
     * Set provisionPrice
     *
     * @param string $provisionPrice
     *
     * @return Order
     */
    public function setProvisionPrice($provisionPrice)
    {
        $this->provision_price = $provisionPrice;

        return $this;
    }

    /**
     * Get provisionPrice
     *
     * @return string
     */
    public function getProvisionPrice()
    {
        return $this->provision_price;
    }

    /**
     * Set parentPartner
     *
     * @param \AppBundle\Entity\User $parentPartner
     *
     * @return Order
     */
    public function setParentPartner(\AppBundle\Entity\User $parentPartner = null)
    {
        $this->parent_partner = $parentPartner;

        return $this;
    }

    /**
     * Get parentPartner
     *
     * @return \AppBundle\Entity\User
     */
    public function getParentPartner()
    {
        return $this->parent_partner;
    }

    /**
     * Set partner
     *
     * @param \AppBundle\Entity\User $partner
     *
     * @return Order
     */
    public function setPartner(\AppBundle\Entity\User $partner = null)
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * Get partner
     *
     * @return \AppBundle\Entity\User
     */
    public function getPartner()
    {
        return $this->partner;
    }
}
