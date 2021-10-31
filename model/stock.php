<?php
class Stock
{


    private int $stock_id;
    private int $qty;
    private int $min_price;
    private int $max_price;
    private DateTime $date;



    function __construct(int $stock_id, int $qty, int $min_price, int $max_price, DateTime $date)
    {
        $this->stock_id = $stock_id;
        $this->qty = $qty;
        $this->min_price = $min_price;
        $this->max_price = $max_price;
        $this->date = $date;
    }



    function getStock_id(): int
    {
        return $this->stock_id;
    }


    function setStock_id(int $stock_id): self
    {
        $this->stock_id = $stock_id;
        return $this;
    }

    function getQty(): int
    {
        return $this->qty;
    }


    function setQty(int $qty): self
    {
        $this->qty = $qty;
        return $this;
    }

    function getMin_price(): int
    {
        return $this->min_price;
    }


    function setMin_price(int $min_price): self
    {
        $this->min_price = $min_price;
        return $this;
    }

    function getMax_price(): int
    {
        return $this->max_price;
    }


    function setMax_price(int $max_price): self
    {
        $this->max_price = $max_price;
        return $this;
    }

    function getDate(): DateTime
    {
        return $this->date;
    }


    function setDate(DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    function checkStock()
    {
        if ($this->qty > 500) {

        }
        else {

        }

        return 2;
    }

}