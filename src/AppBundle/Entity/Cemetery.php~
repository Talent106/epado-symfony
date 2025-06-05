<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * Cemetery
 *
 * @ORM\Table(name="cemetery")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity()
 */
class Cemetery
{
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Image", inversedBy="cemeteries")
     * @ORM\JoinColumn(name="default_image_id", referencedColumnName="id", nullable=true)
     */
    protected $image;
    
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Image", mappedBy="cemetery", cascade={"persist"})
     */
    protected $images;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Page", mappedBy="cemetery", cascade={"persist"})
     */
    protected $pages;
    

    /**
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(groups={"default"})
     */
    private $name;
    

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Address", inversedBy="cemeteries", cascade={"persist"})
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id", nullable=true)
     */
    protected $address;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Localisation", inversedBy="cemeteries", cascade={"persist"})
     * @ORM\JoinColumn(name="localisation_id", referencedColumnName="id", nullable=true)
     */
    protected $localisation;
    
    
    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="cemeteries", cascade={"persist"})
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=true)
     */
    protected $creator;
    
    
    

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
     * @ORM\Column(type="boolean", nullable=true, options={"default": false})
     */
    protected $checked=false; 
    

    public function serialize()
    {
        return array('id'=>$this->id,'name'=>$this->getName(), 
            'localisation'=> !$this->getLocalisation() ? 0 : array('latitude'=>$this->getLocalisation()->getLatitude(), 'longitude'=>$this->getLocalisation()->getLongitude()), 
            'address'=> !$this->getAddress() ? 0 : array('city'=>$this->getAddress()->getCity(), 'address'=>$this->getAddress()->getAddress(), 'country'=>$this->getAddress()->getCountry()->getId(), 'postalcode'=>$this->getAddress()->getPostalCode()) 
            
            );
    }
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Cemetery
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
     * Set description
     *
     * @param string $description
     *
     * @return Cemetery
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return Cemetery
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
     * @return Cemetery
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

    /**
     * Set address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return Cemetery
     */
    public function setAddress(\AppBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set localisation
     *
     * @param \AppBundle\Entity\Localisation $localisation
     *
     * @return Cemetery
     */
    public function setLocalisation(\AppBundle\Entity\Localisation $localisation = null)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return \AppBundle\Entity\Localisation
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     *
     * @return Cemetery
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
     *
     * @return Cemetery
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
     * @return Cemetery
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
     * @return Cemetery
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
     * Set checked
     *
     * @param boolean $checked
     *
     * @return Cemetery
     */
    public function setChecked($checked)
    {
        $this->checked = $checked;

        return $this;
    }

    /**
     * Get checked
     *
     * @return boolean
     */
    public function getChecked()
    {
        return $this->checked;
    }

    /**
     * Add page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return Cemetery
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
