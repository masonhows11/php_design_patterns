<?php



class BasKetCost
{


    public function getCost()
    {
        # code...
        return 150000;
    }

    public function getDescription()
    {
        # code...

        return 'Basket cost';
    }


    public function getTotalCost()
    {

        // return $this->getCost();

        return self::getCost();
        # code...
    }



    public function getDetails()
    {
        return [
            self::getDescription() => self::getCost(),
        ];
    }
}


class BasketWithShiping extends BasKetCost
{

    public function getCost()
    {
        # code...
        return 2500;
    }

    public function getDescription()
    {
        # code...

        return 'Shiping cost';
    }


    public function getTotalCost()
    {

        return parent::getTotalCost() +  self::getCost();
        # code...
    }



    public function getDetails()
    {
        return parent::getDetails() +  [
            self::getDescription() => self::getCost(),
        ];
    }
}


class BasketWithTaX extends BasKetCost
{

    public function getCost()
    {
        # code...
        return parent::getCost() * 0.09;
    }

    public function getDescription()
    {
        # code...

        return 'tax cost';
    }


    public function getTotalCost()
    {

        /// self refer to child parent or child class check this !!??
        return parent::getTotalCost() +  self::getCost();
        # code...
    }



    public function getDetails()
    {
        return parent::getDetails() +  [
            self::getDescription() => self::getCost(),
        ];
    }
}


class BasketWithTaXShipping extends BasketWithTaX
{

    public function getCost()
    {
        # code...
        return 1500;
    }

    public function getDescription()
    {
        # code...

        return 'Shiping cost';
    }


    public function getTotalCost()
    {

        /// self refer to child parent or child class check this !!??
        return parent::getTotalCost() +  self::getCost();
        # code...
    }



    public function getDetails()
    {
        return parent::getDetails() +  [
            self::getDescription() => self::getCost(),
        ];
    }
}

// $basket = new BasKetCost();
// var_dump($basket->getDetails());


// $basketWithShipping = new BasketWithShiping();

// var_dump($basketWithShipping->getDetails());
// var_dump($basketWithShipping->getTotalCost());


// $basketWithShipping = new BasketWithTaX();

// var_dump($basketWithShipping->getDetails());
// var_dump($basketWithShipping->getTotalCost());




$basketWithShippingtax = new BasketWithTaXShipping();

var_dump($basketWithShippingtax ->getDetails());
var_dump($basketWithShippingtax ->getTotalCost());
