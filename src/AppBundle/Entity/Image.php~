<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ImageRepository")
 */
class Image
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    //cascade presist save that object automaticly
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Product", inversedBy="images")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=true)
     */
    protected $product;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Product", mappedBy="image", cascade={"persist"})
     */
    protected $products;
    
    
    //cascade presist save that object automaticly
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Page", inversedBy="images")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id", nullable=true)
     */
    protected $page;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Page", mappedBy="image", cascade={"persist"})
     */
    protected $pages;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Family", inversedBy="images")
     * @ORM\JoinColumn(name="family_id", referencedColumnName="id", nullable=true)
     */
    protected $family;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Family", mappedBy="image", cascade={"persist"})
     */
    protected $families;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cemetery", inversedBy="images")
     * @ORM\JoinColumn(name="cemetery_id", referencedColumnName="id", nullable=true)
     */
    protected $cemetery;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Cemetery", mappedBy="image", cascade={"persist"})
     */
    protected $cemeteries;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\OrderProduct", inversedBy="images")
     * @ORM\JoinColumn(name="order_product_id", referencedColumnName="id", nullable=true)
     */
    protected $order_product;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OrderProduct", mappedBy="image", cascade={"persist"})
     */
    protected $order_products;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $sort;
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=255, nullable=true)
     */
    private $video;
    
    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;
    
    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    

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
    
    
    //, columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP"
    /**
     * @ORM\Column(type="datetime") 
     */
    //private $created_at;  

    //way to set date on create without database information 
    //imortant need HasLifecycleCallbacks annotation before class definition
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        //$this->setModifiedAt(new \DateTime(date('Y-m-d H:i:s')));
        //die('aa');
        //$this->created_at = new \DateTime();
        /*
        if($this->getCreatedAt() == null)
        {
            $this->setCreatedAt(new \DateTime(date('Y-m-d H:i:s')));
        }
        */
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
     * @return Image
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
     * Set path
     *
     * @param string $path
     * @return Image
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Image
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    

    
    

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }
    
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
            //die($this->path);
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {

        if (null === $this->getFile()) {
            return;
        }
        //die($this->path);
        //id as path
        //$this->path = $this->getId().'.'.$this->getFile()->guessExtension();
        
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $test=$this->getFile()->move($this->getUploadRootDir(), $this->path);

        //var_dump($this->path);
        //die($this->getUploadRootDir());
        
        
        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            if(file_exists($this->getUploadRootDir().'/'.$this->temp))
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }
    
    public function uploadOld()
    {
        //die('aa');
        var_dump($this);
        if (null === $this->getFile()) {
            return;
        }
        //die($this->getUploadRootDir().''.$this->id.'.'.$this->getFile()->guessExtension());

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->temp);
            // clear the temp image path
            $this->temp = null;
        }

        // you must throw an exception here if the file cannot be moved
        // so that the entity is not persisted to the database
        // which the UploadedFile move() method does
        $this->path=$this->id.'.'.$this->getFile()->guessExtension();
        //die($this->path);
        //clear prev file
        //unlink($this->getUploadRootDir().'/'.$this->path);
        //die($this->getUploadRootDir()); 
        
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->id.'.'.$this->getFile()->guessExtension()
        );
        
        
        
        $this->setFile(null);
    }

    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (isset($this->temp)) {
            @unlink($this->temp);
        }
    }
    
    
    

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        if(!$this->path) return null;
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    public function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        
        //die(__DIR__.'/../../../web/'.$this->getUploadDir()); // za daleko wychodzil po wywaleniu katalogu nadrzednego z nazwa firmy
        return __DIR__.'/../../../web/'.$this->getUploadDir(); // za daleko wychodzil po wywaleniu katalogu nadrzednego z nazwa firmy
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/images';
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     * @return Image
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
     * Set created
     *
     * @param \DateTime $created
     * @return Image
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
     * @return Image
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
     * Set page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return Image
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
     * Set cemetery
     *
     * @param \AppBundle\Entity\Cemetery $cemetery
     *
     * @return Image
     */
    public function setCemetery(\AppBundle\Entity\Cemetery $cemetery = null)
    {
        $this->cemetery = $cemetery;

        return $this;
    }

    /**
     * Get cemetery
     *
     * @return \AppBundle\Entity\Cemetery
     */
    public function getCemetery()
    {
        return $this->cemetery;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Image
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
     * Set video
     *
     * @param string $video
     *
     * @return Image
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Image
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     *
     * @return Image
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set orderProduct
     *
     * @param \AppBundle\Entity\OrderProduct $orderProduct
     *
     * @return Image
     */
    public function setOrderProduct(\AppBundle\Entity\OrderProduct $orderProduct = null)
    {
        $this->order_product = $orderProduct;

        return $this;
    }

    /**
     * Get orderProduct
     *
     * @return \AppBundle\Entity\OrderProduct
     */
    public function getOrderProduct()
    {
        return $this->order_product;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->families = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cemeteries = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return Image
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

    /**
     * Add page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return Image
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
     * Set family
     *
     * @param \AppBundle\Entity\Family $family
     *
     * @return Image
     */
    public function setFamily(\AppBundle\Entity\Family $family = null)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family
     *
     * @return \AppBundle\Entity\Family
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Add family
     *
     * @param \AppBundle\Entity\Family $family
     *
     * @return Image
     */
    public function addFamily(\AppBundle\Entity\Family $family)
    {
        $this->families[] = $family;

        return $this;
    }

    /**
     * Remove family
     *
     * @param \AppBundle\Entity\Family $family
     */
    public function removeFamily(\AppBundle\Entity\Family $family)
    {
        $this->families->removeElement($family);
    }

    /**
     * Get families
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFamilies()
    {
        return $this->families;
    }

    /**
     * Add cemetery
     *
     * @param \AppBundle\Entity\Cemetery $cemetery
     *
     * @return Image
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
     * Add orderProduct
     *
     * @param \AppBundle\Entity\OrderProduct $orderProduct
     *
     * @return Image
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
