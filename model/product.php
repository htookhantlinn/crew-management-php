<?php

class Product
{
    private $name;
    private $code;

    /**
     * @param $name mixed 
     * @param $code mixed 
     */
    function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
    }
    /**
     * 
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * 
     * @param mixed $name 
     * @return Product
     */
    function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @return mixed
     */
    function getCode()
    {
        return $this->code;
    }

    /**
     * 
     * @param mixed $code 
     * @return Product
     */
    function setCode($code): self
    {
        $this->code = $code;
        return $this;
    }


    
}

?>