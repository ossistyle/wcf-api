<?php
namespace Via\Entity;

trait HasEntityTrait
{
    private $id;
    /**
     *
     * @return Integer
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     *
     * @param Integer $productType
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function toArray ()
    {
        $class = get_called_class();
        $props = get_object_vars($class::getInstance());
        $result = array();
        foreach ($props as $name => $value)
        {
            $result[ucfirst($name)] = $value;
        }
        
        return $result;
    }
    
    public static function getInstance()
    {
        if (null === static::$instance)
            static::$instance = self::init();
    
        return static::$instance;
    }
}