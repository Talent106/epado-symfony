<?php
namespace AppBundle\Entity;

use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CountryTranslation
 *
 * @ORM\Entity
 * @ORM\Table(name="country_translation")
 */
class CountryTranslation{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;
    
    
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
}
