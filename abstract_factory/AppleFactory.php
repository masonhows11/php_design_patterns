<?php

include 'abstract_factory/DeviceFactory.php';
include 'abstract_factory/AppleProduct.php';

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