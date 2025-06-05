<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Code
 *
 * @ORM\Table(name="code")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity("code")
 * @UniqueEntity("password")
 * @ORM\Entity()
 */
class Code
{
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $code;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $number;
    
    /**
     * @ORM\Column( type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $password;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CodeGroup", inversedBy="codes", cascade={"persist"})
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=true)
     */
    protected $group;

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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Page", inversedBy="code_object_side")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id", nullable=true)
     */
    protected $page;
    
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Page", mappedBy="code_object")
     */
    protected $page_side;
    
    
    //* @ORM\OneToOne(targetEntity="AppBundle\Entity\OrderProduct", inversedBy="code_side", cascade={"persist"})
     
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\OrderProduct", inversedBy="code_side", cascade={"persist"})
     * @ORM\JoinColumn(name="order_product_id", referencedColumnName="id", nullable=true)
     */
    protected $order_product;
    
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\OrderProduct", mappedBy="code")
     */
    protected $order_product_side;
    
    //tylko tego używamy reszta stała się nieważna ze względu na modyfikacje
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\OrderProduct", inversedBy="codes", cascade={"persist"})
     * @ORM\JoinColumn(name="order_product_many_id", referencedColumnName="id", nullable=true)
     */
    protected $order_product_many;

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
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Page
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
     * Set begin
     *
     * @param \DateTime $begin
     *
     * @return Page
     */
    public function setBegin($begin)
    {
        $this->begin = $begin;

        return $this;
    }

    /**
     * Get begin
     *
     * @return \DateTime
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Page
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set expired
     *
     * @param \DateTime $expired
     *
     * @return Page
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;

        return $this;
    }

    /**
     * Get expired
     *
     * @return \DateTime
     */
    public function getExpired()
    {
        return $this->expired;
    }


    /**
     * Set code
     *
     * @param string $code
     *
     * @return Code
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Code
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
     * @return Code
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
     * Set group
     *
     * @param \AppBundle\Entity\CodeGroup $group
     *
     * @return Code
     */
    public function setGroup(\AppBundle\Entity\CodeGroup $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \AppBundle\Entity\CodeGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return Code
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
     * Set password
     *
     * @param string $password
     *
     * @return Code
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Code
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set orderProduct
     *
     * @param \AppBundle\Entity\OrderProduct $orderProduct
     *
     * @return Code
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
     * Set pageSide
     *
     * @param \AppBundle\Entity\Page $pageSide
     *
     * @return Code
     */
    public function setPageSide(\AppBundle\Entity\Page $pageSide = null)
    {
        $this->page_side = $pageSide;

        return $this;
    }

    /**
     * Get pageSide
     *
     * @return \AppBundle\Entity\Page
     */
    public function getPageSide()
    {
        return $this->page_side;
    }

    /**
     * Set orderProductSide
     *
     * @param \AppBundle\Entity\OrderProduct $orderProductSide
     *
     * @return Code
     */
    public function setOrderProductSide(\AppBundle\Entity\OrderProduct $orderProductSide = null)
    {
        $this->order_product_side = $orderProductSide;

        return $this;
    }

    /**
     * Get orderProductSide
     *
     * @return \AppBundle\Entity\OrderProduct
     */
    public function getOrderProductSide()
    {
        return $this->order_product_side;
    }

    /**
     * Set orderProductMany
     *
     * @param \AppBundle\Entity\OrderProduct $orderProductMany
     *
     * @return Code
     */
    public function setOrderProductMany(\AppBundle\Entity\OrderProduct $orderProductMany = null)
    {
        $this->order_product_many = $orderProductMany;

        return $this;
    }

    /**
     * Get orderProductMany
     *
     * @return \AppBundle\Entity\OrderProduct
     */
    public function getOrderProductMany()
    {
        return $this->order_product_many;
    }
}
