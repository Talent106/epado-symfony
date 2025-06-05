<?php
namespace AppBundle\Entity;

use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class PageTypeTranslation
 *
 * @ORM\Entity
 * @ORM\Table(name="page_type_translation")
 */
class PageTypeTranslation{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(groups={"registration"})
     * @Assert\Length(min=3, groups={"registration"})
     */
    private $name;
    
    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;
    
    
   /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
}
