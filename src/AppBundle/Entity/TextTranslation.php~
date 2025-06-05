<?php
namespace AppBundle\Entity;

use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TextTranslation
 *
 * @ORM\Entity
 * @ORM\Table(name="text_translation")
 */
class TextTranslation{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    
    /**
     * @ORM\Column(name="menu_title", type="string", length=255, nullable=true)
     */
    private $menu_title;
    
    /**
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;
    
    
    /**
     * Set content
     *
     * @param string $content
     *
     * @return TextTranslation
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return TextTranslation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set menuTitle
     *
     * @param string $menuTitle
     *
     * @return TextTranslation
     */
    public function setMenuTitle($menuTitle)
    {
        $this->menu_title = $menuTitle;

        return $this;
    }

    /**
     * Get menuTitle
     *
     * @return string
     */
    public function getMenuTitle()
    {
        return $this->menu_title;
    }
}
