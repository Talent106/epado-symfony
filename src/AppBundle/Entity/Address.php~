<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AddressRepository")
 */
class Address
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Order", mappedBy="billing_address")
     */
    protected $billing_orders; 
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Order", mappedBy="delivery_address")
     */
    protected $delivery_orders;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User", mappedBy="billing_address")
     */
    protected $billing_users;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User", mappedBy="delivery_address")
     */
    protected $delivery_users;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Cemetery", mappedBy="address", cascade={"persist"})
     */
    protected $cemeteries;
    

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Page", mappedBy="address", cascade={"persist"})
     */
    protected $pages;
      
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="created_addresses", cascade={"persist"})
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=true)
     */
    protected $creator;
    
    // * @Assert\NotBlank(groups={"registration"})
    // * @Assert\Length(min=3, groups={"registration"})
    /**
     * @ORM\Column(name="company", type="string", length=255, nullable=true)
     */
    private $company;

    /**
     * @ORM\Column(name="tax_id", type="string", length=255, nullable=true)
     */
    protected $tax_id;
    
    /**
     * @ORM\Column(name="tax_id_name", type="string", length=255, nullable=true)
     */
    protected $tax_id_name;
    
    /**
     * @ORM\Column(name="regon", type="string", length=255, nullable=true)
     */
    protected $regon;
    
    /**
     * @ORM\Column(name="krs", type="string", length=255, nullable=true)
     */
    protected $krs;
    
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $first_name;
        
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $last_name;

    
    /**
     * @ORM\Column(name="address", type="string", length=255)
     * @Assert\NotBlank(groups={"default"})
     */
    protected $address;
    
    /**
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\NotBlank(groups={"default"})
     */
    protected $city;
    
    /**
     * @ORM\Column(name="postal_code", type="string", length=255)
     * @Assert\NotBlank(groups={"default"})
     */
    protected $postal_code;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Country", inversedBy="addresses", cascade={"persist"})
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=true)
     */
    protected $country;


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
    
    public function getInvoiceTypes()
    {
        //$names=array('nip' => 'NIP', 'vat' => 'VAT EU', 'custom' => 'Inny');
        $names=array('nip' => 'NIP');
        return $names;
    }
    
    public function getInvoiceType($type)
    {
        $names=$this->getInvoiceTypes();
        return $names[$type];
    }
    
    
    public function toString($parameters=array()) {
        $temp='';
        $address=$this;
        if(!isset($parameters['company'])) $parameters['company']='';
        if(!isset($parameters['tax_id'])) $parameters['tax_id']='';
            
        
        if($address->getCompany()) $temp.=$parameters['company'].''.$address->getCompany().PHP_EOL;
        if($address->getTaxId()) $temp.=$this->getInvoiceType($this->getTaxIdName()).': '.$address->getTaxId().PHP_EOL; 
        $temp.=''.$address->getFirstName().' '.$address->getLastName().PHP_EOL; 
        $temp.=''.$address->getCountry()->getName().', '; 
        if($address->getCity()) $temp.=''.$address->getCity().', '.$address->getPostalCode().PHP_EOL;
        $temp.=''.$address->getAddress(); 
         
     
        
        return $temp;
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
        $this->billing_users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->delivery_users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Address
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
     * Set taxId
     *
     * @param string $taxId
     *
     * @return Address
     */
    public function setTaxId($taxId)
    {
        $this->tax_id = $taxId;

        return $this;
    }

    /**
     * Get taxId
     *
     * @return string
     */
    public function getTaxId()
    {
        return $this->tax_id;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return Address
     */
    public function setPostalCode($postalCode)
    {
        $this->postal_code = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Address
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
     * @return Address
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
     * Add billingUser
     *
     * @param \AppBundle\Entity\User $billingUser
     *
     * @return Address
     */
    public function addBillingUser(\AppBundle\Entity\User $billingUser)
    {
        $this->billing_users[] = $billingUser;

        return $this;
    }

    /**
     * Remove billingUser
     *
     * @param \AppBundle\Entity\User $billingUser
     */
    public function removeBillingUser(\AppBundle\Entity\User $billingUser)
    {
        $this->billing_users->removeElement($billingUser);
    }

    /**
     * Get billingUsers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBillingUsers()
    {
        return $this->billing_users;
    }

    /**
     * Add deliveryUser
     *
     * @param \AppBundle\Entity\User $deliveryUser
     *
     * @return Address
     */
    public function addDeliveryUser(\AppBundle\Entity\User $deliveryUser)
    {
        $this->delivery_users[] = $deliveryUser;

        return $this;
    }

    /**
     * Remove deliveryUser
     *
     * @param \AppBundle\Entity\User $deliveryUser
     */
    public function removeDeliveryUser(\AppBundle\Entity\User $deliveryUser)
    {
        $this->delivery_users->removeElement($deliveryUser);
    }

    /**
     * Get deliveryUsers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeliveryUsers()
    {
        return $this->delivery_users;
    }

    /**
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     *
     * @return Address
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
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     *
     * @return Address
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Address
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Address
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Address
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set taxIdName
     *
     * @param string $taxIdName
     *
     * @return Address
     */
    public function setTaxIdName($taxIdName)
    {
        $this->tax_id_name = $taxIdName;

        return $this;
    }

    /**
     * Get taxIdName
     *
     * @return string
     */
    public function getTaxIdName()
    {
        return $this->tax_id_name;
    }

    /**
     * Set deleted
     *
     * @param \DateTime $deleted
     *
     * @return Address
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
     * Set regon
     *
     * @param string $regon
     *
     * @return Address
     */
    public function setRegon($regon)
    {
        $this->regon = $regon;

        return $this;
    }

    /**
     * Get regon
     *
     * @return string
     */
    public function getRegon()
    {
        return $this->regon;
    }

    /**
     * Set krs
     *
     * @param string $krs
     *
     * @return Address
     */
    public function setKrs($krs)
    {
        $this->krs = $krs;

        return $this;
    }

    /**
     * Get krs
     *
     * @return string
     */
    public function getKrs()
    {
        return $this->krs;
    }

    /**
     * Add billingOrder
     *
     * @param \AppBundle\Entity\Order $billingOrder
     *
     * @return Address
     */
    public function addBillingOrder(\AppBundle\Entity\Order $billingOrder)
    {
        $this->billing_orders[] = $billingOrder;

        return $this;
    }

    /**
     * Remove billingOrder
     *
     * @param \AppBundle\Entity\Order $billingOrder
     */
    public function removeBillingOrder(\AppBundle\Entity\Order $billingOrder)
    {
        $this->billing_orders->removeElement($billingOrder);
    }

    /**
     * Get billingOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBillingOrders()
    {
        return $this->billing_orders;
    }

    /**
     * Add deliveryOrder
     *
     * @param \AppBundle\Entity\Order $deliveryOrder
     *
     * @return Address
     */
    public function addDeliveryOrder(\AppBundle\Entity\Order $deliveryOrder)
    {
        $this->delivery_orders[] = $deliveryOrder;

        return $this;
    }

    /**
     * Remove deliveryOrder
     *
     * @param \AppBundle\Entity\Order $deliveryOrder
     */
    public function removeDeliveryOrder(\AppBundle\Entity\Order $deliveryOrder)
    {
        $this->delivery_orders->removeElement($deliveryOrder);
    }

    /**
     * Get deliveryOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeliveryOrders()
    {
        return $this->delivery_orders;
    }

    /**
     * Add cemetery
     *
     * @param \AppBundle\Entity\Cemetery $cemetery
     *
     * @return Address
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
     * @return Address
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
}
