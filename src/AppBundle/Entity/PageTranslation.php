<?php
namespace AppBundle\Entity;

use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class PageTranslation
 *
 * @ORM\Entity
 * @ORM\Table(name="page_translation")
 */
class PageTranslation{
    use ORMBehaviors\Translatable\Translation;
     //* @Assert\NotBlank(groups={"registration"})
     //* @Assert\Length(min=3, groups={"registration"})
    
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;
    
    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;
    
    /**
     * @ORM\Column(name="long_description", type="text", nullable=true)
     */
    protected $long_description;
    
    /**
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $first_name;
    
    /**
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $last_name;
    
    
   /**
     * @return string
     */
    public function getName()
    {
        if(!$this->name) return $this->getFirstName().' '.$this->getLastName();
        else return $this->name;
    }

    /**
     * @param  string
     * @return null
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    
   /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string
     * @return null
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return PageTranslation
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
     * @return PageTranslation
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
     * Set longDescription
     *
     * @param string $longDescription
     *
     * @return PageTranslation
     */
    public function setLongDescription($longDescription)
    {
        $this->long_description = $longDescription;

        return $this;
    }

    /**
     * Get longDescription
     *
     * @return string
     */
    public function getLongDescription()
    {
        return $this->long_description;
    }
}
