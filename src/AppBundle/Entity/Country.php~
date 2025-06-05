<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity()
 */
class Country
{
    use ORMBehaviors\Translatable\Translatable;
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="countries")
     */
    protected $products;

    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Address", mappedBy="country")
     */
    protected $addresses;
    

    
    /**
     * @ORM\Column( type="string", length=255)
     * @Assert\NotBlank(groups={"registration"})
     */
    private $code;
    
    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $page=false; 
    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $billing=false; 
    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $delivery=false;   
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cemeteries = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add cemetery
     *
     * @param \AppBundle\Entity\Cemetery $cemetery
     *
     * @return Country
     */
    public function addCemetery(\AppBundle\Entity\Cemetery $cemetery)
    {
        $this->cemeteries[] = $cemetery;

        return $this;
    }

    /**
     * Remove cemetery
     *
     * @param \AppBundle\Entity\Cemetery $cemetery
     */
    public function removeCemetery(\AppBundle\Entity\Cemetery $cemetery)
    {
        $this->cemeteries->removeElement($cemetery);
    }

    /**
     * Get cemeteries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCemeteries()
    {
        return $this->cemeteries;
    }

    /**
     * Add page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return Country
     */
    public function addPage(\AppBundle\Entity\Page $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \AppBundle\Entity\Page $page
     */
    public function removePage(\AppBundle\Entity\Page $page)
    {
        $this->pages->removeElement($page);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Country
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return Country
     */
    public function addAddress(\AppBundle\Entity\Address $address)
    {
        $this->addresses[] = $address;

        return $this;
    }

    /**
     * Remove address
     *
     * @param \AppBundle\Entity\Address $address
     */
    public function removeAddress(\AppBundle\Entity\Address $address)
    {
        $this->addresses->removeElement($address);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Set page
     *
     * @param boolean $page
     *
     * @return Country
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return boolean
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set user
     *
     * @param boolean $user
     *
     * @return Country
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return boolean
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set billing
     *
     * @param boolean $billing
     *
     * @return Country
     */
    public function setBilling($billing)
    {
        $this->billing = $billing;

        return $this;
    }

    /**
     * Get billing
     *
     * @return boolean
     */
    public function getBilling()
    {
        return $this->billing;
    }

    /**
     * Set delivery
     *
     * @param boolean $delivery
     *
     * @return Country
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * Get delivery
     *
     * @return boolean
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return Country
     */
    public function addProduct(\AppBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \AppBundle\Entity\Product $product
     */
    public function removeProduct(\AppBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
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
}
