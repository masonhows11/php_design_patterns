<?php

include 'abstract_factory/smartPhone.php';
include 'abstract_factory/tablet.php';

class SamsungPhone implements SmartPhone
{

    public function switchOn()
    {
        echo 'Samsung Smartphone: Switching on';
    }

    public function ring()
    {
        echo 'Samsung Smartphone: Ringing';
    }
}

class SamsungTablet implements Tablet
{

    public function switchOn()
    {
        echo 'Samsung Smartphone: Switching on';
    }
}
