<?php

namespace Proxies\__CG__\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Image extends \AppBundle\Entity\Image implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'id', 'product', 'products', 'page', 'pages', 'family', 'families', 'cemetery', 'cemeteries', 'order_product', 'order_products', 'sort', 'file', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'name', 'description', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'video', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'link', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'path', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'created', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'updated'];
        }

        return ['__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'id', 'product', 'products', 'page', 'pages', 'family', 'families', 'cemetery', 'cemeteries', 'order_product', 'order_products', 'sort', 'file', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'name', 'description', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'video', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'link', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'path', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'created', '' . "\0" . 'AppBundle\\Entity\\Image' . "\0" . 'updated'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Image $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setCreatedAtValue()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAtValue', []);

        return parent::setCreatedAtValue();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setPath($path)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPath', [$path]);

        return parent::setPath($path);
    }

    /**
     * {@inheritDoc}
     */
    public function getPath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPath', []);

        return parent::getPath();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setFile(\Symfony\Component\HttpFoundation\File\UploadedFile $file = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFile', [$file]);

        return parent::setFile($file);
    }

    /**
     * {@inheritDoc}
     */
    public function getFile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFile', []);

        return parent::getFile();
    }

    /**
     * {@inheritDoc}
     */
    public function preUpload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'preUpload', []);

        return parent::preUpload();
    }

    /**
     * {@inheritDoc}
     */
    public function upload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'upload', []);

        return parent::upload();
    }

    /**
     * {@inheritDoc}
     */
    public function uploadOld()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'uploadOld', []);

        return parent::uploadOld();
    }

    /**
     * {@inheritDoc}
     */
    public function storeFilenameForRemove()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'storeFilenameForRemove', []);

        return parent::storeFilenameForRemove();
    }

    /**
     * {@inheritDoc}
     */
    public function removeUpload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUpload', []);

        return parent::removeUpload();
    }

    /**
     * {@inheritDoc}
     */
    public function getAbsolutePath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAbsolutePath', []);

        return parent::getAbsolutePath();
    }

    /**
     * {@inheritDoc}
     */
    public function getWebPath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWebPath', []);

        return parent::getWebPath();
    }

    /**
     * {@inheritDoc}
     */
    public function getUploadRootDir()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUploadRootDir', []);

        return parent::getUploadRootDir();
    }

    /**
     * {@inheritDoc}
     */
    public function setProduct(\AppBundle\Entity\Product $product = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProduct', [$product]);

        return parent::setProduct($product);
    }

    /**
     * {@inheritDoc}
     */
    public function getProduct()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProduct', []);

        return parent::getProduct();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreated($created)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreated', [$created]);

        return parent::setCreated($created);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreated', []);

        return parent::getCreated();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdated($updated)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdated', [$updated]);

        return parent::setUpdated($updated);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdated', []);

        return parent::getUpdated();
    }

    /**
     * {@inheritDoc}
     */
    public function setPage(\AppBundle\Entity\Page $page = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPage', [$page]);

        return parent::setPage($page);
    }

    /**
     * {@inheritDoc}
     */
    public function getPage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPage', []);

        return parent::getPage();
    }

    /**
     * {@inheritDoc}
     */
    public function setCemetery(\AppBundle\Entity\Cemetery $cemetery = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCemetery', [$cemetery]);

        return parent::setCemetery($cemetery);
    }

    /**
     * {@inheritDoc}
     */
    public function getCemetery()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCemetery', []);

        return parent::getCemetery();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setVideo($video)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVideo', [$video]);

        return parent::setVideo($video);
    }

    /**
     * {@inheritDoc}
     */
    public function getVideo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVideo', []);

        return parent::getVideo();
    }

    /**
     * {@inheritDoc}
     */
    public function setLink($link)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLink', [$link]);

        return parent::setLink($link);
    }

    /**
     * {@inheritDoc}
     */
    public function getLink()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLink', []);

        return parent::getLink();
    }

    /**
     * {@inheritDoc}
     */
    public function setSort($sort)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSort', [$sort]);

        return parent::setSort($sort);
    }

    /**
     * {@inheritDoc}
     */
    public function getSort()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSort', []);

        return parent::getSort();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderProduct(\AppBundle\Entity\OrderProduct $orderProduct = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrderProduct', [$orderProduct]);

        return parent::setOrderProduct($orderProduct);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrderProduct()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrderProduct', []);

        return parent::getOrderProduct();
    }

    /**
     * {@inheritDoc}
     */
    public function addProduct(\AppBundle\Entity\Product $product)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addProduct', [$product]);

        return parent::addProduct($product);
    }

    /**
     * {@inheritDoc}
     */
    public function removeProduct(\AppBundle\Entity\Product $product)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeProduct', [$product]);

        return parent::removeProduct($product);
    }

    /**
     * {@inheritDoc}
     */
    public function getProducts()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProducts', []);

        return parent::getProducts();
    }

    /**
     * {@inheritDoc}
     */
    public function addPage(\AppBundle\Entity\Page $page)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPage', [$page]);

        return parent::addPage($page);
    }

    /**
     * {@inheritDoc}
     */
    public function removePage(\AppBundle\Entity\Page $page)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePage', [$page]);

        return parent::removePage($page);
    }

    /**
     * {@inheritDoc}
     */
    public function getPages()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPages', []);

        return parent::getPages();
    }

    /**
     * {@inheritDoc}
     */
    public function setFamily(\AppBundle\Entity\Family $family = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFamily', [$family]);

        return parent::setFamily($family);
    }

    /**
     * {@inheritDoc}
     */
    public function getFamily()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFamily', []);

        return parent::getFamily();
    }

    /**
     * {@inheritDoc}
     */
    public function addFamily(\AppBundle\Entity\Family $family)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addFamily', [$family]);

        return parent::addFamily($family);
    }

    /**
     * {@inheritDoc}
     */
    public function removeFamily(\AppBundle\Entity\Family $family)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeFamily', [$family]);

        return parent::removeFamily($family);
    }

    /**
     * {@inheritDoc}
     */
    public function getFamilies()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFamilies', []);

        return parent::getFamilies();
    }

    /**
     * {@inheritDoc}
     */
    public function addCemetery(\AppBundle\Entity\Cemetery $cemetery)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCemetery', [$cemetery]);

        return parent::addCemetery($cemetery);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCemetery(\AppBundle\Entity\Cemetery $cemetery)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCemetery', [$cemetery]);

        return parent::removeCemetery($cemetery);
    }

    /**
     * {@inheritDoc}
     */
    public function getCemeteries()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCemeteries', []);

        return parent::getCemeteries();
    }

    /**
     * {@inheritDoc}
     */
    public function addOrderProduct(\AppBundle\Entity\OrderProduct $orderProduct)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addOrderProduct', [$orderProduct]);

        return parent::addOrderProduct($orderProduct);
    }

    /**
     * {@inheritDoc}
     */
    public function removeOrderProduct(\AppBundle\Entity\OrderProduct $orderProduct)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeOrderProduct', [$orderProduct]);

        return parent::removeOrderProduct($orderProduct);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrderProducts()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrderProducts', []);

        return parent::getOrderProducts();
    }

}
