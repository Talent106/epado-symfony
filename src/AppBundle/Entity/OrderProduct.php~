<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * OrderProduct
 *
 * @ORM\Table(name="order_product")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity()
 */
class OrderProduct
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Product", inversedBy="order_products", cascade={"persist"})
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=true)
     */
    protected $product;
    
    //* @ORM\OneToOne(targetEntity="Code", inversedBy="order_product_side")
     
    /**
     * @ORM\OneToOne(targetEntity="Code", inversedBy="order_product_side")
     * @ORM\JoinColumn(name="code_id", referencedColumnName="id", nullable=true)
     */
    protected $code;
    
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Code", mappedBy="order_product")
     */
    protected $code_side;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Code", mappedBy="order_product_many")
     */
    protected $codes;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Page", inversedBy="order_products", cascade={"persist"})
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id", nullable=true)
     */
    protected $page;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Order", inversedBy="order_products", cascade={"persist"})
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=true)
     */
    protected $order;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Image", inversedBy="order_products")
     * @ORM\JoinColumn(name="default_image_id", referencedColumnName="id", nullable=true)
     * @ORM\OrderBy({"sort" = "ASC", "created" = "DESC"})
     */
    protected $image;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Image", mappedBy="order_product", cascade={"persist"})
     */
    protected $images;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="contracted_orders", cascade={"persist"})
     * @ORM\JoinColumn(name="contractor_id", referencedColumnName="id", nullable=true)
     */
    protected $contractor;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="created_order_products", cascade={"persist"})
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=true)
     */
    protected $creator;
    
    /**
     * @ORM\Column(type="boolean", options={"default": false}, nullable=true)
     */
    protected $confirmation=false;
    
    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    protected $rating=null;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $review;
    
    /**
     * @ORM\Column(name="customer_confirmed", type="datetime", nullable=true)
     */
    protected $customer_confirmed;

    
    /**
     * @ORM\Column(name="contractor_confirmed", type="datetime", nullable=true)
     */
    protected $contractor_confirmed;
    
    
    
    /**
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(groups={"registration"})
     * @Assert\Length(min=3, groups={"registration"})
     */
    private $name;

    

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
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $amount;
    

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
    
    
    public function getPartnerStock()
    {
        return $this->getProduct()->getStockPartner();
    }
    
    public function getAllStock()
    {
        return $this->getProduct()->getStock()+$this->getProduct()->getStockPartner();
    }
    
    public function getStock()
    {
        return $this->getProduct()->getStock();
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
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     * @return OrderProduct
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set order
     *
     * @param \AppBundle\Entity\Order $order
     * @return OrderProduct
     */
    public function setOrder(\AppBundle\Entity\Order $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \AppBundle\Entity\Order 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     * @return OrderProduct
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
     * Set name
     *
     * @param string $name
     * @return OrderProduct
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
     * Set price
     *
     * @param string $price
     * @return OrderProduct
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
     * Set tax
     *
     * @param string $tax
     * @return OrderProduct
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return string 
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     * @return OrderProduct
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return OrderProduct
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
     * @return OrderProduct
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
     * Set price_buy
     *
     * @param string $priceBuy
     * @return OrderProduct
     */
    public function setPriceBuy($priceBuy)
    {
        $this->price_buy = $priceBuy;

        return $this;
    }

    /**
     * Get price_buy
     *
     * @return string 
     */
    public function getPriceBuy()
    {
        return $this->price_buy;
    }


    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return OrderProduct
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
     * Set page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return OrderProduct
     */
    public function setPage(\AppBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \AppBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set contractor
     *
     * @param \AppBundle\Entity\User $contractor
     *
     * @return OrderProduct
     */
    public function setContractor(\AppBundle\Entity\User $contractor = null)
    {
        $this->contractor = $contractor;

        return $this;
    }

    /**
     * Get contractor
     *
     * @return \AppBundle\Entity\User
     */
    public function getContractor()
    {
        return $this->contractor;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set confirmation
     *
     * @param boolean $confirmation
     *
     * @return OrderProduct
     */
    public function setConfirmation($confirmation)
    {
        $this->confirmation = $confirmation;

        return $this;
    }

    /**
     * Get confirmation
     *
     * @return boolean
     */
    public function getConfirmation()
    {
        return $this->confirmation;
    }

    /**
     * Set customerConfirmed
     *
     * @param \DateTime $customerConfirmed
     *
     * @return OrderProduct
     */
    public function setCustomerConfirmed($customerConfirmed)
    {
        $this->customer_confirmed = $customerConfirmed;

        return $this;
    }

    /**
     * Get customerConfirmed
     *
     * @return \DateTime
     */
    public function getCustomerConfirmed()
    {
        return $this->customer_confirmed;
    }

    /**
     * Set contractorConfirmed
     *
     * @param \DateTime $contractorConfirmed
     *
     * @return OrderProduct
     */
    public function setContractorConfirmed($contractorConfirmed)
    {
        $this->contractor_confirmed = $contractorConfirmed;

        return $this;
    }

    /**
     * Get contractorConfirmed
     *
     * @return \DateTime
     */
    public function getContractorConfirmed()
    {
        return $this->contractor_confirmed;
    }

    /**
     * Add image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return OrderProduct
     */
    public function addImage(\AppBundle\Entity\Image $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AppBundle\Entity\Image $image
     */
    public function removeImage(\AppBundle\Entity\Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }
    
    public function getImagesSort()
    {
        $values = $this->getImages()->getValues();
        $name='getSort';
        usort($values, function ($a, $b) use ($name) {
            return $a->$name()>$b->$name();
        });
        return $values;
    }

    /**
     * Set code
     *
     * @param \AppBundle\Entity\Code $code
     *
     * @return OrderProduct
     */
    public function setCode(\AppBundle\Entity\Code $code = null)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return \AppBundle\Entity\Code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add code
     *
     * @param \AppBundle\Entity\Code $code
     *
     * @return OrderProduct
     */
    public function addCode(\AppBundle\Entity\Code $code)
    {
        $this->codes[] = $code;

        return $this;
    }

    /**
     * Remove code
     *
     * @param \AppBundle\Entity\Code $code
     */
    public function removeCode(\AppBundle\Entity\Code $code)
    {
        $this->codes->removeElement($code);
    }

    /**
     * Get codes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * Set image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return OrderProduct
     */
    public function setImage(\AppBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AppBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set rating
     *
     * @param string $rating
     *
     * @return OrderProduct
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set rewiev
     *
     * @param string $rewiev
     *
     * @return OrderProduct
     */
    public function setRewiev($rewiev)
    {
        $this->rewiev = $rewiev;

        return $this;
    }

    /**
     * Get rewiev
     *
     * @return string
     */
    public function getRewiev()
    {
        return $this->rewiev;
    }

    /**
     * Set review
     *
     * @param string $review
     *
     * @return OrderProduct
     */
    public function setReview($review)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return string
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Set codeSide
     *
     * @param \AppBundle\Entity\Code $codeSide
     *
     * @return OrderProduct
     */
    public function setCodeSide(\AppBundle\Entity\Code $codeSide = null)
    {
        $this->code_side = $codeSide;

        return $this;
    }

    /**
     * Get codeSide
     *
     * @return \AppBundle\Entity\Code
     */
    public function getCodeSide()
    {
        return $this->code_side;
    }

    /**
     * Set discount
     *
     * @param string $discount
     *
     * @return OrderProduct
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
     * @return OrderProduct
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
     * @return OrderProduct
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
     * @return OrderProduct
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
}
