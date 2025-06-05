<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * ProductConnection
 *
 * @ORM\Table(name="product_connection")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity()
 */
class ProductConnection
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Product", inversedBy="connected_products_from", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     */
    protected $product;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Product", inversedBy="connected_products_to", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     */
    protected $product_connected;

    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="created_product_connections", cascade={"persist"})
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ProductConnection
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
     * @return ProductConnection
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
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     * @return ProductConnection
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
     * Set product_connected
     *
     * @param \AppBundle\Entity\Product $productConnected
     * @return ProductConnection
     */
    public function setProductConnected(\AppBundle\Entity\Product $productConnected = null)
    {
        $this->product_connected = $productConnected;

        return $this;
    }

    /**
     * Get product_connected
     *
     * @return \AppBundle\Entity\Product 
     */
    public function getProductConnected()
    {
        return $this->product_connected;
    }

    /**
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     * @return ProductConnection
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
}
