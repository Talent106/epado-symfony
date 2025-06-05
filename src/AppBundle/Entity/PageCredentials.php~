<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

/**
 * Image
 *
 * @ORM\Table(name="page_credentials")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PageCredentialsRepository")
 */
class PageCredentials
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Page", inversedBy="credentials")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id", nullable=true)
     */
    protected $page;

    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Family", inversedBy="credentials")
     * @ORM\JoinColumn(name="family_id", referencedColumnName="id", nullable=true)
     */
    protected $family;
    
    
    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $type;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="created_credentials", cascade={"persist"})
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=true)
     */
    protected $creator;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="credentials", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    protected $user;
 
    

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
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $page_edit=false;
    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $family_edit=false; 
    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $page_image=false;

    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $page_background=false;
    
    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $page_images=false;
    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $page_audiobooks=false; 
    
    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $page_remind=false;
    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $page_posts_delete=false; 
    
    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    protected $page_posts_notification=false;   
    
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
     *
     * @return PageCredentials
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
     * @return PageCredentials
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
     * @return PageCredentials
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
     * Set creator
     *
     * @param \AppBundle\Entity\User $creator
     *
     * @return PageCredentials
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

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return PageCredentials
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set pageEdit
     *
     * @param boolean $pageEdit
     *
     * @return PageCredentials
     */
    public function setPageEdit($pageEdit)
    {
        $this->page_edit = $pageEdit;

        return $this;
    }

    /**
     * Get pageEdit
     *
     * @return boolean
     */
    public function getPageEdit()
    {
        return $this->page_edit;
    }

    /**
     * Set familyEdit
     *
     * @param boolean $familyEdit
     *
     * @return PageCredentials
     */
    public function setFamilyEdit($familyEdit)
    {
        $this->family_edit = $familyEdit;

        return $this;
    }

    /**
     * Get familyEdit
     *
     * @return boolean
     */
    public function getFamilyEdit()
    {
        return $this->family_edit;
    }

    /**
     * Set pageImage
     *
     * @param boolean $pageImage
     *
     * @return PageCredentials
     */
    public function setPageImage($pageImage)
    {
        $this->page_image = $pageImage;

        return $this;
    }

    /**
     * Get pageImage
     *
     * @return boolean
     */
    public function getPageImage()
    {
        return $this->page_image;
    }

    /**
     * Set pageBackground
     *
     * @param boolean $pageBackground
     *
     * @return PageCredentials
     */
    public function setPageBackground($pageBackground)
    {
        $this->page_background = $pageBackground;

        return $this;
    }

    /**
     * Get pageBackground
     *
     * @return boolean
     */
    public function getPageBackground()
    {
        return $this->page_background;
    }

    /**
     * Set pageImages
     *
     * @param boolean $pageImages
     *
     * @return PageCredentials
     */
    public function setPageImages($pageImages)
    {
        $this->page_images = $pageImages;

        return $this;
    }

    /**
     * Get pageImages
     *
     * @return boolean
     */
    public function getPageImages()
    {
        return $this->page_images;
    }

    /**
     * Set pageAudiobooks
     *
     * @param boolean $pageAudiobooks
     *
     * @return PageCredentials
     */
    public function setPageAudiobooks($pageAudiobooks)
    {
        $this->page_audiobooks = $pageAudiobooks;

        return $this;
    }

    /**
     * Get pageAudiobooks
     *
     * @return boolean
     */
    public function getPageAudiobooks()
    {
        return $this->page_audiobooks;
    }

    /**
     * Set pageRemind
     *
     * @param boolean $pageRemind
     *
     * @return PageCredentials
     */
    public function setPageRemind($pageRemind)
    {
        $this->page_remind = $pageRemind;

        return $this;
    }

    /**
     * Get pageRemind
     *
     * @return boolean
     */
    public function getPageRemind()
    {
        return $this->page_remind;
    }

    /**
     * Set pagePostsDelete
     *
     * @param boolean $pagePostsDelete
     *
     * @return PageCredentials
     */
    public function setPagePostsDelete($pagePostsDelete)
    {
        $this->page_posts_delete = $pagePostsDelete;

        return $this;
    }

    /**
     * Get pagePostsDelete
     *
     * @return boolean
     */
    public function getPagePostsDelete()
    {
        return $this->page_posts_delete;
    }

    /**
     * Set pagePostsNotification
     *
     * @param boolean $pagePostsNotification
     *
     * @return PageCredentials
     */
    public function setPagePostsNotification($pagePostsNotification)
    {
        $this->page_posts_notification = $pagePostsNotification;

        return $this;
    }

    /**
     * Get pagePostsNotification
     *
     * @return boolean
     */
    public function getPagePostsNotification()
    {
        return $this->page_posts_notification;
    }

    /**
     * Set family
     *
     * @param \AppBundle\Entity\Family $family
     *
     * @return PageCredentials
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
     * Set type
     *
     * @param string $type
     *
     * @return PageCredentials
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
