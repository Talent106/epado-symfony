<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * Localisation
 *
 * @ORM\Table(name="localisation")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity()
 */
class Localisation
{
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Cemetery", mappedBy="localisation")
     */
    protected $cemeteries;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Page", mappedBy="localisation")
     */
    protected $pages;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=7, nullable=true)
     */
    protected $latitude;
    
    /**
     * @ORM\Column(type="decimal", precision=10, scale=7, nullable=true)
     */
    protected $longitude;
      
    /**
     * @ORM\Column(name="deleted", type="datetime", nullable=true)
     */
    private $deleted;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cemeteries = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Localisation
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Localisation
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Add cemetery
     *
     * @param \AppBundle\Entity\Cemetery $cemetery
     *
     * @return Localisation
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
     * Add page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return Localisation
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
     * Set deleted
     *
     * @param \DateTime $deleted
     *
     * @return Localisation
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
}
