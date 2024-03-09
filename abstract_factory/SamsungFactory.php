<?php

include 'abstract_factory/DeviceFactory.php';
include 'abstract_factory/SamsungProduct.php';

class SamsungFactory implements DeviceFactory
{

    public function createPhone()
    {
       return new SamsungPhone();
    }

    public function creatTablet()
    {
       return new SamsungTablet();
    }
}