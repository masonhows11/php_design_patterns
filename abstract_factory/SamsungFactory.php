<?php

// include 'DeviceFactory.php';
include 'SamsungProduct.php';

//// this is samsung class factory
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