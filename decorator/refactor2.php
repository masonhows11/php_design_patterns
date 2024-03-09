<?php

/// refactor code in index.php file

/// we can refactor agin for remove dublicate method using abstract class

/// dp stand for design pattern

interface Cost
{

    public function getCost();

    public function getDescription();

    public function getTotalCost();

    public function getDetails();
}


//////// main class must be decorator with other class ////////
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

//// start refactor our decorator dp for remve duplicate method using abstract class ////

abstract class AbstractDecorator implements Cost
{

    //// use composition for inject obj to this class using constructor ////
    //// we use duplicate method in our abstract class


    //////// duplicate method ////////
    protected $cost;
    public function __construct(Cost $cost)
    {
        $this->cost = $cost;
    }

    //////// duplicate method ////////
    public function getTotalCost()
    {
        ////  use composition fot get getotalCost()
        return $this->cost->getTotalCost() +  static::getCost();
    }


    //////// duplicate method ////////
    public function getDetails()
    {
        ////  use composition fot get getotalCost()
        return  $this->cost->getDetails() +  [
            static::getDescription() => static::getCost(),
        ];
    }
}


class ShipingDecorator extends  AbstractDecorator
{

    public function getCost()
    {

        return 2500;
    }

    public function getDescription()
    {
        return 'Shiping cost';
    }


}

class TaxDecorator extends  AbstractDecorator
{
    
    public function getCost()
    {
        return $this->cost->getCost() * 0.09;
    }

    public function getDescription()
    {
        return 'tax cost';
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
