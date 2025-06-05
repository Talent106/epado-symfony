<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations
use Gedmo\Translatable\Translatable;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

 //* @UniqueEntity(fields="part_number", groups={"create", "update"})
 //* @UniqueEntity(fields="product_id", groups={"create", "update"})
 //* @UniqueEntity(fields="code", groups={"create", "update"})

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProductRepository")
 */
class Product implements Translatable
{
    use ORMBehaviors\Translatable\Translatable;
  
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Image", inversedBy="products")
     * @ORM\JoinColumn(name="default_image_id", referencedColumnName="id", nullable=true)
     */
    protected $image;
    
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Image", mappedBy="product", cascade={"persist"})
     */
    protected $images;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrderProduct", mappedBy="product", cascade={"persist"})
     */
    protected $order_products;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="Country", inversedBy="products")
     * @ORM\JoinTable(name="product_country")
     */
    protected $countries;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserProduct", mappedBy="product")
     */
    protected $contractors;
    
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProductPrice", mappedBy="product", cascade={"persist"})
     */
    protected $prices;
    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $special=false; 
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CodeGroup", mappedBy="product", cascade={"persist"})
     */
    protected $code_groups;    
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProductConnection", mappedBy="product")
     */
    protected $connected_products_from;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProductConnection", mappedBy="product_connected")
     */
    protected $connected_products_to;
    

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PageType", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="page_type_id", referencedColumnName="id", nullable=true)
     */
    protected $page_type;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PageCategory", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="page_category_id", referencedColumnName="id", nullable=true)
     */
    protected $page_category;
    
    
    //* @Assert\NotNull(groups={"create"})
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProductCategory", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=true)
     */
    protected $category;

    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProductType", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=true)
     * @Assert\NotNull(groups={"create"})
     */
    protected $type;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="created_products", cascade={"persist"})
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=true)
     */
    protected $creator;
    
    /**
     * @ORM\Column(name="cities", type="text", nullable=true)
     */
    protected $cities;
 
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $months;
    

    /**
     * @ORM\Column(type="boolean", options={"default": true}, nullable=true)
     */
    protected $enabled=true;   


    /**
     * @ORM\Column(type="boolean", options={"default": false}, nullable=true)
     */
    protected $single=false; 
    
    /**
     * @ORM\Column(type="boolean", options={"default": false}, nullable=true)
     */
    protected $confirmation=false;

    /**
     * @ORM\Column(type="boolean", options={"default": true}, nullable=true)
     */
    protected $in_page=false;  
    
    /**
     * @ORM\Column(type="boolean", options={"default": true}, nullable=true)
     */
    protected $without_code=false;  
    
    /**
     * @ORM\Column(type="boolean", options={"default": true}, nullable=true)
     */
    protected $with_code=false; 
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $model; 

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
    
    public function getAvatar()
    {
        if($this->getImage()){
           return $this->getImage()->getWebPath();  
        }
        else
        {
           return 'images/product.png'; 
        }
    } 

    public function getPrice($currency)
    {
        foreach($this->getPrices() as $price){
            if($price->getCurrency()==$currency) return $price->getPrice();
        }
        
        return 0;
    }  
    
    public function getPriceDiscount($currency,$discount)
    {
        foreach($this->getPrices() as $price){
            if($price->getCurrency()==$currency) return $price->getPriceDiscount($discount);
        }
        
        return 0;
    }  
    
    public function getPriceDiscountAmount($currency,$discount)
    {
        foreach($this->getPrices() as $price){
            if($price->getCurrency()==$currency) return $price->getPriceDiscountAmount($discount);
        }
        
        return 0;
    }  
     
    
    public function getName()
    {
        return $this->proxyCurrentLocaleTranslation('getName');
    }  
    
    public function getTypeName()
    {
        return $this->getPageType()->getName().' - '.$this->getCategory()->getName().' - '.$this->proxyCurrentLocaleTranslation('getName');
    }  
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set model
     *
     * @param string $model
     *
     * @return Product
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set weight
     *
     * @param string $weight
     *
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Product
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Product
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
     * @return Product
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
     * Set image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return Product
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
     * Add image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return Product
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
     * Set category
     *
     * @param \AppBundle\Entity\ProductCategory $category
     *
     * @return Product
     */
    public function setCategory(\AppBundle\Entity\ProductCategory $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\ProductCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\ProductType $type
     *
     * @return Product
     */
    public function setType(\AppBundle\Entity\ProductType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\ProductType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     *
     * @return Product
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
     * Add connectedProductsFrom
     *
     * @param \AppBundle\Entity\ProductConnection $connectedProductsFrom
     *
     * @return Product
     */
    public function addConnectedProductsFrom(\AppBundle\Entity\ProductConnection $connectedProductsFrom)
    {
        $this->connected_products_from[] = $connectedProductsFrom;

        return $this;
    }

    /**
     * Remove connectedProductsFrom
     *
     * @param \AppBundle\Entity\ProductConnection $connectedProductsFrom
     */
    public function removeConnectedProductsFrom(\AppBundle\Entity\ProductConnection $connectedProductsFrom)
    {
        $this->connected_products_from->removeElement($connectedProductsFrom);
    }

    /**
     * Get connectedProductsFrom
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConnectedProductsFrom()
    {
        return $this->connected_products_from;
    }

    /**
     * Add connectedProductsTo
     *
     * @param \AppBundle\Entity\ProductConnection $connectedProductsTo
     *
     * @return Product
     */
    public function addConnectedProductsTo(\AppBundle\Entity\ProductConnection $connectedProductsTo)
    {
        $this->connected_products_to[] = $connectedProductsTo;

        return $this;
    }

    /**
     * Remove connectedProductsTo
     *
     * @param \AppBundle\Entity\ProductConnection $connectedProductsTo
     */
    public function removeConnectedProductsTo(\AppBundle\Entity\ProductConnection $connectedProductsTo)
    {
        $this->connected_products_to->removeElement($connectedProductsTo);
    }

    /**
     * Get connectedProductsTo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConnectedProductsTo()
    {
        return $this->connected_products_to;
    }

    /**
     * Set months
     *
     * @param integer $months
     *
     * @return Product
     */
    public function setMonths($months)
    {
        $this->months = $months;

        return $this;
    }

    /**
     * Get months
     *
     * @return integer
     */
    public function getMonths()
    {
        return $this->months;
    }

    /**
     * Set pageType
     *
     * @param \AppBundle\Entity\PageType $pageType
     *
     * @return Product
     */
    public function setPageType(\AppBundle\Entity\PageType $pageType)
    {
        $this->page_type = $pageType;

        return $this;
    }

    /**
     * Get pageType
     *
     * @return \AppBundle\Entity\PageType
     */
    public function getPageType()
    {
        return $this->page_type;
    }

    /**
     * Add price
     *
     * @param \AppBundle\Entity\ProductPrice $price
     *
     * @return Product
     */
    public function addPrice(\AppBundle\Entity\ProductPrice $price)
    {
        $this->prices[] = $price;

        return $this;
    }

    /**
     * Remove price
     *
     * @param \AppBundle\Entity\ProductPrice $price
     */
    public function removePrice(\AppBundle\Entity\ProductPrice $price)
    {
        $this->prices->removeElement($price);
    }

    /**
     * Get prices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * Set inPage
     *
     * @param boolean $inPage
     *
     * @return Product
     */
    public function setInPage($inPage)
    {
        $this->in_page = $inPage;

        return $this;
    }

    /**
     * Get inPage
     *
     * @return boolean
     */
    public function getInPage()
    {
        return $this->in_page;
    }

    /**
     * Set withoutCode
     *
     * @param boolean $withoutCode
     *
     * @return Product
     */
    public function setWithoutCode($withoutCode)
    {
        $this->without_code = $withoutCode;

        return $this;
    }

    /**
     * Get withoutCode
     *
     * @return boolean
     */
    public function getWithoutCode()
    {
        return $this->without_code;
    }

    /**
     * Set withCode
     *
     * @param boolean $withCode
     *
     * @return Product
     */
    public function setWithCode($withCode)
    {
        $this->with_code = $withCode;

        return $this;
    }

    /**
     * Get withCode
     *
     * @return boolean
     */
    public function getWithCode()
    {
        return $this->with_code;
    }

    /**
     * Add country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return Product
     */
    public function addCountry(\AppBundle\Entity\Country $country)
    {
        $this->countries[] = $country;

        return $this;
    }

    /**
     * Remove country
     *
     * @param \AppBundle\Entity\Country $country
     */
    public function removeCountry(\AppBundle\Entity\Country $country)
    {
        $this->countries->removeElement($country);
    }

    /**
     * Get countries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCountries()
    {
        return $this->countries;
    }

    /**
     * Set cities
     *
     * @param string $cities
     *
     * @return Product
     */
    public function setCities($cities)
    {
        $this->cities = $cities;

        return $this;
    }

    /**
     * Get cities
     *
     * @return string
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * Add codeGroup
     *
     * @param \AppBundle\Entity\CodeGroup $codeGroup
     *
     * @return Product
     */
    public function addCodeGroup(\AppBundle\Entity\CodeGroup $codeGroup)
    {
        $this->code_groups[] = $codeGroup;

        return $this;
    }

    /**
     * Remove codeGroup
     *
     * @param \AppBundle\Entity\CodeGroup $codeGroup
     */
    public function removeCodeGroup(\AppBundle\Entity\CodeGroup $codeGroup)
    {
        $this->code_groups->removeElement($codeGroup);
    }

    /**
     * Get codeGroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodeGroups()
    {
        return $this->code_groups;
    }

    /**
     * Set single
     *
     * @param boolean $single
     *
     * @return Product
     */
    public function setSingle($single)
    {
        $this->single = $single;

        return $this;
    }

    /**
     * Get single
     *
     * @return boolean
     */
    public function getSingle()
    {
        return $this->single;
    }

    /**
     * Set confirmation
     *
     * @param boolean $confirmation
     *
     * @return Product
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
     * Set deleted
     *
     * @param \DateTime $deleted
     *
     * @return Product
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
     * Set special
     *
     * @param boolean $special
     *
     * @return Product
     */
    public function setSpecial($special)
    {
        $this->special = $special;

        return $this;
    }

    /**
     * Get special
     *
     * @return boolean
     */
    public function getSpecial()
    {
        return $this->special;
    }

    /**
     * Set pageCategory
     *
     * @param \AppBundle\Entity\PageCategory $pageCategory
     *
     * @return Product
     */
    public function setPageCategory(\AppBundle\Entity\PageCategory $pageCategory = null)
    {
        $this->page_category = $pageCategory;

        return $this;
    }

    /**
     * Get pageCategory
     *
     * @return \AppBundle\Entity\PageCategory
     */
    public function getPageCategory()
    {
        return $this->page_category;
    }

    /**
     * Add contractor
     *
     * @param \AppBundle\Entity\UserProduct $contractor
     *
     * @return Product
     */
    public function addContractor(\AppBundle\Entity\UserProduct $contractor)
    {
        $this->contractors[] = $contractor;

        return $this;
    }

    /**
     * Remove contractor
     *
     * @param \AppBundle\Entity\UserProduct $contractor
     */
    public function removeContractor(\AppBundle\Entity\UserProduct $contractor)
    {
        $this->contractors->removeElement($contractor);
    }

    /**
     * Get contractors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContractors()
    {
        return $this->contractors;
    }

    /**
     * Add orderProduct
     *
     * @param \AppBundle\Entity\OrderProduct $orderProduct
     *
     * @return Product
     */
    public function addOrderProduct(\AppBundle\Entity\OrderProduct $orderProduct)
    {
        $this->order_products[] = $orderProduct;

        return $this;
    }

    /**
     * Remove orderProduct
     *
     * @param \AppBundle\Entity\OrderProduct $orderProduct
     */
    public function removeOrderProduct(\AppBundle\Entity\OrderProduct $orderProduct)
    {
        $this->order_products->removeElement($orderProduct);
    }

    /**
     * Get orderProducts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderProducts()
    {
        return $this->order_products;
    }
}
