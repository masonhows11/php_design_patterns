<?php

include 'abstract_factory/smartPhone.php';
include 'abstract_factory/tablet.php';

//// ApplePhone product class
class ApplePhone implements SmartPhone
{

    public function switchOn()
    {
        echo 'Apple Smartphone: Switching on';
    }

    public function ring()
    {
        echo 'Apple Smartphone: Ringing';
    }
}

//// AppleTablet product class
class AppleTablet implements  Tablet {

    public function switchOn()
    {
        echo 'Apple Smartphone: Switching on';
    }

}

