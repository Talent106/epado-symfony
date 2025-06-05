<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Actions
 *
 * @ORM\Table(name="actions")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity("actions")
 * @UniqueEntity("password")
 * @ORM\Entity()
 */
class Actions
{
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="id_user", type="integer")
     * @Assert\NotBlank()
     */
    private $id_user;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $status;
    
    /**
     * @ORM\Column( type="datetime", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $status_date;
    
    /**
     * @ORM\Column(name="id_code", type="integer")
     * @Assert\NotBlank()
     */
    protected $id_code;
	
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $user;	
	
	



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
     * Set status_date
     *
     * @param \DateTime $status_date
     *
     * @return Code
     */
    public function setStatusDate($status_date)
    {
        $this->status_date = $status_date;

        return $this;
    }

    /**
     * Get status_date
     *
     * @return \DateTime
     */
    public function getStatusDate()
    {
        return $this->status_date;
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
     * Set number
     *
     * @param integer $idUser
     *
     * @return Code
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->id_user;
    }	
	
	
	
	
    /**
     * Set status
     *
     * @param string $status
     *
     * @return Code
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }	
	
	
	
	
    /**
     * Set user
     *
     * @param string $user
     *
     * @return Code
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }	
		
	
	
	
	
    /**
     * Set status
     *
     * @param string $rack
     *
     * @return Code
     */
    public function setRack($rack)
    {
        $this->rack = $rack;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getRack()
    {
        return $this->rack;
    }		
	
	
	
    /**
     * Set status
     *
     * @param string $shelf
     *
     * @return Code
     */
    public function setShelf($shelf)
    {
        $this->shelf = $shelf;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getShelf()
    {
        return $this->shelf;
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
