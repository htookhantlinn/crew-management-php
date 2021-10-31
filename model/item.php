<?php

class Item
{
    private $item_name;
    private $code;
    private $price;

    public function __construct($name, $code, $price)
    {
        $this->name = $name;
        $this->code = $code;
        $this->price = $price;
    }



    function getItem_name()
    {
        return $this->item_name;
    }


    function setItem_name($item_name): self
    {
        $this->item_name = $item_name;
        return $this;
    }


    function getCode()
    {
        return $this->code;
    }


    function setCode($code): self
    {
        $this->code = $code;
        return $this;
    }


    function getPrice()
    {
        return $this->price;
    }


    function setPrice($price): self
    {
        $this->price = $price;
        return $this;
    }





}