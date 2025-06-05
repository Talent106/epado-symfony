<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * CodeGroup
 *
 * @ORM\Table(name="code_group")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity()
 */
class CodeGroup
{
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Product", inversedBy="code_groups", cascade={"persist"})
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=true)
     */
    protected $product;
    
    /**
     * @ORM\Column(name="document", type="text", nullable=true)
     */
    protected $document;
    
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Code", mappedBy="group")
     */
    protected $codes;
    
    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(name="locale", type="string", length=255, nullable=true)
     */
    private $locale;
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotBlank(groups={"edit"})
     * @Assert\Range(
     *      groups={"edit"},
     *      min = 1,
     *      max = 9999,
     *      minMessage = "Minimalna ilość kodów to {{ limit }}",
     *      maxMessage = "Maksymalna ilość kodów dla grupy to {{ limit }}"
     * )
     */
    protected $amount;
    
    /**
     * @ORM\Column(type="integer", nullable=true, options={"default": 0})
     */
    protected $used=0;
    
    
    /**
     * @ORM\Column(type="integer", nullable=true, options={"default": 0})
     */
    protected $taken=0;
    
    /**
     * @ORM\Column(type="integer", nullable=true, options={"default": 0})
     */
    protected $lost=0;
    
    /**
     * @ORM\Column(type="integer", nullable=true, options={"default": 0})
     */
    protected $ordered=0;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $months;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="created_code_groups", cascade={"persist"})
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
     * @return CodeGroup
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
     * @return CodeGroup
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
     * Set months
     *
     * @param integer $months
     *
     * @return CodeGroup
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
     * Set amount
     *
     * @param integer $amount
     *
     * @return CodeGroup
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
     * Set used
     *
     * @param integer $used
     *
     * @return CodeGroup
     */
    public function setUsed($used)
    {
        $this->used = $used;

        return $this;
    }

    /**
     * Get used
     *
     * @return integer
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return CodeGroup
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
     * @return CodeGroup
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
     * Add code
     *
     * @param \AppBundle\Entity\Code $code
     *
     * @return CodeGroup
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
     * Set pageType
     *
     * @param \AppBundle\Entity\PageType $pageType
     *
     * @return CodeGroup
     */
    public function setPageType(\AppBundle\Entity\PageType $pageType = null)
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
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     *
     * @return CodeGroup
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
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return CodeGroup
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
     * Set locale
     *
     * @param string $locale
     *
     * @return CodeGroup
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
     * Set deleted
     *
     * @param \DateTime $deleted
     *
     * @return CodeGroup
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
     * Set lost
     *
     * @param integer $lost
     *
     * @return CodeGroup
     */
    public function setLost($lost)
    {
        $this->lost = $lost;

        return $this;
    }

    /**
     * Get lost
     *
     * @return integer
     */
    public function getLost()
    {
        return $this->lost;
    }

    /**
     * Set ordered
     *
     * @param integer $ordered
     *
     * @return CodeGroup
     */
    public function setOrdered($ordered)
    {
        $this->ordered = $ordered;

        return $this;
    }

    /**
     * Get ordered
     *
     * @return integer
     */
    public function getOrdered()
    {
        return $this->ordered;
    }

    /**
     * Set document
     *
     * @param string $document
     *
     * @return CodeGroup
     */
    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set taken
     *
     * @param integer $taken
     *
     * @return CodeGroup
     */
    public function setTaken($taken)
    {
        $this->taken = $taken;

        return $this;
    }

    /**
     * Get taken
     *
     * @return integer
     */
    public function getTaken()
    {
        return $this->taken;
    }
}
