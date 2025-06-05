<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Discount
 *
 * @ORM\Table(name="discount")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity("discount")
 * @ORM\Entity()
 */
class Discount
{
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $code;
    
    /**
     * @ORM\Column( type="date", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $expire;
	
	
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $count;
	



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
     * Set expired
     *
     * @param \Date $expired
     *
     * @return Page
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;

        return $this;
    }

    /**
     * Get expire
     *
     * @return \Date
     */
    public function getExpire()
    {
        return $this->expire;
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
     * Set count
     *
     * @param string $count
     *
     * @return Count
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return string
     */
    public function getCount()
    {
        return $this->count;
    }	
}
