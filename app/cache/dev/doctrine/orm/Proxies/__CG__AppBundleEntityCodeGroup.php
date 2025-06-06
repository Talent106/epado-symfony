<?php

namespace Proxies\__CG__\AppBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class CodeGroup extends \AppBundle\Entity\CodeGroup implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'id', 'product', 'document', 'codes', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'name', 'description', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'locale', 'amount', 'used', 'taken', 'lost', 'ordered', 'months', 'creator', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'created', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'updated', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'deleted'];
        }

        return ['__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'id', 'product', 'document', 'codes', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'name', 'description', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'locale', 'amount', 'used', 'taken', 'lost', 'ordered', 'months', 'creator', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'created', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'updated', '' . "\0" . 'AppBundle\\Entity\\CodeGroup' . "\0" . 'deleted'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (CodeGroup $proxy) {
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
    public function setMonths($months)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMonths', [$months]);

        return parent::setMonths($months);
    }

    /**
     * {@inheritDoc}
     */
    public function getMonths()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMonths', []);

        return parent::getMonths();
    }

    /**
     * {@inheritDoc}
     */
    public function setAmount($amount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAmount', [$amount]);

        return parent::setAmount($amount);
    }

    /**
     * {@inheritDoc}
     */
    public function getAmount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAmount', []);

        return parent::getAmount();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsed($used)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsed', [$used]);

        return parent::setUsed($used);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsed()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsed', []);

        return parent::getUsed();
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
    public function addCode(\AppBundle\Entity\Code $code)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCode', [$code]);

        return parent::addCode($code);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCode(\AppBundle\Entity\Code $code)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCode', [$code]);

        return parent::removeCode($code);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodes', []);

        return parent::getCodes();
    }

    /**
     * {@inheritDoc}
     */
    public function setPageType(\AppBundle\Entity\PageType $pageType = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPageType', [$pageType]);

        return parent::setPageType($pageType);
    }

    /**
     * {@inheritDoc}
     */
    public function getPageType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPageType', []);

        return parent::getPageType();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreator(\AppBundle\Entity\User $creator = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreator', [$creator]);

        return parent::setCreator($creator);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreator()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreator', []);

        return parent::getCreator();
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
    public function setLocale($locale)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLocale', [$locale]);

        return parent::setLocale($locale);
    }

    /**
     * {@inheritDoc}
     */
    public function getLocale()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLocale', []);

        return parent::getLocale();
    }

    /**
     * {@inheritDoc}
     */
    public function setDeleted($deleted)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeleted', [$deleted]);

        return parent::setDeleted($deleted);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeleted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeleted', []);

        return parent::getDeleted();
    }

    /**
     * {@inheritDoc}
     */
    public function setLost($lost)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLost', [$lost]);

        return parent::setLost($lost);
    }

    /**
     * {@inheritDoc}
     */
    public function getLost()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLost', []);

        return parent::getLost();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrdered($ordered)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrdered', [$ordered]);

        return parent::setOrdered($ordered);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrdered()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrdered', []);

        return parent::getOrdered();
    }

    /**
     * {@inheritDoc}
     */
    public function setDocument($document)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDocument', [$document]);

        return parent::setDocument($document);
    }

    /**
     * {@inheritDoc}
     */
    public function getDocument()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDocument', []);

        return parent::getDocument();
    }

    /**
     * {@inheritDoc}
     */
    public function setTaken($taken)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTaken', [$taken]);

        return parent::setTaken($taken);
    }

    /**
     * {@inheritDoc}
     */
    public function getTaken()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTaken', []);

        return parent::getTaken();
    }

}
