<?php

include 'DeviceFactory.php';
include 'AppleProduct.php';

//// this is apple class factory
class AppleFactory implements DeviceFactory
{

    public function createPhone()
    {
        return new ApplePhone();
    }

    public function creatTablet()
    {
         return new AppleTablet();
    }
}