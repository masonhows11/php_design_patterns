<?php

/// refactor code in index.php file

/// we can refactor agin for remove dublicate method using abstract class
/// refactored class in refactor2.php file


interface Cost
{

    public function getCost();

    public function getDescription();

    public function getTotalCost();

    public function getDetails();
}



class BasKetCost implements Cost
{


    public function getCost()
    {
        return 150000;
    }

    public function getDescription()
    {
        return 'Basket cost';
    }


    public function getTotalCost()
    {
        // return $this->getCost();
        return self::getCost();
    }



    public function getDetails()
    {
        return [
            self::getDescription() => self::getCost(),
        ];
    }
}


class ShipingDecorator implements Cost
{
    //// use composition for inject obj to this class using constructor

    private $cost;
    public function __construct(Cost $cost)
    {
        $this->cost = $cost;
    }

    public function getCost()
    {

        return 2500;
    }

    public function getDescription()
    {
        return 'Shiping cost';
    }


    public function getTotalCost()
    {
        ////  use composition fot get getotalCost()
        return $this->cost->getTotalCost() +  self::getCost();
    }



    public function getDetails()
    {
        ////  use composition fot get getotalCost()
        return  $this->cost->getDetails() +  [
            self::getDescription() => self::getCost(),
        ];
    }
}

class TaxDecorator implements Cost
{
    //// use composition for inject obj to this class using constructor

    private $cost;
    public function __construct(Cost $cost)
    {
        $this->cost = $cost;
    }

    public function getCost()
    {
        return $this->cost->getCost() * 0.09;
    }

    public function getDescription()
    {
        return 'tax cost';
    }


    public function getTotalCost()
    {
        /// self refer to child parent or child class check this !!??
        return $this->cost->getTotalCost() +  self::getCost();
    }



    public function getDetails()
    {
        return $this->cost->getDetails() +  [
            self::getDescription() => self::getCost(),
        ];
    }
}

// $basketCost = new  BasKetCost();
// var_dump($basketCost->getDetails());
// var_dump($basketCost->getTotalCost());


$basketCost = new  BasKetCost();

//// composition here:  basketCost has a shippingCost
// $basketWithShipping = new ShipingDecorator($basketCost);

//// composition here:  basketCost has a shippingCost
// $basketWithShipping = new ShipingDecorator(new BasKetCost);


// var_dump($basketWithShipping->getDetails());
// var_dump($basketWithShipping->getTotalCost());

$basketTaxCost = new TaxDecorator(new BasKetCost);

var_dump($basketTaxCost->getDetails());
var_dump($basketTaxCost->getTotalCost());


$basketWithTaxShippingCost = new ShipingDecorator($basketTaxCost);
var_dump($basketWithTaxShippingCost->getDetails());
var_dump($basketWithTaxShippingCost->getTotalCost());
